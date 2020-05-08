<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');


if (!isset($_POST['updateRecord'])) {
    //header('Location: edytuj-studenta.php');
    //die();
    echo "materialy id error 1";
} else {
    if (!isset($_POST['id'])) {
//        header('Location: edytuj-studenta.php');
//        die();
        echo "materialy id error 2";
    } else {
        $id = filter_var($_POST['materialy_do_lekcji_id'], FILTER_SANITIZE_NUMBER_INT);
        $nazwa = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
        $link_lekcja_pdf = filter_var($_POST['link_lekcja_pdf'], FILTER_SANITIZE_STRING);
        $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);
        $query = "UPDATE materialy_do_lekcji
                      SET nazwa = :nazwa,
                      opis = :opis,
                      link_lekcja_pdf = :link_lekcja_pdf,
                      kurs_kurs_id = :kurs_kurs_id
              WHERE materialy_do_lekcji_id = :id";

        $query = "Select
    materialy_do_lekcji.materialy_do_lekcji_id,
    materialy_do_lekcji.nazwa,
    materialy_do_lekcji.opis,
    materialy_do_lekcji.link_lekcja_pdf,
    materialy_do_lekcji.kurs_kurs_id
From
    materialy_do_lekcji
WHERE materialy_do_lekcji_id = :materialy_do_lekcji_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'nazwa' => $nazwa,
            'link_lekcja_pdf' => $link_lekcja_pdf,
            '$kurs_kurs_id' => $kurs_kurs_id,
            'materialy_do_lekcji_id' => $id,

        ]);
    }

}
