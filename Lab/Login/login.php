<?php

    session_start();

if (isset($_SESSION['user_id'])) {
  header('Location:  /Scientific-Method/Lab');
}

  require 'base.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('Location: /Scientific-Method/Lab/Login/a.php');
    } else {
      $message = 'Lo siemto tus datos no coinciden';
    }

  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sesión</title>
   <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
   <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>


    <?php require 'header/header.php' ?>

    <br><br><br><br>

    <h1> Sesión </h1>


    <?php   if (!empty($message)) : ?>
      <p><?= $message ?></p>
  <?php endif; ?>

    <form action="login.php" method="post">
      <input type="text" required name="email" placeholder="Ingrese un usuario">
      <input type="password" required name="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Iniciar Sesión">
    </form>

  </body>
</html>
