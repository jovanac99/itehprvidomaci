<?php

require 'Database.php';
require 'Doktor.php';
$db = new Database('doktor_ustanova');

$id = $_POST['id'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$specijalizacija = $_POST['specijalizacija'];
$ustanova_id = $_POST['ustanova_id'];

$doktor = new Doktor($id, $ime, $prezime, $specijalizacija, $ustanova_id);

$query = "update doktor set ime='" . $doktor->ime . "', prezime='" . $doktor->prezime . "',
 specijalizacija='" . $doktor->specijalizacija . "', ustanova_id='" . $doktor->ustanova_id . "' where id=" . $doktor->id;

if ($db->conn->query($query)) {
    echo 'Doktor je izmenjen!';
} else {
    echo 'Doktor nije izmenjen!';
}
