<?php 

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAH about</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php' ?>

<div class="heading">
    <h3>About Us</h3>
    <p> <a href="home.php">home</a> / about </p>
</div>
<section class="about">
    <div class="flex">

        <div class="image">
            <img src="img\slide2.jpg" alt="">
        </div>
        <div class="content">
            <h3>Why Us?</h3>
            <p>Looking for an online paint shop for all your paint needs? SAH Paints brings you an amalgamation of paint products, tools, and accessories. We bring together a wide range of paint products from well-known brands including Asian Paints. SAH Paints has made buying paints online in India as simple as shopping for clothes from an online shop.    

You can select paints, tools, and accessories depending on your project requirement. Paintkart offers the highest quality paints in varying quantities to suit your painting needs. Instead of shopping offline, choose your paints online with an array of features at your bay like shade cards, paint calculator, refund and exchange, and much more to explore at our one-stop shop. 

What makes Paintkart a perfect online paint shop in India? Paintkart understands the value of money and time, hence, we offer affordable prices and 24-hour guaranteed delivery. </p>


            
            <a href="contact.php" class="btn">contact us</a>
        </div>
    </div>
</section>

<section class="reviews">
    <h1 class="title">client's reviews</h1>
    <div class="box-container">
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Tony stark</h3>
        </div>
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Harshvardane Rane</h3>
        </div>
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Kim Namjoon</h3>
        </div>
        <!-- <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Kim Seokjin</h3>
        </div>
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Lee Min Ho</h3>
        </div>
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt, accusantium eos distinctio illum aliquam eaque tempore quis doloremque sed officia ad aut beatae recusandae labore, quos ipsum debitis. Facilis?</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Rana Dagupati</h3>
        </div> -->

    </div>
</section>

<section class="owner">
    <h1 class="title">Owner</h1>
    <div class="box-container">
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="https://www.linkedin.com/in/archana-kandan-9071a91b5/" class="fab fa-linkedin"></a>
            </div>
            <h3>Dayaneshwaran</h3>
        </div>
        <!-- <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Dayaneshwaran</h3>
        </div>
        <div class="box">
            <img src="img\feedback3.jpeg" alt="">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Dayaneshwaran</h3>
        </div> -->
        
    </div>
</section>













<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>