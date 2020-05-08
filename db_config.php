<?php

//declare the database variables

//$db_host = 'localhost';
//$db_name = 'dawidma1_szkolajezykow114';
//$db_username = 'root';
//$db_password = '';
//
////create the Data Source Name
//$dsn = "mysql:host=$db_host;dbname=$db_name";
//
////connect to the database
//$db_connection = new PDO($dsn, $db_username, $db_password);
//
////retrieve the results
//$query = 'SELECT * FROM student';
//$results = $db_connection->query($query);
//
////close the database connection
//$db_connection = NULL;
//
////loop through the results and print the first name
//foreach ($results as $result){
//    echo $result['email'] . "<br>";
//}
$db_host = 'localhost';
$db_name = 'dawidma1_szkolajezykow114';
$db_username = 'root';
$db_password = '';

$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $db_connection = new PDO($dsn, $db_username, $db_password);
} catch (Exception $e) {
    echo "there was a failure - " . $e->getMessage();
}