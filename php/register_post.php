<?php
include("connecter/connecter.php");

if (isset($_POST['submit'])) {
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $errors = array();

    if (empty($nom) or empty($prenom) or empty($Email) or empty($password)) {
        array_push($errors, "Tous les champs sont obligatoires");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='bg-red-500 text-white p-4 mb-4 rounded-md'>$error</div>";
        }
    } else {
        //insert data into database
        require_once "connecter/connecter.php";
        $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_pass) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $preparStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($preparStmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $nom, $prenom, $Email, $password);
            mysqli_stmt_execute($stmt);
            echo "<div class='bg-green-500 text-white p-4 mb-4 rounded-md'>Vous êtes inscrit avec succès.</div>";
        } else {
            die("something went wrong!");
        }
    }
}

?>
