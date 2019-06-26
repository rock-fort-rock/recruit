<?php get_header(); ?>

<div class="ContentsHeader -ownerReport">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			オーナー通信
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
			<a href="/owner/">
				UMの賃貸管理
			</a>
		</li>
		<li>
			<a href="/report/">
				オーナー通信
			</a>
		</li>
		<li>
			<?php the_title(); ?>
		</li>
	</ul>
</div>


<div class="OwnersReport">
	<div class="OwnersReport__Header">
		<div class="OwnersReport__Name">
			<?php the_title(); ?>
		</div>
		<div class="OwnersReport__Date">
			<?php the_field('report_date'); ?>発行
		</div>
		<div class="OwnersReport__File">
			<a href="<?php echo get_field('report_pdf')['url']; ?>" target="_blank">
				PDF版はこちらから
				<span class="Icon -pdf"></span>
			</a>
		</div>
		<div class="OwnersReport__Title">
			<?php the_field('report_title'); ?>
		</div>
	</div>

	<div class="OwnersReport__Body">
			<?php the_post(); the_content(); ?>
	</div>
</div>


<div class="PaginationButtons">
	<div class="PaginationButtons__Inner">
		<?php next_post_link('%link','次へ'); ?>
		<a
			class="PaginationButtons__Back"
			href="/report/"
		>
			オーナー通信トップに戻る
		</a>
		<?php previous_post_link('%link','前へ'); ?>
	</div>
</div>

<?php get_footer(); ?>
