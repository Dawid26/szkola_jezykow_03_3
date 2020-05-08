<?php
require_once('../config.php');

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
        $kraj_zamieszkania_id = filter_var($_POST['kraj_zamieszkania_id'], FILTER_SANITIZE_NUMBER_INT);
        $miasto = filter_var($_POST['miasto'], FILTER_SANITIZE_STRING);
        $kod_pocztowy = filter_var($_POST['kod_pocztowy'], FILTER_SANITIZE_STRING);
        $ulica = filter_var($_POST['ulica'], FILTER_SANITIZE_STRING);
        $query = "UPDATE   student_adres 

    SET 
    student_adres.miasto = :miasto,
    student_adres.kod_pocztowy = :kod_pocztowy,
    student_adres.ulica = :ulica,
    student_adres.kraj_zamieszkania_id = :kraj_zamieszkania_id
   WHERE student_adres.student_student_id = :id";

        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'kraj_zamieszkania_id' => $kraj_zamieszkania_id,
            'miasto' => $miasto,
            'kod_pocztowy' => $kod_pocztowy,
            'ulica' => $ulica
        ]);


        include('menu.php');
        echo "<p></p>";
        echo "result" . print_r($result);
        echo "<p></p>";
        echo "id" . print_r($id);
        echo "<p></p>";
        if ($result) {
            echo ""; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-studenci.php';
                }, 1000);
            </script>
            <p></p>
            <?php
        } else {
            echo "nie dzia"; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-studenci.php';
                }, 1000);
            </script>
            <p></p>
            <?php

        }

    }

}
include_once('../footer.php');