<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub dark">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">FAQ</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/faq-mv.jpeg" alt="">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  
  <!-- アコーディオン実装 -->
  <div class="layout-faq faq">
    <div class="faq__inner inner">
      <?php 
        $faq = SCF::get_option_meta('faq_options', 'faq');
      ?>
      <?php if (!empty($faq)) : ?>
        <ul class="faq__list faq-list">
          <?php
            // $faq = SCF::get_option_meta('faq_options', 'faq');
            foreach ($faq as $field):
              $question = esc_html($field['question']);
              $answer = esc_html($field['answer']);
              echo '<li class="faq-list__item">' . '<p class="faq-list__item-question js-faq-question">' . $question  . '</p>';
              echo '<p class="faq-list__item-answer">' . $answer . '</p>' . '</li>';
              ?>                    
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
<?php get_footer(); ?>