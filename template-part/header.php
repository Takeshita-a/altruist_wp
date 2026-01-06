<?php $img_path = get_img_path(); ?>
<header class="site-header" id="site-header">
	<div class="sh-bar">
		<a href="<?= home_url() ?>" class="sh-bar-logo">
			<img src="<?= $img_path?>/altruist-logo.svg" alt="Altruist">
		</a>
		<div class="sh-bar-btn" id="sh-bar-btn">
			<div class="sh-bar-btn-inner">
				<span class="line top"></span>
				<span class="line med"></span>
				<span class="line btm"></span>
			</div>
		</div>
	</div>
	<div class="sh-pc-main">
		<div class="sh-pc-main-inner">
			<div class="sh-pc-main-nav">
				<?= get_site_header_nav_html(); ?>
			</div>
			<a href="<?= home_url('/contact/') ?>" class="contact">				
				<p class="contact-txt">
					<i class="contact-icon"></i>
					お問い合わせ
				</p>
			</a>
		</div>
	</div>

	<!-- hover item -->
	<div class="sh-pc-hover">
		<div class="sh-pc-hover-item company" data-sh-target="company">
			<div class="sh-pc-submenu">
				<div class="sh-pc-submenu-header">
					<p class="en">COMPANY INFORMATION</p>
					<p class="ja">企業情報</p>
					<a href="<?= home_url('/company/') ?>" class="link circle-arrow"></a>
				</div>
				<div class="sh-pc-submenu-main">
					企業情報<br>
					企業情報<br>
					企業情報<br>
					企業情報<br>
					企業情報<br>
					企業情報<br>
				</div>
			</div>
		</div>
	</div>
	<!-- //hover item -->

	<div class="sh-sp-main" id="sh-sp-main">
		<div class="sh-sp-main-inner">
			<div class="sh-sp-main-nav">
				<?= get_site_header_nav_html(true); ?>
			</div>
			<a href="<?= home_url('/contact/') ?>" class="common-btn contact-btn">
				<p class="common-btn-txt">お問い合わせ</p>
				<i class="common-btn-arrow"></i>
			</a>
			<div class="sh-sp-main-footer">
				<a href="<?= get_youtube_link(); ?>" class="youtube" target="_blank" rel="noopener noreferrer">
					<img src="<?= $img_path ?>/icon-youtube.svg" alt="Altruist Youtube Channel">
				</a>
				<a href="<?= home_url('/terms/') ?>" class="page-link">サイト利用規約</a>
				<a href="<?= home_url('/privacy/') ?>" class="page-link">プライバシーポリシー</a>
				<p class="copyright">Altruist Co., Ltd. All Rights Reserved.</p>
			</div>
		</div>
	</div>
</header>