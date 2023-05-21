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
        mysqli_query($conn,"INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity','$product_image')") or die('query failed');
        $message[] = 'product added to cart';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRI AMMAN HARDWARES</title>
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

<section class="home">

    <div class="content">
        <h3>Hand picked paints and tools to your doorstep</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque nobis eius optio dolores consequuntur quia! Distinctio, eaque inventore voluptates harum aliquam veniam perferendis, esse commodi nemo nisi voluptate quos doloribus.</p>
        <a href="about.php" class="white-btn">About Us</a>
    </div>


</section>


<section class="products">

    <h1 class = "title">latest products</h1>

    <div class="box-container">

        <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 3") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <form action="" method="post" class="box">
            <img src="uploaded_img/<?php echo $fetch_products['product_image']; ?>" alt="" class="image">
            <div class="name"><?php echo $fetch_products['product_name']; ?></div>
            <div class="price">Rs. <?php echo $fetch_products['product_price']; ?>/-</div>
            <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
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

    <div class="load-more" style="margin-top: 2rem; text-align: center;">
        <a href="product.php" class="option-btn">load more</a>

    </div>

</section>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="img\slide2.jpg" alt="">
        </div>
        <div class="content">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit maxime aliquid temporibus ullam reprehenderit odit placeat sapiente vitae commodi, maiores odio, quas suscipit repellendus provident! Laboriosam ad quisquam est nesciunt.</p>
            <a href="about.php" class="btn">read more</a>
        </div>
    </div>
</section>

<?php include 'view.php' ?>




<section class="home-contact">
    <div class="content">

        <h3>have any questions</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione sequi, maxime temporibus, odit suscipit totam impedit consectetur, repellat quasi quo laudantium similique vel doloribus. Ea atque est minus nesciunt omnis!</p>
        <a href="contact.php" class="white-btn">contact us</a>
    </div>



</section>




<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/644a3f604247f20fefee1129/1gv10f59r';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->











<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>