<?php

class My_Js_Action{

	/************************************************************************************************************

	************************************************************************************************************/
	public static function tomove($url) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					location.replace("$url");
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}

	public static function alerttoclose($msg) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
			alert("$msg");
			if(window.opener) {
				top.close();
			}
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}

	/************************************************************************************************************

	************************************************************************************************************/
	public static function alerttoback($msg) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
			<!--
			alert("$msg");
			history.back();
			//-->
			</script>
	JAVASCRIPTS;
			exit;
	}

	public static function toback() {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
			<!--
			history.back();
			//-->
			</script>
	JAVASCRIPTS;
			exit;
	}

	/************************************************************************************************************

	************************************************************************************************************/
	public static function toalert($msg) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					alert("$msg");
					//-->
					</script>
	JAVASCRIPTS;
	}


	/************************************************************************************************************

	************************************************************************************************************/
	public static function tomovetoreload($url) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					location.replace("$url");
					if(window.opener) {
				opener.focus();
							opener.location.reload();
				top.focus();
					}
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}


	/************************************************************************************************************

	************************************************************************************************************/
	public static function alerttoreloadtoclose($msg) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					alert("$msg");
					if(window.opener) {
				opener.focus();
							opener.location.reload();
				top.close();
					}
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}

	/************************************************************************************************************

	************************************************************************************************************/
	public static function alerttoopenerreload($msg) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					if(window.opener) {
				opener.focus();
							opener.location.reload();
					}
			alert("$msg");
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}


	/************************************************************************************************************

	************************************************************************************************************/
	public static function alerttoreloadtomove($msg, $url) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
					<!--
					if(window.opener) {
				opener.focus();
							opener.location.reload();
				top.focus();
							location.replace("$url");
					}
			alert("$msg");
					//-->
					</script>
	JAVASCRIPTS;
			exit;
	}

	/************************************************************************************************************

	************************************************************************************************************/
	public static function alerttomove($msg, $url) {
			echo <<<JAVASCRIPTS
					<script language="JavaScript">
			<!--
			alert("$msg");
			location.replace("$url");
			//-->
			</script>
	JAVASCRIPTS;
			exit;
	}

}
