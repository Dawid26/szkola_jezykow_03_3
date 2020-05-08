<?php
require_once('../config.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}

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
        $nazwa = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
        $link_lekcja_pdf = filter_var($_POST['link_lekcja_pdf'], FILTER_SANITIZE_STRING);
        $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
        $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);

        $query = "UPDATE materialy_do_lekcji
                      SET nazwa = :nazwa,
                      opis = :opis,
                      link_lekcja_pdf = :link_lekcja_pdf,
                      kurs_kurs_id = :kurs_kurs_id
              WHERE materialy_do_lekcji_id = :id";


        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id,
            'nazwa' => $nazwa,
            'link_lekcja_pdf' => $link_lekcja_pdf,
            'opis' => $opis,
            'kurs_kurs_id' => $kurs_kurs_id
        ]);


//        if ($result) {
//            echo "działa"; ?>
<!--            <script>-->
<!--                window.setTimeout(function () {-->
<!--                    window.location = '../materialy-do-lekcji.php';-->
<!--                }, 1000);-->
<!--            </script>-->
<!--            <p></p>-->
<!--            --><?php
//            print_r($result);
//        } else {
//            echo "nie dzia"; ?>
<!--            <script>-->
<!--                window.setTimeout(function () {-->
<!--                    window.location = '../lista-studenci.php';-->
<!--                }, 1000);-->
<!--            </script>-->
<!--            <p></p>-->
<!--            --><?php
//
//        }
        if( $result){
            $uprawnienia = $_SESSION['uprawnienia'];
            if($uprawnienia == 'admin'){?>
                <script>
                    window.setTimeout(function() {
                        window.location = '../materialy-do-lekcji.php';
                    }, 100);
                </script>
                <p></p><?php
            }

            if($uprawnienia == 'nauczyciel'){?>
                <script>
                    window.setTimeout(function() {
                        window.location = '../materialy-do-lekcji-nauczyciel.php';
                    }, 100);
                </script>
                <p></p><?php
            }?>

            <?php
            print_r($result);
        }else{
            echo "nie dzia"; ?>
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-studenci.php';
                }, 10000);
            </script>
            <p></p>
            <?php

        }
    }

}
include_once('../footer.php');



