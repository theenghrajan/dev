#!/usr/bin/env node
'use strict';
/**
 * Build a Beaver Builder saved-template WXR for draft page 800248 ("Ecommerce Affiliate Management (Draft)")
 * with text replaced from the Ecommerce content doc (Google Doc 1vsEwmINfjNyHiq2rWJcZxwWwm4Y-DQIo).
 *
 * Text-only, in-place edits on the serialized _fl_builder_draft: every other byte (styles, node ids, floats,
 * the global testimonials row) is kept. Two additions, approved 2026-10-02: a 5th bullet in the
 * "Why Choose" list and 2 extra FAQ items (cloned from the last sibling item, so styling matches).
 * PHP r:N references are renumbered after the insertions.
 *
 * Usage: node tools/build-ecommerce-800248.js
 * Output: ecommerce-800248-template.wxr.xml, ecommerce-800248-diff.md
 */
const fs = require('fs');
const path = require('path');
const P = require('./phpser.js');
const H = require('D:/work/claude/figma-to-beaver-builder/scripts/wxr-helpers.js');
const phpSerialize = require('D:/work/claude/figma-to-beaver-builder/scripts/node_modules/php-serialize');
const { XMLValidator } = require('D:/work/claude/figma-to-beaver-builder/scripts/node_modules/fast-xml-parser');

const ROOT = path.join(__dirname, '..');
const SRC = path.join(ROOT, 'advertisepurple.WordPress.2026-10-02.xml');
const OUT = path.join(ROOT, 'ecommerce-800248-template.wxr.xml');
const DIFF = path.join(ROOT, 'ecommerce-800248-diff.md');

// ---------------------------------------------------------------- content (verbatim from the doc)
const p = s => `<p>${s}</p>`;
const pl = s => `<p style="text-align: left;">${s}</p>`;
const pc = s => `<p style="text-align: center;">${s}</p>`;
const faqLabel = (n, q) => `<div class="ss-faqs"><span >${String(n).padStart(2, '0')} </span><p>${q}</p></div>`;

const TEXT = { // node id -> new value of its main text field (heading or text)
  // Hero
  nd9w1yl8rvp0: 'An Ecommerce Affiliate Management Agency Built for Sustainable Growth',
  '2i13lcgpz0uh': 'Running an online store requires constant attention to inventory, advertising, customer experience, and day-to-day operations. An affiliate program adds another revenue channel by connecting your products with third-party partners who promote them and earn commissions when they generate results.\n\nAdvertise Purple provides dedicated ecommerce affiliate management to handle the operational and strategic work behind that channel. From technical setup and partner recruitment to compliance, optimization, and reporting, our team operates as an extension of your organization while you stay focused on your core business.',
  // Why choose
  cb480xdk1gwz: 'Why Choose a Professional Ecommerce Affiliate Management Agency',
  fk0h6ucxasrg: 'An affiliate program requires consistent attention after launch. Advertise Purple manages the details that can consume internal resources, from partner communication and tracking to compliance and performance optimization.',
  // Process
  h6a3wdior24m: 'How Our Ecommerce Affiliate Management Process Works',
  imnpc5jxqrwb: 'Every program starts with a strong technical and strategic foundation, then develops through targeted recruitment, partner support, performance analysis, and ongoing optimization.',
  kuf48egsd92i: 'Platform Selection and Technical Setup',
  trv5lcpndkxj: pl('We help select the appropriate platform for your affiliate program and complete the technical configuration. Tracking links, reporting tools, and coupon code integration are established and verified so the program has a reliable operational foundation.'),
  xzbuov09haei: 'Strategy and Program Structure',
  vhr2g7qx45um: pl('We develop a framework around your business goals, including commission structures, promotional guidelines, and partner policies. The strategy is designed to align affiliate activity with your brand and customer base.'),
  '5neq2mjlw8di': 'Affiliate Recruitment and Onboarding',
  '7g8ua19b52v0': pl('Our team identifies and engages potential partners across categories such as content publishers, bloggers, loyalty platforms, deal sites, and digital creators. Each prospective affiliate is evaluated for quality and relevance before onboarding.'),
  s4yj8l76at1b: 'Partner Support and Optimization',
  l82jet5dy0ka: pl('After enrollment, affiliates receive creative assets, program updates, and responsive communication. Performance is monitored continuously so successful partnerships can be developed while opportunities for improvement are identified.'),
  // Dedicated team (was Exclusive Industry Access)
  ujzhti39pvlx: 'A Dedicated Affiliate Team for Your Ecommerce Business',
  '685q7jtgkbi4': 'Advertise Purple functions as an outsourced extension of your organization, handling the operational demands associated with running an affiliate program. This includes affiliate communications, tracking, validation, payments, recruitment, and ongoing partner support.\n\nThe approach allows internal teams to stay focused on core ecommerce priorities without having to build and maintain a specialized affiliate operation internally. At the same time, dedicated management keeps the program active, organized, and aligned with broader business objectives.',
  // Comparison
  snedmroc1pyq: 'Managing Ecommerce Affiliates In-House vs. Partnering With an Agency',
  '8c9mset3nfz4': 'An internal affiliate program can require substantial time and specialized resources. Partnering with an experienced management team shifts the operational workload while giving your brand access to established affiliate management processes.',
  '3ki8fgv7naoy': pc('Managing Your Program In-House'),
  v6lx20ogfm5d: pc('Partnering With Advertise Purple'),
  // Structured operations (was Bloom)
  '3btwj6elvdy8': 'Ecommerce Affiliate Management Backed by Structured Operations',
  b1mr0ywsnftu: 'Build a stronger ecommerce affiliate program with the systems, strategy, and oversight needed for sustainable growth. Our structured approach supports accurate tracking, effective partner management, and consistent program standards.',
  // Scale (was Leverage Data & Tech) - existing "Connect with our team" link kept
  gldpyc3e6nu2: 'Scale Your Ecommerce Business Through Strategic Affiliate Management',
  p1kms2cj6vo5: 'A professionally managed affiliate program can extend an ecommerce brand\'s reach without requiring the internal team to manage every publisher relationship and operational detail. Advertise Purple builds the systems and relationships needed to support long-term affiliate growth.\n\n<a href="https://www.advertisepurple.com/contact/">Connect with our team</a> today.',
  plai8w23nfvg: 'Targeted Affiliate Recruitment',
  j87143huvr6q: pl('We identify partners that fit your market and customer base, including publishers, bloggers, loyalty platforms, deal sites, and digital creators.'),
  dr4mfz3qlutc: 'Stronger Partner Relationships',
  bsh1w2xkl5ej: pl('Affiliates receive creative resources, program updates, and responsive communication that help them stay informed, active, and focused on generating results.'),
  gs068twr1cnk: 'Reduced Operational Workload',
  ld8xe52krouw: pl('Daily communications, tracking, validation, payments, and other program responsibilities are handled by the dedicated affiliate management team.'),
  t1x54jga0ckw: 'Risk Mitigation',
  '63m41vcgarz0': pl('Program compliance and traffic quality are monitored to identify potential issues and protect both affiliate revenue and brand reputation.'),
  gjs0wn1ra83z: 'Sustainable Program Growth',
  mxi5ld4pza1j: pl('The focus remains on developing productive partnerships and improving performance over time rather than pursuing short-term volume without a durable strategy.'),
  '1s46kfm7hdza': 'Performance-Driven Optimization',
  kb9qmec4s3nv: pl('Program data is reviewed regularly to identify high-performing partners, campaigns, and promotional opportunities. These insights help guide adjustments to commissions, placements, and affiliate strategy as the program develops.'),
  '6nak27y0bwxp': 'Scalable Affiliate Infrastructure',
  yis351ft7l8a: pl('As your ecommerce business grows, the affiliate program can evolve alongside it. Processes, partner strategies, and promotional initiatives are structured to support increased activity without sacrificing organization or program oversight.'),
  '1z8w3n0pylke': 'Clear Performance Visibility',
  stdkjygv2xbe: pl('Consistent reporting provides insight into affiliate activity, conversions, revenue, and overall program performance. This visibility helps brands understand what is driving results and where additional opportunities may exist.'),
  // Sustainable growth (was Performance-Based Billing) - H2 repeats the H1, as in the doc (approved)
  qne7zo96vgx5: 'An Ecommerce Affiliate Management Agency Built for Sustainable Growth',
  hcnbjdimsq3p: 'Our approach to affiliate management combines strategy, data, and hands-on support to help ecommerce brands build productive partnerships and create sustainable opportunities for growth.',
  n0hmv6ie3sxr: pl('Strategic Affiliate Program Management'),
  '31u65jrt7mqa': 'We develop and manage affiliate programs around your brand’s goals, with clear commission structures, partner guidelines, promotional strategies, and ongoing oversight.',
  i8ney4m1bd3o: pl('Data-Driven Performance Optimization'),
  l2i59yba4017: 'We monitor affiliate activity and performance to identify opportunities, refine strategies, and strengthen the partnerships contributing to your program’s growth.',
  wtfxdmbl67ja: pl('Transparent Reporting and Communication'),
  qw8i1knsfdl0: 'Clear reporting provides visibility into partner activity, conversions, revenue, and program performance, while ongoing communication keeps your team informed about progress and opportunities.',
  // Why choose AP (Inc. 5000 section) - heading kept exactly as in the doc (approved)
  ahesk9qmugpy: 'Why Choose Advertise Purple for Professional Affiliate Management Matters',
  e4nh3wub8qmz: 'At Advertise Purple, we help ecommerce brands turn affiliate marketing into a structured, scalable revenue channel. Our team manages the day-to-day demands of affiliate recruitment, partner relationships, compliance, performance monitoring, and optimization, giving brands the expertise and infrastructure needed to grow without adding to their internal workload.\n\nProfessional affiliate management brings consistency to every stage of the program. With a clear strategy, ongoing oversight, and data-driven decision-making, brands can build stronger partnerships and pursue sustainable long-term growth.',
};

const LISTS = { // list node id -> list_items contents (extra entries are cloned from the last item)
  jdhi2rqwpmf3: [
    'Dedicated specialists manage daily affiliate operations',
    'Targeted recruitment connects brands with relevant publishers and creators',
    'Data-driven optimization supports continuous program improvement',
    'Compliance and traffic quality monitoring help reduce program risk',
    'Structured reporting keeps performance visible without daily operational involvement',
  ].map(p),
  xiodk9jey1b3: [
    'Requires internal resources for affiliate communications and daily program operations',
    'Adds responsibility for tracking, validation, payments, and partner support',
    'Requires specialized knowledge of affiliate recruitment and optimization',
  ].map(p),
  v8eiaproj4zy: [
    'Provides a dedicated outsourced affiliate team to manage daily operations',
    'Handles recruitment, onboarding, communication, tracking, and partner support',
    'Applies specialized ecommerce affiliate management expertise to ongoing optimization',
  ].map(p),
  // ✓ line; the module already renders a check-circle icon, so the "✓" glyph is dropped
  '3sud9vhx7ct0': [p('Build a stronger affiliate program with experienced management, strategic partnerships, and ongoing optimization focused on sustainable ecommerce growth.')],
};

const FAQ = [
  ['What is ecommerce affiliate management?', 'Ecommerce affiliate management is the process of building, operating, monitoring, and optimizing a network of third-party partners that promote an online store\'s products.'],
  ['What does an ecommerce affiliate management agency do?', 'An agency manages affiliate recruitment, onboarding, communication, tracking, validation, payments, compliance, reporting, and ongoing performance optimization on behalf of an ecommerce brand.'],
  ['Why should an ecommerce business outsource affiliate management?', 'Outsourcing reduces internal workload while giving the business access to specialized affiliate expertise, structured processes, partner relationships, and ongoing program optimization.'],
  ['What types of affiliates can Advertise Purple recruit?', 'Potential partners can include content publishers, bloggers, loyalty platforms, deal sites, and digital creators whose audiences and promotional approach fit the brand.'],
  ['How does affiliate recruitment work?', 'The process begins by identifying potential partners that fit the brand\'s market and customer base. Relevant affiliates are evaluated, contacted, and onboarded when the partnership is appropriate.'],
  ['Does Advertise Purple manage affiliate relationships after recruitment?', 'Yes. Ongoing partner management includes communication, program updates, creative resources, support, performance monitoring, and continued relationship development.'],
  ['Can affiliate management help reduce internal workload?', 'Yes. An outsourced team can handle daily affiliate communications, tracking, validation, payments, recruitment, and other operational responsibilities that would otherwise require internal resources.'],
  ['How are affiliate commissions determined?', 'Commission structures are developed as part of the broader affiliate strategy and aligned with business goals, promotional guidelines, partner considerations, and the economics of the program.'],
  ['How does Advertise Purple monitor affiliate quality?', 'Potential partners are evaluated for quality and relevance before onboarding. Active programs are also monitored for compliance, partner conduct, and traffic quality.'],
  ['How can affiliate management reduce fraud risk?', 'Ongoing monitoring of publisher conduct and traffic quality can help identify potential compliance issues or suspicious activity before those problems create unnecessary financial or reputational exposure.'],
  ['Does Advertise Purple handle affiliate tracking and reporting?', 'Yes. Technical setup includes tracking links and reporting tools, while ongoing management keeps performance information organized and accessible for strategic decision-making.'],
  ['Can Advertise Purple help set up a new affiliate program?', 'Yes. The team can support platform selection, technical configuration, tracking, reporting, coupon integration, program strategy, commission structures, partner policies, and recruitment.'],
  ['Can Advertise Purple manage an existing affiliate program?', 'Yes. Existing programs can be supported through ongoing partner management, recruitment, optimization, compliance monitoring, reporting, and strategic refinement.'],
  ['What makes Advertise Purple different from other affiliate management agencies?', 'Advertise Purple operates as an extension of the brand, combining dedicated management, structured reporting, proactive communication, targeted recruitment, and long-term partner development.'],
  ['How does professional affiliate management support long-term growth?', 'Consistent recruitment, partner support, performance optimization, and compliance create a stronger foundation for developing productive relationships and expanding affiliate revenue over time.'],
];
const ACCORDIONS = { // accordion node id -> [label, content] items (extra entries are cloned from the last item)
  '6xvzamb8y1jf': [
    ['Technical Foundation', p('A reliable affiliate program begins with accurate technical configuration. Tracking links, reporting tools, coupon codes, and other program components are established and verified so performance can be measured correctly.')],
    ['Strategic Program Management', p('Commission structures, promotional guidelines, and partner policies are developed around the brand’s objectives. This gives affiliates a clear framework for promoting products while keeping activity aligned with the business.')],
    ['Partner Quality and Compliance', p('Potential affiliates are evaluated for relevance and quality before onboarding. Once active, partner conduct and traffic quality are monitored to help maintain program standards and reduce exposure to fraudulent or non-compliant activity.')],
  ],
  gc52timsvah9: FAQ.slice(0, 7).map(([q, a], i) => [faqLabel(i + 1, q), p(a)]),
  e746sup5h3di: FAQ.slice(7).map(([q, a], i) => [faqLabel(i + 8, q), p(a)]),
};

// ---------------------------------------------------------------- read source
const xml = fs.readFileSync(SRC, 'utf8');
const items = [...xml.matchAll(/<item>([\s\S]*?)<\/item>/g)].map(m => m[1]);
if (items.length !== 1 || !items[0].includes('<wp:post_id>800248</wp:post_id>')) throw new Error('Expected exactly one item: page 800248');
const metaRaw = key => {
  for (const m of items[0].matchAll(/<wp:postmeta>([\s\S]*?)<\/wp:postmeta>/g))
    if (m[1].includes(`<![CDATA[${key}]]>`))
      return /<wp:meta_value>([\s\S]*?)<\/wp:meta_value>/.exec(m[1])[1].replace(/<!\[CDATA\[([\s\S]*?)\]\]>/g, '$1');
  throw new Error(`meta ${key} missing`);
};
const b = P.enc(metaRaw('_fl_builder_draft'));
const root = P.parse(b);
const nodeVal = id => { const v = P.get(b, root, id); if (!v) throw new Error(`node ${id} not found`); return v; };
const settings = id => P.get(b, nodeVal(id), 'settings');

// ---------------------------------------------------------------- collect edits (original byte coordinates)
const edits = []; // {s, e, text}
const report = [];
const strEdit = (n, val) => { edits.push({ s: n.s, e: n.e, text: P.ser(val) }); };

for (const [id, val] of Object.entries(TEXT)) {
  const st = settings(id);
  const field = P.get(b, st, 'heading') ? 'heading' : 'text';
  const n = P.get(b, st, field);
  if (!n || n.t !== 's') throw new Error(`${id}: no string ${field}`);
  report.push([id, field, P.dec(P.str(b, n)), val]);
  strEdit(n, val);
}

function arrayEdits(id, key, wanted, apply) {
  const arr = P.get(b, settings(id), key);
  if (!arr || arr.t !== 'a') throw new Error(`${id}: ${key} is not an array`);
  wanted.forEach((w, i) => { if (i < arr.kids.length) apply(arr.kids[i].v, w, i, false); });
  if (wanted.length < arr.kids.length) throw new Error(`${id}: fewer items than slots; removal not approved`);
  if (wanted.length > arr.kids.length) {
    const last = arr.kids[arr.kids.length - 1].v;
    let tpl = b.slice(last.s, last.e);
    const sub = P.parse(tpl);
    (function noRefs(n) { if (n.t === 'r' || n.t === 'R') throw new Error(`${id}: cloned item has a reference`); (n.kids || []).forEach(k => noRefs(k.v)); })(sub);
    let added = '';
    for (let i = arr.kids.length; i < wanted.length; i++) {
      const local = []; apply(sub, wanted[i], i, true, local, tpl);
      local.sort((x, y) => y.s - x.s); let c = tpl; for (const ed of local) c = c.slice(0, ed.s) + ed.text + c.slice(ed.e);
      added += `i:${i};` + c;
    }
    const lastIdx = Number(P.keyOf(b, arr.kids[arr.kids.length - 1].k));
    if (lastIdx !== arr.kids.length - 1) throw new Error(`${id}: non-sequential array keys`);
    const header = b.slice(arr.s, arr.s + 20).match(/^a:\d+:\{/)[0];
    edits.push({ s: arr.s, e: arr.s + header.length, text: `a:${wanted.length}:{` });
    edits.push({ s: last.e, e: last.e, text: added });
  }
}
const setIn = (obj, field, val, isClone, local, tplStr, label) => {
  const n = P.get(isClone ? tplStr : b, obj, field);
  if (!n || n.t !== 's') throw new Error(`missing ${field}`);
  if (isClone) local.push({ s: n.s, e: n.e, text: P.ser(val) });
  else { report.push([label, field, P.dec(P.str(b, n)), val]); strEdit(n, val); }
};
for (const [id, list] of Object.entries(LISTS))
  arrayEdits(id, 'list_items', list, (obj, val, i, clone, local, tpl) => {
    setIn(obj, 'content', val, clone, local, tpl, `${id}[${i}]`);
    if (clone) report.push([`${id}[${i}]`, 'content (new item)', '', val]);
  });
for (const [id, list] of Object.entries(ACCORDIONS))
  arrayEdits(id, 'items', list, (obj, [label, content], i, clone, local, tpl) => {
    setIn(obj, 'label', label, clone, local, tpl, `${id}[${i}]`);
    setIn(obj, 'content', content, clone, local, tpl, `${id}[${i}]`);
    if (clone) report.push([`${id}[${i}]`, 'label+content (new item)', '', `${label}\n${content}`]);
  });

// ---------------------------------------------------------------- apply edits, then renumber r:N references
edits.sort((x, y) => x.s - y.s || x.e - y.e);
for (let i = 1; i < edits.length; i++) if (edits[i].s < edits[i - 1].e) throw new Error('overlapping edits');
const mapPos = pos => { let d = 0; for (const ed of edits) { if (ed.e <= pos) d +=ed.text.length - (ed.e - ed.s); } return pos + d; };
let out = ''; let cur = 0;
for (const ed of edits) { out += b.slice(cur, ed.s) + ed.text; cur = ed.e; }
out += b.slice(cur);

const oldSlots = []; const oldRefs = [];
(function w(n) { oldSlots[n.slot] = n; if (n.t === 'r') oldRefs.push(n); (n.kids || []).forEach(k => w(k.v)); })(root);
let nr = P.parse(out); const slotAt = new Map(); const newRefs = [];
(function w(n) { slotAt.set(n.s, n.slot); if (n.t === 'r') newRefs.push(n); (n.kids || []).forEach(k => w(k.v)); })(nr);
if (newRefs.length !== oldRefs.length) throw new Error('reference count changed');
const refFix = [];
oldRefs.forEach((r, i) => {
  const want = slotAt.get(mapPos(oldSlots[+r.v].s));
  if (!want) throw new Error(`ref target lost for r:${r.v}`);
  if (String(want) !== newRefs[i].v) refFix.push({ s: newRefs[i].s, e: newRefs[i].e, text: `r:${want};` });
});
for (const f of refFix.sort((x, y) => y.s - x.s)) out = out.slice(0, f.s) + f.text + out.slice(f.e);
nr = P.parse(out);

// ---------------------------------------------------------------- verify: only the intended fields changed
const SCOPE = { stdClass: H.stdClass };
const plain = s => phpSerialize.unserialize(s, SCOPE, { strict: true });
const deref = (s, rootNode) => { // resolve r:N to deep copies so the generic unserializer can compare structure
  const slots = []; (function w(n) { slots[n.slot] = n; (n.kids || []).forEach(k => w(k.v)); })(rootNode);
  const refs = []; (function w(n) { if (n.t === 'r') refs.push(n); (n.kids || []).forEach(k => w(k.v)); })(rootNode);
  let r = s; for (const x of refs.sort((a, c) => c.s - a.s)) { const t = slots[+x.v]; r = r.slice(0, x.s) + s.slice(t.s, t.e) + r.slice(x.e); }
  return r;
};
const A = plain(P.dec(deref(b, root))), B = plain(P.dec(deref(out, nr)));
const changed = [];
(function cmp(x, y, at) {
  if (x && y && typeof x === 'object' && typeof y === 'object') {
    for (const k of new Set([...Object.keys(x), ...Object.keys(y)])) cmp(x[k], y[k], `${at}/${k}`);
  } else if (x !== y) changed.push(at);
})(A, B, '');
const allowed = new Set();
for (const id of Object.keys(TEXT)) { allowed.add(`/${id}/settings/heading`); allowed.add(`/${id}/settings/text`); }
const okPath = pth => allowed.has(pth)
  || Object.keys(LISTS).some(id => new RegExp(`^/${id}/settings/list_items/\\d+(/|$)`).test(pth))
  || Object.keys(ACCORDIONS).some(id => new RegExp(`^/${id}/settings/items/\\d+(/|$)`).test(pth));
const unexpected = changed.filter(c => !okPath(c));
if (unexpected.length) throw new Error(`Unexpected changes:\n${unexpected.join('\n')}`);
const extraKeys = changed.filter(c => /\/(list_items|items)\/\d+\/(?!content$|label$)/.test(c) && !/\/(list_items|items)\/\d+$/.test(c));
// new items differ from nothing in A, so their sub-fields show up; make sure only cloned (new) indexes do
for (const c of extraKeys) { const [, id, , idx] = c.split('/'); const arrA = A[id].settings[c.includes('/list_items/') ? 'list_items' : 'items']; if (arrA[idx] !== undefined) throw new Error(`style field changed on existing item: ${c}`); }
if (Object.keys(A).length !== Object.keys(B).length) throw new Error('node count changed');

// ---------------------------------------------------------------- render WXR (BB saved layout template)
const header = H.flExtractSiteHeader(SRC);
const now = new Date();
const pad = n => String(n).padStart(2, '0');
const postDate = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
const item = H.flRenderItem({
  post_id: 990248, // free slot is kept by the importer; otherwise WP assigns a new id (harmless)
  post_name: 'ecommerce-800248-content-2026-10-02',
  title: 'Ecommerce Affiliate Management – page 800248 content (2026-10-02)',
  serialized: P.dec(out),
  author_login: header.author_login,
  site_url: header.site_url,
  pub_date: now.toUTCString(),
  post_date: postDate,
});
const wxr = H.flRenderWxrDocument(header, item, now.toUTCString());
const wf = XMLValidator.validate(wxr, { allowBooleanAttributes: true });
if (wf !== true) throw new Error(`WXR not well-formed: ${JSON.stringify(wf)}`);
// Round-trip the meta value exactly as the importer will read it
const back = /<wp:meta_key><!\[CDATA\[_fl_builder_data\]\]><\/wp:meta_key>\s*<wp:meta_value>([\s\S]*?)<\/wp:meta_value>/.exec(wxr)[1].replace(/<!\[CDATA\[([\s\S]*?)\]\]>/g, '$1');
if (back !== P.dec(out)) throw new Error('CDATA round-trip mismatch');
fs.writeFileSync(OUT, wxr);

// ---------------------------------------------------------------- before/after report
const md = ['# Page 800248 – before/after (Beaver Builder text)', '',
  `Source doc: https://docs.google.com/document/d/1vsEwmINfjNyHiq2rWJcZxwWwm4Y-DQIo/  `,
  `Base: _fl_builder_draft from advertisepurple.WordPress.2026-10-02.xml (${Object.keys(A).length} nodes, unchanged count)  `,
  `Fields changed: ${changed.length} paths, all text/list/accordion content; references renumbered: ${refFix.length}`, ''];
for (const [id, field, before, after] of report)
  md.push(`### ${id} · ${field}`, '', '**Before**', '', '```', before || '(new)', '```', '', '**After**', '', '```', after, '```', '');
fs.writeFileSync(DIFF, md.join('\n'));
console.log(`OK  ${path.basename(OUT)} (${wxr.length} bytes), ${report.length} field edits, ${changed.length} changed paths, ${refFix.length} refs renumbered`);
