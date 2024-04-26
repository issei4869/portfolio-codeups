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
  <div class="layout-sub-campaign sub-campaign music">
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
                <div class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></div>
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
                  お問合せ・無料体験申込はコチラ
                </div>
                <div class="campaign-card__btn">
                  <a href="<?php echo esc_url( home_url( '/contact/' ) )?>" class="btn">
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
  <?php get_footer(); ?>