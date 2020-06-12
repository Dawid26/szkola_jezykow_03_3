<?php
require_once "connect.php";
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: indexZ.php');
    exit();
}


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
//potem dodać @new mysqli
if ($polaczenie->connect_errno != 0) {
    echo "Error: " . $polaczenie->connect_errno . "opis" . $polaczenie->connect_error;
    //potem usunać"opis" .$polaczenie->connect_error;
} else {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];


    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    // dodac = @$polaczenie
    if ($rezultat = $polaczenie->query(
        sprintf("SELECT * FROM nauczyciel WHERE email='%s'",
            mysqli_real_escape_string($polaczenie, $login)))) {
        $ilu_userow = $rezultat->num_rows;
        if ($ilu_userow > 0) {
            $wiersz = $rezultat->fetch_assoc();
            //  $sql = "SEKECT * FROM student WHERE email='$akcje' AND haslo='$haslo'";
            //	$student =$wiersz['imie'];
            //     $_SESSION['student'] = $student;
            //	echo $student;
            if (password_verify($haslo, $wiersz['haslo'])) {
                $_SESSION['zalogowany'] = true;
                $_SESSION['as,in_id'] = $wiersz['admin_id'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['imie'] = $wiersz['imie'];
                $_SESSION['nazwisko'] = $wiersz['nazwisko'];
                $_SESSION['uprawnienia'] = $wiersz['uprawnienia'];


                unset($_SESSION['blad']);
                $rezultat->free_result();
                header('Location: ../witaj.php');
            } else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
                header('Location: indexZ.php');
            }

        } else {

            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy email lub hasło!</span>';
            header('Location: indexZ.php');

        }

    }

    $polaczenie->close();
}
include('menu.php');
?>

