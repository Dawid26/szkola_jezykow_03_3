<?php
///* Database credentials. Assuming you are running MySQL
//server with default setting (user 'root' with no password) */
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'dawidma1_113');
//define('DB_PASSWORD', 'testmarian');
////define('DB_NAME', 'szkolajezykow2');
//define('DB_NAME', 'dawidma1_szkolajezykow113');
//
///* Attempt to connect to MySQL database */
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//
//// Check connection
//if($link === false){
//    die("ERROR: Could not connect. " . mysqli_connect_error());
//}
//
//declare the database variables
$db_host = 'localhost';
//$db_name = 'szkolajezykow2';
$db_name = 'dawidma1_szkolajezykow114';
$db_username = 'dawidma1_113';
$db_password = 'testmarian';
$char_collation = 'utf8_general_ci';
//create the Data Source Name
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=UTF8";
//connect to the database
$db_connection = new PDO($dsn, $db_username, $db_password);