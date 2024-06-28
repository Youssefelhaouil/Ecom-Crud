<?php
include "./db/config.php";
$id = $_GET['RefPdt'];

if (isset($_POST["submit"])) {
    $id = mysqli_real_escape_string($conn, $_POST['RefPdt']);
    $libPdt = mysqli_real_escape_string($conn, $_POST['libPdt']);
    $Prix = mysqli_real_escape_string($conn, $_POST['Prix']);
    $Qte = mysqli_real_escape_string($conn, $_POST['Qte']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $Type = mysqli_real_escape_string($conn, $_POST['Type']);

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = 'photos/' . $image;
    move_uploaded_file($image_temp, $image_path);

    if ($image != "") {
        $sql = "UPDATE produit SET `libPdt` = '$libPdt', `Prix` = '$Prix', `Qte` = '$Qte', `description` = '$Description', `type` = '$Type', `image` = '$image' WHERE RefPdt = '$id'";
    } else {
        $sql = "UPDATE produit SET `libPdt` = '$libPdt', `Prix` = '$Prix', `Qte` = '$Qte', `description` = '$Description', `type` = '$Type' WHERE RefPdt = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: admininter.php?msg=Record updated successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

// Fetch product details for editing
$sql = "SELECT * FROM `produit` WHERE RefPdt = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="text-center mb-4">
            <h3 class="text-xl font-semibold">Edit Product</h3>
            <p class="text-gray-600">Update the product</p>
        </div>

        <div class="flex justify-center">
            <form action="" method="post" enctype="multipart/form-data" class="w-full max-w-lg bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="RefPdt">RefPdt</label>
                        <input type="text" name="RefPdt" id="RefPdt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Product Reference" value="<?php echo $row['RefPdt'] ?>" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="libPdt">libPdt</label>
                        <input type="text" name="libPdt" id="libPdt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Product Name" value="<?php echo $row['libPdt'] ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Prix">Prix</label>
                        <input type="text" name="Prix" id="Prix" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Price" value="<?php echo $row['Prix'] ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Qte">Qte</label>
                        <input type="text" name="Qte" id="Qte" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quantity" value="<?php echo $row['Qte'] ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Description">Description</label>
                        <input type="text" name="Description" id="Description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Description" value="<?php echo $row['description'] ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Type">Type</label>
                        <input type="text" name="Type" id="Type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Product Type" value="<?php echo $row['type'] ?>">
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="submit" name="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
                    <a href="index.php" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>
