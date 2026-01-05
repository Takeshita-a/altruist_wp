<?php

/**************************************************************/
//フック
add_action('admin_init', 'my_custom_editor_styles');
add_action('wp_head', 'add_noindex');
add_action("init", "register_custom_post_type_and_taxonomy");
add_action('wp_enqueue_scripts', 'add_css');
add_action('wp_enqueue_scripts', 'add_js');
add_action('template_redirect', 'feed_noindex');
add_action("save_post", "slug_auto_setting", 10, 3);

add_filter( 'show_admin_bar', '__return_false' );

/* フック用関数定義 */
if(file_exists(get_template_directory() . '/functions/hook.php')){
	require_once get_template_directory() . '/functions/hook.php';
}

/**************************************************************/
//汎用関数

/* デバッグ関連定義 */
if(file_exists(get_template_directory() . '/functions/debug.php')){
	require_once get_template_directory() . '/functions/debug.php';
}

/* 汎用関数定義 */
if(file_exists(get_template_directory() . '/functions/utility.php')){
	require_once get_template_directory() . '/functions/utility.php';
}

/* 当プロジェクト用 汎用関数定義 */
if(file_exists(get_template_directory() . '/functions/myproject.php')){
	require_once get_template_directory() . '/functions/myproject.php';
}