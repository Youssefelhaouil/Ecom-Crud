<?php
include('./db/config.php');  //database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SHOP</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <table class="table-auto w-full mt-4">
            <thead>
                <tr class="bg-green-500">
                    <th class="px-4 py-2">Réference</th>
                    <th class="px-4 py-2">Libellé</th>
                    <th class="px-4 py-2">Prix</th>
                    <th class="px-4 py-2">Quantité</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Photo Produit</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `produit`";
                $res = mysqli_query($conn,  $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $row['RefPdt']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['libPdt']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['Prix']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['Qte']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['description']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['type']; ?></td>
                        <td class="border px-4 py-2"><img src="./photos/<?php echo $row['image']; ?>" class="w-20 h-20 object-cover" alt="Product Image"></td>
                        <td class="border px-4 py-2"><a href="./userdetaille.php?RefPdt=<?php echo $row['RefPdt']; ?>"><i class="fa-solid fa-eye fa-xl text-blue-500 hover:text-blue-700"></i></a></td>
                    </tr>
                    
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Log out</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
