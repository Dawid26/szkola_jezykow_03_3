<?php
require_once('config.php');

include_once('menu-sprawdzanie.php');



if (!isset($_GET['id'])) {
    //    header('Location:index.php');
    echo "id error1;";
    die();
} else {

 $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    echo 'id' . $id ;
    if (!$id) {
        // header('Location:lista-studenci.php');
        echo "id error2;";
        die();
    } else {
        $query = "Select opinia.tytul,
       opinia.opis,
       opinia.student_student_id,
       opinia.kurs_kurs_id,
       opinia.data_wystawienia,
       opinia.ocena,
       opinia.opinia_id
From opinia
WHERE opinia.opinia_id = :id LIMIT 1"; //'$id'
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $result = $result->fetch();
    }
}
//        print_r($result);
//        print_r($id);
?>

<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-opinie-wszystkie.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id"
                       value="<?php echo $result['opinia_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tytul" class="col-sm-2 col-form-label">tytul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tytul" name="tytul"
                       value="<?php echo $result['tytul'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>">
            </div>
        </div>


        <div class="form-group row">
            <label for="ocena" class="col-sm-2 col-form-label">ocena</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ocena" name="ocena"
                       value="<?php echo $result['ocena'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id"
                       value="<?php echo $result['kurs_kurs_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="student_student_id" class="col-sm-2 col-form-label">student_student_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="student_student_id" name="student_student_id"
                       value="<?php echo $result['student_student_id'] ?>">
            </div>
        </div>

        <button type="submit" name="aktualizujOpinie" class="btn btn-success">Update Record</button>

    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>