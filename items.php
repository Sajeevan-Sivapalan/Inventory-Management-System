<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--style sheet-->
    <link rel="stylesheet" href="src/Styles/header.css">
    <link rel="stylesheet" href="src/Styles/items.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/items.js"></script>

    <title>Items</title>
</head>
<body>
    <!--navbar start-->
    <div class="navbar">
        <div class="greeting">
            <?php
                echo "<p>Welcome, ", $_SESSION['fname'], "<br>",  date('y-m-d'), "</p>";
            ?>
            <a href="logout.php">Logout</a>
        </div>
        <div class="menubar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="purchase.php">Purchase</a></li>
                <li><a href="sales.php">Sales</a></li>
                <li><a href="items.php">Items</a></li>
                <li><a href="user.php">User</a></li>
            </ul>
        </div>
    </div>
    <!--navbar end-->

    <!--add product start-->
    <div class="add-product">
        <button><a href="addItem.php">Add Item</a></button>
    </div>
    <!--add product end-->

    <!--display details start-->
    <div class="display-details">
        <?php
            require 'config.php';

            $query = "SELECT * FROM item";
            if($result = mysqli_query($connection, $query)){
                echo "<table>";
                echo "<tr><th>Product ID</th><th>Product Name</th><th>Units</th><th>Price Per Unit</th><th>Total</th></tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><th>", $row['productId'], "</th><th>",  $row['productName'], "</th><th>",  $row['units'], "</th><th>", $row['pricePU'], "</th><th>", $row['Total'], "</th>";
                    echo "<th><a href='editItem.php?productID=", $row['productId'], " '>Edit</a></th>";
                    echo "<th><a href='deleteItem.php?productID=", $row['productId'], " ' onClick='conformation()'>Delete</a></th></tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
    <!--display details end-->
</body>
</html>