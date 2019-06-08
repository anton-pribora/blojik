<?php

// Список постов

$tag = $_GET['tag'] ?? '';

$res = my_query('SELECT * FROM `posts` WHERE ' . ($tag ? '`tags` LIKE ?' : '1') . ' ORDER BY `creation_time` DESC', [
    "%$tag%"
]);
$posts = $res->fetchAll();

?>
<h1>Список постов</h1>

<?php foreach($posts as $post) { ?>

<?php

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
        <p class="card-text"><?php echo htmlescape($post['text']);?></p>
        <p class="card-text">Тэги: <?php echo implode(', ', $tagLinks);?></p>
        <p class="card-text"><small class="text-muted">Дата создания: <?php echo htmlescape($post['creation_time']);?></small></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>