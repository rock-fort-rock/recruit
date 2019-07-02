<?php
/*
Template Name: アクセスランキング
*/
?>
<?php get_header(); ?>
<div class="container__main">
  <section class="container__mainSection">
    <?php
      if(isset($_GET['cat'])){
        $cat = get_category_by_slug($_GET['cat']);
        $cat_name = '['.$cat->name.']';
      }else{
        $cat_name = 'Q&A';
      }
    ?>
    <div class="contentTitle">
  		<h2 class="contentTitle__main"><?php echo $cat_name; ?>アクセスランキング</h2>
  	</div>

    <div class="contentBlock">
      <?php
        global $allcat;

        if(isset($_GET['cat'])){
          $cat = get_category_by_slug($_GET['cat']);
          $cat_slug = $_GET['cat'];
          $cat_id = $cat->cat_ID;
          $count = $cat->count;//総記事数（アクセスのあった記事に限定したい）
        }else{
          $cat_slug = null;
          $count = wp_count_posts('post')->publish;//総記事数
        }

        if(isset($_GET['all'])){//all=1
          $num = -1;
        }else{
          $num = 10;//TOP10のみ
        }
      ?>
      <div class="ranking">
        <div class="ranking__select">
          カテゴリ
          <div class="selectContainer">
            <select class="categorySelect" onChange="location.href=value;">
              <option value="/popular/">全て</option>
              <?php foreach($allcat as $value): ?>
              <option value="/popular/?cat=<?php echo $value->slug; ?>"<?php if($cat_slug == $value->slug)echo ' selected'; ?>><?php echo $value->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <ol class="ranking__list">
        <?php
          if (function_exists('wpp_get_mostpopular')) {
            $arg = array (
            'range' => 'monthly',
            'order_by' => 'views',
            'post_type' => 'post',
            'limit' => $num,
            );
            if($cat_id){
              $arg = array_merge($arg, array('cat'=>$cat_id));
            }
            wpp_get_mostpopular($arg);
          }
        ?>
        </ol>
        <?php if(!isset($_GET['all']) && $count > 10): ?>
        <div class="viewMore">
          <?php
          if(isset($_GET['cat'])){
            $url = '/popular/?cat='.$_GET['cat'].'&all=1';
          }else{
            $url = '/popular/?all=1';
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
