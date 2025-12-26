<?php
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
