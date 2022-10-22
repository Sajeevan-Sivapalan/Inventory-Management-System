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
    <link rel="stylesheet" href="src/Styles/editUser.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/editUser.js"></script>

    <title>Edit User</title>
</head>
<body>
    <!--edit start-->
    <div class="edit-container">
        <h1>Edit</h1>
    <form method="post" action="editUser1.php" name="formEditUser" onSubmit="return editUserValidation(this)">
        <?php
            if(isset($_GET['userID']))
                $userID = $_GET['userID'];

            class EditUser
            {
                var $userID;
                var $connection, $db;

                function __construct($euid){
                    $this->userID = $euid;

                    $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                    $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
                }

                function edit(){
                    $query = "SELECT * FROM user WHERE UserID = '$this->userID'";
                    if($result = mysqli_query($this->connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<span>First Name</span><input type='text' name='fname' value=", $row['fname'], ">";
                            echo "<span>Last Name</span><input type=text name=lname value=", $row['lname'], ">";
                            echo "<input type = hidden name = uid maxlength='5' value = ", $row['UserID'], ">";
                            echo "<span>Password</span><input type=password name=password maxlength='20' value=", $row['pass'], ">";
                            echo "<span>Re-Password</span><input type=password name=repassword maxlength='20' value=", $row['pass'] ,">";
                            echo"<button type='submit'>Update</button>";
                        }
                    }
                }

                function closeServer(){
                    mysqli_close($this->connection);
                }
            }

            $obj1 = new EditUser($userID);
            $obj1->edit();
            $obj1->closeServer();
                
        ?>
    </form>
    <div class="error">
        <?php
            if(isset($_GET['mes']))
                echo $_GET['mes'];
        ?>
    </div>
    <p id="errormeg"></p>
    </div>
    <!--edit end-->
</body>
</html>