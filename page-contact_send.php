<?php
include get_template_directory()."/_lib/_inc.php";

if( $_POST['c_mail'] == "" || $_POST['c_name'] == "" ){
	My_Js_Action::alerttomove("エラーが発生したためトップページに戻ります。",home_url());
	exit;
}

$dev_mode_mail_setting = true;//開発用 ↔ 本番用アドレス切り替え

if($dev_mode_mail_setting){
	$DefaultMail = "a.takeshita@felixjapan.net";
	$DefaultMail2 = "a.takeshita@felixjapan.net";
}else{
	$DefaultMail = "info@altruist.co.jp";
	$DefaultMail2 = "altruist-prom@promettre.jp";
	//$DefaultMail2 = "y@promettre.jp";
}
$DefaultName = "アルトリスト";

		// ###### Admin mail ############
		$ToName = $DefaultName;
		$To = $DefaultMail;

		$Subject = "[".$__Kind1Txt[htmlspecialchars($_POST['c_kind1'])]."]　".htmlspecialchars($_POST['c_name'])."様からお問い合わせがありました。";

		$Body = "";
		$Body .= "お名前：".htmlspecialchars($_POST['c_name'])."\r\n\r\n";
		$Body .= "ふりがな：".htmlspecialchars($_POST['c_furi'])."\r\n\r\n";
		$Body .= "メールアドレス：".htmlspecialchars($_POST['c_mail'])."\r\n\r\n";
		$Body .= "会社名：".htmlspecialchars($_POST['c_com'])."\r\n\r\n";
		$Body .= "都道府県：".$__Area[htmlspecialchars($_POST['c_area'])]."\r\n\r\n";
		$Body .= "区市町村からの住所：".htmlspecialchars($_POST['c_addr'])."\r\n\r\n";
		$Body .= "電話番号：".htmlspecialchars($_POST['c_tel'])."\r\n\r\n";
		$Body .= "お問い合わせ区分：".$__Kind1[htmlspecialchars($_POST['c_kind1'])]."\r\n\r\n";	
		$Body .= "お問い合わせ内容：\r\n".htmlspecialchars($_POST['c_body'])."\r\n\r\n";
			

		$From = $_POST['c_mail'];
		$FromName = $_POST['c_name'];
//		send_html_mail_utf( $ToName, $To, $Subject, $Body, $From, $FromName );
		My_Utility::send_html_mail_utf( $ToName, $DefaultMail2, $Subject, $Body, $From, $FromName );
		// ###### Admin mail ############

		// ###### User Thank you mail ############
		$ToName2 = $FromName."様";
		$To2 = $From;

		$Subject2 = "お問い合わせいただき、ありがとうございます。";

		$Body2 = "このメールは自動送信でお送りしています。\r\n\r\n";
		$Body2 .= "この度は".$DefaultName."へのお問い合わせありがとうございます。\r\n";
		$Body2 .= "追って担当者よりご連絡させて頂きます。\r\n";
		$Body2 .= "よろしくお願いします。\r\n";
		$Body2 .= "	---------------------------------------------------\r\n";
		$Body2 .= "\r\n";
		$Body2 .= "送信内容のご確認\r\n";
		$Body2 .= "\r\n";
		$Body2 .= $Body;
		$Body2 .= "\r\n";
		$Body2 .= "----------------------------------------------------\r\n";
		$Body2 .= "	\r\n";
		$Body2 .= "	アルトリスト株式会社\r\n";
		$Body2 .= "	電話：042-444-2477\r\n";
		$Body2 .= "	Mail：info@altruist.co.jp\r\n";
		$Body2 .= "	HP: https://www.altruist.co.jp\r\n";
		$Body2 .= "\r\n";
		$Body2 .= "----------------------------------------------------\r\n";

		$From2 = $DefaultMail;
		$FromName2 = $DefaultName;
		My_Utility::send_html_mail_utf( $ToName2, $To2, $Subject2, $Body2, $From2, $FromName2 );
		// ###### User Thank you mail ############


My_Js_Action::tomove(home_url("/contact_done/"));

?>