<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Item</title>
</head>
<body>
    <?php
        class EditItem
        {
            var $productID, $productName, $units, $pricePU, $total;
            var $connection, $db;

            function __construct($eproid, $epname, $eunits, $epricepu){
                $this->productID = $eproid;
                $this->productName = $epname;
                $this->units = $eunits;
                $this->pricePU = $epricepu; 

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function calculate(){
                $this->total = (($this->units) * ($this->pricePU));
            }

            function update(){
                $query = "UPDATE item SET productName = '$this->productName', pricePU = '$this->pricePU', units = '$this->units', Total = '$this->total' WHERE productId  = '$this->productID'";

                if($result = mysqli_query($this->connection, $query))
                    header('location:items.php');
                else
                    header('location:editItem.php?mes=Error');
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }
        $productID = $_POST['productID'];
        $productName = $_POST['productName'];
        $units = $_POST['units'];
        $pricePU = $_POST['pricePU'];

        $obj1 = new EditItem($productID, $productName, $units, $pricePU);
        $obj1->calculate();
        $obj1->update();
        $obj1->closeServer();
    ?>
</body>
</html>