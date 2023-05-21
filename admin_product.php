<?php 

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['product_name']);
   $price = $_POST['product_price'];
   $image = $_FILES['product_image']['name'];
   $image_size = $_FILES['product_image']['size'];
   $image_tmp_name = $_FILES['product_image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $color = $_POST['product_color'];
   $type = $_POST['product_type'];
   $category = $_POST['product_use'];
   $date = $_POST['date'];
   $description = $_POST['product_description'];


   $select_product_name = mysqli_query($conn, "SELECT product_name FROM `products` WHERE product_name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(product_name, product_price, product_image, product_color, product_type,product_use,date,product_description) VALUES('$name', '$price', '$image', '$color', '$type', '$category', '$date','$description')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT product_image FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/'.$fetch_delete_image['product_image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
    header('location:admin_product.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
 
    mysqli_query($conn, "UPDATE `products` SET product_name = '$update_name', product_price = '$update_price' WHERE product_id = '$update_p_id'") or die('query failed');
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image file size is too large';
       }else{
          mysqli_query($conn, "UPDATE `products` SET product_image = '$update_image' WHERE product_id = '$update_p_id'") or die('query failed');
          move_uploaded_file($update_image_tmp_name, $update_folder);
          unlink('uploaded_img/'.$update_old_image);
       }
    }
 
    header('location:admin_product.php');
 
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

<!-- product crud section starts -->

<section class="add-products">

    <h1 class="title">Shop Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add product</h3>
        <input type="text" name="product_name" class="box" placeholder="enter product name" required>
        <input type="number" min="0" name="product_price" class="box" placeholder="enter product price" required>
        <input type="file" name="product_image" accept="image/jpg, image/jpeg, image/png" 
        class="box" required>
        <input type="text" name="product_color" class="box" placeholder="enter product color" required>
        <input type="text" name="product_type" class="box" placeholder="enter product type" required>
        <input type="text" name="product_use" class="box" placeholder="enter product category" required>
        <input type="text" name="product_description" class="box" placeholder="enter product description" required>
        <input type="date" name="date" class="box" placeholder="enter product date" required>
        <input type="submit" value="add product" name="add_product" class="btn">


    </form>


</section>




<!-- product crud section ends -->

<!-- show products -->

<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`")
            or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <img src="uploaded_img/<?php echo $fetch_products['product_image'] ?>" alt="">
            <div class="name"><?php echo $fetch_products['product_name']; ?></div>
            <div class="price">Rs. <?php echo $fetch_products['product_price']; ?>/-</div>
            <div class="color"><?php echo $fetch_products['product_color']; ?></div>
            <div class="type"><?php echo $fetch_products['product_type']; ?></div>
            <div class="category"><?php echo $fetch_products['product_use']; ?></div>
            <div class="date"><?php echo $fetch_products['date']; ?></div>
            <a href="admin_product.php?update=<?php echo $fetch_products['product_id'];
            ?>" class ="option-btn">update</a>
            <a href="admin_product.php?delete=<?php echo $fetch_products['product_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
        </div>
        <?php
            }

        }else{
            echo '<p class="empty">no product added yet!</p>';
        } 
        ?>
    </div>
</section>
<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['product_id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['product_image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['product_image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['product_name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['product_price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
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