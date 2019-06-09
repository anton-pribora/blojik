<?php

// Список постов

// Параметры для поиска
$tag        = $_GET['tag'] ?? '';
$searchText = $_GET['s'] ?? '';

$currentPage = max($_GET['p'] ?? 0, 0);
$rowsOnPage  = $_GET['l'] ?? 20;

$where = [];

if ($tag) {
    $where[] = '`tags` LIKE ' . my_query_quote("%$tag%");
}

if ($searchText) {
    $quotedText = my_query_quote("%$searchText%");
    $where[] = "(`name` LIKE $quotedText OR `text` LIKE $quotedText)";
}

$res = PostRepository::findMany($where, $currentPage * $rowsOnPage, $rowsOnPage);
$posts = $res->fetchAll();

$totalRows = PostRepository::$totalFound;
$totalPages = ceil($totalRows / $rowsOnPage);

?>
<h1>Список постов</h1>

<?php include 'template/post_search_form.php';?>
<?php include 'template/pagination.php'; ?>

<p class="text-muted">Всего записей: <?php echo $totalRows;?></p>

<?php 
foreach($posts as $post) {
    $tagLinks = [];

    foreach(explode(',', $post['tags']) as $tag) {
        $tag = htmlescape(trim($tag));
        $tagLinks[] = '<a href="?tag=' . $tag . '">' . $tag . '</a>';;
    }

?>
<div class="card my-3">
  <div class="row no-gutters">
    <div class="col-md-4">
<?php if ($post['image']) {?>
      <img src="/<?php echo htmlescape($post['image']); ?>" class="card-img-top">
<?php } else { ?>
      <p class="text-muted">(без изображения)</p>
<?php } ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlescape($post['name']);?></h5>
        <p class="card-text"><?php echo htmlescape($post['text'], true);?></p>
        <p class="card-text">Тэги: <?php echo implode(', ', $tagLinks);?></p>
        <p class="card-text"><small class="text-muted">Дата создания: <?php echo htmlescape($post['creation_time']);?></small></p>
      </div>
    </div>
  </div>
</div>
<?php 
} 

include 'template/pagination.php';

