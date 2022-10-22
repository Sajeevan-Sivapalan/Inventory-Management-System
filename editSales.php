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
    <link rel="stylesheet" href="src/Styles/editSales.css">

    <!--JS-->
    <script rel="javascript" src="src/JS/editSales.js"></script>

    <title>Edit Sales</title>
</head>
<body>
    <!--edit start-->
    <div class="edit-container">
        <h1>Edit Sales</h1>
        <form method="post" action="editSales1.php" name="formEditSales" onSubmit="return EditSalesValidation(this)">
        <?php
            if(isset($_GET['productID']))
                $productID = $_GET['productID'];

            class EditSales
            {
                var $productID;
                var $db, $connection;

                function __construct($eproid){
                    $this->productID = $eproid;

                    $this->connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
                    $this->db = mysqli_select_db($this->connection, "inventorysystem") or die("cannot connect database");
                }

                function edit(){
                    $query = "SELECT * FROM sales WHERE productId = '$this->productID'";
                    if($result = mysqli_query($this->connection, $query)){
                        if($row = mysqli_fetch_array($result)){
                            echo "<input type=hidden name=productID value=", $row['productID'], " >";
                            echo "<span>Date</span><input type=date name=dates value=", $row['dates'], " >";
                            echo "<span>Quantity</span><input type=text name=qty value=", $row['qty'], " >";
                            echo "<button type='submit'>Update</button>";
                        }
                    }
                }
                
                function closeServer(){
                    mysqli_close($this->connection);
                }
            }

            $obj1 = new EditSales($productID);
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