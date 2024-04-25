<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Privacy Policy</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacy-mv.jpeg" alt="プライバシーポリシーページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <section class="layout-privacypolicy privacypolicy fish">
    <div class="privacypolicy__inner inner">
      <div class="privacypolicy__explanation explanation">
        <h2 class="explanation__title">
          <?php the_title(); ?>
        </h2>
        <div class="explanation__contents">
          <p>以下は、Webサイトで使用するための一般的なプライバシーポリシーの例です。</p>
          <ol class="explanation__space">
            <?php the_content(); ?>
          </ol>
          <p>以上が、当社のプライバシーポリシーの概要です。お客様の個人情報保護のために、常に努めてまいります。</p>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>