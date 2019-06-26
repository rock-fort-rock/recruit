<?php get_header(); ?>

<div class="ContentsHeaderPrimary -case">
	<div class="ContentsHeaderPrimary__Inner">
		<h1 class="ContentsHeaderPrimary__Title">
			リフォーム・リノベーションの成功事例
		</h1>
		<div class="ContentsHeaderPrimary__Lead">
			テキストテキストテキストテキストテキスト<br>
			テキストテキストテキストテキストテキスト
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
			リフォーム・リノベーションの成功事例
		</li>
	</ul>
</div>


<div class="CaseCategories">
	<div class="CaseCategories__Inner">
		<ul class="CaseCategories__List">
			<li>
				<a href="/case/casecat/package/">
					<span class="CaseCategories__LabelEn">
						PARFAIT REVOVATION
					</span>
					<span class="CaseCategories__Label">
						パッケージプラン
					</span>
				</a>
			</li>
			<li>
				<a href="/case/casecat/um/">
					<span class="CaseCategories__LabelEn">
						RESTORATION
					</span>
					<span class="CaseCategories__Label">
						UMブランド原状回復工事
					</span>
				</a>
			</li>
			<li>
				<a href="/case/casecat/others/">
					<span class="CaseCategories__LabelEn">
						SUCCESS CASE
					</span>
					<span class="CaseCategories__Label">
						その他の成功事例
					</span>
				</a>
			</li>
		</ul>
	</div>
</div>


<?php if(have_posts()): ?>
<div class="CaseList">
	<?php while(have_posts()): the_post(); ?>
	<?php
		$eyecatchId = get_post_thumbnail_id();
		$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
		$eyecatchSrc = $eyecatch[0];
	?>
	<div class="CaseList__Item">
		<a href="<?php the_permalink(); ?>">
			<div class="CaseList__ItemTitle">
				<?php
				$raw_title = strip_tags(get_the_title());
				$num = 30;
				echo mb_substr($raw_title, 0, $num);
				?>
			</div>
			<div class="CaseList__ItemLead">
				<?php the_field('case_building'); ?>
			</div>
			<div
				class="CaseList__ItemImage lazyload"
				data-bg="<?php echo $eyecatchSrc; ?>"
			></div>
			<?php if( have_rows('case_summary') ): ?>
			<ul class="CaseList__ItemData">
				<?php while (have_rows('case_summary')): the_row(); ?>
				<li>
					<div class="CaseList__ItemDataLabel">
						<?php the_sub_field('case_summary_item'); ?>
					</div>
					<div class="CaseList__ItemDataValue">
						<?php the_sub_field('case_summary_content'); ?>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</a>
	</div>
	<?php endwhile; ?>

</div>
<?php endif; ?>

<?php if($wp_query->max_num_pages > 1): ?>
<div class="Pagination">
	<?php if(get_query_var( 'paged' ) > 1): ?>
		<a class="Pagination__First" href="/case/"></a>
	<?php endif; ?>
	<?php the_posts_pagination( array(
		'screen_reader_text' => ' ',
		'mid_size' => 2,
		'prev_text' => __( '' ),
		'next_text' => __( '' ),
	) ); ?>
	<?php if($wp_query->max_num_pages != get_query_var( 'paged' )): ?>
		<a class="Pagination__Last" href="/case/page/<?php echo $wp_query->max_num_pages; ?>/"></a>
	<?php endif; ?>
</div>
<?php endif; ?>


<?php get_footer(); ?>
