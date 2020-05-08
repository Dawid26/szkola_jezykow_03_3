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
<?php
//$sql = "SEKECT * FROM student WHERE email='$akcje' AND haslo='$haslo'";
//echo "<p>Dziękujemy za zakup kursu " . isset($_SESSION['email']) . '  <a href="logoutZ.php">  Wyloguj się!</a> </p>';
echo ' <p>Dziękujemy za zakup kursu' . (isset($_SESSION['email']) ?  $_SESSION['email'] .'</p>': ' ' . 'nieznajomy');
echo ' ' . ($_SESSION["uprawnienia"] ? "<p><b>Uprawnienia:</b> " . $_SESSION['uprawnienia'] .'</p>': ' ' . 'Brak danych');
echo ' ' . (isset($_SESSION["cena_calkowita"]) ? "<p><b>Kwota do zapłaty za ostatnie zakupy to :</b> " . $_SESSION["cena_calkowita"] .'</p>' : '<b>Kwota do zapłaty za ostatnie zakupy to :</b> ' . 'Brak danych');
echo "<p><b>Numer Konta: 0000 1111 0000 1111 0000 1111</b> ";
unset($_SESSION["koszyk_karta"]);
//   echo "<p>Ja " .$_SESSION['student'].'</p>'
//	echo "<p><b>E-mail</b>: ".$_SESSION['nazwisko'];

include('footer.php');
?>

</body>
</html>