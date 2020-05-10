<?php
require_once('config.php');

include_once('menu-sprawdzanie-admin.php');
//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
    $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
    $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);


    $query = "INSERT INTO kategoria  ( nazwa, opis,  zdjecie)
                       VALUES ( :nazwa, :opis, :zdjecie)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'nazwa' => $nazwa,
        'opis' => $opis,
        'zdjecie' => $zdjecie,
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-kategorie.php';
            }, 50000);
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
            <label for="imie" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="">
            </div>
        </div>


        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">Zdjecie</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie" value="">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj kategorie</button>

    </form>
</div>
<?php

$query2 = "Select
kategoria.nazwa,
kategoria.kategoria_id, 
kategoria.opis, 
kategoria.zdjecie
From
    kategoria";

$results2 = $db_connection->query($query2);
?>
<div class="container">
<table class="table">
    <thead>
    <tr>
        <th> kategoria_id</th>
        <th> nazwa</th>
        <th> opis</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($results2 as $result2) {
        ?>
        <tr>
            <td><?php echo $result2['kategoria_id'] ?></td>
            <td><?php echo $result2['nazwa'] ?></td>
            <td><?php echo $result2['opis'] ?></td>
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