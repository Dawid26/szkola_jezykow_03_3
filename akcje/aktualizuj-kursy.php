<?php
require_once('../config.php');

if (!isset($_POST['updateRecord'])) {
    //header('Location:../edytuj-studenta.php');
    echo "test1";
    die();
} else {
    if (!isset($_POST['id'])) {
        //header('Location: ../edytuj-studenta.php');
        echo "test2";
        die();
    } else {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
        $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
        $cena = filter_var($_POST['cena'], FILTER_SANITIZE_STRING);
        $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);
        $data_utworzenia = filter_var($_POST['data_utworzenia'], FILTER_SANITIZE_STRING);
        $kategoria_kategoria_id = filter_var($_POST['kategoria_kategoria_id'], FILTER_SANITIZE_STRING);

        $query = "UPDATE  kurs 
   SET  
    kurs.nazwa= :nazwa,
    kurs.opis =:opis,
    kurs.cena =:cena,
    kurs.zdjecie =:zdjecie,
    kurs.data_utworzenia =:data_utworzenia,
    kurs.kategoria_kategoria_id= :kategoria_kategoria_id
   WHERE kurs.kurs_id = :id";


        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'nazwa' => $nazwa,
            'opis' => $opis,
            'cena' => $cena,
            'zdjecie' => $zdjecie,
            'data_utworzenia' => $data_utworzenia,
            'kategoria_kategoria_id' => $kategoria_kategoria_id,
        ]);


        if ($result) {
            echo "działa";
            echo "<br>";
            print_r($result);; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-kursy.php';
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




