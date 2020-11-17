<?php
$uri =  $_SERVER["REQUEST_URI"];
$uriArray = explode("/", $uri);

$redirectPost = get_post( $uriArray[1] );
// print_r($redirectPost);
// exit();
if($redirectPost){
	$redirect = get_permalink($uriArray[1]);
	header( "HTTP/1.1 301 Moved Permanently" );
	header('Location:' . $redirect);
	exit;
}



// $pos = array_search('column', $uriArray);
// //columnが含まれている場合は次の値（投稿ID）を取得してリダイレクト
// if($pos !== false){
// 	$id = $uriArray[$pos + 1];
// 	$redirect = get_permalink($id);
// 	header( "HTTP/1.1 301 Moved Permanently" );
// 	header('Location:' . $redirect);
// 	exit;
// }
?>
<?php get_header(); ?>
	<div class="container__main">
		<section class="container__mainSection" style="min-height: 240px;">
			<div class="contentTitle">
				<h1 class="contentTitle__main">ページが見つかりませんでした。</h1>
			</div>
			<p>お探しのページは削除されたか、存在しない可能性があります。</p>
			<a href="/">» TOPへ戻る</a></p>
		</section>
	</div>
<?php get_footer(); ?>
