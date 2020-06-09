<?php
include_once('menu-sprawdzanie-admin.php');
include_once('config.php');
if (!isset($_GET['id'])) {
    //    header('Location:index.php');
    echo "id error1;";
    die();
} else {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    if (!$id) {
        // header('Location:lista-studenci.php');
        echo "id error2;";
        die();
    } else {
        $query = "Select
    kurs.kurs_id,
    kurs.nazwa,
    kurs.opis,
    kurs.cena,
    kurs.zdjecie,
    kurs.data_utworzenia,
    kurs.kategoria_kategoria_id
From
    kurs
WHERE kurs_id = :kurs_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([

            'kurs_id' => $id

        ]);
        $result = $result->fetch();
//        print_r($result);
//        print_r($id);
    }
}

echo $id; ?>


<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-kursy.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id"
                       value="<?php echo $result['kurs_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwa" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo $result['nazwa'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="cena" class="col-sm-2 col-form-label">Cena</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cena" name="cena" value="<?php echo $result['cena'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="zdjecie" class="col-sm-2 col-form-label">Zdjecie</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie"
                       value="<?php echo $result['zdjecie'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">data_utworzenia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="data_utworzenia" name="data_utworzenia"
                       value="<?php echo $result['data_utworzenia'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">kategoria_kategoria_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategoria_kategoria_id" name="kategoria_kategoria_id"
                       value="<?php echo $result['kategoria_kategoria_id'] ?>">
            </div>
        </div>


        <button type="submit" name="updateRecord" class="btn btn-success">Aktualizuj</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>