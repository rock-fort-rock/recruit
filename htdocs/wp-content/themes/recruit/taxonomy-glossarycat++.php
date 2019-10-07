<?php get_header(); ?>
<?php
	$term = $wp_query->queried_object;
	// print_r($term);
	$termSlug = $term->slug;
	$title = $term->name;

	$allTerms = get_terms('glossarycat', array('hide_empty'=> 0));
	// print_r($terms);
?>
<div class="container__main">
  <section class="container__mainSection container__mainSection--wht">
		<ul class="glossaryNavi">
			<?php foreach($allTerms as $value): ?>
				<li class="glossaryNavi__item">
					<a href="/glossarycat/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></a>
				</li>
			<?php endforeach; ?>
			<!-- <li class="glossaryNavi__item glossaryNavi__item--wide">
				<a href="#">アルファベット・数字</a>
			</li> -->
		</ul>

    <ul class="glossaryList">
			<li class="glossaryList__cat">
				<div class="glossaryList__catTitle"><?php echo $title; ?></div>


				<?php if(have_posts()): ?>
				<ul class="glossaryList__wordList">
					<?php while(have_posts()): the_post(); ?>
					<li class="glossaryList__wordItem">
						<div class="glossaryList__word"><?php the_title(); ?></div>
						<div class="glossaryList__wordDescription">
							<?php the_content(); ?>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
        <?php else: ?>
				<p>
					用語がありません。
				</p>
        <?php endif; ?>
			</li>
		</ul>
  </section>
</div>

<?php get_footer(); ?>
