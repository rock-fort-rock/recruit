<?php get_header(); ?>

<div class="ContentsHeader -ownerReport">
	<div class="ContentsHeader__Inner">
		<h1 class="ContentsHeader__Title">
			オーナー通信
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
			<a href="/owner/">
				UMの賃貸管理
			</a>
		</li>
		<li>
			オーナー通信
		</li>
	</ul>
</div>


<div class="ContentsLead">
	<p>
		オーナー通信とは、賃貸経営に関してオーナー様に得になる情報を中心に、弊社からオーナー様へお伝えしたい記事を掲載する新聞のようなものです。<br>
		月1回発行の発行で、物件管理状況についての報告書である定期報告書と一緒に郵送させていただいています。<br>
		このページでは、これまでに発行させていただいた、過去のオーナー通信を公開させていただきます。
	</p>
</div>

<?php
	$terms = get_terms('year');
	// print_r($terms);
	$reportArray = [];
	foreach($terms as $value){
		$slug = $value->slug;
		$tempArray = [];
		$tempArray['name'] = $value->name;
		$args = array(
			'post_type' => 'report',
			'tax_query'      => array(
		    array(
		      'taxonomy' => 'year',
		      'field'    => 'slug',
		      'terms'    => $slug,
		    )
		  )
		);
		$yearPosts = get_posts($args);
		$postsArray = [];
		foreach($yearPosts as $post){
			// print_r($post);
			$postArray = [];
			$postArray['link'] = get_the_permalink($post->ID);
			$postArray['name'] = get_the_title($post->ID);
			$postArray['excerpt'] = get_field('report_excerpt', $post->ID);
			$postArray['date'] = get_field('report_date', $post->ID);
			$postArray['pdf'] = get_field('report_pdf', $post->ID)['url'];
			array_push($postsArray, $postArray);
		}
		$tempArray['posts'] = $postsArray;
		array_push($reportArray, $tempArray);
	}
	// print_r($reportArray);
?>

<?php foreach($reportArray as $value): ?>
<div class="OwnersReportIndexSection<?php if ($value === reset($reportArray))echo ' -open'; ?>">
	<button
		type="button"
		class="OwnersReportIndexSection__Header"
	>
		<?php echo $value['name']; ?>
	</button>
	<div class="OwnersReportIndexSection__Body">
		<ul class="OwnersReportIndexSection__List">
			<?php foreach($value['posts'] as $post): ?>
			<li class="OwnersReportIndexSection__Item">
				<div class="OwnersReportIndexSection__ItemName">
					<?php echo $post['name']; ?>
				</div>
				<div class="OwnersReportIndexSection__ItemDate">
					<?php echo $post['date']; ?>
				</div>
				<div class="OwnersReportIndexSection__ItemTitle">
					<a href="<?php echo $post['link']; ?>">
							<?php echo $post['excerpt']; ?>
					</a>
				</div>
				<div class="OwnersReportIndexSection__ItemFile">
					<a href="<?php echo $post['pdf']; ?>" target="_blank">
						<span class="Icon -pdf"></span>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php endforeach; ?>


<?php get_footer(); ?>
