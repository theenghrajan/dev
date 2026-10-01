# Homepage v2: Figma → Divi handoff

- **Import file:** `homepage-v2.wxr.xml`. It was checked with `dvValidateWxrFile`: no errors, no warnings.
- **Source design:** Figma `LAj3BBRu6ISFGUAdriEXn5`, node `9733:2` ("Homepage v2").
- **Rebuild:** `node build-homepage-v2.js`.
- **Contents:** one Divi Library layout, "Homepage v2 (Figma)" (post 27300), plus 4 images.

## Import (before 2026-10-02: the Figma image links expire about 7 days after 2026-09-25)

1. Go to **Tools → Import → WordPress**, upload `homepage-v2.wxr.xml`, and map the author to an existing user.
2. Tick **"Download and import file attachments"**. Without it, the 4 images keep pointing at Figma and break when the links expire.
3. Go to **Divi → Divi Library** and confirm "Homepage v2 (Figma)" is listed.
4. To try it safely:
   - Create a draft page and set its Page Layout to **Full Width**. The current Home uses `et_right_sidebar`, which would squeeze the design.
   - Open it in the Divi Builder and choose **Add From Library → Your Saved Layouts → Homepage v2 (Figma)**.
   - Preview it, then apply it to Home when you're happy.

Nothing on the live site changes when you import.

## Section map

| # | Figma section | Divi modules | Source | Confidence |
|---|---|---|---|---|
| 1 | Hero | Section with background image, text, 2 buttons | Attr names from this site's modules | High |
| 2 | Stats band | Section with gradient, 5 × `1_5` columns of text | Gradient attrs from the site's "Footer CTA" section | High |
| 3 | About | `2_5,1_5,2_5`: image · image + "24/7" text · text + button | Site attrs | High |
| 4 | Why opt for our services | `1_2,1_4,1_4`: text + button · 4 blurbs, numbered with CSS | Site blurb attrs | High (the numbers are CSS) |
| 5 | Our Plumbing Services | Navy section, 4 blurb cards, button | Site blurb attrs | High |
| 6 | Coupons and offers | Header row with phone button, 3 blurbs | Same pattern as the live Coupons page (blurbs) | High |
| 7 | Testimonials | Divi Slider (`et_pb_slider`) with 4 slides | Core Divi, but not used on this site before, so content settings only | Medium |
| 8 | Areas we serve | `2_5,3_5`: text + 7 area links · map image | Site attrs | High |
| 9 | FAQ | Divi Accordion with 4 items | Core Divi, not on this site before, content settings only | Medium |

The fine details are in one Code module at the top of the hero, labeled **"Homepage v2 styles (keep)"**. That covers pill links, icons, card hover states, slider arrows and dots, the accordion's look, and mobile adjustments. Deleting that module removes those styles. It connects to modules through Divi's standard CSS Class field (`module_class`), which this site hadn't used before, so confirm that field works on the first import (Medium).

## Please check: content decisions made without Figma or site data

1. **FAQ answers 2–4** aren't in Figma, where they're collapsed. I wrote them only from claims the design itself makes (the 7 service areas, 24/7 same-day service, honest pricing and free estimates). Confirm the wording.
2. **"View All FAQ"** links to `/contact/`, because the site has no FAQ page.
3. **The Water Heater card** links to `/services/`, because there's no water-heater page.
4. **Area links:**
   - Modesto goes to `/plumber-in-modesto/` and Sacramento to `/plumber-in-sacramento/`.
   - Manteca, Stockton, Tracy, Turlock and Oakdale go to `/contact/`, because they have no area pages.
5. **Testimonials 2–4** are real reviews copied word for word from the Reviews page: Vanessa Garcia, Tiffany Amber and Randy Beumer. Figma only showed Vick V.
6. **Coupon text** follows Figma, which differs from the live Coupons page:
   - The start dates are July 1, 5 and 4 in Figma, but all July 1 on the live page.
   - I corrected Figma's "December 31. 2026" to "December 31, 2026".
   - "Print coupon" links to the existing PDFs in `/images/`.

## Small visual differences from Figma

- **Font:** the 01–04 number circles use Montserrat 600 instead of Figma's Kanit, which isn't loaded on the site.
- **Divider lines:** the lines in "Why opt" are solid, where Figma fades them.
- **First-item highlight:**
  - The first service card and the Modesto pill are highlighted at rest, as in Figma, and the other cards and pills take the same look on hover.
  - The first coupon is always blue.
- **Spacing:** gaps between columns use Divi's gutter setting 2 (about 3% of the row), so they differ from Figma by a few pixels.

## Not included

The **top bar, header navigation and footer** in the Figma file come from the Divi theme header and the Theme Builder footer (post 26955), not from the page. They're a separate job.

## Images

| Attachment | Used for | Local backup |
|---|---|---|
| 27301 | Hero background (dark overlay included) | `figma/hero-images/export.png` |
| 27302 | About, large photo | `figma/about-images/rect23-large.png` |
| 27303 | About, technician photo | `figma/about-images/rect24-small.png` |
| 27304 | Service-area map | `figma/areas-images/map.png` |

Icons are inline SVG in the stylesheet, from `figma/svg/`, because WordPress blocks SVG uploads by default. If an image is missing after import, upload the local backup and pick it in that module.

After importing, send a screenshot of the preview page so the build can be compared against the Figma design (`figma/homepage-v2-full.png`).
