<?php

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
if (isset($_SESSION['zalogowany'])) {
    header('Location: witaj.php');
}
include_once('menu-sprawdzanie.php');
if (isset($_POST['email'])) {
    //Udana walidacja? start tak
    $wszystko_OK = true;


    // Sprawdź poprawność adresu email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
    }

    //Sprawdź poprawność hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    //Sprawdź poprawność nazwiska
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];


    if ((strlen($haslo1) < 3) || (strlen($haslo1) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 3 do 20 znaków!";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
    }
    //Sprawdź poprawność imienia
    if ((strlen($imie) < 3) || (strlen($imie) > 15)) {
        $wszystko_OK = false;
        $_SESSION['e_imie'] = "Imię musi posiadać od 3 do 15 znaków!";
    }

    //Sprawdź poprawność nazwiska
    if ((strlen($nazwisko) < 3) || (strlen($nazwisko) > 23)) {
        $wszystko_OK = false;
        $_SESSION['e_nazwisko'] = "Nazwisko musi posiadać od 3 do 23 znaków!";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //Czy zaakceptowano regulamin?
    if (!isset($_POST['regulamin'])) {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
    }


    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    $_SESSION['fr_imie'] = $imie;
    $_SESSION['fr_nazwisko'] = $nazwisko;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "connectZ.php";
    //mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {//Czy email już istnieje?
            $rezultat = $polaczenie->query("
SELECT student.email FROM student  WHERE email= '$email'
UNION
SELECT nauczyciel.email FROM nauczyciel WHERE email= '$email'
UNION
SELECT administrator.email FROM administrator WHERE email= '$email'");
            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
            }
            if ($wszystko_OK == true) {
                // dodajemy  do bazy

                if ($polaczenie->query("INSERT INTO student(email,haslo,imie,nazwisko) VALUES ('$email', '$haslo_hash','$imie','$nazwisko')")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: witamyZ.php');
                } else {
                    throw new Exception($polaczenie->error);
                }

            }

            $polaczenie->close();
        }

    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera!</span>';
        echo '<br />Informacja o błędzie: ' . $e;
    }

}


?>


<?php //include ('menu.php'); ?>
<div class="rejestracja">
    <form method="post">


        E-mail: <br/> <input type="text" value="<?php
        if (isset($_SESSION['fr_email'])) {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
        ?>" name="email"/><br/>

        <?php
        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
            unset($_SESSION['e_email']);
        }
        ?>

        Twoje hasło: <br/> <input type="password" value="<?php
        if (isset($_SESSION['fr_haslo1'])) {
            echo $_SESSION['fr_haslo1'];
            unset($_SESSION['fr_haslo1']);
        }
        ?>" name="haslo1"/><br/>

        <?php
        if (isset($_SESSION['e_haslo'])) {
            echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>

        Powtórz hasło: <br/>
        <input type="password" value="<?php
        if (isset($_SESSION['fr_haslo2'])) {
            echo $_SESSION['fr_haslo2'];
            unset($_SESSION['fr_haslo2']);
        }
        ?>" name="haslo2"/><br/>
<!--imie form-->
        Imie: <br/> <input type="text" value="<?php
        if (isset($_SESSION['fr_imie'])) {
            echo $_SESSION['fr_imie'];
            unset($_SESSION['fr_imie']);
        }
        ?>" name="imie"/><br/>

        <?php
        if (isset($_SESSION['e_imie'])) {
            echo '<div class="error">' . $_SESSION['e_imie'] . '</div>';
            unset($_SESSION['e_imie']);
        }
        ?>
<!--end imie form-->
        <!--nazwisko form-->
        Nazwisko: <br/> <input type="text" value="<?php
        if (isset($_SESSION['fr_nazwisko'])) {
            echo $_SESSION['fr_nazwisko'];
            unset($_SESSION['fr_nazwisko']);
        }
        ?>" name="nazwisko"/><br/>

        <?php
        if (isset($_SESSION['e_nazwisko'])) {
            echo '<div class="error">' . $_SESSION['e_nazwisko'] . '</div>';
            unset($_SESSION['e_nazwisko']);
        }
        ?>
        <!--nazwisko  end-->
        <label>
            <input type="checkbox" name="regulamin"
                <?php
            if (isset($_SESSION['fr_regulamin'])) {
                echo "checked";
                unset($_SESSION['fr_regulamin']);
            }
            ?>/> Akceptuję regulamin
        </label>

        <?php
        if (isset($_SESSION['e_regulamin'])) {
            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>

        <br/>

        <input type="submit" value="Zarejestruj się" class="przyciskrejestracja "/>

    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>