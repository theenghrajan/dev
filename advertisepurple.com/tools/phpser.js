'use strict';
// Byte-accurate PHP serialize tokenizer that keeps spans, so values can be edited in place
// without re-serializing (keeps floats, references and formatting byte-identical).
// Works on a 'latin1' string where 1 char = 1 byte.
// Every value gets a PHP var_hash slot number (1-based, keys excluded, R: refs excluded).
function parse(b) {
  let p = 0, slot = 0;
  const num = () => { const m = /^-?[\d.E+\-INFAN]+/.exec(b.slice(p, p + 400)); p += m[0].length; return m[0]; };
  function val(isKey) {
    const s = p, t = b[p]; p += 2; const n = { t, s };
    if (!isKey && t !== 'R') n.slot = ++slot;
    if (t === 's') { const len = +num(); p += 2; n.vs = p; p += len; n.ve = p; p += 2; }
    else if (t === 'i' || t === 'd' || t === 'b' || t === 'r' || t === 'R') { n.v = num(); p += 1; }
    else if (t === 'N') { p = s + 2; }
    else if (t === 'a' || t === 'O') {
      if (t === 'O') { const len = +num(); p += 2 + len + 2; }
      n.count = +num(); n.cs = s; p += 2; n.kids = [];
      for (let i = 0; i < n.count; i++) { const k = val(true); const v = val(false); n.kids.push({ k, v }); }
      p += 1;
    } else throw new Error(`bad type ${t} at ${s}`);
    n.e = p; return n;
  }
  const root = val(false);
  if (p !== b.length) throw new Error(`trailing data at ${p}/${b.length}`);
  return root;
}
const str = (b, n) => b.slice(n.vs, n.ve);                 // raw bytes of a string value
const keyOf = (b, k) => (k.t === 's' ? str(b, k) : k.v);
const get = (b, n, key) => { const kv = n.kids.find(x => String(keyOf(b, x.k)) === String(key)); return kv && kv.v; };
const enc = s => Buffer.from(s, 'utf8').toString('latin1');  // JS text -> latin1 byte string
const dec = s => Buffer.from(s, 'latin1').toString('utf8');
const ser = s => { const x = enc(s); return `s:${x.length}:"${x}";`; };
module.exports = { parse, str, keyOf, get, enc, dec, ser };
