<?php

require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
//$_SESSION['student_id'];


if (isset($_SESSION['uprawnienia'])) {
    if ($uprawnienia == 'student') {
        echo '';
    }
    if ($uprawnienia == 'admin') {
        echo 'Twoje uprawnienia:  ' . $uprawnienia . ', zaloguj się jako student, żeby sprawdzić działanie koszyka !!! ';
    }
    if ($uprawnienia == 'nauczyciel') {
        echo ' Twoje uprawnienia:  ' . $uprawnienia . ', zaloguj się jako student, żeby sprawdzić działanie koszyka !!! ';
    }
} else {
    echo ' Zaloguj się, żeby dodać kursy do koszyka !!! ';
}
if (isset($_SESSION['uprawnienia'])) {

}
if (isset($_SESSION['uprawnienia'])) {

}
$char_set = 'utf8';
$char_collation = 'utf8_general_ci';
$connect = mysqli_connect("localhost", "dawidma1_113", "testmarian", "dawidma1_szkolajezykow114");
$connect ->set_charset("utf8");

//if(isset($_POST["dodaj_do_bazy"]))
//{
//
//    if(isset($_SESSION["koszyk_karta"])){
//        unset($_SESSION["koszyk_karta"]);
//    }
//    if(isset($_SESSION["cena_calkowita"])){
//        $dziekowanie = 0;
//        $dziekowanie=  "Dziękujemy za zakupy kwota do zapłaty to:" .$_SESSION["cena_calkowita"];
//        unset($_SESSION["cena_calkowita"]);
//    }
//
//
//    $dziekowanie =  0;
//}
if (isset($_POST["dodaj_do_bazy"])) {
    echo '<script>alert("Dziękujemy za zakup")</script>';

    echo '<script>window.location="dziekujemy-za-zakup.php"</script>';

}
if (isset($_POST["dodaj_do_koszyka"])) {
    if (isset($_SESSION["koszyk_karta"])) {
        $item_array_id = array_column($_SESSION["koszyk_karta"], "procukt_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["koszyk_karta"]);
            $item_array = array(
                'procukt_id' => $_GET["id"],
                'procukt_nazwa' => $_POST["ukryta_nazwa"],
                'procukt_cena' => $_POST["ukryta_cena"],
                'kurs_id' => $_POST["ukryte_kurs_id"],
                'procukt_ilosc' => 1
            );
            $_SESSION["koszyk_karta"][$count] = $item_array;
        } else {
            echo '<script>alert("Produkt już jest w koszyku")</script>';
        }
    } else {
        $item_array = array(
            'procukt_id' => $_GET["id"],
            'procukt_nazwa' => $_POST["ukryta_nazwa"],
            'procukt_cena' => $_POST["ukryta_cena"],
            'kurs_id' => $_POST["ukryte_kurs_id"],
            'procukt_ilosc' => 1
        );
        $_SESSION["koszyk_karta"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["koszyk_karta"] as $keys => $values) {
            if ($values["procukt_id"] == $_GET["id"]) {
                unset($_SESSION["koszyk_karta"][$keys]);
//				echo '<script>alert("Item Removed")</script>';
                //echo '<script>window.location="index.php"</script>';
            }
        }
    }
}

?>

<!--<head>-->
<!--    <title>Praca zaliczeniowa </title>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!--</head>-->

<div class="container-fluid">
    <div class="col-6 text-center center-block">
        <a href="lista-opinie-strona-glowna.php">

            <button type="button" class="btn btn-primary btn-lg btn-block m-4">
                Zobacz wszystkie opinie
            </button>
        </a>
    </div
    <br/>
    <br/>
    <br/>
    <br/><br/>
    <?php
    $query = "Select
       kurs.kategoria_kategoria_id,
       kurs.data_utworzenia,
       kurs.zdjecie,
       kurs.cena,
       kurs.opis,
       kurs.nazwa,
       kurs.kurs_id
From kurs ORDER BY kurs.nazwa ASC";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-12 col-sm-12 col-lg-6 col-xl-4">
                <div class="card mb-4 box-shadow"
                     style="border:1.1px solid #555666; background-color:#f1f1f1; border-radius:5px;"
                     align="center">
                    <form method="post" action="wszystkie-kursy.php?action=add&id=<?php echo $row["kurs_id"]; ?>">
                        <div class="card-body">
                            <img src="<?php echo $row["zdjecie"]; ?>" class="card-img-top"/><br/>
                            <h4 class="card-text text-info"><?php echo $row["nazwa"]; ?></h4>
                            <h4 class="card-text text-danger">PLN <?php echo $row["cena"]; ?></h4>
                            <!--						<input type="text" name="quantity" value="1" class="form-control" />-->
                            <input type="hidden" name="ukryta_nazwa" value="<?php echo $row["nazwa"]; ?>"/>
                            <input type="hidden" name="ukryta_cena" value="<?php echo $row["cena"]; ?>"/>
                            <input type="hidden" name="ukryte_kurs_id" value="<?php echo $row["kurs_id"]; ?>"/>
                            <p>
                                <input type="submit" name="dodaj_do_koszyka" style="margin-top:5px;"
                                       class="btn btn-success"
                                       value="Dodaj do koszyka"/>
                            </p>
                        </div>
                    </form>
                    <p>
                        <a style="color:white;" href="lista-opinie.php?id=<?php echo $row['kurs_id'] ?>">
                            <button type="submit" class="btn btn-primary mt-2 ml-1">

                                Opinie

                            </button>
                        </a>
                    </p>
                </div>
            </div>
            <?php
        }
    } ?>
    <!--//    premium start-->
    <!--    <div class="col-12 col-sm-12 col-lg-6 col-xl-4">-->
    <!--                <div class="card mb-4 box-shadow" style="border:1.1px solid #555666; background-color:#f1f1f1; border-radius:5px;" align="center">-->
    <!--                    <form method="post" action="wszystkie-kursy.php?action=add&amp;id=23">-->
    <!--                        <div class="card-body">-->
    <!--                            <img src="zdjecia/nasza-oferta/wszystkie-kursy2.jpg" class="card-img-top"><br>-->
    <!--                            <h4 class="card-text text-info">Kurs premium - wszystkie kursy + lekcje z nauczycielem</h4>-->
    <!--                            <h4 class="card-text text-danger">PLN 280 / miesięcznie</h4>-->
    <!--                    						<input type="text" name="quantity" value="1" class="form-control" />-->

    <!---->
    <!---->
    <!--                        </div>-->
    <!--                    </form>-->
    <!--                    <p>-->
    <!--                        <a style="color:white;" href="lista-opinie.php?id=23">-->
    <!--                            <button type="submit" class="btn btn-primary mt-2 ml-1">-->
    <!---->
    <!--                                Opinie-->
    <!---->
    <!--                            </button>-->
    <!--                        </a>-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--//    premium end-->

    <div style="clear:both"></div>
    <br/>
    <h3>Szczegóły zamówienia</h3>
    <div class="table-responsive">
        <form method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <th width="45%">Nazwa</th>
                    <th width="6%">Kurs ID</th>
                    <th width="10%">Cena</th>
                    <th width="39%">Akcja</th>
                </tr>
                <?php
                if (!empty($_SESSION["koszyk_karta"])) {
                    $cena_calkowita = 0;
                    foreach ($_SESSION["koszyk_karta"] as $keys => $values) {
                        ?>

                        <tr>
                            <td><?php echo $values["procukt_nazwa"]; ?></td>
                            <td><input type="number" name="number[kurs_id]" value="<?php echo $values["kurs_id"]; ?>"/>
                            </td>
                            <td>PLN <?php echo $values["procukt_cena"]; ?></td>

                            <td>
                                <a href="wszystkie-kursy.php?action=delete&id=<?php echo $values["procukt_id"]; ?>"><span
                                            class="text-danger">Usuń z koszyka</span></a></td>
                        </tr>
                        <?php
                        $cena_calkowita = $cena_calkowita + $values["procukt_cena"];
                        $_SESSION["cena_calkowita"] = $cena_calkowita;
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right"></td>
                        <td colspan="1" align="right">Cena całkowita:</td>
                        <td align="left">PLN <?php echo number_format($cena_calkowita, 2); ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <button name="dodaj_do_bazy" type="submit" class="btn btn-primary">Potwierdź zakupy</button>
        </form>
        <?php
        if (isset($_POST["dodaj_do_bazy"])) {
            if (isset($_SESSION["koszyk_karta"])) {
                foreach ($_SESSION["koszyk_karta"] as $keys => $values) {
                    ?><?php
                    $kurs_kurs_id = $values["kurs_id"];
                    $student_student_id = $_SESSION['student_id'];
                    $servername = "localhost";
                    $username = "dawidma1_113";
                    $password = "testmarian";
                    $dbname = "dawidma1_szkolajezykow114";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Błąd połączenia: " . $conn->connect_error);
                    }
                    $sql = "INSERT INTO student_has_kurs
     (kurs_kurs_id, student_student_id, ostatnia_wplata, data_utworzenia, ostatnia_naleznosc, odnawialny, oplacony)
         VALUES ('$kurs_kurs_id', '$student_student_id',NULL, current_timestamp(), NULL, 0, 0)";
                    if ($conn->query($sql) === TRUE) {
                        echo "";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                    if (isset($_SESSION['student_id'])) {
                        echo $_SESSION['student_id'];
                    }
                }
            }

        }
        if (isset($_POST["dodaj_do_koszyka"])) {
            echo '<script>window.scrollTo(150,document.body.scrollHeight);</script>';
        }
        ?>
    </div>
</div>
</div>
<br/>
<?php include('footer2.php'); ?>
<?php
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        echo '<script>window.scrollTo(150,document.body.scrollHeight);</script>';
    }
}
?>
</body>
</html>