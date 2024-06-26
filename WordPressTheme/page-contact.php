<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Trial</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv.jpeg" alt="">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <!-- お問い合わせフォーム -->
  <div class="layout-contactform contactform">
    <div class="background">
      <div class="contactform__inner inner">
          <?php echo do_shortcode('[contact-form-7 id="049ca21" title="無料体験申込"]'); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>