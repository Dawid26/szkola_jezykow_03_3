
<?php

//	session_start();
//
//	if (!isset($_SESSION['zalogowany']))
//	{
//		header('Location: indexZ.php');
//		exit();
//	}

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

include_once('menu-sprawdzanie.php');
?>
<!--<!DOCTYPE HTML>-->
<!--<html lang="pl">-->
<!--<head>-->
<!--	<meta charset="utf-8" />-->
<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />-->
<!--	<title>szkoła</title>-->
<!--</head>-->
<!---->
<!--<body>-->
<?php //include('menu.php'); ?>
<div class="container">
<?php
//$sql = "SEKECT * FROM student WHERE email='$akcje' AND haslo='$haslo'";
echo "<p>Witaj, jestes zalogowany adresem email " . $_SESSION['email'] . '  <a href="logoutZ.php">  Wyloguj się!</a> </p>';
echo "<p><b>Uprawnienia:</b> " . $_SESSION['uprawnienia'];
//   echo "<p>Ja " .$_SESSION['student'].'</p>'
//	echo "<p><b>E-mail</b>: ".$_SESSION['nazwisko'];

include('footer.php');
?>
</div>
</body>
</html>