<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <?php
        $connection = mysqli_connect("localhost", "root", "") or die("cannot connect server");
        $db = mysqli_select_db($connection, "inventorysystem") or die("cannot connect database");
    ?>
</body>
</html>