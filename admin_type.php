<?php 

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_type'])){

   $name = mysqli_real_escape_string($conn, $_POST['type_name']);

   $select_type_name = mysqli_query($conn, "SELECT type_name FROM `type` WHERE type_name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_type_name) > 0){
      $message[] = 'category name already added';
   }else{
      mysqli_query($conn, "INSERT INTO `type`(type_name) VALUES('$name')") or die('query failed');
      $message[] = 'product added successfully!';
      header('location:admin_type.php');
   }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `type` WHERE type_id = '$delete_id'") or die('query failed');
    header('location:admin_type.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
 
    mysqli_query($conn, "UPDATE `type` SET type_name = '$update_name' WHERE type_id = '$update_p_id'") or die('query failed');
 
    header('location:admin_type.php');
 
 }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body style="background-color: var(--purple);">

<?php 
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}

?>

<?php include'admin_header.php'; ?>
<?php include'admin_manage.php'; ?>

<!-- product crud section starts -->

<section class="add-products">

    <h1 class="title">Shop Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add category</h3>
        <input type="text" name="type_name" class="box" placeholder="enter type name" required>
        
        <input type="submit" value="add categories" name="add_type" class="btn">


    </form>


</section>




<!-- product crud section ends -->

<!-- show products -->

<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `type`")
            or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <div class="name"><?php echo $fetch_products['type_name']; ?></div>
            <a href="admin_type.php?update=<?php echo $fetch_products['type_id'];
            ?>" class ="option-btn">update</a>
            <a href="admin_type.php?delete=<?php echo $fetch_products['type_id']; ?>" class="delete-btn" onclick="return confirm('delete this category?');">delete</a>
        </div>
        <?php
            }

        }else{
            echo '<p class="empty">no category added yet!</p>';
        } 
        ?>
    </div>
</section>
<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `type` WHERE type_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['type_id']; ?>">
      <input type="text" name="update_name" value="<?php echo $fetch_update['type_name']; ?>" class="box" required placeholder="enter type">
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