<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Site MAP</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacy-mv.jpeg" alt="サイトマップページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <div class="layout-sitemap sitemap fish">
    <div class="sitemap__inner inner">
      <div class="sitemap__content">
        <div class="sitemap__wrap nav-list">
          <ul class="nav-list__items nav-items">
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>"><span>キャンペーン</span></a>
            </li>
            <!-- <li class="nav-items__item nav-items__item--sitemap"> -->
              <?php
                $terms = get_terms('campaign_category');
                foreach ( $terms as $term ) {
                  //var_dump(get_term_link($term));
                  echo '<li class="nav-items__item nav-items__item--sitemap"><a class="js-link-menu" href="'.get_term_link($term).'">'.esc_html($term->name).'</a></li>';
                }
              ?>
            <!-- </li> -->
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>"><span>私たちについて</span></a>
            </li>
          </ul>   
          <ul class="nav-list__items nav-items">
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/information/' ) )?>"><span>サービス</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a class="js-link-menu" data-number="tab01" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab01">防音室無料</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a class="js-link-menu" data-number="tab02" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab02">楽器貸出無料</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a class="js-link-menu" data-number="tab03" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab03">年2回の発表会</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/blog/' ) )?>"><span>ブログ</span></a>
            </li>
          </ul>
        </div>
        <div class="sitemap__wrap nav-list">
          <ul class="nav-list__items nav-items">
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/voice/' ) )?>"><span>生徒様の声</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>"><span>料金一覧</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price1">入会金</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price2">高校生～大人</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price3">中学生</a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price3">幼児～小学生</a>
            </li>
          </ul>   
          <ul class="nav-list__items nav-items">
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/faq/' ) )?>"><span>よくある質問</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) )?>"><span>プライバシー<br class="u-mobile">ポリシー</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) )?>"><span>利用規約</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
              <a href="<?php echo esc_url( home_url( '/contact/' ) )?>"><span>お問合せ</span></a>
            </li>
            <li class="nav-items__item nav-items__item--sitemap">
            <a href="<?php echo esc_url( home_url( '/sitemap/' ) )?>"><span>サイトマップ</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>