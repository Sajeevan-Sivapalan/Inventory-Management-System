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
    <link rel="stylesheet" href="src/Styles/addToSales.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/addToSales.js"></script>

    <title>Add To Sales</title>
</head>
<body>
    <!--add to sales start-->
    <div class="addToSales-container">
        <h1>Add To Sales</h1>
        <form method="post" action="addToSales1.php" name="addToSalesForm" onSubmit="return addToSalesValidation(this)">
            <input type="date" name="date">
            <input type="text" name="productID" maxlength="5" placeholder="Product ID">
            <input type="text" name="qty" placeholder="Quantity">
            <button type="submit">Add To Sales</button>
        </form>
        <div class="error">
            <?php
                if(isset($_GET['mes']))
                    echo "<p>", $_GET['mes'],"</p>";
            ?>
        </div>
        <p id="errormeg"></p>
    </div>
    <!--add to sales end-->
</body>
</html>