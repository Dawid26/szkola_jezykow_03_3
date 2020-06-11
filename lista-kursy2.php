<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

//$query = "Select
//    kurs.kurs_id,
//    kurs.nazwa,
//    kurs.opis,
//    kurs.cena,
//    kurs.zdjecie,
//    kurs.data_utworzenia,
//    kurs.kategoria_kategoria_id,
//    kurs.nauczyciel_nauczyciel_id
//From
//    kurs";
$query = "Select materialy_do_lekcji.nazwa As nazwaMaterialy,
       materialy_do_lekcji.opis as opisMaterialy,
       materialy_do_lekcji.link_lekcja_pdf,
       materialy_do_lekcji.kurs_kurs_id,
       materialy_do_lekcji.materialy_do_lekcji_id,
       kurs_has_student.kurs_kurs_id As kurs_kurs_id1,
       kurs_has_student.student_student_id,
       kurs.kurs_id,
       kurs.nazwa As nazwa1,
       kurs.cena,
       kurs.opis As opis1,
       kurs.zdjecie,
       kurs.data_utworzenia,
       kurs.kategoria_kategoria_id,
       kurs.nauczyciel_nauczyciel_id
From kurs Inner Join
     kurs_has_student On kurs_has_student.kurs_kurs_id = kurs.kurs_id Inner Join
     materialy_do_lekcji On materialy_do_lekcji.kurs_kurs_id = kurs.kurs_id";


$results = $db_connection->query($query);


?>
<?php

session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>


<div class="container">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>Zdjecie</th>
            <th>Data utworzenia</th>
            <th>Kategoria_id</th>
            <th>Nauczyciel_id</th>
            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['kurs_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['cena'] ?></td>
                <td><?php echo $result['zdjecie'] ?></td>
                <td><?php echo $result['data_utworzenia'] ?></td>
                <td><?php echo $result['nazwaMaterialy'] ?></td>
                <td><?php echo $result['opisMaterialy'] ?></td>
                <td><?php echo $result['link_lekcja_pdf'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>
                <td><?php echo $result['materialy_do_lekcji_id'] ?></td>


                <td class="text-center"><a href="edytuj-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="usun-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-trash-alt "></i></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


    <?php include('footer.php'); ?>
</div>
</body>
</html>