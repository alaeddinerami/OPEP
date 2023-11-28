<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "opep";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
mysqli_select_db($conn, $db);