<?php

// Тут форма логина
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    $res = my_query('SELECT `id` FROM `users` WHERE `email` = ? AND `password` = ? AND `del` = 0', [
        $email,
        $password
    ]);

    $row = $res->fetch();
    
    if ($row) {
        $_SESSION['id'] = $row['id'];
        header('Location: /');
        exit;
    } else {
        // Пользователь не найден
?>
<div class="alert alert-warning" role="alert">
  Пользователь с таким логином и паролем не найден
</div>
<?php 
    }
}

?>
<form class="form-signin" method="post">
  <h2>Введите логин и пароль</h2>
  <div class="form-label-group">
    <label for="inputEmail">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?php echo htmlescape($email)?>">
  </div>

  <div class="form-label-group">
    <label for="inputPassword">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required value="<?php echo htmlescape($password)?>">
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
</form>
