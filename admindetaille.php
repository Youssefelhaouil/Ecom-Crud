<?php
include('./db/config.php');
if (isset($_GET['RefPdt'])) {
    $ref = mysqli_real_escape_string($conn, $_GET['RefPdt']);

    // Fetch product details based on the reference
    $sql = "SELECT * FROM `produit` WHERE RefPdt = '$ref'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <title>Product Detail</title>
        </head>

        <body class="bg-gray-100">
            <div class="container mx-auto p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="w-full h-auto">
                        <img src="./photos/<?php echo $row['image']; ?>" alt="" >
                    </div>
                    <div>
                        <div class="mb-4 ">
                            <h4 class="font-semibold bg-black text-center text-white">Réference Produit</h4>
                            <p class="text-lg text-center"><?php echo $row['RefPdt']; ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold bg-black text-center text-white">Libélle produit</h4>
                            <p class="text-lg text-center"><?php echo $row['libPdt']; ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold bg-black text-center text-white">Prix Prod</h4>
                            <p class="text-lg text-center"><?php echo $row['Prix']; ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold bg-black text-center text-white">Quantité produit</h4>
                            <p class="text-lg text-center"><?php echo $row['Qte']; ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold bg-black text-center text-white">Description produit</h4>
                            <p class="text-lg text-center"><?php echo $row['description']; ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="font-semibold bg-black text-center text-white">Type Produit</h4>
                            <p class="text-lg text-center"><?php echo $row['type']; ?></p>
                        </div>
                    </div>
                </div>
                <a class="block mt-4 text-center font-bold text-white bg-green-500 hover:bg-green-600 py-2 px-4 rounded" href="./admininter.php">Retour</a>
            </div>
        </body>

        </html>
<?php
    } else {
        // Product not found
        echo "Product not found.";
    }
} else {
    // No product reference provided in the URL
    echo "No product reference provided.";
}
?>
