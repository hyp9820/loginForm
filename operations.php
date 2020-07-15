<?php include "connect.php"; ?>
<?php 
    // ADD
    if(isset($_POST['add'])){
        connect();
        $id = $_POST['prod_id'];
        $nm = $_POST['prod_nm'];
        $pr = $_POST['prod_pr'];
        $desc = $_POST['prod_desc'];

        $query = "INSERT INTO products(product_id,product_nm,product_price,product_desc) ";
        $query .= "VALUES ('$id','$nm','$pr','$desc')";

        $result = mysqli_query($connection,$query);    //To run the query
        
        if(!$result){
            echo '<script>alert("Query Failed! ' . mysqli_error($connection). '")</script>'; //Check if the query worked if not display error
        }
        else {
            echo '<script>alert("Record Created!")</script>'; 
        }
        mysqli_close($connection);
    }
    // UPDATE
    if(isset($_POST['upd'])){
        connect();
        $id = $_POST['prod_id'];
        $nm = $_POST['prod_nm'];
        $pr = $_POST['prod_pr'];
        $desc = $_POST['prod_desc'];

        $query = "UPDATE products SET product_nm='$nm', product_price='$pr', product_desc='$desc' ";
        $query .= "WHERE product_id='$id'";

        $result = mysqli_query($connection,$query);    //To run the query
        
        if(!$result){
            echo '<script>alert("Query Failed! ' . mysqli_error($connection). '")</script>'; //Check if the query worked if not display error
        }
        else {
            echo '<script>alert("Record Updated!")</script>'; 
        }
        mysqli_close($connection);
    }
    // DELETE
    if(isset($_POST['del'])){
        connect();
        $id = $_POST['prod_id'];

        $query = "DELETE FROM products WHERE product_id=$id";

        $result = mysqli_query($connection,$query);
        
        if($result){
            echo '<script>alert("Record Deleted!")</script>'; 
        }
        else {
            echo '<script>alert("Query Failed! ' . mysqli_error($connection). '")</script>'; //Check if the query worked if not display error
        }
        mysqli_close($connection);
    }
    // SELECT
    if(isset($_POST['sel'])){
        connect();
        $id = $_POST['prod_id'];

        $query = "SELECT * FROM products WHERE product_id=$id";

        $result = mysqli_query($connection,$query);
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalogs</title>
    <style>
    td{
        text-align: center;
    }
    </style>
</head>
<body>
    <h2>Please Enter Product Details in the form below:</h2>

    <form action="operations.php" method="POST">
        <h3>Insertion or Update Operations:</h3>
        <table>
            <tr>
                <td><b>Enter Product ID:</b></td>
                <td><input type="number" name="prod_id"></td>
            </tr>
            <tr>
                <td><b>Enter Product Name:</b></td>
                <td><input type="text" name="prod_nm"></td>
            </tr>
            <tr>
                <td><b>Enter Product Price:</b></td>
                <td><input type="number" name="prod_pr"></td>
            </tr>
            <tr>
                <td><b>Enter Product Description:</b></td>
                <td><input type="text" name="prod_desc"></td>
            </tr>
            <tr>
                <td><input type="submit" name="upd" value="UPDATE"></td>
                <td><input type="submit" name="add" value="ADD"></td>
            </tr>
        </table>
    </form>
    <br>
    <form action="operations.php" method="POST">
        <h3>Deletion Operation:</h3>
        <table>
            <tr>
                <td><b>Enter Product ID:</b></td>
                <td><input type="number" name="prod_id"></td>
            </tr>
            <tr>
                <td><input type="submit" name="sel" value="DISPLAY DETAILS"></td>
                <td><input type="submit" name="del" value="DELETE"></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST['sel'])){

            if(mysqli_num_rows($result) > 0){
                echo '<h4>Product Details</h4>';
                while($row = mysqli_fetch_assoc($result)){
                    echo "Product ID: " . $row["product_id"];
                    echo "<br>Product Name: " . $row["product_nm"]; 
                    echo "<br>Product Price: " . $row["product_price"];
                    echo "<br>Product Description: " . $row["product_desc"];
                } 
            }
            else {
                echo '<script>alert("Query Failed! ' . mysqli_error($connection). '")</script>'; //Check if the query worked if not display error
            } 
            mysqli_close($connection);
        }
    ?>
</body>
</html>