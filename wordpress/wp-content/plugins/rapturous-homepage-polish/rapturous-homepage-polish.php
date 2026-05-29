<?php
/**
 * Plugin Name: Rapturous Homepage Polish
 * Description: Focused homepage layout polish for the Rapturous Jigsaw shop.
 * Version: 1.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', function () {
    if (!is_front_page()) {
        return;
    }

    wp_add_inline_style('rj-shop-branding', '
/* Clean homepage polish. */
.rj-commerce-logo,
.rj-commerce-strip,
.rj-commerce-trust {
  display: none !important;
}

.rj-commerce-hero {
  width: min(1360px, calc(100% - 28px)) !important;
  grid-template-columns: minmax(0, .68fr) minmax(520px, 1.32fr) !important;
  gap: clamp(20px, 4.8vw, 72px) !important;
  align-items: center !important;
  min-height: clamp(610px, 82vh, 780px) !important;
  padding-top: clamp(44px, 6vw, 76px) !important;
}

.rj-commerce-copy,
.rj-commerce-visual {
  align-self: center !important;
}

.rj-commerce-copy .rj-commerce-kicker {
  margin-top: 0 !important;
}

.rj-commerce-copy h1 {
  max-width: 520px !important;
  color: #1d647a !important;
  font-size: clamp(42px, 5.4vw, 72px) !important;
  line-height: .92 !important;
  letter-spacing: -.04em !important;
}

.rj-commerce-lede {
  max-width: 500px !important;
  font-size: clamp(15px, 1.25vw, 17px) !important;
  line-height: 1.78 !important;
}

.rj-commerce-visual {
  position: relative;
  display: grid !important;
  place-items: center !important;
  min-height: clamp(520px, 68vh, 720px) !important;
  overflow: visible !important;
  border: 0 !important;
  border-radius: 0 !important;
  background: transparent !important;
  box-shadow: none !important;
  padding: 0 !important;
}

.rj-commerce-visual video {
  width: min(860px, 100%) !important;
  max-height: 720px;
  aspect-ratio: 16 / 9;
  object-fit: cover;
  border: 0 !important;
  border-radius: 0 !important;
  background: #efe7dd;
  box-shadow: 0 30px 80px -58px rgba(30,30,30,.54);
}

.rj-video-sound-toggle {
  position: absolute;
  left: clamp(14px, 2vw, 24px);
  bottom: clamp(14px, 2vw, 24px);
  z-index: 5;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 42px;
  border: 0;
  border-radius: 999px;
  background: rgba(29,100,122,.96);
  color: #fff;
  padding: 12px 16px;
  font-family: "Manrope", system-ui, sans-serif;
  font-size: 11px;
  font-weight: 900;
  letter-spacing: .12em;
  line-height: 1;
  text-transform: uppercase;
  cursor: pointer;
  box-shadow: 0 18px 42px -28px rgba(30,30,30,.72);
}

.rj-video-sound-toggle.is-on {
  background: rgba(30,30,30,.88);
}

.rj-commerce-featured {
  padding-top: clamp(42px, 6vw, 76px) !important;
}

.rj-commerce-head {
  display: grid !important;
  grid-template-columns: minmax(0, 1fr) auto !important;
  gap: 16px 28px !important;
  align-items: end !important;
  margin-bottom: 24px !important;
}

.rj-commerce-head .rj-commerce-kicker {
  grid-column: 1 / -1;
  margin: 0 !important;
  writing-mode: initial !important;
  text-orientation: initial !important;
  color: #78866b !important;
  font-size: 10px !important;
  line-height: 1.2 !important;
  letter-spacing: .18em !important;
}

.rj-commerce-head h2 {
  max-width: 760px !important;
  font-size: clamp(28px, 3.5vw, 46px) !important;
  line-height: 1.02 !important;
  letter-spacing: -.035em !important;
}

.rj-commerce-head a {
  align-self: end !important;
  white-space: nowrap !important;
  font-size: 10px !important;
  line-height: 1 !important;
  letter-spacing: .16em !important;
}

body .rj-cart-float,
html body .rj-cart-float,
a.rj-cart-float,
body .rj-cart-float:hover,
html body .rj-cart-float:hover,
a.rj-cart-float:hover {
  background-color: #1d647a !important;
  background: #1d647a !important;
  color: #fff !important;
}

@media (max-width: 980px) {
  .rj-commerce-hero {
    width: min(100% - 24px, 1240px) !important;
    grid-template-columns: 1fr !important;
    min-height: auto !important;
  }

  .rj-commerce-visual {
    min-height: 430px !important;
  }
}

@media (max-width: 560px) {
  .rj-commerce-copy h1 {
    font-size: clamp(40px, 12.5vw, 58px) !important;
  }

  .rj-commerce-head {
    grid-template-columns: 1fr !important;
  }

  .rj-commerce-head h2 {
    font-size: clamp(27px, 9vw, 38px) !important;
  }

  .rj-commerce-visual video {
    min-height: 240px;
  }
}
');
}, 999);

add_action('wp_footer', function () {
    if (!is_front_page()) {
        return;
    }

    $video_url = content_url('/uploads/2026/05/rapturous-homepage-hero.mp4');
    ?>
    <script>
      (function () {
        var heroTitle = document.querySelector('.rj-commerce-copy h1');
        var heroText = document.querySelector('.rj-commerce-copy .rj-commerce-lede');
        var trust = document.querySelector('.rj-commerce-trust');
        var media = document.querySelector('.rj-commerce-visual');

        if (heroTitle) {
          heroTitle.innerHTML = 'Sharpen Up.<br>Solve Puzzle.';
        }

        if (heroText) {
          heroText.textContent = 'Shop premium artistic jigsaw puzzles crafted for mindful focus, thoughtful gifting, family time and relaxing screen-free moments.';
        }

        if (trust) {
          trust.remove();
        }

        if (!media) return;

        var videoUrl = <?php echo wp_json_encode($video_url); ?>;
        media.innerHTML = '<video autoplay muted loop playsinline controls preload="auto" aria-label="Rapturous Jigsaw product video"><source src="' + videoUrl + '" type="video/mp4"></video><button type="button" class="rj-video-sound-toggle">Sound off</button>';

        var video = media.querySelector('video');
        var button = media.querySelector('.rj-video-sound-toggle');
        if (!video) return;

        video.muted = true;
        video.defaultMuted = true;
        video.controls = true;
        video.playsInline = true;
        video.volume = 1;

        function attemptPlay() {
          var playPromise = video.play();
          if (playPromise && typeof playPromise.catch === 'function') {
            playPromise.catch(function () {});
          }
        }

        function renderButton() {
          if (!button) return;
          if (video.muted) {
            button.textContent = 'Sound off';
            button.classList.remove('is-on');
          } else {
            button.textContent = 'Sound on';
            button.classList.add('is-on');
          }
        }

        attemptPlay();
        renderButton();

        if (button) {
          button.addEventListener('click', function () {
            video.muted = !video.muted;
            video.defaultMuted = video.muted;
            video.volume = 1;
            attemptPlay();
            renderButton();
          });
        }
      })();
    </script>
    <?php
}, 999);

add_action('wp_enqueue_scripts', function () {
    wp_add_inline_style('rj-shop-branding', '
/* Premium navigation and refined floating shop icon. */
#masthead,
.site-header,
.main-header-bar,
.ast-primary-header-bar {
  position: sticky !important;
  top: 0 !important;
  z-index: 9999 !important;
}

.main-header-bar,
.ast-primary-header-bar {
  min-height: 74px !important;
  background: rgba(247,241,233,.9) !important;
  border-bottom: 1px solid rgba(13,31,42,.06) !important;
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  box-shadow: 0 18px 44px -40px rgba(13,31,42,.38);
}

.site-primary-header-wrap.ast-container {
  width: min(1120px, calc(100% - 32px)) !important;
  max-width: 1120px !important;
  padding-left: 0 !important;
  padding-right: 0 !important;
}

.ast-site-identity {
  padding: 10px 0 !important;
}

.site-branding img,
.custom-logo {
  max-height: 44px !important;
  width: auto !important;
  object-fit: contain !important;
}

.ast-builder-menu-1 .main-header-menu,
.main-header-menu {
  align-items: center !important;
  gap: 10px !important;
}

.main-header-menu > .menu-item > .menu-link,
.ast-builder-menu-1 .menu-item > .menu-link {
  min-height: 42px !important;
  height: auto !important;
  padding: 11px 10px !important;
  color: rgba(13,31,42,.72) !important;
  font-family: "Manrope", system-ui, sans-serif !important;
  font-size: 12px !important;
  font-weight: 900 !important;
  letter-spacing: .16em !important;
  line-height: 1 !important;
  text-transform: uppercase !important;
  transition: color .2s ease, background .2s ease, transform .2s ease, box-shadow .2s ease;
}

.main-header-menu > .menu-item > .menu-link:hover,
.main-header-menu > .current-menu-item > .menu-link,
.ast-builder-menu-1 .menu-item > .menu-link:hover,
.ast-builder-menu-1 .current-menu-item > .menu-link {
  color: #1d647a !important;
}

.main-header-menu > .menu-item > .menu-link:hover,
.ast-builder-menu-1 .menu-item > .menu-link:hover {
  transform: translateY(-1px);
}

.main-header-menu > .menu-item:nth-last-child(1) > .menu-link,
.ast-builder-menu-1 .main-header-menu > .menu-item:nth-last-child(1) > .menu-link {
  border-radius: 999px !important;
  background: #f86557 !important;
  color: #fffaf2 !important;
  padding: 13px 18px !important;
  box-shadow: 0 16px 32px -26px rgba(248,101,87,.95);
}

.main-header-menu > .menu-item:nth-last-child(1) > .menu-link:hover,
.ast-builder-menu-1 .main-header-menu > .menu-item:nth-last-child(1) > .menu-link:hover {
  background: #ef5547 !important;
  color: #fff !important;
}

.rj-cart-float {
  width: 58px !important;
  height: 58px !important;
  background: #1d647a !important;
  color: #fff !important;
  box-shadow: 0 20px 48px -30px rgba(13,31,42,.75) !important;
  transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
}

.rj-cart-float:hover {
  transform: translateY(-3px) scale(1.02);
  background: #174f61 !important;
  box-shadow: 0 24px 58px -34px rgba(13,31,42,.85) !important;
}

.rj-cart-icon {
  display: grid !important;
  place-items: center !important;
  width: 26px;
  height: 26px;
  font-size: 0 !important;
}

.rj-cart-icon svg {
  width: 25px;
  height: 25px;
  display: block;
}

.rj-cart-count {
  right: -3px !important;
  top: -4px !important;
  background: #b86b4b !important;
  border: 2px solid #f7f4ee;
}

@media (max-width: 921px) {
  .ast-mobile-header-wrap .ast-primary-header-bar {
    min-height: 70px !important;
  }

  .ast-mobile-header-content {
    background: rgba(247,241,233,.97) !important;
    border-top: 1px solid rgba(13,31,42,.07);
    box-shadow: 0 20px 44px -36px rgba(13,31,42,.45);
  }

  .ast-builder-menu-mobile .main-navigation .main-header-menu .menu-item > .menu-link {
    color: rgba(13,31,42,.78) !important;
    background: transparent !important;
    font-size: 12px !important;
    font-weight: 900 !important;
    letter-spacing: .14em !important;
    text-transform: uppercase !important;
  }

  [data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg {
    fill: #1d647a !important;
  }
}
');
}, 1000);

add_action('wp_footer', function () {
    ?>
    <script>
      (function () {
        var icons = document.querySelectorAll('.rj-cart-icon');
        icons.forEach(function (icon) {
          icon.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7.2 8.25h9.6l-.72 9.45a2.35 2.35 0 0 1-2.34 2.17H10.26a2.35 2.35 0 0 1-2.34-2.17L7.2 8.25Z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9.25 8.25V7a2.75 2.75 0 0 1 5.5 0v1.25" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M9.6 11.4h4.8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>';
        });
      })();
    </script>
    <?php
}, 1000);
