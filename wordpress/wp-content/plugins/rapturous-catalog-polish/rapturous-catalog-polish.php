<?php
/**
 * Plugin Name: Rapturous Catalog Polish
 * Description: Premium buyer filters and stable product gallery layout for Rapturous Jigsaw.
 * Version: 1.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    remove_theme_support('wc-product-gallery-zoom');
}, 100);

add_action('wp_enqueue_scripts', function () {
    wp_add_inline_style('rj-shop-branding', '
/* Catalog polish clean v1.2.0: premium shop filters and stable product images. */
.rj-shop-category-nav {
  width: min(1240px, calc(100% - 32px));
  margin: clamp(14px, 2.5vw, 28px) auto clamp(28px, 4vw, 48px);
  padding: clamp(20px, 3vw, 30px);
  border: 1px solid rgba(29,100,122,.11);
  border-radius: 30px;
  background:
    radial-gradient(circle at 10% 0%, rgba(29,100,122,.08), transparent 30%),
    radial-gradient(circle at 86% 12%, rgba(184,107,75,.09), transparent 28%),
    rgba(255,255,255,.58);
  box-shadow: 0 24px 70px -58px rgba(30,30,30,.45);
}

.rj-shop-category-nav h2 {
  margin: 0;
  color: #1d647a;
  font-family: "Cormorant Garamond", Georgia, serif;
  font-size: clamp(28px, 3.3vw, 42px);
  line-height: .96;
  letter-spacing: -.035em;
}

.rj-shop-category-nav p {
  max-width: 660px;
  margin: 12px 0 0;
  color: rgba(30,30,30,.62);
  font-size: 14px;
  line-height: 1.75;
}

.rj-shop-category-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 22px;
}

.rj-shop-category-card {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 0;
  border: 1px solid rgba(30,30,30,.10);
  border-radius: 999px;
  background: rgba(255,255,255,.72);
  color: rgba(30,30,30,.66) !important;
  padding: 12px 18px;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .15em;
  line-height: 1;
  text-decoration: none !important;
  text-transform: uppercase;
  transition: transform .22s ease, border-color .22s ease, background .22s ease, color .22s ease, box-shadow .22s ease;
}

.rj-shop-category-card:hover,
.rj-shop-category-card.is-active {
  transform: translateY(-3px);
  border-color: #1d647a;
  background: #1d647a;
  color: #fff !important;
  box-shadow: 0 18px 40px -28px rgba(29,100,122,.75);
}

.rj-shop-category-card span {
  display: inline;
  margin: 0;
  color: #1d647a;
}

.rj-shop-category-card:hover span,
.rj-shop-category-card.is-active span {
  color: #fff;
}

.single-product div.product div.images.woocommerce-product-gallery,
.single-product .woocommerce-product-gallery__wrapper {
  overflow: visible !important;
}

.single-product .woocommerce-product-gallery__image,
.single-product .woocommerce-product-gallery__image:first-child {
  min-height: clamp(500px, 54vw, 680px) !important;
  height: clamp(500px, 54vw, 680px) !important;
  display: grid !important;
  place-items: center !important;
  overflow: hidden !important;
  border-radius: 30px !important;
  background:
    radial-gradient(circle at 30% 22%, rgba(255,255,255,.72), transparent 34%),
    linear-gradient(145deg, rgba(239,231,221,.94), rgba(120,134,107,.16) 56%, rgba(184,107,75,.08)) !important;
  padding: clamp(18px, 3vw, 34px) !important;
}

.single-product .woocommerce-product-gallery__image a {
  display: grid !important;
  place-items: center !important;
  width: 100% !important;
  height: 100% !important;
}

.single-product .woocommerce-product-gallery__image img,
.single-product .woocommerce-product-gallery__image:first-child img,
.single-product .woocommerce-product-gallery__image:hover img,
.single-product .woocommerce-product-gallery__image img:hover {
  width: 100% !important;
  height: 100% !important;
  max-height: none !important;
  object-fit: contain !important;
  transform: none !important;
  transform-origin: center center !important;
  filter: saturate(1.04) contrast(1.02) drop-shadow(0 20px 24px rgba(30,30,30,.10)) !important;
  image-rendering: auto !important;
  mix-blend-mode: multiply;
}

.single-product .zoomImg,
.single-product .woocommerce-product-gallery__trigger {
  display: none !important;
}

.single-product .flex-control-thumbs {
  grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
}

.single-product .flex-control-thumbs li {
  height: 118px !important;
}

.single-product .flex-control-thumbs img,
.single-product .flex-control-thumbs img:hover,
.single-product .flex-control-thumbs img.flex-active {
  width: 100% !important;
  height: 118px !important;
  max-height: none !important;
  object-fit: contain !important;
  transform: none !important;
  padding: 10px !important;
}

.rj-footer-legal-extra {
  display: flex;
  flex-wrap: wrap;
  gap: 10px 18px;
  margin-top: 18px;
}

.rj-footer-legal-extra a {
  color: rgba(232,234,227,.82);
  font-size: 12px;
  font-weight: 800;
  letter-spacing: .08em;
  text-decoration: none;
  text-transform: uppercase;
}

.rj-footer-legal-extra a:hover {
  color: #fff;
}

@media (max-width: 900px) {
  .rj-shop-category-grid {
    flex-wrap: nowrap;
    overflow-x: auto;
    padding-bottom: 6px;
    -webkit-overflow-scrolling: touch;
  }
}

@media (max-width: 560px) {
  .rj-shop-category-nav {
    width: min(100% - 24px, 1240px);
    border-radius: 22px;
  }

  .rj-shop-category-card {
    flex: 0 0 auto;
    padding: 11px 15px;
  }

  .single-product .woocommerce-product-gallery__image,
  .single-product .woocommerce-product-gallery__image:first-child {
    min-height: 360px !important;
    height: 360px !important;
    border-radius: 22px !important;
  }

  .single-product .flex-control-thumbs {
    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
  }
}
');
}, 1200);

add_action('wp_footer', function () {
    if (!is_front_page() && !is_shop() && !is_product_category()) {
        return;
    }

    $categories = array(
        array('title' => 'All Puzzles', 'url' => get_permalink(wc_get_page_id('shop'))),
        array('title' => 'Best Sellers', 'url' => get_term_link('best-sellers', 'product_cat')),
        array('title' => '100-250 Pieces', 'url' => get_term_link('100-250-pieces', 'product_cat')),
        array('title' => '251-500 Pieces', 'url' => get_term_link('251-500-pieces', 'product_cat')),
        array('title' => '500+ Pieces', 'url' => get_term_link('500-plus-pieces', 'product_cat')),
        array('title' => 'Family Time', 'url' => get_term_link('family-puzzles', 'product_cat')),
        array('title' => 'Premium Gifting', 'url' => get_term_link('premium-gifting', 'product_cat')),
        array('title' => 'Abstract Art', 'url' => get_term_link('abstract-art', 'product_cat')),
    );

    foreach ($categories as $category) {
        if (is_wp_error($category['url'])) {
            return;
        }
    }
    ?>
    <script>
      (function () {
        if (document.querySelector('.rj-shop-category-nav')) return;
        var target = document.querySelector('.rj-commerce-featured') || document.querySelector('.woocommerce-products-header') || document.querySelector('.woocommerce');
        if (!target) return;
        var categories = <?php echo wp_json_encode($categories); ?>;
        var current = window.location.href.replace(/\/$/, "");
        var nav = document.createElement('section');
        nav.className = 'rj-shop-category-nav';
        nav.innerHTML = '<h2>Find the right puzzle faster.</h2><p>Filter by best sellers, piece count, gifting, family time and art style. Product pages, cart and payment remain powered by WooCommerce.</p><div class="rj-shop-category-grid">' + categories.map(function (item) {
          var url = String(item.url || "").replace(/\/$/, "");
          var active = url && current.indexOf(url) === 0 ? " is-active" : "";
          return '<a class="rj-shop-category-card' + active + '" href="' + item.url + '"><span>' + item.title + '</span></a>';
        }).join('') + '</div>';
        target.parentNode.insertBefore(nav, target);
      })();
    </script>
    <?php
}, 100);

add_action('wp_footer', function () {
    ?>
    <script>
      (function () {
        document.querySelectorAll('.single-product .woocommerce-product-gallery__image img').forEach(function (image) {
          image.style.transform = 'none';
          image.style.transformOrigin = 'center center';
        });

        document.querySelectorAll('.single-product .zoomImg').forEach(function (image) {
          image.remove();
        });

        var footerCopy = document.querySelector('.rj-footer-disclaimer');
        if (!footerCopy || document.querySelector('.rj-footer-legal-extra')) return;

        var legal = document.createElement('nav');
        legal.className = 'rj-footer-legal-extra';
        legal.setAttribute('aria-label', 'Legal links');
        legal.innerHTML = [
          '<a href="https://rapturousjigsaw.com/privacy">Privacy</a>',
          '<a href="https://rapturousjigsaw.com/terms">Terms</a>',
          '<a href="https://rapturousjigsaw.com/refunds">Refunds</a>',
          '<a href="https://rapturousjigsaw.com/shipping">Shipping</a>'
        ].join('');

        footerCopy.insertAdjacentElement('afterend', legal);
      })();
    </script>
    <?php
}, 1200);

add_action('wp_enqueue_scripts', function () {
    wp_add_inline_style('rj-shop-branding', '
/* Final no-zoom override for all product gallery images. */
body.single-product .woocommerce-product-gallery,
body.single-product .woocommerce-product-gallery * {
  cursor: default !important;
}

body.single-product .woocommerce-product-gallery__image img,
body.single-product .woocommerce-product-gallery__image:hover img,
body.single-product .woocommerce-product-gallery__image a:hover img,
body.single-product .woocommerce-product-gallery__image:first-child img,
body.single-product .woocommerce-product-gallery__image:first-child:hover img,
body.single-product .flex-control-thumbs img,
body.single-product .flex-control-thumbs img:hover,
body.single-product .flex-control-thumbs img.flex-active {
  transform: none !important;
  transform-origin: center center !important;
  transition: opacity .2s ease, border-color .2s ease !important;
  filter: saturate(1.04) contrast(1.02) drop-shadow(0 18px 22px rgba(30,30,30,.10)) !important;
  object-fit: contain !important;
  image-rendering: auto !important;
}

body.single-product .zoomImg,
body.single-product .woocommerce-product-gallery__trigger {
  display: none !important;
  opacity: 0 !important;
  visibility: hidden !important;
  pointer-events: none !important;
}

.rj-footer-links .rj-footer-legal-column h3 {
  margin: 0 0 16px;
  color: rgba(232,234,227,.58);
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 10px;
  font-weight: 900;
  letter-spacing: .24em;
  text-transform: uppercase;
}
');
}, 9999);

add_action('wp_footer', function () {
    ?>
    <script>
      (function () {
        function disableProductZoom() {
          document.querySelectorAll('body.single-product .zoomImg, body.single-product .woocommerce-product-gallery__trigger').forEach(function (element) {
            element.remove();
          });
          document.querySelectorAll('body.single-product .woocommerce-product-gallery__image img, body.single-product .flex-control-thumbs img').forEach(function (image) {
            image.style.transform = 'none';
            image.style.transformOrigin = 'center center';
            image.style.transition = 'opacity .2s ease, border-color .2s ease';
          });
        }

        disableProductZoom();
        window.setTimeout(disableProductZoom, 500);
        window.setTimeout(disableProductZoom, 1500);

        var footerLinks = document.querySelector('.rj-footer-links');
        if (footerLinks && !document.querySelector('.rj-footer-legal-column')) {
          var legalColumn = document.createElement('div');
          legalColumn.className = 'rj-footer-legal-column';
          legalColumn.innerHTML = '<h3>Legal</h3><a href="https://rapturousjigsaw.com/privacy">Privacy</a><a href="https://rapturousjigsaw.com/terms">Terms</a><a href="https://rapturousjigsaw.com/refunds">Refunds</a><a href="https://rapturousjigsaw.com/shipping">Shipping</a>';
          footerLinks.appendChild(legalColumn);
        }
      })();
    </script>
    <?php
}, 9999);

add_action('after_setup_theme', function () {
    remove_theme_support('wc-product-gallery-zoom');
}, 999);

add_action('wp_enqueue_scripts', function () {
    wp_add_inline_style('rj-shop-branding', '
/* Compact click-to-open product gallery v1. */
body.single-product .site-content .ast-container {
  max-width: 1220px !important;
}

body.single-product div.product {
  grid-template-columns: minmax(0, 540px) minmax(360px, 1fr) !important;
  gap: clamp(34px, 5vw, 72px) !important;
  align-items: start !important;
}

body.single-product div.product div.images.woocommerce-product-gallery {
  width: 100% !important;
  max-width: 540px !important;
  float: none !important;
  overflow: hidden !important;
  margin: 0 !important;
}

body.single-product .woocommerce-product-gallery .flex-viewport {
  width: 100% !important;
  max-width: 540px !important;
  height: clamp(390px, 44vw, 520px) !important;
  min-height: 390px !important;
  overflow: hidden !important;
  border-radius: 26px !important;
  background:
    radial-gradient(circle at 30% 22%, rgba(255,255,255,.72), transparent 34%),
    linear-gradient(145deg, rgba(239,231,221,.94), rgba(120,134,107,.16) 56%, rgba(184,107,75,.08)) !important;
}

body.single-product .woocommerce-product-gallery__wrapper {
  height: 100% !important;
}

body.single-product .woocommerce-product-gallery__image,
body.single-product .woocommerce-product-gallery__image:first-child {
  height: clamp(390px, 44vw, 520px) !important;
  min-height: 0 !important;
  max-height: 520px !important;
  display: grid !important;
  place-items: center !important;
  overflow: hidden !important;
  border-radius: 0 !important;
  background: transparent !important;
  padding: clamp(16px, 2.2vw, 28px) !important;
}

body.single-product .woocommerce-product-gallery__image a {
  display: grid !important;
  place-items: center !important;
  width: 100% !important;
  height: 100% !important;
  cursor: zoom-in !important;
}

body.single-product .woocommerce-product-gallery__image img,
body.single-product .woocommerce-product-gallery__image:first-child img,
body.single-product .woocommerce-product-gallery__image:hover img,
body.single-product .woocommerce-product-gallery__image a:hover img {
  width: 100% !important;
  height: 100% !important;
  max-width: 100% !important;
  max-height: 100% !important;
  object-fit: contain !important;
  transform: none !important;
  transform-origin: center center !important;
  transition: none !important;
  filter: saturate(1.03) contrast(1.01) drop-shadow(0 18px 20px rgba(30,30,30,.10)) !important;
  image-rendering: auto !important;
  mix-blend-mode: multiply;
}

body.single-product .zoomImg,
body.single-product .woocommerce-product-gallery__trigger {
  display: none !important;
  opacity: 0 !important;
  visibility: hidden !important;
  pointer-events: none !important;
}

body.single-product .flex-control-thumbs {
  display: grid !important;
  grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
  gap: 10px !important;
  max-width: 540px !important;
  margin: 14px 0 0 !important;
}

body.single-product .flex-control-thumbs li {
  width: auto !important;
  height: 92px !important;
  float: none !important;
}

body.single-product .flex-control-thumbs img,
body.single-product .flex-control-thumbs img:hover,
body.single-product .flex-control-thumbs img.flex-active {
  width: 100% !important;
  height: 92px !important;
  max-height: 92px !important;
  object-fit: contain !important;
  transform: none !important;
  padding: 8px !important;
  border-radius: 14px !important;
}

body.single-product .rj-lightbox.is-open {
  display: grid !important;
}

@media (max-width: 980px) {
  body.single-product div.product {
    grid-template-columns: 1fr !important;
  }

  body.single-product div.product div.images.woocommerce-product-gallery,
  body.single-product .woocommerce-product-gallery .flex-viewport,
  body.single-product .flex-control-thumbs {
    max-width: 100% !important;
  }
}

@media (max-width: 560px) {
  body.single-product .woocommerce-product-gallery .flex-viewport,
  body.single-product .woocommerce-product-gallery__image,
  body.single-product .woocommerce-product-gallery__image:first-child {
    height: 340px !important;
    min-height: 340px !important;
  }

  body.single-product .flex-control-thumbs {
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
  }
}
');
}, 10000);

add_action('wp_footer', function () {
    if (!is_product()) {
        return;
    }
    ?>
    <script>
      (function () {
        function stabilizeGallery() {
          document.querySelectorAll('.single-product .zoomImg, .single-product .woocommerce-product-gallery__trigger').forEach(function (node) {
            node.remove();
          });
          document.querySelectorAll('.single-product .woocommerce-product-gallery__image img, .single-product .flex-control-thumbs img').forEach(function (img) {
            img.style.transform = 'none';
            img.style.transformOrigin = 'center center';
          });
        }

        stabilizeGallery();
        window.setTimeout(stabilizeGallery, 300);
        window.setTimeout(stabilizeGallery, 1200);
      })();
    </script>
    <?php
}, 10000);

add_action('wp_enqueue_scripts', function () {
    wp_add_inline_style('rj-shop-branding', '
/* Product gallery perfection pass for all product pages. */
.site-branding img,
.custom-logo {
  max-height: 64px !important;
}

body.single-product div.product div.images.woocommerce-product-gallery {
  max-width: 560px !important;
}

body.single-product .woocommerce-product-gallery .flex-viewport {
  max-width: 560px !important;
  height: clamp(410px, 44vw, 540px) !important;
  min-height: 410px !important;
  border: 1px solid rgba(30,30,30,.07) !important;
  border-radius: 24px !important;
  background:
    radial-gradient(circle at 32% 24%, rgba(255,255,255,.82), transparent 38%),
    linear-gradient(145deg, rgba(244,239,231,.82), rgba(239,231,221,.72)) !important;
  box-shadow: 0 22px 62px -52px rgba(30,30,30,.45);
}

body.single-product .woocommerce-product-gallery__image,
body.single-product .woocommerce-product-gallery__image:first-child {
  height: clamp(410px, 44vw, 540px) !important;
  padding: clamp(18px, 2.4vw, 30px) !important;
}

body.single-product .woocommerce-product-gallery__image img,
body.single-product .woocommerce-product-gallery__image:first-child img,
body.single-product .woocommerce-product-gallery__image:hover img,
body.single-product .woocommerce-product-gallery__image a:hover img {
  opacity: 1 !important;
  mix-blend-mode: normal !important;
  filter: saturate(1.02) contrast(1.02) drop-shadow(0 14px 18px rgba(30,30,30,.08)) !important;
}

body.single-product .flex-control-thumbs {
  max-width: 560px !important;
  gap: 12px !important;
  margin-top: 18px !important;
}

body.single-product .flex-control-thumbs li {
  height: 96px !important;
}

body.single-product .flex-control-thumbs img,
body.single-product .flex-control-thumbs img:hover,
body.single-product .flex-control-thumbs img.flex-active {
  height: 96px !important;
  max-height: 96px !important;
  opacity: 1 !important;
  mix-blend-mode: normal !important;
  filter: none !important;
  background: rgba(255,255,255,.72) !important;
  border: 1px solid rgba(30,30,30,.08) !important;
  box-shadow: 0 12px 30px -26px rgba(30,30,30,.45);
}

body.single-product .flex-control-thumbs img.flex-active {
  border-color: #1d647a !important;
  box-shadow: 0 0 0 1px rgba(29,100,122,.35), 0 16px 34px -28px rgba(29,100,122,.65);
}

body.single-product .flex-control-thumbs img:hover {
  border-color: rgba(29,100,122,.42) !important;
}

@media (max-width: 560px) {
  .site-branding img,
  .custom-logo {
    max-height: 54px !important;
  }

  body.single-product .woocommerce-product-gallery .flex-viewport,
  body.single-product .woocommerce-product-gallery__image,
  body.single-product .woocommerce-product-gallery__image:first-child {
    height: 350px !important;
    min-height: 350px !important;
  }

  body.single-product .flex-control-thumbs li,
  body.single-product .flex-control-thumbs img,
  body.single-product .flex-control-thumbs img:hover,
  body.single-product .flex-control-thumbs img.flex-active {
    height: 82px !important;
    max-height: 82px !important;
  }
}
');
}, 10050);
