<?php get_header(); ?>
<script>
$(function(){
	var infScroll = new InfiniteScroll( '.articleList', { // 記事を挿入していく要素を指定
	    append: '.articleList__item',             // 各記事の要素
	    path: '.next_posts_link a',  // 次のページへのリンク要素を指定
	    hideNav: '.next_posts_link', // 指定要素を非表示にする（ここは無くてもOK）
	    button: '.view-more-button', // 記事を読み込むトリガーとなる要素を指定
	    scrollThreshold: true,      // スクロールで読み込む：falseで機能停止（デフォルトはtrue）
	    status: '.page-load-status', // ステータス部分の要素を指定
	    history: 'false'             // falseで履歴に残さない
	});
});
</script>
<div class="container__main">
<?php if(have_posts()): ?>
	<div class="articleListContainer">
		<ul class="articleList">
			<?php while(have_posts()): the_post(); ?>
			<?php
				$the_terms = get_the_terms($post_id, 'category');
				//カテゴリは単一選択
				$cat = array(
					'name'=>$the_terms[0]->name,
					'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
				);

				//アイキャッチ
				$eyecatchSrc = getEyecatch($post_id, 'medium_large');
			?>
			<li class="articleList__item">
				<a href="<?php the_permalink(); ?>" class="articleList__itemInner">
					<div class="articleList__itemEyecatch" style="background-image: url('<?php echo $eyecatchSrc; ?>');">
						<div class="exceptSmall">
							<div class="articleList__itemCategory" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['name']; ?></div>
							<div class="articleList__itemClip">
								<div class="clipCounter">
									<div class="clipCounter__icon">
										<span class="Icon -clip"></span>
									</div>
									<div class="clipCounter__num">255</div>
								</div>
							</div>
						</div>
						<!-- <img src="/assets/images/sample.jpg" class="articleList__itemEyecatchImg" alt=""> -->
					</div>
					<div class="articleList__textBlock">
						<div class="onlySmall">
							<div class="articleList__status">
								<div class="articleList__itemCategory" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['name']; ?></div>
								<div class="articleList__itemClip">
									<div class="clipCounter">
										<div class="clipCounter__icon">
											<span class="Icon -clip"></span>
										</div>
										<div class="clipCounter__num">255</div>
									</div>
								</div>
							</div>
						</div>

						<div class="articleList__date"><?php the_time('Y.m.d'); ?></div>
						<h2 class="articleList__question"><?php the_title(); ?></h2>
						<div class="articleList__questionDescription">
							<?php the_content(); ?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile; ?>
		</ul>

<span class="next_posts_link">
    <?php next_posts_link(); ?>
</span>

<button class="view-more-button" type="button">もっと見る</button>
<div class="page-load-status" style="display:none;">
    <div class="infinite-scroll-request">ロード中</div>
    <p class="infinite-scroll-last">これ以上は記事がありません</p>
    <p class="infinite-scroll-error">読み込むページがありません</p>
</div>

	</div>
<?php endif; ?>
</div>

<?php get_footer(); ?>
