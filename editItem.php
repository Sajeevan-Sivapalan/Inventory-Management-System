<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("location:index.php?mes=please login here");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--style sheet-->
    <link rel="stylesheet" href="src/Styles/editItem.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/editItem.js"></script>

    <title>Edit Item</title>
</head>
<body>
    <!--edit start-->
    <div class="edit-container">
        <center><h1>Edit</h1></center>
        <form method="post" action="editItem1.php" name="formEditItem" onSubmit="return editItemValidation(this)">
            <?php
                if(isset($_GET['productID']))
                    $productID = $_GET['productID'];

                class EditProduct
                {
                    var $productID;
                    var $connection, $db;

                    function __construct($eproid){
                        $this->productID = $eproid;

                        $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                        $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
                    }

                    function edit(){
                        $query = "SELECT * FROM item WHERE productId = '$this->productID'";
                        if($result = mysqli_query($this->connection, $query)){
                            if($row = mysqli_fetch_array($result)){
                                echo "<input type=hidden name=productID value=", $row['productId'], "><span>Product Name</span><input type=text name=productName value=", $row['productName'], "><span>Price Per Units</span><input type=text name=pricePU value=", $row['pricePU'], "><span>Units</span><input type=text name=units value=", $row['units'], ">";
                                echo "<button type='submit'>Update</button>";
                            }
                        }
                    }

                    function closeServer(){
                        mysqli_close($this->connection);
                    }
                }

                $obj1 = new EditProduct($productID);
                $obj1->edit();
                $obj1->closeServer();
            ?>
            </form>
        <div class="error">
            <?php
                if(isset($_GET['mes']))
                    echo $_GET['mes'];
            ?>
        </div>
        <p id="errormeg"></p>
    </div>
    <!--edit end-->
</body>
</html>
