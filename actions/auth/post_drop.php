<?php

// Форма отображения поста

include 'post_load.php';

if ($_POST) {
    $action = $_POST['action'];
    
    if ($action === 'drop') {
        $postFilePath = $post['image'];
    
        if ($postFilePath) {
            if (file_exists($postFilePath)) {
                unlink($postFilePath);
            }
        }
    
        // Удалить
        my_query('DELETE FROM `posts` WHERE `id` = ?', [
            $postId
        ]);
        
        header('Location: /?action=auth/post_admin');
        exit;
    } else if ($action === 'cancel') {
        // Вернуться назад
        header('Location: /?action=auth/post_view&post_id=' . intval($postId));
        exit;
    }
}

?>

<h2>Вы действительно хотите удалить пост?</h2>

<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="?action=auth/post_admin">Список постов</a>
  </li>
  <li class="list-inline-item">
    <a href="?action=auth/post_view&post_id=<?php echo intval($postId)?>">Просмотр</a>
  </li>
</ul>

<form method="post">
<button type="submit" class="btn btn-danger" value="drop" name="action">Да, конечно</button>
<button type="submit" class="btn btn-secondary" value="cancel" name="action">Нет, не надо</button>
</form>