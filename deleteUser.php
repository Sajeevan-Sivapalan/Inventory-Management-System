<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete User</title>
</head>
<body>
    <?php
        if(isset($_GET['userID']))
            $userID = $_GET['userID'];

        class DeleteUser
        {
            var $userID;
            var $connection, $db;

            function __construct($euid){
                $this->userID = $euid;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function delete(){
                $query = "DELETE FROM user WHERE UserID = '$this->userID'";
                if($result = mysqli_query($this->connection, $query)){
                    header('location: user.php');
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $obj1 = new DeleteUser($userID);
        $obj1->delete();
        $obj1->closeServer();
            
    ?>
    </form>
    <p class=""></p>
    </div>
</body>
</html>