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
        //  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
        $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
        $cena = filter_var($_POST['cena'], FILTER_SANITIZE_STRING);
        $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);
//            $data_utworzenia = filter_var($_POST['data_utworzenia'], FILTER_SANITIZE_STRING);
        $kategoria_kategoria_id = filter_var($_POST['kategoria_kategoria_id'], FILTER_SANITIZE_NUMBER_INT);
        $nauczyciel_nauczyciel_id = filter_var($_POST['nauczyciel_nauczyciel_id'], FILTER_SANITIZE_NUMBER_INT);

        $query = "INSERT INTO `kurs` (`kurs_id`, `nazwa`, `opis`, `cena`, `zdjecie`, `data_utworzenia`, `kategoria_kategoria_id`, `nauczyciel_nauczyciel_id`) 
VALUES (NULL, :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id);";


        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'nazwa' => $nazwa,
            'opis' => $opis,
            'cena' => $cena,
            'zdjecie' => $zdjecie,
//                'data_utworzenia'   => $data_utworzenia,
            'kategoria_kategoria_id' => $kategoria_kategoria_id,
            'nauczy00ciel_nauczyciel_id' => $nauczyciel_nauczyciel_id,
        ]);


        if ($result) {
            echo "działa"; ?>
            <!--    <script>-->
            <!--        window.setTimeout(function() {-->
            <!--            window.location = '../lista-kursy.php';-->
            <!--        }, 5000);-->
            <!--    </script>-->
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
?>
include_once('../footer.php');


