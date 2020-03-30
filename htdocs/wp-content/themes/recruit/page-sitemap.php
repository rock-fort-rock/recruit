<?php
/*
Template Name: サイトマップ
*/
?>
<?php get_header(); ?>
<div class="container__main">
  <section class="container__mainSection container__mainSection--wht container__mainSection--padding">
    <h1 class="pageTitle">サイトマップ</h1>
    <ul class="sitemap">
      <li class="sitemap__item">
        <a href="/" class="sitemap__itemTitle"><span class="Icon -arrow"></span>TOP</a>
      </li>
      <li class="sitemap__item">
        <a href="/clipped/" class="sitemap__itemTitle"><span class="Icon -arrow"></span>クリップした質問</a>
      </li>
      <li class="sitemap__item">
        <div class="sitemap__itemTitle">カテゴリー</div>
        <ul class="sitemap__sub">
          <?php foreach($allcat as $value): ?>
          <li class="sitemap__subItem">
            <a href="<?php echo esc_url(get_category_link( $value->term_id )); ?>"><?php echo $value->name; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li class="sitemap__item">
        <a href="/popular/" class="sitemap__itemTitle"><span class="Icon -arrow"></span>関心が高い</a>
      </li>
      <li class="sitemap__item">
        <a href="/clipranking/" class="sitemap__itemTitle"><span class="Icon -arrow"></span>クリップランキング</a>
      </li>
      <li class="sitemap__item">
        <a href="/question/" class="sitemap__itemTitle" target="_blank"><span class="Icon -arrow"></span>質問をする</a>
      </li>
      <li class="sitemap__item">
        <a href="/company/" class="sitemap__itemTitle" target="_blank"><span class="Icon -arrow"></span>運営会社</a>
      </li>
      <li class="sitemap__item">
        <a href="/privacy/" class="sitemap__itemTitle" target="_blank"><span class="Icon -arrow"></span>プライバシーポリシー</a>
      </li>
    </ul>
  </section>

</div>
<?php get_footer(); ?>
