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
    <link rel="stylesheet" href="src/Styles/home.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/home.js"></script>

    <title>Home</title>
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

    <!--display container start-->
    <div class="display-container">
        <div class="display-details">
            <h1>Available Products</h1>
            <div class="display-ans">
                <?php
                    require 'config.php';
                    $query = "SELECT COUNT(productId) AS 'count' FROM item";
                    if($result = mysqli_query($connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<h3 class='dis-ans'>", $row['count'], "</h3>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="display-details">
            <h1>Total<br>Amount</h1>
            <div class="display-ans">
                <?php
                    require 'config.php';
                    $query = "SELECT SUM(Total) AS 'total' FROM item";
                    if($result = mysqli_query($connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<h3 class='dis-ans'>", $row['total'], "</h3>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="display-details">
            <h1> Sales<br>Products</h1>
            <div class="display-ans">
                <?php
                    require 'config.php';
                    $query = "SELECT SUM(qty) AS 'qty' FROM sales";
                    if($result = mysqli_query($connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<h3 class='dis-ans'>", $row['qty'], "</h3>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="display-details">
            <h1> Purchase Products</h1>
            <div class="display-ans">
                <?php
                    require 'config.php';
                    $query = "SELECT SUM(qty) AS 'qty' FROM purchase";
                    if($result = mysqli_query($connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<h3 class='dis-ans'>", $row['qty'], "</h3>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="display-details">
            <h1>Number Of Admins</h1>
            <div class="display-ans">
                <?php
                    require 'config.php';
                    $query = "SELECT COUNT(UserID) AS 'counts' FROM user";
                    if($result = mysqli_query($connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<h3 class='dis-ans'>", $row['counts'], "</h3>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!--display container end-->
</body>
</html>