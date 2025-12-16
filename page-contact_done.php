<!DOCTYPE html> 
<html lang="ja">
<head>

<!-- google analytics ここから -->
<?php if(is_public_server()): ?>
<?php include get_template_directory()."/_old_assets/_google_tag.php"; ?>
<?php endif; ?>
<!-- google analytics ここまで -->
</head>

<meta charset="UTF-8">
<title>お問い合わせ | アルトリスト株式会社</title>
<meta name="Description" content="" />
<?php include get_template_directory()."/_old_assets/_head.php"; ?>

<body>

<div id="style01" class="">
<?php include get_template_directory()."/_old_assets/_header.php"; ?>
	<main>
		<div class="ul_title">
			<div class="title01">
				<h2 class="title01_01">お問い合わせ</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="<?php echo home_url(); ?>">TOP</a>　＞　お問い合わせ</div>
		</div>
		<section class="res01">
			<div class="res01_box">
				<h3 class="res01_title01">お問い合わせフォーム</h3>
				<div class="res01_text01">
					お問合せいただき、誠にありがとうございました。<br />
					担当者からご回答いたします。<br /><br />
					※お申し込みの返信は、月〜金9時から17時まで。土日、祝日はお休みとなります。
				</div>
			</div>
		</section>
<?php include get_template_directory()."/_old_assets/_footer.php"; ?>
</div>

<?php include get_template_directory()."/_old_assets/_js.php"; ?>
</body>
</html>