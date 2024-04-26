<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
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
  <div class="layout-sub-blog sub-blog music">
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
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/noimage.png" alt="NOIMAGE表示">
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
            <div class='wp-pagenavi' role='navigation'>
              <?php if ( ! empty( $prev ) ) : ?>
                <a class="previouspostslink" rel="prev" href="<?php echo $prev_url; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <?php endif; ?>
              <?php if ( ! empty( $next ) ) : ?>
                <a class="nextpostslink" rel="next" href="<?php echo $next_url; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
    </div>
  </div>
<?php get_footer(); ?>