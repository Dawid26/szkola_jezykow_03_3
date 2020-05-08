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
        $imie = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
        $nazwisko = filter_var($_POST['nazwisko'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $data_dolaczenia = filter_var($_POST['data_dolaczenia'], FILTER_SANITIZE_STRING);
        $miniaturka_zdjecia = filter_var($_POST['miniaturka_zdjecia'], FILTER_SANITIZE_STRING);
        $uprawnienia = filter_var($_POST['uprawnienia'], FILTER_SANITIZE_STRING);
        $query = "UPDATE   student 

    SET student.imie=:imie,
    student.nazwisko= :nazwisko,
     student.email= :email,
    student.miniaturka_zdjecia = :miniaturka_zdjecia,
    student.uprawnienia = :uprawnienia,
    student.data_dolaczenia = :data_dolaczenia
   WHERE student.student_id = :id";

        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'imie' => $imie,
            'nazwisko' => $nazwisko,
            'email' => $email,
            'data_dolaczenia' => $data_dolaczenia,
            'miniaturka_zdjecia' => $miniaturka_zdjecia,
            'uprawnienia' => $uprawnienia,
        ]);


        echo "result" . print_r($result);
        echo "id" . print_r($id);
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


