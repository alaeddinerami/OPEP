<?php
include("connecter/connecter.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                <li class="mb-2"><a href="Modifier.php" class="text-black hover:text-gray-900">Modifier</a></li>
                <li class="mb-2"><a href="Suppression.php" class="text-black hover:text-gray-900">Suppression</a></li>
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
                    if($rqt){
                        echo "adding";
                    }else{
                        echo "déja exist";
                    }
                    
                }
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
        <h1 class="text-2xl font-semibold mb-4">Add Plant</h1>$

        <?php
        if (isset($_POST["AddPlant"])) {
            $Nom= $_POST["nom"];
            $Prix = $_POST["prix"];
            $Description = $_POST["description"];
            $Images = $_POST["images"];

            $sql = "INSERT INTO  plante("
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

            <button type="submit" name="AddPlant" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Plant</button>
        </form>
    <!-- </div> -->
            </div>

            <!-- Example: Edit Category -->
            <!-- You can create similar sections for other actions -->

        </div>
    </div>

</body>

</html>