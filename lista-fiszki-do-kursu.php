<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
//echo $zalogowany;
if ($zalogowany) {
    //header('Location: indexZ.php');
//        echo 'zalogowany';
    //exit();
}

//echo 'get id'.$_GET['id'];
$kurs_link_id = $_GET['id'];


$query = "Select 
    fiszki.fiszki_id,
    fiszki.nazwa,
    fiszki.opis,
    fiszki.zdjecie,
    fiszki.wymowa,
    fiszki.kurs_kurs_id
From fiszki WHERE fiszki.kurs_kurs_id = '$kurs_link_id'";
$results = $db_connection->query($query);
//print_r($results);
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

$polaczenie->close();
?>
