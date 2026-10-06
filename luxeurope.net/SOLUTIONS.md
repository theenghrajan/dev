# Solutions — luxeurope.net

One section per task. Newest at the bottom.

---

## Task #55 — UX Audit: dev-hours estimate (2026-10-01)

**Link:** https://login.smartsites.com/projects/8881/tasks/496441 (project 8881 "LuxEurope [WEB]")
**Ask:** DeAnn (comment of 2026-09-29) wants a rough count of dev hours for the dev work recommended in Design's audit. FED promised it by Thu 2026-10-01.
**Audit:** https://docs.google.com/document/d/10EAvGalHG1toXZFtU0Lo0sVQk5ohUCS6_V36lcAgYOg/edit (39 checks: 15 High, 12 Medium, 6 Low opportunities)
**Deliverable:** `LuxEurope - Website UI_UX Audit Review and Estimation Report.xlsx` (sheet "October, 2026"). It's built in the format of the team sample `Sample - Website UI_UX Audit Review and Estimation Report.xlsx` (sheet "July, 2024"), using the same styles.

### Stack (from the Wayback snapshot of 2025-06-01; the live site is geo-blocked outside the US)
WordPress, Reobiz theme (child) + RS Elements, Elementor 3.28 + Elementor Pro, Header Footer Elementor, Revolution Slider, Contact Form 7.
The /about/ template content is leftover Reobiz demo content.

### Assumptions
- Dev hours only. Design's mockups (25 h in the audit) are separate.
- Build starts from approved mockups and client-approved copy (budget bands, response time, About/team content, trust items).
- About 21 destination pages (8 countries, Spain's 7 regions, French Riviera, Italy's 5 cities), each its own Elementor page. If they share one template, Visual Hierarchy drops by about 10 h.
- The audit's checkpoint priority sets the group. So 404 and Testimonials sit under Medium, although the audit summary's High items #5 and #7 mention them.
- The "Access Restricted" responses (FAQs, /destinations/) are a hosting or security geo-rule. Fixing it may need hosting access.

### Estimate (matches the sheet)
| Priority | Checkpoint | Hours |
|---|---|---|
| High | Visual Hierarchy & Above-the-Fold (home + ~21 destination pages) | 18 to 24 |
| High | Destinations Menu & IA | 6 to 8 |
| High | Inquiry Entry Points & Form Placement | 4 to 6 |
| High | Form Fields & Qualification Model | 4 to 6 |
| High | "What Happens Next" & Post-Submission | 4 to 5 |
| High | Budget Positioning | 1 to 2 |
| High | CTA Consistency & Written-Inquiry Pathway | 4 to 6 |
| High | Typography & Heading Structure | 2 to 3 |
| High | Design Standards & Spacing | 3 to 4 |
| High | About / Founder Story | 4 to 6 |
| High | Travel Designers / Team | 2 to 3 |
| High | Content & Microcopy Quality | 1 to 2 |
| High | Mobile Typography & Page Length | 3 to 5 |
| High | Sticky Header & Mobile Bottom Action | 3 to 4 |
| High | One Section per Fold & Form Position | 1 to 2 |
| High | Cross Browser & Device Testing | 4 to 6 |
| Medium | Colours 2–3 · Hover & Focus 1–2 · 404 (desktop + mobile) 2–3 · Utility Bar 1–2 · Trust Signals 1–2 · Facts Row 1–2 · Blog 2–3 · Testimonials 3–4 · Mobile Navigation 2–3 · Device Conventions 1–2 · Touch Targets 1–2 | 17 to 28 |
| Low | Icons 2–3 · Social & Sharing 1–2 · How It Works 2–3 · Pop-ups / Mobile Pop-ups / Video: no estimate (strategy only / deferred) | 5 to 8 |
| | **High 64 to 92 · Medium 17 to 28 · Low 5 to 8 · Total 86 to 128 hrs** | |

### Not included
Design/mockups, copywriting and the full proofread, new sketch illustrations/icons, video, the slide-in experiment, N/A items (search, speed, multi-language, logo link), host-level geo-block changes, go-live.

### AC reply draft (not posted — the user posts it after uploading the sheet)
```
Hi DeAnn,

We've reviewed the UX Audit and estimated the dev hours for the recommended items. Please find the estimation sheet here: <SHEET LINK>

Summary:
- High Priority: 64 to 92 hrs
- Medium Priority (optional / Phase 2): 17 to 28 hrs
- Low Priority: 5 to 8 hrs
- Total: 86 to 128 hrs

Notes:
- The website is built on WordPress with Elementor Pro (Reobiz theme) and Contact Form 7, so all the recommended items can be built in the current setup.
- These are dev hours only. Design's mockup hours (25 hrs in the audit) are separate, and dev starts after the mockups and client-approved content (budget bands, response time, About/team content) are ready.
- The biggest item is Visual Hierarchy (18 to 24 hrs), since the new hero/section layout needs to be applied to ~21 destination pages. If they share one template, this reduces by about 10 hrs.
- The quick fixes (unpublishing the template About page, typos, Terms/Privacy links) can go ahead right away, at about 1 to 2 hrs.
- The FAQs and /destinations/ pages return "Access Restricted" outside the US. This looks like a hosting/security geo-rule, so we may need hosting access to fix it.
- This is a tentative estimate and it may increase after we review the current site with access.

Please let us know which items are approved, and we'll proceed once the UX Audit Fixes task is opened.

Thanks!
```
