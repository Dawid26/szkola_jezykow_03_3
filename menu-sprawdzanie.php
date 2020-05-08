<?php
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}

$uprawnienia = false;
if ((isset($_SESSION['zalogowany']))) {
    $uprawnienia = $_SESSION['uprawnienia'];
    if (($uprawnienia != 'nauczyciel') && ($uprawnienia != 'admin') && ($uprawnienia != 'student')) {
        include_once('menu-start.php');
    }
} else {
    include_once('menu-start.php');
}

if ((isset($_SESSION['zalogowany']))) {
    $uprawnienia = $_SESSION['uprawnienia'];

    if ($uprawnienia == 'student') {
   //     echo $uprawnienia;
        include_once('menu-student.php');
    }
    if ($uprawnienia == 'admin') {
      //  echo $uprawnienia;
        include_once('menu-admin.php');
    }
    if ($uprawnienia == 'nauczyciel') {
     //   echo $uprawnienia;
        include_once('menu-nauczyciel.php');
    }

}
