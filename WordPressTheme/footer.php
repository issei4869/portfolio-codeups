<!-- Contactセクション -->
<?php if(!is_page('contact') && !is_404() ): ?>
  <section class="layout-contact contact">
    <!-- セクションタイトルの共通パーツ -->
    <div class="contact__title">
      <h2 class="section-header">
        <span class="section-header__title">Trial</span>
        <span class="section-header__subtitle">無料体験</span>
      </h2>
    </div>
    <div class="contact__link">無料体験・無料体験申込はコチラ</div>
    <div class="contact__btn">
      <!-- ボタンの共通パーツ -->
      <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn">
        <span>Contact us</span>
      </a>
    </div>
  </section>
<?php endif; ?>
</main>

<footer class="layout-footer footer <?php if (is_404()){ echo 'footer--404'; }; ?>">
    <div class="footer__inner">
      <div class="footer__content">
        <div class="footer__top">
          <div class="footer__logo">
            <a href="<?php echo esc_url( home_url( '/' ) )?>">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo_white1.png" alt="白いCodeUpsのロゴ">
            </a>
          </div>
          <div class="footer__sns">
            <a class="footer__sns-icon" href="https://www.facebook.com" target="_blank" rel="noopener">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/facebookLogo.svg" alt="Facebookのアイコン">
            </a>
            <a class="footer__sns-icon" href="https://www.instagram.com" target="_blank" rel="noopener">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/instagramLogo.svg" alt="インスタグラムのアイコン">
            </a>
          </div>
        </div>
        <div class="footer__bottom nav-list">
          <div class="nav-list__items nav-items">
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>">コース</a>
              </li>
              <?php
                $terms = get_terms('campaign_category');
                foreach ( $terms as $term ) {
                  //var_dump(get_term_link($term));
                  echo '<li class="nav-items__item-category"><a href="'.get_term_link($term).'#sub-campaign">'.esc_html($term->name).'</a></li>';
                }
              ?>
            </ul>
            <!-- <div class="nav-items__item"> -->
            <!-- </li> -->
          </div>
          <div class="nav-list__items nav-items">
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>">私たちについて</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/information/' ) )?>">サービス</a>
              </li>
              <li class="nav-items__item-category">
                <a class="js-link-menu" data-number="tab01" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab01">防音室無料</a>
              </li>
              <li class="nav-items__item-category">
                <a class="js-link-menu" data-number="tab02" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab02">楽器貸出無料</a>
              </li>
              <li class="nav-items__item-category">
                <a class="js-link-menu" data-number="tab03" href="<?php echo esc_url( home_url( '/information/' ) )?>#tab03">年2回の発表会</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/blog/' ) )?>">ブログ</a>
              </li>
            </ul>
          </div>
          <div class="nav-list__items nav-items">
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/voice/' ) )?>">生徒様の声</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/price/' ) )?>">料金一覧</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price1">入会金</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price2">高校生～大人</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price3">中学生</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/price/' ) )?>#sub-price4">幼児～小学生</a>
              </li>
            </ul>
          </div>   
          <div class="nav-list__items nav-items">
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/faq/' ) )?>">よくある質問</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/privacypolicy/' ) )?>">プライバシー<br class="u-mobile">ポリシー</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/terms-of-service/' ) )?>">利用規約</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/contact/' ) )?>">無料体験</a>
              </li>
            </ul>
            <ul class="nav-items__item">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/sitemap/' ) )?>">サイトマップ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <small class="footer__copyright">Copyright &copy; 2024 Hasegawa Music School LLC. All Rights Reserved.</small>
    </div>
  </footer>
  <div class="page-top" id="page-topbtn"><a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/totop-yellow1.png" alt="上にスクロールするボタン"></a></div>
  <!-- functions.phpを読み込むために必要 -->
  <?php wp_footer(); ?>
  <?php if (is_404()){ echo '</div>'; }; ?>
</body>
</html>