<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
$zalogowany = $_SESSION['zalogowany'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];

$query = "Select
       kurs.kategoria_kategoria_id,
       kurs.data_utworzenia,
       kurs.zdjecie,
       kurs.cena,
       kurs.opis,
       kurs.nazwa,
       kurs.kurs_id
From kurs ";
?>
<div class="container-fluid">
    <?php
    $results = $db_connection->query($query);
    foreach ($results

             as $result) {
//        $i = 0;
//        if ($i % 3 == 0) {
//            echo '<div class="card-group">';
//        }
//        $i++;
//  ?>
        <div class="col-12 col-sm-12 col-lg-6 col-xl-4">

            <!--        <div class="card mb-4 box-shadow">-->
            <div class="card p-2 m-2">
                <img class="card-img-top " src="<?php echo $result['zdjecie'] ?>">
                <div class="card-body">
                    <p class="card-tittle"><b><?php echo $result['nazwa'] ?></b></p>
                    <p class="card-text"><?php echo $result['opis'] ?></p>
                    <a href="fiszki-do-kursu-wszystkie.php?id=<?php echo $result['kurs_id'] ?>">
                        Fiszki
                        <i class="fas fa-edit "></i></a>
                    <a href="materialy-do-kursu-wszystkie.php?id=<?php echo $result['kurs_id'] ?>">
                        materialy
                        <i class="fas fa-edit "></i></a>
                    <a href="lista-fiszki-admin.php?id=<?php echo $result['kurs_id'] ?>">Edytuj fiszki <i
                            class="fas fa-edit "></i></a>
                    <!--                <span class="text-center">Fiszki<a href="fiszki-do-kursu-wszystkie.php?id=-->
                    <?php //echo $result['kurs_id'] ?><!--"> <i-->
                    <!--                                class="fas fa-edit "></i></a></span>-->
                    <!--                <span class="text-center">materialy <a href="materialy-do-kursu-wszystkie.php?id=-->
                    <?php //echo $result['kurs_id'] ?><!--"> <i-->
                    <!--                                class="fas fa-edit "></i></a></span>-->
                    <!--                <span class="text-center">Edytuj fiszki<a href="lista-fiszki-admin.php?id=-->
                    <?php //echo $result['kurs_id'] ?><!--"> <i-->
                    <!--                                class="fas fa-edit "></i></a></span>-->
                </div>
            </div>
        </div>
        <?php

//        if ($i % 3 == 0) {
//            echo '</div>';
//        }
//        $i++;

    } ?>
</div>

<?php
include('footer.php');

?>
<?php include('zalogowany.php'); ?>