# luxeurope.net — working notes for Claude

## Rules
- **ActiveCollab is read only.** Draft replies in chat; the user posts them.
- Log every request and action in `LOG.md`, dated. Write each task's solution as a section in `SOLUTIONS.md`.
- Ask when something is unclear instead of guessing.

## Project
- AC project 8881 "LuxEurope [WEB]". PM: DeAnn Burris. Client: Kimberly (owner).
- Sister brand of Luxury Italian Tours (luxuryitaliantours.com, since 2010). LuxEurope launched in 2024.
- Goal: 10–15 qualified written inquiries a month. Primary CTA = inquiry form, not phone. Keep the hand-drawn sketch style; no stock photos.
- **Live site is geo-blocked outside the US** (403 "Access Restricted"). The user needs a US VPN to view it. From here, use the Wayback Machine: `curl -sSL "https://web.archive.org/web/2026id_/https://www.luxeurope.net/<path>"`.
- Stack (Wayback snapshot of 2025-06-01): WordPress, Reobiz theme (child) + RS Elements, Elementor 3.28 + Elementor Pro, Header Footer Elementor, Revolution Slider, Contact Form 7.

## Tasks
- #55 UX Audit (id 496441): https://login.smartsites.com/projects/8881/tasks/496441
  - Audit doc: https://docs.google.com/document/d/10EAvGalHG1toXZFtU0Lo0sVQk5ohUCS6_V36lcAgYOg/edit
  - Dev estimate + reply draft in `SOLUTIONS.md` (2026-10-01). Next step: PM presents it to the client, then a "UX Audit Fixes" task is opened with the approved items only. No build work before that.
  - Estimate sheet: `LuxEurope - Website UI_UX Audit Review and Estimation Report.xlsx`, in the format of the team sample `Sample - Website UI_UX Audit Review and Estimation Report.xlsx` (sheet "July, 2024"). The Drive copy of the sample (1xPTRd8R2IC2HVTMMxoxg71ffYXpwxaTa) is not reachable by the connector.
