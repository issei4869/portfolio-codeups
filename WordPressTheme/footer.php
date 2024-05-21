<!-- Contactセクション -->
<?php if(!is_page('contact') && !is_404() ): ?>
  <section class="layout-contact contact">
    <div class="contact__inner inner">
      <div class="background">
        <!-- セクションタイトルの共通パーツ -->
        <div class="contact__title">
          <h2 class="section-header">
            <span class="section-header__title">Trial</span>
            <span class="section-header__subtitle">無料体験申込</span>
          </h2>
        </div>
        <p class="contact__text">
          初回無料体験レッスンを行っております！
          <br>当スクールの雰囲気、レッスン内容を肌で感じていただき、
          <br>音楽の楽しさに是非触れてみてください！
        </p>
        <div class="contact__btn">
          <!-- ボタンの共通パーツ -->
          <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn btn--red">
            <span>無料体験予約はコチラ</span>
          </a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
</main>

<!-- sp版で固定表示 -->
<div class="btn-h u-mobile js-header">
  <!-- ボタンの共通パーツ -->
  <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn btn--red btn--sp">
    <span>無料体験予約はコチラ</span>
  </a>
</div>

<footer class="layout-footer footer <?php if (is_404()){ echo 'footer--404'; }; ?>">
  <div class="footer__inner">
    <div class="footer__content">
      <div class="footer__top">
        <div class="footer__logo">
          <a href="<?php echo esc_url( home_url( '/' ) )?>">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo_yellow8.png" alt="ハセガワミュージックスクール">
          </a>
        </div>
        <div class="footer__sns">
          <a class="footer__sns-icon" href="https://www.facebook.com" target="_blank" rel="noopener">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo-yellow.svg" alt="Facebook">
          </a>
          <a class="footer__sns-icon" href="https://www.instagram.com" target="_blank" rel="noopener">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/InstagramLogo-yellow.svg" alt="Instagram">
          </a>
        </div>
        <div class="footer__btn">
          <!-- ボタンの共通パーツ -->
          <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn btn--red">
            <span>無料体験レッスン申込へ</span>
          </a>
        </div>
      </div>
      <div class="footer__bottom nav-list">
        <ul class="nav-list__items nav-items">
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
                  echo '<li class="nav-items__item-category"><a href="'.get_term_link($term).'#sub-campaign">'.esc_html($term->name).'</a></li>';
                }
              ?>
            </ul>
          </li>
          <li>
            <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price0">料金一覧</a>
          </li>
          <li>
            <ul class="nav-items__item nav-items__item--price">
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price1">入会金</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price2">高校生～大人</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price3">中学生</a>
              </li>
              <li class="nav-items__item-category">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>#sub-price4">幼児～小学生</a>
              </li>
            </ul>
          </li>
          <!-- </li> -->
        </ul>
        <ul class="nav-list__items nav-items">
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
    </div>
    <small class="footer__copyright">Copyright &copy; 2024 Hasegawa Music School LLC. All Rights Reserved.</small>
  </div>
</footer>
<div class="page-top" id="page-topbtn"><a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/totop-yellow1.png" alt="上スクロール"></a></div>
<!-- functions.phpを読み込むために必要 -->
<?php wp_footer(); ?>
<?php if (is_404()){ echo '</div>'; }; ?>
</body>
</html>