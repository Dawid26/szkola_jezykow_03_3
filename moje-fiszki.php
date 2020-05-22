<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
//echo $zalogowany;
if ($zalogowany) {
    //header('Location: indexZ.php');
    //echo 'zalogowany';
    //exit();
}

//echo 'get id'.$_GET['id'];
$kurs_link_id = $_GET['id'];

//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
$student_id = $_SESSION['student_id'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];
//         $kurs_kurs_id = $_SESSION['kurs_kurs_id'];

//echo 'student id ='. $student_id .',,';
//	echo 'kurs_kurs_id='. $kurs_kurs_id;
$studentId = $_SESSION['student_id'];
//$kurs_kurs_id = $_SESSION['kurs_kurs_id'];

$query = "Select fiszki.fiszki_id,
       fiszki.nazwa ,
       fiszki.opis ,
       fiszki.zdjecie ,
       fiszki.kurs_kurs_id,
       student_has_kurs.kurs_kurs_id,
       student_has_kurs.student_student_id
From fiszki Inner Join
     student_has_kurs On fiszki.kurs_kurs_id = student_has_kurs.kurs_kurs_id
     where student_has_kurs.student_student_id = '$studentId' AND student_has_kurs.kurs_kurs_id= '$kurs_link_id'";
$results = $db_connection->query($query);


?>
<div class="container">
    <div class="row">
        <?php

        foreach ($results as $result) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="<?php echo $result['zdjecie'] ?>">
                    <div class="card-body">
                        <p class="card-text"><?php echo $result['nazwa'] ?></p>
                        <p class="card-text"><?php echo $result['opis'] ?></p>

                    </div>
                </div>
            </div>

            <?php

        }
        ?>


    </div>
</div>
<p></p></br><?php
include('footer.php');
include('zalogowany.php');
$polaczenie->close();
?>
