<?php
require_once('config.php');
include_once('menu-sprawdzanie.php');

//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
    $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
    $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);
    $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);


    $query = "INSERT INTO fiszki ( nazwa, opis, zdjecie, kurs_kurs_id)
                       VALUES ( :nazwa, :opis, :zdjecie, :kurs_kurs_id)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'nazwa' => $nazwa,
        'opis' => $opis,
        'zdjecie' => $zdjecie,
        'kurs_kurs_id' => $kurs_kurs_id,
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-fiszki.php';
            }, 1000);
        </script>
        <p></p>
        <?php
        print_r($result);
    }
} else {
    echo "error";
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="nazwa" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="zdjecie" class="col-sm-2 col-form-label">zdjecie</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id" value="">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj fiszke</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>