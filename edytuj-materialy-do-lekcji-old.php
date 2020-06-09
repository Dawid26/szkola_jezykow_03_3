<?php
include_once('menu-sprawdzanie-admin.php');

if (!isset($_GET['id'])) {
    //header('Location:edytuj-studenta.php');
    echo 'error';
    die();
} else {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    if (!$id) {
        header('Location:lista-studenci.php');
        die();
    } else {
        $query = "Select
    materialy_do_lekcji.materialy_do_lekcji_id,
    materialy_do_lekcji.nazwa,
    materialy_do_lekcji.opis,
    materialy_do_lekcji.link_lekcja_pdf,
    materialy_do_lekcji.kurs_kurs_id
From
    materialy_do_lekcji WHERE materialy_do_lekcji_id = :materialy_do_lekcji_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'materialy_do_lekcji_id' => $id
        ]);
        $result = $result->fetch();
    }
}

?>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Edit a Record</title>-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/bootstrap.css">-->
<!--</head>-->
<!--<body>-->
<?php include('menu.php'); ?>
<?php echo $_GET['id']; ?>
<br>
<div class="container">
    <form method="post" action="update-materialy-do-lekcji-old.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="materialy_do_lekcji_id"
                       name="materialy_do_lekcji_id" value="<?php echo $result['materialy_do_lekcji_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="imie" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo $result['nazwa'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">link_lekcja_pdf</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link_lekcja_pdf" name="link_lekcja_pdf"
                       value="<?php echo $result['link_lekcja_pdf'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="miniaturka_zdjecia" class="col-sm-2 col-form-label">kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id"
                       value="<?php echo $result['kurs_kurs_id'] ?>">
            </div>
        </div>
        <button type="submit" name="updateRecord" class="btn btn-success">Aktualizuj</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>