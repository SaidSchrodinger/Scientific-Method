<?php

session_start();

require 'base.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

$user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}

 ?>



<html>
  <head>
    <meta charset="utf-8">
    <title> Scientific Method </title>
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>


<?php  require 'header/header2.php' ?>

<?php if (!empty($user)): ?>
  <br>Bienvenido <?= $user['email'] ?>
  <br>Has ingresado a Scientific Method

  <?php include '../Page/dos.php' ?>

<?php else: ?>


<?php endif; ?>


  </body>
</html>
