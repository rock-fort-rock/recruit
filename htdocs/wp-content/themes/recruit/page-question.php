<?php
/*
Template Name: 質問する
*/
?>
<?php get_header(); ?>
<div class="container__main container__main--top">
  <section class="container__mainSection">
    <h1 class="formTitle">質問フォーム</h1>

    <ul class="formStatus">
      <li class="formStatus__step formStatus__step--current">
        <div class="formStatus__stepInner">
          <span>step1</span>
          質問フォームに記入
        </div>
      </li>
      <li class="formStatus__step">
        <div class="formStatus__stepInner">
          <span>step2</span>
          内容確認
        </div>
      </li>
      <li class="formStatus__step">
        <div class="formStatus__stepInner">
          <span>step3</span>
          質問完了
        </div>
      </li>
    </ul>
  </section>

  <section class="container__mainSection container__mainSection--wht container__mainSection--padding">
    <div class="paragraph">
      こちらのページでは求人に関する質問を受け付けております。<br>必要事項をご記入の上「入力内容の確認画面」を押してください。
    </div>
    <div class="formContainer">
      <div class="contentBlock">
        <h2 class="formContainer__title">よく見られている質問</h2>
        <!-- <ul class="popularQuestion"> -->
          <?php
            if (function_exists('wpp_get_mostpopular')) {
              $arg = array (
              'range' => 'monthly',
              'order_by' => 'views',
              'post_type' => 'post',
              'limit' => 6,
              );
              wpp_get_mostpopular($arg);
            }
          ?>
          <!-- <li class="popularQuestion__item">
            <a href="#">未経験でも応募可能ですか？未経験でも応募可能ですか？未経験でも応募可能ですか？</a>
          </li> -->
        <!-- </ul> -->
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
        <?php
      	$args = array(
      		'orderby' => 'count',
      		'order' => 'DESC',
      		'number' => 5,
      	);
      	$tags = get_tags($args);
      	// print_r($tags);
      	?>
      	<ul class="tagCloud--small">
      	<?php foreach($tags as $value): ?>
      		<li class="tagCloud__tag"><a href="<?php echo get_tag_link($value->term_id); ?>"><?php echo $value->name; ?></a></li>
      	<?php endforeach; ?>
      	</ul>
      </div>

      <div class="contentBlock">
      <?php the_post(); the_content(); ?>
      </div>
    </div>

  </section>

</div>
<?php get_footer(); ?>
