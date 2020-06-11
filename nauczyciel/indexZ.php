<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: witaj.php');
    exit();
}

?>


<?php

include('menu.php');
?>
<br/><br/>
<div class="logowanieRejestracja">
<a href="rejestracja.php">Rejestracja - załóż konto</a>
<br/><br/>
</div>
<div class="logowanie">
<form action="zaloguj.php" method="post" class="col-4 center">

    Login: <br/> <input type="text" name="login" class="form-control"/> <br/>
    Hasło: <br/> <input type="password" name="haslo" class="form-control"/> <br/><br/>
    <input type="submit" value="Zaloguj się" class="btn btn-primary"/>

</form>
</div>

<?php
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>

<?php include('footer.php'); ?>
</body>
</html>