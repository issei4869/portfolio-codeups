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
    <header class="layout-header header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href="<?php echo esc_url( home_url( '/' ) )?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo_white1.png" alt="白いCodeUpsのロゴ">
          </a>
        </h1>
        <nav class="header__nav">
          <ul class="header__nav-items">
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>">Course<span>コース</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>">About us<span>私たちについて</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/information/' ) )?>">Service<span>サービス</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/blog/' ) )?>">Blog<span>ブログ</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/voice/' ) )?>">Voice<span>生徒様の声</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/price/' ) )?>">Price<span>料金一覧</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/faq/' ) )?>">FAQ<span>よくある質問</span></a>
            </li>
            <li class="header__nav-item">
              <a href="<?php echo esc_url( home_url( '/contact/' ) )?>">Contact<span>お問合せ</span></a>
            </li>
          </ul>
        </nav>
        <button class="header__hamburger js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="header__drawer js-drawer">
          <div class="header__drawer-inner">
            <div class="header__drawer-contents">
              <div class="header__drawer-wrap nav-list">
                <ul class="nav-list__items nav-items">
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>"><span>コース</span></a>
                  </li>
                  <li class="nav-items__item">
                    <?php
                      $terms = get_terms('campaign_category');
                      foreach ( $terms as $term ) {
                        //var_dump(get_term_link($term));
                        echo '<a href="'.get_term_link($term).'">'.esc_html($term->name).'</a>';
                      }
                    ?>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>"><span>私たちについて</span></a>
                  </li>
                </ul>   
                <ul class="nav-list__items nav-items">
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/information/' ) )?>"><span>サービス</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a class="js-link-menu" data-number="tab01" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab01">防音室無料</a>
                  </li>
                  <li class="nav-items__item">
                    <a class="js-link-menu" data-number="tab02" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab02">楽器貸出無料</a>
                  </li>
                  <li class="nav-items__item">
                    <a class="js-link-menu" data-number="tab03" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab03">年2回の発表会</a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/blog/' ) )?>"><span>ブログ</span></a>
                  </li>
                </ul>
              </div>
              <div class="header__drawer-wrap nav-list">
                <ul class="nav-list__items nav-items">
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/voice/' ) )?>"><span>生徒様の声</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/price/' ) )?>"><span>料金一覧</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price1">入会金</a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price2">高校生～大人</a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price3">中学生</a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price4">幼児～小学生</a>
                  </li>
                </ul>   
                <ul class="nav-list__items nav-items">
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/faq/' ) )?>"><span>よくある質問</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) )?>"><span>プライバシー<br class="u-mobile">ポリシー</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) )?>"><span>利用規約</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) )?>"><span>お問合せ</span></a>
                  </li>
                  <li class="nav-items__item">
                    <a href="<?php echo esc_url( home_url( '/sitemap/' ) )?>"><span>サイトマップ</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>