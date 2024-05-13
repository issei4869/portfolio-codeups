<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Course</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign-mv.jpeg" alt="コースページMV画像">
        </picture>
      </div>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  <!-- Campaignカード -->
  <div class="layout-sub-campaign sub-campaign">
    <div class="sub-campaign__inner inner">
      <!-- Tabの共通パーツ -->
      <?php if ( have_posts() ) : ?>
        <ul class="sub-campaign__tab category-tab">
          <?php 
            $campaign = esc_url( home_url( '/campaign/' ) );
          ?>
          <li class="category-tab__item category-tab-item is-active"><a href="<?php echo $campaign; ?>">ALL</a></li>
          <?php
            $terms = get_terms('campaign_category');
            foreach ( $terms as $term ) {
              //var_dump(get_term_link($term));
              echo '<li class="category-tab__item category-tab-item"><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></li>';
            }
          ?>
        </ul>
        <ul class="sub-campaign__items sub-campaign-items">
          <?php while ( have_posts() ) :
            the_post(); ?> 
            <li class="sub-campaign-items__item campaign-card">
              <div class="campaign-card__img">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
                <?php endif; ?>
              </div>
              <div class="campaign-card__content campaign-card__content--sub">
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
                <h3 class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></h3>
                <!-- サブタイトル -->
                <div class="campaign-card__wrapper campaign-card__wrapper--sub">
                  <!-- <div class="campaign-card__subtitle">
                    全部コミコミ(お一人様)
                  </div> -->
                  <?php 
                    $price_group = get_field('price_group');
                    $period_group = get_field('period_group');
                  ?>
                  <div class="campaign-card__price campaign-card__price--sub">
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
                <!-- 下層ページに追加 -->
                <div class="campaign-card__text">
                  <p>
                    <?php if(get_field('campaign_text')) : ?>
                      <?php echo nl2br(get_field('campaign_text')); ?>
                    <?php endif; ?>
                  </p>
                </div>
                <?php if($period_group) : ?>
                  <div class="campaign-card__date">
                    <?php echo $period_group['start_period']; ?>-
                    <?php echo $period_group['finish_period']; ?>
                  </div>
                <?php endif; ?>
                <div class="campaign-card__comment">
                  無料体験・無料体験申込はコチラ
                </div>
                <div class="campaign-card__btn">
                  <a href="<?php echo esc_url( home_url( '/contact/' ) )?>?inquiry[]=<?php the_title(); ?>" class="btn">
                    <span>Contact us</span>
                  </a>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p class="no-post">投稿が見つかりませんでした</p>
      <?php endif; ?>
    </div>
    <!-- ページネーションボタン（共通パーツ） -->
    <div class="sub-campaign__pagenavi pagenavi">
      <div class="pagenavi__inner">
        <!-- WP-PageNaviで出力される部分 ここから -->
        <div class="pagenavi__wp">
          <?php wp_pagenavi(); ?>
        </div>
        <!-- WP-PageNaviで出力される部分 ここまで -->
      </div>
    </div>
  </div>
  <!-- Price -->
  <div class="layout-sub-price sub-price">
    <div class="sub-price__inner inner">
      <!-- セクションタイトルの共通パーツ -->
      <div id="sub-price0" data-id="#sub-price0" class="aboutus__title">
          <h2 class="section-header">
            <span class="section-header__title">Price</span>
            <span class="section-header__subtitle">料金</span>
          </h2>
        </div>
      <?php 
        $license = SCF::get_option_meta('price_options', 'license');
        $experience = SCF::get_option_meta('price_options', 'experience');
        $fun = SCF::get_option_meta('price_options', 'fun');
        $special = SCF::get_option_meta('price_options', 'special');
      ?>
      <div class="sub-price__wrapper">
        <?php if (!empty($license)) : ?>
          <table id="sub-price1" data-id="#sub-price1" class="sub-price__list sub-price-list">
            <caption class="sub-price-list__head u-mobile">
              <div class="sub-price-list__wrapper sub-price-list__wrapper--vocal">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/vocal-icon_white.png" alt="エレキギターアイコン">
                <span>入会金</span>
              </div>
            </caption>
            <tbody>
              <tr>
                <th rowspan="1000" class="sub-price-list__head u-desktop">
                  <div class="sub-price-list__wrapper sub-price-list__wrapper--vocal">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/vocal-icon_white.png" alt="エレキギターアイコン">
                    <span>入会金</span>
                  </div>
                </th>
              </tr>
              <?php
                // $license = SCF::get_option_meta('price_options', 'license');
                foreach ($license as $field):
                  $course1 = esc_html($field['license_course1']);
                  $course2 = esc_html($field['license_course2']);
                  $price = esc_html($field['license_price']);
                  echo '<tr>' . '<td class="sub-price-list__text">' . $course1 . '<br class="u-mobile">' . $course2 . '</td>';
                  echo '<td class="sub-price-list__yen">' . $price . '</td>' . '</tr>';
                  ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
        <?php if (!empty($experience)) : ?>
          <table id="sub-price2" data-id="#sub-price2" class="sub-price__list sub-price-list">
            <caption class="sub-price-list__head u-mobile">
              <div class="sub-price-list__wrapper">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/guitar-icon_white.png" alt="エレキギターアイコン">
                <span>高校生～大人</span>
              </div>
            </caption>
            <tbody>
              <tr class="sub-price-list__head">
                <th rowspan="1000" class="sub-price-list__head u-desktop">
                  <div class="sub-price-list__wrapper">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/guitar-icon_white.png" alt="エレキギターアイコン">
                    <span>高校生～大人</span>
                  </div>
                </th>
              </tr>
              <?php
                // $experience = SCF::get_option_meta('price_options', 'experience');
                foreach ($experience as $field):
                  $course1 = esc_html($field['experience_course1']);
                  $course2 = esc_html($field['experience_course2']);
                  $price = esc_html($field['experience_price']);
                  echo '<tr>' . '<td class="sub-price-list__text">' . $course1 . '<br class="u-mobile">' . $course2 . '</td>';
                  echo '<td class="sub-price-list__yen">' . $price . '</td>' . '</tr>';
                  ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
        <?php if (!empty($fun)) : ?>
          <table id="sub-price3" data-id="#sub-price3" class="sub-price__list sub-price-list">
            <caption class="sub-price-list__head u-mobile">
              <div class="sub-price-list__wrapper">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/drum-icon_white.png" alt="エレキギターアイコン">
                <span>中学生</span>
              </div>
            </caption>
            <tbody>
              <tr class="sub-price-list__head">
                <th rowspan="1000" class="sub-price-list__head u-desktop">
                  <div class="sub-price-list__wrapper">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/drum-icon_white.png" alt="エレキギターアイコン">
                    <span>中学生</span>
                  </div>
                </th>
              </tr>
              <?php
                // $fun = SCF::get_option_meta('price_options', 'fun');
                foreach ($fun as $field):
                  $course1 = esc_html($field['fun_course1']);
                  $course2 = esc_html($field['fun_course2']);
                  $price = esc_html($field['fun_price']);
                  echo '<tr>' . '<td class="sub-price-list__text">' . $course1 . '<br class="u-mobile">' . $course2 . '</td>';
                  echo '<td class="sub-price-list__yen">' . $price . '</td>' . '</tr>';
                  ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
        <?php if (!empty($special)) : ?>
          <table id="sub-price4" data-id="#sub-price4" class="sub-price__list sub-price-list">
            <caption class="sub-price-list__head u-mobile">
              <div class="sub-price-list__wrapper">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/piano-icon_white.png" alt="エレキギターアイコン">
                <span>幼児～小学生</span>
              </div>
            </caption>
            <tbody>
              <tr class="sub-price-list__head">
                <th rowspan="1000" class="sub-price-list__head u-desktop">
                  <div class="sub-price-list__wrapper">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/piano-icon_white.png" alt="エレキギターアイコン">
                    <span>幼児～小学生</span>
                  </div>
                </th>
              </tr>
              <?php
                // $special = SCF::get_option_meta('price_options', 'special');
                foreach ($special as $field):
                  $course1 = esc_html($field['special_course1']);
                  $course2 = esc_html($field['special_course2']);
                  $price = esc_html($field['special_price']);
                  echo '<tr>' . '<td class="sub-price-list__text">' . $course1 . '<br class="u-mobile">' . $course2 . '</td>';
                  echo '<td class="sub-price-list__yen">' . $price . '</td>' . '</tr>';
                  ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>