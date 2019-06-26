<?php get_header(); ?>
<div class="ContentsHeader -contact">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			お知らせ
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
			お知らせ
		</li>
	</ul>
</div>

<?php
$args = array(
	'exclude' => array(7),//カテゴリ「お知らせ」除外
);
$terms = get_terms('newscat', $args);
$term = $wp_query->queried_object;//現在ページのターム
// print_r($term->slug);
?>
<ul class="CategoryBar">
	<li<?php if(empty($term))echo ' class="-current"'; ?>>
		<a href="/news/">
			全てのお知らせ
		</a>
	</li>
	<?php foreach($terms as $value): ?>
	<li<?php if($term->slug == $value->slug)echo ' class="-current"'; ?>>
		<a href="/news/newscat/<?php echo $value->slug; ?>/">
			<?php echo $value->name; ?>
		</a>
	</li>
<?php endforeach; ?>
</ul>

<?php if(have_posts()): ?>
<div class="NewsList">
	<ul class="NewsList__List">
		<?php while(have_posts()): the_post(); ?>
		<?php
			$terms = get_terms('newscat');
			$the_terms = get_the_terms($post->ID, 'newscat' );
		?>
		<li class="NewsList__Item">
			<a href="<?php the_permalink(); ?>">
				<div class="NewsList__ItemDate">
					<?php the_time('Y.m.d'); ?>
				</div>
				<div class="NewsList__ItemCategory">
					<span class="NewsList__ItemTag">
						<?php echo $the_terms[0]->name; ?>
					</span>
				</div>
				<div class="NewsList__ItemText">
					<?php the_title(); ?>
				</div>
			</a>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php endif; ?>

<?php if($wp_query->max_num_pages > 1): ?>
<div class="Pagination">
	<?php if(get_query_var( 'paged' ) > 1): ?>
		<a class="Pagination__First" href="/news/"></a>
	<?php endif; ?>
	<?php the_posts_pagination( array(
		'screen_reader_text' => ' ',
		'mid_size' => 2,
		'prev_text' => __( '' ),
		'next_text' => __( '' ),
	) ); ?>
	<?php if($wp_query->max_num_pages != get_query_var( 'paged' )): ?>
		<a class="Pagination__Last" href="/news/page/<?php echo $wp_query->max_num_pages; ?>/"></a>
	<?php endif; ?>
</div>
<?php endif; ?>


<?php get_footer(); ?>
