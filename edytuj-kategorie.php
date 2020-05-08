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
        $query = "Select kategoria.nazwa,
       kategoria.opis,
       kategoria.zdjecie,
       kategoria.kategoria_id
From kategoria
WHERE kategoria_id = :kategoria_id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([

            'kategoria_id' => $id

        ]);
        $result = $result->fetch();
        print_r($result);
        print_r($id);
    }
}

?>

<?php include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-kategorie.php">
        <div class="form-group row">
            <label for="kategoria_id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="kategoria_id" name="kategoria_id"
                       value="<?php echo $result['kategoria_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwa" class="col-sm-2 col-form-label">nazwa</label>
            <div class="col-sm-10">
                <input type="nazwa" class="form-control" id="nazwa" name="nazwa" value="<?php echo $result['nazwa'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="<?php echo $result['opis'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="zdjecie" class="col-sm-2 col-form-label">zdjecie</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie"
                       value="<?php echo $result['zdjecie'] ?>">
            </div>
        </div>
</div>


<button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>

</form>
</div>
<?php include('footer.php'); ?>
</body>
</html>