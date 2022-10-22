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
    <link rel="stylesheet" href="src/Styles/addItem.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/addItem.js"></script>

    <title>Register</title>
</head>
<body>
    <!--register start-->
    <div class="register-container">
		<h1>Add Item</h1>
        <form method="post" action="addItem1.php" name="formProductEdit" onSubmit="return productValidation(this)">
            <input type="text" name="productID" maxlength="5" placeholder="Product ID">
            <input type="text" name="productName" placeholder="Product Name">
            <input type="text" name="units" placeholder="Units">
            <input type="text" name="pricePU" placeholder="Price Per Unit">
            <button type="submit">Add</button>
            <div class="error">
              <?php
                  if(isset($_GET['mes']))
                    echo $_GET['mes'];
              ?>
            </div>
            <p id="errormeg"></p>
        </form>
    </div>
    <!--register end-->
</body>
</html>