<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
$query = "Select
    kurs.kurs_id,
    kurs.nazwa,
    kurs.opis,
    kurs.cena,
    kurs.zdjecie,
    kurs.data_utworzenia,
    kurs.kategoria_kategoria_id
From
    kurs";

$results = $db_connection->query($query);

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();

}


?>
<div class="container-fluid">
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

            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>
            <th class="text-center">Zobacz Fiszki do kursu</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['kurs_id'] ?></td>
                <td><b><?php echo $result['nazwa'] ?></b></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['cena'] ?></td>
                <td><b><?php echo $result['zdjecie'] ?></b></td>
                <td><?php echo $result['data_utworzenia'] ?></td>
                <td><?php echo $result['kategoria_kategoria_id'] ?></td>

                <td class="text-center"><a href="edytuj-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="usun-kurs.php?id=<?php echo $result['kurs_id'] ?>"> <i
                                class="fas fa-trash-alt "></i></a></td>
                <td class="text-center"><a href="lista-fiszki-do-kursu.php?id=<?php echo $result['kurs_id'] ?>"> <i
                            class="fas fa-edit "></i></a></td>
                <td>
                    <a href="lista-fiszki-admin.php?id=<?php echo $result['kurs_id'] ?>">Edytuj fiszki <i
                                class="fas fa-edit "></i></a>
                </td>
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