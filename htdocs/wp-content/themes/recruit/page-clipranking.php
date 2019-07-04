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
        $cat_name = '['.$cat->name.']';
      }else{
        $cat_name = 'Q&A';
      }
    ?>
    <div class="contentTitle">
  		<h1 class="contentTitle__main"><?php echo $cat_name; ?>クリップランキング</h1>
  	</div>

    <div class="contentBlock">
      <?php get_template_part('part-clipranking'); ?>

    </div>

    <div class="contentBlock">
      <ul class="buttonList">
        <li class="buttonList__item">
          <a href="<?php echo $applyPage; ?>" target="_blank" class="button">
            <div class="button__inner">Web応募する</div>
          </a>
        </li>
        <li class="buttonList__item">
          <a href="/question/" class="button button--green">
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
