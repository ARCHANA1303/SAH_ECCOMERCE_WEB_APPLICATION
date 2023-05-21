<?php 

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
// error
    $check_carts_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name' AND user_id = '$user_id'") or die('query failed');
    
    if(mysqli_num_rows($check_carts_number) > 0){
        $message[] = 'already added to cart!';
    }else{
        $insert_product = mysqli_query($conn,"INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity','$product_image')") or die('query failed');
        $message[] = 'product added to cart successfully!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAH products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

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

<?php include 'header.php' ?>

<div class="heading">
    <h3>OUR products</h3>
    <p> <a href="home.php">home</a> / products </p>
    
</div><?php include 'view.php' ?>



<section class="products">

    <h1 class = "title">Our products</h1>

    <div class="box-container">

        <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <form action="" method="post" class="box">
            <img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" alt="" class="image">
            <div class="name"><?php echo $fetch_products['product_name']; ?></div>
            <div class="price">Rs. <?php echo $fetch_products['product_price']; ?>/-</div>
            <!-- <input type="number" min="1" name="product_qty" value="1" class="quanty">litre -->
             <h1>quantity: <input type="number" min="1" name="product_quantity" value="1" class="qty"></h1>
             <h2>Color picker<input type="color" id="favcolor" name="color" value="<?php echo $fetch_cart['color']; ?>"></h2>
            
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['product_image']; ?>">
            
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>


        <?php 
            }

        }else{

            echo '<p class="empty">no products added yet!</p>';
            
        }

        ?>
        

    </div>

   
</section>











<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>