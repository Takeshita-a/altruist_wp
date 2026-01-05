<?php 
function is_public_server(){
	$host = parse_url(home_url(), PHP_URL_HOST);
	if($host === 'www.altruist.co.jp'){
		return true;
	}else{
		return false;
	}
}

function my_page_title(){
	wp_title( '|', true, 'right' ).bloginfo('name');
}

function get_img_path(){
	return get_template_directory_uri().'/img';
}