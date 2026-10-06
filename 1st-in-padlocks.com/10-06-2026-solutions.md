# 10-06-2026 — Solutions — 1st-in-padlocks.com

Details: [10-06-2026-log.md](10-06-2026-log.md).

## How it works
FAQs show under the product grid on collection pages, between the products and "Recently viewed". The content is managed per collection in Shopify admin, the same way product FAQs are.

## Steps to go live
1. **Admin → Settings → Custom data → Collections → Add definition** (not a theme file):
   - Name "FAQs", namespace and key **`custom.ss_faqs`**.
   - Type: **Metaobject → list**, using the **same FAQ metaobject definition as the product `custom.ss_faqs`** (fields `question` and `answer`).
2. Fill it in: **Collections → <collection> → Metafields → FAQs**, then pick or create FAQ entries.
3. Push the 3 files to a preview/draft theme first:
   `shopify theme push --path 1st-in-padlocks-theme --unpublished --only sections/collection-faqs.liquid --only templates/collection.json --only templates/collection.brand.json`
   Check a collection that has FAQs (accordion opens and closes; FAQPage appears in the Rich Results Test) and one without (nothing shows).
4. The title can be changed in the theme editor: Collection → "Collection FAQs" section.

## Notes
- The answer is shown as plain text (`metafield_tag | strip_html`), the same as product FAQs. Links and bold text in answers are stripped.
- The accordion CSS and JS are a scoped copy of the product ones. If they ever change, update both, or move them into a shared snippet.
