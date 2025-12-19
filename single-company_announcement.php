<?php 
	$temp_dir = get_template_directory();
?>
<!DOCTYPE html> 
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php my_page_title(); ?></title>
<meta name="keywords" content="<?php echo get_field('keywords'); ?>" />
<meta name="Description" content="<?php echo get_field('description'); ?>" />
<?php include $temp_dir."/_old_assets/_head.php"; ?>

<!--ogp-->
<meta property="og:title" content="<?php the_title(); ?> | アルトリスト株式会社">
<meta property="og:type" content="article">
<meta property="og:description" content="私たちと共に、食の安全安心を、先端技術で支えませんか？冷熱機器からマテリアルハンドリングまでアルトリストは総合エンジニアリングカンパニーです。"/>
<meta property="og:url" content="https://www.altruist.co.jp/news_detail20250611.php"/>
<meta property="og:image" content="https://www.altruist.co.jp/img/ogp_Altruist_2025.png">
<meta property="og:site_name" content="アルトリスト株式会社"/>
<!--ogp-->

</head>
<body>

<div id="style01" class="">
<?php include $temp_dir."/_old_assets/_header.php"; ?>
	<main>
		<div class="ul_title">
			<div class="title01">
				<h2 class="title01_01">電子公告</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="<?=home_url() ?>">TOP</a>　＞　<a href="<?=home_url('/company_announcement/') ?>">News</a>　＞　<?php the_title(); ?></div>
		</div>

		<?php
			$post_id = get_the_ID();
		?>

		<section class="pro_sec01">

		</section>
<?php include $temp_dir."/_old_assets/_footer.php"; ?>
</div>

<?php include $temp_dir."/_old_assets/_js.php"; ?>

<?php include $temp_dir."/_old_assets/_cookie.php"; ?>
</body>
</html>