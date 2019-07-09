<?php
/*
Template Name: 質問する（完了）
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
      <li class="formStatus__step">
        <div class="formStatus__stepInner">
          <span>step2</span>
          内容確認
        </div>
      </li>
      <li class="formStatus__step formStatus__step--current">
        <div class="formStatus__stepInner">
          <span>step3</span>
          質問完了
        </div>
      </li>
    </ul>
  </section>

  <section class="container__mainSection container__mainSection--wht container__mainSection--padding">
    <div class="thanksPage">
      <?php the_post(); the_content(); ?>
      <div class="thanksPage__message">
        <h1 class="thanksPage__messageCatch">ご応募ありがとうございました</h1>
        <div class="thanksPage__messageDesc">
          応募企業からの返信メールを持って応募完了となります。<br class="exceptSmall">
          応募企業からの連絡がない場合、直接企業までお問い合わせ下さい。
        </div>
      </div>

      <?php
  			$banner = get_field('bannersettion_question', 'option');
  			if($banner):
  		?>
  		<div class="thanksPage__banner">
  			<ul class="adBlock">
  				<?php
  				foreach($banner as $value):
  					$imgObj = $value['bannersettion_question_image'];
  					$img = $imgObj['sizes']['medium_large'];
  				?>
  				<li class="adBlock__item">
  					<a href="<?php echo $value['bannersettion_question_link']; ?>" target="_blank"><img src="<?php echo $img; ?>" class="adBlock__img"></a>
  				</li>
  				<?php endforeach; ?>
  			</ul>
  		</div>
  		<?php endif; ?>

      <div class="thanksPage__buttonContainer">
        <a href="/" class="thanksPage__button">TOPに戻る</a>
      </div>

    </div>
  </section>

</div>
<?php get_footer(); ?>
