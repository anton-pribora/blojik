<?php

// Форма отображения поста

include 'post_load.php';

?>
<h2>Редатирование поста</h2>

<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="?action=auth/post_admin">
      <i class="fa fa-list" aria-hidden="true"></i>
      Список постов
    </a>
  </li>
  <li class="list-inline-item">
    <a href="?action=auth/post_view&post_id=<?php echo intval($postId)?>">
      <i class="fa fa-search" aria-hidden="true"></i>
      Просмотр
    </a>
  </li>
</ul>

<?php

$name = $_POST['name'] ?? $post['name'];
$text = $_POST['text'] ?? $post['text'];
$tags = $_POST['tags'] ?? $post['tags'];

if ($_POST) {
    // Сохранить файл
    $postFilePath = $post['image'];
    $tmpFile = $_FILES['image']['tmp_name'] ?? '';
    
    if ($tmpFile) {
        if (file_exists($postFilePath)) {
            unlink($postFilePath);
        }
    
        $postFilePath = 'uploads/' . uniqid() . '_' . $_FILES['image']['name'];
        rename($tmpFile, $postFilePath);
    }

    my_query('UPDATE `posts` SET `name` = ?, `text` = ?, `image` = ?, `tags` = ? WHERE `id` = ?', [
        $name,
        $text,
        $postFilePath,
        $tags,
        $postId
    ]);
    
?>
<div class="alert alert-success" role="alert">
  Пост успешно обовлён
</div>
<?php
    return;
}

include 'edit_post_form.php';