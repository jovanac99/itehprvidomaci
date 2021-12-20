<?php

require 'Database.php';
require 'Doktor.php';
$db = new Database('doktor_ustanova');

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$specijalizacija = $_POST['specijalizacija'];
$ustanova_id = $_POST['ustanova'];

$doktor = new Doktor(NULL, $ime, $prezime, $specijalizacija, $ustanova_id);

$query = "insert into doktor values (NULL, '$doktor->ime', '$doktor->prezime', '$doktor->specijalizacija', '$doktor->ustanova_id')";

if ($db->conn->query($query)) {
    echo 'Doktor je sacuvan!';
} else {
    echo 'Doktor nije sacuvan!';
}
