<?php get_header(); ?>
<main>
    <!-- MVセクション -->
    <section class="mv mv--sub dark">
      <div class="mv__inner">
        <div class="mv__title-wrap mv__title-wrap--sub">
          <h2 class="mv__main-title mv__main-title--sub">Terms of Service</h2>
        </div>
        <div class="mv__swiper">
          <picture class="mv__swiper-img">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacy-mv.jpeg" alt="利用規約ページMV画像">
          </picture>
        </div>
      </div>
    </section>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb') ?>
    
    <section class="layout-privacypolicy terms-of-service">
      <div class="terms-of-service__inner inner">
        <div class="terms-of-service__explanation explanation">
          <h2 class="explanation__title">
            <?php the_title(); ?>
          </h2>
          <div class="explanation__contents">
            <p>以下は、Webサイトで使用する一般的な利用規約の例です。</p>
            <ol class="explanation__space">
              <?php the_content(); ?>
            </ol>
            <p>以上が、当社の利用規約の概要です。お客様のサービス利用にあたっては、本規約をお読みいただき、同意いただける場合のみサービスをご利用ください。</p>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>