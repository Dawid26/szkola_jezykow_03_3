<?php
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!isset($_GET['id'])) {
    echo "id error1;";
    die();
} else {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    if (!$id) {
        echo "id error2;";
        die();
    } else {
        $query = "SELECT
    fiszki.fiszki_id,
    fiszki.nazwa,
    fiszki.opis,
    fiszki.wymowa,
    fiszki.zdjecie,
    fiszki.kurs_kurs_id
  FROM  fiszki
WHERE fiszki_id = :fiszki_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'fiszki_id' => $id
        ]);
        $result = $result->fetch();
    }
}
?>
<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-fiszki.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id"
                       value="<?php echo $result['fiszki_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwa" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo $result['nazwa'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="wymowa" class="col-sm-2 col-form-label">Wymowa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="wymowa" name="wymowa" value="<?php echo $result['wymowa']  ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="zdjecie" class="col-sm-2 col-form-label">Zdjęcie link</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie"
                       value="<?php echo $result['zdjecie'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id"
                       value="<?php echo $result['kurs_kurs_id'] ?>" required>
            </div>
        </div>
        <button type="submit" name="updateRecord" class="btn btn-success">Aktualizuj dane</button>
    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>