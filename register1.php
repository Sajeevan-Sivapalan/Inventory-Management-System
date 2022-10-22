<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<body>
    <?php
        class Register
        {
            var  $password, $fname, $lname;
            var $connection, $db;
            
            function __construct($epass, $efname, $elname){
                $this->password = $epass;
                $this->fname = $efname;
                $this->lname = $elname;    

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function store(){
                $query = "SELECT * FROM user WHERE UserID = '$this->userID'";
                if($result = mysqli_query($this->connection, $query)){
                    if($row = mysqli_fetch_array($result)){
                        header("location:register.php?mes= already have account");
                        exit();
                    }
                    else{
                        $query = "INSERT INTO user (UserID, pass, fname, lname) VALUES ('00000', '$this->password', '$this->fname', '$this->lname')";
    
                        if($result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection)))
                            header("location: user.php");
                        else
                            header("location: register.php?mes= Error");
                    }
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $fname = $_POST['fname']; 
        $lname = $_POST['lname']; 
        $password = $_POST['password']; 

        $obj1 = new Register($password, $fname, $lname);
        $obj1->store();
        $obj1->closeServer();
    ?>
</body>
</html>