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

## Adding a new project
Create `<domain>/`, keep the client's export and Design assets inside it, and write a `HANDOFF.md` or `CLAUDE.md` + `LOG.md` + `SOLUTIONS.md` (see the covertthreat pattern). Then add a section here.
