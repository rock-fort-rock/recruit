<?php
/*
Template Name: CSVファイル出力
*/
?>
<?php
date_default_timezone_set('Asia/Tokyo');
$date = date("YmdHis");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$date.".csv");
header("Content-Transfer-Encoding: binary");
$data = array();
$csv = null;

$args = array(
  'post_type' => 'post',
  'posts_per_page'=> -1,
);
$posts_array = get_posts($args);

foreach($posts_array as $value){
  $$postData= [];
  $postData['title'] = addslashes($value->post_title);
  $postData['url'] = get_permalink($value->ID);
  //カテゴリ単一選択
  $the_terms = get_the_terms($value->ID, 'category');
  $postData['category'] = $the_terms[0]->name;
  array_push($data,$postData);
}
// print_r($data);
// exit();

$csv = '"タイトル","URL","カテゴリ"' . "\n";

foreach( $data as $value ) {
  $csv .= '"' . $value['title'] . '","' . $value['url'] . '","' . $value['category'] . '"' . "\n";
}

// echo $csv;
echo mb_convert_encoding( $csv, "SJIS", "UTF-8");
return;

?>
