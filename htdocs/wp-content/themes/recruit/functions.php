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


//無限ロードするページ
function is_infiniteLoad(){
  if(is_post_type_archive( 'post' ) || is_category() || is_post_type_archive( 'column' ) || is_tax('columncat') || is_search()){
    return true;
  }else{
    return false;
  }
}

function my_scripts() {
  wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '1.1');
  wp_enqueue_style( 'localstyle', get_bloginfo('stylesheet_url'), array(), '1.0');
  wp_enqueue_script('script', home_url().'/assets/js/bundle.js', array(), '1.0', true );

  if(is_infiniteLoad()){
    // wp_enqueue_script('j', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '1.0', true );
    wp_enqueue_script('infinite-scroll', 'https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js', array(), '1.0', true );
  }
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


//無限ロード  https://infinite-scroll.com/api.html
function local_script() {
  if(is_infiniteLoad()){
?>
<script>
var elem = document.querySelector('.articleList');
var infScroll = new InfiniteScroll( elem, {
  // options
  path: '.next_posts_link a',
  append: '.articleList__item',
  hideNav: '.next_posts_link',
  scrollThreshold: 0,
  history: false,
});

infScroll.on( 'append', function( response, path, items ) {
  [].forEach.call(items, ( element ) => {
    element.classList.add('-active');
  })
});
</script>
<?php
  }
}
add_action( 'wp_footer', 'local_script', 100 );


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

  if (current_user_can('administrator') || current_user_can('editor')){
    // echo '管理者・編集者のみ';
    setOption();
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

	update_option( 'large_size_w', 1200 );
	update_option( 'large_size_h', 0 );
}


//アイキャッチ有効化
add_theme_support('post-thumbnails', array(
  'post',
  'column'
));

function custom_admin_post_thumbnail_html( $content ) {
  $content .= '<p>1200px × 730px</p>';
  return $content;
}
add_filter('admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html');


/* 「投稿」名称変更 */
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = '質問';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = '質問';
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


/* 投稿アーカイブページの作成 */
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'qa'; //任意のスラッグ名
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


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
// add_action('init', 'cpt_glossary_init');
// function cpt_glossary_init()
// {
//   $labels = array(
//     'name' => _x('用語集', 'post type general name'),
//     'singular_name' => _x('用語集', 'post type singular name'),
//     'add_new' => _x('新規追加', 'glossary'),
//     'add_new_item' => __('用語集を追加'),
//     'edit_item' => __('用語集を編集'),
//     'new_item' => __('新しい用語集'),
//     'view_item' => __('用語集を見る'),
//     'search_items' => __('用語集を探す'),
//     'not_found' =>  __('用語集はありません'),
//     'not_found_in_trash' => __('ゴミ箱に用語集はありません'),
//     'parent_item_colon' => ''
//   );
//   $args = array(
//     'labels' => $labels,
//     'public' => true,
//     'show_ui' => true,
//     'query_var' => true,
//     'capability_type' => 'post',
//     'has_archive' => true,
//     'rewrite' => array('slug' => 'glossary', 'with_front' => false, 'pages' => true, 'feeds' => false),
//     'hierarchical' => false,
//     'menu_position' => 5,
//     'supports' => array('title','editor','thumbnail')
//   );
//   register_post_type('glossary', $args);
//
//   $args = array(
//     'labels' => array(
//       'name' => '用語集カテゴリ',
//       'singular_name' => '用語集カテゴリ',
//       'search_items' => '用語集カテゴリを検索',
//       'popular_items' => 'よく使われている用語集カテゴリ',
//       'all_items' => 'すべての用語集カテゴリ',
//       'parent_item' => '親用語集カテゴリ',
//       'edit_item' => '用語集カテゴリの編集',
//       'update_item' => '更新',
//       'add_new_item' => '用語集カテゴリを追加',
//       'new_item_name' => '新しい用語集カテゴリ'
//     ),
//     'public' => true,
//     'show_ui' => true,
//     'hierarchical' => true,
//     'query_var' => true,
//     'rewrite' => array('slug' => 'glossarycat', 'with_front' => false)
//   );
//   register_taxonomy('glossarycat', 'glossary', $args);
// }

function setOption(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'  => 'サイト設定',
      'menu_title'  => 'サイト設定',
      'menu_slug'   => 'theme-options',
      'capability'  => 'edit_posts',
      'parent_slug' => '',
      'position'  => 8,
      'redirect'  => false,
    ));

    acf_add_options_page(array(
      'page_title'  => 'バナー設定',
      'menu_title'  => 'バナー設定',
      'menu_slug'   => 'theme-banner',
      'capability'  => 'edit_posts',
      'parent_slug' => '',
      'position'  => 9,
      'redirect'  => false,
    ));
    // acf_add_options_sub_page(array( //サブページ
    //   'page_title'  => 'トップページ用',
    //   'menu_title'  => 'トップページ用',
    //   'menu_slug'   => 'theme-options-topRank',
    //   'capability'  => 'edit_posts',
    //   'parent_slug' => 'theme-options-ranking', //親ページのスラッグ
    //   'position'  => false,
    // ));
  }
}
$officialSite = get_field('sitesetting_official', 'option');
// print_r($officialSite);
$applyPage = get_field('sitesetting_apply', 'option');


// 表示件数set
add_filter('pre_get_posts', 'custom_posts_query');
function custom_posts_query() {
  global $wp_query;
  if(!is_admin()){
    if(is_infiniteLoad()){
      $wp_query -> query_vars['posts_per_page'] = 10;
    }else{
      $wp_query -> query_vars['posts_per_page'] = -1;
    }
  }
}

//メインクエリ変更
function change_mainQuery( $query ) {
  //TOP
  if ( $query->is_home() && $query->is_main_query() ) {
    $args = array(
      'posts_per_page'   => 1,
      'post_type'        => 'post',
    );
    $topPost = get_posts( $args );
    // print_r($topPost[0]->ID);
    //最上部の記事を除外
    $query->set( 'post__not_in', array( $topPost[0]->ID ) );
    $query->set( 'posts_per_page', 3 );
  }
}
add_action( 'pre_get_posts', 'change_mainQuery' );


//お気に入りボタンカスタマイズ
function custom_favorites_button_css_classes($classes, $post_id, $site_id){
  $classes .= ' button button--pink';
	return $classes;
}
add_filter( 'favorites/button/css_classes', 'custom_favorites_button_css_classes', 10, 3 );


//固定ページのみ本文に自動で<br><p>が入るのをとめる
function stopWpautop(){
  if(is_page()){
    remove_filter('the_content', 'wpautop');
  }
}
add_action('wp','stopWpautop');

//アイキャッチ取得
function getEyecatch($postid, $size='medium_large'){
  $eyecatchId = get_post_thumbnail_id($postid);
  $eyecatch = wp_get_attachment_image_src( $eyecatchId, $size );
  return $eyecatch[0];
}
//width,heightも
function getEyecatchInfo($postid, $size='medium_large'){
  $eyecatchId = get_post_thumbnail_id($postid);
  $eyecatch = wp_get_attachment_image_src( $eyecatchId, $size );
  return array($eyecatch[0],$eyecatch[1],$eyecatch[2]);
}


//お気に入りランキング取得
function getClipRanking($catID = null){
  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
  );
  if($catID){
    $args = array_merge($args, array('category'=>$catID));
  }
  $allposts = get_posts( $args );
  // print_r($allposts);
  $rankPosts = [];
  foreach($allposts as $value){
    // print_r($value);
    // $value->ID
    $temp['id'] = $value->ID;
    $temp['favorite'] = strip_tags(get_favorites_count($value->ID));
    array_push($rankPosts, $temp);
  }

  foreach ((array) $rankPosts as $key => $value) {
    $sort[$key] = $value['favorite'];
  }

  array_multisort($sort, SORT_DESC, $rankPosts);
  // print_r($rankPosts);
  return $rankPosts;
}

//アクセスランキング出力カスタム
function my_custom_single_popular_post( $post_html, $p, $instance ){
    // $output = '<li><a href="' . get_the_permalink($p->id) . '" class="my-custom-title-class" title="' . esc_attr($p->title) . '">' . $p->title . '</a> <div class="my-custom-date-class">' . date( 'Y-m-d', strtotime($p->date) ) . '</div></li>';

    // print_r($instance['markup']['wpp-start']);
    if(is_page('question')){//質問投稿フォームページの場合
      // $instance['markup']['wpp-start'] = '<ul class="popularQuestion">';
      $output = '<li class="popularQuestion__item">';
      $output .= '<a href="'. get_the_permalink($p->id) . '">';
      $output .= $p->title;
      $output .= '</a>';
      $output .= '</li>';
    }else{
      $the_terms = get_the_terms($p->id, 'category');
      //カテゴリは単一選択
      $cat = array(
        // 'id'=>$the_terms[0]->term_id,
        'name'=>$the_terms[0]->name,
        // 'slug'=>$the_terms[0]->slug,
        // 'desc'=>$the_terms[0]->description,
        // 'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
      );
      $output = '<li class="ranking__listItem">';
      $output .= '<a href="'. get_the_permalink($p->id) . '">';
      $output .= $p->title.'<span class="ranking__listItemCategory">['.$cat['name'].']</span>';
      $output .= '</a>';
      $output .= '</li>';
    }
    return $output;
}
// add_filter( 'wpp_post', 'my_custom_single_popular_post', 10, 3 );


function my_custom_popular_posts_html_list( $mostpopular, $instance ){

  if(is_page('question')){//質問投稿フォームページの場合
    // print_r($mostpopular);
    $output = '<ul class="popularQuestion">';
    foreach( $mostpopular as $p ) {
      $output .= '<li class="popularQuestion__item">';
      $output .= '<a href="'. get_the_permalink($p->id) . '">';
      $output .= $p->title;
      $output .= '</a>';
      $output .= '</li>';
    }
    $output .= '</ul>';
  }else{
    $output = '<ol class="ranking__list">';
    foreach( $mostpopular as $p ) {
      $the_terms = get_the_terms($p->id, 'category');
      //カテゴリは単一選択
      $cat = array(
        // 'id'=>$the_terms[0]->term_id,
        'name'=>$the_terms[0]->name,
        // 'slug'=>$the_terms[0]->slug,
        // 'desc'=>$the_terms[0]->description,
        // 'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
      );
      $output .= '<li class="ranking__listItem">';
      $output .= '<a href="'. get_the_permalink($p->id) . '">';
      $output .= $p->title.'<span class="ranking__listItemCategory">['.$cat['name'].']</span>';
      $output .= '</a>';
      $output .= '</li>';
    }
    $output .= '</ol>';
  }
  return $output;
}
add_filter( 'wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2 );



/**
 * 検索でカスタム投稿タイプの投稿を検索対象から除きます。
 */
function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

//親ページのslugを返す
function is_parent_slug() {
  global $post;
  if ($post->post_parent) {
    $post_data = get_post($post->post_parent);
    return $post_data->post_name;
  }
}



//AMP判定
function is_amp(){
	$is_amp = false;
    if(function_exists('is_amp_endpoint') && is_amp_endpoint()) {
        $is_amp = true;
    }
    return $is_amp;
}
//「logo」フィールドの値は必須です。対応
add_filter( 'amp_post_template_metadata', 'amp_set_site_logo', 10, 2);
function amp_set_site_logo( $metadata, $post ) {
    $metadata['publisher']['logo'] = array(
        '@type' => 'ImageObject',
        'url' => get_bloginfo('stylesheet_directory').'/images/logo.png',
        //'height' => 1200,
        //'width' => 1200
        );
    return $metadata;
}

//コンテンツのHTML文字列からimg要素をamp-img要素に変換
function convertImgToAmpImg($the_content){
    // PHPのパスを解決(相対パスだとライブラリを読み込めないため)
    require_once(dirname(__FILE__) . "/libs/phpQuery-onefile.php");

    // 仮想DOMを構築（phpQueryで走査するため）
    $html = <<<HTML
<html>
<body>{$the_content}</body>
</html>
HTML;

    // DOMを構築
    $dom = phpQuery::newDocument($html);

    // img要素を探し出して、繰り返す
    foreach ($dom->find("img") as $img) {
        // 参照を取る
        $pqImg = pq($img);

        // 属性値をコピーする
        $obj["src"] = $pqImg->attr("src");
        $obj["width"] = $pqImg->attr("width");
        $obj["height"] = $pqImg->attr("height");
        $obj["srcset"] = $pqImg->attr("srcset");
        $obj["alt"] = $pqImg->attr("alt");
        $obj["class"] = $pqImg->attr("class");
        // sizes属性は表示崩れの可能性があるのでコピーしない

        // src 属性がなければ変換しない
        if (empty($obj["src"])) {
            continue;
        }

        ini_set('error_reporting', E_ALL);
        //日本語ドメインNG
        // $obj["src"] = str_replace('https://脱毛診断メーカー.com', 'https://xn--lckwf7cb5558dg0hnt1bzdp.com', $obj["src"]);
        // print_r($obj["src"]);
        $imagesize = getimagesize($obj["src"]);
        // print_r($imagesize);
        // width と height がなければオリジナルサイズを取得
        if (empty($obj["width"]) || empty($obj["height"])){
            $obj["width"] = $imagesize[0];
            $obj["height"] = $imagesize[1];
            //imagesize取得できなければ強制
            if(empty($imagesize)){
              $obj["width"] = 640;
              $obj["height"] = 480;
            }
        }

        // 属性をコピーする
        $attrStr = [];
        foreach ($obj as $key => $value) {
            if (!empty($value)) {
                $attrStr[] = "$key=\"$value\"";
            }
        }

        // w:375pxより大きいものはlayout属性を追加する（レスポンシブに）
        if($obj["width"] > 375){
        	$attrStr[] = 'layout="responsive"';
        }

        // img要素をamp-img要素に置き換える
        // コピーした属性値をくっつける
        $pqImg->replaceWith("<amp-img " . join(" ", $attrStr) . " />");
    }

    // contentの内容を返す
    return $dom->find("body")->html();
}


//twitterカードのAMP対応
function embed_amp( $content, $url ) {
  preg_match( '/twitter.com/', $content, $matche );
  $urlArray = explode('/', $url);
  $tweetid = end($urlArray);
  if( $matche ) {
    if( is_amp() ) {
        return '<amp-twitter width=486 height=657 layout="responsive" data-tweetid="' . $tweetid . '" data-cards="hidden"></amp-twitter>';
    }else{
      return $content;
    }
  }
}
add_filter( 'embed_oembed_html', 'embed_amp', 10, 2 );


/*
「lazysizes」
設定画面でLazy load YouTube and Vimeo videos, iframes, audio, etc.にチェックを入れると
lazysizes.unveilhooks.jsが読み込まれ、背景画像も設定可能に
*/

//カスタムフィールド設定用
// $path = trim( get_blog_status( $blog_id, 'path' ), '/' );
// if($path != "series/base"){//親テーマ「大会ベース」以外はナビゲーションから「カスタムフィールド」を非表示
//   define( 'ACF_LITE', true );
// }
//
// add_action( 'init', 'setTerm', 999 );
// function setTerm(){
//     $topvisualId = get_term_by('slug','setting_visual','settingcat')->term_id;
//     $entrybuttonId = get_term_by('slug','setting_entry','settingcat')->term_id;
//     $pickuptopicsId = get_term_by('slug','setting_pickup','settingcat')->term_id;
//     $mapinitId = get_term_by('slug','setting_map','settingcat')->term_id;
//     $importantId = get_term_by('slug','setting_info','settingcat')->term_id;
//     $partnerId = get_term_by('slug','setting_partner','settingcat')->term_id;
//
//     //親テーマ「大会ベース」のみ反映させたくない。
//     $path = trim( get_blog_status( $blog_id, 'path' ), '/' );
//     if($path != "series/base"){
//       if(function_exists("register_field_group")){
//           include_once('acf.php');
//       }
//     }
// }
?>
