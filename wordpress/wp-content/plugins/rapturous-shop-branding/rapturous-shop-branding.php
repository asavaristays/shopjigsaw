<?php
/**
 * Plugin Name: Rapturous Shop Branding
 * Description: Premium Rapturous Jigsaw WooCommerce storefront styling.
 * Version: 3.0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp', function () {
    if (is_front_page()) {
        remove_filter('the_content', 'wpautop');
    }
});

add_filter('loop_shop_per_page', function () {
    return 64;
}, 20);

add_filter('woocommerce_output_related_products_args', function ($args) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'rj-shop-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    wp_register_style('rj-shop-branding', false, array('rj-shop-fonts'), '3.0.0');
    wp_enqueue_style('rj-shop-branding');

    $css = <<<'CSS'
:root {
  --rj-ink: #1c1e21;
  --rj-muted: #62686c;
  --rj-cream: #fdfbf7;
  --rj-paper: #f6f0e7;
  --rj-teal: #114b5f;
  --rj-coral: #f26457;
  --rj-sage: #b3c0a4;
  --rj-lavender: #c4b7cb;
  --rj-dark: #0a1112;
}

body {
  background: radial-gradient(circle at 15% 5%, rgba(179,192,164,.24), transparent 28rem), var(--rj-cream);
  color: var(--rj-ink);
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 14px;
}

h1, h2, h3, .site-title {
  font-family: "Cormorant Garamond", Georgia, serif;
}

.ast-container,
.site-content .ast-container {
  max-width: 1240px;
}

.main-header-bar {
  min-height: 86px;
  background: rgba(253,251,247,.88);
  border-bottom: 1px solid rgba(28,30,33,.06);
  backdrop-filter: blur(18px);
}

.site-branding img,
.custom-logo {
  max-height: 62px;
  width: auto;
}

.main-header-menu .menu-link,
.ast-builder-menu-1 .menu-item > .menu-link {
  color: rgba(28,30,33,.72);
  font-size: 12px;
  font-weight: 800;
  letter-spacing: .16em;
  text-transform: uppercase;
}

.main-header-menu .menu-link:hover,
.ast-builder-menu-1 .menu-item > .menu-link:hover {
  color: var(--rj-teal);
}

.rj-shop-home {
  margin-inline: calc(50% - 50vw);
  overflow: hidden;
  background: linear-gradient(180deg, var(--rj-cream), #f7f1e8 58%, var(--rj-cream));
}

.rj-hero,
.rj-products-section,
.rj-signal-strip,
.rj-checkout-banner,
.rj-global-footer {
  width: min(1180px, calc(100% - 36px));
  margin: 0 auto;
}

.rj-hero {
  display: grid;
  grid-template-columns: minmax(0, .95fr) minmax(330px, .8fr);
  gap: clamp(26px, 5vw, 68px);
  align-items: center;
  min-height: 640px;
  padding: 82px 0 58px;
}

.rj-logo-mark {
  display: inline-flex;
  align-items: center;
  border-radius: 18px;
  background: #fff;
  padding: 9px 13px;
  box-shadow: 0 18px 55px -42px rgba(0,0,0,.35);
}

.rj-logo-mark img {
  width: min(238px, 62vw);
  height: auto;
  display: block;
}

.rj-eyebrow {
  margin: 24px 0 14px;
  color: rgba(17,75,95,.76);
  font-size: 10px;
  font-weight: 900;
  letter-spacing: .24em;
  text-transform: uppercase;
}

.rj-hero h1 {
  max-width: 780px;
  margin: 0;
  color: var(--rj-ink);
  font-size: clamp(40px, 6.2vw, 74px);
  line-height: .94;
  letter-spacing: -.045em;
  font-weight: 600;
}

.rj-hero-text {
  max-width: 610px;
  margin: 24px 0 0;
  color: rgba(28,30,33,.67);
  font-size: 15px;
  line-height: 1.85;
}

.rj-hero-actions,
.rj-product-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 11px;
  margin-top: 28px;
}

.rj-primary-cta,
.rj-secondary-cta,
.woocommerce ul.products li.product .button,
.single_add_to_cart_button,
.checkout-button,
.woocommerce button.button,
.woocommerce a.button {
  display: inline-flex !important;
  align-items: center;
  justify-content: center;
  min-height: 43px;
  border-radius: 999px !important;
  border: 0 !important;
  padding: 12px 18px !important;
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 11px !important;
  font-weight: 900 !important;
  letter-spacing: .12em;
  line-height: 1 !important;
  text-transform: uppercase;
  text-decoration: none !important;
  transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.rj-primary-cta,
.woocommerce ul.products li.product .button,
.single_add_to_cart_button,
.checkout-button,
.woocommerce button.button,
.woocommerce a.button {
  background: var(--rj-coral) !important;
  color: #fff !important;
  box-shadow: 0 16px 34px -24px rgba(242,100,87,.95);
}

.rj-secondary-cta {
  background: rgba(17,75,95,.08) !important;
  color: var(--rj-teal) !important;
}

.rj-primary-cta:hover,
.rj-secondary-cta:hover,
.woocommerce ul.products li.product .button:hover,
.single_add_to_cart_button:hover {
  transform: translateY(-2px);
  box-shadow: 0 20px 42px -28px rgba(28,30,33,.5);
}

.rj-hero-board {
  display: grid;
  grid-template-columns: 1.1fr .75fr;
  gap: 14px;
}

.rj-board-card {
  display: grid;
  place-items: center;
  min-height: 126px;
  border: 1px solid rgba(28,30,33,.07);
  border-radius: 26px;
  color: var(--rj-ink);
  font-size: 13px;
  font-weight: 900;
  letter-spacing: .08em;
  text-transform: uppercase;
  box-shadow: 0 24px 70px -54px rgba(0,0,0,.5);
}

.rj-board-card-main {
  grid-row: span 2;
  align-content: end;
  justify-items: start;
  min-height: 320px;
  padding: 28px;
  background:
    radial-gradient(circle at 20% 20%, rgba(242,100,87,.34), transparent 34%),
    radial-gradient(circle at 72% 34%, rgba(196,183,203,.75), transparent 32%),
    radial-gradient(circle at 55% 80%, rgba(179,192,164,.88), transparent 34%),
    #f7efe4;
}

.rj-board-card-main span {
  border-radius: 999px;
  background: rgba(255,255,255,.72);
  padding: 7px 10px;
  color: var(--rj-teal);
  font-size: 10px;
  letter-spacing: .18em;
}

.rj-board-card-main strong {
  max-width: 330px;
  margin-top: 14px;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: clamp(30px, 3.8vw, 46px);
  line-height: .94;
  letter-spacing: -.035em;
  text-transform: none;
}

.rj-board-card-coral { background: var(--rj-coral); color: #fff; }
.rj-board-card-sage { background: var(--rj-sage); }
.rj-board-card-teal { background: var(--rj-teal); color: #fff; }

.rj-signal-strip {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 12px;
  padding: 0 0 46px;
}

.rj-signal-strip div {
  border-radius: 24px;
  background: rgba(255,255,255,.58);
  padding: 20px;
  box-shadow: 0 18px 58px -48px rgba(0,0,0,.32);
}

.rj-signal-strip strong {
  display: block;
  font-family: "Cormorant Garamond", Georgia, serif;
  color: var(--rj-teal);
  font-size: 34px;
  line-height: .92;
}

.rj-signal-strip span {
  display: block;
  margin-top: 7px;
  color: rgba(28,30,33,.58);
  font-size: 12px;
  font-weight: 800;
}

.rj-products-section {
  padding: 42px 0 72px;
}

.rj-section-head {
  display: grid;
  grid-template-columns: minmax(0, .9fr) minmax(260px, .54fr);
  gap: 26px;
  align-items: end;
  margin-bottom: 30px;
}

.rj-section-head h2,
.rj-checkout-banner h2,
.rj-global-footer h2 {
  margin: 0;
  font-size: clamp(32px, 4.8vw, 58px);
  line-height: .98;
  letter-spacing: -.038em;
  font-weight: 600;
}

.rj-section-head > p:last-child {
  margin: 0;
  color: rgba(28,30,33,.62);
  font-size: 14px;
  line-height: 1.78;
}

.woocommerce ul.products {
  display: grid !important;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 20px;
}

.woocommerce ul.products::before,
.woocommerce ul.products::after {
  display: none !important;
}

.woocommerce ul.products li.product {
  float: none !important;
  width: auto !important;
  margin: 0 !important;
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(28,30,33,.075);
  border-radius: 26px !important;
  background:
    linear-gradient(180deg, rgba(255,255,255,.7), rgba(255,255,255,.4)),
    radial-gradient(circle at top left, rgba(179,192,164,.18), transparent 48%),
    var(--rj-paper) !important;
  padding: 12px !important;
  box-shadow: 0 22px 62px -52px rgba(0,0,0,.48);
  transition: transform .22s ease, box-shadow .22s ease;
}

.woocommerce ul.products li.product:hover {
  transform: translateY(-5px);
  box-shadow: 0 30px 82px -58px rgba(0,0,0,.52);
}

.woocommerce ul.products li.product .astra-shop-thumbnail-wrap,
.woocommerce div.product div.images {
  display: grid;
  place-items: center;
  min-height: 210px;
  overflow: hidden;
  border-radius: 20px;
  background:
    radial-gradient(circle at 30% 24%, rgba(255,255,255,.62), transparent 34%),
    linear-gradient(145deg, rgba(179,192,164,.42), rgba(196,183,203,.32) 52%, rgba(242,100,87,.14));
}

.woocommerce ul.products li.product a img,
.woocommerce div.product div.images img {
  width: 100%;
  max-height: 215px;
  object-fit: contain;
  mix-blend-mode: multiply;
  filter: saturate(1.05) contrast(1.02) drop-shadow(0 20px 22px rgba(0,0,0,.12));
  background: transparent !important;
}

.woocommerce ul.products li.product .woocommerce-loop-product__title {
  margin: 14px 0 0 !important;
  padding: 0 !important;
  color: var(--rj-ink);
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 21px !important;
  line-height: 1.05 !important;
  letter-spacing: -.025em;
  font-weight: 700;
}

.woocommerce ul.products li.product .price {
  display: block;
  min-height: 22px;
  margin: 10px 0 13px !important;
  color: var(--rj-teal) !important;
  font-size: 13px !important;
  font-weight: 900 !important;
}

.woocommerce ul.products li.product .price del {
  color: rgba(28,30,33,.38) !important;
  font-weight: 700 !important;
}

.woocommerce ul.products li.product .button {
  width: 100%;
}

.ast-on-card-button.ast-select-options-trigger,
.ast-on-card-button.ast-onsale-card {
  display: none !important;
}

.woocommerce-result-count,
.woocommerce-ordering {
  color: rgba(28,30,33,.58);
  font-size: 12px;
  font-weight: 800;
}

.product_meta .sku_wrapper,
.stock.in-stock,
.stock.out-of-stock {
  display: none !important;
}

.rj-checkout-banner {
  display: flex;
  justify-content: space-between;
  gap: 24px;
  align-items: center;
  margin-bottom: 66px;
  border-radius: 32px;
  background: linear-gradient(135deg, var(--rj-teal), #0d303d);
  color: #fff;
  padding: clamp(28px, 5vw, 52px);
  box-shadow: 0 30px 82px -60px rgba(17,75,95,.82);
}

.rj-checkout-banner .rj-eyebrow {
  color: rgba(255,255,255,.64);
}

.rj-checkout-banner h2 {
  max-width: 720px;
  color: #fff;
}

.rj-global-footer {
  margin-top: 70px;
  border-radius: 0;
  background: var(--rj-dark);
  color: #e8eae3;
  padding: clamp(38px, 5vw, 64px);
}

.rj-footer-grid {
  display: grid;
  grid-template-columns: minmax(290px, .9fr) minmax(0, 1.2fr);
  gap: 46px;
  align-items: start;
}

.rj-footer-logo {
  display: inline-flex;
  border-radius: 18px;
  background: #fff;
  padding: 8px 12px;
}

.rj-footer-logo img {
  width: 210px;
  height: auto;
  display: block;
}

.rj-footer-copy,
.rj-footer-disclaimer,
.rj-footer-contact {
  max-width: 480px;
  margin: 18px 0 0;
  color: rgba(232,234,227,.66);
  font-size: 13px;
  line-height: 1.75;
}

.rj-footer-disclaimer {
  color: rgba(232,234,227,.46);
  font-size: 11px;
}

.rj-footer-contact a {
  color: #e8eae3;
  font-weight: 800;
}

.rj-footer-links {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 26px;
}

.rj-footer-links h3 {
  margin: 0 0 16px;
  color: rgba(232,234,227,.58);
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 10px;
  font-weight: 900;
  letter-spacing: .24em;
  text-transform: uppercase;
}

.rj-footer-links a {
  display: block;
  margin: 10px 0;
  color: rgba(232,234,227,.84);
  font-size: 13px;
  text-decoration: none;
  transition: color .2s ease;
}

.rj-footer-links a:hover {
  color: var(--rj-coral);
}

.rj-footer-bottom {
  display: flex;
  justify-content: space-between;
  gap: 18px;
  margin-top: 44px;
  border-top: 1px solid rgba(232,234,227,.1);
  padding-top: 20px;
  color: rgba(232,234,227,.52);
  font-size: 11px;
}

@media (max-width: 1060px) {
  .woocommerce ul.products {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
}

@media (max-width: 900px) {
  .rj-hero,
  .rj-section-head,
  .rj-footer-grid {
    grid-template-columns: 1fr;
  }

  .rj-hero {
    min-height: auto;
    padding-top: 58px;
  }

  .rj-signal-strip,
  .woocommerce ul.products,
  .rj-footer-links {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .rj-checkout-banner {
    align-items: flex-start;
    flex-direction: column;
  }
}

@media (max-width: 560px) {
  .rj-hero,
  .rj-products-section,
  .rj-signal-strip,
  .rj-checkout-banner,
  .rj-global-footer {
    width: min(100% - 22px, 1180px);
  }

  .rj-hero-board,
  .woocommerce ul.products,
  .rj-signal-strip,
  .rj-footer-links {
    grid-template-columns: 1fr;
  }

  .rj-footer-bottom {
    flex-direction: column;
  }
}

/* Shell polish: keep Astra functional but visually aligned with the marketing site. */
.site-title,
.site-description,
.home .entry-header,
.site-footer {
  display: none !important;
}

.ast-primary-header-bar {
  border-bottom-color: rgba(28,30,33,.055) !important;
}

.ast-site-identity {
  padding: 10px 0 !important;
}

.woocommerce-js div.product div.summary .product_title {
  font-size: clamp(32px, 4.5vw, 56px);
  line-height: .96;
  letter-spacing: -.035em;
}

.woocommerce-js div.product form.cart {
  margin-top: 24px;
}

.woocommerce-js div.product .woocommerce-product-details__short-description {
  color: rgba(28,30,33,.66);
  font-size: 14px;
  line-height: 1.8;
}

/* Single product gallery upgrade. */
.single-product .site-content .ast-container {
  max-width: 1320px;
}

.single-product div.product {
  display: grid;
  grid-template-columns: minmax(560px, 1.12fr) minmax(380px, .88fr);
  gap: clamp(34px, 5vw, 72px);
  align-items: start;
}

.single-product div.product div.images.woocommerce-product-gallery {
  width: 100% !important;
  float: none !important;
  margin-bottom: 0 !important;
}

.single-product div.product div.summary {
  width: 100% !important;
  float: none !important;
}

.single-product .woocommerce-product-gallery__wrapper {
  overflow: visible;
}

.single-product .woocommerce-product-gallery__image:first-child {
  min-height: clamp(420px, 46vw, 620px);
  border-radius: 34px;
  background:
    radial-gradient(circle at 30% 22%, rgba(255,255,255,.72), transparent 34%),
    linear-gradient(145deg, rgba(179,192,164,.38), rgba(196,183,203,.28) 52%, rgba(242,100,87,.14));
  display: grid !important;
  place-items: center;
  padding: clamp(22px, 4vw, 48px);
}

.single-product .woocommerce-product-gallery__image:first-child img {
  width: 100% !important;
  max-height: 540px;
  object-fit: contain;
  mix-blend-mode: multiply;
  filter: saturate(1.05) contrast(1.02) drop-shadow(0 28px 30px rgba(0,0,0,.14));
}

.single-product .flex-control-thumbs {
  display: grid;
  grid-template-columns: repeat(5, minmax(0, 1fr));
  gap: 12px;
  margin: 16px 0 0 !important;
}

.single-product .flex-control-thumbs li {
  width: auto !important;
  float: none !important;
}

.single-product .flex-control-thumbs img {
  height: 106px !important;
  width: 100% !important;
  object-fit: contain;
  border: 1px solid rgba(28,30,33,.08);
  border-radius: 18px;
  background:
    radial-gradient(circle at 30% 22%, rgba(255,255,255,.72), transparent 34%),
    linear-gradient(145deg, rgba(179,192,164,.28), rgba(196,183,203,.22) 52%, rgba(242,100,87,.10));
  padding: 10px;
  opacity: .72;
  transition: opacity .2s ease, border-color .2s ease, transform .2s ease;
}

.single-product .flex-control-thumbs img.flex-active,
.single-product .flex-control-thumbs img:hover {
  opacity: 1;
  border-color: rgba(17,75,95,.42);
  transform: translateY(-2px);
}

.single-product .woocommerce-product-gallery__trigger {
  top: 22px !important;
  right: 22px !important;
}

.single-product .rj-product-videos {
  grid-column: 1 / -1;
  margin-top: 62px;
  border-radius: 34px;
  background: rgba(255,255,255,.58);
  padding: clamp(24px, 4vw, 42px);
  box-shadow: 0 24px 72px -58px rgba(0,0,0,.42);
}

.single-product .rj-product-videos .rj-eyebrow {
  margin-top: 0;
}

.single-product .rj-product-videos h2 {
  margin: 0 0 24px;
  font-size: clamp(30px, 4.2vw, 52px);
  line-height: .98;
  letter-spacing: -.035em;
}

.single-product .rj-video-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
}

.single-product .rj-video-card {
  overflow: hidden;
  border-radius: 24px;
  background: var(--rj-dark);
}

.single-product .rj-video-card iframe {
  display: block;
  width: 100%;
  aspect-ratio: 16 / 9;
  border: 0;
}

.single-product .rj-video-card a {
  display: block;
  padding: 14px 16px;
  color: #e8eae3;
  font-size: 12px;
  font-weight: 800;
  letter-spacing: .08em;
  text-transform: uppercase;
}

@media (max-width: 980px) {
  .single-product div.product {
    grid-template-columns: 1fr;
  }

  .single-product .flex-control-thumbs {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }
}

@media (max-width: 560px) {
  .single-product .woocommerce-product-gallery__image:first-child {
    min-height: 340px;
    border-radius: 24px;
  }

  .single-product .flex-control-thumbs {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .single-product .rj-video-grid {
    grid-template-columns: 1fr;
  }
}

/* Premium editorial homepage redesign inspired by luxury wellness ecommerce spacing, not copied. */
:root {
  --rj-lux-ivory: #f7f4ee;
  --rj-lux-card: #efe7dd;
  --rj-lux-ink: #1e1e1e;
  --rj-lux-muted: rgba(30,30,30,.66);
  --rj-lux-sage: #78866b;
  --rj-lux-terracotta: #b86b4b;
  --rj-lux-line: rgba(30,30,30,.11);
}

html {
  scroll-behavior: smooth;
}

body,
.ast-plain-container,
.ast-page-builder-template {
  background: var(--rj-lux-ivory) !important;
}

.main-header-bar,
.ast-primary-header-bar {
  position: sticky;
  top: 0;
  background: rgba(247,244,238,.82) !important;
  backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(30,30,30,.07) !important;
}

.main-header-menu .menu-link,
.ast-builder-menu-1 .menu-item > .menu-link {
  color: rgba(30,30,30,.68) !important;
  font-size: 11px !important;
  letter-spacing: .18em !important;
}

.rj-lux-home {
  margin-inline: calc(50% - 50vw);
  color: var(--rj-lux-ink);
  background:
    radial-gradient(circle at 14% 6%, rgba(120,134,107,.14), transparent 28rem),
    linear-gradient(180deg, #f7f4ee 0%, #faf8f3 48%, #f7f4ee 100%);
  overflow: hidden;
}

.rj-lux-home img {
  display: block;
  max-width: 100%;
}

.rj-lux-hero,
.rj-lux-story,
.rj-lux-products,
.rj-lux-benefits,
.rj-lux-living,
.rj-lux-community,
.rj-lux-collections,
.rj-lux-corporate,
.rj-lux-newsletter {
  width: min(1220px, calc(100% - 36px));
  margin: 0 auto;
}

.rj-lux-hero {
  display: grid;
  grid-template-columns: minmax(0, .9fr) minmax(420px, 1.1fr);
  gap: clamp(34px, 7vw, 92px);
  align-items: center;
  min-height: 790px;
  padding: clamp(64px, 8vw, 112px) 0;
}

.rj-lux-logo {
  display: inline-flex;
  align-items: center;
  border-radius: 16px;
  background: rgba(255,255,255,.64);
  padding: 9px 12px;
  box-shadow: 0 24px 60px -52px rgba(30,30,30,.4);
}

.rj-lux-logo img {
  width: min(218px, 60vw);
  height: auto;
}

.rj-lux-kicker {
  margin: 0 0 18px;
  color: var(--rj-lux-sage);
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: .24em;
  line-height: 1.4;
  text-transform: uppercase;
}

.rj-lux-hero .rj-lux-kicker {
  margin-top: 42px;
}

.rj-lux-hero h1,
.rj-lux-story h2,
.rj-lux-section-head h2,
.rj-lux-editorial h2,
.rj-lux-community h2,
.rj-lux-corporate h2,
.rj-lux-newsletter h2 {
  color: var(--rj-lux-ink);
  font-family: "Cormorant Garamond", Georgia, serif;
  font-weight: 600;
  letter-spacing: -.045em;
}

.rj-lux-hero h1 {
  max-width: 760px;
  margin: 0;
  font-size: clamp(56px, 8.8vw, 118px);
  line-height: .82;
}

.rj-lux-hero h1 em {
  display: block;
  color: var(--rj-lux-terracotta);
  font-style: italic;
  font-weight: 500;
}

.rj-lux-lede {
  max-width: 610px;
  margin: 30px 0 0;
  color: var(--rj-lux-muted);
  font-size: clamp(16px, 1.8vw, 20px);
  line-height: 1.85;
}

.rj-lux-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 34px;
}

.rj-lux-button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 48px;
  border-radius: 999px;
  padding: 14px 22px;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .16em;
  line-height: 1;
  text-decoration: none !important;
  text-transform: uppercase;
  transition: transform .22s ease, background .22s ease, box-shadow .22s ease;
}

.rj-lux-button-primary {
  background: var(--rj-lux-ink);
  color: #fff !important;
  box-shadow: 0 22px 44px -32px rgba(30,30,30,.65);
}

.rj-lux-button-secondary {
  border: 1px solid var(--rj-lux-line);
  background: rgba(255,255,255,.44);
  color: var(--rj-lux-ink) !important;
}

.rj-lux-button:hover {
  transform: translateY(-2px);
}

.rj-lux-trust {
  margin: 28px 0 0;
  color: rgba(30,30,30,.52);
  font-size: 13px;
  font-weight: 700;
}

.rj-lux-feature-row {
  display: flex;
  flex-wrap: wrap;
  gap: 9px;
  margin-top: 20px;
}

.rj-lux-feature-row span {
  border: 1px solid var(--rj-lux-line);
  border-radius: 999px;
  background: rgba(255,255,255,.38);
  padding: 8px 11px;
  color: rgba(30,30,30,.62);
  font-size: 11px;
  font-weight: 800;
}

.rj-lux-hero-media {
  position: relative;
  min-height: 640px;
  overflow: hidden;
  border-radius: 0;
  background:
    radial-gradient(circle at 28% 18%, rgba(255,255,255,.72), transparent 34%),
    linear-gradient(145deg, rgba(239,231,221,.88), rgba(120,134,107,.16));
  padding: clamp(28px, 5vw, 70px);
  box-shadow: 0 38px 100px -76px rgba(30,30,30,.55);
}

.rj-lux-hero-media img {
  width: 100%;
  height: 100%;
  min-height: 520px;
  object-fit: contain;
  mix-blend-mode: multiply;
  filter: saturate(1.02) drop-shadow(0 34px 40px rgba(30,30,30,.16));
  transition: transform 1.1s ease;
}

.rj-lux-hero-media:hover img {
  transform: scale(1.035);
}

.rj-lux-hero-note {
  position: absolute;
  left: 28px;
  right: 28px;
  bottom: 28px;
  display: flex;
  justify-content: space-between;
  gap: 20px;
  align-items: end;
  border-top: 1px solid rgba(30,30,30,.12);
  padding-top: 18px;
  color: rgba(30,30,30,.62);
}

.rj-lux-hero-note span {
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .18em;
  text-transform: uppercase;
}

.rj-lux-hero-note strong {
  max-width: 280px;
  color: var(--rj-lux-ink);
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 28px;
  line-height: 1;
  text-align: right;
}

.rj-lux-story {
  display: grid;
  grid-template-columns: minmax(360px, .86fr) minmax(0, 1.14fr);
  gap: clamp(34px, 7vw, 94px);
  align-items: center;
  padding: clamp(72px, 10vw, 140px) 0;
  border-top: 1px solid var(--rj-lux-line);
}

.rj-lux-story-image,
.rj-lux-editorial > div:first-child,
.rj-lux-collection {
  overflow: hidden;
  background: var(--rj-lux-card);
}

.rj-lux-story-image img,
.rj-lux-editorial img,
.rj-lux-collection img {
  width: 100%;
  object-fit: contain;
  mix-blend-mode: multiply;
  transition: transform 1s ease;
}

.rj-lux-story-image img {
  aspect-ratio: 4 / 5;
  padding: 42px;
}

.rj-lux-story-copy h2,
.rj-lux-section-head h2,
.rj-lux-editorial h2,
.rj-lux-community h2,
.rj-lux-corporate h2,
.rj-lux-newsletter h2 {
  margin: 0;
  font-size: clamp(38px, 5.8vw, 78px);
  line-height: .92;
}

.rj-lux-story-copy p:not(.rj-lux-kicker),
.rj-lux-editorial p:not(.rj-lux-kicker),
.rj-lux-community p,
.rj-lux-corporate p,
.rj-lux-newsletter p {
  max-width: 660px;
  color: var(--rj-lux-muted);
  font-size: 15px;
  line-height: 1.9;
}

.rj-lux-stats {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 12px;
  margin-top: 34px;
}

.rj-lux-stats div {
  border-top: 1px solid var(--rj-lux-line);
  padding-top: 18px;
}

.rj-lux-stats strong {
  display: block;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: clamp(34px, 4vw, 52px);
  line-height: .9;
  color: var(--rj-lux-terracotta);
}

.rj-lux-stats span {
  display: block;
  margin-top: 9px;
  color: rgba(30,30,30,.55);
  font-size: 12px;
  font-weight: 800;
}

.rj-lux-products,
.rj-lux-benefits,
.rj-lux-collections {
  padding: clamp(70px, 10vw, 132px) 0;
  border-top: 1px solid var(--rj-lux-line);
}

.rj-lux-section-head {
  display: grid;
  grid-template-columns: minmax(0, .95fr) auto;
  gap: 24px;
  align-items: end;
  margin-bottom: 34px;
}

.rj-lux-section-head a {
  color: var(--rj-lux-ink);
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .18em;
  text-transform: uppercase;
  text-decoration: none;
}

.rj-lux-home .woocommerce ul.products {
  gap: 24px !important;
}

.rj-lux-home .woocommerce ul.products li.product {
  border-radius: 0 !important;
  border-color: rgba(30,30,30,.09) !important;
  background: rgba(255,255,255,.36) !important;
  box-shadow: none !important;
  padding: 14px !important;
}

.rj-lux-home .woocommerce ul.products li.product:hover {
  transform: translateY(-4px);
  box-shadow: 0 28px 70px -58px rgba(30,30,30,.38) !important;
}

.rj-lux-home .woocommerce ul.products li.product .astra-shop-thumbnail-wrap {
  min-height: 260px;
  border-radius: 0;
  background: var(--rj-lux-card);
}

.rj-lux-home .woocommerce ul.products li.product .woocommerce-loop-product__title {
  font-size: 23px !important;
}

.rj-lux-home .woocommerce ul.products li.product .button {
  background: var(--rj-lux-terracotta) !important;
  border-radius: 999px !important;
}

.rj-lux-benefit-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1px;
  background: var(--rj-lux-line);
  border: 1px solid var(--rj-lux-line);
}

.rj-lux-benefit {
  min-height: 260px;
  background: var(--rj-lux-ivory);
  padding: clamp(24px, 4vw, 42px);
}

.rj-lux-benefit span {
  color: var(--rj-lux-sage);
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .2em;
}

.rj-lux-benefit h3 {
  margin: 44px 0 12px;
  color: var(--rj-lux-ink);
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 33px;
  line-height: .95;
}

.rj-lux-benefit p {
  margin: 0;
  color: var(--rj-lux-muted);
  font-size: 14px;
  line-height: 1.75;
}

.rj-lux-living {
  padding: clamp(76px, 10vw, 138px) 0;
  border-top: 1px solid var(--rj-lux-line);
}

.rj-lux-editorial {
  display: grid;
  grid-template-columns: minmax(330px, .9fr) minmax(0, 1.1fr);
  gap: clamp(30px, 6vw, 80px);
  align-items: center;
  margin-bottom: clamp(64px, 9vw, 120px);
}

.rj-lux-editorial:last-child {
  margin-bottom: 0;
}

.rj-lux-editorial-flip > div:first-child {
  order: 2;
}

.rj-lux-editorial img {
  aspect-ratio: 1 / 1;
  padding: 38px;
}

.rj-lux-community {
  display: grid;
  grid-template-columns: minmax(0, .92fr) minmax(320px, .72fr);
  gap: clamp(30px, 6vw, 74px);
  align-items: start;
  padding: clamp(70px, 10vw, 132px) 0;
  border-top: 1px solid var(--rj-lux-line);
}

.rj-lux-testimonials {
  display: grid;
  gap: 14px;
}

.rj-lux-testimonials blockquote {
  margin: 0;
  background: var(--rj-lux-card);
  color: var(--rj-lux-ink);
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: clamp(25px, 3vw, 36px);
  line-height: 1.08;
  padding: 28px;
}

.rj-lux-collection-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 16px;
}

.rj-lux-collection {
  position: relative;
  min-height: 430px;
  color: #fff;
  text-decoration: none !important;
}

.rj-lux-collection::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 44%, rgba(30,30,30,.58));
}

.rj-lux-collection img {
  height: 100%;
  padding: 28px;
}

.rj-lux-collection:hover img {
  transform: scale(1.05);
}

.rj-lux-collection span {
  position: absolute;
  left: 22px;
  right: 22px;
  bottom: 22px;
  z-index: 1;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 31px;
  line-height: .96;
}

.rj-lux-corporate,
.rj-lux-newsletter {
  margin-top: clamp(40px, 7vw, 86px);
  margin-bottom: clamp(60px, 9vw, 118px);
  background: var(--rj-lux-card);
  padding: clamp(34px, 6vw, 72px);
}

.rj-lux-corporate {
  background:
    radial-gradient(circle at 85% 20%, rgba(184,107,75,.18), transparent 26rem),
    var(--rj-lux-card);
}

.rj-lux-newsletter {
  text-align: center;
}

.rj-lux-newsletter p {
  margin-inline: auto;
}

.rj-lux-form {
  display: flex;
  gap: 10px;
  max-width: 560px;
  margin: 28px auto 0;
}

.rj-lux-form input {
  height: 52px;
  border: 1px solid rgba(30,30,30,.14);
  border-radius: 999px;
  background: rgba(255,255,255,.58);
  padding: 0 18px;
  color: var(--rj-lux-ink);
}

.rj-lux-form button {
  min-width: 120px;
  border: 0;
  border-radius: 999px;
  background: var(--rj-lux-ink);
  color: #fff;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .16em;
  text-transform: uppercase;
}

.rj-reveal {
  opacity: 0;
  transform: translateY(24px);
  animation: rjLuxuryReveal .82s cubic-bezier(.22,1,.36,1) forwards;
  animation-delay: var(--delay, 0ms);
}

@keyframes rjLuxuryReveal {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 1040px) {
  .rj-lux-hero,
  .rj-lux-story,
  .rj-lux-editorial,
  .rj-lux-community {
    grid-template-columns: 1fr;
  }

  .rj-lux-editorial-flip > div:first-child {
    order: 0;
  }

  .rj-lux-hero {
    min-height: auto;
  }

  .rj-lux-hero-media {
    min-height: auto;
  }

  .rj-lux-benefit-grid,
  .rj-lux-collection-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 680px) {
  .rj-lux-hero,
  .rj-lux-story,
  .rj-lux-products,
  .rj-lux-benefits,
  .rj-lux-living,
  .rj-lux-community,
  .rj-lux-collections,
  .rj-lux-corporate,
  .rj-lux-newsletter {
    width: min(100% - 24px, 1220px);
  }

  .rj-lux-hero h1 {
    font-size: clamp(52px, 17vw, 76px);
  }

  .rj-lux-hero-note,
  .rj-lux-section-head,
  .rj-lux-stats,
  .rj-lux-benefit-grid,
  .rj-lux-collection-grid {
    grid-template-columns: 1fr;
  }

  .rj-lux-hero-note {
    display: grid;
    align-items: start;
  }

  .rj-lux-hero-note strong {
    text-align: left;
  }

  .rj-lux-benefit {
    min-height: auto;
  }

  .rj-lux-collection {
    min-height: 330px;
  }

  .rj-lux-form {
    flex-direction: column;
  }
}

/* Functional premium shop reset: product-first, working ecommerce, bigger imagery. */
.rj-commerce-home {
  margin-inline: calc(50% - 50vw);
  background: #f7f4ee;
  color: #1e1e1e;
  overflow: hidden;
}

.rj-commerce-hero,
.rj-commerce-strip,
.rj-commerce-featured,
.rj-commerce-editorial,
.rj-commerce-collections,
.rj-commerce-benefits,
.rj-commerce-newsletter {
  width: min(1240px, calc(100% - 32px));
  margin: 0 auto;
}

.rj-commerce-hero {
  display: grid;
  grid-template-columns: minmax(0, .78fr) minmax(460px, 1.22fr);
  gap: clamp(28px, 6vw, 82px);
  align-items: center;
  min-height: 760px;
  padding: 76px 0 68px;
}

.rj-commerce-logo {
  display: inline-flex;
  background: rgba(255,255,255,.64);
  padding: 8px 12px;
  border-radius: 14px;
}

.rj-commerce-logo img {
  width: 220px;
  height: auto;
}

.rj-commerce-kicker {
  margin: 28px 0 14px;
  color: #78866b;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .22em;
  text-transform: uppercase;
}

.rj-commerce-copy h1,
.rj-commerce-head h2,
.rj-commerce-editorial h2,
.rj-commerce-newsletter h2 {
  margin: 0;
  color: #1e1e1e;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-weight: 600;
  letter-spacing: -.045em;
}

.rj-commerce-copy h1 {
  max-width: 660px;
  font-size: clamp(56px, 8vw, 104px);
  line-height: .84;
}

.rj-commerce-lede {
  max-width: 580px;
  margin: 24px 0 0;
  color: rgba(30,30,30,.66);
  font-size: 18px;
  line-height: 1.8;
}

.rj-commerce-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 30px;
}

.rj-commerce-btn {
  display: inline-flex;
  justify-content: center;
  align-items: center;
  min-height: 48px;
  border-radius: 999px;
  padding: 14px 22px;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .15em;
  text-transform: uppercase;
  text-decoration: none !important;
}

.rj-commerce-btn-dark {
  background: #1e1e1e;
  color: #fff !important;
}

.rj-commerce-btn-light {
  border: 1px solid rgba(30,30,30,.14);
  color: #1e1e1e !important;
  background: rgba(255,255,255,.5);
}

.rj-commerce-trust {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 22px;
}

.rj-commerce-trust span {
  border: 1px solid rgba(30,30,30,.11);
  border-radius: 999px;
  padding: 8px 10px;
  color: rgba(30,30,30,.62);
  font-size: 11px;
  font-weight: 800;
}

.rj-commerce-visual {
  min-height: 620px;
  display: grid;
  place-items: center;
  background:
    radial-gradient(circle at 50% 42%, rgba(255,255,255,.92), transparent 33%),
    linear-gradient(145deg, #efe7dd, rgba(120,134,107,.18));
  padding: clamp(18px, 4vw, 46px);
  box-shadow: 0 34px 96px -72px rgba(30,30,30,.52);
}

.rj-commerce-visual img {
  width: min(680px, 100%);
  max-height: 640px;
  object-fit: contain;
  transform: scale(1.28);
  mix-blend-mode: multiply;
  filter: saturate(1.03) drop-shadow(0 30px 36px rgba(30,30,30,.14));
}

.rj-commerce-strip {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1px;
  background: rgba(30,30,30,.12);
  border: 1px solid rgba(30,30,30,.12);
}

.rj-commerce-strip article {
  background: #f7f4ee;
  padding: 22px;
}

.rj-commerce-strip strong {
  display: block;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 40px;
  line-height: .9;
}

.rj-commerce-strip span {
  display: block;
  margin-top: 7px;
  color: rgba(30,30,30,.6);
  font-size: 12px;
  font-weight: 800;
}

.rj-commerce-featured,
.rj-commerce-editorial,
.rj-commerce-collections,
.rj-commerce-benefits,
.rj-commerce-newsletter {
  padding: clamp(58px, 8vw, 104px) 0;
  border-top: 1px solid rgba(30,30,30,.1);
}

.rj-commerce-head {
  display: grid;
  grid-template-columns: minmax(0, 1fr) auto;
  gap: 24px;
  align-items: end;
  margin-bottom: 30px;
}

.rj-commerce-head h2,
.rj-commerce-editorial h2,
.rj-commerce-newsletter h2 {
  font-size: clamp(36px, 5vw, 68px);
  line-height: .95;
}

.rj-commerce-head a {
  color: #1e1e1e;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .16em;
  text-transform: uppercase;
}

.rj-commerce-home .woocommerce ul.products li.product .astra-shop-thumbnail-wrap {
  min-height: 310px !important;
}

.rj-commerce-home .woocommerce ul.products li.product a img {
  transform: scale(1.18);
}

.rj-commerce-editorial {
  display: grid;
  grid-template-columns: minmax(420px, .95fr) minmax(0, 1.05fr);
  gap: clamp(28px, 6vw, 76px);
  align-items: center;
}

.rj-commerce-editorial-img {
  background: #efe7dd;
  padding: 34px;
}

.rj-commerce-editorial-img img {
  width: 100%;
  aspect-ratio: 1 / 1;
  object-fit: contain;
  transform: scale(1.12);
  mix-blend-mode: multiply;
}

.rj-commerce-editorial p:not(.rj-commerce-kicker),
.rj-commerce-newsletter p {
  color: rgba(30,30,30,.66);
  font-size: 15px;
  line-height: 1.85;
}

.rj-commerce-collections {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 14px;
}

.rj-commerce-collections a {
  position: relative;
  min-height: 360px;
  overflow: hidden;
  background: #efe7dd;
  color: #fff;
  text-decoration: none !important;
}

.rj-commerce-collections img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  padding: 28px;
  transform: scale(1.16);
  mix-blend-mode: multiply;
  transition: transform .7s ease;
}

.rj-commerce-collections a:hover img {
  transform: scale(1.24);
}

.rj-commerce-collections a::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 42%, rgba(30,30,30,.62));
}

.rj-commerce-collections span {
  position: absolute;
  z-index: 1;
  left: 20px;
  right: 20px;
  bottom: 20px;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 30px;
  line-height: 1;
}

.rj-commerce-benefits {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1px;
  background: rgba(30,30,30,.12);
}

.rj-commerce-benefits article {
  background: #f7f4ee;
  padding: 30px;
}

.rj-commerce-benefits span {
  color: #78866b;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .18em;
}

.rj-commerce-benefits h3 {
  margin: 34px 0 10px;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: 31px;
  line-height: .95;
}

.rj-commerce-benefits p {
  margin: 0;
  color: rgba(30,30,30,.62);
  font-size: 14px;
  line-height: 1.7;
}

.rj-commerce-newsletter {
  text-align: center;
}

.rj-commerce-newsletter form {
  display: flex;
  gap: 10px;
  max-width: 520px;
  margin: 24px auto 0;
}

.rj-commerce-newsletter input {
  height: 52px;
  border: 1px solid rgba(30,30,30,.14);
  border-radius: 999px;
  background: rgba(255,255,255,.6);
  padding: 0 18px;
}

.rj-commerce-newsletter button {
  min-width: 116px;
  border: 0;
  border-radius: 999px;
  background: #1e1e1e;
  color: #fff;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .16em;
  text-transform: uppercase;
}

.rj-cart-float {
  position: fixed;
  right: 22px;
  top: 104px;
  z-index: 99999;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 58px;
  height: 58px;
  border-radius: 999px;
  background: #1e1e1e;
  color: #fff !important;
  text-decoration: none !important;
  box-shadow: 0 18px 42px -26px rgba(30,30,30,.65);
}

.rj-cart-icon {
  font-size: 22px;
  line-height: 1;
}

.rj-cart-count {
  position: absolute;
  right: -4px;
  top: -5px;
  min-width: 22px;
  height: 22px;
  display: grid;
  place-items: center;
  border-radius: 999px;
  background: #b86b4b;
  color: #fff;
  font-size: 11px;
  font-weight: 900;
}

.single-product .woocommerce-product-gallery__image:first-child {
  min-height: clamp(560px, 58vw, 780px) !important;
  padding: clamp(8px, 2vw, 26px) !important;
}

.single-product .woocommerce-product-gallery__image:first-child img {
  max-height: 720px !important;
  transform: scale(1.46) !important;
}

.single-product .flex-control-thumbs img {
  height: 128px !important;
  transform: scale(1.16);
}

.rj-lightbox {
  position: fixed;
  inset: 0;
  z-index: 100000;
  display: none;
  place-items: center;
  background: rgba(18,18,18,.86);
  padding: 24px;
}

.rj-lightbox.is-open {
  display: grid;
}

.rj-lightbox img {
  max-width: 94vw;
  max-height: 92vh;
  object-fit: contain;
  background: #f7f4ee;
  box-shadow: 0 24px 90px rgba(0,0,0,.38);
}

.rj-lightbox-close {
  position: fixed;
  right: 22px;
  top: 18px;
  width: 48px;
  height: 48px;
  border: 0;
  border-radius: 999px;
  background: #fff;
  color: #1e1e1e;
  font-size: 34px;
  line-height: 1;
}

@media (max-width: 980px) {
  .rj-commerce-hero,
  .rj-commerce-editorial {
    grid-template-columns: 1fr;
  }

  .rj-commerce-visual {
    min-height: 480px;
  }

  .rj-commerce-strip,
  .rj-commerce-collections,
  .rj-commerce-benefits {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 560px) {
  .rj-commerce-hero,
  .rj-commerce-strip,
  .rj-commerce-featured,
  .rj-commerce-editorial,
  .rj-commerce-collections,
  .rj-commerce-benefits,
  .rj-commerce-newsletter {
    width: min(100% - 22px, 1240px);
  }

  .rj-commerce-copy h1 {
    font-size: clamp(48px, 16vw, 70px);
  }

  .rj-commerce-strip,
  .rj-commerce-collections,
  .rj-commerce-benefits {
    grid-template-columns: 1fr;
  }

  .rj-commerce-newsletter form {
    flex-direction: column;
  }

  .rj-cart-float {
    right: 14px;
    top: auto;
    bottom: 18px;
  }
}
CSS;

    wp_add_inline_style('rj-shop-branding', $css);
});

add_action('wp_footer', function () {
    if (is_admin()) {
        return;
    }

    $logo_id = 0;
    $logos = get_posts(array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'title' => 'Rapturous Jigsaw Logo',
    ));
    if ($logos) {
        $logo_id = (int) $logos[0];
    }
    $logo = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';
    $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
    $cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
    $checkout_url = function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
    ?>
    <footer class="rj-global-footer">
      <div class="rj-footer-grid">
        <div>
          <?php if ($logo) : ?>
            <div class="rj-footer-logo"><img src="<?php echo esc_url($logo); ?>" alt="Rapturous Jigsaw" loading="lazy" /></div>
          <?php endif; ?>
          <p class="rj-footer-copy">India's screen-free puzzle movement, creating mindful puzzle experiences, tournaments and structured programs for focus, relaxation and family time.</p>
          <p class="rj-footer-disclaimer">Disclaimer: Rapturous Jigsaw puzzles are intended for recreation, mindfulness, engagement and general wellness. They are not a medical device, therapy, diagnosis or substitute for professional healthcare advice.</p>
          <p class="rj-footer-contact">Email: <a href="mailto:info@rapturousjigsaw.com">info@rapturousjigsaw.com</a><br />Phone: <a href="tel:+919892830488">+91 9892830488</a><br />Thakur Complex, Kandivali East, Mumbai - 400101</p>
        </div>
        <div class="rj-footer-links">
          <div><h3>Shop</h3><a href="<?php echo esc_url($shop_url); ?>">All products</a><a href="<?php echo esc_url($cart_url); ?>">Cart</a><a href="<?php echo esc_url($checkout_url); ?>">Checkout</a><a href="<?php echo esc_url(home_url('/my-account/')); ?>">Account</a></div>
          <div><h3>Movement</h3><a href="https://rapturousjigsaw.com/mission/">Mission</a><a href="https://rapturousjigsaw.com/events/">Events</a><a href="https://rapturousjigsaw.com/tournaments/">Tournaments</a><a href="https://rapturousjigsaw.com/gallery/">Gallery</a></div>
          <div><h3>Company</h3><a href="https://rapturousjigsaw.com/about-founder/">Founder</a><a href="https://rapturousjigsaw.com/team/">Team</a><a href="https://rapturousjigsaw.com/contact/">Contact</a><a href="https://rapturousjigsaw.com/blog/">Blog</a></div>
          <div><h3>Social</h3><a href="https://www.instagram.com/rapturous_jigsaw">Instagram</a><a href="https://youtube.com/@rapturousjigsawpuzzle">YouTube</a><a href="mailto:info@rapturousjigsaw.com">Email</a></div>
        </div>
      </div>
      <div class="rj-footer-bottom">
        <span>&copy; <?php echo esc_html(date('Y')); ?> Rapturous Jigsaw. [ Beta Version ]</span>
        <span>Built for India's mindful puzzle movement.</span>
      </div>
    </footer>
    <?php
}, 20);
function rj_drive_preview_url($url) {
    if (preg_match('#/d/([^/]+)#', $url, $m)) {
        return 'https://drive.google.com/file/d/' . rawurlencode($m[1]) . '/preview';
    }
    if (preg_match('#[?&]id=([^&]+)#', $url, $m)) {
        return 'https://drive.google.com/file/d/' . rawurlencode($m[1]) . '/preview';
    }
    return $url;
}

add_action('woocommerce_after_single_product_summary', function () {
    if (!is_product()) {
        return;
    }
    global $product;
    if (!$product) {
        return;
    }
    $videos = get_post_meta($product->get_id(), '_rj_product_videos', true);
    if (empty($videos) || !is_array($videos)) {
        return;
    }
    echo '<section class="rj-product-videos">';
    echo '<p class="rj-eyebrow">Product videos</p>';
    echo '<h2>See the puzzle in motion.</h2>';
    echo '<div class="rj-video-grid">';
    foreach ($videos as $index => $video) {
        $label = !empty($video['label']) ? $video['label'] : 'Product video ' . ($index + 1);
        $url = !empty($video['url']) ? $video['url'] : '';
        if (!$url) {
            continue;
        }
        $preview = rj_drive_preview_url($url);
        echo '<article class="rj-video-card">';
        echo '<iframe src="' . esc_url($preview) . '" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen loading="lazy"></iframe>';
        echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener">' . esc_html($label) . '</a>';
        echo '</article>';
    }
    echo '</div>';
    echo '</section>';
}, 12);
add_action('wp_head', function () {
    if (!is_front_page()) {
        return;
    }
    echo '<meta name="description" content="Rapturous Jigsaw creates premium mindful puzzle experiences for focus, relaxation, family connection and screen-free living." />' . PHP_EOL;
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Rapturous Jigsaw',
        'url' => home_url('/'),
        'description' => 'Premium mindful puzzle experiences designed for focus, relaxation and connection.',
        'email' => 'info@rapturousjigsaw.com',
        'sameAs' => array(
            'https://www.instagram.com/rapturous_jigsaw',
            'https://youtube.com/@rapturousjigsawpuzzle'
        )
    );
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . PHP_EOL;
}, 5);
add_action('wp_footer', function () {
    if (!function_exists('wc_get_cart_url')) {
        return;
    }
    $count = function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <a class="rj-cart-float" href="<?php echo esc_url(wc_get_cart_url()); ?>" aria-label="Open shopping cart">
      <span class="rj-cart-icon" aria-hidden="true">🛒</span>
      <span class="rj-cart-count"><?php echo esc_html((string) $count); ?></span>
    </a>
    <div class="rj-lightbox" aria-hidden="true">
      <button type="button" class="rj-lightbox-close" aria-label="Close image">×</button>
      <img src="" alt="Expanded product image" />
    </div>
    <script>
      (function () {
        var box = document.querySelector('.rj-lightbox');
        if (!box) return;
        var img = box.querySelector('img');
        var close = box.querySelector('.rj-lightbox-close');
        document.addEventListener('click', function (event) {
          var link = event.target.closest('.single-product .woocommerce-product-gallery__image a');
          if (!link) return;
          event.preventDefault();
          img.src = link.href || link.querySelector('img')?.src || '';
          box.classList.add('is-open');
          box.setAttribute('aria-hidden', 'false');
        });
        function hide() {
          box.classList.remove('is-open');
          box.setAttribute('aria-hidden', 'true');
          img.src = '';
        }
        close && close.addEventListener('click', hide);
        box.addEventListener('click', function (event) {
          if (event.target === box) hide();
        });
        document.addEventListener('keydown', function (event) {
          if (event.key === 'Escape') hide();
        });
      })();
    </script>
    <?php
}, 40);
add_action('wp_enqueue_scripts', function(){ wp_add_inline_style('rj-shop-branding', '
/* Footer color/full-width requested update. */
.rj-global-footer {
  width: 100vw !important;
  max-width: none !important;
  margin-left: calc(50% - 50vw) !important;
  margin-right: calc(50% - 50vw) !important;
  margin-bottom: 0 !important;
  background: #1d647a !important;
  border-radius: 0 !important;
}

.rj-global-footer > .rj-footer-grid,
.rj-global-footer > .rj-footer-bottom {
  width: min(1180px, calc(100% - 32px));
  margin-left: auto;
  margin-right: auto;
}

.site-footer,
.site-below-footer-wrap {
  background: #1d647a !important;
}'); }, 120);

add_action('wp_enqueue_scripts', function(){ wp_add_inline_style('rj-shop-branding', '
/* Replace default WooCommerce blue notices with premium warm neutrals. */
.woocommerce-message,
.woocommerce-info,
.woocommerce-error,
.woocommerce-noreviews,
p.no-comments {
  border-top-color: rgba(184,107,75,.92) !important;
  border-radius: 0 !important;
  background:
    linear-gradient(90deg, rgba(184,107,75,.14), rgba(255,255,255,.64)),
    #fffaf4 !important;
  color: rgba(28,30,33,.72) !important;
  box-shadow: none !important;
}

.woocommerce-message::before,
.woocommerce-info::before,
.woocommerce-error::before {
  color: #b86b4b !important;
}

.woocommerce-message a,
.woocommerce-info a,
.woocommerce-error a,
.woocommerce-message .restore-item,
.woocommerce-info .restore-item {
  color: #b86b4b !important;
  font-weight: 900 !important;
  text-decoration-color: rgba(184,107,75,.35) !important;
}

.woocommerce-message a:hover,
.woocommerce-info a:hover,
.woocommerce-error a:hover,
.woocommerce-message .restore-item:hover,
.woocommerce-info .restore-item:hover {
  color: #1c1e21 !important;
}

.woocommerce-cart .cart-empty.woocommerce-info,
.woocommerce-checkout .woocommerce-info,
.woocommerce-account .woocommerce-info {
  border-top-color: rgba(179,192,164,.95) !important;
  background:
    linear-gradient(90deg, rgba(179,192,164,.20), rgba(255,255,255,.66)),
    #fffaf4 !important;
}

.woocommerce-cart .cart-empty.woocommerce-info::before,
.woocommerce-checkout .woocommerce-info::before,
.woocommerce-account .woocommerce-info::before {
  color: #78866b !important;
}

.woocommerce-cart a:not(.button),
.woocommerce-checkout a:not(.button),
.woocommerce-account a:not(.button) {
  color: #b86b4b;
}

.woocommerce-cart a:not(.button):hover,
.woocommerce-checkout a:not(.button):hover,
.woocommerce-account a:not(.button):hover {
  color: #1d647a;
}
'); }, 130);
