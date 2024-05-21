<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Contact</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv.jpeg" alt="お問合せページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <!-- お問い合わせフォーム -->
  <div class="layout-contactform contactform music">
    <div class="contactform__inner inner">
      <?php echo do_shortcode('[contact-form-7 id="049ca21" title="お問い合わせ"]'); ?>
    </div>
  </div>
<?php get_footer(); ?>