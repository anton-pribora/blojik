<?php 

if (!isset($searchText)) {
    $searchText = '';
}

?>
<form class="form-inline" method="get" action="">
  <input type="hidden" name="action" value="<?php echo htmlescape($action)?>">
  <input name="s" type="text" class="form-control mb-2 mr-sm-2" placeholder="Название поста" value="<?php echo htmlescape($searchText);?>">

  <button type="submit" class="btn btn-outline-primary mb-2">Найти</button>
</form>