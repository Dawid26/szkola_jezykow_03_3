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
//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);

$zalogowany = $_SESSION['zalogowany'];
$student_id = $_SESSION['student_id'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];

//echo 'student id =' . $student_id . ',,';


$studentId = $_SESSION['student_id'];


$query = "Select student_has_kurs.student_student_id,
       student_has_kurs.kurs_kurs_id,
       kurs.kategoria_kategoria_id,
       kurs.data_utworzenia,
       kurs.zdjecie,
       kurs.cena,
       kurs.opis,
       kurs.nazwa,
       kurs.kurs_id
From kurs Inner Join
     student_has_kurs On student_has_kurs.kurs_kurs_id = kurs.kurs_id
     WHERE
     student_has_kurs.student_student_id = '$studentId' ORDER BY kurs.nazwa ASC
    ";
$results = $db_connection->query($query);
?>
<div class="container-fluid">
<?php
foreach ($results as $result) {
    ?>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="<?php echo $result['zdjecie'] ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $result['nazwa'] ?></p>
                <p class="card-text"><?php echo $result['opis'] ?></p>
                <td class="text-center">Fiszki<a href="moje-fiszki.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center">materialy <a href="moje-materialy.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
            </div>
        </div>
    </div>

    <?php

} ?>
<p></p></br>
</div>
<?php
include('footer.php');
$polaczenie->close();
?>
