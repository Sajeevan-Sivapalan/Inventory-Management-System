<!DOCTYPE html>
<html lang="en">
<head>
    <!--style sheet-->
    <link rel="stylesheet" href="src/Styles/login.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/login.js"></script>
    
    <title>Login</title>
</head>
<body>
    <!--login start-->
    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="login.php" name="formLogin" onSubmit="return inputValidation(this)">
            <input type="text" maxlength="5" name="uid" placeholder="User ID">
            <input type="password" maxlength="20" name="password" placeholder="Password">
            <button type="submit">Login</button>
            <div class="error">
               <?php
                    if(isset($_GET['mes']))
                        echo $_GET['mes'];
                ?>
            </div>    
            <p id="errormeg"></p>
        </form>
    </div>
    <!--login end-->
</body>
</html>