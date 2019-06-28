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
				$cat = array(
				  'name'=>$the_terms[0]->name,
				  'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
				);
				$eyecatchSrc = getEyecatch($topPost_ID, 'medium_large');
			?>
			<div class="article">
				<div class="article__eyecatch">
					<img src="<?php echo $eyecatchSrc; ?>" class="article__eyecatchImg" alt="<?php echo get_the_title($topPost_ID); ?>">
					<div class="article__category" style="background-color: <?php echo $cat['color']; ?>;"><?php echo $cat['name']; ?></div>
				</div>
				<div class="article__container">
					<div class="article__clip">
						<div class="clipCounter">
							<div class="clipCounter__icon">
								<span class="Icon -clip"></span>
							</div>
							<div class="clipCounter__num">255</div>
						</div>
					</div>

					<div class="article__date"><?php echo get_the_time('Y.m.d', $topPost_ID); ?></div>
					<h2 class="article__title"><?php echo get_the_title($topPost_ID); ?></h2>
					<div class="article__lede">
						<?php echo get_the_content(null, false, $topPost_ID); ?>
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
					<?php /*
					<li class="articleList__item">
						<a href="#" class="articleList__itemInner">
							<div class="articleList__itemEyecatch" style="background-image: url('/assets/images/sample.jpg');">
								<div class="exceptSmall">
									<div class="articleList__itemCategory" style="background-color: #5360db;">休暇申請</div>
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
										<div class="articleList__itemCategory" style="background-color: #5360db;">休暇申請</div>
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

								<div class="articleList__date">2019.06.01</div>
								<h2 class="articleList__question">育児休暇はもらえますか？またその条件はありますか</h2>
								<div class="articleList__questionDescription">
									ミュゼプラチナムで正社員で勤務した場合勤続から何年目から育児休暇の取得が可能になりますか？<br>
									また、途中で社員から契約社員、あるいはパート勤務に変わった場合など、取得できる日数や、あるいは条件が変わることなどありますか？
								</div>
							</div>
						</a>
					</li>
					<li class="articleList__item">
						<a href="#" class="articleList__itemInner">
							<div class="articleList__itemEyecatch" style="background-image: url('/assets/images/sample.jpg');">
								<div class="exceptSmall">
									<div class="articleList__itemCategory" style="background-color: #5360db;">休暇申請</div>
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
										<div class="articleList__itemCategory" style="background-color: #5360db;">休暇申請</div>
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

								<div class="articleList__date">2019.06.01</div>
								<h2 class="articleList__question">育児休暇はもらえますか？またその条件はありますか</h2>
								<div class="articleList__questionDescription">
									ミュゼプラチナムで正社員で勤務した場合勤続から何年目から育児休暇の取得が可能になりますか？<br>
									また、途中で社員から契約社員、あるいはパート勤務に変わった場合など、取得できる日数や、あるいは条件が変わることなどありますか？
								</div>
							</div>
						</a>
					</li>
					*/ ?>
				</ul>
				<div class="viewMore">
					<a href="/qa/" class="viewMore__button viewMore__button--large">質問の一覧をみる</a>
				</div>
			</div>
			<?php endif; ?>
		</section>

		<section class="container__mainSection">
			<div class="adBlock">
				<a href="#" target="_blank"><img src="/assets/images/ad.jpg" class="adBlock__img"></a>
			</div>
		</section>

		<section class="container__mainSection">
			<div class="contentTitle">
				<h2 class="contentTitle__main">Q&Aクリップランキング</h2>
				<div class="contentTitle__caption">求職者からクリップを集めている質問のランキングです</div>
			</div>
			<div class="ranking">
				<div class="ranking__select">
					カテゴリ
					<div class="selectContainer">
						<select class="categorySelect">
							<option selected>全て</option>
							<option value="#">休暇申請</option>
							<option value="#">就業</option>
							<option value="#">面接・選考</option>
						</select>
					</div>
				</div>
				<ol class="ranking__list">
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
					<li class="ranking__listItem">
						<a href="#">育児休暇はいつから取得できますか<span class="ranking__listItemCategory">[休暇]</span></a>
					</li>
				</ol>

				<div class="viewMore">
					<a href="#" class="viewMore__button">全てのランキングをみる</a>
				</div>
			</div>
		</section>

		<section class="container__mainSection">
			<div class="contentTitle">
				<h2 class="contentTitle__main">企業コラム</h2>
				<div class="contentTitle__button"><a href="#">コラム一覧</a></div>
			</div>
			<ul class="columnList">
				<li class="columnList__item">
					<a href="#" class="columnList__itemInner">
						<div class="columnList__itemEyecatch">
							<img src="/assets/images/sample.jpg" class="columnList__itemEyecatchImg">
						</div>
						<div class="columnList__itemText">
							<div class="columnList__itemDate">2019.06.01</div>
							<h2 class="columnList__itemTitle">新卒説明会のお知らせ</h2>
							<div class="columnList__itemLede">ミュゼ新卒説明会が6月15日ABC会議室にて行われる。詳細日程…</div>
						</div>
					</a>
				</li>
				<li class="columnList__item">
					<a href="#" class="columnList__itemInner">
						<div class="columnList__itemEyecatch">
							<img src="/assets/images/sample.jpg" class="columnList__itemEyecatchImg">
						</div>
						<div class="columnList__itemText">
							<div class="columnList__itemDate">2019.06.01</div>
							<h2 class="columnList__itemTitle">新卒説明会のお知らせ</h2>
							<div class="columnList__itemLede">ミュゼ新卒説明会が6月15日ABC会議室にて行われる。詳細日程…</div>
						</div>
					</a>
				</li>
				<li class="columnList__item">
					<a href="#" class="columnList__itemInner">
						<div class="columnList__itemEyecatch">
							<img src="/assets/images/sample.jpg" class="columnList__itemEyecatchImg">
						</div>
						<div class="columnList__itemText">
							<div class="columnList__itemDate">2019.06.01</div>
							<h2 class="columnList__itemTitle">新卒説明会のお知らせ</h2>
							<div class="columnList__itemLede">ミュゼ新卒説明会が6月15日ABC会議室にて行われる。詳細日程…</div>
						</div>
					</a>
				</li>
			</ul>
		</section>
	</div>

<?php get_footer(); ?>
