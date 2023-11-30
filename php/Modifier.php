<?php
include("connecter/connecter.php");



if (isset($_POST["UpdatePlant"])) {
    $Nom = $_POST["nom"];
    $Prix = $_POST["prix"];
    $Description = $_POST["description"];
    $Images = $_POST["images"];
    $Idcategorie = $_POST["categorie"];
    $IdPlante = $_POST["UpdatePlant"];

    $sql = "UPDATE plante SET  Nom = '$Nom'  ,Prix = '$Prix', Description = '$Description', Images = '$Images', Id_categorie = '$Idcategorie' WHERE ID_plantes = $IdPlante";
    $plante = mysqli_query($conn, $sql);
    if ($plante) {
        header("Location: Affichage.php");
    } else {
        echo ("!!!!!!!!!!!!");
    }
}

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

    <div class="bg-green-600 text-white p-4">
        <a href="admin.php">
            <h1 class="text-center text-2xl font-semibold">Admin Panel</h1>
        </a>
    </div>


    <div class="flex p-8">


        <div class="w-1/4 bg-gray-200 p-4">
            <h2 class="text-lg font-semibold mb-4">Actions</h2>
            <ul>
                <li class="mb-2"><a href="Ajouter.php" class="text-black hover:text-gray-900">Ajouter</a></li>

                <li class="mb-2"><a href="./Affichage.php" class="text-black hover:text-gray-900">Affichage</a></li>
            </ul>
        </div>


        <div class="w-3/4 bg-white p-8">

            <?php

            if (isset($_GET['id'])) {
                $plantId = $_GET['id'];
            };


            $query = "SELECT * FROM plante WHERE ID_plantes = $plantId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $plant = mysqli_fetch_assoc($result);

            ?>
                <form action="" method="POST" class="max-w-md">
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-600 text-sm font-medium mb-2">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $plant['Nom']; ?>" class="w-full border rounded-md p-2">
                    </div>

                    <div class="mb-4">
                        <label for="prix" class="block text-gray-600 text-sm font-medium mb-2">Prix</label>
                        <input type="text" id="prix" name="prix" value="<?php echo $plant['Prix']; ?>" class="w-full border rounded-md p-2">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-600 text-sm font-medium mb-2">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full border rounded-md p-2"><?php echo $plant['Description']; ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="categorie" class="block text-gray-600 text-sm font-medium mb-2">Categorie</label>
                        <select id="categorie" name="categorie" class="w-full border rounded-md p-2 " aria-placeholder="categorie">
                            <?php
                            $rqt2 = "SELECT * FROM `categorie` ";
                            $categories = mysqli_query($conn, $rqt2);

                            if (mysqli_num_rows($categories) > 0) {
                                while ($rowCategory = mysqli_fetch_assoc($categories)) {
                                    $categoryId = $rowCategory['ID_categorie'];
                                    $categoryName = $rowCategory['Nom_categorie'];
                                    $selected = ($categoryId == $plant['Id_categorie']) ? 'selected' : '';
                                    echo "<option value='$categoryId' $selected>$categoryName</option>";
                                }
                            } else {
                                echo "<option value='' disabled>No categories available</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="images" class="block text-gray-600 text-sm font-medium mb-2">Images</label>
                        <input type="file" id="images" name="images" class="w-full border rounded-md p-2">
                    </div>

                    <button type="submit" value="<?php echo $plantId ?>" name="UpdatePlant" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Plant</button>
                </form>

            <?php
            } else {
                echo "Plant not found";
            }

            ?>

        </div>
    </div>

</body>

</html>