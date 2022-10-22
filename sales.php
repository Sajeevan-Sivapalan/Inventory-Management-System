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
    <link rel="stylesheet" href="src/Styles/sales.css">
    <link rel="stylesheet" href="src/Styles/header.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/homes.js"></script>

    <title>Sales</title>
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
        <button><a href="addToSales.php">Add Sales</a></button>
    </div>
    <!--add product end-->

    <!--display sales start-->
    <div class="display-sales">
        <?php
            require 'config.php';
            $query = "SELECT * FROM sales ORDER BY dates DESC";
            if($result = mysqli_query($connection, $query)){
                echo "<table><tr><th>Date</th><th>Product ID</th><th>Quantity</th></tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><th>", $row['dates'], 
                    "</th><th>", $row['productID'], "</th><th>", $row['qty'], "</th>";
                    //echo "<th><a href='editSales.php?productID=", $row['productID'], " '>Edit</a></th>";
                    //echo "<th><a href='deleteSales.php?productID=", $row['productID'], " ' onClick='conformation()'>Delete</a></th></tr>";
                }
            }
            echo "</table>";
        ?>
    </div>
    <!--display sales end-->
</body>
</html>