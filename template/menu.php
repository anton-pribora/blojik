<?php

$userId = $_SESSION['id'] ?? null;

$menu = [
    ['active' => $action == 'post_list', 'text' => '<a class="nav-link" href="/?action=post_list">Список постов</a>'],
];

if ($userId) {
    $menu[] = ['active' => preg_match('~^auth/post_~', $action), 'text' => '<a class="nav-link" href="/?action=auth/post_admin"><i class="fa fa-cogs" aria-hidden="true"></i> Управление постами</a>'];
    $menu[] = ['active' => $action == 'logout', 'text' => '<a class="nav-link" href="/?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Выйти</a>'];
} else {
    $menu[] = ['active' => $action == 'register', 'text' => '<a class="nav-link" href="/?action=register"><i class="fa fa-envelope-o" aria-hidden="true"></i> Зарегистрироваться</a>'];
    $menu[] = ['active' => $action == 'login', 'text' => '<a class="nav-link" href="/?action=login"><i class="fa fa-sign-in" aria-hidden="true"></i> Войти</a>'];
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

<?php foreach($menu as $item) { ?>
    <li class="nav-item <?php echo $item['active'] ? 'active bg-warning' : ''?>">
        <?php echo $item['text'];?>
    </li>
<?php } ?>

    </ul>
  </div>
</nav>
  