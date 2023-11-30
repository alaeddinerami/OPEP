<?php
include("connecter/connecter.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <div class="bg-green-600 text-white p-4">
        <a href="admin.php">
            <h1 class="text-center text-2xl font-semibold">Admin Panel</h1>
        </a>
    </div>

    <!-- Admin Section -->
    <div class="flex p-8">

        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-200 p-4">
            <h2 class="text-lg font-semibold mb-4">Actions</h2>
            <ul>
                <li class="mb-2"><a href="Ajouter.php" class="text-black hover:text-gray-900">Ajouter</a></li>
                
                <li class="mb-2"><a href="Affichage.php" class="text-black hover:text-gray-900">Affichage</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 bg-white p-8">
            <!-- Dynamic content based on the selected action -->

            <!-- Example: Add Category -->
            <div>
                <h3 class="text-2xl font-semibold mb-4">Add Category</h3>

                <?php

                if (isset($_POST["AddCategory"])) {
                    $category = $_POST["categoryName"];
                    $sql = "INSERT INTO categorie (Nom_categorie) VALUES ('$category')";
                    $rqt = mysqli_query($conn, $sql);
                    if ($rqt) {
                        echo "adding";
                    } else {
                        echo "déja exist";
                    }
                }
                $rqt2 = "SELECT * FROM `categorie`";
                $categories = mysqli_query($conn, $rqt2);

                ?>
                <form class="max-w-md" action="" method="POST">
                    <div class="mb-4">
                        <label for="categoryName" class="block text-gray-600 text-sm font-medium mb-2">Category Name</label>
                        <input type="text" id="categoryName" name="categoryName" class="w-full border rounded-md p-2">
                    </div>
                    <button type="submit" name="AddCategory" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Category</button>
                </form>

                <br>
                <!-- <div class="container mx-auto p-8"> -->
                <h1 class="text-2xl font-semibold mb-4">Add Plant</h1>

                <?php
                if (isset($_POST["AddPlant"])) {
                    $Nom = $_POST["nom"];
                    $Prix = $_POST["prix"];
                    $Description = $_POST["description"];
                    $Images = $_POST["images"];
                    $Idcategorie = $_POST["categorie"];

                    $sql = "INSERT INTO plante( Nom, Prix, Description , Images, Id_categorie ) VALUES ('$Nom','$Prix','$Description','$Images','$Idcategorie')";
                    $plante = mysqli_query($conn, $sql);
                    if ($plante) {
                        echo "Ajouté avec succès";
                    } 
                }

                ?>
                <form action="" method="POST" class="max-w-md">
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-600 text-sm font-medium mb-2">Nom</label>
                        <input type="text" id="nom" name="nom" class="w-full border rounded-md p-2">
                    </div>

                    <div class="mb-4">
                        <label for="prix" class="block text-gray-600 text-sm font-medium mb-2">Prix</label>
                        <input type="text" id="prix" name="prix" class="w-full border rounded-md p-2">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-600 text-sm font-medium mb-2">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full border rounded-md p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="images" class="block text-gray-600 text-sm font-medium mb-2">Images</label>
                        <input type="file" id="images" name="images" class="w-full border rounded-md p-2">
                    </div>

                    <div class="mb-4">
                        <label for="categorie" class="block text-gray-600 text-sm font-medium mb-2">Categorie</label>
                        <select id="categorie" name="categorie" class="w-full border rounded-md p-2">
                            <?php
                            if (mysqli_num_rows($categories) > 0) {
                                while ($rowCategory = mysqli_fetch_assoc($categories)) {
                                    $categoryId = $rowCategory['ID_categorie'];
                                    $categoryName = $rowCategory['Nom_categorie'];
                                    echo "<option value='$categoryId'>$categoryName</option>";
                                }
                            } else {
                                echo "<option value='' disabled>No categories available</option>";
                            }
                            ?>

                        </select>
                    </div>


                    <button type="submit" name="AddPlant" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Plant</button>
                </form>
                
            </div>

        </div>
    </div>

</body>

</html>