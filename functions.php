<?php

/**************************************************************/
//フック
add_action('admin_init', 'my_custom_editor_styles');
add_action("init", "register_custom_post_type_and_taxonomy");
add_action("save_post", "slug_auto_setting", 10, 3);

add_filter( 'show_admin_bar', '__return_false' );

/**************************************************************/
//フック用関数

function my_custom_editor_styles() {
  add_editor_style('style-for-editor.css');
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

	register_post_type("company_announcement", [
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

/**************************************************************/
//汎用関数

function my_page_title(){
	wp_title( '|', true, 'right' ).bloginfo('name');
}

function is_public_server(){
	$host = parse_url(home_url(), PHP_URL_HOST);
	if($host === 'www.altruist.co.jp'){
		return true;
	}else{
		return false;
	}
}

function get_news_title($post_id){
	$temp_dir_uri = get_template_directory_uri();
	$title = get_the_title($post_id);
	$title_link = '';
	$title_html = '';
	
	if(!empty(get_field('external_link', $post_id))){
		//外部サイトリンク
		$title_link = get_field('external_link', $post_id);
		$title_html = <<<HTML
										<a href="{$title_link}" target="_blank">{$title}<img class="nav01_icon mb5" src="{$temp_dir_uri}/_old_assets/img/gaibu_link.png" /><span></span></a>
									HTML;
		return $title_html;

	}elseif(!empty(get_field('pdf_file', $post_id))){
		//PDF表示
		$title_link = get_field('pdf_file', $post_id)['url'];

	}elseif(!empty(get_field('news_content', $post_id))){
		//記事コンテンツ
		$title_link = get_post_permalink($post_id);

	}else{
		return $title;
	}

	if(!empty($title_link)){
		//リンク付きタイトル
		$title_html = <<<HTML
										<a href="{$title_link}">{$title}<span></span></a>
									HTML;
		return $title_html;
	}
}

function get_news_term_name($post_id){
	if(empty($post_id)) return '';
	$terms = get_the_terms($post_id, 'news_category');

	if(is_array($terms)){
		return $terms[0]->name;
	}else{
		return 'お知らせ';
	}
}

function my_error_log($data){
	date_default_timezone_set('Asia/Tokyo');
	$file_path =  __DIR__ ."/log/".date('Ymd').".txt";
	$output = date('Y/m/d h:i:s  ').$data."\r\n";
	file_put_contents($file_path, print_r($output, true), FILE_APPEND);
}

function my_debug_log($data){
	date_default_timezone_set('Asia/Tokyo');
	$file_path =  __DIR__ ."/log/debug-".date('Ymd').".txt";

	if (is_array($data) || is_object($data)) {
		$data = print_r($data, true);
	}

	$output = date('Y/m/d h:i:s  ').$data."\r\n";
	file_put_contents($file_path, $output, FILE_APPEND);
}