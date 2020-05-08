<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

//$query = "Select
//    fiszki.kurs_id,
//    fiszki.nazwa,
//    fiszki.opis,
//    fiszki.cena,
//    fiszki.zdjecie,
//    fiszki.data_utworzenia,
//    fiszki.kategoria_kategoria_id,
//    fiszki.nauczyciel_nauczyciel_id
//From
//    kurs";
$query = "Select
    fiszki.fiszki_id,
    fiszki.nazwa,
    fiszki.opis,
    fiszki.zdjecie,
    fiszki.kurs_kurs_id
  From
    fiszki";

$results = $db_connection->query($query);
?>
<?php

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();

}

if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>

<?php include('menu.php'); ?>
    <!-- Page Content -->
    <div class="container">

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Thumbnail Gallery</h1>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="zdjecia/pies2.jpg" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="zdjecia/pies2.jpg" alt="">
                    <figcaption class="figure-caption">A caption for the above image.</figcaption>
                </a>

            </div>


            <!-- /.container -->

        </div>
        <!-- /.container -->
<?php include('footer.php');