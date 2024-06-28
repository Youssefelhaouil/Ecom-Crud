<?php
include('./db/config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM utilisateur WHERE login = ? AND password = ?';


    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($res);
    if ($row) {
        if ($row['type'] == 'user') {
            header('location:userinter.php');
            exit();
        } else if ($row['type'] == 'admin') {
            header('location:admininter.php');
            exit();
        } else {
            echo 'Invalid user type';
        }
    } else {
        echo 'Password or username incorrect';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="login-container bg-white p-8 rounded-lg shadow-md w-80">
        <form action="#" method="POST">
            <div class="form-group mb-4">
                <input type="text" name="user" class="form-control w-full px-4 py-2 border rounded transition duration-300 focus:border-blue-500 focus:outline-none" required />
                <label class="form-label" for="user">Login</label>
            </div>

            <div class="form-group mb-4">
                <input type="password" name="password" class="form-control w-full px-4 py-2 border rounded transition duration-300 focus:border-blue-500 focus:outline-none" required />
                <label class="form-label" for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block bg-blue-500 text-white px-4 py-2 rounded cursor-pointer transition duration-300 hover:bg-blue-600">Se connecter</button>
        </form>
    </div>
</body>

</html>
