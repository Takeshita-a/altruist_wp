<?php
$temp_dir = get_template_directory();
include $temp_dir."/_lib/_inc.php";

$Err = array();

if($_POST['c_name'] == ""){
	$Err[] = "<font color=\"red\">お名前を入力してください。</font>";
}

if($_POST['c_mail'] == ""){
	$Err[] = "<font color=\"red\">メールアドレスを入力してください。</font>";
} else if (preg_match("/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i", $_POST['c_mail'])==0){
	$Err[] = "<font color=\"red\">メールアドレス(確認)を正しくご入力ください。</font>";
}

if($_POST['c_com'] == ""){
	$Err[] = "<font color=\"red\">会社名を入力してください。</font>";
}

if($_POST['c_tel'] == ""){
	$Err[] = "<font color=\"red\">電話番号を入力してください。</font>";
}

if($_POST['c_kind1'] == ""){
	$Err[] = "<font color=\"red\">お問い合わせ区分を選択してください。</font>";
}

if($_POST['c_body'] == ""){
	$Err[] = "<font color=\"red\">お問い合わせ内容を入力してください。</font>";
}

if( $Err ){
	$ErrNum = count($Err);
	if($ErrNum > 0){
		$msg = implode("<br />",$Err);
	}
}

$FormFlds = array();
foreach($_POST as $fld => $val) {
	if(preg_match("/^c_/", $fld)) {
			$FormFlds[] = "<input type=\"hidden\" name=\"".$fld."\" value=\"".htmlspecialchars($val)."\" >";
	}
}
$HiddenString = implode("\r\n",$FormFlds);

?>

<!-- google analytics ここから -->
<?php if(is_public_server()): ?>
<?php include $temp_dir."/_old_assets/_google_tag.php"; ?>
<?php endif; ?>
<!-- google analytics ここまで -->
<title>お問い合わせ | アルトリスト株式会社</title>
<meta name="Description" content="" />
<?php include $temp_dir."/_old_assets/_head.php"; ?>

</head>
<body>

<div id="style01" class="">
<?php include $temp_dir."/_old_assets/_header.php"; ?>
	<main>
		<div class="ul_title">
			<div class="title01">
				<h2 class="title01_01">お問い合わせ</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="<?=home_url() ?>">TOP</a>　＞　お問い合わせ</div>
		</div>
		<section class="res01">
			<div class="res01_box">
				<h3 class="res01_title01">お問い合わせフォーム</h3>
				<div class="res01_text01">
					ご入力内容をご確認くだき、ご送信ください。
					<p><span class="required">※</span>は必須項目です。</p>
				</div>

				<div class="contact_form">
<div class="msg001"><?=$msg?></div>

<script language="JavaScript">
<!--

function ReturnSubmit() {

	var f = document.RegForm;

	f.action = "<?=home_url('/contact/') ?>";
	f.submit();

}

-->
</script>
			<form name="RegForm" method="post" action="<?=home_url('/contact_send/') ?>" >
			<?=$HiddenString?>
						<dl class="res01_dl">
							<dt>お名前<span class="required">※</span></dt>
							<dd><?=htmlspecialchars($_POST['c_name'])?></dd>

							<dt>ふりがな</dt>
							<dd><?=htmlspecialchars($_POST['c_furi'])?></dd>

							<dt>Email<span class="required">※</span></dt>
							<dd><?=htmlspecialchars($_POST['c_mail'])?></dd>

							<dt>会社名<span class="required">※</span></dt>
							<dd><?=htmlspecialchars($_POST['c_com'])?></dd>

							<dt>都道府県</dt>
							<dd><?=$__Area[$_POST['c_area']]?></dd>

							<dt>区市町村からの住所</dt>
							<dd><?=htmlspecialchars($_POST['c_addr'])?></dd>

							<dt>電話番号<span class="required">※</span></dt>
							<dd><?=htmlspecialchars($_POST['c_tel'])?></dd>

							<dt>お問い合わせ区分<span class="required">※</span></dt>
							<dd><?=$__Kind1[$_POST['c_kind1']]?></dd>

							<dt>お問い合わせ内容<span class="required">※</span></dt>
							<dd><?=nl2br(htmlspecialchars($_POST['c_body']))?></dd>
						</dl>

						<div class="contact_button">
							<button class="contact_button_prev" type="button" onclick="javascript:ReturnSubmit();">戻る</button>
							<button class="contact_button_next" type="submit">送信する</button>
						</div>
					</form>
				</div>
				
			</div>
		</section>
<?php include $temp_dir."/_old_assets/_footer.php"; ?>
</div>

<?php include $temp_dir."/_old_assets/_js.php"; ?>
</body>
</html>