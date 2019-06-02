<?php

// Тут форма регистрации

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($_POST) {
    // Ура! У нас новый пользователь
    try {
        my_query("INSERT INTO `users` (`name`, `email`, `password`, `del`) VALUES (?, ?, ?, ?)", [
            $name,
            $email,
            $password,
            0
        ]);
        
?>
<div class="alert alert-success" role="alert">
  Пользователь успешно зарегистрирован
</div>
<?php
        return;
    } catch(Exception $e) {
?>
<div class="alert alert-danger" role="alert">
  Произошла ошибка: такой email уже зарегистрирован
</div>
<?php
    }
}

?>
<form class="form-signin" method="post">
  <h2>Зарегистрироваться</h2>
  <div class="form-label-group">
    <label>Имя</label>
    <input name="name" type="text" class="form-control" placeholder="Ваше имя" required autofocus value="<?php echo $name;?>">
  </div>

  <div class="form-label-group">
    <label>Email address</label>
    <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus value="<?php echo $email;?>">
  </div>

  <div class="form-label-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password" required value="<?php echo $password;?>">
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
</form>
