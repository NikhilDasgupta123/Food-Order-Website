<?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $enter_username = $_POST['enter_username'];
  $enter_password = $_POST['enter_password'];
  // Nileshdg
  // Nz=G;zf3@CpkFuF
  //to prevent from mysqli injection  


  $sql = "SELECT id, pasword FROM users WHERE Fullname = '$enter_username'";


  // $conn->close();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // User found
    $row = $result->fetch_assoc();
    $hashed_password = $row["pasword"];
    if (password_verify($enter_password, $hashed_password)) {
      session_start();
      $_SESSION["user"] = $enter_username;
      echo "<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Succesfully Login, Welcome $enter_username')
      window.location.href='index.php';
      </SCRIPT>";
    } else {
      echo "<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Invalid Password')
      </SCRIPT>";
    }
  } else {
    echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('No User Found Please SignUp')
    </SCRIPT>";
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Sign In</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
      background-color: #eaeae1;
    }

    .signin-container {
      max-width: 400px;
      width: 100%;
      padding: 15px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .logo-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo-container img {
      max-width: 80px;
      /* Set the desired width for your logo */
      height: auto;
    }
  </style>
</head>

<body>

  <div class="signin-container">
    <div class="logo-container">
      <img src="image/kisspng-whopper-hamburger-cheeseburger-burger-king-premium-fast-food-burger-5a725b36236b17.0609939815174438941451.png" alt="Logo">
    </div>
    <h2 class="text-center">Sign In</h2>
    <form action="signin.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter your username" name="enter_username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="enter_password">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>