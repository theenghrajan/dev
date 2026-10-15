# gloveamerica.com — WordPress + WooCommerce, Kinsta + Cloudflare, Wordfence (AC #503236 logins, #457276 PCI)

- Notes follow the `D:\work\seo` convention (see `dev/CLAUDE.md`, "Adding a new project"). No site copy or DB here, and no production access.
- On 2026-10-05, all 9 WP user passwords were reset after Kinsta's malware cleanup (457276 #41). That reset caused the client lockout (503236 #5).
- Keyring logins for dylan@smartsites.com, Gloveadmin, glovecontact and glovesupport still fail. Check with `wp user check-password` rather than live logins, because Wordfence locks an IP for 240 min after 10 failed logins.
- Keep Keyring URLs out of the repo.
