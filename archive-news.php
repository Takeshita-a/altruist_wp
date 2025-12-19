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
<meta name="Description" content="冷熱機器からマテリアルハンドリングまでアルトリストは総合エンジニアリングカンパニーです。" />
<?php include $temp_dir."/_old_assets/_head.php"; ?>

<!--ogp-->
<meta property="og:title" content="News">
<meta property="og:type" content="website">
<meta property="og:description" content="アルトリスト株式会社からのお知らせです。"/>
<meta property="og:url" content="https://www.altruist.co.jp/news.php"/>
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
				<h2 class="title01_01">News</h2>
			</div>
		</div>
		<div class="pankuzu_wrap">
			<div class="pankuzu"><a href="<?=home_url() ?>">TOP</a>　＞　News</div>
		</div>

		<section class="pro_sec01">
				<div class="is01_box">
					<!-- ul class="is01_tab_button">
						<li><button class="active" type="">すべて</button></li>
						<li><button type="">お知らせ</button></li>
						<li><button type="">イベント</button></li>
						<li><button type="">メディア</button></li>
						<li><button type="">IR</button></li>
					</ul -->
					<?php if(have_posts()): ?>
						<ul class="is01_news">
							<?php while(have_posts()) : the_post(); ?>
								<?php
									$post_id = get_the_ID();
									$news_title = get_news_title($post_id);
									$news_term_name = get_news_term_name($post_id);
								?>
								<li>
									<div class="is01_news_date"><?=get_the_date('Y年m月d日'); ?></div>
									<div class="is01_news_category"><span><?=$news_term_name; ?></span></div>
									<div class="is01_news_title">
										<?=$news_title;?>
									</div>
								</li>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					<?php else: ?>
						<p style="text-align: center;">準備中です</p>
					<?php endif; ?>
				</div>
		</section>
<?php include $temp_dir."/_old_assets/_footer.php"; ?>
</div>

<?php include $temp_dir."/_old_assets/_js.php"; ?>

<?php include $temp_dir."/_old_assets/_cookie.php"; ?>
</body>
</html>