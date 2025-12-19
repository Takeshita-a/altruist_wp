<?php 
	$temp_dir_uri = get_template_directory_uri();
	$temp_dir = get_template_directory();
?>
<!DOCTYPE html> 
<html lang="ja">
<head>
<!-- google analytics ここから -->
<?php if(is_public_server()): ?>
<?php include $temp_dir."/_old_assets/_google_tag.php"; ?>
<?php endif; ?>
<!-- google analytics ここまで -->

<meta charset="UTF-8">
<title><?php my_page_title(); ?></title>
<meta name="keywords" content="アルトリスト, 電子公告, 企業情報, ステンレス排水溝, 食品, 飲料, 工場, 食品工場, 飲料工場, 包装, マテハン, 設備, 排水溝, 集水, ロボット, 相模原技術センター" />
<meta name="Description" content="冷熱機器からマテリアルハンドリングまでアルトリストは総合エンジニアリングカンパニーです。" />

<?php include $temp_dir."/_old_assets/_head.php"; ?>

<!--ogp-->
<meta property="og:title" content="電子公告 | 企業情報">
<meta property="og:type" content="website">
<meta property="og:description" content="アルトリスト株式会社の電子公告です。"/>
<meta property="og:url" content="https://www.altruist.co.jp/company_announcement.php"/>
<meta property="og:image" content="https://www.altruist.co.jp/img/ogp_Altruist_2025.png">
<meta property="og:site_name" content="アルトリスト株式会社"/>
<!--ogp-->

</head>
<body>

<div id="style01" class="h_rec">
<?php include $temp_dir."/_old_assets/_header.php"; ?>
	<main>
		<div class="ul_title">
			<div class="title01">
				<h2 class="title01_01">電子公告</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="<?=home_url() ?>">TOP</a>　＞　<a href="<?=home_url('/company/') ?>">企業情報</a>　＞　電子公告</div>
		</div>
		<section class="res01">
			<div class="res01_box">
				<h3 class="res01_title01">2025年</h3>
				<ol class="res01_ol05">
					<li>現在、公告事項はございません。</li>
				</ol>
			</div>
		</section>
<?php include $temp_dir."/_old_assets/_footer.php"; ?>
</div>

<?php include $temp_dir."/_old_assets/_js.php"; ?>

<?php include $temp_dir."/_old_assets/_cookie.php"; ?>
</body>
</html>