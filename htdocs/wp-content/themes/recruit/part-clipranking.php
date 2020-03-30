<?php
  global $allcat;

  if(isset($_GET['cat'])){
    $cat = get_category_by_slug($_GET['cat']);
    $cat_slug = $_GET['cat'];
    $cat_id = $cat->cat_ID;
    $para = $cat_id;
  }else{
    $cat_slug = null;
    $para = null;
  }
  $favorites = getClipRanking($para);

  if(isset($_GET['all'])){//all=1
    $num = count($favorites);
  }else{
    $num = min(10, count($favorites));//TOP10のみ
  }
  // print_r($favorites);
?>
<div class="ranking">
  <?php if(!is_amp()): ?>
  <div class="ranking__select">
    カテゴリ
    <div class="selectContainer">
      <select class="categorySelect" onChange="location.href=value;">
        <option value="/clipranking/">全て</option>
        <?php foreach($allcat as $value): ?>
        <option value="/clipranking/?cat=<?php echo $value->slug; ?>"<?php if($cat_slug == $value->slug)echo ' selected'; ?>><?php echo $value->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <?php endif; ?>

  <ol class="ranking__list">
    <?php for($i=0; $i<$num; $i++): ?>
    <?php
      $the_terms = get_the_terms($favorites[$i]['id'], 'category');
      //カテゴリは単一選択
      $cat = array(
        'name'=>$the_terms[0]->name,
        'desc'=>$the_terms[0]->description,
      );
    ?>
    <li class="ranking__listItem">
      <a href="<?php the_permalink($favorites[$i]['id']); ?>"><?php echo get_the_title($favorites[$i]['id']); ?><span class="ranking__listItemCategory">[<?php echo $cat['desc']; ?>]</span></a>
    </li>
    <?php endfor; ?>
  </ol>

  <?php if(!isset($_GET['all']) && $num>10): ?>
  <div class="viewMore">
    <?php
    if(isset($_GET['cat'])){
      $url = '/clipranking/?cat='.$_GET['cat'].'&all=1';
    }else{
      $url = '/clipranking/?all=1';
    }
    ?>
    <a href="<?php echo $url; ?>" class="viewMore__button">全てのランキングをみる</a>
  </div>
  <?php endif; ?>
</div>
