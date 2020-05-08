<?php
require_once('config.php');

include_once('menu-sprawdzanie-admin.php');

$query = "Select nauczyciel.nauczyciel_id,
       nauczyciel.imie,
       nauczyciel.nazwisko,
       nauczyciel.email,
       nauczyciel.miniaturka_zdjecia,
       nauczyciel.haslo,
       nauczyciel.uprawnienia,
       nauczyciel.data_dolaczenia,
       kurs_has_nauczyciel.kurs_kurs_id,
       kurs_has_nauczyciel.nauczyciel_nauczyciel_id,
       kurs.nazwa,
       kurs.opis,
       kurs.zdjecie,
       kurs.cena,
       kurs.kategoria_kategoria_id
From kurs_has_nauczyciel Inner Join
     kurs On kurs_has_nauczyciel.kurs_kurs_id = kurs.kurs_id Inner Join
     nauczyciel On kurs_has_nauczyciel.nauczyciel_nauczyciel_id = nauczyciel.nauczyciel_id";

$results = $db_connection->query($query);


?>
<div class="container">
    <!--    <table class="table-responsive-sm table-bordered">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Data dołączenia</th>

            <th>Nazwa</th>
            <th>Opis</th>
            <th>kurs_kurs_id</th>
            <th>Nauczyciel_id</th>


            <th class="text-center">Edycja</th>


        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['nauczyciel_id'] ?></td>
                <td><?php echo $result['imie'] ?></td>
                <td><?php echo $result['nazwisko'] ?></td>
                <td><?php echo $result['email'] ?></td>
                <td><?php echo $result['data_dolaczenia'] ?></td>

                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>
                <td><?php echo $result['nauczyciel_nauczyciel_id'] ?></td>

                <td class="text-center"><a
                            href="dodaj-nauczyciela-do-kursu.php?id=<?php echo $result['nauczyciel_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
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