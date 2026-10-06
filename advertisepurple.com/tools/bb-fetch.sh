#!/usr/bin/env bash
# Read-only: log in to WP, open the Beaver Builder editor for $PAGE_ID and save the editor HTML
# plus BB's settings config (all node settings) to work/ for mapping. Changes nothing on the site.
# Usage: tools/bb-fetch.sh
set -euo pipefail
cd "$(dirname "$0")/.."

# .env is parsed line by line, never sourced (passwords may contain shell characters)
while IFS= read -r l || [ -n "$l" ]; do
  l="${l%$'\r'}"; case "$l" in ''|\#*) continue;; esac
  printf -v "${l%%=*}" '%s' "${l#*=}"
done < .env
[ -n "${WP_USER:-}" ] && [ -n "${WP_PASS:-}" ] || { echo "Fill WP_USER/WP_PASS in .env"; exit 1; }

W=work; mkdir -p "$W"; command -v cygpath >/dev/null && W=$(cygpath -m "$PWD/$W")  # Windows curl needs C:/ paths
J="$W/cookies.txt"; : > "$J"
C=(curl -sS -L -A "Mozilla/5.0" -b "$J" -c "$J")
STAMP=$(date +%Y%m%d-%H%M%S)

# Log in (password piped via stdin so it never appears in the process list).
# wp-login.php is hidden on this site (404 at origin, stale copy in Cloudflare cache), so LOGIN_URL comes from .env.
L="${LOGIN_URL:-$SITE/wp-login.php}"
"${C[@]}" -o /dev/null -H "Cache-Control: no-cache" "$L"
printf '%s' "$WP_PASS" | "${C[@]}" -o "$W/login-response.html" -b "wordpress_test_cookie=WP%20Cookie%20check" \
  --data-urlencode "log=$WP_USER" --data-urlencode "pwd@-" \
  -d "wp-submit=Log+In&testcookie=1" --data-urlencode "redirect_to=$SITE/wp-admin/" "$L"
grep -q wordpress_logged_in "$J" || { echo "Login failed (wrong creds, 2FA, captcha or custom login URL). See $W/login-response.html"; exit 1; }
echo "Logged in."

# Editor page (opening it does not save anything)
E="$W/editor-$PAGE_ID-$STAMP.html"
"${C[@]}" -o "$E" "$SITE/?page_id=$PAGE_ID&fl_builder"
grep -q FLBuilderConfig "$E" || { echo "No FLBuilderConfig in editor page; see $E"; exit 1; }
echo "Editor HTML: $E"

# BB loads all node settings from a separate script URL
CFG=$(grep -oE "[^\"']*fl_builder_load_settings_config[^\"']*" "$E" | head -1 | sed 's/&#038;/\&/g; s/&amp;/\&/g')
if [ -n "$CFG" ]; then
  case "$CFG" in http*) ;; *) CFG="$SITE$CFG";; esac
  "${C[@]}" -o "$W/settings-config-$PAGE_ID-$STAMP.js" "$CFG"
  echo "Settings config: $W/settings-config-$PAGE_ID-$STAMP.js"
else
  echo "Settings config URL not found; will parse the editor HTML instead."
fi
rm -f "$W/login-response.html"
