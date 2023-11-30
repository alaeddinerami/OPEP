<?php

include("connecter/connecter.php");
if (isset($_GET['id'])) {
    $plantId = $_GET['id'];


    $deleteQuery = "DELETE FROM plante WHERE ID_plantes = $plantId";


    $result = mysqli_query($conn, $deleteQuery);


    if ($result) {
        header("Location: Affichage.php ");
    } else {
        echo "Error";
    }
} else {
    echo "Invalide plant id";
}
