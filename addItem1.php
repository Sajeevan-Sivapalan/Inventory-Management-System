<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Items</title>
</head>
<body>
    <?php
        class AddProduct
        {
            var $productID, $productName, $units, $pricePU, $total;
            var $connection, $db;

            function __construct($epid, $epname, $eunit, $eppu){
                $this->productID = $epid;
                $this->productName = $epname;
                $this->units = $eunit;
                $this->pricePU = $eppu;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function calculate(){
                $this->total = (($this->units) * ($this->pricePU));
            }

            function add(){
                $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                if($result = mysqli_query($this->connection, $query)){
                    if($row = mysqli_fetch_array($result)){
                        header("location:addItem.php?mes= already product is available");
                        exit();
                    }
                    else{
                        $query = "INSERT INTO item (productId, productName, units, 	pricePU, Total) VALUES ('$this->productID', '$this->productName', '$this->units', '$this->pricePU', '$this->total')";

                        if($result = mysqli_query($this->connection, $query)){
                        header('location:items.php');
                        }
                        else
                            header('location:addItem.php?mes=error');
                    }
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }
        
        $productID = $_POST['productID'];
        $productName = $_POST['productName'];
        $units = $_POST['units'];
        $pricePU = $_POST['pricePU'];

        $obj1 = new AddProduct($productID, $productName, $units, $pricePU);
        $obj1->calculate();
        $obj1->add();
        $obj1->closeServer();
    ?>
</body>
</html>