<?php /* Template Name: NPTI - Personal Trainer Certification Florida */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KB5B4ZZ4');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title>Personal Trainer Certification in Florida | NPTI Florida</title>
  <meta name="description" content="NPTI Florida's 600-hour ACCSC-accredited diploma program for personal trainers. Available in Orlando and Tampa. GI Bill approved. Federal financial aid available.">
  <link rel="canonical" href="https://nptiflorida.edu/lp/personal-trainer-certification-florida/">

  <!-- LocalBusiness Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "NPTI Florida",
    "description": "NPTI Florida offers a 600-hour ACCSC-accredited personal training diploma program at campuses in Orlando and Tampa.",
    "url": "https://nptiflorida.edu",
    "telephone": "+1-407-772-0057",
    "email": "admission@nptifl.com",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Orlando",
      "addressRegion": "FL",
      "addressCountry": "US"
    },
    "sameAs": ["https://nptiflorida.edu"]
  }
  </script>

  <!-- Google Fonts Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

  <style>
    /* =============================================
       WP ROCKET LRC OVERRIDE
       Prevents Lazy Render Content from hiding elements above the fold
    ============================================= */
    [data-rocket-lazy-render] {
      opacity: 1 !important;
      visibility: visible !important;
      transition: none !important;
    }

    /* =============================================
       CSS CUSTOM PROPERTIES
    ============================================= */
    :root {
      --navy: #1A3A6B;
      --deep-navy: #0F2347;
      --orange: #E87722;
      --orange-hover: #C96A10;
      --off-white: #F7F4EF;
      --muted: #3D5280;
      --white: #ffffff;
      --text-dark: #111827;
      --border: #D1C9BA;
      --card-bg: #ffffff;
    }

    /* =============================================
       RESET & BASE
    ============================================= */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      line-height: 1.6;
      color: var(--text-dark);
      background: var(--white);
    }

    h1, h2, h3, h4 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      line-height: 1.2;
    }

    img { max-width: 100%; height: auto; display: block; }

    a { color: var(--orange); text-decoration: none; }
    a:hover { color: var(--orange-hover); }

    /* =============================================
       STICKY HEADER
    ============================================= */
    .site-header {
      position: sticky;
      top: 0;
      z-index: 100;
      background: var(--deep-navy);
      padding: 14px 24px;
      transition: box-shadow 0.3s ease;
    }

    .site-header:has(+ *) {
      box-shadow: 0 2px 12px rgba(0,0,0,0.25);
    }

    /* Use scroll detection via CSS only — add shadow always for stickiness feel */
    .site-header {
      box-shadow: 0 2px 12px rgba(0,0,0,0.3);
    }

    .header-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      align-items: center;
    }

    .header-logo img {
      height: 52px;
      width: auto;
    }

    /* =============================================
       HERO SECTION
    ============================================= */
    .hero {
      background: linear-gradient(135deg, rgba(15,35,71,0.92) 0%, rgba(26,58,107,0.88) 60%, rgba(30,68,128,0.85) 100%), url('https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
      position: relative;
      overflow: hidden;
      padding: 80px 24px;
    }

    /* Geometric pattern overlay */
    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 48px 48px;
      pointer-events: none;
    }

    .hero::after {
      content: '';
      position: absolute;
      top: -60px;
      right: -60px;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(232,119,34,0.08) 0%, transparent 70%);
      pointer-events: none;
    }

    .hero-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 60px;
      align-items: start;
      position: relative;
      z-index: 1;
    }

    .hero-content { color: var(--white); }

    .hero-badge {
      display: inline-block;
      background: rgba(232,119,34,0.15);
      border: 1px solid rgba(232,119,34,0.4);
      color: var(--orange);
      font-family: 'Poppins', sans-serif;
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 3px;
      margin-bottom: 20px;
    }

    .hero h1 {
      font-size: clamp(28px, 4vw, 44px);
      color: var(--white);
      margin-bottom: 18px;
      letter-spacing: -0.02em;
    }

    .hero h1 em {
      font-style: italic;
      color: var(--orange);
    }

    .hero-subhead {
      font-size: 17px;
      color: rgba(255,255,255,0.82);
      margin-bottom: 28px;
      line-height: 1.65;
      font-weight: 400;
    }

    .hero-bullets {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .hero-bullets .bullet-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 15px;
      color: rgba(255,255,255,0.88) !important;
      font-weight: 500;
      opacity: 1 !important;
      visibility: visible !important;
    }

    .hero-bullets .bullet-item::before {
      content: '';
      display: block;
      flex-shrink: 0;
      width: 20px;
      height: 20px;
      margin-top: 1px;
      background: var(--orange);
      border-radius: 50%;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='white'%3E%3Cpath fill-rule='evenodd' d='M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z' clip-rule='evenodd'/%3E%3C/svg%3E");
      background-size: 14px;
      background-repeat: no-repeat;
      background-position: center;
    }

    /* =============================================
       CONTACT FORM
    ============================================= */
    .hero-form-card {
      background: var(--white);
      border-radius: 8px;
      padding: 36px 32px;
      box-shadow: 0 8px 40px rgba(0,0,0,0.28);
    }

    .form-heading {
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 6px;
    }

    .form-subtext {
      font-size: 14px;
      color: var(--muted);
      margin-bottom: 22px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: var(--muted);
      margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 13px 14px;
      border: 1.5px solid var(--border);
      border-radius: 5px;
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      color: var(--text-dark);
      background: #fff;
      transition: border-color 0.2s;
      min-height: 48px;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--navy);
      box-shadow: 0 0 0 3px rgba(26,58,107,0.12);
    }

    .btn-primary {
      display: block;
      width: 100%;
      padding: 16px 24px;
      background: var(--orange);
      color: var(--white);
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 0.02em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.2s, transform 0.1s;
      min-height: 52px;
      text-align: center;
    }

    .btn-primary:hover {
      background: var(--orange-hover);
      transform: translateY(-1px);
    }

    .btn-primary:active { transform: translateY(0); }

    .form-disclaimer {
      font-size: 12px;
      color: #6B7280;
      text-align: center;
      margin-top: 12px;
      line-height: 1.5;
    }

    /* =============================================
       STAT BAR
    ============================================= */
    .stat-bar {
      background: var(--deep-navy);
      padding: 52px 24px;
    }

    .stat-bar-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 32px;
      text-align: center;
    }

    .stat-item {}

    .stat-number {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(28px, 3.5vw, 40px);
      font-weight: 700;
      color: var(--orange);
      line-height: 1;
      margin-bottom: 6px;
    }

    .stat-label {
      font-size: 13px;
      color: rgba(255,255,255,0.75);
      font-weight: 500;
      letter-spacing: 0.02em;
    }

    .stat-divider {
      border: none;
      border-right: 1px solid rgba(255,255,255,0.12);
    }

    /* =============================================
       SECTION UTILITIES
    ============================================= */
    .section-light {
      background: var(--off-white);
      padding: 90px 24px;
    }

    .section-dark {
      background: var(--deep-navy);
      padding: 90px 24px;
    }

    .section-white {
      background: var(--white);
      padding: 90px 24px;
    }

    .section-inner {
      max-width: 1100px;
      margin: 0 auto;
    }

    .eyebrow {
      font-family: 'Poppins', sans-serif;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.18em;
      color: var(--orange);
      margin-bottom: 14px;
      display: block;
    }

    .section-heading {
      font-size: clamp(24px, 3vw, 36px);
      color: var(--navy);
      margin-bottom: 16px;
    }

    .section-heading-white {
      font-size: clamp(24px, 3vw, 36px);
      color: var(--white);
      margin-bottom: 16px;
    }

    .section-intro {
      font-size: 17px;
      color: var(--muted);
      max-width: 640px;
      margin-bottom: 48px;
      line-height: 1.65;
    }

    /* =============================================
       DIFFERENTIATOR CARDS
    ============================================= */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
      margin-top: 48px;
    }

    .card {
      background: var(--white);
      border-radius: 8px;
      padding: 32px 28px;
      border-top: 3px solid var(--orange);
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 24px rgba(0,0,0,0.11);
    }

    .card-icon {
      width: 44px;
      height: 44px;
      background: rgba(232,119,34,0.1);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 18px;
    }

    .card-icon svg {
      width: 24px;
      height: 24px;
      fill: var(--orange);
    }

    .card h3 {
      font-size: 17px;
      color: var(--navy);
      margin-bottom: 10px;
      font-weight: 700;
    }

    .card p {
      font-size: 15px;
      color: var(--muted);
      line-height: 1.65;
    }

    /* =============================================
       TESTIMONIALS
    ============================================= */
    .testimonials-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      margin-top: 48px;
    }

    .testimonial-card {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px;
      padding: 32px 28px;
    }

    .testimonial-quote {
      font-size: 15px;
      color: rgba(255,255,255,0.88);
      line-height: 1.7;
      font-style: italic;
      margin-bottom: 20px;
    }

    .testimonial-quote::before {
      content: '\201C';
      font-size: 40px;
      color: var(--orange);
      line-height: 0.8;
      display: block;
      margin-bottom: 8px;
      font-style: normal;
      font-family: Georgia, serif;
    }

    .testimonial-author {
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: var(--orange);
    }

    /* =============================================
       FAQ ACCORDION (Pure CSS)
    ============================================= */
    .faq-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-top: 48px;
    }

    .faq-item {
      border: 1.5px solid var(--border);
      border-radius: 6px;
      overflow: hidden;
      background: var(--white);
    }

    .faq-item summary {
      list-style: none;
      cursor: pointer;
      padding: 22px 24px;
      font-family: 'Poppins', sans-serif;
      font-size: 16px;
      font-weight: 600;
      color: var(--navy);
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      min-height: 48px;
      user-select: none;
    }

    .faq-item summary::-webkit-details-marker { display: none; }

    .faq-item summary::after {
      content: '+';
      font-size: 22px;
      font-weight: 400;
      color: var(--orange);
      flex-shrink: 0;
      transition: transform 0.25s ease;
    }

    .faq-item[open] summary::after {
      transform: rotate(45deg);
    }

    .faq-item[open] summary {
      color: var(--orange);
      border-bottom: 1px solid var(--border);
    }

    .faq-answer {
      padding: 22px 24px;
      font-size: 15px;
      color: var(--muted);
      line-height: 1.7;
    }

    /* =============================================
       FINAL CTA SECTION
    ============================================= */
    .cta-section {
      background: var(--deep-navy);
      padding: 90px 24px;
      text-align: center;
    }

    .cta-section-inner {
      max-width: 800px;
      margin: 0 auto;
    }

    .campus-contacts {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      margin: 40px 0 30px;
    }

    .campus-contact-card {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 8px;
      padding: 28px 24px;
    }

    .campus-contact-card h3 {
      font-size: 16px;
      color: var(--orange);
      margin-bottom: 14px;
    }

    .campus-contact-card a {
      display: block;
      color: rgba(255,255,255,0.9);
      font-size: 17px;
      font-weight: 500;
      margin-bottom: 8px;
      transition: color 0.2s;
    }

    .campus-contact-card a:hover { color: var(--orange); }

    .cta-or {
      font-size: 14px;
      color: rgba(255,255,255,0.55);
    }

    .btn-schedule {
      display: inline-block;
      background: transparent;
      color: #fff;
      border: 2px solid rgba(255,255,255,0.65);
      padding: 14px 32px;
      border-radius: 6px;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 16px;
      text-decoration: none;
      transition: background 0.2s, border-color 0.2s, color 0.2s;
      margin-top: 8px;
    }
    .btn-schedule:hover {
      background: rgba(255,255,255,0.1);
      border-color: #fff;
      color: #fff;
    }

    /* =============================================
       FOOTER
    ============================================= */
    .site-footer {
      background: #080E1A;
      padding: 32px 24px;
      text-align: center;
    }

    .site-footer img {
      height: 40px;
      width: auto;
      margin: 0 auto 16px;
    }

    .footer-copy {
      font-size: 13px;
      color: rgba(255,255,255,0.45);
      margin-bottom: 8px;
    }

    .footer-accred {
      font-size: 12px;
      color: rgba(255,255,255,0.3);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.5;
    }

    /* =============================================
       ACCREDITATION TRUST STRIP
    ============================================= */
    .trust-strip {
      background: var(--deep-navy);
      padding: 40px 24px;
      border-top: 1px solid rgba(255,255,255,0.06);
    }

    .trust-strip-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      gap: 24px 40px;
      justify-content: center;
      align-items: center;
    }

    .trust-item {
      display: flex;
      align-items: center;
      gap: 10px;
      color: rgba(255,255,255,0.75);
      font-size: 14px;
      font-weight: 500;
    }

    .trust-dot {
      width: 8px;
      height: 8px;
      background: var(--orange);
      border-radius: 50%;
      flex-shrink: 0;
    }

    /* =============================================
       RESPONSIVE — 768px BREAKPOINT
    ============================================= */
    @media (max-width: 768px) {
      .hero {
        padding: 60px 20px;
      }

      .hero-inner {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .hero-form-card {
        padding: 28px 22px;
      }

      .stat-bar {
        padding: 48px 20px;
      }

      .stat-bar-inner {
        grid-template-columns: repeat(2, 1fr);
        gap: 32px 20px;
      }

      .section-light,
      .section-dark,
      .section-white,
      .cta-section {
        padding: 60px 20px;
      }

      .cards-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 32px;
      }

      .testimonials-grid {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 32px;
      }

      .campus-contacts {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      .faq-item summary {
        font-size: 15px;
        padding: 18px 20px;
      }

      .faq-answer {
        padding: 18px 20px;
      }

      .trust-strip {
        padding: 30px 20px;
      }
    }

    @media (max-width: 480px) {
      .stat-bar-inner {
        grid-template-columns: 1fr 1fr;
      }
    }
  </style>
</head>
<body>

  <!-- STICKY HEADER -->
  <header class="site-header" role="banner">
    <div class="header-inner">
      <a href="https://nptiflorida.edu" class="header-logo" aria-label="NPTI Florida - Return to Homepage">
        <img
          src="https://nptiflorida.edu/wp-content/uploads/2026/06/national-presonal-training-institute-logo.webp"
          alt="National Personal Training Institute of Florida logo"
          width="180"
          height="52"
          loading="eager"
        >
      </a>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-heading">
    <div class="hero-inner">

      <!-- Left: Copy -->
      <div class="hero-content">
        <span class="hero-badge">ACCSC-Accredited | 25+ Years</span>
        <h1 id="hero-heading">Personal Trainer Certification in <em>Florida</em></h1>
        <p class="hero-subhead">NPTI's 600-hour ACCSC-accredited diploma program — available at campuses in Orlando and Tampa, with HyFlex hybrid options statewide. GI Bill approved. Financial aid available.</p>
        <div class="hero-bullets">
          <div class="bullet-item">An ACCSC-accredited personal training school serving Florida</div>
          <div class="bullet-item">600 hours of classroom + hands-on practical training — not a weekend course</div>
          <div class="bullet-item">GI Bill Ch. 30 &amp; 33 accepted | Federal financial aid available</div>
        </div>
      </div>

      <!-- Right: Form -->
      <div class="hero-form-card">
        <p class="form-heading">Get Program Details</p>
        <p class="form-subtext">Speak with a program advisor — no obligation.</p>
        <!-- Form action should connect to CRM/email handler — currently placeholder -->
        <form action="#" method="POST" novalidate>
          <div class="form-group">
            <label for="full-name">Full Name <span aria-hidden="true">*</span></label>
            <input type="text" id="full-name" name="full_name" placeholder="Jane Smith" required autocomplete="name" minlength="2">
          </div>
          <div class="form-group">
            <label for="email">Email Address <span aria-hidden="true">*</span></label>
            <input type="email" id="email" name="email" placeholder="jane@example.com" required autocomplete="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number <span aria-hidden="true">*</span></label>
            <input type="tel" id="phone" name="phone" placeholder="(407) 555-0100" required autocomplete="tel">
          </div>
          <div class="form-group">
            <label for="campus">Select Campus <span aria-hidden="true">*</span></label>
            <select id="campus" name="campus" required>
              <option value="" disabled selected>Select Campus</option>
              <option value="orlando">Orlando</option>
              <option value="tampa">Tampa</option>
            </select>
          </div>
          <button type="submit" class="btn-primary">Request Program Info &rarr;</button>
          <p class="form-disclaimer">No obligation. A program advisor will follow up within 1 business day.</p>
        </form>
      </div>

    </div>
  </section>

  <!-- STAT BAR -->
  <div class="stat-bar" role="region" aria-label="Program statistics">
    <div class="stat-bar-inner">
      <div class="stat-item">
        <div class="stat-number">600</div>
        <div class="stat-label">Hours | Classroom + Practical</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">88–90%</div>
        <div class="stat-label">ACCSC Graduation Rate</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">75–77%</div>
        <div class="stat-label">ACCSC Placement Rate</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">$10,500</div>
        <div class="stat-label">Total Program Cost</div>
      </div>
    </div>
  </div>

  <!-- PROGRAM PHOTO STRIP -->
  <div style="line-height:0; overflow:hidden; max-height:440px;">
    <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?auto=format&fit=crop&w=1400&q=80" alt="NPTI Florida personal training program — hands-on practical training" style="width:100%; max-height:440px; object-fit:cover; object-position:center 30%; display:block;">
  </div>

  <!-- TRUST STRIP -->
  <div class="trust-strip" role="region" aria-label="Credentials and trust signals">
    <div class="trust-strip-inner">
      <div class="trust-item"><span class="trust-dot"></span>Veteran-Owned School</div>
      <div class="trust-item"><span class="trust-dot"></span>25+ Years Training Professionals</div>
      <div class="trust-item"><span class="trust-dot"></span>GI Bill Chapter 30 &amp; 33 Approved</div>
      <div class="trust-item"><span class="trust-dot"></span>Federal Financial Aid Available</div>
      <div class="trust-item"><span class="trust-dot"></span>FAFSA Code: 042505</div>
    </div>
  </div>

  <!-- DIFFERENTIATOR CARDS -->
  <section class="section-light" aria-labelledby="diff-heading">
    <div class="section-inner">
      <span class="eyebrow">Why NPTI Florida</span>
      <h2 class="section-heading" id="diff-heading">A Program Built for Serious Fitness Careers</h2>
      <p class="section-intro">NPTI Florida prepares graduates for real-world fitness careers through one of the most rigorous personal training programs in the state.</p>
      <div class="cards-grid">

        <div class="card">
          <div class="card-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          </div>
          <h3>A Diploma, Not Just a Certificate</h3>
          <p>600 hours of science-based curriculum including 100 hours of anatomy &amp; physiology and 100 hours of nutrition. Graduates earn an ACCSC-accredited diploma recognized by employers nationwide.</p>
        </div>

        <div class="card">
          <div class="card-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17H7A5 5 0 017 7h2M15 7h2a5 5 0 010 10h-2M8 12h8"/></svg>
          </div>
          <h3>Attend Your Way</h3>
          <p>NPTI's HyFlex model lets you choose how you participate each session: in-person at our Orlando or Tampa campus, live online video, or recorded sessions at your own pace.</p>
        </div>

        <div class="card">
          <div class="card-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3>Financial Aid &amp; Veteran Benefits</h3>
          <p>Federal financial aid (FAFSA code 042505), Pell Grants, and GI Bill Chapter 30 &amp; Chapter 33 benefits are available. Housing assistance for out-of-state students at the Orlando campus.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- DOL DATA SECTION -->
  <section class="section-white" aria-labelledby="outlook-heading">
    <div class="section-inner" style="text-align:center; max-width:780px; margin:0 auto;">
      <span class="eyebrow">Industry Outlook</span>
      <h2 class="section-heading" id="outlook-heading">A Growing Field Worth Entering Prepared</h2>
      <p class="section-intro" style="margin:0 auto 40px;">The U.S. Bureau of Labor Statistics projects significant growth in the fitness industry over the coming decade.</p>
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
        <div style="background:var(--off-white); border-radius:8px; padding:32px 24px; border-top:3px solid var(--orange);">
          <div style="font-family:'Poppins',sans-serif; font-size:40px; font-weight:700; color:var(--navy); margin-bottom:8px;">$56K</div>
          <div style="font-size:14px; color:var(--muted); font-weight:500;">Median Annual Pay<br><span style="font-size:12px; color:#6B7280;">U.S. Bureau of Labor Statistics</span></div>
        </div>
        <div style="background:var(--off-white); border-radius:8px; padding:32px 24px; border-top:3px solid var(--orange);">
          <div style="font-family:'Poppins',sans-serif; font-size:40px; font-weight:700; color:var(--navy); margin-bottom:8px;">24%</div>
          <div style="font-size:14px; color:var(--muted); font-weight:500;">Projected 10-Year Job Growth<br><span style="font-size:12px; color:#6B7280;">U.S. Bureau of Labor Statistics</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="section-dark" aria-labelledby="testimonials-heading">
    <div class="section-inner">
      <span class="eyebrow">Student Outcomes</span>
      <h2 class="section-heading-white" id="testimonials-heading">From Students Who've Been Through the Program</h2>
      <div class="testimonials-grid">

        <div class="testimonial-card">
          <p class="testimonial-quote">Absolutely loved my time at NPTI Florida. I like the Veteran community here a lot. The staff and owner understand the challenges of transitioning out of the military into the civilian fitness industry. And the Diploma is recognized nationwide.</p>
          <p class="testimonial-author">— Clyde, Marine Veteran, Tampa FL</p>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-quote">Chris and Yogi were absolutely phenomenal instructors, they brought an amazing atmosphere that redefined learning. I can't wait to continue my educational/physical journey at NPTI.</p>
          <p class="testimonial-author">— Carlos B., Orlando FL</p>
        </div>

      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section-light" aria-labelledby="faq-heading">
    <div class="section-inner">
      <span class="eyebrow">Common Questions</span>
      <h2 class="section-heading" id="faq-heading">Answers Before You Apply</h2>
      <div class="faq-list" role="list">

        <details class="faq-item">
          <summary>Is this a certificate or a diploma?</summary>
          <div class="faq-answer">It's an ACCSC-accredited diploma program. The term "certification" is the common search phrase, but graduates earn a 600-hour diploma — a higher-level credential than a short-form certificate exam.</div>
        </details>

        <details class="faq-item">
          <summary>How long does the program take?</summary>
          <div class="faq-answer">Timeline depends on your weekly schedule. The program is 600 hours of classroom theory and practical lab work. Most students complete it in 13–16 months attending regularly.</div>
        </details>

        <details class="faq-item">
          <summary>Can I use financial aid or GI Bill?</summary>
          <div class="faq-answer">Yes. NPTI Florida is approved for federal financial aid (FAFSA code 042505) and accepts GI Bill Chapter 30 and Chapter 33 benefits at both campuses.</div>
        </details>

        <details class="faq-item">
          <summary>Do I need a fitness background to apply?</summary>
          <div class="faq-answer">No prior fitness background is required. Requirements are: age 18+, high school diploma or equivalent, US citizen or permanent resident, $50 non-refundable application fee, and a personal interview.</div>
        </details>

      </div>
    </div>
  </section>

  <!-- FINAL CTA -->
  <section class="cta-section" aria-labelledby="cta-heading">
    <div class="cta-section-inner">
      <span class="eyebrow">Get Started</span>
      <h2 class="section-heading-white" id="cta-heading">Talk to a Program Advisor</h2>
      <p style="color:rgba(255,255,255,0.7); font-size:16px; margin-bottom:0;">Have questions about enrollment, tuition, or financial aid? Our advisors are here to help.</p>

      <div class="campus-contacts">
        <div class="campus-contact-card">
          <h3>Orlando Campus</h3>
          <a href="tel:+14077720057">&#128222; 407-772-0057</a>
          <a href="mailto:admission@nptifl.com">&#9993; admission@nptifl.com</a>
        </div>
        <div class="campus-contact-card">
          <h3>Tampa Campus</h3>
          <a href="tel:+18133742017">&#128222; 813-374-2017</a>
          <a href="mailto:tampa@nptifl.com">&#9993; tampa@nptifl.com</a>
        </div>
      </div>

      <div style="margin-top:32px; margin-bottom:20px;">
        <a href="https://nptiflorida.edu/contact/" class="btn-schedule">Schedule a Free Info Session &rarr;</a>
      </div>

      <p class="cta-or">Or complete the form above and we'll call you within 1 business day.</p>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="site-footer" role="contentinfo">
    <img
      src="https://nptiflorida.edu/wp-content/uploads/2026/06/national-presonal-training-institute-logo.webp"
      alt="NPTI Florida logo"
      width="140"
      height="40"
      loading="lazy"
    >
    <p class="footer-copy">&copy; 2026 NPTI Florida. All Rights Reserved.</p>
    <p class="footer-accred">NPTI Florida is accredited by the Accreditation Commission of Career Schools and Colleges (ACCSC).</p>
  </footer>

</body>
</html>

<?php wp_footer(); ?>