<?php
/*
Template Name: 質問する（確認）
*/
?>
<?php get_header(); ?>
<div class="container__main container__main--top">
  <section class="container__mainSection">
    <h1 class="formTitle">質問フォーム</h1>

    <ul class="formStatus">
      <li class="formStatus__step">
        <div class="formStatus__stepInner">
          <span>step1</span>
          質問フォームに記入
        </div>
      </li>
      <li class="formStatus__step formStatus__step--current">
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
      内容をご確認の上「送信」を押してください。
    </div>
    <div class="formContainer">
      <div class="contentBlock">
      <?php the_post(); the_content(); ?>
      </div>
    </div>

  </section>

</div>
<?php get_footer(); ?>
