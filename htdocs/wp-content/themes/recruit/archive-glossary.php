<?php get_header(); ?>
<?php
$allTerms = get_terms('glossarycat', array('hide_empty'=> 0));
// print_r($allTerms);
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
			<?php foreach($allTerms as $value): ?>
			<?php
				$args = array(
					'posts_per_page' => 3,
					'post_type' => 'glossary',
					'tax_query' => array(
						array(
							'taxonomy' => 'glossarycat',
							'field' => 'slug',
							'terms' => $value->slug
						)
					),
				);
				$groupPosts = get_posts($args);
				// print_r($groupPosts);
			?>
			<li class="glossaryList__cat">
				<div class="glossaryList__catTitle"><?php echo $value->name; ?></div>
				<?php if(!empty($groupPosts)): ?>
					<ul class="glossaryList__wordList">
						<?php foreach($groupPosts as $word): ?>
						<li class="glossaryList__wordItem">
							<div class="glossaryList__word"><?php echo $word->post_title; ?></div>
							<div class="glossaryList__wordDescription">
								<?php echo $word->post_content; ?>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<div class="buttonContainer">
						<a class="button button--small" href="/glossarycat/<?php echo $value->slug; ?>/"><span class="button__inner">もっと見る</span></a>
					</div>
				<?php else: ?>
					<p>
						用語がありません。
					</p>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</section>

</div>

<?php get_footer(); ?>
