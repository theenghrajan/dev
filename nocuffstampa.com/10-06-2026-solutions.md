# 10-06-2026 — Solutions — nocuffstampa.com

AC task #90 (501091) "Overall Access Check": https://login.smartsites.com/projects/8896/tasks/501091
Stack: WordPress + Elementor Pro (SmartSites Elementor One) on GoDaddy Managed WordPress (client's account). Domain/DNS at GoDaddy (delegate access). Email = Microsoft 365. SEO = Yoast.

## Access status (the task's original checklist)
| Item | Status |
|---|---|
| CMS / WordPress | ✅ Terry's admin (Passbolt) + new **SmartSites Administrator** web@smartsites.com created 10-06-2026 |
| Passbolt | ✅ SmartSites admin (web@smartsites.com) added 10-06-2026 |
| Domain / DNS | ✅ GoDaddy delegate access; web record → new host; M365 MX intact |
| Hosting | ✅ GoDaddy Managed WordPress in the client's account; SSL valid until 2027-01-03 |

## Done today
- SmartSites WP Administrator account created (approved by PM in #9). Changes made by SmartSites now show under our own user, and Terry's personal login stays private.

## Open items / suggestions (most urgent first)
1. **Form emails aren't delivered (urgent, means lost leads).** There's no SMTP since Placement Labs' sender went away. Until it's fixed, the client should check submissions in wp-admin. Suggest a separate task: an SMTP plugin (e.g. WP Mail SMTP or FluentSMTP) using the firm's Microsoft 365 or SendGrid/Brevo, plus SPF/DKIM records in GoDaddy DNS. Test that the notification reaches jonesjusticefirm@gmail.com.
2. **Public login page.** `/wp-login.php` and `/wp-admin/` are open again, because the old server's custom `/login/` setup didn't carry over. Suggest: GoDaddy's login protection or a hide-login plugin (WPS Hide Login) with a custom URL, plus a limit on login attempts. Then update the login URL in Passbolt.
3. **Placement Labs leftovers:** check for any other licenses or keys tied to Placement Labs: premium plugin licenses, ClickCease, API keys, SMTP settings, the "Site Kit"/analytics connections. Today (10-06) their services shut off.
4. **Client password:** Terry's login is unchanged from the old site, and the old site was managed by Placement Labs. Recommend that Terry changes his password (asked in #8; no reply yet).
5. **Backups:** confirm that GoDaddy Managed WP daily backups are on. Take one manual restore point now that the migration is done.
6. **Leads after 09-30:** confirm the PM has passed the post-backup submissions sheet (#8) to the client.
7. **Tracking (GTM/GA4):** handled in its own task (#8, item 9), so nothing to do here.

## Comment
Final AC reply: [10-06-2026-comment.txt](10-06-2026-comment.txt) (items 1, 2 and 4 are raised there).
