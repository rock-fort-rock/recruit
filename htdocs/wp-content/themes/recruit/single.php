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
// echo $cat['color'];

$eyecatchId = get_post_thumbnail_id($post_id);
$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'medium_large' );
$eyecatchSrc = $eyecatch[0];
?>
<div class="container__main">
  <section class="container__mainSection">
    <div class="article">
      <ul class="shareList">
        <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -line"></span><span class="shareList__itemText">Share</span></a>
        </li>
        <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -twitter"></span><span class="shareList__itemText">Tweet</span></a>
        </li>
        <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -facebook"></span><span class="shareList__itemText">Share</span></a>
        </li>
        <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -pocket"></span><span class="shareList__itemText">Pocket</span></a>
        </li>
        <li class="shareList__item">
          <a href="#" target="_blank"><span class="Icon -hatena"></span><span class="shareList__itemText">Hatena</span></a>
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
              <span class="Icon -facebook"></span>
            </div>
            <div class="clipCounter__num">255</div>
          </div>
        </div>

        <div class="article__date"><?php the_time('Y.m.d'); ?></div>
        <h1 class="article__title"><?php the_title(); ?></h1>
        <div class="article__lede">
          <?php the_post(); the_content(); ?>
        </div>

        <h2 class="article__answer">ミュゼは女性の働きやすい環境づくりを目指しています</h2>
        <section class="article__body">
          <h1>福利厚生</h1>
          <p>
            ミュゼプラチナムは女性に優しい福利厚生が充実しています。
          </p>
          <p>
            女性が多いミュゼプラチナムでは、<br>
            結婚・出産などを経験した先輩スタッフがたくさんいます。
          </p>

          <h1>ミュゼプラチナムで正社員で勤務した場合</h1>
          <p>
            女性が多いミュゼプラチナムでは、<br>
            結婚・出産などを経験した先輩スタッフがたくさんいます。
          </p>
          <table>
            <tr>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
            </tr>
            <tr>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
            </tr>
            <tr>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
              <td>
                子供が18歳になるまで1人につき毎月5,000円、3人目からは毎月1万円を支給
              </td>
            </tr>
          </table>

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

            <div class="contentBlock">
              <ul class="tagCloud--small">
                <li class="tagCloud__tag">
                  <a href="#">タグ</a>
                </li>
                <li class="tagCloud__tag">
                  <a href="#">タグタグタグタグ</a>
                </li>
                <li class="tagCloud__tag">
                  <a href="#">タグ</a>
                </li>
                <li class="tagCloud__tag">
                  <a href="#">タグタグタグタグ</a>
                </li>
                <li class="tagCloud__tag">
                  <a href="#">タグ</a>
                </li>
              </ul>
            </div>

            <div class="contentBlock">
              <ul class="article__bodyFooterCategory">
                <li>
                  <a href="#"><span class="Icon -twitter"></span>休暇申請について</a>
                </li>
              </ul>
            </div>

          </div>


        </section>
      </div>
      <div class="article__footer">
        <nav class="articlePagination">
            <a class="articlePagination__button articlePagination__button--next" href="#" rel="next">
              <div class="articlePagination__buttonInner">
                <span class="Icon -arrow"></span>
                <div class="articlePagination__eyecatch" style="background-image:url(/assets/images/sample.jpg)"></div>
                <div class="articlePagination__title">
                  お知らせテスト_20190605
                </div>
              </div>
            </a>

            <a class="articlePagination__button articlePagination__button--prev" href="#" rel="prev">
              <div class="articlePagination__buttonInner">
                <div class="articlePagination__title">
                  お知らせテスト_20190605
                </div>
                <div class="articlePagination__eyecatch" style="background-image:url(/assets/images/sample.jpg)"></div>
                <span class="Icon -arrow"></span>
              </div>
            </a>
        </nav>
      </div>
    </div>
  </section>

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
                      <span class="Icon -facebook"></span>
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
                        <span class="Icon -facebook"></span>
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
                      <span class="Icon -facebook"></span>
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
                        <span class="Icon -facebook"></span>
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
                      <span class="Icon -facebook"></span>
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
                        <span class="Icon -facebook"></span>
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
