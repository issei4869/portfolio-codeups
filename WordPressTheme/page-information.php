<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Service</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information-mv.jpeg" alt="サービスページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
    <!-- Tab -->
    <div class="layout-sub-information sub-information">
      <div class="sub-information__inner inner">
        <div data-id="#sub-info" id="sub-info" class="sub-information__tab information-tab">
          <ul class="information-tab__content information-tab-content">
            <li id="tab01" class="information-tab-content__list information-list">
              <div class="information-list__img information-list__img--sub">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information2.jpeg" alt="音楽スタジオの画像">
              </div>
              <div class="information-list__wrap information-list__wrap--sub">
                <h3 class="information-list__title information-list__title--sub">防音室無料</h3>
                  <p class="information-list__text">
                    レッスン以外の練習の場として防音室を2室開放しております。
                    <br>空室＆一人一日2時間という条件がありますが、練習の場として是非ご利用ください！
                    <br>また、レコーディングも無料のため、音源制作やYouTube発信が可能です。
                  </p>
              </div>
            </li>
            <li id="tab02" class="information-tab-content__list information-list information-list--second">
              <div class="information-list__img information-list__img--sub">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information1.jpeg" alt="楽器の画像">
              </div>
              <div class="information-list__wrap information-list__wrap--sub">
                <h3 class="information-list__title information-list__title--sub">楽器貸出無料</h3>
                  <p class="information-list__text">
                    レッスン中や防音室での練習時に使用する楽器を無料で貸出しております。
                    <br>楽器ないからレッスン受けれない...といったご心配はいりません！
                  </p>
              </div>
            </li>
            <li id="tab03" class="information-tab-content__list information-list">
              <div class="information-list__img information-list__img--sub">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information3.jpeg" alt="ライブハウスの画像">
              </div>
              <div class="information-list__wrap information-list__wrap--sub">
                <h3 class="information-list__title information-list__title--sub">年2回の発表会</h3>
                  <p class="information-list__text">
                    毎年3月と9月にスクール内で発表会を開催しております。
                    <br>一般のお客様もご来場いただいており大盛況です。
                    <br>発表会後、講師陣によるフィードバックがあり、更なる課題と成長に繋がります。
                    <br>日頃の練習の成果を発揮する場として、思う存分音楽を楽しみましょう！
                  </p>
              </div>
            </li>
          </ul>
        </div>
      </div>
  </div>
<?php get_footer(); ?>