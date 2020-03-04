<?php

  require '../functions.php';
  session_start();

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Types Ingrédients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  </head>


  <body>


    <div class="flex">

      <!--Barre latérale -->
      <div class="w-64 h-screen bg-gray-500">
        <?php include 'sidebar.php'; ?>
      </div>

      <!-- Corps de page -->
      <div class="w-full h-screen bg-white">

        <div class="mx-auto">

          <div class="text-center text-3xl">
            Liste des types d'ingrédients
          </div>

          <div class="text-left mt-12 ml-8">
            <a href="add_type_ingredient.php"> <i class="fas fa-lemon"></i> Ajouter </a>
          </div>

          <div class="ml-8">

            <table class="border border-gray-400">

              <thead class="bg-gray-200">
                <tr>
                  <td class="w-24">Type</td>
                  <td class="w-24">Description</td>
                  <td class="w-24">Archive</td>
                  <td class="w-12">Actions</td>
                </tr>
              </thead>

              <tbody>

                <?php

                  connect_Database();
                  $req=$dbconnect->prepare("SELECT * FROM ingredients_types ORDER BY Type ");
                  $req->execute();
                  $tab = $req->fetchAll();

                  foreach ($tab as $type) {
                ?>

                <tr>
                  <td><?php echo $type['Type']; ?></td>
                  <td><?php echo $type['Description']; ?></td>
                  <td><?php echo $type['Archive']; ?></td>
                  <td>
                    <a href="type_ingredient_edit.php?Type=<?php echo $type['Type']; ?>"> <i class="far fa-edit text-blue-500"> </i> </a>
                    <a href="trt/trt_type_ingredient_archive.php?Type=<?php echo $type['Type']; ?>"> <i class="fas fa-archive text-red-500"></i> </a>
                  </td>
                </tr>

                <?php
                  }
                ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>
    </div>



  </body>
</html>
