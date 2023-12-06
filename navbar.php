<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Food<img src="image/kisspng-whopper-hamburger-cheeseburger-burger-king-premium-fast-food-burger-5a725b36236b17.0609939815174438941451.png" alt="Bootstrap" width="50" height="50">Order
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION["user"])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Account/account.php"><?php echo $_SESSION["user"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Register</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <div>
                <?php
                if (isset($_SESSION["cart"])) {
                    $count = count($_SESSION['cart']); ?>

                    <a href='Account/account.php' class='btn btn-outline-success'>My Food Cart <?php echo $count; ?></a>";
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>