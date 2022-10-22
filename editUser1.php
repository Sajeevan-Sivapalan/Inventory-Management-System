<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
</head>
<body>
    <?php
        class UpdateUser
        {
            var $userID, $password, $fname, $lname;
            var $connection, $db;

            function __construct($euid, $epass, $efname, $elname){
                $this->userID = $euid;
                $this->password = $epass;
                $this->fname = $efname;
                $this->lname = $elname;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function update(){
                $query = "UPDATE user SET fname = ' $this->fname', lname = '$this->lname', pass = '$this->password' WHERE UserID = '$this->userID'";

                if($result = mysqli_query($this->connection, $query))
                    header('location:user.php');
                else
                    header('location:editUser.php?mes=Error');
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }
        $fname = $_POST['fname']; 
        $lname = $_POST['lname']; 
        $userID = $_POST['uid'];
        $password = $_POST['password'];
        $obj1 = new UpdateUser($userID, $password, $fname, $lname);
        $obj1->update();
        $obj1->closeServer();
    ?>
</body>
</html>