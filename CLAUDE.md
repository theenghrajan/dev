# D:\work\dev — client site work (SmartSites)

One folder per client domain. There's no shared build and no app to run. Each folder holds the deliverables, notes and helper scripts for one ticket.
Reusable skills, agents and helpers live in `D:\work\claude` (outside this repo). The scripts here import from it.

## Global rules
- **ActiveCollab (AC, login.smartsites.com) is read only.** Never post, comment or edit there. Draft replies in chat for the user to post.
- **Change only what was asked**, then prove it with a before/after diff.
- Ask when a mapping, rename or page ID is unclear. Don't guess.
- **Credentials:** never print or echo `.env` values, never `source` them (the passwords contain shell characters, so parse them line by line), and never debug with `bash -x`.
- Nothing goes to a live site. Pushing live is the client contact's call after they review.
- Windows box: Git Bash plus PowerShell. Windows curl and node need `C:/` paths, so convert with `cygpath -m`.
- Repo-wide `.gitignore` already excludes archives, logs, `node_modules/`, `*.sql` and `videos/`.

## Projects

### covertthreat.com — WordPress + Elementor 3.35.9 (task #127, 12 sub-platform pages)
Full notes are in `covertthreat.com/CLAUDE.md`, which is the source of truth for page IDs, image conventions and the swap procedure. Also:
- `LOG.md`: dated log of every action, newest at the bottom. Append to it on every request.
- `SOLUTIONS.md`: one section per task.
- `10-1-2026.txt`: the AC reply draft (12 dev URLs + screenshots) for comment #11.
- `tools/swap-feature-images.sh <slug>...`: uploads `images/output/<slug>/<slug>-feature-img01|02.webp` and swaps them in for stock media 9024 (About) and 9032 (Penetration Testing tab) via `elementor_ajax`. It backs up to `images/output/backups/`, keeps page settings, and stops on any change other than the images. Already-done pages are skipped.
- `images/source/` holds the Design originals and `images/output/` the optimized WebP plus `alt-titles.csv` / `swap.csv`.
- Generic successor: skill `D:\work\claude\elementor-image-swap`.
- Status 2026-10-01: all 12 pages swapped and verified on dev. Open items are in its CLAUDE.md.

### nobleplumbers.com — WordPress + Divi 4 (Figma "Homepage v2" → Divi Library layout)
Full handoff is in `nobleplumbers.com/HANDOFF.md`: import steps, section map, content assumptions to confirm, and visual differences.
- `build-homepage-v2.js`: run `node build-homepage-v2.js` to write `homepage-v2.wxr.xml` and validate it with `dvValidateWxrFile`.
  - Requires `D:/work/claude/figma-to-divi-builder/scripts/wxr-helpers.js` (hard-coded path).
  - Reads the site export `nobleplumbingthetrustworthyplumbers.WordPress.2026-09-25.xml`.
  - IDs: layout post 27300, image attachments 27301–27304.
  - Builder version `4.27.7`, the newest in the export.
- `catalog.txt`: dump of every Divi layout, module and attr in the site export (about 21k lines), made with `layouts.find(l => l.postId === N).tree`. Grep it for real attr names before adding module types. Only use attrs that already appear there (`module_class` is the one exception, flagged in HANDOFF).
- `figma/`: exported assets. The PNG/JPG files are local backups of the 4 media images. `figma/svg/` icons are inlined as data URIs, because WP blocks SVG uploads. The full-design reference is `figma/homepage-v2-full.png`.
- Figma file `LAj3BBRu6ISFGUAdriEXn5`, node `9733:2`. The Figma asset URLs expired about 2026-10-02, so import with "Download and import file attachments" ticked, or re-upload from `figma/`.
- Out of scope: top bar, header nav, and footer (Theme Builder post 26955).

### nwroofingoregoncoast.com — Duda site (Figma → custom HTML widget)
- `roofing-services.html`: one self-contained file, with a `<style>` block followed by markup.
  - All CSS is scoped under `#dm div.dmContent` (Duda's wrapper), with design tokens as custom properties at the top.
  - The `body *#dm *.dmBody div.u_…` rules zero Duda's column padding.
- Scope: hero plus page body. The site header and footer are excluded.
- Sections are BEM-ish (`section--light|tinted|deep|white|gradient-band|flush`, `card`, `badge`, `link-arrow`), each headed by a comment with its Figma node ID.
- Known gaps:
  - FAQ answers 2–5 are placeholders, because Figma draws those rows collapsed.
  - Two sections use `aria-labelledby="inspection-title"`, at lines 923 and 1120. Only the first has that id, so the second section's label is wrong.

### advertisepurple.com — WordPress + Beaver Builder 2.10 (AC task #491282, core service pages)
- `LOG.md`: dated log. Page 800248 = "Ecommerce Affiliate Management (Draft)", a copy of the /agency/ layout; its content source is doc `1vsEwmIN…`.
- `tools/build-ecommerce-800248.js`: reads the page export `advertisepurple.WordPress.2026-10-02.xml` and writes `ecommerce-800248-template.wxr.xml` (BB saved template) plus `ecommerce-800248-diff.md`.
- `tools/phpser.js`: span-keeping PHP-serialize tokenizer for in-place edits. BB data here contains `r:N` refs, which `php-serialize` can't parse.
- Login is hidden (wp-login.php 404, /wp-admin/ loops), so `tools/bb-fetch.sh` doesn't work. Use a browser session or an XML export instead.
- `.env` and `work/` are git-ignored here.

### gloveamerica.com — WordPress + WooCommerce, Kinsta + Cloudflare, Wordfence (AC #503236 logins, #457276 PCI)
- Notes follow the `D:\work\seo` convention (see "Adding a new project"). No site copy or DB here, and no production access.
- On 2026-10-05, all 9 WP user passwords were reset after Kinsta's malware cleanup (457276 #41). That reset caused the client lockout (503236 #5).
- Keyring logins for dylan@smartsites.com, Gloveadmin, glovecontact and glovesupport still fail. Check with `wp user check-password` rather than live logins, because Wordfence locks an IP for 240 min after 10 failed logins.
- Keep Keyring URLs out of the repo.

### nocuffstampa.com — WordPress + Elementor Pro on GoDaddy Managed WP (AC #501091 Overall Access Check)
- Notes follow the `D:\work\seo` convention (see "Adding a new project").
- Migrated from Placement Labs (shut down 2026-10-06) to the client's GoDaddy. M365 MX is untouched. SmartSites WP admin web@smartsites.com created 2026-10-06 and added to Passbolt.
- Open: no SMTP (form emails not delivered); `/wp-login.php` is public again.

### thevaultluxuryresale.com — Shopify (redirects)
- Store `vault-luxury-resale.myshopify.com` on `shop.` (CNAME shops.myshopify.com). Root and www use GoDaddy forwarding, homepage only; deep paths return 404. DNS at GoDaddy; MX = Proofpoint.
- The redirect sheet `1M4wxOdH…` isn't shared yet. Access needed is in `10-06-2026-solutions.md`.

### nuwattlighting.com — Shopify (AC #492529 New Product Page Design)
- Store `nuwatt-lighting.myshopify.com`. LIVE theme 144428662858 ("ITG Work Nuwatt Theme"); draft 148630929482 ("Figma Match - 2026-09-04"). Preview: `?preview_theme_id=148630929482` (sets a cookie, so curl needs `-L -c/-b`).
- The calculator appears only on recessed products. Next step after #72: a `product.no-calc` template on both themes, with 97 Default products assigned to it.

### 1st-in-padlocks.com — Shopify, Warehouse theme + Boost PFS (local theme in `1st-in-padlocks-theme/`)
- FAQs come from the `custom.ss_faqs` metafield (a list of FAQ metaobjects): product pages via the `faq` block in `main-product.liquid`, collection pages via `sections/collection-faqs.liquid` (added 2026-10-06). The collection metafield definition still has to be created in admin.

## Adding a new project
Create `<domain>/`, keep the client's export and Design assets inside it, and add a section here.

Notes follow the `D:\work\seo` convention (from 2026-10-06; older projects keep their `LOG.md`/`SOLUTIONS.md`). Write one set per AC reply:
- `MM-DD-YYYY-log.md`: what was checked and found. Technical detail is fine here.
- `MM-DD-YYYY-solutions.md`: fixes and suggestions in order. Link to the comment file; don't repeat the draft.
- `MM-DD-YYYY-comment.txt`: the final AC comment in plain text, pasted as-is. Add a `-<task id>` suffix when there is a second task. Plain language for non-technical PMs. Start with "As per comment #N,", then "For the site: <url>" and "Re: <quote>" / "...". End with "Thanks!" only.
