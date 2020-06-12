<?php
include_once('menu-start.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
if (isset($_SESSION['zalogowany'])) {

    header('Location: witaj.php');
}
?>
<?php
?>
<div class="logowanieRejestracja">
<a  href="rejestracjaZ.php">Rejestracja - załóż konto</a>
</div>
<div class="logowanie">
<br/><br/>
    <form action="zalogujZ.php" method="post" class="col-md-3 center">
    Login: <br/> <input type="text" name="login" class="form-control"/> <br/>
    Hasło: <br/> <input type="password" name="haslo" class="form-control"/> <br/><br/>
    <input type="submit" value="Zaloguj się" class="przyciskZaloguj"/>
</form>
</div>
<div class="text-center">
<?php
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>
</div>

<?php include('footer.php'); ?>
</body>
</html>