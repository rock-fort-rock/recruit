<?php
/*
Template Name: 会社情報 - ご挨拶
*/
?>
<?php get_header(); ?>

<div class="ContentsHeader -companyMessage">
	<div class="ContentsHeader__Inner">
		<div class="ContentsHeader__Category">
			会社情報
		</div>
		<h1 class="ContentsHeader__Title">
			ご挨拶
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
				会社情報
			</a>
		</li>
		<li>
			ご挨拶
		</li>
	</ul>
</div>


<div class="ExecutiveMessage">
	<div class="ExecutiveMessage__Text">
		<p>
			テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキスト<br>
			テキスト
		</p>
		<p>
			テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキスト<br>
			テキスト
		</p>
		<p class="ExecutiveMessage__Signature">
			<span class="ExecutiveMessage__SignatureTitle">
				代表取締役
			</span>
			<span class="ExecutiveMessage__SignatureName">
				山口 章夫
			</span>
		</p>
	</div>
	<div class="ExecutiveMessage__Image">
		<picture>
			<source srcset="/assets/img/CompanyMessage/img_01s.jpg" media="(max-width: 850px)">
			<img
				src="/assets/img/CompanyMessage/img_01.jpg"
				alt=""
			>
		</picture>
	</div>
</div>

<?php get_footer(); ?>
