<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  
  <!-- functions.phpを読み込むために必要 -->
  <?php wp_head(); ?>

  
</head>
<body>
  <?php if (is_404()){ echo '<div class="background">'; }; ?>
    <header class="layout-header header js-header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href="<?php echo esc_url( home_url( '/' ) )?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo_yellow8.png" alt="白いCodeUpsのロゴ">
          </a>
        </h1>
        <nav class="header__nav">
          <ul class="header__nav-items">
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>">About us<span>私たちについて</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>">Course & Price<span>コースと料金</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/blog/' ) )?>">Blog<span>ブログ</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/voice/' ) )?>">Voice<span>生徒様の声</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/faq/' ) )?>">FAQ<span>よくある質問</span></a>
            </li>
          </ul>
        </nav>
        <div class="header__btn">
          <!-- ボタンの共通パーツ -->
          <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn btn--red">
            <span>無料体験レッスン受付中</span>
          </a>
        </div>
        <button class="header__hamburger js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="header__drawer js-drawer">
          <nav class="header__drawer-nav nav-list">
            <ul class="nav-list__items nav-items nav-items--drawer">
              <div class="header__drawer--btn">
                <!-- ボタンの共通パーツ -->
                <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn btn--red btn--drawer">
                  <span>無料体験レッスン受付中</span>
                </a>
              </div>
              <li>
                <a href="<?php echo esc_url( home_url( '/aboutus/' ) )?>">私たちについて</a>
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
                      echo '<li class="nav-items__item-category nav-items__item-category--drawer"><a href="'.get_term_link($term).'#sub-campaign">'.esc_html($term->name).'</a></li>';
                    }
                  ?>
                </ul>
              </li>
              <li>
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price0">料金一覧</a>
              </li>
              <li>
                <ul class="nav-items__item nav-items__item--price">
                  <li class="nav-items__item-category nav-items__item-category--drawer">
                    <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price1">入会金</a>
                  </li>
                  <li class="nav-items__item-category nav-items__item-category--drawer">
                    <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price2">高校生～大人</a>
                  </li>
                  <li class="nav-items__item-category nav-items__item-category--drawer">
                    <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price3">中学生</a>
                  </li>
                  <li class="nav-items__item-category nav-items__item-category--drawer">
                    <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price4">幼児～小学生</a>
                  </li>
                </ul>
              </li>
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
              <!-- </li> -->
            </ul>
          </nav>
        </div>
        <!-- <div class="header__drawer-bg js-drawer"></div> -->
      </div>
    </header>