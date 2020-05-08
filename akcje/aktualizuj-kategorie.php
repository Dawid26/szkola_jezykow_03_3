<?php
require_once('../config.php');

if (!isset($_POST['updateRecord'])) {
    //header('Location:../edytuj-studenta.php');
    echo "test1";
    die();
} else {
    if (!isset($_POST['kategoria_id'])) {
        //header('Location: ../edytuj-studenta.php');
        echo "test2";
        die();
    } else {
        $id = filter_var($_POST['kategoria_id'], FILTER_SANITIZE_NUMBER_INT);
        $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
        $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
        $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);

        $query = "UPDATE  kategoria 
   SET  
    kategoria.nazwa= :nazwa,
    kategoria.opis =:opis,
    kategoria.zdjecie =:zdjecie
   WHERE kategoria_id = :id";


        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'nazwa' => $nazwa,
            'opis' => $opis,
            'zdjecie' => $zdjecie,
        ]);


        if ($result) {
            echo "działa"; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-kategorie.php';
                }, 1000);
            </script>
            <p></p>
            <?php
            print_r($result);
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




