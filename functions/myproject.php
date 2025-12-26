<?php

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