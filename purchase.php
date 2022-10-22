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
    <link rel="stylesheet" href="src/Styles/purchase.css">
    <link rel="stylesheet" href="src/Styles/header.css">

    <title>purchase</title>
</head>
<body>
    <!-- navbar start-->
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
    <!-- navbar end-->

    <!--add product start-->
    <div class="add-product">
        <button><a href="addToPurchase.php">Add</a></button>
    </div>
    <!--add product end-->

    <!--display purchase start-->
    <div class="display-purchase">
        <?php
            require 'config.php' ;
            $query = "SELECT * FROM purchase ORDER BY dates DESC";
            if($result = mysqli_query($connection, $query)){
                echo "<table>";
                echo "<tr><th>Date</th><th>Product ID</th><th>Quantity</th></tr>";
                while($row = mysqli_fetch_array($result)){  
                    echo "<tr><th>", $row['dates'], "</th><th>", $row['productID'], "</th><th>", $row['qty'],"</th></tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
    <!--display purchase end-->
</body>
</html>