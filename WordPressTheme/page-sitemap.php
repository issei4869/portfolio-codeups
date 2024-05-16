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
  
  <div class="layout-sitemap sitemap">
    <div class="sitemap__inner inner">
      <!-- <div class="sitemap__content"> -->
        <div class="sitemap__wrap nav-list">
          <ul class="nav-list__items nav-items nav-items--sitemap">
            <li>
              <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>">私たちについて</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>">コース</a>
            </li>
            <li>
              <ul class="nav-items__item">
                <?php
                  $terms = get_terms('campaign_category');
                  foreach ( $terms as $term ) {
                    //var_dump(get_term_link($term));
                    echo '<li class="nav-items__item-category nav-items__item-category--sitemap"><a href="'.get_term_link($term).'#sub-campaign">'.esc_html($term->name).'</a></li>';
                  }
                ?>
              </ul>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price0">料金一覧</a>
            </li>
            <li>
              <ul class="nav-items__item nav-items__item--price">
                <li class="nav-items__item-category nav-items__item-category--sitemap">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price1">入会金</a>
                </li>
                <li class="nav-items__item-category nav-items__item-category--sitemap">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price2">高校生～大人</a>
                </li>
                <li class="nav-items__item-category nav-items__item-category--sitemap">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price3">中学生</a>
                </li>
                <li class="nav-items__item-category nav-items__item-category--sitemap">
                  <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price4">幼児～小学生</a>
                </li>
              </ul>
            </li>
            <!-- </li> -->
          </ul>
          <ul class="nav-list__items nav-items nav-items--sitemap">
            <li>
              <a href="<?php echo esc_url( home_url( '/blog/' ) )?>">ブログ</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/voice/' ) )?>">生徒様の声</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/faq/' ) )?>">よくある質問</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) )?>">プライバシー<br class="u-mobile">ポリシー</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) )?>">利用規約</a>
            </li>
            <li>
              <a href="<?php echo esc_url( home_url( '/sitemap/' ) )?>">サイトマップ</a>
            </li>
          </ul>
        </div>
      <!-- </div> -->
    </div>
  </div>
<?php get_footer(); ?>