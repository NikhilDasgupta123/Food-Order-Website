<?php
session_start();
// session_destroy();
include('../connection.php');
$user_check = $_SESSION["user"];
$query = "SELECT Fullname,email,reg_date FROM users WHERE Fullname = '$user_check'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Food Order App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            max-width: 150px;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="profile-container">
            <div class="text-center">
                <?php //<img src="user-profile-image.jpg" alt="Profile Image" class="profile-image">
                ?>
                <h2 class="mt-3"><?php echo $row['Fullname'] ?></h2>
                <p>Email: <?php echo $row['email'] ?></p>
            </div>

            <hr>
            <?php ?>
            <div>
                <h4>Personal Information</h4><br>
                <p><strong>Full Name:</strong><?php echo $row['Fullname'] ?></p>
                <p><strong>Email:</strong><?php echo $row['email'] ?></p>
                <p><strong>Register Date:</strong><?php echo $row['reg_date']; ?></p>
            </div>

            <hr>

            <div class="container mt-5">
                <h2>Shopping Cart</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Dish Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add Cart data -->
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['Price'];
                                echo "
                                <tr>
                                    <td>$value[Item_name]</td>
                                    <td>₹ $value[Price]</td>
                                    <td>
                                        <input type='number' class='form-control' value='1' min='1'>
                                    </td>
                                    <td>
                                        <form action='../manage_cart.php' method='POST'>
                                            <button name='remove_item' class='btn btn-danger btn-sm'>Remove</button>
                                            <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <!-- Total Price Box -->
            <div class="border bg-light rounded p-4 text-right">
                <h3 class='text-right'>Total Price: <span id="totalPrice"><?php echo '₹ ' . $total ?></span></h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Online Payment</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">Cash</label>
                </div>
            </div>
            <hr>



            <div class="text-center">
                <button class="btn btn-primary">Order It</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>