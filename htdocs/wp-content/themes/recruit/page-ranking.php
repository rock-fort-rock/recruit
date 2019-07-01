<?php
/*
Template Name: クリップランキング
*/
?>
<?php get_header(); ?>
<div class="container__main">
  <section class="container__mainSection">
    <?php
      if(isset($_GET['cat'])){
        $cat = get_category_by_slug($_GET['cat']);
        $cat_slug = $_GET['cat'];
        $cat_id = $cat->cat_ID;
        $cat_name = '['.$cat->name.']';
        $para = $cat_id;
      }else{
        $cat_slug = null;
        $cat_name = 'Q&A';
        $para = null;
      }
      $favorites = getClipRanking($para);

      if(isset($_GET['all'])){//all=1
        $num = count($favorites);
      }else{
        $num = min(10, count($favorites));//TOP10
      }
      // print_r($favorites);
    ?>

    <div class="contentTitle">
  		<h2 class="contentTitle__main"><?php echo $cat_name; ?>クリップランキング</h2>
  	</div>

    <div class="contentBlock">
      <div class="ranking">
      <div class="ranking__select">
        カテゴリ
        <div class="selectContainer">
          <select class="categorySelect" onChange="location.href=value;">
            <option value="/clipranking/">全て</option>
            <?php foreach($allcat as $value): ?>
            <option value="/clipranking/?cat=<?php echo $value->slug; ?>"<?php if($cat_slug == $value->slug)echo ' selected'; ?>><?php echo $value->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <ol class="ranking__list">
        <?php for($i=0; $i<$num; $i++): ?>
        <?php
          $the_terms = get_the_terms($favorites[$i]['id'], 'category');
          //カテゴリは単一選択
          $cat = array(
            'name'=>$the_terms[0]->name
          );
        ?>
        <li class="ranking__listItem">
          <a href="<?php the_permalink($favorites[$i]['id']); ?>"><?php echo get_the_title($favorites[$i]['id']); ?><span class="ranking__listItemCategory">[<?php echo $cat['name']; ?>]</span></a>
        </li>
        <?php endfor; ?>
      </ol>

      <?php if(!isset($_GET['all'])): ?>
      <div class="viewMore">
        <?php
        if(isset($_GET['cat'])){
          $url = '/clipranking/?cat='.$_GET['cat'].'&all=1';
        }else{
          $url = '/clipranking/?all=1';
        }
        ?>
        <a href="<?php echo $url; ?>" class="viewMore__button">全てのランキングをみる</a>
      </div>
      <?php endif; ?>
    </div>
    </div>

    <div class="contentBlock">
      <ul class="buttonList">
        <li class="buttonList__item">
          <a href="<?php echo $applyPage; ?>" target="_blank" class="button">
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
  </section>

</div>
<?php get_footer(); ?>
