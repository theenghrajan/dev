# 10-06-2026 — Solutions — nuwattlighting.com

Task: [AC 492529](https://login.smartsites.com/projects/8053/tasks/492529). Details and history: [10-06-2026-log.md](10-06-2026-log.md).
Draft theme 148630929482 ("Figma Match - 2026-09-04"); LIVE theme 144428662858 ("ITG Work Nuwatt Theme").

## Where it stands
- Done on the draft:
  - New PDP on all product templates, with the calculator below the A+ section and a shortcut under the buy box.
  - "Finish" → "Color". Swipe fix and arrows. Metafields. FAQ as a rich-text metafield.
  - Calculator removed from the 8 non-recessed templates.
- **Unblocked by #72:** of the 136 Default-template products, only the **39 recessed** ones keep the calculator (40 minus the wall-wash product). **97 products** (59 non-recessed + 37 unclassified + the wall-wash product) move to a no-calculator template.

## Done locally (10-06-2026)
- `theme/templates/product.no-calc.json` created and `no-calc` added to the teaser list in `theme/snippets/product-template.liquid`. Checked on the local dev server (http://127.0.0.1:9292, `?view=no-calc`). Details in the log.
- Push to the draft: `shopify theme push --store nuwatt-lighting.myshopify.com --theme 148630929482 --path theme --only templates/product.no-calc.json --only snippets/product-template.liquid`

## Next steps (FED)
1. ✅ *(done locally; push with the command above)* **Draft theme:** duplicate `templates/product.json` → `product.no-calc.json` (Gary's "no_calc", #58). Remove the calculator section and the "Not Sure How Many You Need?" shortcut, the same way as the 8 templates in #71.
2. **LIVE theme, before assigning anything:** create `product.no-calc.json` there too, as an **exact copy of the live `product.json`**. Live pages don't change, and the 97 products have a valid template on both themes. This removes the concern raised in #62 and #71.
   - Note: Shopify falls back to the default product template when a product's assigned template doesn't exist in a theme. Even so, creating it on live avoids depending on that.
3. **Assign the 97 products** to `no-calc`: Products → select → **Bulk edit** → add the "Theme template" column. Use the "Updated List" tab of the classification sheet for the handles. Add a "Final template" column there as the record.
4. **Check** on `?preview_theme_id=148630929482`:
   - Calculator gone: `4-inch-wall-wash-led-recessed-light-led-scoop-downlight-12w-900-lumens` and `12-volt-led-transformer-constant-voltage`, plus 1–2 unclassified products (e.g. a Kitchen Under Cabinet Light Bar).
   - Calculator still there: `1-inch-anti-glare-canless-recessed-lighting`.
   - Live unchanged.
5. **When publishing** the draft: the draft's `product.no-calc.json` replaces the live placeholder, so nothing needs reassigning.

## Notes and risks
- 52 products store-wide still have no product type (37 of them on Default). Not needed now, since Gary said none of them need the calculator. New products should get a type so the template choice stays clear.
- Rule for new products (for the client's SOP): recessed → Default (with calculator); anything else → `no-calc` or its own non-recessed template.
- Out of scope here: the mobile UX review (separate task, #64) and the homepage (separate task, #12).

## Comment
[10-06-2026-comment.txt](10-06-2026-comment.txt)
