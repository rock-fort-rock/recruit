<?php get_header(); ?>
<div class="container__main">
	<div class="contentTitle">
		<h1 class="contentTitle__main">"<?php echo get_search_query(); ?>"の検索結果</h1>
		<div class="contentTitle__caption">全<?php echo $wp_query->found_posts; ?>件</div>
	</div>


<?php if(have_posts()): ?>
	<div class="articleListContainer">
		<ul class="articleList">
			<?php while(have_posts()): the_post(); ?>
			<?php
				$the_terms = get_the_terms($post_id, 'category');
				//カテゴリは単一選択
				$cat = array(
					'name'=>$the_terms[0]->name,
					'desc'=>$the_terms[0]->description,
					'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
				);
				$eyecatchSrc = getEyecatch($post_id, 'medium');

				$raw_desc = strip_tags(get_the_content());
				$num = 100;
				$desc = mb_substr($raw_desc, 0, $num);
				if(mb_strlen($desc) >= $num){
					$desc .= '…';
				}
			?>
			<li class="articleList__item">
				<a href="<?php the_permalink(); ?>" class="articleList__itemInner">
					<div class="articleList__itemEyecatch" style="background-image: url('<?php echo $eyecatchSrc; ?>');">
						<div class="exceptSmall">
							<div class="articleList__itemCategory" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['desc']; ?></div>
							<div class="articleList__itemClip">
								<div class="clipCounter">
									<div class="clipCounter__icon">
										<span class="Icon -clip"></span>
									</div>
									<div class="clipCounter__num"><?php the_favorites_count($post_id); ?></div>
								</div>
							</div>
						</div>
						<!-- <img src="/assets/images/sample.jpg" class="articleList__itemEyecatchImg" alt=""> -->
					</div>
					<div class="articleList__textBlock">
						<div class="onlySmall">
							<div class="articleList__status">
								<div class="articleList__itemCategory" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['desc']; ?></div>
								<div class="articleList__itemClip">
									<div class="clipCounter">
										<div class="clipCounter__icon">
											<span class="Icon -clip"></span>
										</div>
										<div class="clipCounter__num"><?php the_favorites_count($post_id); ?></div>
									</div>
								</div>
							</div>
						</div>

						<div class="articleList__date"><?php the_time('Y.m.d'); ?></div>
						<h2 class="articleList__title"><?php the_title(); ?></h2>
						<div class="articleList__description">
							<?php echo $desc; ?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>

	<span class="next_posts_link">
	    <?php next_posts_link(); ?>
	</span>


<?php else: ?>
	<p>
		質問が見つかりませんでした。別のキーワードでお試しください。
	</p>
	<div class="contentBlock">
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
	</div>
<?php endif; ?>
</div>

<?php get_footer(); ?>
