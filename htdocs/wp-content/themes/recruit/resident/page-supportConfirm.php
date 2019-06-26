<?php
/*
Template Name: ご入居者様へ - 設備不具合お問い合わせ - 確認
*/
?>
<?php get_header(); ?>

<div class="ContentsHeader -residentSupport">
	<div class="ContentsHeader__Inner">
		<div class="ContentsHeader__Category">
			ご入居者様へ
		</div>
		<h1 class="ContentsHeader__Title">
			設備不具合<br class="-ignoreLargeScreen">お問い合わせ
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
			<a href="../">
				ご入居者様へ
			</a>
		</li>
		<li>
			設備不具合お問い合わせ
		</li>
	</ul>
</div>


<div class="ResidentSupportIntro">
	<div class="ResidentSupportIntro__Lead">
		当社管理物件にお住いの方が設備不具合について、ご連絡をいただく場合にご利用いただけます。
	</div>
	<ul class="ResidentSupportIntro__NoticeList">
		<li>
			※順次ご対応をさせていただきますが、緊急の場合は、上記番号までお電話でのご連絡をお願いいたします。
		</li>
		<li>
			※設備不具合状況により、弊社協力会社からご連絡をさせていただく場合があります。予めご了承をお願いいたします。
		</li>
		<li>
			※不具合状況などにより、お問い合わせいただいた後に、不具合箇所等を写真で撮影いただきメールでの送信をお願いする場合があります。ご協力をいただける場合には、修理期間の短縮ができる場合がありますので、ご理解をお願いいたします。
		</li>
	</ul>
</div>


<div class="UserProgress">
	<ol>
		<li>
			入力
		</li>
		<li class="-current">
			内容の確認
		</li>
		<li>
			完了
		</li>
	</ol>
</div>

<?php the_post(); the_content(); ?>

<?php get_footer(); ?>
