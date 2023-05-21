<?php 

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};

if(isset($_POST['add_categories'])){

    $name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $insert_query="insert into `category` (category_name) values ('$name')";
    $result=mysqli_query($conn,$insert_query);
    
    
 
    // $select_category = mysqli_query($conn, "SELECT * FROM `category` WHERE category_name = '$name'") or die('query failed');
 
    // if(mysqli_num_rows($select_category) > 0){
    //    $message[] = 'message sent already!';
    // }else{
    //    mysqli_query($conn, "INSERT INTO `category`(category_name) VALUES('$name')") or die('query failed');
    //    $message[] = 'message sent successfully!';
    // }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `category` WHERE category_id = '$delete_id'") or die('query failed');
    header('location:admin_categories.php');
 }
 
 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
 
    mysqli_query($conn, "UPDATE `category` SET category_name = '$update_name' WHERE category_id = '$update_p_id'") or die('query failed');
 
    header('location:admin_categories.php');
 
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
        <input type="text" name="category_name" class="box" placeholder="enter category name" required>
        
        <input type="submit" value="add categories" name="add_categories" class="btn">


    </form>


</section>




<!-- product crud section ends -->

<!-- show products -->

<section class="show-products">
    <div class="box-container">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `category`")
            or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <div class="name"><?php echo $fetch_products['category_name']; ?></div>
            <a href="admin_categories.php?update=<?php echo $fetch_products['category_id'];
            ?>" class ="option-btn">update</a>
            <a href="admin_categories.php?delete=<?php echo $fetch_products['category_id']; ?>" class="delete-btn" onclick="return confirm('delete this category?');">delete</a>
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
         $update_query = mysqli_query($conn, "SELECT * FROM `category` WHERE category_id = '$update_id'") or die('query failed');
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