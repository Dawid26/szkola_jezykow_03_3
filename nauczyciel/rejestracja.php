<?php

session_start();

if (isset($_POST['email'])) {
    //Udana walidacja? Załóżmy, że tak!
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

    if ((strlen($haslo1) <= 3) || (strlen($haslo1) >= 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 3 do 20 znaków!";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
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
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "connect.php";
    //mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("
SELECT student.email, student.student_id FROM student  WHERE email= '$email'
UNION
SELECT nauczyciel.email, nauczyciel.nauczyciel_id FROM nauczyciel WHERE email= '$email'
UNION
SELECT administrator.email, administrator.administrator_id FROM administrator WHERE email= '$email'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
            }


            if ($wszystko_OK == true) {
                //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy

                if ($polaczenie->query("INSERT INTO nauczyciel(email,haslo) VALUES ('$email', '$haslo_hash')")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: indexZ.php');
                } else {
                    throw new Exception($polaczenie->error);
                }

            }

            $polaczenie->close();
        }

    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: ' . $e;
    }

}


?>

wd
<?php include('menu.php'); ?>
<div class="logowanie">
<form method="post">


    E-mail: <br/> <input class="inputRejestracja" type="text" value="<?php
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

    Twoje hasło: <br/> <input class="inputRejestracja" type="password" value="<?php
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

    Powtórz hasło: <br/> <input class="inputRejestracja" type="password" value="<?php
    if (isset($_SESSION['fr_haslo2'])) {
        echo $_SESSION['fr_haslo2'];
        unset($_SESSION['fr_haslo2']);
    }
    ?>" name="haslo2"/><br/>

    <label>
        <input type="checkbox" name="regulamin" <?php
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

    <input class="przyciskrejestracja"  type="submit" value="Zarejestruj się"/>

</form>
</div>
<?php include('footer.php'); ?>
</body>
</html>