<?php

// Админко для постов
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
<ul class="list-inline mt-3">
  <li class="list-inline-item">
    <a href="?action=auth/post_add">
      <i class="fa fa-plus" aria-hidden="true"></i>
      Добавить пост
    </a>
  </li>
</ul>

<?php include 'template/post_search_form.php';?>
<?php include 'template/pagination.php'; ?>

<p class="text-muted">Всего записей: <?php echo $totalRows;?></p>

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
        <a href="<?php echo site_link('auth/post_view', ['post_id' => intval($post['id'])]);?>">
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
<?php

include 'template/pagination.php';

