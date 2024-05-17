<!-- サイドバー -->
<aside class="blog-sidebar">
  <div class="blog-sidebar__inner inner">
    <ul class="blog-sidebar__list">   

      <!-- 人気記事 -->
      <li class="blog-sidebar__item blog-sidebar-item">
        <!-- サイドバータイトル -->
        <div class="blog-sidebar__title sidebar-header">人気記事</div>
        <?php if ( have_posts() ) : ?>
          <!-- 人気記事カード -->
          <ul class="blog-sidebar-item__list blog-sidebar-cards">
            <?php
              setPostViews(get_the_ID());
              query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=3&order=DESC');
              while(have_posts()) : the_post();
            ?>
            <li class="blog-sidebar-cards__card blog-sidebar-card">
              <div class="blog-sidebar-card__popularity">
                <a class="blog-sidebar-card__link" href="<?php the_permalink(); ?>">
                  <div class="blog-sidebar-card__wrap">
                    <div class="blog-sidebar-card__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="">
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
      </li>
      
      <!-- 口コミ -->
      <li class="blog-sidebar__review blog-sidebar-review">
        <!-- サイドバータイトル -->
        <div class="blog-sidebar__title sidebar-header">口コミ</div>
        <!-- 口コミカード -->
        <?php $recent_query = new WP_Query(
          array(
            'post_type' => 'voice',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
            )
            );
        ?>           
        <?php if ($recent_query->have_posts()) : ?>
          <?php while($recent_query->have_posts()) : ?>
            <?php $recent_query->the_post(); ?>
              <div class="blog-sidebar-review__contents">
                <div class="blog-sidebar-review__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="">
                  <?php endif; ?>
                </div>
                <div class="blog-sidebar-review__content">
                  <!-- 年齢とカテゴリー -->
                  <?php 
                    $voice_group = get_field('voice_group');
                  ?>
                  <div class="blog-sidebar-review__meta">
                    <?php if($voice_group) : ?>
                      <div class="voice-card__age">
                        <?php echo $voice_group['voice_age']; ?><?php echo $voice_group['voice_gender']; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <!-- タイトル -->
                  <div class="blog-sidebar-review__title"><?php the_title(); ?></div>
                </div>
              </div>
          <?php endwhile; ?>
          <div class="blog-sidebar-review__btn">
            <!-- ボタンの共通パーツ -->
            <a href="<?php echo esc_url( home_url( '/voice/' ) )?>" class="btn">
              <span>View more</span>
            </a>
          </div>
        <?php else : ?>
          <p class="no-post">投稿が見つかりませんでした</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </li>
      
      <!-- キャンペーン -->
      <li class="blog-sidebar__campaign blog-sidebar-campaign">
        <!-- サイドバータイトル -->
        <div class="blog-sidebar__title sidebar-header">キャンペーン</div>
        <!-- キャンペーンカード -->
        <ul class="blog-sidebar-campaign__items blog-sidebar-items">
          <?php $recent_query = new WP_Query(
            array(
              'post_type' => 'campaign',
              'posts_per_page' => 2,
              'orderby' => 'date',
              'order' => 'DESC',
            )
          );
          ?>
          <?php if ($recent_query->have_posts()) : ?>
            <?php while($recent_query->have_posts()) : ?>
              <?php $recent_query->the_post(); ?>
                <li class="blog-sidebar-items__item campaign-card">
                  <div class="campaign-card__img campaign-card__img--sidebar">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="">
                    <?php endif; ?>
                  </div>
                  <div class="campaign-card__content campaign-card__content--sidebar">
                    <!-- タイトル -->
                    <div class="campaign-card__title campaign-card__title--sidebar"><?php the_title(); ?></div>
                    <!-- サブタイトル -->
                    <div class="campaign-card__wrapper campaign-card__wrapper--sidebar">
                      <div class="campaign-card__subtitle campaign-card__subtitle--sidebar">
                        全部コミコミ(お一人様)
                      </div>
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
                </li>
            <?php endwhile; ?>
            <li class="blog-sidebar-items__btn">
              <!-- ボタンの共通パーツ -->
              <a href="<?php echo esc_url( home_url( '/campaign/' ) )?>" class="btn">
                <span>View more</span>
              </a>
            </li>
          <?php else : ?>
            <p class="no-post">投稿が見つかりませんでした</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      </li>
      
      <!-- トグルリスト -->
      <li class="blog-sidebar__archive blog-sidebar-archive">
        <!-- サイドバータイトル -->
        <div class="blog-sidebar__title sidebar-header">アーカイブ</div>
        <!-- トグルリスト -->
        <div class="blog-sidebar__toggle toggle">
          <div class="toggle__inner">  
            <?php
              $year_prev = null;
              $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
              YEAR( post_date ) AS year,
              COUNT( id ) as post_count FROM $wpdb->posts
              WHERE post_status = 'publish' and post_date <= now( )
              and post_type = 'post'
              GROUP BY month , year
              ORDER BY post_date DESC");
              $first = true; // 最初の要素かどうかを示すフラグ

              foreach($months as $month):
              $year_current = $month->year;
              if ($year_current != $year_prev):
              if ($year_prev != null):
            ?>
          </div>
          <?php endif; ?>
          <ul class="toggle__list toggle-list">
            <li class="toggle-list__item">
              <p class="toggle-list__item-question js-toggle-question <?= $first ? 'open' : '' ?>"><?= $month->year ?></p>
                <ul class="month-archive-list">
                <?php $first = false; // 最初の要素が表示されたのでフラグを false に設定
                          endif;?>
                  <li class="toggle-list__item-top">
                    <a href="<?= bloginfo('url') ?>/<?= $month->year ?>/<?= date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>" class="toggle-list__item-answer"><?= date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月</a>
                  </li>
                  <?php $year_prev = $year_current; endforeach;?>
                </ul>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</aside>