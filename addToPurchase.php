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
    <link rel="stylesheet" href="src/Styles/addToPurchase.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/addToPurchase.js"></script>

    <title>Add To Purchase</title>
</head>
<body>
    <!--add to purchase start-->
    <div class="addToPurchase-container">
        <h1>Add To Purchase</h1>
        <form method="post" action="addToPurchase1.php" name="addToPurchaseForm" onSubmit="return addToPurchaseFormValidation(this)">
            <input type="date" name="date">
            <input type="text" name="productID" maxlength="5" placeholder="Product ID">
            <input type="text" name="qty" placeholder="Quantity">
            <button type="submit">Add To Purchase</button>
        </form>
        <div class="error">
            <?php
                if(isset($_GET['mes']))
                    echo "<p>", $_GET['mes'],"</p>";
            ?>
        </div>
        <p id="errormeg"></p>
    </div>
    <!--add to purchase end-->
</body>
</html>