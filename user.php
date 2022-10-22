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
    <link rel="stylesheet" href="src/Styles/user.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/user.js"></script>

    <title>User</title>
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

    <!--add user start-->
    <div class="add-user">
        <button><a href="register.php">Add User</a></button>
    </div>
    <!--add user end-->

    <!--display details start-->
    <div class="display-details">
        <?php
            require 'config.php';

            $query = "SELECT fname, lname, UserID FROM user";
            if($result = mysqli_query($connection, $query)){
                echo "<table align=center><tr>
                <th>First name</th><th>Last name</th><th>UserID</th>
                </tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr><th>", $row['fname'], "</th><th>", $row['lname'], "</th><th>", $row['UserID'],"</th>";
                    echo "<th><a href='editUser.php?userID=",$row['UserID'], " '>Edit</a></th>";
                    echo "<th><a href='deleteUser.php?userID=", $row['UserID'], " ' onClick=conformation()>Delete</a></tr>";
                    }
                echo "</table>";
            }
            else
                echo "error";
        ?>
    </div>
    <!--display details end-->
</body>
</html>
