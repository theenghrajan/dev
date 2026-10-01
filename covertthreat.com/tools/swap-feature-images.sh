#!/usr/bin/env bash
# Upload images/output/<slug>/<slug>-feature-img01|02.webp and swap them into the page's
# Elementor image widgets that still use the shared stock photos (9024 = About, 9032 = tab).
# Title/Alt come from images/output/alt-titles.csv. Backs up Elementor data before saving.
# Usage: tools/swap-feature-images.sh <slug> [<slug> ...]
set -euo pipefail
cd "$(dirname "$0")/.."

# .env is parsed line by line, never sourced (passwords may contain shell characters)
while IFS= read -r l || [ -n "$l" ]; do
  l="${l%$'\r'}"; case "$l" in ''|\#*) continue;; esac
  printf -v "${l%%=*}" '%s' "${l#*=}"
done < .env

OLD_ABOUT=9024; OLD_TAB=9032
CSV=images/output/alt-titles.csv
TMP=$(mktemp -d); command -v cygpath >/dev/null && TMP=$(cygpath -m "$TMP")  # Windows curl/node need C:/ paths
trap 'rm -rf "$TMP"' EXIT
BK=images/output/backups; mkdir -p "$BK"
J="$TMP/cookies.txt"
C=(curl -sS --fail-with-body -u "$BASIC_USER:$BASIC_PASS" -b "$J" -c "$J")

# Log in once
"${C[@]}" -o /dev/null "$SITE/wp-login.php"
"${C[@]}" -o /dev/null -b "wordpress_test_cookie=WP%20Cookie%20check" \
  --data-urlencode "log=$WP_USER" --data-urlencode "pwd=$WP_PASS" \
  -d "wp-submit=Log+In&testcookie=1" "$SITE/wp-login.php"
grep -q wordpress_logged_in "$J" || { echo "Login failed"; exit 1; }
RN=$("${C[@]}" "$SITE/wp-admin/admin-ajax.php?action=rest-nonce")
R=("${C[@]}" -H "X-WP-Nonce: $RN")

# Reuse an existing upload with this slug, else upload with title/alt attached to the page
media() { # file title page_id -> prints "id url"
  local name; name=$(basename "$1" .webp)
  local found; found=$("${R[@]}" "$SITE/wp-json/wp/v2/media?slug=$name&_fields=id,source_url")
  [ "$found" = "[]" ] && found=$("${R[@]}" -F "file=@$1;type=image/webp" -F "slug=$name" -F "title=$2" -F "alt_text=$2" -F "post=$3" \
    "$SITE/wp-json/wp/v2/media?_fields=id,source_url")
  node -e 'let m=JSON.parse(process.argv[1]);m=Array.isArray(m)?m[0]:m;console.log(m.id+" "+m.source_url)' "$found"
}

for slug in "$@"; do
  row=$(grep -m1 "^$slug,.*img01" "$CSV") || { echo "$slug: not in CSV"; continue; }
  IFS=, read -r _ pid _ title _ <<<"$row"
  echo "== $slug (page $pid)"

  EN=$("${C[@]}" "$SITE/wp-admin/post.php?post=$pid&action=elementor" \
    | grep -oE '"ajax":\{"url":"https[^}]*"nonce":"[0-9a-f]+"' | grep -oE '[0-9a-f]{10}' | head -1)
  ajax() { "${C[@]}" "$SITE/wp-admin/admin-ajax.php" --data-urlencode "action=elementor_ajax" \
    --data-urlencode "_nonce=$EN" --data-urlencode "editor_post_id=$pid" --data-urlencode "initial_document_id=$pid" \
    --data-urlencode "actions@$1"; }

  echo "{\"get\":{\"action\":\"get_document_config\",\"data\":{\"id\":$pid}}}" > "$TMP/get.json"
  ajax "$TMP/get.json" > "$TMP/doc.json"
  # Keep elements + page settings (Hide Title etc.): save_builder resets any setting not sent
  node -e 'const fs=require("fs");const d=JSON.parse(fs.readFileSync(process.argv[1])).data.responses.get.data;
    fs.writeFileSync(process.argv[2],JSON.stringify(d.elements));fs.writeFileSync(process.argv[3],JSON.stringify(d.settings.settings))' \
    "$TMP/doc.json" "$TMP/elements.json" "$TMP/settings.json"
  if ! grep -qE "\"id\":($OLD_ABOUT|$OLD_TAB)[,}]" "$TMP/elements.json"; then echo "   already done, skipped"; continue; fi
  cp "$TMP/doc.json" "$BK/$slug-$(date +%Y%m%d-%H%M%S).json"

  read -r id1 url1 < <(media "images/output/$slug/$slug-feature-img01.webp" "$title" "$pid")
  read -r id2 url2 < <(media "images/output/$slug/$slug-feature-img02.webp" "$title" "$pid")
  echo "   media: img01=$id1 img02=$id2"

  # Swap only image.id/url/alt in the two widgets; fail if each old photo isn't found exactly once
  node -e '
    const fs=require("fs"); const [f,o1,o2,i1,u1,i2,u2,alt,out,sf]=process.argv.slice(1);
    const settings=JSON.parse(fs.readFileSync(sf));
    const els=JSON.parse(fs.readFileSync(f)); const n={[o1]:0,[o2]:0};
    (function walk(a){for(const e of a){const im=e.settings&&e.settings.image;
      if(im&&String(im.id)===o1){Object.assign(im,{id:+i1,url:u1,alt});n[o1]++}
      else if(im&&String(im.id)===o2){Object.assign(im,{id:+i2,url:u2,alt});n[o2]++}
      walk(e.elements||[])}})(els);
    if(n[o1]!==1||n[o2]!==1){console.error("   unexpected widget count",n);process.exit(1)}
    fs.writeFileSync(out,JSON.stringify({save:{action:"save_builder",data:{status:settings.post_status,elements:els,settings}}}))' \
    "$TMP/elements.json" $OLD_ABOUT $OLD_TAB "$id1" "$url1" "$id2" "$url2" "$title" "$TMP/save.json" "$TMP/settings.json"

  ajax "$TMP/save.json" | grep -q '"success":true' || { echo "   SAVE FAILED"; exit 1; }

  # Prove only the 2 images changed: page settings identical, elements identical except image + render cache
  ajax "$TMP/get.json" > "$TMP/after.json"
  node -e 'const fs=require("fs");const g=f=>JSON.parse(fs.readFileSync(f)).data.responses.get.data;
    const a=g(process.argv[1]),b=g(process.argv[2]);const bad=[];
    const sa=a.settings.settings,sb=b.settings.settings;  // compare per key: Elementor may reorder keys
    for(const k of new Set([...Object.keys(sa),...Object.keys(sb)]))if(JSON.stringify(sa[k])!==JSON.stringify(sb[k]))bad.push("page setting "+k);
    (function d(x,y,p){if(JSON.stringify(x)===JSON.stringify(y)||/\.(htmlCache|settings\.image)$/.test(p))return;
      if(x&&y&&typeof x=="object"&&typeof y=="object"){for(const k of new Set([...Object.keys(x),...Object.keys(y)]))d(x[k],y[k],p+"."+k);return}
      bad.push(p)})(a.elements,b.elements,"");
    if(bad.length){console.error("   UNEXPECTED CHANGES:",bad.join(", "));process.exit(1)}' "$TMP/doc.json" "$TMP/after.json" \
    || { echo "   STOPPED: restore from $BK if needed"; exit 1; }
  echo "   only images changed (page settings + layout identical)"

  html=$("${C[@]}" "$SITE/$slug/")
  if grep -q "wp-image-$id1" <<<"$html" && grep -q "wp-image-$id2" <<<"$html" \
     && ! grep -qE "wp-image-($OLD_ABOUT|$OLD_TAB)\"" <<<"$html"; then echo "   verified on front end"
  else echo "   WARNING: front end not showing new images yet"; fi
done
