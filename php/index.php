<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('../images/1_3_480x480.webp');">

    <section class="bg-green-100 p-8 rounded shadow-md w-96">
        <h1 class="text-center text-2xl font-bold mb-4">Sign up</h1>


        <?php
        include("connecter/connecter.php");
        session_start();
        if (isset($_POST['submit'])) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $Email = $_POST['Email'];
            $password = $_POST['password'];

            $sql =  "INSERT INTO utilisateur ( nom ,  prenom ,  email, mot_de_pass, id_role) VALUES ('$nom','$prenom','$Email','$password',null)";
            $req = mysqli_query($conn, $sql);

            //pour selectioner id pour choisir
            if ($req) {

                $alae = "SELECT LAST_INSERT_ID()";
                $req1 = mysqli_query($conn, $alae);
                $row = mysqli_fetch_row($req1);
                session_start();
                $_SESSION['id'] = $row[0];
                header('Location: ../php/choisir.php');
            } else {
                echo "déja eGVYVT6VGF7";
            }
        }

        ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Nom</label>
                <input type="text" name="Nom" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Prénom</label>
                <input type="text" name="Prenom" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="email" name="Email" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-600">Mot de passe</label>
                <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md" placeholder="">
            </div>
            <input type="submit" name="submit" value="Register" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
        </form>
        <p class="text-center">Si vous avez un compte: <a class="bg-blue-400 text-white p-1 rounded-md cursor-pointer" href="login.php">Login</a></p>
    </section>

</body>

</html>