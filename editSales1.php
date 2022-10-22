<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Sales 1</title>
</head>
<body>
    <?php
        class UpdateSales
        {
            var $productID, $dates, $qty;
            var $connection, $db;

            function __construct($eproid, $edate, $eqty){
                $this->productID = $eproid;
                $this->dates = $edate;
                $this->qty = $eqty;
                
                $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
            }

                function update(){
                    $query = "UPDATE sales SET dates = '$this->dates', qty = '$this->qty' WHERE productID = '$this->productID'";

                    if($result = mysqli_query($this->connection, $query))
                        header('location:sales.php');
                    else
                        header('location:editSales.php?mes=error');
                }

                function closeServer(){
                    mysqli_close($this->connection);
                }
        }

        $productID = $_POST['productID']; 
        $dates = $_POST['dates']; 
        $qty = $_POST['qty']; 
        
        $obj1 = new UpdateSales($productID, $dates, $qty);
        $obj1->update();
        $obj1->closeServer();
        ?>
</body>
</html>