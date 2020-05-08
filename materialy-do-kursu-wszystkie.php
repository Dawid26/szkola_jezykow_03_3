<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}

$zalogowany = $_SESSION['zalogowany'];
$kurs_link_id = $_GET['id'];
$zalogowany = $_SESSION['zalogowany'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];


$query = "Select materialy_do_lekcji.materialy_do_lekcji_id,
       materialy_do_lekcji.nazwa ,
       materialy_do_lekcji.opis ,
       materialy_do_lekcji.link_lekcja_pdf ,
       materialy_do_lekcji.kurs_kurs_id
From materialy_do_lekcji WHERE materialy_do_lekcji.kurs_kurs_id = '$kurs_link_id '";

$results = $db_connection->query($query);
foreach ($results as $result) {
    ?>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">

            <div class="card-body">
                <p class="card-text"><?php echo $result['nazwa'] ?></p>
                <p class="card-text"><?php echo $result['opis'] ?></p>
                <a href="<?php echo $result['link_lekcja_pdf'] ?>">  <p class="card-text"><?php echo $result['link_lekcja_pdf'] ?></p>
                </a>
            </div>
        </div>
    </div>
    <?php
}
?>
<p></p></br><?php
include('footer.php');?>