<!-- Contactセクション -->
<?php if(!is_page('contact') && !is_404() ): ?>
  <section class="layout-contact contact">
    <div class="contact__inner inner">
      <!-- コンテンツ -->
      <div class="contact__content">      
        <!-- Googleマップ -->
        <div class="contact__place">
          <!-- ロゴ -->
          <div class="contact__logotitle">
            <div class="contact__logo">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo_yellow8.png" alt="青いCodeUpsのロゴ">
            </div>
          </div>
          <!-- 地図 -->
          <div class="contact__access">
            <!-- テキスト -->
            <div class="contact__address">
              <p class="contact__text">栃木県宇都宮市河原町</p>
              <p class="contact__text"><a href="tel:0120-000-0000">TEL:0120-000-0000</a></p>
              <p class="contact__text">営業時間:9:00-21:00</p>
              <p class="contact__text">定休日:毎週水曜日、年末年始</p>
            </div>
            <!-- <div class="contact__img"> -->
              <!-- <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact1.jpg" alt="Googleマップが埋め込まれる予定の画像"> -->
              <div class="contact__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1602.5841614942458!2d139.88310398884965!3d36.5500541930799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f6790924e9343%3A0xaf400a8827bab514!2z44CSMzIwLTA4MjIg5qCD5pyo55yM5a6H6YO95a6u5biC5rKz5Y6f55S6!5e0!3m2!1sja!2sjp!4v1713857348731!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            <!-- </div> -->
          </div>
        </div>
        <div class="contact__inquiry">
          <!-- セクションタイトルの共通パーツ -->
          <div class="contact__title section-header">
            <div class="section-header__title section-header__title--contact">Contact</div>
            <h2 class="section-header__subtitle section-header__subtitle--contact">お問合せ</h2>
          </div>
          <div class="contact__link">お問合せ・無料体験申込はコチラ</div>
          <div class="contact__btn">
            <!-- ボタンの共通パーツ -->
            <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn">
              <span>Contact us</span>
            </a>
          </div>
        </div>
      </div>         
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
        <div class="footer__bottom">
          <div class="footer__wrap nav-list">
            <ul class="nav-list__items nav-items">
              <li class="nav-items__item">
                <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>"><span>コース</span></a>
              </li>
              <!-- <li class="nav-items__item"> -->
                <?php
                  $terms = get_terms('campaign_category');
                  foreach ( $terms as $term ) {
                    //var_dump(get_term_link($term));
                    echo '<li class="nav-items__item"><a href="'.get_term_link($term).'#sub-campaign">'.esc_html($term->name).'</a></li>';
                  }
                ?>
              <!-- </li> -->
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
          <div class="footer__wrap nav-list">
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
      <small class="footer__copyright">Copyright &copy; 2024 Hasegawa Music School LLC. All Rights Reserved.</small>
    </div>
  </footer>
  <div class="page-top" id="page-topbtn"><a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/totop-yellow1.png" alt="上にスクロールするボタン"></a></div>
  <!-- functions.phpを読み込むために必要 -->
  <?php wp_footer(); ?>
  <?php if (is_404()){ echo '</div>'; }; ?>
</body>
</html>