<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Contact</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-mv.jpeg" alt="無料体験ページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <!-- お問い合わせフォーム -->
  <div class="layout-contact-thanks contact-thanks fish">
    <div class="contact-thanks__inner inner">
      <p class="contact-thanks__text">
        お問い合わせ内容を送信完了しました。
      </p>
      <p class="contact-thanks__subtext">
        このたびは、お問い合わせ頂き
        <br class="u-mobile">誠にありがとうございます。
        <br>お送り頂きました内容を確認の上、
        <br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。
        <br>また、ご記入頂いたメールアドレスへ、
        <br class="u-mobile">自動返信の確認メールをお送りしております。
      </p>
    </div>
  </div>
<?php get_footer(); ?>