<?php
ini_set('display_errors','off');

$_DOMAIN = "";
$_ROOTPATH = "";
$_WEBROOTPATH = "https://www.altruist.co.jp";

$_LIBPATH = get_template_directory()."/_lib";
$_URLPATH = $_SERVER['HTTP_HOST'];
$_REQURI = $_SERVER['REQUEST_URI'];

$unixtime = time();
$unixtimeasc = 3000000000-time();


header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header("Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0");

session_start();

include("$_LIBPATH/define.php"); 
//include("$_LIBPATH/connect.php");	
include("$_LIBPATH/jsaction.php");
include("$_LIBPATH/utility.php");	
//include("$_LIBPATH/_class.php");


?>
<!DOCTYPE html> 
<html lang="ja">
<head>
<meta charset="UTF-8">
<script language="JavaScript" src="<?=get_template_directory_uri() ?>/_lib/javascript.js"></script>
