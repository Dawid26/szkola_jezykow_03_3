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
$query = "Select student.email,
       student_has_kurs.student_student_id,
       student_has_kurs.kurs_kurs_id,
       student_has_kurs.ostatnia_wplata,
       kurs.nazwa,
       kurs.kurs_id,
       kurs.cena,
       student_has_kurs.data_utworzenia,
       student_has_kurs.ostatnia_naleznosc,
       student_has_kurs.odnawialny
From student_has_kurs Inner Join
     student On student_has_kurs.student_student_id = student.student_id Inner Join
     kurs On student_has_kurs.kurs_kurs_id = kurs.kurs_id";

$results = $db_connection->query($query);
?>
<div class="container">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>Kurs ID</th>
            <th>Nazwa</th>
            <th>ostatnia_wplata</th>
            <th>ostatnia_naleznosc</th>
            <th>Data odnawialny</th>
            <th>Student id</th>
            <th>Email studenta</th>

            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['kurs_kurs_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['ostatnia_wplata'] ?></td>
                <td><?php echo $result['ostatnia_naleznosc'] ?></td>
                <td><?php echo $result['odnawialny'] ?></td>
                <td><?php echo $result['student_student_id'] ?></td>
                <td><?php echo $result['email'] ?></td>

                <td class="text-center"><a href="esssdytuj-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="ussssun-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
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