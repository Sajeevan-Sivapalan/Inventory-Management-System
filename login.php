<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>
<!DOCTYPE html>
<body>
    <?php
        class Login{
            var $userID, $password;
            var $connection, $db;

            function __construct($uid, $pass){
                $this->userID = $uid;
                $this->password = $pass;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem")or die("cannot connect database");
            }

            function check(){
                $query = "SELECT * FROM user WHERE UserID = '$this->userID'";
                if($result = mysqli_query($this->connection, $query)){
                    if($row = mysqli_fetch_array($result)){
                        if($row['pass'] == $this->password){
                            $_SESSION['fname'] = $row['fname'];
                            $_SESSION['userID'] = $this->userID;
                            header("location: home.php");
                        }
                        else{
                            header("location: index.php?mes= Invalid Password");
                            exit();
                        }    
                    }
                    else{
                        header("location: index.php?mes= Invalid User ID");
                        exit();
                    }
                        
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $userID = $_POST['uid'];
        $password = $_POST['password'];

        $obj1 = new Login($userID, $password);
        $obj1->check();
        $obj1->closeServer();
    ?>
</body>
</html>