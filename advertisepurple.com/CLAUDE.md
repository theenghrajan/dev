# advertisepurple.com — WordPress + Beaver Builder 2.10 (AC task #491282, core service pages)

- `LOG.md`: dated log. Page 800248 = "Ecommerce Affiliate Management (Draft)", a copy of the /agency/ layout; its content source is doc `1vsEwmIN…`.
- `tools/build-ecommerce-800248.js`: reads the page export `advertisepurple.WordPress.2026-10-02.xml` and writes `ecommerce-800248-template.wxr.xml` (BB saved template) plus `ecommerce-800248-diff.md`.
- `tools/phpser.js`: span-keeping PHP-serialize tokenizer for in-place edits. BB data here contains `r:N` refs, which `php-serialize` can't parse.
- Login is hidden (wp-login.php 404, /wp-admin/ loops), so `tools/bb-fetch.sh` doesn't work. Use a browser session or an XML export instead.
- `.env` and `work/` are git-ignored here.
