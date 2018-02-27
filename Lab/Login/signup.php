<?php
require 'base.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email',$_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);


  if ($stmt->execute()) {
    $message = 'Creado Usuario Exitosamente';
  } else {
    $message = 'Ha ocurrido un error';
  }

}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
   <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>

    <?php require 'header/header.php' ?>

    <br><br><br><br>

    <?php if (!empty($message)):  ?>
      <p><?= $message ?></p>
    <?php endif; ?>


    <h1> Registro </h1>

    <form action="signup.php" method="post">
      <input type="text" required name="email" placeholder="Ingrese su email">
      <input type="password" required name="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Crear mi cuenta">
    </form>

  </body>
</html>
