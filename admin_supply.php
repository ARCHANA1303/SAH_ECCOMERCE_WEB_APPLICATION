<?php 

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_supplier'])){

    $name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $date = $_POST['supply_date'];
    $price = $_POST['supply_price'];
    // $type = $_POST['product_type'];
    $product = $_POST['supply_product'];
    $quantity = $_POST['supply_quantity'];

   $select_type_name = mysqli_query($conn, "SELECT * FROM `supply` WHERE supply_product = '$product'") or die('query failed');

   if(mysqli_num_rows($select_type_name) > 0){
      $message[] = 'supply details already added';
   }else{
      mysqli_query($conn, "INSERT INTO `supply`(supply_product, supply_quantity, supply_price, supply_date, supplier_name) VALUES('$product','$quantity','$price','$date','$name')") or die('query failed');
      $message[] = 'supply details added successfully!';
      header('location:admin_supply.php');
   }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `supply` WHERE supply_id = '$delete_id'") or die('query failed');
    header('location:admin_supply.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
 
    mysqli_query($conn, "UPDATE `supply` SET supply_name = '$update_name' WHERE supply_id = '$update_p_id'") or die('query failed');
 
    header('location:admin_supply.php');
 
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body style="background-color: var(--purple);">

<?php include'admin_header.php'; ?>
<?php include'admin_manage.php'; ?>


<!-- product crud section starts -->

<section class="add-products">

    <h1 class="title">Supply</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add supply details</h3>
        <input type="text" name="supply_product" class="box" placeholder="enter product" required>
        <input type="number" min="1" name="supply_quantity" class="box" value="1" class="qty">
        <input type="number" name="supply_price" class="box" placeholder="enter the price" required>
        <input type="text" name="supplier_name" class="box" placeholder="enter supplier name" required>
        <input type="date" name="supply_date" class="box" placeholder="enter date supplied" required>
        <input type="submit" value="add supply details" name="add_supplier" class="btn">


    </form>


</section>




<!-- product crud section ends -->

<!-- show products -->

<section class="show-supply">
    <div class="container">
        
        <h1 class="title">Supply Details</h1>
        <table>
        <!-- <div class="box"> -->
            <thead>
                <th>Product</th>
                <th>Date</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `supply`")
                    or die('query failed');
                    if(mysqli_num_rows($select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
                ?>
                <tr>
                    <td><?php echo $fetch_products['supply_product']; ?></td>
                    <td><?php echo $fetch_products['supply_date']; ?></td>
                    <td><?php echo $fetch_products['supplier_name']; ?></td>
                    <td><?php echo $fetch_products['supply_quantity']; ?></td>
                    <td>Rs. <?php echo $fetch_products['supply_price']; ?>/-</td>
                    <td>
                    <a href="admin_supply.php?update=<?php echo $fetch_products['supply_id'];
                    ?>" class ="option-btn">update</a>
                    <a href="admin_supply.php?delete=<?php echo $fetch_products['supply_id']; ?>" class="delete-btn" onclick="return confirm('delete this supply?');">delete</a></td>
                </tr>
                <?php
            }

        }else{
            echo '<p class="empty">no supplier added yet!</p>';
        } 
        ?>
            </tbody>
        </table>
        
    </div>
</section>
<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `supply` WHERE supply_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['supply_id']; ?>">
      <input type="text" name="update_name" value="<?php echo $fetch_update['product_name']; ?>" class="box" required placeholder="enter product name">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>






<!-- admin js file -->
<script src="js\admin_script.js"></script>
    
</body>
</html> 