# nobleplumbers.com — WordPress + Divi 4 (Figma "Homepage v2" → Divi Library layout)

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
