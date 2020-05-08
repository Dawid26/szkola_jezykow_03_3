<?php

$db_host = 'localhost';
$db_name = 'dawidma1_szkolajezykow114';
$db_username = 'dawidma1_113';
$db_password = 'testmarian';

?>
Select student.imie,
       student.email,
       opinia.opinia_id,
       opinia.tytul,
       opinia.opis,
       opinia.ocena,
       opinia.data_wystawienia,
       opinia.student_student_id,
       kurs.nazwa
From opinia Inner Join
     student On opinia.student_student_id = student.student_id Inner Join
     kurs On opinia.kurs_kurs_id = 1 
     WHERE opinia.kurs_kurs_id = 1 AND kurs
	 
	 -------------------------------------------------
	 INSERT INTO `opinia` (`opinia_id`, `tytul`, `opis`, `ocena`, `data_wystawienia`, `student_student_id`, `kurs_kurs_id`)
VALUES
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '1'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '2'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '3'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '4'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '5'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '6'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '7'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '8'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '9'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '10'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '11'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '12'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '13'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '14'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '15'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '16'),
(NULL, 'dobry kurs ', 'dobry kurs ', '3', current_timestamp(), '18', '17');
-------------------------------------------