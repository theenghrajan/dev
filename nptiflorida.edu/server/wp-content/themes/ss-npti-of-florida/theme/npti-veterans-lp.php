<?php /* Template Name: NPTI - Veteran Personal Trainer Certification */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title>Personal Trainer Certification for Veterans | NPTI Florida — GI Bill Approved</title>

  <!-- Preconnect for performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

  <!-- JSON-LD Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "NPTI Florida",
    "url": "https://nptiflorida.edu",
    "telephone": ["407-772-0057", "813-374-2017"],
    "address": {
      "@type": "PostalAddress",
      "addressRegion": "FL",
      "addressCountry": "US"
    }
  }
  </script>

  <style>
    /* WP ROCKET LRC OVERRIDE — prevents Lazy Render Content from hiding above-fold elements */
    [data-rocket-lazy-render] {
      opacity: 1 !important;
      visibility: visible !important;
      transition: none !important;
    }

    /* ============================================================
       CSS CUSTOM PROPERTIES
    ============================================================ */
    :root {
      --navy: #1A3A6B;
      --deep-navy: #0F2347;
      --orange: #E87722;
      --orange-hover: #C96A10;
      --off-white: #F7F4EF;
      --muted: #3D5280;
      --white: #FFFFFF;
      --text-dark: #1A1A2E;
      --text-body: #2D2D2D;
      --border-light: rgba(255,255,255,0.12);
      --shadow-card: 0 4px 24px rgba(15,35,71,0.10);
    }

    /* ============================================================
       RESET & BASE
    ============================================================ */
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      font-weight: 400;
      line-height: 1.7;
      color: var(--text-body);
      background: var(--white);
      -webkit-font-smoothing: antialiased;
    }

    img {
      max-width: 100%;
      display: block;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    /* ============================================================
       TYPOGRAPHY HELPERS
    ============================================================ */
    .eyebrow {
      font-family: 'Poppins', sans-serif;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.18em;
      color: var(--orange);
      margin-bottom: 12px;
      display: block;
    }

    h1, h2, h3, h4 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      line-height: 1.2;
    }

    h1 {
      font-size: clamp(2rem, 4.5vw, 3.25rem);
      color: var(--white);
    }

    h2 {
      font-size: clamp(1.6rem, 3vw, 2.5rem);
      color: var(--deep-navy);
    }

    h3 {
      font-size: 1.2rem;
      font-weight: 600;
    }

    /* ============================================================
       LAYOUT
    ============================================================ */
    .container {
      width: 100%;
      max-width: 1180px;
      margin: 0 auto;
      padding: 0 24px;
    }

    section {
      padding: 90px 0;
    }

    /* ============================================================
       STICKY HEADER
    ============================================================ */
    .site-header {
      position: sticky;
      top: 0;
      z-index: 100;
      background: var(--deep-navy);
      border-bottom: 1px solid rgba(232,119,34,0.3);
    }

    .site-header .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 14px;
      padding-bottom: 14px;
      gap: 16px;
    }

    .header-logo img {
      height: 52px;
      width: auto;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 24px;
      flex-wrap: wrap;
      justify-content: flex-end;
    }

    .header-phones {
      font-family: 'Inter', sans-serif;
      font-size: 13px;
      font-weight: 500;
      color: rgba(255,255,255,0.82);
      white-space: nowrap;
    }

    .header-phones a {
      color: rgba(255,255,255,0.82);
      transition: color 0.2s;
    }

    .header-phones a:hover {
      color: var(--orange);
    }

    .btn {
      display: inline-block;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      font-weight: 600;
      padding: 12px 24px;
      border-radius: 6px;
      transition: background 0.2s, transform 0.15s;
      cursor: pointer;
      border: none;
      min-height: 48px;
      line-height: 1.2;
      text-align: center;
    }

    .btn-orange {
      background: var(--orange);
      color: var(--white);
    }

    .btn-orange:hover {
      background: var(--orange-hover);
      transform: translateY(-1px);
    }

    .btn-full {
      width: 100%;
      font-size: 16px;
      padding: 15px 24px;
    }

    /* ============================================================
       HERO
    ============================================================ */
    .hero {
      background: linear-gradient(135deg, rgba(15,35,71,0.92) 0%, rgba(26,58,107,0.87) 100%), url('https://images.unsplash.com/photo-1522898467493-49726bf28798?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
      padding: 90px 0;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 56px;
      align-items: start;
    }

    .hero-copy h1 {
      margin-bottom: 20px;
    }

    .hero-copy h1 em {
      font-style: italic;
      color: var(--orange);
    }

    .hero-subhead {
      font-size: 17px;
      color: rgba(255,255,255,0.88);
      margin-bottom: 32px;
      max-width: 560px;
    }

    .hero-bullets {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .hero-bullets .bullet-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 15.5px;
      color: rgba(255,255,255,0.9) !important;
      font-weight: 500;
      opacity: 1 !important;
      visibility: visible !important;
    }

    .hero-bullets .bullet-item::before {
      content: '';
      display: block;
      width: 20px;
      height: 20px;
      min-width: 20px;
      background: var(--orange);
      border-radius: 50%;
      margin-top: 2px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='white'%3E%3Cpath fill-rule='evenodd' d='M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z' clip-rule='evenodd'/%3E%3C/svg%3E");
      background-size: 12px;
      background-repeat: no-repeat;
      background-position: center;
    }

    /* FORM CARD */
    .hero-form-card {
      background: var(--white);
      border-radius: 12px;
      padding: 36px 32px;
      box-shadow: 0 8px 40px rgba(0,0,0,0.22);
    }

    .hero-form-card h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--deep-navy);
      margin-bottom: 24px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: var(--deep-navy);
      margin-bottom: 6px;
      font-family: 'Inter', sans-serif;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #D0D8E8;
      border-radius: 6px;
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      color: var(--text-body);
      background: var(--white);
      transition: border-color 0.2s;
      min-height: 48px;
      appearance: none;
      -webkit-appearance: none;
    }

    .form-group select {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%233D5280'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 12px center;
      background-size: 16px;
      padding-right: 36px;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--orange);
    }

    .form-disclaimer {
      font-size: 12px;
      color: var(--muted);
      text-align: center;
      margin-top: 12px;
      line-height: 1.5;
    }

    /* ============================================================
       STAT BAR (dark)
    ============================================================ */
    .stat-bar {
      background: var(--deep-navy);
      padding: 64px 0;
    }

    .stat-bar .eyebrow {
      text-align: center;
      margin-bottom: 40px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 32px;
      text-align: center;
    }

    .stat-item {
      border-left: 1px solid rgba(255,255,255,0.12);
      padding-left: 32px;
    }

    .stat-item:first-child {
      border-left: none;
      padding-left: 0;
    }

    .stat-number {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(1.8rem, 3vw, 2.6rem);
      font-weight: 700;
      color: var(--orange);
      display: block;
      line-height: 1.1;
      margin-bottom: 6px;
    }

    .stat-label {
      font-size: 13px;
      font-weight: 500;
      color: rgba(255,255,255,0.75);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      font-family: 'Inter', sans-serif;
    }

    /* ============================================================
       GI BILL SECTION (light)
    ============================================================ */
    .gi-bill-section {
      background: var(--off-white);
    }

    .gi-bill-section h2 {
      margin-bottom: 48px;
    }

    .cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .card {
      background: var(--white);
      border-radius: 10px;
      padding: 32px 28px;
      box-shadow: var(--shadow-card);
      border-top: 4px solid var(--orange);
    }

    .card h3 {
      font-family: 'Poppins', sans-serif;
      color: var(--deep-navy);
      margin-bottom: 14px;
      font-size: 1.05rem;
    }

    .card p {
      font-size: 15px;
      color: #3A3A4A;
      line-height: 1.7;
    }

    /* ============================================================
       WHY VETERANS SECTION (dark)
    ============================================================ */
    .why-veterans {
      background: var(--deep-navy);
    }

    .why-veterans .eyebrow {
      color: var(--orange);
    }

    .why-veterans h2 {
      color: var(--white);
      margin-bottom: 48px;
    }

    .differentiators-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .diff-card {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.10);
      border-radius: 10px;
      padding: 32px 28px;
    }

    .diff-icon {
      width: 48px;
      height: 48px;
      background: var(--orange);
      border-radius: 8px;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .diff-icon svg {
      width: 24px;
      height: 24px;
      fill: var(--white);
    }

    .diff-card h3 {
      font-family: 'Poppins', sans-serif;
      color: var(--white);
      margin-bottom: 12px;
      font-size: 1.05rem;
    }

    .diff-card p {
      font-size: 15px;
      color: rgba(255,255,255,0.78);
      line-height: 1.7;
    }

    /* ============================================================
       TESTIMONIALS
    ============================================================ */
    .testimonials-section {
      background: var(--white);
    }

    .testimonials-section h2 {
      margin-bottom: 48px;
    }

    .testimonials-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }

    .testimonial-card {
      background: var(--off-white);
      border-radius: 10px;
      padding: 32px;
      position: relative;
    }

    .testimonial-card::before {
      content: '\201C';
      font-family: 'Poppins', sans-serif;
      font-size: 5rem;
      color: var(--orange);
      opacity: 0.4;
      position: absolute;
      top: 8px;
      left: 20px;
      line-height: 1;
    }

    .testimonial-text {
      font-size: 16px;
      font-style: italic;
      color: var(--text-body);
      line-height: 1.75;
      margin-bottom: 20px;
      padding-top: 24px;
    }

    .testimonial-author {
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: var(--deep-navy);
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    .testimonial-pending {
      background: var(--off-white);
      border-radius: 10px;
      padding: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px dashed #C5CEDF;
      min-height: 180px;
    }

    .testimonial-pending p {
      font-size: 14px;
      color: var(--muted);
      text-align: center;
      font-style: italic;
    }

    /* ============================================================
       OUTCOMES SECTION
    ============================================================ */
    .outcomes-section {
      background: var(--off-white);
    }

    .outcomes-section h2 {
      margin-bottom: 40px;
    }

    .outcomes-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      margin-bottom: 28px;
    }

    .outcome-campus {
      background: var(--white);
      border-radius: 10px;
      padding: 32px;
      box-shadow: var(--shadow-card);
    }

    .outcome-campus h3 {
      font-family: 'Poppins', sans-serif;
      color: var(--deep-navy);
      font-size: 1.15rem;
      margin-bottom: 24px;
      padding-bottom: 14px;
      border-bottom: 2px solid var(--orange);
    }

    .outcome-stats {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .outcome-stat-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
    }

    .outcome-stat-label {
      font-size: 15px;
      color: #3A3A4A;
    }

    .outcome-stat-value {
      font-family: 'Poppins', sans-serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--orange);
    }

    .outcomes-disclosure {
      font-size: 12px;
      color: var(--muted);
      line-height: 1.6;
      max-width: 760px;
    }

    /* ============================================================
       FAQ ACCORDION (pure CSS)
    ============================================================ */
    .faq-section {
      background: var(--white);
    }

    .faq-section h2 {
      margin-bottom: 40px;
    }

    .faq-list {
      max-width: 800px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    details.faq-item {
      background: var(--off-white);
      border-radius: 8px;
      border: 1px solid #DDE3EE;
      overflow: hidden;
    }

    details.faq-item[open] {
      border-color: var(--orange);
    }

    summary.faq-question {
      font-family: 'Poppins', sans-serif;
      font-size: 15.5px;
      font-weight: 600;
      color: var(--deep-navy);
      padding: 20px 24px;
      cursor: pointer;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      min-height: 48px;
      user-select: none;
    }

    summary.faq-question::-webkit-details-marker {
      display: none;
    }

    summary.faq-question::after {
      content: '+';
      font-size: 1.5rem;
      font-weight: 400;
      color: var(--orange);
      line-height: 1;
      flex-shrink: 0;
      transition: transform 0.2s;
    }

    details[open] > summary.faq-question::after {
      content: '−';
    }

    .faq-answer {
      padding: 0 24px 20px;
      font-size: 15px;
      color: #3A3A4A;
      line-height: 1.75;
    }

    /* ============================================================
       FINAL CTA
    ============================================================ */
    .final-cta {
      background: var(--deep-navy);
      text-align: center;
    }

    .final-cta .eyebrow {
      color: var(--orange);
    }

    .final-cta h2 {
      color: var(--white);
      margin-bottom: 40px;
    }

    .cta-campuses {
      display: flex;
      justify-content: center;
      gap: 56px;
      flex-wrap: wrap;
      margin-bottom: 32px;
    }

    .cta-campus {
      text-align: center;
    }

    .cta-campus-name {
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: var(--orange);
      text-transform: uppercase;
      letter-spacing: 0.12em;
      margin-bottom: 10px;
    }

    .cta-phone {
      font-family: 'Poppins', sans-serif;
      font-size: 1.65rem;
      font-weight: 700;
      color: var(--white);
      display: block;
      margin-bottom: 6px;
      transition: color 0.2s;
    }

    .cta-phone:hover {
      color: var(--orange);
    }

    .cta-email {
      font-size: 14px;
      color: rgba(255,255,255,0.7);
      transition: color 0.2s;
    }

    .cta-email:hover {
      color: var(--orange);
    }

    .cta-divider {
      width: 1px;
      background: rgba(255,255,255,0.15);
      align-self: stretch;
    }

    .final-cta .subtext {
      font-size: 14px;
      color: rgba(255,255,255,0.6);
    }

    .btn-schedule { display: inline-block; background: transparent; color: #fff; border: 2px solid rgba(255,255,255,0.65); padding: 14px 32px; border-radius: 6px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 16px; text-decoration: none; transition: background 0.2s, border-color 0.2s; margin-top: 8px; }
    .btn-schedule:hover { background: rgba(255,255,255,0.1); border-color: #fff; color: #fff; }

    /* ============================================================
       FOOTER
    ============================================================ */
    .site-footer {
      background: #080F1F;
      padding: 36px 0;
    }

    .footer-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .footer-logo img {
      height: 40px;
      width: auto;
    }

    .footer-text {
      font-size: 13px;
      color: rgba(255,255,255,0.45);
      text-align: right;
      line-height: 1.6;
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 900px) {
      .cards-grid,
      .differentiators-grid {
        grid-template-columns: 1fr;
      }

      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
      }

      .stat-item {
        border-left: none;
        padding-left: 0;
        border-bottom: 1px solid rgba(255,255,255,0.10);
        padding-bottom: 24px;
      }

      .stat-item:last-child,
      .stat-item:nth-child(2) {
        border-bottom: none;
      }
    }

    @media (max-width: 768px) {
      section {
        padding: 60px 0;
      }

      .hero {
        padding: 60px 0;
      }

      .hero-grid {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .hero-form-card {
        padding: 28px 20px;
      }

      .testimonials-grid,
      .outcomes-grid {
        grid-template-columns: 1fr;
      }

      .header-phones {
        display: none;
      }

      .cta-campuses {
        flex-direction: column;
        gap: 32px;
      }

      .cta-divider {
        width: 60px;
        height: 1px;
        align-self: auto;
      }

      .footer-inner {
        flex-direction: column;
        text-align: center;
      }

      .footer-text {
        text-align: center;
      }

      h1 {
        font-size: 2rem;
      }
    }

    @media (max-width: 480px) {
      .stats-grid {
        grid-template-columns: 1fr 1fr;
      }

      .stat-item {
        border-bottom: none;
        padding-bottom: 0;
      }
    }
  </style>
</head>
<body>

  <!-- ============================================================
       STICKY HEADER
  ============================================================ -->
  <header class="site-header">
    <div class="container">
      <a class="header-logo" href="https://nptiflorida.edu" aria-label="NPTI Florida Home">
        <img
          src="https://nptiflorida.edu/wp-content/uploads/2026/06/national-presonal-training-institute-logo.webp"
          alt="National Personal Training Institute of Florida"
          width="160"
          height="52"
        >
      </a>
      <div class="header-right">
        <p class="header-phones">
          Orlando: <a href="tel:4077720057">407-772-0057</a>
          &nbsp;|&nbsp;
          Tampa: <a href="tel:8133742017">813-374-2017</a>
        </p>
        <a href="https://nptiflorida.edu/apply-now/" class="btn btn-orange">Apply Now</a>
      </div>
    </div>
  </header>

  <!-- ============================================================
       HERO
  ============================================================ -->
  <section class="hero" id="hero">
    <div class="container">
      <div class="hero-grid">

        <!-- Copy -->
        <div class="hero-copy">
          <span class="eyebrow">GI Bill Approved · Veteran-Owned School</span>
          <h1>Personal Trainer Certification for <em>Veterans</em></h1>
          <p class="hero-subhead">
            NPTI Florida is a veteran-owned school approved for GI Bill Chapter 30 and Chapter 33 benefits.
            Use your earned education benefits to earn a 600-hour ACCSC-accredited personal training
            diploma — with campuses in Orlando and Tampa.
          </p>
          <div class="hero-bullets">
            <div class="bullet-item">GI Bill Chapter 30 (MGIB) and Chapter 33 (Post-9/11) approved</div>
            <div class="bullet-item">An ACCSC-accredited personal training school in Florida — veteran-owned since day one</div>
            <div class="bullet-item">Federal financial aid available for those who've exhausted GI Bill benefits (FAFSA 042505)</div>
          </div>
        </div>

        <!-- Form -->
        <div class="hero-form-card">
          <h3>Speak With a Veteran Advisor</h3>
          <form action="#" method="POST" name="veteran-inquiry" aria-label="Veteran program inquiry form">
            <div class="form-group">
              <label for="full-name">Full Name <span aria-hidden="true">*</span></label>
              <input type="text" id="full-name" name="full_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label for="email">Email Address <span aria-hidden="true">*</span></label>
              <input type="email" id="email" name="email" placeholder="your@email.com" required autocomplete="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number <span aria-hidden="true">*</span></label>
              <input type="tel" id="phone" name="phone" placeholder="(___) ___-____" required autocomplete="tel">
            </div>
            <div class="form-group">
              <label for="branch">Branch of Service</label>
              <select id="branch" name="branch">
                <option value="" disabled selected>Select your branch</option>
                <option value="Army">Army</option>
                <option value="Navy">Navy</option>
                <option value="Air Force">Air Force</option>
                <option value="Marine Corps">Marine Corps</option>
                <option value="Coast Guard">Coast Guard</option>
                <option value="Space Force">Space Force</option>
                <option value="National Guard">National Guard</option>
                <option value="Reserve">Reserve</option>
                <option value="Spouse/Dependent">Spouse / Dependent</option>
              </select>
            </div>
            <div class="form-group">
              <label for="campus">Preferred Campus</label>
              <select id="campus" name="campus">
                <option value="" disabled selected>Select a campus</option>
                <option value="Orlando">Orlando</option>
                <option value="Tampa">Tampa</option>
              </select>
            </div>
            <button type="submit" class="btn btn-orange btn-full">Request Veteran Program Info &rarr;</button>
          </form>
          <p class="form-disclaimer">A veteran advisor will follow up within 1 business day. No obligation.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       STAT BAR
  ============================================================ -->
  <section class="stat-bar">
    <div class="container">
      <span class="eyebrow">Program at a Glance</span>
      <div class="stats-grid">
        <div class="stat-item">
          <span class="stat-number">24+</span>
          <span class="stat-label">Years Training Veterans</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">600</span>
          <span class="stat-label">Hours Classroom + Practical Lab</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">$10,500</span>
          <span class="stat-label">Total Program Cost</span>
        </div>
        <div class="stat-item">
          <span class="stat-number">GI Bill</span>
          <span class="stat-label">Ch. 30 &amp; Ch. 33 Approved</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       GI BILL BREAKDOWN
  ============================================================ -->
  <section class="gi-bill-section">
    <div class="container">
      <span class="eyebrow">Your Benefits Explained</span>
      <h2>Understanding Your GI Bill Options at NPTI Florida</h2>
      <div class="cards-grid">
        <div class="card">
          <h3>Chapter 33 — Post-9/11 GI Bill</h3>
          <p>
            The Post-9/11 GI Bill (Chapter 33) covers tuition and fees up to the in-state maximum,
            plus a monthly housing allowance based on campus location and a books/supplies stipend.
            This is the most comprehensive VA education benefit for most veterans and covers a
            significant portion of NPTI's program cost.
          </p>
        </div>
        <div class="card">
          <h3>Chapter 30 — Montgomery GI Bill</h3>
          <p>
            The Montgomery GI Bill (Chapter 30) provides a monthly stipend paid directly to you
            while enrolled. The benefit amount depends on the level of education chosen and your
            service record. NPTI Florida accepts Chapter 30 for the 600-hour diploma program.
          </p>
        </div>
        <div class="card">
          <h3>Remaining Costs &amp; Financial Aid</h3>
          <p>
            If your GI Bill benefit doesn't cover the full program cost ($10,500 total), federal
            financial aid is available through FAFSA (code: 042505), including Pell Grants and
            subsidized/unsubsidized loans. A financial aid advisor will walk you through every
            option before you commit.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- PROGRAM PHOTO STRIP -->
  <div style="line-height:0; overflow:hidden; max-height:440px;">
    <img src="https://images.unsplash.com/photo-1522898467493-49726bf28798?auto=format&fit=crop&w=1400&q=80" alt="Veterans in fitness training — NPTI Florida veteran-owned personal training school" style="width:100%; max-height:440px; object-fit:cover; object-position:center 25%; display:block;">
  </div>

  <!-- ============================================================
       WHY VETERANS CHOOSE NPTI (dark)
  ============================================================ -->
  <section class="why-veterans">
    <div class="container">
      <span class="eyebrow">Veteran-Owned School</span>
      <h2>Built on the Same Values You Served With</h2>
      <div class="differentiators-grid">

        <div class="diff-card">
          <div class="diff-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2L3 7v5c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/>
            </svg>
          </div>
          <h3>Veteran-Owned and Operated</h3>
          <p>
            NPTI Florida has been veteran-owned and operated for 25+ years. The staff understand
            the discipline, structure, and drive that military training instills — and how to build
            on it in a fitness career.
          </p>
        </div>

        <div class="diff-card">
          <div class="diff-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 6h-2.18c.07-.44.18-.88.18-1.34C18 2.54 16.46 1 14.67 1c-1.26 0-2.5.81-3.17 2.05L12 4.27l-.5-1.22C10.83 1.81 9.59 1 8.33 1 6.54 1 5 2.54 5 4.66c0 .46.11.9.18 1.34H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2z"/>
            </svg>
          </div>
          <h3>A Credential That Transfers</h3>
          <p>
            NPTI graduates earn a 600-hour ACCSC-accredited diploma recognized by employers
            nationwide. Whether you settle in Florida or relocate elsewhere after your transition,
            the credential travels with you.
          </p>
        </div>

        <div class="diff-card">
          <div class="diff-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
          </div>
          <h3>Housing Assistance Available</h3>
          <p>
            The Orlando campus offers housing assistance for out-of-state students, including
            veterans relocating to Florida specifically to attend NPTI.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       TESTIMONIALS
  ============================================================ -->
  <section class="testimonials-section">
    <div class="container">
      <span class="eyebrow">Veteran Voices</span>
      <h2>Heard From Veterans Who've Been There</h2>
      <div class="testimonials-grid">

        <div class="testimonial-card">
          <p class="testimonial-text">
            "Absolutely loved my time at NPTI Florida. I like the Veteran community here a lot.
            The staff and owner understand the challenges of transitioning out of the military
            into the civilian fitness industry. And the Diploma is recognized nationwide."
          </p>
          <p class="testimonial-author">— Clyde, Marine Veteran &middot; Tampa, FL</p>
        </div>

        <div class="testimonial-pending">
          <p>[Real Reviews Pending — collecting from NPTI veteran graduates]</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ============================================================
       ACCSC OUTCOMES
  ============================================================ -->
  <section class="outcomes-section">
    <div class="container">
      <span class="eyebrow">Student Outcomes</span>
      <h2>ACCSC Graduation &amp; Placement Rates</h2>
      <div class="outcomes-grid">

        <div class="outcome-campus">
          <h3>Orlando Campus</h3>
          <p style="font-size:13px; color:var(--muted); margin-bottom: 20px; font-style: italic;">Oct 2024 – Sept 2025</p>
          <div class="outcome-stats">
            <div class="outcome-stat-row">
              <span class="outcome-stat-label">Graduation Rate</span>
              <span class="outcome-stat-value">88%</span>
            </div>
            <div class="outcome-stat-row">
              <span class="outcome-stat-label">Placement Rate (employed in field)</span>
              <span class="outcome-stat-value">75%</span>
            </div>
          </div>
        </div>

        <div class="outcome-campus">
          <h3>Tampa Campus</h3>
          <p style="font-size:13px; color:var(--muted); margin-bottom: 20px; font-style: italic;">Oct 2024 – Sept 2025</p>
          <div class="outcome-stats">
            <div class="outcome-stat-row">
              <span class="outcome-stat-label">Graduation Rate</span>
              <span class="outcome-stat-value">90%</span>
            </div>
            <div class="outcome-stat-row">
              <span class="outcome-stat-label">Placement Rate (employed in field)</span>
              <span class="outcome-stat-value">77%</span>
            </div>
          </div>
        </div>

      </div>
      <p class="outcomes-disclosure">
        Graduation and placement data reported to and published by the Accreditation Commission
        of Career Schools and Colleges (ACCSC). Reporting period: October 2024 – September 2025.
        Submitted 10/1/2026.
      </p>
    </div>
  </section>

  <!-- ============================================================
       FAQ
  ============================================================ -->
  <section class="faq-section">
    <div class="container">
      <span class="eyebrow">Veteran FAQ</span>
      <h2>Common Questions from Veterans</h2>
      <div class="faq-list">

        <details class="faq-item">
          <summary class="faq-question">Which GI Bill chapter does NPTI accept?</summary>
          <div class="faq-answer">
            NPTI Florida accepts both Chapter 33 (Post-9/11 GI Bill) and Chapter 30 (Montgomery GI Bill).
            Contact a veteran advisor to determine which chapter provides maximum benefit for your situation
            and remaining entitlement.
          </div>
        </details>

        <details class="faq-item">
          <summary class="faq-question">Will my GI Bill cover the full program cost?</summary>
          <div class="faq-answer">
            Chapter 33 benefits depend on your service eligibility percentage and the VA's determined tuition cap.
            Many veterans find their benefits cover a substantial portion of the $10,500 total cost. A financial
            aid advisor will calculate your specific benefit amount and any remaining gap before you enroll.
          </div>
        </details>

        <details class="faq-item">
          <summary class="faq-question">Can I use financial aid if I've exhausted my GI Bill?</summary>
          <div class="faq-answer">
            Yes. Federal financial aid (FAFSA code 042505) is available regardless of GI Bill usage, and includes
            Pell Grants, subsidized loans, and unsubsidized loans based on financial need and enrollment status.
          </div>
        </details>

        <details class="faq-item">
          <summary class="faq-question">Do I need a fitness background to apply?</summary>
          <div class="faq-answer">
            No prior fitness background is required. Requirements are: age 18+, high school diploma or equivalent,
            US citizen or permanent resident, $50 non-refundable application fee, and a personal interview.
            Military service demonstrates the discipline and commitment that translates directly into a fitness career.
          </div>
        </details>

        <details class="faq-item">
          <summary class="faq-question">Is the diploma recognized after I leave Florida?</summary>
          <div class="faq-answer">
            Yes. The ACCSC-accredited diploma is nationally recognized. Employers across the country — from hospital
            wellness centers to private studios to corporate fitness programs — recognize ACCSC credentials.
          </div>
        </details>

      </div>
    </div>
  </section>

  <!-- ============================================================
       FINAL CTA
  ============================================================ -->
  <section class="final-cta">
    <div class="container">
      <span class="eyebrow">Get Started</span>
      <h2>Talk to a Veteran Advisor Today</h2>
      <div class="cta-campuses">
        <div class="cta-campus">
          <p class="cta-campus-name">Orlando Campus</p>
          <a href="tel:4077720057" class="cta-phone">407-772-0057</a>
          <a href="mailto:admission@nptifl.com" class="cta-email">admission@nptifl.com</a>
        </div>
        <div class="cta-divider" aria-hidden="true"></div>
        <div class="cta-campus">
          <p class="cta-campus-name">Tampa Campus</p>
          <a href="tel:8133742017" class="cta-phone">813-374-2017</a>
          <a href="mailto:tampa@nptifl.com" class="cta-email">tampa@nptifl.com</a>
        </div>
      </div>
      <div style="margin-top:32px; margin-bottom:20px;">
        <a href="https://nptiflorida.edu/contact/" class="btn-schedule">Schedule a Free Info Session &rarr;</a>
      </div>
      <p class="subtext">Or complete the form above — a veteran advisor will follow up within 1 business day.</p>
    </div>
  </section>

  <!-- ============================================================
       FOOTER
  ============================================================ -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-inner">
        <a href="https://nptiflorida.edu" class="footer-logo" aria-label="NPTI Florida">
          <img
            src="https://nptiflorida.edu/wp-content/uploads/2026/06/national-presonal-training-institute-logo.webp"
            alt="National Personal Training Institute of Florida"
            width="120"
            height="40"
          >
        </a>
        <div class="footer-text">
          <p>&copy; 2026 NPTI Florida. All Rights Reserved.</p>
          <p>NPTI Florida is accredited by the Accreditation Commission of Career Schools and Colleges (ACCSC). Approved for VA Education Benefits.</p>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>

<?php wp_footer(); ?>