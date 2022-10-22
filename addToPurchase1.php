<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add To Purchase 1</title>
</head>
<body>
    <?php
        class UpdatePurchase
        {
            var $productID, $qty, $date;
            var $connection, $db;

            function __construct($eproid, $eqty, $edate){
                $this->productID = $eproid;
                $this->date = $edate;
                $this->qty = $eqty;

                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

            function update(){
                $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                if($result = mysqli_query($this->connection, $query)){
                    if($row = mysqli_fetch_array($result)){
                        $query = "INSERT INTO purchase (dates, productID, qty) VALUES ('$this->date', '$this->productID', '$this->qty')";

                        if($query = mysqli_query($this->connection, $query)){
                            $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                            if($result = mysqli_query($this->connection, $query)){
                                if($row = mysqli_fetch_array($result)){
                                    $balance = $row['units'] + $this->qty;
                                    $total = $balance * $row['pricePU'];
                                    $query = "UPDATE item SET units = '$balance', Total = '$total' WHERE productId = '$this->productID'";
                                    if($result = mysqli_query($this->connection, $query))
                                        header('location:purchase.php');
                                }
                            }
                        }
                    }
                    else    
                        header('location:addToPurchase.php?mes= Invalid Product ID');
                }
                else
                    echo "error";
            }
        }

        $productID = $_POST['productID'];
        $qty = $_POST['qty'];
        $date = $_POST['date'];

        $obj1 = new UpdatePurchase($productID, $qty, $date);
        $obj1->update();
    ?>
</body>
</html>