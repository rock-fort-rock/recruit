<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>

<div class="ContentsHeader -contact">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			総合お問い合わせ
		</h1>
	</div>
</div>


<div class="Breadcrumbs">
	<ul>
		<li>
			<a href="/">
				<span class="Icon -home"></span>
			</a>
		</li>
		<li>
			総合お問い合わせ
		</li>
	</ul>
</div>


<div class="ResidentSupportIntro">
	<div class="ResidentSupportIntro__Lead">
		当社管理業務について、ご連絡をいただく場合にご利用いただけます。
	</div>
</div>


<div class="UserProgress">
	<ol>
		<li class="-current">
			入力
		</li>
		<li>
			内容の確認
		</li>
		<li>
			完了
		</li>
	</ol>
</div>

<?php the_post(); the_content(); ?>


<?php get_footer(); ?>
