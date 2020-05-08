<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);


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
foreach ($results as $result) {
    ?>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="<?php echo $result['zdjecie'] ?>">
            <div class="card-body">
                <p class="card-text"><?php echo $result['nazwa'] ?></p>
                <p class="card-text"><?php echo $result['opis'] ?></p>
                <p class="card-text">Cena:<?php echo $result['cena'] ?></p>
            </div>
        </div>
    </div>

    <?php

} ?>
<p></p></br><?php
include('footer.php');
$polaczenie->close();
?>
