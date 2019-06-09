<?php

// Форма отображения поста

include 'post_load.php';

?>

<h2>Просмотр поста</h2>

<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="<?php echo site_link('auth/post_admin');?>">
      <i class="fa fa-list" aria-hidden="true"></i>
      Список постов
    </a>
  </li>
  <li class="list-inline-item">
    <a href="<?php echo site_link('auth/post_edit', ['post_id' => intval($postId)]);?>">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      Редактировать
    </a>
  </li>
  <li class="list-inline-item">
    <i class="fa fa-trash-o" aria-hidden="true"></i>
    <a class="text-danger" href="<?php echo site_link('auth/post_drop', ['post_id' => intval($postId)]);?>">Удалить</a>
  </li>
</ul>

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
        <p class="card-text">Тэги: <?php echo htmlescape($post['tags']);?></p>
        <p class="card-text"><small class="text-muted">Дата создания: <?php echo htmlescape($post['creation_time']);?></small></p>
      </div>
    </div>
  </div>
</div>
