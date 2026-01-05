<?php $img_path = get_img_path(); ?>
<header class="site-header">
	<div class="sh-bar">
		<a href="<?= home_url() ?>" class="sh-bar-logo">
			<img src="<?= $img_path?>/altruist-logo.svg" alt="Altruist">
		</a>
		<div class="sh-bar-btn">
			<div class="sh-bar-btn-inner">
				<span class="line top"></span>
				<span class="line med"></span>
				<span class="line btm"></span>
			</div>
		</div>
	</div>
	<div class="sh-main">
		<div class="sh-main-inner">
			<div class="sh-main-nav">
				<a href="<?= home_url() ?>" class="sh-main-nav-item"><p>TOP</p></a>
				<?php 
					$nav_list = get_nav_list();
					foreach($nav_list as $item):
						$href = '';
						$external = '';
						$class = '';
						if(isset($item['link'])){
							$href = $item['link'];
							$external = 'target="_blank" rel="noopener noreferrer"';
							$class = 'external';
						}else{
							$href = home_url('/'.$item['id'].'/');
						}
				?>
				<a href="<?= $href; ?>" class="sh-main-nav-item <?= $class ?>" <?= $external?> data-sh-item="<?= $item['id'] ?>"><p><?= $item['ja'] ?></p></a>
				<?php endforeach; ?>
			</div>
			<a href="<?= home_url('/contact/') ?>" class="contact">				
				<p class="contact-txt">
					<i class="contact-icon"></i>
					お問い合わせ
				</p>
			</a>
		</div>
	</div>
</header>