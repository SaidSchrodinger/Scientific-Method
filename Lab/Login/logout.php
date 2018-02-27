<?php
session_start();

session_unset();

session_destroy();

header('Location: /Scientific-Method/Lab/Login');

 ?>
