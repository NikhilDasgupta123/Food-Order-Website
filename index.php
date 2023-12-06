<?php
session_start();
// session_destroy();
// if (!isset($_SESSION["user"])) {
//   header("Location:signin.php");
//   exit();
// }
// if(!isset($_SESSION["user"])){
//   header('location:signin.php');
// }
include('connection.php');
$sql = "SELECT dish_name,restaurant_name,price,img FROM foodinventory";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body {
      font-family: "Poppins", sans-serif;
      color: #444444;
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
  </style>
</head>

<body>
  <?php
  // NavBar
  include('navbar.php')
  ?>

  <?php //Demo Card
  ?>
  <div class="container mt-4">
    <h2 class="text-center mb-4">Menu</h2>

    <div class="row">
      <?php // Display Data main page
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $targetFetch = "image/";
          $image = $targetFetch . basename($row['img']);
          $head = $row['dish_name'];
          $restname = $row['restaurant_name'];
          $price = $row['price'];
          echo "<div class='col-md-3 mb-3'>
            <form action='manage_cart.php' method='POST'>
            <div class='card'>
              <img src='$image' class'card-img-top' style='width: 300px !important; height: 300px !important;'>
              <div class='card-body'>
                <h5 class='card-title'>$head</h5>
                <p class='card-text'>$restname</p>
                <p class='card-text'><strong>₹ $price</strong></p>
                <button type='submit' class='btn btn-primary' name='add_to_cart'><i class='fas fa-shopping-cart'></i>Start Cooking</button>
                <input type='hidden' name='Item_name' value='$head'>
                <input type='hidden' name='Item_price' value='$price'>
              </div>
            </div>

          </div>
          </form>";
        }
      } ?>

    </div>
  </div>
  <?php // Footer
  include 'footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>