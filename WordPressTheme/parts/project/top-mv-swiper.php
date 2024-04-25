<section class="mv">
  <div class="mv__inner">
    <div class="mv__title-wrap">
        <h2 class="mv__main-title">DIVING</h2>
        <p class="mv__sub-title">into the ocean</p>
    </div>
    <?php
    $args = array(
      'post_type' => 'mv_slider',// カスタム投稿タイプを設定
      'posts_per_page' => -1,// 取得する投稿数を設定（−1は無制限）
      'order' => 'ASC',//並び順を指定
      'orderby' => 'date',  // 並び変える項目を設定
    );
    get_template_part('parts/common/p-swiper' ,null , $args);
    ?>
  </div>
</section>