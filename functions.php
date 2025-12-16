<?php

function my_page_title(){
	wp_title( '|', true, 'right' ).bloginfo('name');
}

