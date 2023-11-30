<?php
include("connecter/connecter.php");
$sql = "SELECT * FROM plante";
$result = mysqli_query($conn, $sql);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>client</title>
</head>
<style>
    a .img {
        width: 200px;
    }

    .img {
        width: 100%;
        height: 200px;
    }
</style>

<body>
    <header class="header sticky top-0 bg-white shadow-md flex items-center justify-between px-8 py-02">

        <h1 class="w-3/12">
            <a href="">
                <img src="./images/logo.avif" class="w-20" alt="">
            </a>
        </h1>


        <nav class="nav font-semibold text-lg">
            <ul class="flex items-center">
                <li class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-opacity-100 hover:text-green-500 duration-200 cursor-pointer active">
                    <a href="">Accueil</a>
                </li>
            </ul>
        </nav>


        <div class="w-3/12 flex justify-end">
            <a href="">
                <svg class="h-8 p-1 hover:text-green-500 duration-200" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-7x">
                    <path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z" class=""></path>
                </svg>
            </a>
        </div>
    </header>

    <?php

    ?>
    <section class=" p-7">
        <div class="flex justify-center">
        <form action="" method="post" class="flex items-center space-x-2">
            <input type="text" name="reche"  placeholder="Nom de plante" class="border border-gray-300 px-3 py-2 rounded focus:outline-none focus:green-blue-500">
            <input type="submit" value="Rechercher"name="rechercher" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring focus:green-blue-300">
        </form>
        </div>
        <form action="" method="post">

            <select class="border px-4 py-2 rounded" name="categorie">

                <?php
                $sql1 = 'select * from categorie';
                $result1 = mysqli_query($conn, $sql1);
                while ($row1 = mysqli_fetch_array($result1)) {

                ?>
                    <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                <?php
                    if (@$_POST['filter']) {
                        $id_cat = $_POST['categorie'];
                        $sql3 = "select * from plante where id_categorie = $id_cat";
                        $result = mysqli_query($conn, $sql3);
                    }
                    if (@$_POST["rechercher"]) {
                        $rech = $_POST['reche'];
                        $sql4 = "select * from plante where nom like '%$rech%'";
                        $result = mysqli_query($conn, $sql4);
                    }
                }
                ?>
            </select>
            <input type="submit" value="Filter" placeholder="Choisir" name="filter" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring focus:border-green-300">


        </form>
        <div class="flex justify-center gap-5">
            <?php
            while ($row = mysqli_fetch_row($result)) {


            ?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                    <a href="#">
                        <img class="w-80 rounded-t-lg img" src="images/<?php echo $row[4]; ?>" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row[1] ?></h5>
                            
                        </a>
                        <h6 class="mb-2 text-lg font-semi-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row[2] ?>$</h6>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $row[3]; ?></p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Add to cart
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>



            <?php
            }
            ?>
        </div>
    </section>

</body>

</html>