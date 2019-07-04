<?php
/*
bloginfo('template_directory');ベーステンプレートフォルダ
bloginfo('stylesheet_directory');子テーマフォルダ
*/
global $officialSite;
global $applyPage;
global $allcat;

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<?php wp_head(); ?>
<?php /*
子テーマ作成時に使用
functions.phpのlocalstyleを無効化　→　調整　→　吐き出されたCSSを子テーマのheader.phpへコピペ。
*/ ?>
<style><?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/site.css'; ?></style>
</head>
<body>
  <header class="globalHeader">
    <div class="globalHeader__band exceptSmall">
      <div class="globalHeader__bandInner">
        <ul class="siteLinks">
          <li class="siteLinks__item">
            <a href="/" class="siteLinks__itemInner"><span class="Icon -home"></span>TOP</a>
          </li>
          <li class="siteLinks__item">
            <a href="/clipped/" class="siteLinks__itemInner"><span class="Icon -clip"></span>クリップした質問</a>
          </li>
          <li class="siteLinks__item">
            <a href="/question/" class="siteLinks__itemInner"><span class="Icon -question"></span>質問をする</a>
          </li>
          <li class="siteLinks__item">
            <a href="<?php echo $officialSite; ?>" target="_blank" class="siteLinks__itemInner"><span class="Icon -star"></span>公式サイト</a>
          </li>
        </ul>

        <div class="siteInfo">
          <ul class="siteInfo__sns">
            <?php if(get_field('sitesetting_facebook', 'option')): ?>
            <li class="siteInfo__snsList">
              <a href="<?php the_field('sitesetting_facebook', 'option'); ?>" target="_blank"><span class="Icon -facebook"></span></a>
            </li>
            <?php endif; ?>
            <?php if(get_field('sitesetting_twitter', 'option')): ?>
            <li class="siteInfo__snsList">
              <a href="<?php the_field('sitesetting_twitter', 'option'); ?>" target="_blank"><span class="Icon -twitter"></span></a>
            </li>
            <?php endif; ?>
            <?php if(get_field('sitesetting_instagram', 'option')): ?>
            <li class="siteInfo__snsList">
              <a href="<?php the_field('sitesetting_instagram', 'option'); ?>" target="_blank"><span class="Icon -instagram"></span></a>
            </li>
            <?php endif; ?>
          </ul>
          <?php
            //echo date('Y年m月d日 H時i分s秒');
            // the_modified_date('Y年n月j日');
          ?>
          <div class="siteInfo__data">
            <?php echo date('Y年n月j日'); ?>現在　Q&A数：<em><?php echo wp_count_posts('post')->publish; ?></em>件
          </div>
        </div>
      </div>
    </div>

    <div class="globalHeader__header">
      <div class="globalHeader__logo">
        <a href="/">
          <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" class="globalHeader__logoImg">
        </a>
      </div>
      <div class="globalHeader__hamburger">
        <span></span>
      </div>
    </div>

    <?php /*スマホでH1がなくなる
    <?php if(is_single() || is_singular('column')): ?>
      <div class="globalHeader__catch exceptSmall"><?php bloginfo( 'description' ); ?></div>
    <?php else: ?>
      <h1 class="globalHeader__catch"><?php bloginfo( 'description' ); ?></h1>
    <?php endif; ?>
    */ ?>

    <?php if(is_home()): ?>
      <h1 class="globalHeader__catch"><?php bloginfo( 'description' ); ?></h1>
    <?php else: ?>
      <div class="globalHeader__catch exceptSmall"><?php bloginfo( 'description' ); ?></div>
    <?php endif; ?>

    <?php /*質問フォーム以外------------------------------------*/ ?>
    <?php if(!is_page('question') && is_parent_slug() !== 'question'): ?>
		<?php
			// echo '全カテゴリ';
			// $allcat = get_categories(array('hide_empty'=> 0));
      $allcat = get_categories();
		?>
    <nav class="globalNavi<?php if(!is_home())echo ' exceptSmall'; ?>">
      <ul class="globalNavi__list">
        <li class="globalNavi__item globalNavi__item--hasChild">
          <span><span class="Icon -folder"></span>カテゴリー</span>
          <ul class="globalNavi__childList">
						<?php foreach($allcat as $value): ?>
						<li class="globalNavi__childItem">
              <a href="/category/<?php echo $value->slug; ?>/"><?php echo $value->description; ?><span>(<?php echo $value->count; ?>)</span></a>
            </li>
						<?php endforeach; ?>
          </ul>
        </li>
        <li class="globalNavi__item">
          <a href="/glossary/"><span class="Icon -list"></span>用語集</a>
        </li>
        <li class="globalNavi__item">
          <a href="/popular/"><span class="Icon -bookmark"></span>関心が高い</a>
        </li>
        <li class="globalNavi__item globalNavi__item--wide">
          <a href="/clipranking/"><span class="Icon -clipranking"></span>クリップランキング</a>
        </li>
        <li class="globalNavi__item">
          <a href="<?php echo $applyPage; ?>" target="_blank"><span class="Icon -mail"></span>応募する</a>
        </li>
      </ul>
    </nav>

    <?php if(!is_home()): ?>
    <div class="onlySmall">
      <div class="spHeader">
        <div class="spHeader__search">
          <div class="keywordSearch">
      			<form action="/" method="get" class="keywordSearch__form" autocomplete="off">
              <span class="Icon -search"></span>
      				<input type="text" name="s" value="" class="keywordSearch__input" placeholder="求人に関するキーワード">
      			</form>
      		</div>
        </div>
        <div class="spHeader__navi">
          <ul class="spHeader__naviInner">
            <li class="spHeader__naviItem">
              <a href="/">TOP</a>
            </li><!--
            --><?php foreach($allcat as $value): ?><li class="spHeader__naviItem">
                <a href="/category/<?php echo $value->slug; ?>/"><?php echo $value->description; ?></a>
              </li><?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>

  <?php endif; ?>
  <?php /*--------------------------------------質問フォーム以外*/ ?>
  </header>

  <div class="onlySmall">
    <div class="spNavi">
      <nav class="spNavi__navi">
        <div class="spNavi__naviContainer">
          <div class="spNavi__logo">
            <a href="/">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" class="spNavi__logoImg">
            </a>
          </div>
          <ul class="spGlobalNavi">
            <li class="spGlobalNavi__item">
              <a href="/" class="spGlobalNavi__itemInner"><span class="Icon -home"></span>TOP</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/news/" class="spGlobalNavi__itemInner"><span class="Icon -bell"></span>お知らせ</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/clipped/" class="spGlobalNavi__itemInner"><span class="Icon -clip"></span>クリップした質問</a>
            </li>
            <li class="spGlobalNavi__item">
              <div class="spGlobalNavi__itemInner spGlobalNavi__itemInner--hasSubNavi"><span class="Icon -folder"></span>カテゴリー検索</div>
              <ul class="spGlobalNavi__subNavi">
                <?php foreach($allcat as $value): ?>
    						<li class="spGlobalNavi__subNaviItem">
                  <a href="/category/<?php echo $value->slug; ?>/"><?php echo $value->description; ?></a>
                </li>
    						<?php endforeach; ?>
              </ul>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/popular/" class="spGlobalNavi__itemInner"><span class="Icon -bookmark"></span>関心が高い質問</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/clipranking/" class="spGlobalNavi__itemInner"><span class="Icon -clipranking"></span>クリップランキング</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/glossary/" class="spGlobalNavi__itemInner"><span class="Icon -list"></span>用語集</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/question/" class="spGlobalNavi__itemInner"><span class="Icon -question"></span>質問をする</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="/column/" class="spGlobalNavi__itemInner"><span class="Icon -comment"></span>企業コラム</a>
            </li>
            <li class="spGlobalNavi__item">
              <a href="<?php echo $officialSite; ?>" target="_blank" class="spGlobalNavi__itemInner"><span class="Icon -star"></span>公式サイト</a>
            </li>
          </ul>
          <ul class="spNavi__bannerBlock">
            <li class="spNavi__bannerBlockItem">
              <a href="<?php echo $applyPage; ?>" target="_blank" class="button button--entry button--entrySmall">
            		<div class="button__inner"><em>Web応募する</em>簡単な入力情報で応募できます</div>
            	</a>
            </li>

            <?php
            	$spnaviBanner = get_field('bannersettion_spnavi', 'option');
            	if($spnaviBanner):
            ?>
            <?php
        		foreach($spnaviBanner as $value):
        			$imgObj = $value['bannersettion_spnavi_image'];
        			$img = $imgObj['sizes']['medium'];
        		?>
        		<li class="spNavi__bannerBlockItem">
        			<a href="<?php echo $value['bannersettion_spnavi_link']; ?>" target="_blank"><img src="<?php echo $img; ?>" class="adBlock__img"></a>
        		</li>
        		<?php endforeach; ?>

            <?php endif; ?>

          </ul>
          <ul class="spEtcNavi">
            <li class="spEtcNavi__item">
    					<a href="<?php echo $officialSite; ?>" target="_blank">コーポレートサイト</a>
    				</li>
    				<li class="spEtcNavi__item">
    					<a href="/privacy/">プライバシーポリシー</a>
    				</li>
          </ul>
        </div>
      </nav>
      <div class="spNavi__bg"><span class="spNavi__close"></span></div>
    </div>
  </div>

	<div class="container">
