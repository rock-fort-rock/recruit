<?php
	global $officialSite;
?>

		<div class="container__side">
			<?php get_sidebar(); ?>
		</div>
	</div><!--/container-->

	<footer class="globalFooter">
	<div class="globalFooter__inner">
		<ul class="globalFooter__nav">
				<li class="globalFooter__navItem">
					<a href="<?php echo $officialSite; ?>" target="_blank">コーポレートサイト</a>
				</li>
				<li class="globalFooter__navItem">
					<a href="/privacy/">プライバシーポリシー</a>
				</li>

		</ul>
		<div class="globalFooter__copyright">
			&copy; MUSEE PLATINUM All Rights Reserved.
		</div>
	</div>
</footer>

	<div class="onlySmall">
	<div class="spFooter">
		<div class="spFooter__navi">
			<ul class="siteLinks">
				<li class="siteLinks__item siteLinks__item--narrow">
					<a href="/" class="siteLinks__itemInner"><span class="Icon -home"></span>TOP</a>
				</li>
				<li class="siteLinks__item siteLinks__item--wide">
					<a href="/clipped/" class="siteLinks__itemInner"><span class="Icon -clip"></span>クリップした質問</a>
				</li>
				<li class="siteLinks__item">
					<a href="/question/" class="siteLinks__itemInner"><span class="Icon -question"></span>質問をする</a>
				</li>
				<li class="siteLinks__item">
					<a href="<?php echo $officialSite; ?>" target="_blank" class="siteLinks__itemInner"><span class="Icon -star"></span>公式サイト</a>
				</li>
				<li class="siteLinks__item">
					<span class="siteLinks__itemInner siteLinks__itemInner--search"><span class="Icon -search"></span>検索する</span>
				</li>
			</ul>
		</div>
		<div class="spFooter__search">
			<div class="keywordSearch">
				<form action="/" method="get" class="keywordSearch__form" autocomplete="off">
					<span class="Icon -search"></span>
					<input type="text" name="s" value="" class="keywordSearch__input" placeholder="求人に関するキーワード">
				</form>
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
