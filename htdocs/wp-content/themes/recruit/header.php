<?php
/*
bloginfo('template_directory');ベーステンプレートフォルダ
bloginfo('stylesheet_directory');子テーマフォルダ
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<?php wp_head(); ?>
<?php
/*
子テーマ複製時に使用。
functions.phpのlocalstyleを無効化　→　調整　→　吐き出されたCSSを子テーマのstyle.cssへコピペ。
<style><?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/site.css'; ?></style>
*/
?>
</head>
<body>
  <header class="globalHeader">
    <div class="globalHeader__band exceptSmall">
      <div class="globalHeader__bandInner">

        <ul class="siteLinks">
          <li class="siteLinks__item">
            <a href="/"><span class="Icon -facebook"></span>TOP</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>クリップした質問</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>質問をする</a>
          </li>
          <li class="siteLinks__item">
            <a href="#"><span class="Icon -facebook"></span>公式サイト</a>
          </li>
        </ul>

        <div class="siteInfo">
          <ul class="siteInfo__sns">
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -facebook"></span></a>
            </li>
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -twitter"></span></a>
            </li>
            <li class="siteInfo__snsList">
              <a href="#"><span class="Icon -instagram"></span></a>
            </li>
          </ul>
          <div class="siteInfo__data">
            2019年6月1日現在　Q&A数：<em>650</em>件
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

    <h1 class="globalHeader__catch">あなたもミュゼプラチナムの一員として一緒に成長してみませんか？</h1>
		<?php
			// echo '全カテゴリ';
			$allcat = get_categories(array('hide_empty'=> 0));
		?>
    <nav class="globalNavi">
      <ul class="globalNavi__list">
        <li class="globalNavi__item globalNavi__item--hasChild">
          <span><span class="Icon -facebook"></span>カテゴリー</span>
          <ul class="globalNavi__childList">
						<?php foreach($allcat as $value): ?>
						<li class="globalNavi__childItem">
              <a href="/category/<?php echo $value->slug; ?>/"><?php echo $value->description; ?><span>(<?php echo $value->count; ?>)</span></a>
            </li>
						<?php endforeach; ?>
          </ul>
        </li>
        <li class="globalNavi__item">
          <a href="/about/"><span class="Icon -twitter"></span>用語集</a>
        </li>
        <li class="globalNavi__item">
          <a href="/shop/"><span class="Icon -instagram"></span>関心が高い</a>
        </li>
        <li class="globalNavi__item globalNavi__item--wide">
          <a href="/news/"><span class="Icon -instagram"></span>クリップランキング</a>
        </li>
        <li class="globalNavi__item">
          <a href="/recruit/"><span class="Icon -facebook"></span>応募する</a>
        </li>
      </ul>
    </nav>
  </header>

	<div class="container">
