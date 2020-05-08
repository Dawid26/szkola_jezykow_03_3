<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();

}

if (!isset($_GET['id'])) {
    //    header('Location:index.php');
    echo "id test1;";
    die();
} else {

    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    $kurs_id = (filter_var($_GET['kurs_id'], FILTER_VALIDATE_INT));
    $_SESSION['stareIdKurs'] =  $_GET['kurs_id'] ;
  //  print_r($id);
    if (!$id) {
        //header('Location:lista-studenci.php');
        echo "id test2;";
        die();
    } else {
        $query = "SELECT kurs_kurs_id, nauczyciel_nauczyciel_id FROM `kurs_has_nauczyciel` WHERE kurs_kurs_id=:kurs_id AND nauczyciel_nauczyciel_id=:id LIMIT 1";
        //:nauczyciel_id
        $result = $db_connection->prepare($query);
    }
}
//$kraj = $result['kraj_zamieszkania_id'];
//if (!$kraj) {
//    header("Location: dodaj-adres-nauczyciela2.php?id=".urlencode($id));
//}
// ?>

<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-kurs-nauczyciela.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Id Nauczyciel</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $id ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kurs_id" class="col-sm-2 col-form-label">Kurs id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_id" name="kurs_id"
                       value="<?php echo $kurs_id ?>">
            </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Zmien kurs</button>

    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>