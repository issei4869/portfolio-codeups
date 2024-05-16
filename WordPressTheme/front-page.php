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
              <span class="section-header__title">Course & Price</span>
              <span class="section-header__subtitle">コースと料金</span>
            </h2>
          </div>
          <div class="campaign__swiper campaign-swiper">
            <div class="campaign-swiper__js swiper js-campaign-swiper">
              <ul class="campaign-swiper__wrapper swiper-wrapper">
                
                <?php while($recent_query->have_posts()) : ?>
                  <?php $recent_query->the_post(); ?>
                    <li class="campaign-swiper__slide swiper-slide">
                      <div class="campaign-card">                        
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
                      </div>
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
        <ul class="information__items">
          <li class="information__item information-item">
            <div class="information-item__img colorbox js-color">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information2.jpeg" alt="音楽スタジオの画像">
            </div>
            <div class="information-item__wrap">
              <h3 class="information-item__title">防音室無料</h3>
                <p class="information-item__text">
                  レッスン以外の練習の場として防音室を2室開放しております。
                  <br>空室＆一人一日2時間という条件がありますが、練習の場として是非ご利用ください！
                  <br>また、レコーディングも無料のため、音源制作やYouTube発信が可能です。
                </p>
            </div>
          </li>
          <li class="information__item information-item information-item--second">
            <div class="information-item__img colorbox js-color">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information1.jpeg" alt="楽器の画像">
            </div>
            <div class="information-item__wrap information-item__wrap--second">
              <h3 class="information-item__title">楽器貸出無料</h3>
                <p class="information-item__text">
                  レッスン中や防音室での練習時に使用する楽器を無料で貸出しております。
                  <br>楽器ないからレッスン受けれない...といったご心配はいりません！
                </p>
            </div>
          </li>
          <li class="information__item information-item">
            <div class="information-item__img colorbox js-color">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information3.jpeg" alt="ライブハウスの画像">
            </div>
            <div class="information-item__wrap">
              <h3 class="information-item__title">年2回の発表会</h3>
                <p class="information-item__text">
                  毎年3月と9月にスクール内で発表会を開催しております。
                  <br>一般のお客様もご来場いただいており大盛況です。
                  <br>発表会後、講師陣によるフィードバックがあり、更なる課題と成長に繋がります。
                  <br>日頃の練習の成果を発揮する場として、思う存分音楽を楽しみましょう！
                </p>
            </div>
          </li>
        </ul>
      </div>
    </section>                  

    <?php $blog_query = new WP_Query(
      array(
        'post_type' => 'voice',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <?php $voice_query = new WP_Query(
      array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>

    <!-- Price & Blog -->
    <div class="layout-wrapper wrapper">
      <div class="wrapper__inner inner">
        <!-- Voice -->
        <div class="wrapper__voice">
          <?php if ($blog_query->have_posts()) : ?>
            <!-- セクションタイトルの共通パーツ -->
            <div class="wrapper__title">
              <h2 class="section-header">
                <span class="section-header__title">Voice</span>
                <span class="section-header__subtitle">生徒様の声</span>
              </h2>
            </div>
            <ul class="wrapper__list voice-list">
              <?php while($blog_query->have_posts()) : ?>
                <?php $blog_query->the_post(); ?>
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
            <div class="wrapper__btn">
              <!-- ボタンの共通パーツ -->
              <a href="<?php echo esc_url( home_url( '/voice/' ) )?>" class="btn">
                <span>View more</span>
              </a>
            </div>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <!-- Blog -->
        <div class="wrapper__blog">
          <!-- セクションタイトルの共通パーツ -->
          <div class="wrapper__title">
            <h2 class="section-header">
              <span class="section-header__title">Blog</span>
              <span class="section-header__subtitle">ブログ</span>
            </h2>
          </div>
          <?php if ($voice_query->have_posts()) : ?>
            <!-- 人気記事カード -->
            <ul class="wrapper__cards blog-sidebar-cards">
              <?php while($voice_query->have_posts()) : ?>
                <?php $voice_query->the_post(); ?>
                  <li class="blog-sidebar-cards__card blog-sidebar-card">
                    <div class="blog-sidebar-card__popularity">
                      <a class="blog-sidebar-card__link" href="<?php the_permalink(); ?>">
                        <div class="blog-sidebar-card__wrap">
                          <div class="blog-sidebar-card__img colorbox colorbox--blog js-color">
                            <?php if (has_post_thumbnail()) : ?>
                              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                            <?php else: ?>
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
                            <?php endif; ?>
                          </div>
                          <div class="blog-sidebar-card__content">
                            <time datetime="<?php the_time("c"); ?>" class="blog-sidebar-card__date"><?php the_time("Y.m.d"); ?>
                            </time>
                            <p class="blog-sidebar-card__title blog-sidebar-card__title--sub"><?php the_title(); ?></p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); wp_reset_query(); ?>
            </ul>
          <?php else : ?>
            <p class="no-post">投稿が見つかりませんでした</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
     
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
<?php get_footer(); ?>