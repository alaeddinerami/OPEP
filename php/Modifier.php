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
    <a href="admin.php"><h1 class="text-center text-2xl font-semibold">Admin Panel</h1></a>
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
            

            <!-- Example: Edit Category -->
            <!-- You can create similar sections for other actions -->

        </div>
    </div>

</body>
</html>
