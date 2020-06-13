<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
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
From kurs";
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
                <td class="text-center">Fiszki<a href="fiszki-do-kursu-wszystkie.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center">materialy <a href="materialy-do-kursu-wszystkie.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
            </div>
        </div>
    </div>
    <?php
}?>
<p></p></br></div>
<?php
include('footer.php');

?>
