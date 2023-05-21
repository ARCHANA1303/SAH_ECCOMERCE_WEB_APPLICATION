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
    <title>SRI AMMAN HARDWARES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">
</head>
<body>

<?php include 'header.php' ?>

<div class="heading">
    <h3>Shades</h3>
    <p> <a href="home.php">home</a> / Shades </p>
</div>

<main class="l-main">
    <section class="new section" id="new">
        <h2 class="heading2 section-title">Color Shades</h2>
        <a href="shades.php" class="section-all">View All</a>

        <div class="new__container bd-grid">
            <div class="new__box">
                <img src="img\Aisan-Paint-Apcolite-emulsion.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="https://paintkart.com/shadecard/Aisan%20Paint%20-%20Apcolite%20emulsion.pdf" class="button">VIEW BROUCHER</a>
                </div>
            </div>
            <div class="new__box">
                <img src="img\Asian-Paint-Apcolite-Enamel.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="https://paintkart.com/shadecard/Asian%20Paint%20-%20Apcolite%20Enamel.pdf" class="button">VIEW BROUCHER</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\Asian-Paints-Apex-Ultima-Protek.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="https://paintkart.com/shadecard/Asian%20Paint%20-%20Apex%20%20And%20Tile%20Guard.pdf" class="button">VIEW BROUCHER</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\Asian-Paint-Apex-And-Tile-Guard.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="https://www.asianpaints.com/blogs/common-waterproofing-problems-and-solutions.html" class="button">VIEW BROUCHER</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\Universal-Stainer.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="adreshive.php" class="button">VIEW BROUCHER</a>
                </div>
            </div>

            <div class="new__box">
                <img src="img\Asian-Paints-Tractor.jpg" alt="" class="new__img image">

                <div class="new__link">
                    <a href="https://paintkart.com/shadecard/Asian%20Paints%20Royal.pdf" class="button">VIEW BROUCHER</a>
                </div>
            </div>
        </div>
    </section>

</main>












<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>