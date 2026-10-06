# advertisepurple.com – log

## 2026-10-02 – AC task #491282, draft page 800248 (Ecommerce Affiliate Management)
- Comment #18 (Content Team, 2026-09-30) has 4 docs: ecommerce `1vsEwmIN…`, amazon `1YKnIcrw…`, tiktok-shop-agency `1gZuZ7K8…`, tiktok-shop-affiliate-agency `120NmNpK…`.
- 800248 is "Ecommerce Affiliate Management (Draft)", a copy of the /agency/ layout. User confirmed the source is the ecommerce doc `1vsEwmIN…` (the Amazon doc was named first by mistake).
- Site login is hidden: wp-login.php returns 404 at origin (stale Cloudflare copy) and /wp-admin/ redirect-loops, so `tools/bb-fetch.sh` can't log in. No browser tools were available, so this used the XML route.
- Decisions: text only, no images, no FAQ schema; layout fixed except a 5th "Why Choose" bullet and 2 extra FAQs (accordion 2 = 08–15); keep the H2 that repeats the H1, the "…Matters" heading, the eyebrows, "Frequently Asked Questions", and the existing buttons and links. The ✓ glyph is dropped because the list already renders a check icon.
- Built `ecommerce-800248-template.wxr.xml` (BB saved template, post_id 990248) with `node tools/build-ecommerce-800248.js`, plus a before/after in `ecommerce-800248-diff.md`.
  - Text was edited in place on `_fl_builder_draft`; 16 PHP `r:` refs renumbered.
  - Checked: 256 nodes with identical structure, global row sjxictmkhv0a intact, all 32 refs resolve to the same objects, and only text/list/accordion paths changed.
- To apply: Tools → Import, then open 800248 in BB → Templates → Saved → apply (Replace) → Save Draft. Confirm the testimonials row is still global. Page title, slug and Yoast meta are untouched.

## 2026-10-02 – AC reply draft for comments #19–#20 (notes.txt)
- User updated all 4 pages manually: 800248 (Ecommerce), 990261 (Amazon), 990267 (TikTok Shop Agency), 990251 (TikTok Shop Affiliate Agency). URLs and screenshots are in `notes.txt`.
- Reviewed the draft. Comment #20 asks for the images from #17, which is still to confirm. The 990261/990267 links lack `&preview=true`. The #4 title is the H1, not the page name. Fixed typos and proposed a corrected reply in chat.
- The site's firewall returns 406 to curl, so the URLs couldn't be checked logged out.
