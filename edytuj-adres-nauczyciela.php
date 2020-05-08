<?php
include_once('menu-sprawdzanie-admin.php');
include_once('config.php');
if (!isset($_GET['id'])) {
    //    header('Location:index.php');
    die();
} else {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    print_r($id);

    if (!$id) {
        header('Location:lista-studenci.php');
        die();
    } else {
        $query = "Select nauczyciel_adres.miasto,
       nauczyciel_adres.kod_pocztowy,
       nauczyciel_adres.ulica,
       nauczyciel_adres.kraj_zamieszkania_id,
       nauczyciel_adres.nauczyciel_nauczyciel_id
  From nauczyciel_adres WHERE nauczyciel_adres.nauczyciel_nauczyciel_id = '$id' LIMIT 1";
        //:nauczyciel_id
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $result = $result->fetch();
        $kraj = $result['kraj_zamieszkania_id'];
//        if (!isset($kraj)){
//            header("Location: dodaj-adres-nauczyciela2.php?id=".urlencode($id));
//        }
        if (!isset($kraj)) {
//    print_r($kraj);
//    header("Location: dodaj-adres-studenta2.php?id=".urlencode($id));?>
            <script>
                window.setTimeout(function () {
                    window.location = 'dodaj-adres-nauczyciela2.php?id=<?php echo "$id"?>';
                }, 10);
            </script><?php
        }


    }
} ?>
<br>
<div class="container">
    <form method="post" action="akcje/aktualizuj-adres-nauczyciela.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $id ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kraj_zamieszkania_id" class="col-sm-2 col-form-label">Kraj zamieszkania id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kraj_zamieszkania_id" name="kraj_zamieszkania_id"
                       value="<?php echo $result['kraj_zamieszkania_id'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="miasto" class="col-sm-2 col-form-label">Miasto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miasto" name="miasto"
                       value="<?php echo $result['miasto'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kod_pocztowy" class="col-sm-2 col-form-label">Kod pocztowy</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kod_pocztowy" name="kod_pocztowy"
                       value="<?php echo $result['kod_pocztowy'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="ulica" class="col-sm-2 col-form-label">Ulica</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ulica" name="ulica" value="<?php echo $result['ulica'] ?>">
            </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Zmien adres</button>
        <button type="submit" name="updateRecord" class="btn btn-success"><a
                    href="akcje/usun-adres-nauczyciela.php?id=<?php echo $id ?>"> Usuń adres</a></button>
    </form>



<?php
$query2 = "Select
  nazwa,kraj_zamieszkania_id
From
    kraj_zamieszkania";
$results2 = $db_connection->query($query2);
?>

<table class="table mt-4">
    <thead>
    <tr>
        <th> nazwa</th>
        <th> kraj_zamieszkania_id</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($results2 as $result2) {
        ?>
        <tr>
            <td><?php echo $result2['nazwa'] ?></td>
            <td><?php echo $result2['kraj_zamieszkania_id'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>
<?php include('footer.php'); ?>
</body>
</html>