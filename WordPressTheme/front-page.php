<?php get_header(); ?>
<main>
    <!-- MVセクション -->

    <!-- スライダー選択用ファイル -->
    <?php get_template_part('parts/project/mv'); ?>

    <!-- About usセクション -->
    <section class="layout-aboutus aboutus">
      <div class="aboutus__inner inner">
        <!-- セクションタイトルの共通パーツ -->
        <div class="aboutus__title">
          <h2 class="section-header">
            <span class="section-header__title">About us</span>
            <span class="section-header__subtitle">私たちについて</span>
          </h2>
        </div>
        <div class="aboutus__wrap">
          <picture class="aboutus__img">
            <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus1.jpg">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/aboutus4.jpg" alt="ライブハウスでのライブ画像">
          </picture>
          <div class="aboutus__wrap-right">
            <div class="aboutus__main-title">
              Let's do<br>some music
            </div>
            <p class="aboutus__text">
              当サイトをご覧いただきありがとうございます！
              <br>代表兼講師の長谷川一輝です。
              <br>個々の生徒の目標やニーズに合わせて、自信を持って演奏できるよう全力でサポートします。
              <br>音楽の力は無限大です。共に笑い楽しみ成長しましょう！
            </p>
            <div class="aboutus__btn">
              <!-- ボタンの共通パーツ -->
              <a href="<?php echo esc_url( home_url( '/about-us/' ) )?>" class="btn">
                <span>View more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Campaignセクション -->
    <section class="layout-campaign campaign">
      <div class="campaign__inner inner">
        <!-- セクションタイトルの共通パーツ -->
        <?php $recent_query = new WP_Query(
          array(
            'post_type' => 'campaign',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
          )
        );
        ?>
        <?php if ($recent_query->have_posts()) : ?>
          <div class="campaign__title">
            <h2 class="section-header">
              <span class="section-header__title">Course</span>
              <span class="section-header__subtitle">コース</span>
            </h2>
          </div>
          <div class="campaign__swiper campaign-swiper">
            <div class="campaign-swiper__js swiper js-campaign-swiper">
              <ul class="campaign-swiper__wrapper swiper-wrapper">
                
                <?php while($recent_query->have_posts()) : ?>
                  <?php $recent_query->the_post(); ?>
                    <li class="campaign-swiper__slide swiper-slide">
                    
                   
                      <a href="<?php the_permalink(); ?>" class="campaign-card">
                              
                        <div class="campaign-card__img">
                        <?php if (has_post_thumbnail()) : ?>
                          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                        <?php else: ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
                        <?php endif; ?>
                        </div>
                        <div class="campaign-card__content">
                          <!-- カテゴリー -->
                          <div class="campaign-card__meta">
                            <?php
                              $terms = get_the_terms(get_the_ID(), 'campaign_category'); // カスタムタクソノミーのタームを取得
                              if ($terms && !is_wp_error($terms)) { // タームが取得されているか確認
                                  $term = array_shift($terms); // 最初のタームを取得
                                  $cat_name = $term->name; // ターム名を取得
                                  echo '<p class="campaign-card__category">' . $cat_name . '</p>'; // ターム名を表示
                              }
                            ?>
                          </div>
                          <!-- タイトル -->
                          <div class="campaign-card__title"><?php the_title(); ?></div>
                            <!-- サブタイトル -->
                          <div class="campaign-card__wrapper">
                            <!-- <div class="campaign-card__subtitle">
                              全部コミコミ(お一人様)
                            </div> -->
                            <?php 
                              $price_group = get_field('price_group');
                              $period_group = get_field('period_group');
                            ?>
                            <div class="campaign-card__price">
                              <?php if($price_group) : ?>
                                <?php if($price_group['general_price']) : ?>
                                  <div class="campaign-card__false">
                                    <span><?php echo $price_group['general_price']; ?></span>
                                  </div>
                                <?php endif; ?>
                                <div class="campaign-card__true">
                                  <?php if($price_group['campaign_price']) : ?>
                                    <span><?php echo $price_group['campaign_price']; ?></span>
                                  <?php else: ?>
                                    <span>検討中</span>
                                  <?php endif; ?>
                                </div>
                              <?php else: ?>
                                <div class="campaign-card__true">
                                  <span>検討中</span>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </a>
                    </li>
                <?php endwhile; ?>            
              </ul>
            </div>
          </div>
          <div class="campaign__button">
            <div class="campaign__prev swiper-button-prev js-campaign-arrow"></div>
            <div class="campaign__next swiper-button-next js-campaign-arrow"></div>
          </div>
          <div class="campaign__btn">
            <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?> 
      </div>
    </section>

    <!-- Informationセクション -->
    <section class="layout-information information">
      <div class="information__inner inner">
        <!-- セクションタイトルの共通パーツ -->
        <div class="information__title">
          <h2 class="section-header">
            <span class="section-header__title">Service</span>
            <span class="section-header__subtitle">サービス</span>
          </h2>
        </div>
        <div class="information__list information-list">
          <div class="information-list__img colorbox js-color">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information1.jpeg" alt="楽器の画像">
          </div>
          <div class="information-list__wrap">
            <div class="information-list__title">サービス、オプションの紹介</div>
            <p class="information-list__text">当スクールはただレッスンを受けて終わり...ではありません。
            <br>技術の向上、音楽を楽しむ環境づくりを徹底しております！その想いはレッスンだけにはとどまりません。</p>
            <div class="information-list__btn">
              <!-- ボタンの共通パーツ -->
              <a href="<?php echo esc_url( home_url( '/information/' ) )?>" class="btn">
                <span>View more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- blogセクション -->
    <!-- セクションタイトルの共通パーツ -->
    <?php $recent_query = new WP_Query(
      array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <?php if ($recent_query->have_posts()) : ?>
      <section class="layout-blog blog">
        <div class="blog__bg u-desktop">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-bg.jpeg" alt="Blogセクション背景画像">
        </div>
        <div class="blog__inner inner">
          <div class="blog__title">
            <h2 class="section-header section-header--white">
              <span class="section-header__title">Blog</span>
              <span class="section-header__subtitle">ブログ</span>
            </h2>
          </div>
          <ul class="blog__list blog-list">
            <?php while($recent_query->have_posts()) : ?>
              <?php $recent_query->the_post(); ?>
                <li class="blog-list__item blog-card">
                  <a href="<?php the_permalink(); ?>">
                    <div class="blog-card__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
                      <?php endif; ?>
                    </div>
                    <div class="blog-card__meta">
                      <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m.d'); ?>
                      </time>
                      <p class="blog-card__title"><?php the_title(); ?></p>
                      <p class="blog-card__text"><?php echo wp_trim_words( get_the_content(), 85, '' ); ?></p>
                    </div>
                  </a>
                </li>
            <?php endwhile; ?>
          </ul>
          <div class="blog__btn">
            <!-- ボタンの共通パーツ -->
            <a href="<?php echo esc_url( home_url( '/blog/' ) )?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <!-- Voiceセクション -->
    <?php $recent_query = new WP_Query(
      array(
        'post_type' => 'voice',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <?php if ($recent_query->have_posts()) : ?>
      <section class="layout-voice voice">
        <div class="voice__inner inner">
          <!-- セクションタイトルの共通パーツ -->
          <div class="voice__title">
            <h2 class="section-header">
              <span class="section-header__title">Voice</span>
              <span class="section-header__subtitle">生徒様の声</span>
            </h2>
          </div>
          <ul class="voice__list voice-list">
            <?php while($recent_query->have_posts()) : ?>
              <?php $recent_query->the_post(); ?>
                <li class="voice-list__item voice-card">
                  <!-- 上のコンテンツ -->
                  <div class="voice-card__contents">
                    <!--左側のコンテンツ -->
                    <div class="voice-card__content">
                      <?php 
                        $voice_group = get_field('voice_group');
                        $voice_text = get_field("voice_text");
                      ?>
                      <!-- 年齢とカテゴリー -->
                      <div class="voice-card__meta">
                        <?php if($voice_group) : ?>
                          <div class="voice-card__age">
                            <?php echo $voice_group['voice_age']; ?><?php echo $voice_group['voice_gender']; ?>
                          </div>
                        <?php endif; ?>
                        <?php
                          $terms = get_the_terms(get_the_ID(), 'voice_category'); // カスタムタクソノミーのタームを取得
                          if ($terms && !is_wp_error($terms)) { // タームが取得されているか確認
                              $term = array_shift($terms); // 最初のタームを取得
                              $cat_name = $term->name; // ターム名を取得
                              echo '<p class="voice-card__category">' . $cat_name . '</p>'; // ターム名を表示
                          }
                        ?>
                      </div>
                      <!-- タイトル -->
                      <div class="voice-card__title"><?php the_title(); ?></div>
                    </div>
                    <!-- 右側の画像 -->
                    <div class="voice-card__img colorbox js-color">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
                      <?php endif; ?>
                    </div>
                  </div>
                  <!-- 下のテキスト -->
                  <?php if(get_field('voice_text')) : ?>
                    <div class="voice-card__text">
                      <?php if (mb_strlen($voice_text) > 169) : ?>
                        <?php echo mb_substr($voice_text, 0, 169, 'UTF-8') . '...'; ?>
                      <?php else : ?> 
                        <?php echo $voice_text; ?>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </li>
            <?php endwhile; ?>
          </ul>
          <div class="voice__btn">
            <!-- ボタンの共通パーツ -->
            <a href="<?php echo esc_url( home_url( '/voice/' ) )?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <!-- Priceセクション -->
    <?php 
      $license = SCF::get_option_meta('price_options', 'license');
      $experience = SCF::get_option_meta('price_options', 'experience');
      $fun = SCF::get_option_meta('price_options', 'fun');
      $special = SCF::get_option_meta('price_options', 'special');
    ?>
    <?php if (!empty($license) || !empty($experience) || !empty($fun) || !empty($special) ) : ?>
      <section class="layout-price price">
        <div class="price__inner inner">
          <!-- セクションタイトルの共通パーツ -->
          <div class="price__title">
            <h2 class="section-header">
              <span class="section-header__title">Price</span>
              <span class="section-header__subtitle">料金一覧</span>
            </h2>
          </div>
          <div class="price__content">
            <!-- 料金リスト -->
            <ul class="price__list price-list">
              <!-- ループ -->
              <li class="price-list__type">
                <!-- タイトル -->
                <h3 class="price-list__title">入会金</h3>
                <!-- コース内容 -->
                <div class="price-list__items">
                  <!-- ループ -->
                  <?php
                    // $license = SCF::get_option_meta('price_options', 'license');
                    foreach ($license as $field):
                      $course1 = esc_html($field['license_course1']);
                      $course2 = esc_html($field['license_course2']);
                      $price = esc_html($field['license_price']);
                      echo '<dl class="price-list__item">' . '<dt class="price-list__text">' . $course1 . $course2 . '</dt>';
                      echo '<dd class="price-list__yen">' . $price . '</dd>' . '</dl>';
                      ?>                    
                  <?php endforeach; ?>
                  <!-- ループ終了 -->
                </div>
              </li>
              <li class="price-list__type">
                <!-- タイトル -->
                <h3 class="price-list__title">高校生～大人</h3>
                <!-- コース内容 -->
                <div class="price-list__items">
                  <!-- ループ -->
                  <?php
                    // $experience = SCF::get_option_meta('price_options', 'experience');
                    foreach ($experience as $field):
                      $course1 = esc_html($field['experience_course1']);
                      $course2 = esc_html($field['experience_course2']);
                      $price = esc_html($field['experience_price']);
                      echo '<dl class="price-list__item">' . '<dt class="price-list__text">' . $course1 . $course2 . '</dt>';
                      echo '<dd class="price-list__yen">' . $price . '</dd>' . '</dl>';
                      ?>                    
                  <?php endforeach; ?>
                  <!-- ループ終了 -->
                </div>
              </li>
              <li class="price-list__type">
                <!-- タイトル -->
                <h3 class="price-list__title">中学生</h3>
                <!-- コース内容 -->
                <div class="price-list__items">
                  <!-- ループ -->
                  <?php
                    // $fun = SCF::get_option_meta('price_options', 'fun');
                    foreach ($fun as $field):
                      $course1 = esc_html($field['fun_course1']);
                      $course2 = esc_html($field['fun_course2']);
                      $price = esc_html($field['fun_price']);
                      echo '<dl class="price-list__item">' . '<dt class="price-list__text">' . $course1 . $course2 . '</dt>';
                      echo '<dd class="price-list__yen">' . $price . '</dd>' . '</dl>';
                      ?>                    
                  <?php endforeach; ?>
                  <!-- ループ終了 -->
                </div>
              </li>
              <li class="price-list__type">
                <!-- タイトル -->
                <h3 class="price-list__title">幼児～小学生</h3>
                <!-- コース内容 -->
                <div class="price-list__items">
                  <!-- ループ -->
                  <?php
                    // $special = SCF::get_option_meta('price_options', 'special');
                    foreach ($special as $field):
                      $course1 = esc_html($field['special_course1']);
                      $course2 = esc_html($field['special_course2']);
                      $price = esc_html($field['special_price']);
                      echo '<dl class="price-list__item">' . '<dt class="price-list__text">' . $course1 . $course2 . '</dt>';
                      echo '<dd class="price-list__yen">' . $price . '</dd>' . '</dl>';
                      ?>                    
                  <?php endforeach; ?>
                  <!-- ループ終了 -->
                </div>
              </li>
              <!-- ループ終了 -->
            </ul>
            <!-- 画像 -->
            <picture class="price__img colorbox js-color">
              <source media="(min-width: 767px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price_pc.jpeg">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/top-price_sp.jpeg" alt="エレキギターsp版用画像">
            </picture>
          </div>
          <div class="price__btn">
            <!-- ボタンの共通パーツ -->
            <a href="<?php echo esc_url( home_url( '/price/' ) )?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        </div>
      </section>
      
      <!-- Accessセクション -->
      <section class="layout-access access">
        <div class="access__inner inner">
          <!-- セクションタイトルの共通パーツ -->
          <div class="price__title"> 
            <h2 class="section-header">
              <span class="section-header__title">Access</span>
              <span class="section-header__subtitle">アクセス</span>
            </h2>
          </div>
          <!-- Googleマップ -->
          <div class="access__wrapper">
            <!-- テキスト -->
            <div class="access__address company-profile">
              <dl class="company-profile__list">
                <dt class="company-profile__term">アクセス</dt>
                <dd class="company-profile__description">東武宇都宮駅/東武宇都宮線 徒歩17分</dd>
              </dl>
              <dl class="company-profile__list">
                <dt class="company-profile__term">開校時間</dt>
                <dd class="company-profile__description">9:00-21:00</dd>
              </dl>
              <dl class="company-profile__list">
                <dt class="company-profile__term">休校日</dt>
                <dd class="company-profile__description">毎週水曜日、年末年始</dd>
              </dl>
              <dl class="company-profile__list">
                <dt class="company-profile__term">電話</dt>
                <dd class="company-profile__description"><a href="tel:0120-000-0000">0120-000-0000</a></dd>
              </dl>
              <dl class="company-profile__list">
                <dt class="company-profile__term">住所</dt>
                <dd class="company-profile__description">栃木県宇都宮市河原町</dd>
              </dl>
            </div>
            <!-- マップ -->
            <div class="access__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1602.5841614942458!2d139.88310398884965!3d36.5500541930799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f6790924e9343%3A0xaf400a8827bab514!2z44CSMzIwLTA4MjIg5qCD5pyo55yM5a6H6YO95a6u5biC5rKz5Y6f55S6!5e0!3m2!1sja!2sjp!4v1713857348731!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
<?php get_footer(); ?>