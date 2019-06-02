<?php

// Форма отображения поста

$postId = $_GET['post_id'] ?? '';

if (empty($postId)) {
    echo "Не указан идентификатор поста!!!!!!!!";
    return;
}

$res = my_query('SELECT * FROM `posts` WHERE `id` = ?', [
    $postId
]);

$post = $res->fetch();

if (!$post) {
    echo "Не указан пост не найден!!!!!!!!";
    return;
}