<?php
include("connecter/connecter.php");

$sqlPlants = "SELECT * FROM plante inner join categorie  on  plante.id_categorie = categorie.ID_categorie ";
$resultPlants = mysqli_query($conn, $sqlPlants);
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

                <li class="mb-2"><a href="Affichage.php" class="text-black hover:text-gray-900">Affichage</a></li>
            </ul>
        </div>


        <div class="w-3/4 bg-white p-8">
            <div class=" bg-white p-8 w-5/6">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Nom</th>
                            <th class="py-2 px-4 border-b">Prix</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Images</th>
                            <th class="py-2 px-4 border-b">categorie</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rowPlant = mysqli_fetch_assoc($resultPlants)) {
                            $id = $rowPlant['ID_plantes'];
                            $nom = $rowPlant['Nom'];
                            $prix = $rowPlant['Prix'];
                            $description = $rowPlant['Description'];
                            $images = $rowPlant['Images'];
                            $id_categorie = $rowPlant['Id_categorie'];



                        ?><div >
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $id; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $nom; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $prix; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $description; ?></td>
                                <td class="py-2 px-4 border-b "><img src="images/<?php echo $images; ?>" alt=""></td>
                                <td class="py-2 px-4 border-b"><?php echo $rowPlant['Nom_categorie']?></td>
                                <td class="py-2 px-4 border-b flex ">
                                    <a href="Modifier.php?id=<?php echo $id; ?>" class="text-blue-500">Modifier</a>
                                    <a href="supprimer.php?id=<?php echo $id; ?>" class="text-red-500 ml-2">supprimer</a>
                                </td>
                            </tr>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>

</body>

</html>