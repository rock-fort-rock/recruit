<?php
global $applyPage;
?>
<section class="container__sideSection">
	<a href="<?php echo $applyPage; ?>" target="_blank" class="button button--entry">
		<div class="button__inner"><em>Web応募する</em>簡単な入力情報で応募できます</div>
	</a>
</section>

<?php
	$sidebarBanner = get_field('bannersettion_sidebar', 'option');
	if($sidebarBanner):
?>
<section class="container__sideSection">
	<ul class="adBlock">
		<?php
		foreach($sidebarBanner as $value):
			$imgObj = $value['bannersettion_sidebar_image'];
			$img = $imgObj['sizes']['medium_large'];
		?>
		<li class="adBlock__item">
			<a href="<?php echo $value['bannersettion_sidebar_link']; ?>" target="_blank"><img src="<?php echo $img; ?>" class="adBlock__img"></a>
		</li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endif; ?>


<section class="container__sideSection">
	<div class="embedTwitterTimeline">
		<a class="twitter-timeline" data-lang="ja" data-height="380" href="<?php the_field('sitesetting_twitter', 'option'); ?>?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	</div>
</section>

<section class="container__sideSection">
	<div class="container__sideSectionTitle">企業コラム</div>
	<?php
	$args = array(
		'posts_per_page'   => 3,
		'post_type'        => 'column',
	);
	$columnPosts = get_posts( $args );
	?>
	<ul class="sideColumnList">
		<?php foreach($columnPosts as $value): ?>
		<?php
			$eyecatchSrc = getEyecatch($value->ID, 'medium');
		?>
		<li class="sideColumnList__item">
			<a href="<?php the_permalink($value->ID); ?>" class="sideColumnList__itemInner">
				<div class="sideColumnList__itemEyecatch" style="background-image:url('<?php echo $eyecatchSrc; ?>')"></div>
				<div class="sideColumnList__itemText">
					<div class="sideColumnList__itemDate"><?php echo get_the_time('Y.m.d', $value->ID); ?></div>
					<h2 class="sideColumnList__itemTitle"><?php echo get_the_title($value->ID); ?></h2>
				</div>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
</section>

<section class="container__sideSection container__sideSection--border">
	<?php
	$companyData = get_field('sitesetting_companyData', 'option');
	// print_r($companyData);
	?>
	<div class="container__sideSectionTitle--small">株式会社ミュゼプラチナム</div>
	<div class="companyData">
		<div class="genderRatio">
			<div class="companyData__title">年齢・男女比</div>
			<div class="genderRatio">
				<ul class="genderRatio__icon">
					<?php for($i=0; $i<10; $i++){
						if($i < $companyData['sitesetting_gender']/10){
							echo '<li class="genderRatio__iconItem genderRatio__iconItem--male"></li>';
						}else{
							echo '<li class="genderRatio__iconItem genderRatio__iconItem--female"></li>';
						}
					} ?>
				</ul>
				<div class="genderRatio__percent">
					<div class="genderRatio__percentNum genderRatio__percentNum--male" style="width: <?php echo $companyData['sitesetting_gender']; ?>%;">
						<strong><?php echo $companyData['sitesetting_gender']; ?></strong>%
					</div>
					<div class="genderRatio__percentNum genderRatio__percentNum--female">
						<strong><?php echo 100 - $companyData['sitesetting_gender']; ?></strong>%
					</div>
				</div>
			</div>

		</div>
		<div class="averageAge">
			<div class="averageAge__speechBubble">
				平均年齢<strong><?php echo $companyData['sitesetting_age']; ?></strong>歳
			</div>
		</div>

		<div class="extraData">
			<div class="companyData__title">女性社員の産休・育休取得率</div>
			<div class="extraData__number"><?php echo $companyData['sitesetting_maternityLeave']; ?>%</div>
			<div class="extraData__graph">
				<div class="extraData__graphBar" style="width: <?php echo $companyData['sitesetting_maternityLeave']; ?>%;"></div>
				<div class="extraData__graphLine">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</div>
			</div>
		</div>

		<div class="extraData">
			<div class="companyData__title">残業時間(月間)</div>
			<div class="extraData__number"><?php echo $companyData['sitesetting_overtime']; ?>h</div>
			<div class="extraData__graph">
				<div class="extraData__graphBar" style="width: <?php echo $companyData['sitesetting_overtime']; ?>%;"></div>
				<div class="extraData__graphLine">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</div>
			</div>
		</div>

		<div class="extraData">
			<div class="companyData__title">有給休暇消化率</div>
			<div class="extraData__number"><?php echo $companyData['sitesetting_paidHolidays']; ?>%</div>
			<div class="extraData__graph">
				<div class="extraData__graphBar" style="width: <?php echo $companyData['sitesetting_paidHolidays']; ?>%;"></div>
				<div class="extraData__graphLine">
					<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="container__sideSection container__sideSection--border">
	<div class="container__sideSectionTitle--small">企業情報</div>
	<?php the_field('sitesetting_companyInfo', 'option'); ?>
</section>

<section class="container__sideSection">
	<div class="container__sideSectionTitle">Q&Aデータ</div>
	<ul class="qaData">
		<li class="qaData__item">
			<div class="qaData__itemHeadline">
				<span class="qIcon">Q</span>全質問数
			</div>
			<div class="qaData__itemValue">
				<em><?php echo wp_count_posts('post')->publish; ?></em>件
			</div>
		</li>
		<li class="qaData__item">
			<div class="qaData__itemHeadline">
				<span class="Icon -clip"></span>全クリップ数
			</div>
			<div class="qaData__itemValue">
				<em><?php the_total_favorites_count(); ?></em>件
			</div>
		</li>
	</ul>
	<div class="searchForm">
		<div class="searchForm__inner">
			<div class="searchForm__text">
				Q&Aをキーワードを入力して検索する
			</div>
			<form action="/" method="get" class="searchForm__form" autocomplete="off">
				<input type="text" name="s" value="">
				<button>検索</button>
			</form>
		</div>
	</div>
</section>

<section class="container__sideSection">
	<div class="postQuestion">
		<div class="postQuestion__text">求人に関する問題は解決しましたか？<br>解決しなければこちらにお寄せ下さい</div>
		<a href="#" class="button button--coursor">
			<div class="button__inner">新たに質問する</div>
		</a>
	</div>
</section>

<section class="container__sideSection container__sideSection--wht">
	<div class="container__sideSectionTitle--small">タグクラウド</div>

	<?php
	$args = array(
		'orderby' => 'count',
		'order' => 'DESC',
		'number' => 10,
	);
	$tags = get_tags($args);
	// print_r($tags);
	?>
	<ul class="tagCloud">
	<?php foreach($tags as $value): ?>
		<li class="tagCloud__tag"><a href="<?php echo get_tag_link($value->term_id); ?>"><?php echo $value->name; ?></a></li>
	<?php endforeach; ?>
	</ul>
</section>
