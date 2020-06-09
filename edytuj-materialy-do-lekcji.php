<?php
require_once('config.php');
include_once('menu-sprawdzanie.php');

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
    materialy_do_lekcji.materialy_do_lekcji_id,
    materialy_do_lekcji.nazwa,
    materialy_do_lekcji.opis,
    materialy_do_lekcji.link_lekcja_pdf,
    materialy_do_lekcji.kurs_kurs_id
From
    materialy_do_lekcji
WHERE materialy_do_lekcji_id = :materialy_do_lekcji_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([

            'materialy_do_lekcji_id' => $id

        ]);
        $result = $result->fetch();
//        print_r($result);
//        print_r($id);
    }
}

?>

<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-materialy-do_lekcji.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id"
                       value="<?php echo $result['materialy_do_lekcji_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="imie" class="col-sm-2 col-form-label">nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="imie" name="imie" value="<?php echo $result['nazwa'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">link_lekcja_pdf</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link_lekcja_pdf" name="link_lekcja_pdf"
                       value="<?php echo $result['link_lekcja_pdf'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">Kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id"
                       value="<?php echo $result['kurs_kurs_id'] ?>">
            </div>
        </div>


        <button type="submit" name="updateRecord" class="btn btn-success">Aktualizuj</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>