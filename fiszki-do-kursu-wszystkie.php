<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$kurs_link_id = $_GET['id'];
$zalogowany = $_SESSION['zalogowany'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];

$query = "Select fiszki.fiszki_id,
       fiszki.nazwa ,
       fiszki.opis ,
       fiszki.zdjecie ,
       fiszki.wymowa ,
       fiszki.kurs_kurs_id
   
From fiszki
     where  fiszki.kurs_kurs_id = '$kurs_link_id'";

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
                        <p class="card-text"><?php echo $result['wymowa'] ?></p>
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
?>