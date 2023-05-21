<?php 

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_supplier'])){

    $name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    // $date = $_POST['date'];
    // $price = $_POST['supplier_price'];
    $type = $_POST['product_type'];
    $number = $_POST['supplier_number'];
    // $quantity = $_POST['product_quantity'];

   $select_type_name = mysqli_query($conn, "SELECT supplier_name FROM `supplier`") or die('query failed');

   if(mysqli_num_rows($select_type_name) > 0){
      $message[] = 'category name already added';
   }else{
      mysqli_query($conn, "INSERT INTO `supplier`(supplier_name, product_type, supplier_number) VALUES('$name','$type','$number')") or die('query failed');
      $message[] = 'product added successfully!';
      header('location:admin_supplier.php');
   }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `supplier` WHERE supplier_id = '$delete_id'") or die('query failed');
    header('location:admin_supplier.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
 
    mysqli_query($conn, "UPDATE `supplier` SET supplier_name = '$update_name' WHERE supplier_id = '$update_p_id'") or die('query failed');
 
    header('location:admin_supplier.php');
 
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

    <h1 class="title">Suppliers</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add supplier</h3>
        <input type="text" name="supplier_name" class="box" placeholder="enter supplier name" required>
        <!-- <input type="date" name="date" class="box" placeholder="enter date supplied" required> -->
        <input type="text" name="product_type" class="box" placeholder="enter product type" required>
        <input type="number" name="supplier_number" class="box" placeholder="enter supplier number" required>
        <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="number" name="supplier_price" class="box" placeholder="enter the price" required> -->

       
        
        <input type="submit" value="add suppliers" name="add_supplier" class="btn">


    </form>


</section>




<!-- product crud section ends -->

<!-- show products -->

<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `supplier`")
            or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <div class="name"><?php echo $fetch_products['supplier_name']; ?></div>
            <a href="admin_supplier.php?update=<?php echo $fetch_products['supplier_id'];
            ?>" class ="option-btn">update</a>
            <a href="admin_supplier.php?delete=<?php echo $fetch_products['supplier_id']; ?>" class="delete-btn" onclick="return confirm('delete this supplier?');">delete</a>
        </div>
        <?php
            }

        }else{
            echo '<p class="empty">no supplier added yet!</p>';
        } 
        ?>
    </div>
</section>
<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `supplier` WHERE supplier_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['category_id']; ?>">
      <input type="text" name="update_name" value="<?php echo $fetch_update['category_name']; ?>" class="box" required placeholder="enter product name">
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