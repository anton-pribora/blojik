<?php 

// Форма добавления поста

$name = $_POST['name'] ?? '';
$text = $_POST['text'] ?? '';
$tags = $_POST['tags'] ?? '';

if ($_POST) {
    // Сохранить файл
    $newFilePath = '';
    $tmpFile = $_FILES['image']['tmp_name'] ?? '';
    
    if ($tmpFile) {
        $newFilePath = 'uploads/' . uniqid() . '_' . basename($_FILES['image']['name']);
        rename($tmpFile, $newFilePath);
    }
    
    // Сохранить пост
    $res = my_query('INSERT INTO `posts` (`name`, `text`, `image`, `tags`) VALUES (?, ?, ?, ?)', [
        $name,
        $text,
        $newFilePath,
        $tags
    ]);
    
    $postId = my_last_insert_id();
?>
<div class="alert alert-success" role="alert">
  Пост успешно добавлен!
  <p><a href="<?php echo site_link('auth/post_view', ['post_id' => intval($postId)]);?>">Перейти в новый пост</a></p>
</div>
<?php
    return;
}

?>

<h2>Создать пост</h2>

<?php include 'edit_post_form.php';?>