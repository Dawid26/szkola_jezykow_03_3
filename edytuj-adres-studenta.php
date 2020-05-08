<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
if (!isset($_GET['id'])) {
    //    header('Location:index.php');
    echo "error1";
    die();
} else {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
    print_r($id);
    if (!$id) {
        // header('Location:lista-studenci.php');
        echo "error2";
        die();
    } else {
        $query = "Select student_adres.miasto,
       student_adres.kod_pocztowy,
       student_adres.ulica,
       student_adres.kraj_zamieszkania_id,
       student_adres.student_student_id
  From student_adres WHERE student_adres.student_student_id = '$id' LIMIT 1";
        //:nauczyciel_id
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $result = $result->fetch();
    }
}
$kraj = $result['kraj_zamieszkania_id'];
if (!isset($kraj)) {
//    print_r($kraj);
//    header("Location: dodaj-adres-studenta2.php?id=".urlencode($id));?>
    <script>
        window.setTimeout(function () {
            window.location = 'dodaj-adres-studenta2.php?id=<?php echo "$id"?>';
        }, 0);
    </script><?php
} ?>
<div class="container">
    <form method="post" action="akcje/aktualizuj-adres-studenta.php">
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
                    href="akcje/usun-adres-studenta.php?id=<?php echo $id ?>"> Usuń adres</a></button>
        <!--            <td class="text-center"><a href="usun-studenta.php?id=-->
        <?php //echo $result['student_id'] ?><!--"> <i class="fas fa-trash-alt "></i></a></td>-->

    </form>

    <?php
    $query2 = "Select
  nazwa,kraj_zamieszkania_id
From
    kraj_zamieszkania";
    $results2 = $db_connection->query($query2); ?>

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