<?php get_header(); ?>
<?php
$the_terms = get_the_terms($post->ID, 'category');
//カテゴリは単一選択
$cat = array(
  'name'=>$the_terms[0]->name,
  'slug'=>$the_terms[0]->slug,
  'desc'=>$the_terms[0]->description,
  'color'=>get_field('category_color', 'category_'.$the_terms[0]->term_id)
);

//アイキャッチ
$eyecatchSrc = getEyecatch($post->ID, 'medium_large');
?>
<div class="container__main">
  <section class="container__mainSection">
    <div class="article">
      <ul class="shareList">
        <li class="shareList__item">
          <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%0D%0A&amp;url=<?php the_permalink(); ?>" target="_blank" class="twitter"><span class="Icon -twitter"></span><span class="shareList__itemText">Tweet</span></a>
        </li>
        <li class="shareList__item">
          <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="facebook"><span class="Icon -facebook"></span><span class="shareList__itemText">Share</span></a>
        </li>
        <li class="shareList__item">
          <a href="line://msg/text/<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" target="_blank" class="line"><span class="Icon -line"></span><span class="shareList__itemText">Share</span></a>
        </li>
        <li class="shareList__item">
          <a href="https://getpocket.com/edit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" class="pocket"><span class="Icon -pocket"></span><span class="shareList__itemText">Pocket</span></a>
        </li>
        <li class="shareList__item">
          <a href="https://b.hatena.ne.jp/add?url=<?php the_permalink(); ?>" target="_blank" class="hatena"><span class="Icon -hatena"></span><span class="shareList__itemText">Hatena</span></a>
        </li>
        <!-- <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -rss"></span><span class="shareList__itemText">RSS</span></a>
        </li> -->
      </ul>
      <div class="article__eyecatch">
        <img src="<?php echo $eyecatchSrc; ?>" class="article__eyecatchImg" alt="<?php the_title(); ?>">
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

        <div class="article__date"><?php the_time('Y.m.d'); ?></div>
        <h1 class="article__title"><?php the_title(); ?></h1>
        <div class="article__lede">
          <?php the_post(); the_content(); ?>
        </div>

        <h2 class="article__answer"><?php the_field('qa_answer'); ?></h2>
        <section class="article__body">
          <?php the_field('qa_answerDescription'); ?>

          <div class="article__bodyFooter">
            <div class="contentBlock">
              <div class="contentBlock__title">
                この質問は役に立ちましたか？
              </div>
              <ul class="buttonList">
                <li class="buttonList__item">
                  <a href="#" class="button button--pink">
                    <div class="button__inner">クリップする</div>
                  </a>
                </li>
                <li class="buttonList__item">
                  <a href="#" class="button">
                    <div class="button__inner">Web応募する</div>
                  </a>
                </li>
                <li class="buttonList__item">
                  <a href="#" class="button button--green">
                    <div class="button__inner">新たに質問する</div>
                  </a>
                </li>
              </ul>
            </div>

            <div class="contentBlock">
              <div class="contentBlock__title">
                過去の質問をキーワードで検索もできます
              </div>
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

            <?php $posttags = get_the_tags(); ?>
            <?php if($posttags): ?>
            <div class="contentBlock">
              <ul class="tagCloud--small">
                <?php foreach ( $posttags as $value ): ?>
                <li class="tagCloud__tag">
                  <a href="<?php echo get_tag_link($value->term_id); ?>"><?php echo $value->name; ?></a>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <?php endif; ?>

            <div class="contentBlock">
              <ul class="article__bodyFooterCategory">
                <li>
                  <a href="/category/<?php echo $cat['slug']; ?>/"><span class="Icon -twitter"></span><?php echo $cat['desc']; ?></a>
                </li>
              </ul>
            </div>

          </div>


        </section>
      </div>
      <div class="article__footer">
        <nav class="articlePagination">
          <?php
            $next_post = get_next_post();
            $prev_post  = get_previous_post();
          ?>
          <?php if (!empty($next_post)): ?>
          <?php $eyecatchNext = getEyecatch($next_post->ID, 'medium'); ?>
          <a class="articlePagination__button articlePagination__button--next" href="<?php the_permalink($next_post->ID); ?>" rel="next">
            <div class="articlePagination__buttonInner">
              <span class="Icon -arrow"></span>
              <div class="articlePagination__eyecatch" style="background-image:url(<?php echo $eyecatchNext; ?>)"></div>
              <div class="articlePagination__title">
                <?php echo get_the_title($next_post->ID); ?>
              </div>
            </div>
          </a>
          <?php endif; ?>

          <?php if (!empty($prev_post)): ?>
          <?php $eyecatchPrev = getEyecatch($prev_post->ID, 'medium'); ?>
          <a class="articlePagination__button articlePagination__button--prev" href="<?php the_permalink($prev_post->ID); ?>" rel="next">
            <div class="articlePagination__buttonInner">
              <div class="articlePagination__title">
                <?php echo get_the_title($prev_post->ID); ?>
              </div>
              <div class="articlePagination__eyecatch" style="background-image:url(<?php echo $eyecatchPrev; ?>)"></div>
              <span class="Icon -arrow"></span>
            </div>
          </a>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </section>

  <?php /*
  同一カテゴリから自身のIDを除外したもの
  */ ?>
  <section class="container__mainSection">
    <div class="contentTitle">
      <h2 class="contentTitle__main">関連する質問</h2>
      <div class="contentTitle__caption">この質問に関連する質問はこちら</div>
    </div>
    <div class="articleListContainer">
      <ul class="articleList">
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
      </ul>
      <div class="viewMore">
        <a href="#" class="viewMore__button viewMore__button--large">休暇申請に関する質問の一覧をみる</a>
      </div>
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
</div>
<?php get_footer(); ?>
