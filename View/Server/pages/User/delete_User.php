<?php
include '../Controller/user.php';
$user = new User();
$user->deleteUser($_GET["id"]);
header('Location:Display_User.php');