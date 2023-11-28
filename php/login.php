<?php

include("connecter/connecter.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body class="h-screen  bg-cover flex items-center justify-center">
    <section class="bg-green-100 p-8 rounded shadow-md w-96">
        <h1 class="text-center text-2xl font-bold mb-4">login</h1>

        <?php
        session_start();


        if (isset($_POST["login"])) {
            $email = $_POST["Email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM utilisateur WHERE email = '$email' AND mot_de_pass = '$password' ";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_row($result);
            echo 'doasn t exist';
            if ($user == 0) {
                echo 'doasn t exist';
            } else {
                if ($user[5] == 1) {
                    header("Location: admin.php");
                } else if ($user[5] == 2) {
                    header("Location: client.php");
                }
            }
        }

        ?>
        <form action="" method="POST">

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="email" name="Email" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Mot de passe</label>
                <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <input type="submit" name="login" value="login" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
        </form>
        <p class="text-center">Si vous avez pas un compte: <a class="bg-blue-400 text-white p-1 rounded-md cursor-pointer" href="index.php">creer</a></p>
    </section>

</body>

</html>