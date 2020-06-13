<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
//echo $zalogowany;
if ($zalogowany) {
    //header('Location: indexZ.php');
//    echo 'zalogowany';
    //exit();
}
//echo 'get id' . $_GET['id'];
$kurs_link_id = $_GET['id'];
//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);

$zalogowany = $_SESSION['zalogowany'];
$student_id = $_SESSION['student_id'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];
//         $kurs_kurs_id = $_SESSION['kurs_kurs_id'];

//echo 'student id =' . $student_id . ',,';
//	echo 'kurs_kurs_id='. $kurs_kurs_id;

$studentId = $_SESSION['student_id'];
//$kurs_kurs_id = $_SESSION['kurs_kurs_id'];

$query = "Select materialy_do_lekcji.materialy_do_lekcji_id,
       materialy_do_lekcji.nazwa ,
       materialy_do_lekcji.opis ,
       materialy_do_lekcji.link_lekcja_pdf ,
       materialy_do_lekcji.kurs_kurs_id
From materialy_do_lekcji WHERE materialy_do_lekcji.kurs_kurs_id = '$kurs_link_id '";
$results = $db_connection->query($query);
?>
<div class="container">
<?php
foreach ($results as $result) {
    ?>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">

            <div class="card-body">
                <p class="card-text"><?php echo $result['nazwa'] ?></p>
                <p class="card-text"><?php echo $result['opis'] ?></p>
                <p class="card-text"><a href="<?php echo $result['link_lekcja_pdf'] ?>" >Kliknji link</a></p>

            </div>
        </div>
    </div>

    <?php

}
?>


<p></p></br>
</div>
<div class="container">
<?php
include('footer.php');
include('zalogowany.php');
$polaczenie->close();
?>
</div>