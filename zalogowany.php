<?php
if (!(isset($_SESSION['zalogowany']))) {

    header('Location: http://localhost/szkola_jezykow_03_3');
}else {
    include_once('menu-start.php');
//    header('Location: http://localhost/szkola_jezykow_03_3');
//    exit;
}