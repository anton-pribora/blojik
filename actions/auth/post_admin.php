<?php

// Админко для постов

$res = my_query('SELECT * FROM `posts` ORDER BY `creation_time` DESC');
$posts = $res->fetchAll();

?>
<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="?action=auth/post_add">Добавить пост</a>
  </li>
</ul>

<?php

?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Имя</th>
      <th>Текст</th>
      <th>Изображение</th>
      <th>Тэги</th>
      <th>Время создания</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($posts as $post) {?>
    <tr>
      <td>
        <a href="?action=auth/post_view&post_id=<?php echo intval($post['id']);?>">
          <?php echo htmlescape($post['name']) ?: '(без имени)';?>
        </a>
      </td>
      <td><?php echo htmlescape($post['text'], true);?></td>
      <td><?php echo htmlescape($post['image']);?></td>
      <td><?php echo htmlescape($post['tags']);?></td>
      <td><?php echo htmlescape($post['creation_time']);?></td>
    </tr>
  <?php }?>
  </tbody>
</table>