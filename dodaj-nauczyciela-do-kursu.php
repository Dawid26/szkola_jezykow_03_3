<?php

require_once('config.php');


if (isset($_GET['id'])) {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
}
include_once('menu-sprawdzanie-admin.php');


//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);
    $nauczyciel_nauczyciel_id = filter_var($_POST['nauczyciel_nauczyciel_id'], FILTER_SANITIZE_STRING);
    // $query =  "INSERT INTO kurs_has_nauczyciel (kurs_kurs_id, nauczyciel_nauczyciel_id) VALUES ( '$kurs_kurs_id', '$nauczyciel_nauczyciel_id',)";
    $query = "INSERT INTO kurs_has_nauczyciel (kurs_kurs_id, nauczyciel_nauczyciel_id) VALUES ( :kurs_kurs_id, :nauczyciel_nauczyciel_id)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'kurs_kurs_id' => $kurs_kurs_id,
        'nauczyciel_nauczyciel_id' => $nauczyciel_nauczyciel_id
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            // window.setTimeout(function () {
            //     window.location = 'lista-nauczyciele2-kursy.php';
            // }, 5000);
        </script>
        <p></p>
        <?php
        print_r($result);
    }else {
        echo "error";
    }
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">Kurs id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="nauczyciel_nauczyciel_id" class="col-sm-2 col-form-label">Nauczyciel id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nauczyciel_nauczyciel_id" name="nauczyciel_nauczyciel_id"
                       value="<?php if (isset($id)) {
                           echo $id;
                       } ?>">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj kurs</button>

    </form>

    <?php

    $query2 = "Select kurs.nazwa,
       kurs.opis,
       kurs_has_nauczyciel.kurs_kurs_id,
       kurs_has_nauczyciel.nauczyciel_nauczyciel_id,
       nauczyciel.imie,
       nauczyciel.email
From kurs Inner Join
     kurs_has_nauczyciel On kurs_has_nauczyciel.kurs_kurs_id = kurs.kurs_id Inner Join
     nauczyciel On kurs_has_nauczyciel.nauczyciel_nauczyciel_id = nauczyciel.nauczyciel_id
";

    $results2 = $db_connection->query($query2);
    ?>

    <table class="table mt-4">
        <thead>
        <tr>
            <th> kurs_id</th>
            <th> nauczyciel_id</th>
            <th> kurs nazwa</th>
            <th> kurs opis</th>
            <th> imie nauczyciel</th>
            <th> email nauczyciel</th>

            <th class="text-center">Edycja</th>

            <th class="text-center">Usuń rekord</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($results2 as $result2) {
            ?>
            <tr>
                <td><?php echo $result2['kurs_kurs_id'] ?></td>
                <td><?php echo $result2['nauczyciel_nauczyciel_id'] ?></td>
                <td><?php echo $result2['nazwa'] ?></td>
                <td><?php echo $result2['opis'] ?></td>
                <td><?php echo $result2['imie'] ?></td>
                <td><?php echo $result2['email'] ?></td>
                <td class="text-center"><a
                            href="edytuj-kurs-nauczyciela.php?id=<?php echo $result2['nauczyciel_nauczyciel_id'] ?>&amp;kurs_id=<?php echo $result2['kurs_kurs_id'] ?>">
                        <i class="fas fa-edit  "></i></a></td>
                <td class="text-center"><a
                            href="akcje/usun-kurs-nauczyciela.php?id=<?php echo $result2['nauczyciel_nauczyciel_id'] ?>&amp;kurs_id=<?php echo $result2['kurs_kurs_id'] ?>">
                        <i class="fas fa-edit  "></i></a></td>

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