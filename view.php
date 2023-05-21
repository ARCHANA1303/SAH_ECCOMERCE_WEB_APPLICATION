<?php 

include 'config.php';



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
    <title>SRI AMMAN HARDWARES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/faq.css">
</head>
<body>
<!-- <?php
// if(isset($message)){
//     foreach($message as $message){
//         echo '
//         <div class="message">
//             <span>'.$message.'</span>
//             <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
//         </div>
//         ';
//     }
// }
?> -->





<main class="l-main">
    <section class="new section" id="new">
        <h3 class="heading2 section-title">View Products</h3>
        <a href="product.php" class="section-all">View All</a>

        <div class="new__container bd-grid">
            <div class="new__box">
                <img src="img\slide1.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="interior.php" class="button">INTERIOR</a>
                </div>
            </div>
            <div class="new__box">
                <img src="img\slide2.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="exterior.php" class="button">EXTERIOR</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\slide3.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="waterproof.php" class="button">WATERPROOF</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\wood.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="woodproof.php" class="button">WOOD PROOF</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\slide5.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="adreshive.php" class="button">ADRESHIVE</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\shutterstock_1352195381-scaled.webp" alt="" class="new__img image">

                <div class="new__link">
                    <a href="accesories.php" class="button">ACCESCORIES</a>
                </div>
            </div>
        </div>
    </section>

</main>


























<script src="js/script.js"></script>
    
</body>
</html>