<?php
/**************************************************************/
//フック用関数

function my_custom_editor_styles() {
  add_editor_style('style-for-editor.css');
}

//ページnoindex
function add_noindex() {
  if (!is_public_server()) echo "<!-- NOINDEX -->\n<meta name=\"robots\" content=\"noindex\">\n<meta name=\"robots\" content=\"nofollow\">\n<!-- //NOINDEX -->";
}

//フィードnoindex
function feed_noindex() {
	if ( is_feed() && headers_sent() === false ) {
		header( 'X-Robots-Tag: noindex, follow', true );
	}
}

//カスタム投稿・タクソノミー
function register_custom_post_type_and_taxonomy() {

  register_post_type("news", [
    "label" => "News",
    "public" => true,
    "has_archive" => true,
    "show_in_rest" => false,
    "menu_position" => 5,
		'supports' => ['title'],
  ]);

	register_taxonomy("news_category",
  ["news"],
  [
    "label" => "Newsカテゴリー",
    "public" => true,
    "hierarchical" => true,
    "show_in_rest" => false,
  ]);

	register_post_type("elect_public_notice", [
    "label" => "電子公告",
    "public" => true,
    "has_archive" => true,
    "show_in_rest" => false,
    "menu_position" => 5,
		'supports' => ['title'],
  ]);

	register_post_type("products", [
    "label" => "製品情報",
    "public" => true,
    "has_archive" => true,
    "show_in_rest" => false,
    "menu_position" => 5,
		'supports' => ['title'],
  ]);
}

//スラッグ自動生成・更新
function slug_auto_setting( $post_id, $post, $update ){
	if($post->post_status === "trash") return;

	$current_post_type = get_post_type($post_id);
	$post_types = get_post_types(['public' => true, '_builtin' => false], 'names');

	if(in_array($current_post_type, $post_types)){		
		$parent_id = wp_is_post_revision( $post_id );
		if ( false !== $parent_id ) {
			$post_id = $parent_id;
		}
	
		$slug = $post_id;
	
		// ループ防止
		remove_action( 'save_post', 'slug_auto_setting' );
		wp_update_post( array( 'ID' => $post_id, 'post_name' => $slug ) );
		add_action( 'save_post', 'slug_auto_setting' );
	}
}

// CSS読み込み
function add_css() {
  if (empty($GLOBALS['template'])) return;

  $template_base_name = pathinfo($GLOBALS['template'], PATHINFO_FILENAME);

	$files = [
		'reset-style' => 'reset',
		'common-style' => 'common',
		'template-style' => $template_base_name,
	];

	$relative_path = '';

	foreach($files as $handle => $filename){
		$relative_path = '/css/'.$filename.'.css';
		if (file_exists(get_template_directory() . $relative_path)) {
			wp_enqueue_style(
				$handle,
				get_template_directory_uri() . $relative_path, 
				array(),
				filemtime(get_template_directory() . $relative_path), // キャッシュ対策（更新日時をバージョンに）
				'all'
			);
		}
	}
}

// JS読み込み
function add_js() {
  if (empty($GLOBALS['template'])) return;

  $template_base_name = pathinfo($GLOBALS['template'], PATHINFO_FILENAME);

	$files = [
		'common-script' => 'common',
		'template-script' => $template_base_name,
	];

	$relative_path = '';

	foreach($files as $handle => $filename){
		$relative_path = '/js/'.$filename.'.js';
		if (file_exists(get_template_directory() . $relative_path)) {
			wp_enqueue_script(
				$handle,
				get_template_directory_uri() . $relative_path,
				array('jquery'),
				filemtime(get_template_directory() . $relative_path), // キャッシュ対策（更新日時をバージョンに）
				array()
			);
		}
	}
}