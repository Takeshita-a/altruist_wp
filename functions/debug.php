<?php

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