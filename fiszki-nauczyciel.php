<?php
require_once('config.php');
include_once('menu-sprawdzanie.php');

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
<?php include('footer.php'); ?>
</body>
</html>


