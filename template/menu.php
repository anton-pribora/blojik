<?php

$userId = $_SESSION['id'] ?? null;

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/?action=post_list">Список постов</a>
      </li>
      
<?php if ($userId) { ?>

      <li class="nav-item active">
        <a class="nav-link" href="/?action=auth/post_admin">Управление постами</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/?action=logout">Выйти</a>
      </li>
      
<?php } else { ?>

      <li class="nav-item active">
        <a class="nav-link" href="/?action=login">Войти</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/?action=register">Зарегистрироваться</a>
      </li>
<?php } ?>

    </ul>
  </div>
</nav>
  