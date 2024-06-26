<?php get_header(); ?>
<main>
  <?php if (is_singular('campaign')) : ?>
        <?php get_template_part( 'archive-campaign' ); ?>
      <?php elseif (is_singular('voice')): ?> 
        <?php get_template_part( '404' ); ?>
      <?php else : ?>
  <!-- MVセクション -->
  <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Blog</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv.jpeg" alt="ブログページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <!-- Blog詳細 -->
  <div class="layout-sub-blog sub-blog">
    <div class="sub-blog__inner inner">
        <div class="sub-blog__wrapper single-blog">
          <?php if ( have_posts() ) : 
            while ( have_posts() ) :
              the_post(); ?> 
              <div class="single-blog__meta">
                <time datetime="<?php the_time('c'); ?>" class="single-blog__date"><?php the_time('Y.m.d'); ?>
                </time>
                <p class="single-blog__title"><?php the_title(); ?></p>
              </div>
              <div class="single-blog__img">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="">
                <?php endif; ?>
              </div>
              <!-- ループ -->
              <div class="single-blog__content">
                <p><?php the_content(); ?></p>
                <!-- <div>
                  <img src="./assets/images/common/blog1.jpg" alt="イソギンチャクの画像">
                </div>
                <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
                <ul>
                  <li>リスト1</li>
                  <li>リスト2</li>
                  <li>リスト3</li>
                </ul>
                <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p> -->
              </div> 
          <?php endwhile; endif; ?>
          <!-- ページネーションボタン（共通パーツ） -->
          <div class="single-blog__pagenavi pagenavi">
            <div class="pagenavi__inner">
              <?php
                $prev = get_previous_post();
                if ( ! empty( $prev ) ) {
                  $prev_url = esc_url( get_permalink( $prev->ID ) );
                }
                
                $next = get_next_post();
                if ( ! empty( $next ) ) {
                  $next_url = esc_url( get_permalink( $next->ID ) );
                }
              ?>
              <!-- WP-PageNaviで出力される部分 ここから -->
              <div class='wp-pagenavi wp-pagenavi--single' role='navigation'>
                <?php if ( ! empty( $prev ) ) : ?>
                  <!-- <div class="pagenavi-class"> -->
                    <a class="previouspostslink previouspostslink--single" rel="prev" href="<?php echo $prev_url; ?>">&nbsp;&nbsp;&nbsp;&nbsp;前の記事</a>
                  <!-- </div> -->
                <?php endif; ?>
                  <!-- <div class="pagenavi-class"> -->
                    <a class="centarpostslink" href="<?php echo esc_url( home_url( '/blog/' ) )?>">一覧へ戻る</a>
                  <!-- </div> -->
                <?php if ( ! empty( $next ) ) : ?>
                  <!-- <div class="pagenavi-class"> -->
                    <a class="nextpostslink nextpostslink--single" rel="next" href="<?php echo $next_url; ?>">次の記事&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <!-- </div> -->
                <?php endif; ?>
              </div>
              <!-- WP-PageNaviで出力される部分 ここまで -->
            </div>
          </div>
        </div>
        <!-- サイドバー -->
        <div class="sub-blog__sidebar">
          <?php get_sidebar(); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php get_footer(); ?>