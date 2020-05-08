<?php
require_once('../config.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
if(!isset($_POST['updateRecord'])){
   //header('Location:../edytuj-studenta.php');
   echo "test1";
    die();
    } else {
        if(!isset($_POST['id'])){
            //header('Location: ../edytuj-studenta.php');
            echo "test2";
            die();
        }   else {
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $nazwa= filter_var($_POST['nazwa']);
            $opis = filter_var($_POST['opis']);
            $wymowa = filter_var($_POST['wymowa']);
            $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);
            $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_NUMBER_INT);

            $query =    "UPDATE  fiszki 
   SET  
    fiszki.nazwa= :nazwa,
    fiszki.opis =:opis,
    fiszki.zdjecie =:zdjecie,
    fiszki.wymowa =:wymowa,
    fiszki.kurs_kurs_id =:kurs_kurs_id
   WHERE fiszki_id = :id";




            $result = $db_connection->prepare($query);
            $result->execute([
                'id'                => $id,
                'nazwa'              => $nazwa,
                'opis'          => $opis,
                'zdjecie'   => $zdjecie,
                'wymowa'   => $wymowa,
                'kurs_kurs_id'   => $kurs_kurs_id
            ]);




if( $result){
    $uprawnienia = $_SESSION['uprawnienia'];
    if($uprawnienia == 'admin'){?>
<!--    <script>-->
<!--        window.setTimeout(function() {-->
<!--            window.location = '../lista-fiszki-admin.php?id='--><?php //echo $kurs_kurs_id //;
//        }, 1000);?>
<!--//    </script>-->
<!--//    <p></p>-->
        <?php
        header('Location: ../lista-fiszki-admin.php?id='.$kurs_kurs_id);
        exit();
        ?>
        <?php
}

    if($uprawnienia == 'nauczyciel'){?>
    <script>
        window.setTimeout(function() {
            window.location = '../lista-fiszki-nauczyciel.php';
        }, 1000);
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



