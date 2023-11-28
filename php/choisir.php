<?php

include 'connecter/connecter.php';
session_start();
$id = $_SESSION['id'];
// echo $id;
if (isset($_POST['client'])) {
  $sql = "UPDATE utilisateur set id_role = 2 where id_user = $id";
  $req = mysqli_query($conn, $sql);
  $_SESSION['status'] = 'client';

  header("Location: client.php");
}

if (isset($_POST['admin'])) {
  $sql = "UPDATE utilisateur set id_role = 1 where id_user = $id";
  $req = mysqli_query($conn, $sql);
  $_SESSION['status'] = 'admin';

  header("Location: admin.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./css/style.css">
  <title>choisir</title>
</head>

<body class='h-screen bg-[url("/img/hero-pattern.svg")] bg-cover flex items-center justify-center'>
  <section class="bg-green-100 p-8 rounded shadow-md w-96">
    <div >
      <h1 class="text-center pb-6">Vous souhaitez s'inscrire au tand que ??</h1>
      <form action="" method="post">
        <div class="flex justify-evenly">
          <input type="submit" name="admin" value="admin" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer" />
          <input type="submit" name="client" value="client" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer" />
        </div>
      </form>
    </div>
  </section>
</body>

</html>