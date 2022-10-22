<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Sales</title>
</head>
<body>
    <?php
        if(isset($_GET['productID']))
            $productID = $_GET['productID'];
        
        class DeleteSales
        {
            var $productID;
            var $connection, $db;

            function __construct($eproID){
                $this->productID = $eproID;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function delete(){
                $query = "DELETE FROM sales WHERE productID = '$this->productID'";
                if($result = mysqli_query($this->connection, $query)){
                    header('location:sales.php');
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $obj1 = new DeleteSales($productID);
        $obj1->delete();
        $obj1->closerServer();
    ?>
</body>
</html>