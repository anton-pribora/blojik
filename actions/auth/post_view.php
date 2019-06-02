<?php

// Форма отображения поста

include 'post_load.php';

?>

<h2>Просмотр поста</h2>

<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="?action=auth/post_admin">Список постов</a>
  </li>
  <li class="list-inline-item">
    <a href="?action=auth/post_edit&post_id=<?php echo $postId?>">Редактировать</a>
  </li>
  <li class="list-inline-item">
    <a class="text-danger" href="?action=auth/post_drop&post_id=<?php echo $postId?>">Удалить</a>
  </li>
</ul>

<div class="card my-3">
  <div class="row no-gutters">
    <div class="col-md-4">
<?php if ($post['image']) {?>
      <img src="/<?php echo $post['image']; ?>" class="card-img-top">
<?php } else { ?>
      <p class="text-muted">(без изображения)</p>
<?php } ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $post['name'];?></h5>
        <p class="card-text"><?php echo $post['text'];?></p>
        <p class="card-text">Тэги: <?php echo $post['tags'];?></p>
        <p class="card-text"><small class="text-muted">Дата создания: <?php echo $post['creation_time'];?></small></p>
      </div>
    </div>
  </div>
</div>