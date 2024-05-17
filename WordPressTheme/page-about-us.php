<?php get_header(); ?>
<main>
    <!-- MVセクション -->
    <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">About us</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-mv.jpeg" alt="私たちについてページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <!-- About us -->
  <div class="layout-aboutus layout-aboutus--sub aboutus">
    <div class="aboutus__inner inner">
      <div class="aboutus__wrap aboutus__wrap--sub">
        <picture class="aboutus__img">
          <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus1.jpg">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus4.jpg" alt="">
        </picture>
        <div class="aboutus__wrap-right">
          <div class="aboutus__main-title">
            Let's do<br>some music
          </div>
          <p class="aboutus__text">
            当サイトをご覧いただきありがとうございます！
            <br>代表兼講師の長谷川一輝です。
            <br>個々の生徒の目標やニーズに合わせて、自信を持って演奏できるよう全力でサポートします。
            <br>音楽の力は無限大です。共に笑い楽しみ成長しましょう！
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- ギャラリー -->
  <div class="layout-gallery gallery">
    <div class="gallery__inner inner">
      <?php 
        $fields = SCF::get_option_meta('aboutus_options', 'aboutus');
      ?>
      <?php if (!empty($fields)) : ?>
        <!-- セクションタイトルの共通パーツ -->
        <div class="gallery__title">
          <h2 class="section-header">
            <span class="section-header__title"> Gallery</span>
            <span class="section-header__subtitle">フォト</span>
          </h2>
        </div>
        <ul class="gallery__list gallery-list">
        <?php
          // $fields = SCF::get_option_meta('aboutus_options', 'aboutus');
          foreach ($fields as $field):
          $image_url = wp_get_attachment_image_src($field['gallery'] , 'full');
          $image_alt = esc_html($field['alttext'] , 'full');
          // $sample_image_data = get_post(SCF::get('aboutus_options'));
          // $image_alt = get_post_meta($sample_image_data->ID, '_wp_attachment_image_alt', true );
        ?>
          <li class="gallery-list__item js-gallery-list__item">
            <img src="<?php echo $image_url[0]; ?>" alt="<?php echo $image_alt; ?>" />
          </li>
        <?php endforeach; ?>
        </ul>
        <!-- コース画像のモーダル時のグレー背景 -->
        <div id="grayDisplay"></div>
      <?php endif; ?>
    </div>
  </div>

<?php get_footer(); ?>