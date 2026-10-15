# nwroofingoregoncoast.com — Duda site (Figma → custom HTML widget)

- `roofing-services.html`: one self-contained file, with a `<style>` block followed by markup.
  - All CSS is scoped under `#dm div.dmContent` (Duda's wrapper), with design tokens as custom properties at the top.
  - The `body *#dm *.dmBody div.u_…` rules zero Duda's column padding.
- Scope: hero plus page body. The site header and footer are excluded.
- Sections are BEM-ish (`section--light|tinted|deep|white|gradient-band|flush`, `card`, `badge`, `link-arrow`), each headed by a comment with its Figma node ID.
- Known gaps:
  - FAQ answers 2–5 are placeholders, because Figma draws those rows collapsed.
  - Two sections use `aria-labelledby="inspection-title"`, at lines 923 and 1120. Only the first has that id, so the second section's label is wrong.
