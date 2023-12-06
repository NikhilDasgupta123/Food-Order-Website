<?php
require_once '../connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dishname = $_POST['dishname'];
    $restaurantname = $_POST['restaurantname'];
    $price = $_POST['price'];
    $email = $_POST['email'];
    // Upload photo
    $targetDir = "../image/";
    $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
    
    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO foodinventory (`dish_name`,`restaurant_name`,`price`,`email`,`img`) VALUES ('$dishname', '$restaurantname', '$price','$email','$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered Dish')
        </SCRIPT>";
    } else {
        echo "Error";
    }


    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-y: auto;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        main {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }

        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        section {
            padding: 20px;
            max-width: 600px;
            /* Set a max-width for better readability on larger screens */
        }


        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 600px) {
            nav a table {
                display: block;
                margin: 5px 0;
            }

            main {
                flex-direction: column;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header  -->
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <!-- Form  -->
    <div class="container mt-5">
        <h2 class="mb-4">Dish Upload Form</h2>
        <form action="addfood.php" method="post" enctype="multipart/form-data">
            <!-- Dish Name -->
            <div class="mb-2">
                <label for="dishName" class="form-label">Dish Name</label>
                <input type="text" class="form-control" id="dishName" name="dishname" required>
            </div>

            <!-- Restaurant Name -->
            <div class="mb-2">
                <label for="restaurantName" class="form-label">Restaurant Name</label>
                <input type="text" class="form-control" id="restaurantName" name="restaurantname" required>
            </div>

            <!-- Price -->
            <div class="mb-2">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <!-- Email -->
            <div class="mb-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>

            <!-- Photo Upload -->
            <div class="mb-2">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-dark">Upload</button>
        </form>
    </div>
   <?php
   // Footer
   include '../footer.php'; 
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>