<?php
/*
Template Name: クリップした質問
*/
?>
<?php get_header(); ?>
<div class="container__main">
  <section class="container__mainSection">
    <div class="contentTitle">
  		<h1 class="contentTitle__main">クリップした質問</h1>
  	</div>
    <?php
      $favorites = get_user_favorites();
      // print_r($favorites);
    ?>

    <div class="articleListContainer">
      <?php if(!empty($favorites)): ?>
  		<ul class="articleList">
  			<?php foreach($favorites as $value): ?>
  			<?php
  				$the_terms = get_the_terms($value, 'category');
  				//カテゴリは単一選択
  				$cat = array(
  					'name'=>$the_terms[0]->name,
  					'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
  				);
  				$eyecatchSrc = getEyecatch($value, 'medium');

          $raw_desc = strip_tags(get_post_field('post_content', $value));
  				$num = 100;
  				$desc = mb_substr($raw_desc, 0, $num);
  				if(mb_strlen($desc) >= $num){
  					$desc .= '…';
  				}
  			?>
  			<li class="articleList__item">
  				<a href="<?php the_permalink($value); ?>" class="articleList__itemInner">
  					<div class="articleList__itemEyecatch" style="background-image: url('<?php echo $eyecatchSrc; ?>');">
  						<div class="exceptSmall">
  							<div class="articleList__itemCategory" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['name']; ?></div>
  							<div class="articleList__itemClip">
  								<div class="clipCounter">
  									<div class="clipCounter__icon">
  										<span class="Icon -clip"></span>
  									</div>
  									<div class="clipCounter__num"><?php the_favorites_count($value); ?></div>
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
  										<div class="clipCounter__num"><?php the_favorites_count($value); ?></div>
  									</div>
  								</div>
  							</div>
  						</div>

  						<div class="articleList__date"><?php echo get_the_time('Y.m.d', $value); ?></div>
  						<h2 class="articleList__title"><?php echo get_the_title($value); ?></h2>
  						<div class="articleList__description">
  							<?php echo $desc; ?>
  						</div>
  					</div>
  				</a>
          <div class="articleList__itemClipButton">
            <?php echo get_favorites_button($value); ?>
          </div>
  			</li>
      <?php endforeach; ?>
  		</ul>
      <?php else: ?>
        <p style="padding: 20px;">
          クリップした質問はまだありません
        </p>
      <?php endif; ?>
    </div>
  </section>

</div>
<?php get_footer(); ?>
