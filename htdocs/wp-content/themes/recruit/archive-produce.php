<?php get_header(); ?>

<div class="ContentsHeaderPrimary -produce">
	<div class="ContentsHeaderPrimary__Inner">
		<h1 class="ContentsHeaderPrimary__Title">
			新築企画プロデュース
		</h1>
		<div class="ContentsHeaderPrimary__Lead">
			市場リサーチや集客マーケティング、<br>
			建物コンセプトから収益プランまで<br>
			オーナー様の新築物件をトータルプロデュース
		</div>
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
			新築企画プロデュース
		</li>
	</ul>
</div>


<div class="ContentsLead">
	<p>
		当社ではオーナー様から新築物件の管理をご相談いただいたとき、次に掲げる項目のお手伝いをすることができます。
	</p>
</div>


<div class="FeatureIconList">
	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -research"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			マーケティング調査
		</div>
		<div class="FeatureIconList__ItemText">
			入居者様のターゲットを絞込み、それに基づく間取り（専有面積）決定するためのマーケティング調査を行います。
		</div>
	</div>

	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -roomplan"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			プランの策定
		</div>
		<div class="FeatureIconList__ItemText">
			間取りや設備等のプランづくりをお手伝いします。
		</div>
	</div>

	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -edit"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			ネーミング・コピー作成
		</div>
		<div class="FeatureIconList__ItemText">
			建物のネーミングやコンセプト、キャッチコピーなどの考案をお手伝いします。
		</div>
	</div>

	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -reduction"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			コスト削減
		</div>
		<div class="FeatureIconList__ItemText">
			賃料には反映しないと思われる設備の導入を見送るなど助言します。
		</div>
	</div>

	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -loudspeaker"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			入居者募集サポート
		</div>
		<div class="FeatureIconList__ItemText">
			より高く、より早く成約させるためのアイディアを提供させていただきます。
		</div>
	</div>

	<div class="FeatureIconList__Item">
		<div class="FeatureIconList__ItemIcon">
			<span class="Icon -cost"></span>
		</div>
		<div class="FeatureIconList__ItemLabel">
			収支計画の設定
		</div>
		<div class="FeatureIconList__ItemText">
			賃料には反映しないと思われる設備の導入を見送るなど、無駄なコストを削減できるよう助言します。
		</div>
	</div>

</div>

<div class="PrimarySectionHeader">
	<div class="PrimarySectionHeader__Inner">
		<h2 class="PrimarySectionHeader__Heading">
			新築プロデュース物件一覧
		</h2>
	</div>
</div>

<?php if(have_posts()): ?>
<div class="PropertyList">
	<?php while(have_posts()): the_post(); ?>
	<?php
		$eyecatchId = get_post_thumbnail_id();
		$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
		$eyecatchSrc = $eyecatch[0];
	?>
	<div class="PropertyList__Item">
		<a href="<?php the_field('produce_url'); ?>" target="_blank">
			<div
				class="PropertyList__ItemImage lazyload"
				data-bg="<?php echo $eyecatchSrc; ?>"
			></div>
			<div class="PropertyList__ItemText">
				<div class="PropertyList__ItemLabel">
					<?php the_title(); ?>
				</div>
				<p>
					<?php the_field('produce_copy'); ?>
				</p>
				<?php if( have_rows('produce_summary') ): ?>
				<div class="PropertyList__ItemData">
					<ul>
						<?php while (have_rows('produce_summary')): the_row(); ?>
						<li>
							<div class="PropertyList__ItemDataLabel">
								<?php the_sub_field('produce_summary_item'); ?>
							</div>
							<div class="PropertyList__ItemDataValue">
								<?php the_sub_field('produce_summary_content'); ?>
							</div>
						</li>
						<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</a>
	</div>
	<?php endwhile; ?>

</div>
<?php endif; ?>

<?php if($wp_query->max_num_pages > 1): ?>
<div class="Pagination">
	<?php if(get_query_var( 'paged' ) > 1): ?>
		<a class="Pagination__First" href="/produce/"></a>
	<?php endif; ?>
	<?php the_posts_pagination( array(
		'screen_reader_text' => ' ',
		'mid_size' => 2,
		'prev_text' => __( '' ),
		'next_text' => __( '' ),
	) ); ?>
	<?php if($wp_query->max_num_pages != get_query_var( 'paged' )): ?>
		<a class="Pagination__Last" href="/produce/page/<?php echo $wp_query->max_num_pages; ?>/"></a>
	<?php endif; ?>
</div>
<?php endif; ?>


<?php get_footer(); ?>
