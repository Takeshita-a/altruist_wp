<?php

global $template;

$lang = get_query_var('lang', 'ja');
$pagename = get_query_var('pagename');
$template_file_name = basename($template);
$init_template_file_dir = get_template_directory() . "/preprocess/pre-{$template_file_name}";
$url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (file_exists($init_template_file_dir)) require_once $init_template_file_dir;