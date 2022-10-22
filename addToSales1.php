<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add To List 1</title>
</head>
<body>
    <?php
        class addToSales
        {
            var $date, $productID, $qty;
            var $connection, $db;

            function __construct($edate, $eproID, $eqty){
                $this->date = $edate;
                $this->productID = $eproID;
                $this->qty = $eqty;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function addItem(){
                $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                if($result = mysqli_query($this->connection, $query)){
                    if($row = mysqli_fetch_array($result)){
                        $query = "INSERT INTO sales (dates, productID, qty) VALUES ('$this->date', '$this->productID', '$this->qty')";

                        if($result = mysqli_query($this->connection, $query)){
                           $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                           if($result = mysqli_query($this->connection, $query)){
                               if($row = mysqli_fetch_array($result)){
                                   $balance = $row['units'] - $this->qty;
                                   $total = $balance * $row['pricePU'];
                                   $query = "UPDATE item SET units = '$balance', Total = '$total' WHERE productId = '$this->productID'";
                                   if($result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection)))
                                        header('location:sales.php');
                                    else
                                        header('location:addToSales.php?mes=error');
                               }
                           }
                        }
                    }
                    else
                        header('location:addToSales.php?mes=Invalid Product ID');
                }
            }

            function closeServer(){
                mysqli_close($this->connection);
            }
        }

        $date = $_POST['date'];
        $productID = $_POST['productID'];
        $qty = $_POST['qty'];

        $obj1 = new addToSales($date, $productID, $qty);
        $obj1->addItem();
        $obj1->closeServer();
    ?>
</body>
</html>