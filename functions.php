<?php

add_filter( 'show_admin_bar', '__return_false' );

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