# 10-06-2026 — Solutions — gloveamerica.com

One section per task. Newest at the bottom.

Site: https://gloveamerica.com (WordPress + WooCommerce, FX theme by WebFX, Kinsta behind Cloudflare, Wordfence).
Dev: https://gloveamerica.smartwebsitedesign.com

---

## Task #44 (503236) — Logins Reset - No Access (2026-10-06)

**Link:** https://login.smartsites.com/projects/8239/tasks/503236 (comment #5)
**Related:** https://login.smartsites.com/projects/8237/tasks/457276 (PCI Compliance, comment #41 = password reset)
**Related:** task #150 "New Login Glove America Dashboard" (created the `gloveprocessor` user)

### Status
- Cause of the lockout: **found**. The 10-05 password reset of all WP users (457276 #41) was done after Kinsta's malware cleanup, without telling the client first. Old passwords then failed, and repeated failures from the same IP set off Wordfence's IP lockout (10 fails → 240 min).
- Our 503236 #2 reply ("we have not changed the password for any other admin logins") is wrong. The draft reply corrects it.
- Open: the Keyring passwords for **dylan@smartsites.com, Gloveadmin, glovecontact, glovesupport** don't work.

### Why the 4 accounts may fail (most likely first, unverified)
1. **The Keyring value doesn't match what was saved in WP.** Possible ways: a copy/paste slip, a trailing space, the password regenerated before "Update User" was clicked, or the profile saved without the new password.
2. **Wrong username form.** Gloveadmin / glovecontact / glovesupport may have different `user_login` values, or `dylan@smartsites.com` may be the email of an account with a different username. Email login works in WP core, but not if a plugin disables it.
3. **Wordfence Login Security.** 2FA may be enforced for the Administrator role, so these 4 (if admins) get a code prompt or are refused. Wordfence may also block breached or weak passwords for admins.
4. **The account was changed during the compromise.** The attacker may have altered the email or role, or the account may have been deleted or recreated during Kinsta's cleanup. That would match "an admin account was compromised".
5. **The tester's IP is locked out by Wordfence.** In that case the block page shows instead of a wrong-password error. Ruled out if the other 5 accounts work from the same IP.

### Fix (needs someone with production wp-admin or Kinsta SSH access, e.g. `gloveprocessor` or a working admin)
Don't keep retrying logins on the live site: each failure counts toward the 10-fail lockout.

**A. Check the accounts without logging in (Kinsta SSH, WP-CLI):**
```
wp user list --fields=ID,user_login,user_email,roles
wp user get <login> --fields=ID,user_login,user_email,roles,user_registered
wp user check-password <login> '<keyring password>'   # exit 0 = matches, 1 = doesn't
```
`check-password` only compares against the stored hash, so it never touches Wordfence. If it fails, cause 1 is confirmed.

**B. Reset and confirm (per failing user):**
1. wp-admin → Users → edit the user → **Set New Password** → copy the exact value → **Update User**. Or run `wp user update <login> --user_pass='<new>'`.
2. Run `wp user check-password` again, or log in once in a private window.
3. Update that user's Keyring entry with the same value, then share it again.

**C. Wordfence:**
- Wordfence → Login Security → Users: check the 2FA status of the 4 users and whether 2FA is required for their role.
- Wordfence → Tools → Live Traffic / Login Attempts: filter by the 4 usernames to see the exact failure ("invalid username", "incorrect password", "2FA required" or "locked out").
- Wordfence → Firewall → Blocking → Blocked IPs: unblock the client's office IP. Admins can also use "Send unlock email" on the block page.

**D. After the cleanup (still open on 457276):**
- Decide with the client whether 2FA is required for all administrators (Kinsta's recommendation, still awaiting a reply on #41).
- Remove admin accounts nobody uses.
- Notify users before any future password reset.

### Info needed
- The exact error each of the 4 accounts shows: wrong password, unknown username, 2FA prompt, or block page.
- Whether the other 5 Keyring accounts (briannaFX, DougIMS, fxstageadmin, gloveclerk, Lennon-zonos) do log in.

## Comment
Final AC replies: [10-06-2026-comment.txt](10-06-2026-comment.txt) (503236, comment #5) and [10-06-2026-comment-457276.txt](10-06-2026-comment-457276.txt) (457276, comment #42). Fill in the `<keyring link>` placeholders after the 4 accounts are re-reset and verified.
