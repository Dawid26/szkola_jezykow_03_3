<?php
require_once('../config.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();

}

if (!isset($_POST['updateRecord'])) {
    //header('Location:../edytuj-studenta.p');
    echo "test1";
    die();
} else {
    if (!isset($_POST['id'])) {
        //header('Location: ../edytuj-studenta.php');
        echo "test2";
        die();
    } else {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $kurs_id = filter_var($_POST['kurs_id'], FILTER_SANITIZE_NUMBER_INT);

       $stareIdKurs =  $_SESSION['stareIdKurs'];


        $query = "
UPDATE student_has_kurs SET student_has_kurs.kurs_kurs_id = :kurs_id
WHERE 
      student_has_kurs.kurs_kurs_id = '$stareIdKurs'
  AND student_has_kurs.student_student_id = :id";
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'kurs_id' => $kurs_id,

        ]);


        include('menu.php');
        echo "<p></p>";
        echo "result" . print_r($result);
        echo "<p></p>";
        echo "id" . print_r($id);
        echo "<p></p>";
        if ($result) {
            echo "";
            unset($_SESSION['stareIdKurs']);
            ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../dodaj-studenta-do-kursu.php';
                }, 4000);
            </script>
            <p></p>
            <?php
        } else {
            echo "nie dzia"; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../index.php';
                }, 1000);
            </script>
            <p></p>
            <?php

        }

    }

}
include_once('../footer.php');