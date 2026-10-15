# D:\work\dev — client site work (SmartSites)

One folder per client domain. There's no shared build and no app to run. Each folder holds the deliverables, notes and helper scripts for one ticket.
Reusable skills, agents and helpers live in `D:\work\claude` (outside this repo). The scripts here import from it.

## Rules (on top of `D:\work\CLAUDE.md`)
- **Change only what was asked**, then prove it with a before/after diff.
- **Credentials:** never print or echo `.env` values, never `source` them (the passwords contain shell characters, so parse them line by line), and never debug with `bash -x`.
- Nothing goes to a live site. Pushing live is the client contact's call after they review.

## Projects
Per-project notes live in `<domain>/CLAUDE.md` (loaded when working in that folder).

## Adding a new project
Create `<domain>/`, keep the client's export and Design assets inside it, and put its notes in `<domain>/CLAUDE.md`.
Task files follow the root per-task convention. AC comments here also add "For the site: <url>" and "Re: <quote>" / "..." sections.
