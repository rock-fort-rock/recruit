<?php get_header(); ?>
<?php
//カテゴリ一覧から来た場合
if(isset($_SESSION['category'])){
	$sameCategory = true;
	$back = '/news/newscat/'.$_SESSION['category']['slug'].'/';
	$backText = $_SESSION['category']['name'].'の一覧に戻る';
}else{
	// echo 'sessionなし';
	$sameCategory = false;
	$back = '/news/';
	$backText = 'お知らせの一覧に戻る';
}
?>
<div class="ContentsHeader -contact">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			お知らせ
		</h1>
	</div>
</div>


<div class="Breadcrumbs">
	<ul>
		<li>
			<a href="/">
				<span class="Icon -home"></span>
			</a>
		</li>
		<li>
			<a href="/news/">
				お知らせ
			</a>
		</li>
		<li>
			<?php the_title(); ?>
		</li>
	</ul>
</div>


<div class="NewsArticle">
	<div class="NewsArticle__Header">
		<div class="NewsArticle__HeaderDate">
			<?php the_time('Y.m.d'); ?>
		</div>
		<div class="NewsArticle__HeaderCategory">
			<span class="NewsArticle__HeaderTag">
				<?php
				$the_terms = get_the_terms($post->ID, 'newscat' );
				echo $the_terms[0]->name;
				?>
			</span>
		</div>
		<h2 class="NewsArticle__HeaderTitle">
			<?php the_title(); ?>
		</h2>
	</div>

	<div class="NewsArticle__Body">
		<?php the_post(); the_content(); ?>
	</div>
</div>


<nav class="ArticlePagination">
	<div class="ArticlePagination__Inner">
		<?php next_post_link('%link','%title', $sameCategory, '', 'newscat'); ?>
		<a
			class="ArticlePagination__Back"
			href="<?php echo $back; ?>"
		>
			<?php echo $backText; ?>
		</a>
		<?php previous_post_link('%link','%title', $sameCategory, '', 'newscat'); ?>
	</div>
</nav>

<?php get_footer(); ?>
