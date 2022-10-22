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
    <link rel="stylesheet" href="src/Styles/register1.css">

    <!--js-->
    <script rel="javascript" src="src/JS/register1.js"></script>

    <title>Register</title>
</head>
<body>
    <!--register start-->
    <div class="register-container">
        <h1>Register</h1>
        <form method="post" action="register1.php" name="formRegister" onSubmit="return inputValidation(this)">
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="password" maxlength="20" name="password" placeholder="Password">
            <input type="password" maxlength="20" name="repassword" placeholder="Re-Password">
            <button type="submit">Register</button>
            <div class="error">
                <?php
                    if(isset($_GET['mes']))
                        echo "<p>", $_GET['mes'], "</p>";
                ?>
            </div>
            <p id="errormeg"></p>
        </form>
    </div>
    <!--register end-->
</body>
</html>