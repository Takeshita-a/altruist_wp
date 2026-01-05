<?php
	get_header();
	$img_path = get_img_path();
?>

<main>

<section class="mv">
	<img src="<?=$img_path?>/dummy/dummy-mv.png" alt="">
</section>
<!-- //MV -->


<section class="news">
	<div class="container">
		<div class="common-ttl">
			<h2 class="common-ttl-en">NEWS</h2>
			<p class="common-ttl-ja">ニュース</p>
		</div>
		<a href="" class="common-btn news-btn">
			<p class="common-btn-txt">ニュース一覧</p>
			<i class="common-btn-arrow"></i>
		</a>
	</div>
</section>
<!-- //NEWS -->

<section class="about_us">
	<div class="container">
		<div class="common-ttl v2">
			<h2 class="common-ttl-en">ABOUT US</h2>
			<p class="common-ttl-ja">アルトリストについて</p>
		</div>
	</div>
</section>
<!-- //ABOUT US -->

<section class="business">

</section>
<!-- //BUSINESS -->

<section class="contact">

</section>
<!-- //CONTACT -->

</main>

<?php get_footer(); ?>