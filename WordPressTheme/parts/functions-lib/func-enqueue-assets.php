<?php

/**
 * func-enqueue-assets
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
  global $slider_library;
  $slider_library = 'swiper'; //splide,swiper,slickから選択する

  // フォントの設定
//wp_enqueue_style('NotoSansJP', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap', array(), null);
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@300;400;700&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@300;400;700&display=swap', array(), null );

  // WordPressがデフォルトで提供するjQueryは使用しない
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', array(), '3.6.1');
  //wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array('jquery'), '3.6.4', true );

  // スライダーライブラリに基づいて適切なスクリプトとスタイルシートを読み込みます
  if ($slider_library === 'swiper') {
    // JavaScript
    wp_enqueue_script('slider-script', '//unpkg.com/swiper@8/swiper-bundle.min.js', array(), '', true);
    //wp_enqueue_script( 'slider-script', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), '8.0.0', true );
    // CSS
    wp_enqueue_style('slider-style', '//unpkg.com/swiper@8/swiper-bundle.min.css', array(), '', 'all');
    //wp_enqueue_style( 'slider-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.0.0' );
  } elseif ($slider_library === 'slick') {
    // JavaScript
    wp_enqueue_script('slider-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    // CSS
    wp_enqueue_style('slider-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slider-theme-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1', 'all');
  } elseif ($slider_library === 'splide') {
    // JavaScript
    wp_enqueue_script('slider-script', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js', array(), '4.0.7', true);
    // CSS
    wp_enqueue_style('slider-style', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css', array(), '4.0.7', 'all');
  }

  // jQuery inview
  wp_enqueue_script( 'jquery-inview', get_template_directory_uri().'/assets/js/jquery.inview.min.js', array('jquery'), '1.0.0', true );
  // 基本JavaScript
  // wp_enqueue_script('my-script', get_template_directory_uri() . '/assets/js/script.js', array('slider-script'), filemtime(get_theme_file_path('assets/js/script.js')), true);
  wp_enqueue_script('my-script', get_template_directory_uri() . '/assets/js/script.js', array('slider-script'), filemtime(get_theme_file_path('assets/js/script.js')), true);
  // 基本CSS
  // wp_enqueue_style('my-style', get_template_directory_uri() . '/assets/css/style.css', array('slider-style'), filemtime(get_theme_file_path('assets/css/style.css')), 'all');
  wp_enqueue_style('my-style', get_template_directory_uri() . '/assets/css/style.css', array('slider-style'), filemtime(get_theme_file_path('assets/css/style.css')), 'all');


  // スライダーを使用する場合、必要
  $slider_settings = array(
    'library' => $slider_library,
  );
  // JavaScriptで$slider_settingsを使用するための処理
  wp_add_inline_script('my-script', 'var sliderSettings = ' . json_encode($slider_settings) . ';', 'before');

}
add_action('wp_enqueue_scripts', 'my_script_init');
