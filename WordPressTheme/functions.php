<?php 
// function enqueue_styles_scripts() {
  // Google Fonts
  // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@300;400;700&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@300;400;700&display=swap', array(), null );

  // Swiper CSS
  // wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.0.0' );

  // Theme CSS
  // wp_enqueue_style( 'theme-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0.0' );

  // jQuery
  // wp_enqueue_script( 'jquery' );
  // wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array('jquery'), '3.6.4', true );

  // Swiper JS
  // wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), '8.0.0', true );

  // jQuery inview
  // wp_enqueue_script( 'jquery-inview', get_template_directory_uri().'/assets/js/jquery.inview.min.js', array('jquery'), '1.0.0', true );

  // Theme JS
  // wp_enqueue_script( 'theme-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'enqueue_styles_scripts' );

// functions初期設定
get_template_part('parts/functions-lib/func-enqueue-assets');

// （MV用）カスタムフィールドの設定
get_template_part('parts/functions-lib/func-add-posttype-mv');


/* ----------WordPressの管理画面にアイキャッチ画像の設定追加---------- */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );


/* ---------- 「投稿」の表記変更 ---------- */
function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新規'.$name.'投稿';
}
function Change_objectlabel() {
  global $wp_post_types;
  $name = 'ブログ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

/* ---------- 「カスタム投稿」の表記変更 ---------- */
function change_posts_per_page( $query ) {
  if ( is_admin() || !$query->is_main_query() ) 
    return;
  // if ( $query->is_archive(arry('campaign', 'voice')) ) { //カスタム投稿タイプを指定
  //     $query->set( 'posts_per_page', 4 ); // 表示件数を4件に設定
  // }
  if ( $query->is_post_type_archive('campaign'))  { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', 4 ); // 表示件数を4件に設定
  }
  if ( $query->is_tax('campaign'))  { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', 4 ); // 表示件数を4件に設定
  }
  if ( $query->is_post_type_archive('voice'))  { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', 6 ); // 表示件数を6件に設定
  }
  
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

/* ---------- 「カスタムタクソノミー」の表記変更 ---------- */
function my_pre_get_taxonomy_archive( $query ) {
  if ( is_admin() || !$query->is_main_query() ) 
    return;
  // if ( $query->is_archive(arry('campaign', 'voice')) ) { //カスタム投稿タイプを指定
  //     $query->set( 'posts_per_page', 4 ); // 表示件数を4件に設定
  // }
  if ( $query->is_tax('campaign_category'))  { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', 4 ); // 表示件数を4件に設定
  }
  if ( $query->is_tax('voice_category'))  { //カスタム投稿タイプを指定
    $query->set( 'posts_per_page', 6 ); // 表示件数を6件に設定
  }
  
}
add_action( 'pre_get_posts', 'my_pre_get_taxonomy_archive' );


SCF::add_options_page('', '私たちについて', 'edit_posts', 'aboutus_options', NULL, '5');
SCF::add_options_page('', '料金一覧について', 'edit_posts', 'price_options', NULL, '5');
SCF::add_options_page('', 'よくある質問', 'edit_posts', 'faq_options', NULL, '5');


/* ----------サイドバー---------- */
function my_widget_init() {
  register_sidebar(
    array(
      'name' => 'サイドバー',
      'id' => 'sidebar',
      'before_widget' => '<div id ="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="blog-sidebar__title sidebar-header">
      <span class="sidebar-header__icon">
      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information-tab-img1.svg" alt="クジラのアイコン">
      <div class="sidebar-header__title">',
      'after_title' => '</div>
      </div>',
    )
  );
}
add_action('widgets_init', 'my_widget_init');


// the_archive_title(), get_the_archive_title() から余計な文字を削除
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_tax()) {
      $title = single_term_title('', false);
  } elseif (is_post_type_archive() ){
    $title = post_type_archive_title('', false);
  } elseif (is_date()) {
      if (is_year()) {
        $title = get_the_time('Y年の記事');
      } elseif (is_month()) {
        $title = get_the_time('Y年n月の記事');
      }
  } elseif (is_search()) {
      $title = '検索結果：'.esc_html( get_search_query(false) );
  } elseif (is_404()) {
      $title = '「404」ページが見つかりません';
  }
  return $title;
});

/* 人気記事一覧
---------------------------------------------------------- */
//記事閲覧数を取得する
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count.' Views';
}
//記事閲覧数を保存する
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
//headに出力されるタグを削除(閲覧数を重複してカウントするのを防止するため)
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

//Contactフォーム　エラーメッセージ設定
//名前
function my_wpcf7_validation_error_message_name($result, $tag) {
  if ('name1' == $tag->name) {
      if (empty($_POST[$tag->name])) {
          $result->invalidate($tag, '※正しいお名前をご入力ください。');
      }
  }
  return $result;
}
add_filter('wpcf7_validate_text', 'my_wpcf7_validation_error_message_name', 10, 2);

//メールアドレス
function my_wpcf7_validation_error_message_kana($result, $tag) {
  if ('email-963' == $tag->name) {
      if (empty($_POST[$tag->name])) {
          $result->invalidate($tag, '※正しいメールアドレスをご入力ください。');
      }
  }
  return $result;
}
add_filter('wpcf7_validate_email', 'my_wpcf7_validation_error_message_kana', 10, 2);

//電話番号
function my_wpcf7_validation_error_message_tel($result, $tag) {
  if ('tel' == $tag->name) {
      if (empty($_POST[$tag->name])) {
          $result->invalidate($tag, '※正しい電話番号をご入力ください。');
      }
  }
  return $result;
}
add_filter('wpcf7_validate_tel', 'my_wpcf7_validation_error_message_tel', 10, 2);

//チェックボックス
function my_wpcf7_validation_error_message_type1($result, $tag) {
   if ('checkbox-568' == $tag->name) {
    if (empty($_POST[$tag->name])) {
        $result->invalidate($tag, '※チェックを入れてください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_checkbox', 'my_wpcf7_validation_error_message_type1', 10, 2);

//チェックボックス
function my_wpcf7_validation_error_message_type2($result, $tag) {
  if ('checkbox-489' == $tag->name) {
   if (empty($_POST[$tag->name])) {
       $result->invalidate($tag, '※チェックを入れてください。');
   }
 }
 return $result;
}
add_filter('wpcf7_validate_checkbox', 'my_wpcf7_validation_error_message_type2', 10, 2);