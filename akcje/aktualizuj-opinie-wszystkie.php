<?php
require_once('../config.php');

if (!isset($_POST['aktualizujOpinie'])) {
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
        $tytul= filter_var($_POST['tytul'], FILTER_SANITIZE_STRING);
        $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
        $ocena = filter_var($_POST['ocena'], FILTER_SANITIZE_STRING);
        $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);
        $student_student_id = filter_var($_POST['student_student_id'], FILTER_SANITIZE_STRING);

        $query = "UPDATE   opinia 
SET opinia.tytul=:tytul,
    opinia.opis= :opis,
    opinia.ocena= :ocena,
    opinia.kurs_kurs_id = :kurs_kurs_id,
    opinia.student_student_id = :student_student_id
   WHERE opinia.opinia_id = :id";

        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'tytul' => $tytul,
            'opis' => $opis,
            'ocena' => $ocena,
            'kurs_kurs_id' => $kurs_kurs_id,
            'student_student_id' => $student_student_id
        ]);


        echo "result" . print_r($result);
//        echo "id" . print_r($id, $imie);
        if ($result) {
            echo ""; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-opinie-wszystkie.php';
                }, 10);
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



