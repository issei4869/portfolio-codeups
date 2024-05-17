<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Voice</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice-mv.jpeg" alt="">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <!-- Voice -->
  <div class="layout-sub-voice sub-voice">
    <div class="sub-voice__inner inner">
      <!-- Tabの共通パーツ -->
      <?php if ( have_posts() ) : ?>
        <ul class="sub-voice__tab category-tab">
          <?php 
            $voice = esc_url( home_url( '/voice/' ) );
          ?>
          <li class="category-tab__item category-tab-item is-active"><a href="<?php echo $voice; ?>">ALL</a></li>
          <?php
            $terms = get_terms('voice_category');
            foreach ( $terms as $term ) {
              //var_dump(get_term_link($term));
              echo '<li class="category-tab__item category-tab-item"><a href="'.get_term_link($term).'">'.esc_html($term->name).'</a></li>';
            }
          ?>
        </ul>
        <ul class="sub-voice__list voice-list">
          <?php while ( have_posts() ) :
            the_post(); ?> 
            <li class="voice-list__item voice-card">
              <!-- 上のコンテンツ -->
              <div class="voice-card__contents">
                <!--左側のコンテンツ -->
                <div class="voice-card__content">
                  <!-- 年齢とカテゴリー -->
                  <?php 
                    $voice_group = get_field('voice_group');
                    $voice_text = get_field("voice_text");
                  ?>
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
                  <div class="voice-card__title"><?php echo $replace = str_replace('非公開: ', '', get_the_title()); ?></div>
                </div>
                <!-- 右側の画像 -->
                <div class="voice-card__img colorbox js-color">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="">
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
      <?php else : ?>
        <p class="no-post">投稿が見つかりませんでした</p>
      <?php endif; ?>
    </div>
    <!-- ページネーションボタン（共通パーツ） -->
    <div class="sub-voice__pagenavi pagenavi">
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