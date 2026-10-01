'use strict';
/**
 * Figma "Homepage v2" (LAj3BBRu6ISFGUAdriEXn5, node 9733:2) -> Divi 4 Library layout.
 *
 * Every module/attr kind used here appears in this site's own export (see catalog.txt),
 * except `module_class` (Divi's standard "CSS Class" field, not used on this site yet) —
 * it only hooks the scoped stylesheet in the first Code module onto modules.
 *
 * Run:  node build-homepage-v2.js
 * Out:  homepage-v2.wxr.xml (validated)
 */

const fs = require('fs');
const path = require('path');
const H = require('D:/work/claude/figma-to-divi-builder/scripts/wxr-helpers.js');

const EXPORT = path.join(__dirname, 'nobleplumbingthetrustworthyplumbers.WordPress.2026-09-25.xml');
const OUT = path.join(__dirname, 'homepage-v2.wxr.xml');
const SVG_DIR = path.join(__dirname, 'figma', 'svg');

const layouts = H.dvExtractAllLayouts(EXPORT);
const header = H.dvExtractSiteHeader(EXPORT);

// ---------------------------------------------------------------------------
// Design tokens (from get_design_context)
// ---------------------------------------------------------------------------
const NAVY = '#13143e';
const BLUE = '#2ea3f2';
const BLUE_HOVER = '#1f8fd9';
const TINT = 'rgba(46,163,242,0.1)';
const V = '4.27.7'; // newest _builder_version in this site's export
const BASE = { _builder_version: V, _module_preset: 'default', global_colors_info: '{}' };

const F_MONT_800_UP = 'Montserrat|800||on|||||';
const F_MONT_600 = 'Montserrat|600|||||||';
const F_OPEN = 'Open Sans||||||||';

// ---------------------------------------------------------------------------
// Images that need a Media Library copy (Divi references images by URL; the importer
// downloads each attachment and rewrites this exact URL in post_content to the local copy)
// ---------------------------------------------------------------------------
const IMG = {
  hero: { id: 27301, name: 'homepage-v2-hero', title: 'Homepage v2 hero (plumber at pipes)', ext: 'png',
    url: 'https://www.figma.com/api/mcp/asset/30df5737-92a8-4679-8071-b41ab49fb004.png', local: 'figma/hero-images/export.png' },
  aboutLarge: { id: 27302, name: 'homepage-v2-about-wrench', title: 'Plumber tightening a pipe fitting', ext: 'jpg',
    url: 'https://www.figma.com/api/mcp/asset/f534cc91-71d5-486d-adc9-07875b37a25f/3a54e.png', local: 'figma/about-images/rect23-large.png' },
  aboutSmall: { id: 27303, name: 'homepage-v2-about-plumber', title: 'Noble Plumbing technician', ext: 'jpg',
    url: 'https://www.figma.com/api/mcp/asset/f534cc91-71d5-486d-adc9-07875b37a25f/d6110.png', local: 'figma/about-images/rect24-small.png' },
  map: { id: 27304, name: 'homepage-v2-service-area-map', title: 'Service area map, Modesto', ext: 'png',
    url: 'https://www.figma.com/api/mcp/asset/c0be852c-a34a-4bf5-b4d9-f6d2b7cb6c30/7106d.png', local: 'figma/areas-images/map.png' },
};
const LAYOUT_ID = 27300;

// Small icons: inlined as data URIs in the stylesheet (WordPress blocks SVG uploads by default)
const svg = (f) => `url(data:image/svg+xml;base64,${fs.readFileSync(path.join(SVG_DIR, f)).toString('base64')})`;

// ---------------------------------------------------------------------------
// Node builders (attr names all taken from catalog.txt)
// ---------------------------------------------------------------------------
const pad = (t, r, b, l) => `${t}|${r}|${b}|${l}|false|false`;

function section(attrs, rows) {
  return H.dvShortcode('et_pb_section', { fb_built: '1', ...BASE, ...attrs }, rows);
}
function row(types, attrs, cols) {
  const r = H.dvShortcode('et_pb_row', {
    ...BASE, width: '89%', max_width: '1280px', custom_padding: pad('0px', '', '0px', ''),
    use_custom_gutter: 'on', gutter_width: '2', ...attrs,
  }, cols);
  if (types.length > 1) r.attrs.column_structure = H.dvEncodeAttr(types.join(','));
  return r;
}
function column(type, attrs, modules) {
  return H.dvShortcode('et_pb_column', { type, ...BASE, ...attrs }, modules);
}
function text(attrs, html) {
  return H.dvShortcode('et_pb_text', {
    ...BASE, text_font: F_OPEN, text_font_size: '16px', text_line_height: '24px', text_text_color: NAVY,
    header_2_font: F_MONT_800_UP, header_2_font_size: '48px', header_2_line_height: '1.2em', header_2_text_color: NAVY,
    header_2_font_size_tablet: '38px', header_2_font_size_phone: '30px', header_2_font_size_last_edited: 'on|phone',
    ...attrs,
  }, html);
}
// Button attr set mirrors the site's fully-custom buttons (e.g. Divi Buttons Kit, post 25650)
function button({ label, url, outline = false, cls = '', align = 'left', newWindow = false, extra = {} }) {
  return H.dvShortcode('et_pb_button', {
    ...BASE, admin_label: `Button: ${label}`, button_text: label, button_url: url, url_new_window: newWindow ? 'on' : 'off',
    button_alignment: align, custom_button: 'on',
    button_text_color: '#ffffff', button_text_size: '16px', button_font: F_MONT_600, button_letter_spacing: '0px',
    button_bg_color: outline ? 'rgba(0,0,0,0)' : BLUE, button_border_width: outline ? '1px' : '0px',
    button_border_color: outline ? '#ffffff' : BLUE, button_border_radius: '46px',
    button_bg_color_hover: outline ? 'rgba(255,255,255,0.12)' : BLUE_HOVER, button_border_color_hover: outline ? '#ffffff' : BLUE_HOVER,
    button_border_radius_hover: '46px', button_letter_spacing_hover: '0px',
    button_use_icon: 'off', button_on_hover: 'off',
    custom_padding: '16px|24px|16px|24px|true|true',
    ...(cls ? { module_class: cls } : {}), ...extra,
  });
}
function blurb(attrs, html) {
  return H.dvShortcode('et_pb_blurb', {
    ...BASE, use_icon: 'off', text_orientation: 'left', animation: 'off',
    body_font: F_OPEN, body_font_size: '16px', body_line_height: '24px',
    ...attrs,
  }, html);
}
function image(attrs) {
  return H.dvShortcode('et_pb_image', { ...BASE, force_fullwidth: 'on', ...attrs });
}

const eyebrow = (t, color) => `<p class="np-eyebrow"${color ? ` style="color:${color}"` : ''}>${t}</p>`;
const hi = (t) => `<span class="np-hi">${t}</span>`;

// ---------------------------------------------------------------------------
// Scoped stylesheet (no "[" or "]" anywhere: they would be read as shortcodes)
// ---------------------------------------------------------------------------
const CSS = [
  // shared type
  '.np-eyebrow{font-family:Montserrat,sans-serif;font-weight:500;font-size:16px;line-height:24px;padding-bottom:8px!important}',
  '.np-hi{color:#2ea3f2}',
  // inline button rows
  '.np-btn-row{text-align:center}',
  '.np-btn-row .et_pb_button_module_wrapper{display:inline-block;margin:0 8px 16px!important}',
  '.np-btn-row-right{text-align:right}',
  '.np-btn-row-right .et_pb_text{display:inline-block;vertical-align:middle;margin:0 16px 0 0!important}',
  '.np-btn-row-right .et_pb_button_module_wrapper{display:inline-block;vertical-align:middle;margin:0!important}',
  // phone icon on buttons
  `.np-btn-phone.et_pb_button::before{content:""!important;display:inline-block!important;position:static!important;opacity:1!important;width:24px;height:24px;margin:0 12px 0 0!important;vertical-align:middle;background:${svg('phone.svg')} center/contain no-repeat;font-size:0!important}`,
  '.np-btn-phone.et_pb_button{display:inline-flex!important;align-items:center}',
  // stats band
  '.np-stat h3{padding-bottom:16px!important}',
  // about
  '.np-cover img{width:100%;object-fit:cover;border-radius:16px}',
  '.np-about-l img{height:479px}',
  '.np-about-s img{height:231px}',
  '.np-247{border:1px solid #2ea3f2;border-radius:16px;min-height:231px;display:flex;align-items:center;justify-content:center}',
  '.np-247 h3{padding-bottom:4px!important}',
  // why opt: numbered items + divider lines
  '.np-why .et_pb_blurb_container::before{display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:35px;background:#2ea3f2;color:#fff;font-family:Montserrat,sans-serif;font-weight:600;font-size:22px;margin-bottom:20px}',
  '.np-n1 .et_pb_blurb_container::before{content:"01"}.np-n2 .et_pb_blurb_container::before{content:"02"}',
  '.np-n3 .et_pb_blurb_container::before{content:"03"}.np-n4 .et_pb_blurb_container::before{content:"04"}',
  '.np-why .et_pb_module_header{padding-bottom:8px!important}',
  '.np-why-top{padding-bottom:40px;border-bottom:1px solid rgba(19,20,62,0.12);margin-bottom:40px!important}',
  '.np-why-col2{border-left:1px solid rgba(19,20,62,0.12);padding-left:40px!important}',
  // service cards
  '.np-svc{border:1px solid #2ea3f2;border-radius:16px;min-height:340px;transition:background-color .2s ease}',
  '.np-svc .et_pb_blurb_container::before{content:"";display:block;width:60px;height:60px;margin-bottom:24px;background-position:center;background-size:contain;background-repeat:no-repeat}',
  `.np-svc-heater .et_pb_blurb_container::before{background-image:${svg('svc-water-heater.svg')}}`,
  `.np-svc-leak .et_pb_blurb_container::before{background-image:${svg('svc-leak-detection.svg')}}`,
  `.np-svc-slab .et_pb_blurb_container::before{background-image:${svg('svc-slab-leak.svg')}}`,
  `.np-svc-pipe .et_pb_blurb_container::before{background-image:${svg('svc-pipe-repair.svg')}}`,
  '.np-svc .et_pb_module_header{padding-bottom:16px!important}',
  '.np-svc .et_pb_blurb_description p{padding-bottom:24px}',
  '.np-link a{font-weight:500;text-decoration:underline;display:inline-flex;align-items:center;gap:11px}',
  `.np-link a::after{content:"";width:16px;height:16px;background:${svg('arrow-white.svg')} center/contain no-repeat}`,
  '.np-svc .np-link a{color:#fff}',
  `.np-svc-on .np-link a,.np-svc:hover .np-link a{color:#2ea3f2}`,
  `.np-svc-on .np-link a::after,.np-svc:hover .np-link a::after{background-image:${svg('arrow-blue.svg')}}`,
  '.np-svc:hover{background-color:#fff!important}',
  '.np-svc:hover .et_pb_module_header,.np-svc:hover .et_pb_module_header a,.np-svc:hover .et_pb_blurb_description{color:#13143e!important}',
  // coupons
  '.np-coupon{border-radius:16px;overflow:hidden;margin-bottom:32px!important;background-repeat:no-repeat;background-position:right bottom}',
  `.np-coupon-on{background-image:${svg('tag-on-blue.svg')}}`,
  `.np-coupon-off{background-image:${svg('tag-on-white.svg')}}`,
  '.np-coupon .et_pb_module_header{padding-bottom:16px!important}',
  '.np-coupon .et_pb_blurb_description p{padding-bottom:24px}',
  '.np-coupon-off .np-link a{color:#2ea3f2}',
  `.np-coupon-off .np-link a::after{background-image:${svg('arrow-blue.svg')}}`,
  '.np-coupon-on .np-link a{color:#fff}',
  // testimonials slider
  '.np-testi,.np-testi .et_pb_slide{background:transparent!important}',
  '.np-testi .et_pb_slide{padding:0 126px!important}',
  '.np-testi .et_pb_slide_description,.np-testi .et_pb_slider_container_inner{padding:0!important;text-shadow:none!important}',
  '.np-testi .et_pb_slide_content,.np-testi .et_pb_slide_content p{color:#000!important;font-family:"Open Sans",sans-serif;font-size:14px!important;line-height:28px!important;font-weight:400!important;text-shadow:none!important}',
  '.np-testi .et_pb_slide_content .np-author{font-family:Montserrat,sans-serif;font-weight:800;font-size:20px!important;line-height:1.2!important;text-transform:uppercase;color:#13143e!important}',
  `.np-stars{height:17px;width:102px;margin:24px auto 24px;background:${svg('stars.svg')} center/contain no-repeat}`,
  '.np-testi .et-pb-slider-arrows a{opacity:1!important;width:48px;height:48px;margin-top:-24px;font-size:0!important;background:center/contain no-repeat}',
  '.np-testi .et-pb-slider-arrows a::before{content:""!important}',
  `.np-testi .et-pb-arrow-prev{left:48px!important;background-image:${svg('testi-prev.svg')}}`,
  `.np-testi .et-pb-arrow-next{right:48px!important;background-image:${svg('testi-next.svg')}}`,
  '.np-testi .et-pb-controllers{position:static;margin-top:40px}',
  '.np-testi .et-pb-controllers a{width:8px;height:8px;border-radius:8px;background:rgba(46,163,242,0.3);opacity:1;margin:0 3px;transition:width .2s ease}',
  '.np-testi .et-pb-controllers .et-pb-active-control{width:36px;background:#13143e}',
  // service area pills
  '.np-areas{display:grid;grid-template-columns:1fr 1fr;gap:16px 24px;list-style:none!important;padding:0!important;margin:0}',
  '.np-areas li{list-style:none}',
  '.np-areas li:last-child{grid-column:1 / -1}',
  '.np-areas a{display:flex;align-items:center;justify-content:space-between;height:64px;padding:0 20px;border-radius:16px;background:#fff;box-shadow:0 4px 10px rgba(0,0,0,0.1);color:#2ea3f2;font-weight:700;font-size:16px;transition:background-color .2s ease,color .2s ease}',
  `.np-areas a::after{content:"";width:24px;height:11px;background:${svg('area-arrow-blue.svg')} center/contain no-repeat}`,
  '.np-areas a.is-on,.np-areas a:hover{background:#2ea3f2;color:#fff}',
  `.np-areas a.is-on::after,.np-areas a:hover::after{background-image:${svg('area-arrow-white.svg')}}`,
  '.np-map img{border-radius:16px;box-shadow:0 4px 10px rgba(0,0,0,0.1);width:100%;height:586px;object-fit:cover}',
  // FAQ accordion
  '.np-faq .et_pb_toggle{background:transparent!important;border:0!important;padding:0!important;margin-bottom:20px!important}',
  '.np-faq .et_pb_toggle_title{position:relative;background:#fff;border-radius:8px;box-shadow:0 4px 5px rgba(0,0,0,0.1);padding:15px 64px 15px 22px!important;font-family:"Open Sans",sans-serif;font-size:18px!important;line-height:24px!important;font-weight:400;color:#13143e!important}',
  '.np-faq .et_pb_toggle_open .et_pb_toggle_title{background:#2ea3f2;color:#fff!important;font-weight:600}',
  '.np-faq .et_pb_toggle_title::before{content:""!important;position:absolute;right:11px!important;top:50%;margin-top:-16px;width:32px;height:32px;border-radius:50%;background:linear-gradient(#2ea3f2,#2ea3f2) center/12px 2px no-repeat,linear-gradient(#2ea3f2,#2ea3f2) center/2px 12px no-repeat,#f0f3fa}',
  '.np-faq .et_pb_toggle_open .et_pb_toggle_title::before{background:linear-gradient(#fff,#fff) center/12px 2px no-repeat,rgba(255,255,255,0.2)}',
  '.np-faq .et_pb_toggle_content{padding:20px 22px 0!important;color:rgba(19,20,62,0.8);font-size:16px;line-height:28px}',
  // responsive
  '@media (max-width:980px){.np-why-col2{border-left:0;padding-left:0!important}.np-testi .et_pb_slide{padding:0 64px!important}.np-testi .et-pb-arrow-prev{left:0!important}.np-testi .et-pb-arrow-next{right:0!important}.np-about-l img{height:360px}.np-map img{height:420px}.np-btn-row-right{text-align:left}}',
  '@media (max-width:767px){.np-areas{grid-template-columns:1fr}.np-testi .et_pb_slide{padding:0 8px!important}.np-testi .et-pb-slider-arrows{display:none}.np-hero h1{font-size:36px!important}}',
].join('');

// ---------------------------------------------------------------------------
// Sections
// ---------------------------------------------------------------------------
const styles = H.dvCodeModule(null, `<style>${CSS}</style>`);
styles.attrs = { ...styles.attrs, ...Object.fromEntries(Object.entries({ ...BASE, admin_label: 'Homepage v2 styles (keep)' }).map(([k, v]) => [k, H.dvEncodeAttr(v)])) };

// 1. Hero (Figma 9733:327 + 9733:347)
const hero = section({
  admin_label: 'Hero', background_image: IMG.hero.url, background_size: 'cover', background_position: 'center',
  background_color: NAVY, custom_padding: pad('116px', '', '117px', ''),
  custom_padding_tablet: pad('90px', '', '90px', ''), custom_padding_phone: pad('70px', '', '70px', ''), custom_padding_last_edited: 'on|phone',
}, [
  row(['4_4'], { max_width: '694px' }, [
    column('4_4', { module_class: 'np-btn-row' }, [
      styles,
      text({
        module_class: 'np-hero', text_text_color: '#ffffff', text_orientation: 'center', custom_margin: '||16px||false|false',
        header_font: F_MONT_800_UP, header_font_size: '64px', header_line_height: '1.2em', header_text_color: '#ffffff',
        header_font_size_tablet: '48px', header_font_size_phone: '36px', header_font_size_last_edited: 'on|phone',
      }, eyebrow('Fast, reliable plumbers 24/7 with over 1,000 five-star google reviews!') +
        '<h1>WE’RE #1 IN<br />THE #2 INDUSTRY</h1>' +
        '<p style="max-width:494px;margin:16px auto 0;font-weight:500">Call your leading experts in drains, leaks, water heaters, sewer repairs, and much more.</p>'),
      button({ label: 'Get a Free Estimate', url: '/contact/', align: 'center' }),
      button({ label: '(209) 566-5420', url: 'tel:2095665420', outline: true, cls: 'np-btn-phone', align: 'center' }),
    ]),
  ]),
]);

// 2. Stats band (Figma 9733:616)
const stats = [['1013441', 'CA License'], ['5000+', 'Finished Projects'], ['1900+', 'Bathroom Projects'], ['650+', 'Leak Repairs'], ['300+', 'Positive Testimonials']];
const statsSection = section({
  admin_label: 'Stats band', use_background_color_gradient: 'on', background_color_gradient_direction: '90deg',
  background_color_gradient_stops: `${BLUE} 0%|${NAVY} 100%`, custom_padding: pad('50px', '', '50px', ''),
}, [
  row(stats.map(() => '1_5'), {}, stats.map(([n, l]) => column('1_5', {}, [
    text({
      module_class: 'np-stat', text_text_color: '#ffffff', text_font: 'Open Sans|500|||||||',
      header_3_font: F_MONT_800_UP, header_3_font_size: '48px', header_3_line_height: '1.2em', header_3_text_color: '#ffffff',
    }, `<h3>${n}</h3><p>${l}</p>`),
  ]))),
]);

// 3. About (Figma 9733:368)
const about = section({ admin_label: 'About', background_color: '#ffffff', custom_padding: pad('100px', '', '100px', '') }, [
  row(['2_5', '1_5', '2_5'], { make_equal: 'on' }, [
    column('2_5', {}, [
      image({ src: IMG.aboutLarge.url, alt: 'Plumber tightening a pipe fitting with a wrench', title_text: 'Plumbing repair', module_class: 'np-cover np-about-l', border_radii: 'on|16px|16px|16px|16px' }),
    ]),
    column('1_5', {}, [
      image({ src: IMG.aboutSmall.url, alt: 'Smiling Noble Plumbing technician', title_text: 'Noble Plumbing technician', module_class: 'np-cover np-about-s', border_radii: 'on|16px|16px|16px|16px', custom_margin: '||16px||false|false' }),
      text({
        module_class: 'np-247', background_color: TINT, text_orientation: 'center', text_font_size: '14px',
        header_3_font: F_MONT_800_UP, header_3_font_size: '64px', header_3_line_height: '1.2em', header_3_text_color: NAVY,
      }, '<h3>24/7</h3><p>Same day service</p>'),
    ]),
    column('2_5', {}, [
      text({ custom_margin: '||32px||false|false' },
        eyebrow('About Noble Plumbing') + `<h2>Plumbing with ${hi('Integrity')}</h2>` +
        '<p>When the search is on for a dependable plumber to address your residential or commercial needs, opting for a reputable choice is paramount. Since 2016, Noble Plumbing has been a beacon of assistance for customers grappling with plumbing challenges.</p>' +
        '<p>Our team of licensed and insured professionals specializes in both residential and commercial plumbing. We are fluent in Spanish as well.</p>'),
      button({ label: 'More About Us', url: '/about/' }),
    ]),
  ]),
]);

// 4. Why opt for our services (Figma 9733:547)
const whyItem = (n, title, body, extraCls = '') => blurb({
  title, module_class: `np-why np-n${n} ${extraCls}`.trim(),
  header_font: F_MONT_600, header_font_size: '24px', header_line_height: '1.2em', header_text_color: '#13182c',
  body_text_color: 'rgba(34,34,34,0.8)',
}, `<p>${body}</p>`);
const why = section({ admin_label: 'Why opt for our services', background_color: '#ffffff', custom_padding: pad('0px', '', '100px', '') }, [
  row(['1_2', '1_4', '1_4'], {}, [
    column('1_2', {}, [
      text({ custom_margin: '||32px||false|false' },
        eyebrow('Why opt for our services?') + `<h2>We’ve got you ${hi('covered')}</h2>` +
        '<p>From emergency repairs and routine maintenance to complete plumbing solutions, our experienced team delivers reliable service with quality workmanship, transparent pricing, and a customer-first approach. We are committed to providing fast, efficient, and long-lasting solutions to keep your home or business running smoothly.</p>' +
        '<p>With licensed professionals, 24/7 support, and a dedication to excellence, we make every plumbing experience simple and stress-free. Whether it’s a small repair or a major plumbing challenge, you can trust our team to deliver dependable results with care and precision.</p>'),
      button({ label: 'More About Us', url: '/about/' }),
    ]),
    column('1_4', {}, [
      whyItem(1, 'Emergency Services', 'Quick solutions for urgent plumbing issues.', 'np-why-top'),
      whyItem(3, 'Quality Workmanship', 'Reliable service with attention to every detail.'),
    ]),
    column('1_4', { module_class: 'np-why-col2' }, [
      whyItem(2, 'Repairs &amp; Maintenance', 'Keeping your plumbing system running smoothly.', 'np-why-top'),
      whyItem(4, 'Honest Pricing', 'Clear communication with no hidden surprises.'),
    ]),
  ]),
]);

// 5. Services (Figma 9733:485 on 9733:486)
const svcCard = ({ title, body, url, icon, on }) => blurb({
  title, link_option_url: url, module_class: `np-svc np-svc-${icon}${on ? ' np-svc-on' : ''}`,
  background_color: on ? '#ffffff' : 'rgba(255,255,255,0.1)', border_radii: 'on|16px|16px|16px|16px',
  custom_padding: '24px|24px|24px|24px|true|true',
  header_font: F_MONT_800_UP, header_font_size: '20px', header_line_height: '1.2em', header_text_color: on ? NAVY : BLUE,
  body_text_color: on ? NAVY : '#ffffff',
}, `<p>${body}</p><p class="np-link"><a href="${url}">Read more</a></p>`);
const services = section({ admin_label: 'Our Plumbing Services', background_color: NAVY, custom_padding: pad('80px', '', '80px', '') }, [
  row(['4_4'], { custom_padding: pad('0px', '', '50px', '') }, [
    column('4_4', {}, [
      text({ text_orientation: 'center', text_text_color: '#ffffff', header_2_text_color: '#ffffff', max_width: '648px', module_alignment: 'center' },
        eyebrow('OUR SERVICES') + `<h2>Our ${hi('Plumbing')} Services</h2>`),
    ]),
  ]),
  row(['1_4', '1_4', '1_4', '1_4'], { custom_padding: pad('0px', '', '40px', ''), make_equal: 'on' }, [
    column('1_4', {}, [svcCard({ title: 'Water Heater Replacement', icon: 'heater', on: true, url: '/services/', body: 'We offer 24/7 emergency plumbing services when your toilets or faucets get plugged or spring a leak!' })]),
    column('1_4', {}, [svcCard({ title: 'Leak Detection', icon: 'leak', url: '/leak-detection-slab-leak-repairs/', body: 'Accurate leak detection to protect your home and foundation.' })]),
    column('1_4', {}, [svcCard({ title: 'Slab Leak Repairs', icon: 'slab', url: '/leak-detection-slab-leak-repairs/', body: 'Because slab leaks affect the foundation of a home, prompt detection and repair are critical.' })]),
    column('1_4', {}, [svcCard({ title: 'Pipe Repair', icon: 'pipe', url: '/pipe-repair/', body: 'Plumbing pipes deteriorate over time. We offer new pipe installation at reasonable prices.' })]),
  ]),
  row(['4_4'], {}, [column('4_4', {}, [button({ label: 'Explore more Plumbing Services', url: '/services/', align: 'center' })])]),
]);

// 6. Coupons (Figma 9734:706)
const coupon = ({ title, body, pdf, on }) => blurb({
  title, module_class: `np-coupon ${on ? 'np-coupon-on' : 'np-coupon-off'}`,
  background_color: on ? BLUE : '#ffffff', border_radii: 'on|16px|16px|16px|16px',
  custom_padding: '50px|160px|50px|50px|false|false',
  box_shadow_style: 'preset1', box_shadow_vertical: '4px', box_shadow_blur: '10px', box_shadow_color: 'rgba(0,0,0,0.1)',
  header_font: F_MONT_800_UP, header_font_size: '20px', header_line_height: '1.2em', header_text_color: on ? '#ffffff' : NAVY,
  body_text_color: on ? '#ffffff' : NAVY,
}, `<p>${body}</p><p class="np-link"><a href="${pdf}" target="_blank" rel="noopener">Print coupon</a></p>`);
const coupons = section({ admin_label: 'Coupons and offers', background_color: '#ffffff', custom_padding: pad('100px', '', '68px', '') }, [
  row(['3_4', '1_4'], { custom_padding: pad('0px', '', '50px', '') }, [
    column('3_4', {}, [text({}, eyebrow('Coupon', BLUE) + '<h2>Coupons and offers</h2>')]),
    column('1_4', { module_class: 'np-btn-row-right' }, [
      text({ text_font: 'Open Sans|500|||||||' }, '<p>Questions?</p>'),
      button({ label: '(209) 566-5420', url: 'tel:2095665420', cls: 'np-btn-phone', align: 'right' }),
    ]),
  ]),
  row(['4_4'], {}, [
    column('4_4', {}, [
      coupon({ on: true, title: 'Sewer Camera Inspection', pdf: '/images/coupon-sewer-camera-inspection.pdf',
        body: 'With sewer repair work completed, we will waive your fee for a sewer camera inspection. Valid July 1, 2022 – December 31, 2026.' }),
      coupon({ title: 'Free Estimates', pdf: '/images/coupon-free-estimates.pdf',
        body: 'Free estimates are provided for various services. Call Noble Plumbing for details. Valid from July 5, 2022 – December 31, 2026.' }),
      coupon({ title: 'Leak Detection', pdf: '/images/coupon-leak-detection.pdf',
        body: 'Your fee is waived with repair work. Valid from July 4, 2022 – December 31, 2026.' }),
    ]),
  ]),
]);

// 7. Testimonials (Figma 9733:615) — slide 1 from Figma, slides 2-4 are real reviews from the Reviews page (post 26202)
const reviews = [
  ['Vick V., Union City', 'Our first night at our new home and major back up. Alex was dispatched to our home within 30 minutes and Alex went over and beyond to get everything fixed. Alex took the time to search for sewer line outside in the pouring rain. Unfortunately the outside line wasn’t getting cleaned enough and had to come into the house with his machine. Finally it worked and Alex was so kind to help clean up some of the mess we had. If your ever in need of a plumber I highly recommend Noble Plumbing ask for “Alex”.'],
  ['Vanessa Garcia', 'Brian and his team were very professional and reliable. They made a stressful situation easier for me with consistent updates through the process. I would highly recommend!'],
  ['Tiffany Amber', 'Extremely personable. Made the experience of having a stranger in the home very comfortable and pleasant. Having Noor here was an enjoyable experience and hope IF ever needed he accepts the call! Excellent service. Very pleased with how the sink turned out along with the wonderful conversations!'],
  ['Randy Beumer', 'Noor was our techician who put in a brand new water heater for us. He showed us everything we needed to know and gave us professional service. He represented the “Noble” in Noble Pluming. Thanks for your quality service!'],
];
const slider = H.dvShortcode('et_pb_slider', {
  ...BASE, admin_label: 'Testimonials slider', module_class: 'np-testi',
  show_arrows: 'on', show_pagination: 'on', auto: 'on', auto_speed: '8000',
}, reviews.map(([who, quote]) => H.dvShortcode('et_pb_slide', { ...BASE, heading: '' },
  `<p>${quote}</p><div class="np-stars" role="img" aria-label="5 out of 5 stars"></div><p class="np-author">${who}</p>`)));
const testimonials = section({ admin_label: 'Testimonials', background_color: TINT, custom_padding: pad('80px', '', '80px', '') }, [
  row(['4_4'], { custom_padding: pad('0px', '', '50px', '') }, [
    column('4_4', {}, [text({ text_orientation: 'center', max_width: '640px', module_alignment: 'center' },
      eyebrow('TESTIMONIALS') + `<h2>Hear from our ${hi('happy customers')}</h2>`)]),
  ]),
  row(['4_4'], {}, [column('4_4', {}, [slider])]),
]);

// 8. Service areas (Figma 9734:850)
const areas = [
  ['Modesto', '/plumber-in-modesto/', true], ['Manteca', '/contact/'], ['Stockton', '/contact/'], ['Tracy', '/contact/'],
  ['Turlock', '/contact/'], ['Oakdale', '/contact/'], ['Sacramento &amp; Surrounding Areas', '/plumber-in-sacramento/'],
];
const serviceAreas = section({ admin_label: 'Areas we serve', background_color: '#ffffff', custom_padding: pad('100px', '', '100px', '') }, [
  row(['2_5', '3_5'], { make_equal: 'on' }, [
    column('2_5', {}, [
      text({ custom_margin: '||16px||false|false' },
        eyebrow('Service Areas').replace('class="np-eyebrow"', 'class="np-eyebrow" style="font-family:\'Open Sans\',sans-serif"') +
        `<h2>Areas we ${hi('serve')}</h2>` +
        '<p>Noble Plumbing proudly provides reliable and professional plumbing services throughout Central Valley and surrounding communities. Our experienced team is dedicated to delivering fast, efficient, and dependable plumbing solutions for homeowners and businesses across the region.</p>' +
        '<p style="font-weight:500">Service Areas :</p>'),
      text({}, `<ul class="np-areas">${areas.map(([n, u, on]) => `<li><a href="${u}"${on ? ' class="is-on"' : ''}>${n}</a></li>`).join('')}</ul>`),
    ]),
    column('3_5', {}, [
      image({ src: IMG.map.url, alt: 'Map of the Modesto area served by Noble Plumbing', title_text: 'Service area map', module_class: 'np-map' }),
    ]),
  ]),
]);

// 9. FAQ (Figma 9739:1206 on 9734:1130)
const faqs = [
  { q: '1. What services does Noble Plumbing offer?', a: '<p>We provide repairs, maintenance, drain cleaning, water heaters, and complete plumbing solutions.</p>' },
  { q: '2. What areas do you serve?', a: '<p>We serve Modesto, Manteca, Stockton, Tracy, Turlock, Oakdale, Sacramento and the surrounding Central Valley communities.</p>' },
  { q: '3. Do you offer emergency plumbing services?', a: '<p>Yes. Our licensed plumbers are available 24/7 with same day service for urgent plumbing issues.</p>' },
  { q: '4. Do you provide upfront pricing?', a: '<p>Yes. We believe in honest pricing and clear communication with no hidden surprises, and free estimates are provided for various services.</p>' },
];
const accordion = H.dvAccordionModule(null, faqs);
H.dvSetAttr(accordion, '_builder_version', V);
H.dvSetAttr(accordion, 'module_class', 'np-faq');
H.dvSetAttr(accordion, 'admin_label', 'FAQ accordion');
const faq = section({ admin_label: 'FAQ', background_color: TINT, custom_padding: pad('80px', '', '80px', '') }, [
  row(['1_2', '1_2'], {}, [
    column('1_2', {}, [
      text({ custom_margin: '||32px||false|false' }, `<h2>Frequently Asked ${hi('Questions')}</h2>`),
      button({ label: 'View All FAQ', url: '/contact/' }),
    ]),
    column('1_2', {}, [accordion]),
  ]),
]);

// ---------------------------------------------------------------------------
// Render + validate
// ---------------------------------------------------------------------------
const content = H.dvSerialize({ format: 'shortcode', children: [hero, statsSection, about, why, services, coupons, testimonials, serviceAreas, faq] });

const now = new Date();
const pubDate = now.toUTCString().replace('GMT', '+0000');
const postDate = now.toISOString().slice(0, 19).replace('T', ' ');
const base = { author_login: header.author_login, site_url: header.site_url, pub_date: pubDate, post_date: postDate };
const { meta, terms, sourcePostId } = H.dvItemDefaultsFromExport(layouts, 'et_pb_layout', { layoutType: 'layout' });
meta._et_builder_version = `VB|Divi|${V}`;

const items = [
  H.dvRenderItem({ ...base, post_id: LAYOUT_ID, post_name: 'homepage-v2-figma', title: 'Homepage v2 (Figma)', content, meta, terms }),
  ...Object.values(IMG).map((i) => H.dvRenderAttachmentItem({ ...base, post_id: i.id, post_name: i.name, title: i.title, source_url: i.url, ext: i.ext })),
].join('\n');

fs.writeFileSync(OUT, H.dvRenderWxrDocument(header, items, pubDate));
const result = H.dvValidateWxrFile(OUT);
console.log(`Wrote ${OUT}`);
console.log(`Library item defaults copied from post ${sourcePostId}:`, meta, terms.map((t) => `${t.domain}=${t.nicename}`).join(', '));
console.log(JSON.stringify(result, null, 2));
for (const i of Object.values(IMG)) {
  const ok = fs.existsSync(path.join(__dirname, i.local)) && fs.statSync(path.join(__dirname, i.local)).size > 0;
  console.log(`attachment ${i.id} ${i.name}: local backup ${ok ? 'OK' : 'MISSING'} (${i.local})`);
}
