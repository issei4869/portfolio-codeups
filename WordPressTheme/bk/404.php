<?php get_header(); ?>
<main>
<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<section class="error">
  <div class="error__inner">
    <div class="error__content">
      <h2 class="error__title">404</h2>
      <div class="error__text">申し訳ありません。
        <br>お探しのページが見つかりません。
      </div>
      <div class="error__btn">
        <!-- ボタンの共通パーツ -->
        <a href="<?php echo esc_url( home_url( '/' ) )?>" class="btn btn--404">
          <span>Page TOP</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>