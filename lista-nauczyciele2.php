<?php
require_once('config.php');

include_once('menu-sprawdzanie-admin.php');

$query = "Select
    nauczyciel.imie,
    nauczyciel.nazwisko,
    nauczyciel.haslo,
    nauczyciel.email,
    nauczyciel.miniaturka_zdjecia,
    nauczyciel.data_dolaczenia,
          nauczyciel.uprawnienia,
    nauczyciel_adres.miasto,
    nauczyciel_adres.kod_pocztowy,
    nauczyciel_adres.ulica,
    nauczyciel_adres.kraj_zamieszkania_id,
    nauczyciel_adres.nauczyciel_nauczyciel_id,
    kraj_zamieszkania.nazwa,
    nauczyciel_adres.nauczyciel_adres_id,
    kraj_zamieszkania.kraj_zamieszkania_id As kraj_zamieszkania_id1,
    nauczyciel.nauczyciel_id
From
    nauczyciel left join 
    nauczyciel_adres On nauczyciel_adres.nauczyciel_nauczyciel_id = nauczyciel.nauczyciel_id left Join
    kraj_zamieszkania On nauczyciel_adres.kraj_zamieszkania_id = kraj_zamieszkania.kraj_zamieszkania_id";

$results = $db_connection->query($query);


?>


<?php //include('menu.php'); ?>

<div class="container-fluid">
    <!--    <table class="table-responsive-sm table-bordered">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>data dołączenia</th>
            <th>miniaturka_zdjecia</th>
            <th>Uprawnienia</th>
            <th class="text-center">Edycja dane</th>
            <th>Kraj</th>
            <th>Miasto</th>
            <th>Kod pocztowy</th>
            <th>Ulica</th>


            <th class="text-center">Edycja adres</th>
            <th class="text-center">Usuń rekord</th>

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
                <td><b><?php echo $result['email'] ?></b></td>
                <td><?php echo $result['data_dolaczenia'] ?></td>
                <td><b><?php echo $result['miniaturka_zdjecia'] ?></b></td>
                <td><?php echo $result['uprawnienia'] ?></td>
                <td class="text-center"><a href="edytuj-nauczyciela.php?id=<?php echo $result['nauczyciel_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['miasto'] ?></td>
                <td><?php echo $result['kod_pocztowy'] ?></td>
                <td><?php echo $result['ulica'] ?></td>

                <td class="text-center"><a
                            href="edytuj-adres-nauczyciela.php?id=<?php echo $result['nauczyciel_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="usun-nauczyciela.php?id=<?php echo $result['nauczyciel_id'] ?>"> <i
                                class="fas fa-trash-alt "></i></a></td>
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