<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');

$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
echo $zalogowany;
if ($zalogowany) {
    //header('Location: indexZ.php');
    echo 'zalogowany';
    //exit();
}
//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
$student_id = $_SESSION['student_id'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];
$kurs_kurs_id = $_SESSION['kurs_kurs_id'];
echo 'student id =' . $student_id . ',,';
echo 'kurs_kurs_id=' . $kurs_kurs_id;

$studentId = $_SESSION['student_id'];
$kurs_kurs_id = $_SESSION['kurs_kurs_id'];

$query = "Select
    kurs.kurs_id,
    kurs.nazwa,
    kurs.opis,
    kurs.zdjecie,
    kurs.kategoria_kategoria_id,
    kurs.nauczyciel_nauczyciel_id
  From
    kurs where kurs.kurs_id = '$kurs_kurs_id';
    ";
$results = $db_connection->query($query);

include('menu.php');

?>
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

} ?>
    <p></p></br><?php
include('footer.php');
$polaczenie->close();
?>