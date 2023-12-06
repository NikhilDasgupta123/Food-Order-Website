<?php
session_start();
// session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_name'); // Check duplicates cart values
            if (in_array($_POST['Item_name'], $myitems)) {
                echo "<script>
                alert('Food item already added to Cart');
                window.location.href='index.php';
                </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Item_price']);
                echo "<script>
                alert('Food added to Cart');
                window.location.href='index.php';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Item_price']);
            echo "<script>
                alert('Food added to Cart');
                window.location.href='index.php';
                </script>";
        }
    }
    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_name'] == $_POST['Item_name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "
                <script>
                alert('Item Removed');
                window.location.href='/Food Ordering/Account/account.php';
                </script>
                ";
            }
        }
    }
}
