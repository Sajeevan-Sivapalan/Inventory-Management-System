<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete</title>
</head>
<body>
    <?php
        if(isset($_GET['productID']))
            $productID = $_GET['productID'];
        
        class DeleteItem
        {
            var $productID;
            var $connection, $db;

            function __construct($epid){
                $this->productID = $epid;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function delete(){
                $query = "DELETE FROM item WHERE productId = '$this->productID'";
                if($result = mysqli_query($this->connection, $query)){
                    header('location:items.php');
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $obj1 = new DeleteItem($productID);
        $obj1->delete();
        $obj1->closeServer();
    ?>
</body>
</html>