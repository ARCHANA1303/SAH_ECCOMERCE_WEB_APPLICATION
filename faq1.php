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
    <h3>FAQ</h3>
    <p> <a href="home.php">home</a> / FAQ's </p>
</div>

<section>
    <h1 class="title">FAQ's</h1>

    <div class="questions-container">
        <div class="question">
            <button>
                <span>Which Asian paint color is best?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Marigold 7986 and Greenery 7806. ...
Coats in Fleecy 8234 and Subdued 8231. ...
Oriental Blue 1306 and Dark Ash 8776. ...
Yellow Tulip 7912 and Cream Pie L512. ...
Passion Flower X107 and Pale Sisal L155. ...
Plum Island and Grape Delight 8220. ...
Ivory L156 and Lemonade 7830.</p>
        </div>

        <div class="question">
            <button>
                <span>What is the price of 20 Litre paint? </span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Buy Asian Paints 20L White Ace Exterior Emulsion Online At Price ₹4199.</p>
        </div>

        <div class="question">
            <button>
                <span>Can I get a pink color?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Yes. You can get lot of colors in shades.</p>
        </div>

        <div class="question">
            <button>
                <span>How long will it take to deliver?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Minimum two days. Maximum four days. Delivery days changes according to working hours and distance.</p>
        </div>
    </div>
</section>











<?php include 'footer.php' ?>





<script src="js/main.js"></script>
    
</body>
</html>