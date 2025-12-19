<?php

class My_Utility{

	public static function auth_level($lvl="5555") {
		global $_SESSION;

		if($_SESSION['session_admin_power']<$lvl){
			My_Js_Action::alerttomove("Can not access!!", home_url());
		}
	}

	public static function query($query, $action="", $movepage="", $errormsg="ERROR!", $systemmsg="") {
		global $__DB__CONN,$_WEBROOTPATH;
		if($res = &mysqli_query($__DB__CONN,$query)) {
			return $res;
		} else {
			
			$sqlmsg = "Error!!";
			My_Js_Action::alerttomove($sqlmsg,$_WEBROOTPATH);
			exit;

			//$sqlmsg = mysqli_errno() . ":" . mysql_error();
			//echo $sqlmsg;
			//echo $query;
			//exit;
		}
	}

	public static function query2($query, $action="", $movepage="", $errormsg="ERROR!", $systemmsg="") {
		global $__DB__CONN,$_WEBROOTPATH;
		if($res = &mysqli_query($__DB__CONN,$query)) {
			return $res;
		} else {

		}
	}

	public static function query3($query, $action="", $movepage="", $errormsg="ERROR!", $systemmsg="") {
		global $__DB__CONN,$_WEBROOTPATH;
		if($res = &mysqli_query($__DB__CONN,$query)) {
			return $res;
		} else {
			
			return "ND";
		}
	}

	public static function url_clear($url) {
			if($url) {
					$ary = explode("?", $url);
					$qry = explode("&", $ary[1]);
					for($i=0, $cnt=count($qry); $i<$cnt; $i++) {
							$tmp = explode("=", $qry[$i]);
				$imp[$tmp[0]] = $tmp[1];
					}

			foreach($imp as $fld => $var) {
				if($fld && $var) {
					$imp2[$fld] = "$fld={$var}";
				}
					}

					if(count($imp2)) {
							$query = implode("&", $imp2);
							return $ary[0] . "?" . $query;
					}
					else {
				return $ary[0];
			}
			}
	}

	public static function query_clear($query) {
			if($query) {
					$qry = explode("&", $query);
					for($i=0, $cnt=count($qry); $i<$cnt; $i++) {
							$tmp = preg_split("=", $qry[$i]);
				$tmp[0] = trim($tmp[0]);
				$tmp[1] = trim($tmp[1]);
							if($tmp[0]) {
					$imp[$tmp[0]] = $tmp[1];
				}
					}

			foreach($imp as $fld => $var) {
				if($fld && $var) {
					$imp2[$fld] = "$fld=$var";
				}
					}

					if(count($imp2)) {
							$query = implode("&", $imp2);
							return $query;
					}
					else {
				return "";
			}
			}
	}

	public static function selected($c1, $c2) {
			if($c1 == $c2 ) return "selected";
	}

	public static function checked($c1, $c2) {
			if($c1 == $c2 ) return "checked";
	}

	public static function selectbox($array, $val="", $type=false, $style="style='background:#FFF0F0'") {
			if(is_array($array)) {
					foreach($array as $idx => $text) {
							if($type) { $refkey = $idx; }
							else { $refkey = $text; }
							$option .= "<option value='$refkey' $style";

				settype($val, string);
				settype($refkey, string);
							if($refkey === $val) $option .= " selected";
							$option .= ">$text</option>\n";

					}
					return $option;
			}
			else return "";
	}

	public static function MailSending( $ToName, $To, $Subject, $Body, $From, $FromName ){
		
		$ToKind = MailKind($To);


		if($ToKind == "1"){  //pc
			$ret = send_html_mail_utf( $ToName, $To, $Subject, $Body, $From, $FromName );
		} else if($ToKind == "2"){  // AU
			$ret = send_mobile_mail_AU( $ToName, $To, $Subject, $Body, $From, $FromName );
		} else if($ToKind == "3"){ //docomo, softbank, voda
			$ret = send_mobile_mail( $ToName, $To, $Subject, $Body, $From, $FromName );
		}

		return $ret;
	}

	public static function MailKind($Mail){
		
		$MailTmp = explode("@",$Mail);
		$MailKind = $MailTmp[1];

		if ($MailKind == "ezweb.ne.jp"){ // AU

			$Return = "2";

		} elseif ($MailKind == "docomo.ne.jp" || $MailKind == "softbank.ne.jp"){ // docomo,softbank

			$Return = "3";

		} else {
				
			$MailKindVoda = stripos($MailKind,"vodafone.ne.jp");

			if($MailKindVoda === false){ // pc
				$Return = "1";
			} else {       // vodafone
				$Return = "3";
			}
		}

		return $Return;
	}

	public static function send_mobile_mail( $mail_to_name, $mail_to, $mail_title, $mail_body, $mail_from, $mail_from_name )
	{

		$mailbody = Arrange($mail_body);
		$mailheaders     = "Return-Path: $mail_to\r\n";
		$mailheaders    .= "From: $mail_from\r\n";
		$mailheaders    .= "X-Mailer: sendmail\r\n";
		$mailheaders    .= "X-Priority: 1\r\n";
		$mailheaders .= "MIME-Version: 1.0\r\n";
		$mailheaders .= "Content-Type: text/html; charset=shift-jis\r\n";
		$bodytext = stripslashes($mailbody);

		$mail_title = "=?SHIFT-JIS?B?".base64_encode($mail_title)."?=\n";

		if(mail($mail_to,$mail_title,$bodytext,$mailheaders)){
			return 1;
		} else {
			return 0;
		}
	}

	public static function send_mobile_mail_AU( $mail_to_name, $mail_to, $mail_title, $mail_body, $mail_from, $mail_from_name )
	{
		
		$mailbody = Arrange($mail_body);
		$mailtitle = iconv("SHIFT-JIS", "iso-2022-jp",$mail_title);
		$mailtitle = mb_encode_mimeheader($mailtitle,"SJIS");
		$mailheaders = "From: ".$mail_from;

		$bodytext = iconv("shift-jis", "iso-2022-jp",stripslashes($mail_body));

		if(mail($mail_to,$mailtitle,$bodytext,$mailheaders)){
			return 1;
		} else {
			return 0;
		}
	}

	public static function send_html_mail_utf( $mail_to_name, $mail_to, $mail_title, $mail_body, $mail_from, $mail_from_name )
	{
			$mailbody = self::Arrange($mail_body);
			$mailbody = "<HTML><BODY>".$mailbody."</BODY></HTML>";
			$mailbody_jis = $mailbody;
			$mail_title_jis = $mail_title;
			$mail_to_name_jis = $mail_to_name;
			$mail_from_name_jis = $mail_from_name;


			// Header Make
			$headers .= "From: =?UTF-8?B?".base64_encode($mail_from_name_jis)."?= <".$mail_from.">\n";
			$headers .= "X-Sender: <".$mail_from.">\n";
			$headers .= "X-Mailer: PHP\n";
			$headers .= "X-Priority: 1\n";
			$headers .= "Return-Path: <".$mail_from.">\n";
			$headers .= "MIME-Version: 1.0n\n";
			$headers .= "Content-Type: text/html; \n charset=utf-8\n";
			$headers .= "Content-Transfer-Encoding: 7bit\n\n\n";
			// Header Info Make
			$mailto =  "=?UTF-8?B?".base64_encode($mail_to_name_jis)."?= <".$mail_to.">\n";
			$mailtitle = "=?UTF-8?B?".base64_encode($mail_title_jis)."?=\n";

			if(mail( $mailto, $mailtitle, $mailbody_jis, $headers )){
				return 1;
			} else {
				return 0;
			}
	}

	public static function Arrange($String) { 

			//HTML Tag
			$String = htmlspecialchars($String); 
			
			//Str_replace 
			$String = str_replace("$_GET[Search]","<font color=red>$_GET[Search]</font>",$String); 
			
			//BrTag 
			$String = nl2br($String); 

			$homepage_pattern = "/([^\"\'\=\>])(mms|http|HTTP|ftp|FTP|telnet|TELNET)\:\/\/(.[^ \n\<\"\']+)/"; 
		$String = preg_replace($homepage_pattern,"\\1<a href=\\2://\\3 target=_blank>\\2://\\3</a>", " ".$String); 

		$email_pattern = "/([ \n]+)([a-z0-9\_\-\.]+)@([a-z0-9\_\-\.]+)/";
		$String = preg_replace($email_pattern,"\\1<a href=mailto:\\2@\\3>\\2@\\3</a>", " ".$String);
			
			return $String; 
	}

	public static function CalculateAge($yy,$mm,$dd){

		$Age = intval(date("Y") - $yy);
		$tmp = (intval(date("m")) - intval($mm));

		if($tmp == 0){
			if((intval(date("d")) - intval($dd)) < 0){
				$Age = $Age-1;
			}
		} else if($tmp <0){
			$Age = $Age-1;
		} else if($tmp>0){
			$Age = $Age;
		}

		return $Age;
	}

	public static function CheckBoxSerialize($arr){
		
		if( count($arr) > 0 ){
			$srch = Array();
			foreach($arr as $fld => $val) {
				$srch[] = "s".$val."e";
			}

			if( count($srch) > 0 ){
				$ret = implode("||",$srch);
			} else {
				$ret = "";
			}		
		} else {
			$ret = "";
		}

		return $ret;

	}

	public static function CheckBoxUnSerialize($val){
		
		$ret = Array();

		if( $val != ""){
			$tmp = explode("||",$val);
			
			$cnt = count($tmp);
			
			if( $cnt == 1 && $cnt > 0){
				$t = str_replace("s","",$tmp[0]);
				$t = str_replace("e","",$t);
				$ret[] = $t;
			} else {

				for($i=0;$i<$cnt;$i++){
					$t = $tmp[$i];
					$t = str_replace("s","",$t);
					$t = str_replace("e","",$t);
					$ret[] = $t;
				}

			}
		}

		return $ret;

	}

	public static function TxtUnSerialize($arr,$val){
		
		$ret = Array();

		if( $val != ""){
			$tmp = explode("||",$val);
			
			$cnt = count($tmp);
			
			if( $cnt == 1 && $cnt > 0){
				$t = str_replace("s","",$tmp[0]);
				$t = str_replace("e","",$t);
				$txt = $arr[$t];
			} else {

				for($i=0;$i<$cnt;$i++){
					$t = $tmp[$i];
					$t = str_replace("s","",$t);
					$t = str_replace("e","",$t);
					$ret[] = $arr[$t];
				}

				$txt = implode(" ",$ret);

			}
		}

		return $txt;

	}

	public static function TxtUnSerialize2($arr,$val,$type){
		
		$ret = Array();

		if( $val != ""){
			$tmp = explode("||",$val);
			
			$cnt = count($tmp);
			
			if( $cnt == 1 && $cnt > 0){
				$t = str_replace("s","",$tmp[0]);
				$t = str_replace("e","",$t);
				$txt = $arr[$t];
			} else {

				for($i=0;$i<$cnt;$i++){
					$t = $tmp[$i];
					$t = str_replace("s","",$t);
					$t = str_replace("e","",$t);
					$ret[] = $arr[$t];
				}

				$txt = implode($type,$ret);

			}
		}

		return $txt;

	}

	public static function TxtUnSerialize3($arr,$val){
		
		$ret = Array();

		if( $val != ""){
			$tmp = explode("||",$val);
			
			$cnt = count($tmp);
			
			if( $cnt == 1 && $cnt > 0){
				$t = str_replace("s","",$tmp[0]);
				$t = str_replace("e","",$t);
				$txt = "<li>".$arr[$t]."</li>";
			} else {

				for($i=0;$i<$cnt;$i++){
					$t = $tmp[$i];
					$t = str_replace("s","",$t);
					$t = str_replace("e","",$t);
					$ret[] = "<li>".$arr[$t]."</li>";
				}

				$txt = implode("",$ret);

			}
		}

		return $txt;

	}

	public static function getFileExt($filename)
	{
		$ext = array_pop(explode(".",$filename));
		return $ext;
	}

	public static function getSavename($filename,$url)
	{
		//$savename = time();
		$savename = $filename;
		$j = 0;
		$savename = stripslashes($savename);
		$savename=preg_replace("/ /i","_",$savename);
		$savename=preg_replace("/'/i","",$savename);	
		$savename=preg_replace("/;/i","",$savename);	
		$savename=preg_replace("/\|/i","",$savename);

		while (file_exists($url."/".$savename)) {
			$j++;
			$savename = $j."@".$savename;
		}		
		return $savename;
	}

	public static function upload_file($tempfile, $realfile, $dir)
	{
		if ($tempfile == "") return false;

		@move_uploaded_file($tempfile, "$dir/$realfile");
		return true;
	}

	public static function fileread($file) {
		if(is_file($file)) {
			$fp = fopen($file, "r");
			$contents = fread($fp, filesize($file));
			fclose($fp);
		}
		return $contents;
	}

	// GD Image loading
	public static function GDImageLoad($filename)
	{
			$IsTrueColor = false;
		$Extension = null;

		if( !file_exists($filename) ) return false;

			$image_type = @exif_imagetype($filename);

			switch( $image_type ) {
			case IMAGETYPE_JPEG: // jpg
				$im = imagecreatefromjpeg($filename);
							$Extension = "jpg";
							break;
					case IMAGETYPE_GIF: // gif
							$im = imagecreatefromgif($filename);
							$Extension = "gif";
							break;
					case IMAGETYPE_PNG: // png
							$im = imagecreatefrompng($filename);
							$Extension = "png";
							break;
					default:
							break;
		}

			$IsTrueColor = @imageistruecolor($im);

			return Array($im,$IsTrueColor,$Extension);
	}

	// GD image resize
	public static function GDImageResize($src_file, $dst_file, $width = NULL, $height = NULL, $type = NULL, $quality = 75)
	{

		list($im,$IsTrueColor,$Extension) = GDImageLoad($src_file);

			if( !$im ) return false;

			$img_width = imagesx($im);
			$img_height = imagesy($im);

		if(!$width && !$height){
			$simg_width = $img_width;
			$simg_height = $img_height;
		}else if(!$width){
			$simg_width = intval($img_width * ($height/$img_height));
			$simg_height = $height;
		}else if(!$height){
			$simg_width = $width;
			$simg_height = intval($img_height * ($width/$img_width));
		}


			if( $IsTrueColor && $type != "gif" ) $im2 = imagecreatetruecolor($simg_width, $simg_height);
			else $im2 = imagecreate($simg_width, $simg_height);

			if( !$type ) $type = $Extension;

		imagecopyresampled($im2, $im, 0, 0, 0, 0, $simg_width, $simg_height, $img_width, $img_height);

			if( $type == "gif" ) {
			imagegif($im2, $dst_file);
			} else if ( $type == "jpg" || $type == "jpeg" ) {
					imagejpeg($im2, $dst_file, $quality);
			} else if ( $type == "png" ) {
					imagepng($im2, $dst_file);
			}

			imagedestroy($im);
			imagedestroy($im2);

			return true;
	}

	public static function DefYear($s,$e){
		
		$ret = array();

		for($i=$s;$i<=$e;$i++){
			$ret[$i] = $i;
		}

		return $ret;

	}

	public static function ConvertDataArray($data){
		
		$ret = array();

		$tmp = explode(",",$data);
		$tmpCnt = count($tmp);
		
		for($i=0;$i<$tmpCnt;$i++){
			$ret[$i] = iconv("shift-jis", "UTF-8",$tmp[$i]);
		}

		return $ret;

	}

}
