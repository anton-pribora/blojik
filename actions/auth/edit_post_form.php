<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Название</label>
    <input name="name" type="text" class="form-control" placeholder="Название поста" value="<?php echo htmlescape($name)?>">
  </div>
  <div class="form-group">
    <label>Текст</label>
    <textarea name="text" class="form-control" placeholder="Текст поста"><?php echo htmlescape($text)?></textarea>
  </div>
  <div class="form-group">
    <label>Изображение</label>
    <input name="image" type="file" class="form-control-file" accept="image/x-png,image/gif,image/jpeg">
  </div>
  <div class="form-group">
    <label>Тэги</label>
    <input name="tags" type="text" class="form-control" placeholder="Тэги (через запятую)" value="<?php echo htmlescape($tags)?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>