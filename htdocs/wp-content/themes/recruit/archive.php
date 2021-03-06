<?php get_header(); ?>
<?php
	$term = $wp_query->queried_object;
	$termSlug = $term->slug;
	if($term->description){//カテゴリ
		$title = $term->name.'の質問一覧';
	}elseif($term->name){//タグ
		$title = $term->name.'の質問一覧';
	}else{
		$title = '質問一覧';
	}
?>
<div class="container__main">
	<div class="contentTitle">
		<h1 class="contentTitle__main"><?php echo $title; ?></h1>

		<div class="contentTitle__button exceptSmall">
			<div class="selectContainer">
				<select class="categorySelect" onChange="location.href=value;">
					<option value="/qa/">全て</option>
					<?php foreach($allcat as $value): ?>
					<option value="/category/<?php echo $value->slug; ?>/"<?php if($termSlug == $value->slug)echo ' selected'; ?>><?php echo $value->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
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
						<h2 class="articleList__title"><?php the_title(); ?></h2>
						<div class="articleList__description">
							<?php echo $desc; ?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>


<span class="next_posts_link">
    <?php next_posts_link(); ?>
</span>

<?php /*
<button class="view-more-button" type="button">もっと見る</button>
<div class="page-load-status" style="display:none;">
    <div class="infinite-scroll-request">ロード中</div>
    <p class="infinite-scroll-last">これ以上は記事がありません</p>
    <p class="infinite-scroll-error">読み込むページがありません</p>
</div>
*/ ?>

	</div>
<?php endif; ?>
</div>

<?php get_footer(); ?>
