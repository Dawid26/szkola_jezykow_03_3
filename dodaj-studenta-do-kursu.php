<?php

require_once('config.php');


if (isset($_GET['id'])) {
    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
}
include_once('menu-sprawdzanie-admin.php');


//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);
    $student_student_id = filter_var($_POST['student_student_id'], FILTER_SANITIZE_STRING);
    // $query =  "INSERT INTO kurs_has_nauczyciel (kurs_kurs_id, nauczyciel_nauczyciel_id) VALUES ( '$kurs_kurs_id', '$nauczyciel_nauczyciel_id',)";
    $query = "INSERT INTO student_has_kurs  (kurs_kurs_id, student_student_id) VALUES ( :kurs_kurs_id, :student_student_id)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'kurs_kurs_id' => $kurs_kurs_id,
        'student_student_id' => $student_student_id
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
    } else {
        echo "error";
    }
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">kurs_kurs_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="student_student_id" class="col-sm-2 col-form-label">student_student_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="student_student_id" name="student_student_id"
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
       student_has_kurs.kurs_kurs_id,
       student_has_kurs.student_student_id,
       student.imie,
       student.email
From kurs Inner Join
     student_has_kurs On student_has_kurs.kurs_kurs_id = kurs.kurs_id Inner Join
     student On student_has_kurs.student_student_id = student.student_id
";

    $results2 = $db_connection->query($query2);
    ?>

    <table class="table">
        <thead>
        <tr>
            <th> kurs_id</th>
            <th> student_id</th>
            <th> kurs nazwa</th>
            <th> kurs opis</th>
            <th> imie student</th>
            <th> email student</th>
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
                <td><?php echo $result2['student_student_id'] ?></td>
                <td><?php echo $result2['nazwa'] ?></td>
                <td><?php echo $result2['opis'] ?></td>
                <td><?php echo $result2['imie'] ?></td>
                <td><?php echo $result2['email'] ?></td>
                <td class="text-center"><a
                            href="edytuj-kurs-studenta.php?id=<?php echo $result2['student_student_id'] ?>&amp;kurs_id=<?php echo $result2['kurs_kurs_id'] ?>">
                        <i class="fas fa-edit  "></i></a></td>
                <td class="text-center"><a
                            href="akcje/usun-kurs-studenta.php?id=<?php echo $result2['student_student_id'] ?>&amp;kurs_id=<?php echo $result2['kurs_kurs_id'] ?>">
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