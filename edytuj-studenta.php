<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');


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
      student.student_id,
       student.imie,
       student.email,
       student.nazwisko,
       student.data_dolaczenia,
       student.miniaturka_zdjecia,
       student.uprawnienia
  From student WHERE student.student_id = :id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $result = $result->fetch();
    }
}

?>
<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-studenta.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id"
                       value="<?php echo $result['student_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="imie" class="col-sm-2 col-form-label">Imię</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="imie" name="imie" value="<?php echo $result['imie'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">Nazwisko</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwisko" name="nazwisko"
                       value="<?php echo $result['nazwisko'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $result['email'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">Data dołączenia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="data_dolaczenia" name="data_dolaczenia"
                       value="<?php echo $result['data_dolaczenia'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="miniaturka_zdjecia" class="col-sm-2 col-form-label">Miniaturka zdjęcia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miniaturka_zdjecia" name="miniaturka_zdjecia"
                       value="<?php echo $result['miniaturka_zdjecia'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="uprawnienia" class="col-sm-2 col-form-label">Uprawnienia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="uprawnienia" name="uprawnienia"
                       value="<?php echo $result['uprawnienia'] ?>">
            </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Aktualizuj dane</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>