<?php get_header(); ?>
<main>
  <!-- MVセクション -->
  <section class="mv mv--sub">
    <div class="mv__inner">
      <div class="mv__title-wrap mv__title-wrap--sub">
        <h2 class="mv__main-title mv__main-title--sub">Price</h2>
      </div>
      <div class="mv__swiper">
        <picture class="mv__swiper-img">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-mv.jpeg" alt="料金ページMV画像">
        </picture>
      </div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <!-- Price -->
  <div class="layout-sub-price sub-price fish">
    <div class="sub-price__inner inner">
      <?php 
        $license = SCF::get_option_meta('price_options', 'license');
        $experience = SCF::get_option_meta('price_options', 'experience');
        $fun = SCF::get_option_meta('price_options', 'fun');
        $special = SCF::get_option_meta('price_options', 'special');
      ?>
      <?php if (!empty($license)) : ?>
        <table id="sub-price1" data-id="#sub-price1" class="sub-price__list sub-price-list">
          <caption class="sub-price-list__head u-mobile">
            <div class="sub-price-list__wrapper">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
              <span>入会金</span>
            </div>       
          </caption>
          <tbody>
            <tr>
              <th rowspan="1000" class="sub-price-list__head u-desktop">
                <div class="sub-price-list__wrapper">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
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
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
              <span>高校生～大人</span>
            </div>       
          </caption>
          <tbody>
            <tr class="sub-price-list__head">
              <th rowspan="1000" class="sub-price-list__head u-desktop">
                <div class="sub-price-list__wrapper">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
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
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
              <span>中学生</span>
            </div>       
          </caption>
          <tbody>
            <tr class="sub-price-list__head">
              <th rowspan="1000" class="sub-price-list__head u-desktop">
                <div class="sub-price-list__wrapper">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
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
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
              <span>幼児～小学生</span>
            </div>       
          </caption>
          <tbody>
            <tr class="sub-price-list__head">
              <th rowspan="1000" class="sub-price-list__head u-desktop">
                <div class="sub-price-list__wrapper">
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
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
<?php get_footer(); ?>