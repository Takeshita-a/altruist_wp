<?php
include "./_lib/_inc.php";

if( $_POST['c_kind1'] == ""){
	$_POST['c_kind1'] = "1";
}

?>

<!-- google analytics ここから -->
<?php include "./_google_tag.php"; ?>
<!-- google analytics ここまで -->
<title>お問い合わせ | アルトリスト株式会社</title>
<meta name="keywords" content="アルトリスト, お問い合わせ, ステンレス排水溝, 食品, 飲料, 工場, 食品工場, 飲料工場, 包装, マテハン, 設備, 排水溝, 集水, ロボット, 相模原技術センター" />
<meta name="Description" content="私たちと共に、食の安全安心を、先端技術で支えませんか？冷熱機器からマテリアルハンドリングまでアルトリストは総合エンジニアリングカンパニーです。" />

<?php include "./_head.php"; ?>

<!--ogp-->
<meta property="og:title" content="お問い合わせ">
<meta property="og:type" content="website">
<meta property="og:description" content="お問い合わせはこちらから"/>
<meta property="og:url" content="https://www.altruist.co.jp/contact.php"/>
<meta property="og:image" content="https://www.altruist.co.jp/img/ogp_Altruist_2025.png">
<meta property="og:site_name" content="アルトリスト株式会社"/>
<!--ogp-->

</head>
<body>

<div id="style01" class="">
<?php include "./_header.php"; ?>
	<main>
		<div class="ul_title">
			<div class="title01">
				<h2 class="title01_01">お問い合わせ</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="./">TOP</a>　＞　お問い合わせ</div>
		</div>
		<section class="res01">
			<div class="res01_box">
				<h3 class="res01_title01">お問い合わせフォーム</h3>
				<div class="res01_text01">
					必要事項をご記入いただき、「送信内容を確認する」を押下してください。
					<p><span class="required">※</span>は必須項目です。</p>
				</div>

				<div class="contact_form">
					<form name="RegForm" method="post" action="./contact_conf.php">
						<dl class="res01_dl">
							<dt>お名前<span class="required">※</span></dt>
							<dd><input type="text" name="c_name" value="<?=htmlspecialchars($_POST['c_name'])?>" class="contact_text_form" required /></dd>

							<dt>ふりがな</dt>
							<dd><input type="text" name="c_furi" value="<?=htmlspecialchars($_POST['c_furi'])?>" class="contact_text_form" /></dd>

							<dt>Email<span class="required">※</span></dt>
							<dd><input type="email" name="c_mail" value="<?=htmlspecialchars($_POST['c_mail'])?>" class="contact_text_form" required /></dd>

							<dt>会社名<span class="required">※</span></dt>
							<dd><input type="text" name="c_com" value="<?=htmlspecialchars($_POST['c_com'])?>" class="contact_text_form" required /></dd>

							<dt>都道府県</dt>
							<dd>
								<select name="c_area" class="contact_text_form">
									<option value="">--都道府県---</option>
									<?=selectbox($__Area, $_POST['c_area'], true)?>
								</select>
							</dd>

							<dt>区市町村からの住所</dt>
							<dd><input type="text" name="c_addr" value="<?=htmlspecialchars($_POST['c_addr'])?>" class="contact_text_form" /></dd>

							<dt>電話番号<span class="required">※</span></dt>
							<dd><input type="tel" name="c_tel" value="<?=htmlspecialchars($_POST['c_tel'])?>" class="contact_text_form" required /></dd>

							<dt>お問い合わせ区分<span class="required">※</span></dt>
							<dd>
								<ul class="contact_checklist">
									<li>
										<label class="contact_check_label">
											<input type="radio" name="c_kind1" value="1" <?=checked($_POST['c_kind1'],"1")?> />
											<div class="contact_check_circle"></div>
											<div class="contact_check_text">プラント・ラインエンジニアリング、ロボット全般についてのご相談</div>
										</label>
									</li>
									<li>
										<label class="contact_check_label">
											<input type="radio" name="c_kind1" value="2" <?=checked($_POST['c_kind1'],"2")?> />
											<div class="contact_check_circle"></div>
											<div class="contact_check_text">採用について</div>
										</label>
									</li>
									<li>
										<label class="contact_check_label">
											<input type="radio" name="c_kind1" value="3" <?=checked($_POST['c_kind1'],"3")?> />
											<div class="contact_check_circle"></div>
											<div class="contact_check_text">その他</div>
										</label>
									</li>
								</ul>
							</dd>

							<dt>お問い合わせ内容<span class="required">※</span></dt>
							<dd><textarea name="c_body" class="contact_text_form" required ><?=htmlspecialchars($_POST['c_body'])?></textarea></dd>
						</dl>
						<div class="contact_policy">当社のプライバシーポリシーは<a href="./privacy.php" target="_blank">こちら</a></div>
						<div class="contact_button">
							<!--<button class="contact_button_prev" type="button" onclick="javascript:ReturnSubmit();">戻る</button>-->
							<button class="contact_button_next" type="submit">確認する</button>
						</div>
					</form>
				</div>
				
			</div>
		</section>
<?php include "./_footer.php"; ?>
</div>

<?php include "./_js.php"; ?>

<?php include "./_cookie.php"; ?>
</body>
</html>