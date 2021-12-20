<?php

include 'Database.php';
$db = new Database('doktor_ustanova');

$id = $_POST['id'];

$query = "delete from doktor where id=" . $id;

if ($db->conn->query($query)) {
    echo 'Doktor je obrisan!';
} else {
    echo 'Doktor nije obrisan!';
}
