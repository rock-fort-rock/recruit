<?php get_header(); ?>
	<div class="container__main">
		<section class="container__mainSection">
			<?php
				$args = array(
		      'posts_per_page'   => 1,
		      'post_type'        => 'post',
		    );
		    $topPost = get_posts( $args );
				// print_r($topPost);
				$topPost_ID = $topPost[0]->ID;
				$the_terms = get_the_terms($topPost_ID, 'category');
				//カテゴリは単一選択
				// print_r($the_terms[0]);
				$cat = array(
					'term_id'=>$the_terms[0]->term_id,
				  'name'=>$the_terms[0]->name,
					'desc'=>$the_terms[0]->description,
				  'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
				);
				$eyecatchSrc = getEyecatch($topPost_ID, 'medium_large');

				$topDesc = strip_tags(get_the_content(null, false, $topPost_ID));
				// $num = 100;
				// $topDesc = mb_substr($raw_desc, 0, $num);
				// if(mb_strlen($topDesc) >= $num){
				// 	$topDesc .= '…';
				// }
			?>
			<div class="article">
				<div class="article__eyecatch">
					<img src="<?php echo $eyecatchSrc; ?>" class="article__eyecatchImg" alt="<?php echo get_the_title($topPost_ID); ?>">
					<div class="article__category" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['desc']; ?></div>
				</div>
				<div class="article__container">
					<div class="article__clip">
						<div class="clipCounter">
							<div class="clipCounter__icon">
								<span class="Icon -clip"></span>
							</div>
							<div class="clipCounter__num"><span><?php the_favorites_count($topPost_ID); ?></span></div>
						</div>
					</div>

					<ul class="article__breadcrumb">
						<li class="article__breadcrumbItem">
							<a href="/">TOP</a>
						</li>
						<li class="article__breadcrumbItem">
							<a href="<?php echo esc_url(get_category_link( $cat['term_id'] )); ?>"><?php echo $cat['name']; ?></a>
						</li>
					</ul>

					<h2 class="article__title article__title--question"><?php echo get_the_title($topPost_ID); ?></h2>
					<div class="article__lede">
						<?php echo $topDesc; ?>
					</div>
					<div class="article__viewAnswer">
						<a href="<?php the_permalink($topPost_ID); ?>" class="button">
							<div class="button__inner button__inner--arrow">回答を見る</div>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="container__mainSection">
			<div class="contentTitle">
				<h2 class="contentTitle__main">最新の質問</h2>
				<div class="contentTitle__caption">新しく寄せられた質問にお答えいたします。</div>
			</div>
			<?php if(have_posts()): ?>
			<div class="articleListContainer">
				<ul class="articleList">
					<?php while(have_posts()): the_post(); ?>
					<?php
						$the_terms = get_the_terms($post_id, 'category');
						//カテゴリは単一選択
						$cat = array(
							'term_id'=>$the_terms[0]->term_id,
						  'name'=>$the_terms[0]->name,
							'desc'=>$the_terms[0]->description,
						  'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
						);
						//アイキャッチ
						$eyecatchSrc = getEyecatch($post_id, 'medium_large');

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
											<div class="clipCounter__num"><span><?php the_favorites_count($post_id); ?></span></div>
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
												<div class="clipCounter__num"><span><?php the_favorites_count($post_id); ?></span></div>
											</div>
										</div>
									</div>
								</div>

								<!-- <div class="articleList__date"><?php the_time('Y.m.d'); ?></div> -->
								<ul class="articleList__breadcrumb">
									<li class="articleList__breadcrumbItem">
										TOP
									</li>
									<li class="articleList__breadcrumbItem">
										<?php echo $cat['name']; ?>
									</li>
								</ul>
								<h2 class="articleList__title articleList__title--question"><?php the_title(); ?></h2>
								<div class="articleList__description">
									<?php echo $desc; ?>
								</div>
							</div>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
				<div class="viewMore">
					<a href="/qa/" class="viewMore__button viewMore__button--large">質問の一覧をみる</a>
				</div>
			</div>
			<?php endif; ?>
		</section>

		<?php
			$topBanner = get_field('bannersettion_top', 'option');
			if($topBanner):
		?>
		<section class="container__mainSection">
			<ul class="adBlock">
				<?php
				foreach($topBanner as $value):
					$imgObj = $value['bannersettion_top_image'];
					$img = $imgObj['sizes']['medium_large'];
				?>
				<li class="adBlock__item">
					<a href="<?php echo $value['bannersettion_top_link']; ?>" target="_blank"><img src="<?php echo $img; ?>" class="adBlock__img"></a>
				</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php endif; ?>

		<section class="container__mainSection">
			<div class="contentTitle">
				<h2 class="contentTitle__main">Q&Aクリップランキング</h2>
				<div class="contentTitle__caption">求職者からクリップを集めている質問のランキングです</div>
			</div>
			<?php get_template_part('part-clipranking'); ?>
		</section>

		<?php
		$args = array(
			'posts_per_page'   => 3,
			'post_type'        => 'column',
		);
		$columnPosts = get_posts( $args );
		?>
		<?php if(!empty($columnPosts)): ?>
		<section class="container__mainSection">
			<div class="contentTitle">
				<h2 class="contentTitle__main">企業コラム</h2>
				<div class="contentTitle__button"><a href="/column/">コラム一覧</a></div>
			</div>
			<ul class="columnList">
				<?php foreach($columnPosts as $value): ?>
				<?php
					$eyecatchSrc = getEyecatch($value->ID, 'medium');
					$raw_desc = strip_tags(get_field('column_lede', $value->ID));
					$num = 25;
					$desc = mb_substr($raw_desc, 0, $num);
					if(mb_strlen($desc) >= $num){
						$desc .= '…';
					}
				?>
				<li class="columnList__item">
					<a href="<?php the_permalink($value->ID); ?>" class="columnList__itemInner">
						<div class="columnList__itemEyecatch">
							<img src="<?php echo $eyecatchSrc; ?>" class="columnList__itemEyecatchImg">
						</div>
						<div class="columnList__itemText">
							<div class="columnList__itemDate"><?php echo get_the_time('Y.m.d', $value->ID); ?></div>
							<h2 class="columnList__itemTitle"><?php echo get_the_title($value->ID); ?></h2>
							<div class="columnList__itemLede"><?php echo $desc; ?></div>
						</div>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
