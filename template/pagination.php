<?php

$prevLink = rel_link(['p' => $currentPage - 1]);
$nextLink = rel_link(['p' => $currentPage + 1]);

?>
<?php if ($totalPages > 1) { ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="<?php echo $prevLink;?>">Назад</a></li>
<?php 
for ($page = 0; $page < $totalPages; $page += 1) { 
    $link = rel_link(['p' => $page]);
?>
    <li class="page-item <?php echo $page == $currentPage ? 'active' : '';?>"><a class="page-link" href="<?php echo $link; ?>"><?php echo $page + 1;?></a></li>
<?php } ?>
    <li class="page-item"><a class="page-link" href="<?php echo $nextLink;?>">Вперёд</a></li>
  </ul>
</nav>
<?php } ?>
