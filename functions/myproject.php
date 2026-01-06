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

function get_company_info_list(){
	return [
		[
			'id' => 'top_message',
			'ja' => '代表ごあいさつ',
			'en' => 'TOP MESSAGE',
			'anchor' => 'top_message',
		],
		[
			'id' => 'management_philosophy',
			'ja' => '経営理念',
			'en' => 'MANAGEMENT PHILOSOPHY',
		],
		[
			'id' => 'company_overview',
			'ja' => '会社概要',
			'en' => 'COMPANY OVERVIEW',
		],
		[
			'id' => 'history',
			'ja' => '沿革',
			'en' => 'HISTORY',
		],
		[
			'id' => 'elect_public_notice',
			'ja' => '電子公告',
			'en' => 'ELECTRONIC PUBLIC NOTICE',
		],
		[
			'id' => 'officer_introduction',
			'ja' => '役員紹介',
			'en' => 'OFFICER INTRODUCTION',
		],
	];
}

function get_nav_list(){
	return [
		[
			'id' => 'company',
			'ja' => '企業情報',
			'en' => 'COMPANY INFORMATION',
		],
		[
			'id' => 'fa_technical_sales',
			'ja' => 'FA技術営業',
			'en' => 'FA TECHNICAL SALES',
		],
		[
			'id' => 'plant_engineering',
			'ja' => 'プラントエンジニアリング',
			'en' => 'PLANT ENGINEERING',
		],
		[
			'id' => 'technology',
			'ja' => '技術（相模原技術センター）',
			'en' => 'TECHNOLOGY',
		],
		[
			'id' => 'recruit',
			'ja' => '採用情報',
			'en' => 'RECRUIT',
			'link' => 'https://en-gage.net/altruist_saiyo/',
		],
		[
			'id' => 'product',
			'ja' => '製品情報',
			'en' => 'PRODUCT',
		],
	];
}

function get_site_header_nav_html($is_sp = false){
	$result_html = '';
	$nav_list = get_nav_list();

	$result_html .= '<a href="'.home_url().'" class="nav-item "><p>TOP</p></a>';

	foreach($nav_list as $item){
		$href = '';
		$external = '';
		$class = '';
		if(isset($item['link'])){
			$href = $item['link'];
			$external = 'target="_blank" rel="noopener noreferrer"';
			$class = 'external';
		}else{
			$href = home_url('/'.$item['id'].'/');
		}

		$result_html .= '<a href="'.$href.'" class="nav-item '.$class.'" '.$external.' data-sh-item="'.$item['id'].'"><p>'.$item['ja'].'</p></a>';

		if($is_sp){
			//サブメニュー
			if($item['id'] === 'company'){
				$pages = get_company_info_list();
				$pages_html = '';
				foreach($pages as $item2){
					$href2 = home_url('/'.$item2['id'].'/');
					$pages_html .= '<a href="'.$href2.'" class="submenu-item"><p>'.$item2['ja'].'</p></a>';
				}

				$result_html .= '<div class="submenu">';
				$result_html .= $pages_html;
				$result_html .= '</div>';
			}
		}
	}

	return $result_html;
}

function get_youtube_link(){
	return 'https://www.youtube.com/@altruist640';
}