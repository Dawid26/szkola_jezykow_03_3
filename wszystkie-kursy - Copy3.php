<?php

require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
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
$connect = mysqli_connect("localhost", "dawidma1_113", "testmarian", "dawidma1_szkolajezykow114");
//if(isset($_POST["dodaj_do_bazy"]))
//{
//
//    if(isset($_SESSION["shopping_cart"])){
//        unset($_SESSION["shopping_cart"]);
//    }
//    if(isset($_SESSION["total"])){
//        $dziekowanie = 0;
//        $dziekowanie=  "Dziękujemy za zakupy kwota do zapłaty to:" .$_SESSION["total"];
//        unset($_SESSION["total"]);
//    }
//
//
//    $dziekowanie =  0;
//}
if (isset($_POST["dodaj_do_bazy"])) {
    echo '<script>alert("Dziękujemy za zaakup")</script>';
    echo '<script>window.location="dziekujemy-za-zakup.php"</script>';

}
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'kurs_id' => $_POST["ukryte_kurs_id"],
                'item_quantity' => 1
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'kurs_id' => $_POST["ukryte_kurs_id"],
            'item_quantity' => 1
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
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

            <div class="col-md-4">
                <div class="card mb-4 box-shadow" style="border:1.1px solid #555666; background-color:#f1f1f1; border-radius:5px;"
                     align="center">
                    <form method="post" action="wszystkie-kursy.php?action=add&id=<?php echo $row["kurs_id"]; ?>">
                        <div class="card-body">
                            <img src="<?php echo $row["zdjecie"]; ?>" class="card-img-top"/><br/>
                            <h4 class="card-text text-info"><?php echo $row["nazwa"]; ?></h4>
                            <h4 class="card-text text-danger">PLN <?php echo $row["cena"]; ?></h4>
                            <!--						<input type="text" name="quantity" value="1" class="form-control" />-->
                            <input type="hidden" name="hidden_name" value="<?php echo $row["nazwa"]; ?>"/>
                            <input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>"/>
                            <input type="hidden" name="ukryte_kurs_id" value="<?php echo $row["kurs_id"]; ?>"/>
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                                   value="Dodaj do koszyka"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <div style="clear:both"></div>
    <br/>
    <h3>Szczegóły zamówienia</h3>
    <div class="table-responsive">
        <form method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <th width="38%">Nazwa</th>
                    <th width="11%">Ilość</th>
                    <th width="8%">Kurs ID</th>
                    <th width="22%">Cena</th>
                    <th width="8%">Akcja</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        ?>

                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td><input type="number" name="number[kurs_id]" value="<?php echo $values["kurs_id"]; ?>"/>
                            </td>
                            <td>PLN <?php echo $values["item_price"]; ?></td>

                            <td><a href="wszystkie-kursy.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                            class="text-danger">Usuń z koszyka</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        $_SESSION["total"] = $total;
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right"></td>
                        <td colspan="1" align="right">Cena całkowita:</td>
                        <td align="left">PLN <?php echo number_format($total, 2); ?></td>
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
            if (isset($_SESSION["shopping_cart"])) {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?><?php
                    $kurs_kurs_id = $values["kurs_id"];
                    $student_student_id = $_SESSION['student_id'];


                    $servername = "localhost";
                    $username = "dawidma1_113";
                    $password = "testmarian";
                    $dbname = "dawidma1_szkolajezykow114";

// Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
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

if (isset($_SESSION['student_id'])){
    echo $_SESSION['student_id'];
}
                    //   print_r($kurs_kurs_id, $student_student_id);
//            echo '$kurs_kurs_id'. $kurs_kurs_id;
//            echo '$student_student_id'. $student_student_id;


                }
            }

        }
        if (isset($_POST["add_to_cart"])) {

            echo '<script>window.scrollTo(150,document.body.scrollHeight);</script>';

        }
        ?>
    </div>
</div>
</div>
<br/>
<?php include('footer.php'); ?>
</body>
</html>