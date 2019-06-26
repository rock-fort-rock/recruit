<?php
/*-------------------------------------------------------------
wp_head()関連
---------------------------------------------------------------*/
//サイト上のadminバーを非表示
//「ユーザー」->「あなたのプロフィール」->「サイトを見るときにツールバーを表示する」を全ユーザ強制非表示　余計なcssを吐き出さなくなる
add_filter( 'show_admin_bar', '__return_false' );

//title出力
add_theme_support( 'title-tag' );

//タイトルからディスクリプション削除
function wp_document_title_parts ( $title ) {
  if ( is_home() ) {
    unset( $title['tagline'] );
  }
  return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );


function wp_document_title_separator( $separator ) {
  $separator = '|';
  return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );


//wp_headから不要なものを削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

//全DNSプリフェッチ削除
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
// add_filter( 'emoji_svg_url', '__return_false' );//絵文字だけの

function my_scripts() {
  wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '1.0');
  wp_enqueue_style( 'localstyle', get_bloginfo('stylesheet_url'), array(), '1.0');
  wp_enqueue_script('script', home_url().'/assets/js/bundle.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


//フッターでCSSを読み込む場合
// function prefix_add_footer_styles() {
//     wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700,900|Noto+Serif+JP:400,500,600,700&amp;subset=japanese', array(), null);
// };
// add_action( 'get_footer', 'prefix_add_footer_styles' );



// 管理者以外wordpress updateを非表示
if (!current_user_can('administrator')) {
	add_filter('pre_site_transient_update_core', create_function('$a', 'return null;'));
}

// 管理者以外不必要なメニューを非表示
function remove_menus(){
	global $menu;
  // var_dump($menu);
  // unset($menu[26]); // MW WP Form
	// $restricted = array(__('コメント'),__('ツール'),__('固定ページ'),__('設定'), __('プロフィール'));
  if (!current_user_can('administrator')){
    $restricted = array(__('固定ページ'),__('コメント'),__('ツール'), __('設定'),  __('プロフィール'));
    remove_menu_page('edit.php?post_type=mw-wp-form');// MW WP Form
  }else{
    // $restricted = array();
    $restricted = array(__('コメント'));
  }
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if (in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			unset($menu[key($menu)]);
		}
	}
}
add_action('admin_menu', 'remove_menus');


// 管理者以外不必要なダッシュボードの内容を非表示
remove_all_actions('wp_dashboard_setup');
if (!current_user_can('administrator')){
	function example_remove_dashboard_widgets() {
		global $wp_meta_boxes;
		//Main column
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

		//Side Column
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}
	add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );
}


//タイトルに注釈
// function title_caption($post){
//   if($post->post_type == "produce" || $post->post_type == "case"){
//     echo '<p>※30文字まで。それ以上は入力しても表示されません。</p>';
//   }
// }
// add_action('edit_form_after_title', 'title_caption');



add_action( 'after_setup_theme', 'imagesizeSet' );
function imagesizeSet() {
	update_option( 'thumbnail_size_w', 120 );
	update_option( 'thumbnail_size_h', 0 );

	update_option( 'medium_size_w', 400 );
	update_option( 'medium_size_h', 0 );

  update_option( 'medium_large_size_w', 800 );
  update_option( 'medium_large_size_h', 0 );

	update_option( 'large_size_w', 1600 );
	update_option( 'large_size_h', 0 );
}


//アイキャッチ有効化
add_theme_support('post-thumbnails');

function custom_admin_post_thumbnail_html( $content ) {
  $content .= '<p>1200px × 730px</p>';
  return $content;
}
add_filter('admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html');


/**
custom post type
企業コラム
**/
add_action('init', 'cpt_column_init');
function cpt_column_init()
{
  $labels = array(
    'name' => _x('企業コラム', 'post type general name'),
    'singular_name' => _x('企業コラム', 'post type singular name'),
    'add_new' => _x('新規追加', 'column'),
    'add_new_item' => __('企業コラムを追加'),
    'edit_item' => __('企業コラムを編集'),
    'new_item' => __('新しい企業コラム'),
    'view_item' => __('企業コラムを見る'),
    'search_items' => __('企業コラムを探す'),
    'not_found' =>  __('企業コラムはありません'),
    'not_found_in_trash' => __('ゴミ箱に企業コラムはありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'column', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('column', $args);

  $args = array(
    'labels' => array(
      'name' => 'コラムカテゴリ',
      'singular_name' => 'コラムカテゴリ',
      'search_items' => 'コラムカテゴリを検索',
      'popular_items' => 'よく使われているコラムカテゴリ',
      'all_items' => 'すべてのコラムカテゴリ',
      'parent_item' => '親コラムカテゴリ',
      'edit_item' => 'コラムカテゴリの編集',
      'update_item' => '更新',
      'add_new_item' => 'コラムカテゴリを追加',
      'new_item_name' => '新しいコラムカテゴリ'
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'columncat', 'with_front' => false)
  );
  register_taxonomy('columncat', 'column', $args);
}

/**
custom post type
用語集
**/
add_action('init', 'cpt_glossary_init');
function cpt_glossary_init()
{
  $labels = array(
    'name' => _x('用語集', 'post type general name'),
    'singular_name' => _x('用語集', 'post type singular name'),
    'add_new' => _x('新規追加', 'glossary'),
    'add_new_item' => __('用語集を追加'),
    'edit_item' => __('用語集を編集'),
    'new_item' => __('新しい用語集'),
    'view_item' => __('用語集を見る'),
    'search_items' => __('用語集を探す'),
    'not_found' =>  __('用語集はありません'),
    'not_found_in_trash' => __('ゴミ箱に用語集はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'glossary', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('glossary', $args);

  $args = array(
    'labels' => array(
      'name' => '用語集カテゴリ',
      'singular_name' => '用語集カテゴリ',
      'search_items' => '用語集カテゴリを検索',
      'popular_items' => 'よく使われている用語集カテゴリ',
      'all_items' => 'すべての用語集カテゴリ',
      'parent_item' => '親用語集カテゴリ',
      'edit_item' => '用語集カテゴリの編集',
      'update_item' => '更新',
      'add_new_item' => '用語集カテゴリを追加',
      'new_item_name' => '新しい用語集カテゴリ'
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'glossarycat', 'with_front' => false)
  );
  register_taxonomy('glossarycat', 'glossary', $args);
}

/*
■オプション
・公式サイトURL
・応募URL
・ヘッダコピー
・twitterタイムライン
・企業データ
・企業情報
・SNS（フォロー用）
*/

// 表示件数set
add_filter('pre_get_posts', 'custom_posts_query');
function custom_posts_query() {
  global $wp_query;
  if(!is_admin()){
    if(is_post_type_archive('news') || is_tax('newscat')){
      $wp_query -> query_vars['posts_per_page'] = 16;
    }elseif(is_post_type_archive('produce')){
      $wp_query -> query_vars['posts_per_page'] = 8;
    }elseif(is_post_type_archive('case') || is_tax('casecat')){
        $wp_query -> query_vars['posts_per_page'] = 9;
    }else{
      $wp_query -> query_vars['posts_per_page'] = -1;
    }
  }
}


//同一カテゴリ一覧へ戻るため
function setSession($wpq) {
    session_start();
    if (is_tax('newscat') || is_tax('casecat')) {
      // echo 'ニュース or 事例カテゴリ一覧:';
      $term = $wpq->queried_object;
      // $tax = $term->taxonomy;
      $array = ['slug'=>$term->slug, 'name'=>$term->name];
      $_SESSION['category'] = $array;
      // echo $_SESSION['category'];
    } elseif (!is_singular('news') && !is_singular('case')) {
        // echo 'ニュース or 事例詳細以外';
        session_destroy();
    }
}



//固定ページのみ本文に自動で<br><p>が入るのをとめる
function stopWpautop(){
  if(is_page()){
    remove_filter('the_content', 'wpautop');
  }
}
add_action('wp','stopWpautop');



//previous_post_link() と next_post_link() にクラス付加
add_filter( 'previous_post_link', 'add_prev_post_link_class' );
function add_prev_post_link_class($output) {
  if(is_singular('news') || is_singular('case')){
    $class = 'ArticlePagination__Prev';
  }else if(is_singular('report')){
    $class = 'PaginationButtons__Prev';
  }
  return str_replace('<a href=', '<a class="'.$class.'" href=', $output);
}
add_filter( 'next_post_link', 'add_next_post_link_class' );
function add_next_post_link_class($output) {
  if(is_singular('news')|| is_singular('case')){
    $class = 'ArticlePagination__Next';
  }else if(is_singular('report')){
    $class = 'PaginationButtons__Next';
  }
  return str_replace('<a href=', '<a class="'.$class.'" href=', $output);
}

//お問い合わせ
function mwform_form_class() {
  if(is_page('support') || is_page('confirm') || is_page('contact')){
?>
<script>
  document.querySelector('.mw_wp_form form').classList.add('ContactForm');//formタグにclass追加

  //入力画面
  <?php if(is_page('support') || is_page('contact')){ ?>
    var $required = document.querySelectorAll('.required');
    for (var i = 0; i < $required.length; i++){
      $required[i].required = true;
    }
  <?php } ?>

  //確認画面
  <?php if(is_page('confirm')){ ?>
    var $remove = document.querySelectorAll('.ContactForm__Help, .ContactForm__AgreementLine');
    for (var i = 0; i < $remove.length; i++){
      $remove[i].parentNode.removeChild($remove[i]);
    }
    var $value = document.querySelectorAll('.ContactForm__Main td');
    for (var i = 0; i < $value.length; i++){
      $list = $value[i].querySelectorAll('.ContactForm__InputListMwform');
      for (var n = 0; n < $list.length; n++){
        $list[n].outerHTML = $list[n].innerHTML;
      }
      $value[i].innerHTML = '<div class="ContactForm__Value">' + $value[i].innerHTML + '</div>';
    }
  <?php } ?>
</script>
<?php
  }
}
// add_action( 'wp_footer', 'mwform_form_class', 1 );


/*
「lazysizes」
設定画面でLazy load YouTube and Vimeo videos, iframes, audio, etc.にチェックを入れると
lazysizes.unveilhooks.jsが読み込まれ、背景画像も設定可能に
*/

?>
