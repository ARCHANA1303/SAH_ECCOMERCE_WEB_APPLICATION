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
    <title>SAH blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>

<?php include 'header.php' ?>

<div class="heading">
    <h3>Blog</h3>
    <p> <a href="home.php">home</a> / blog </p>
</div>

<section class = "design" id = "design">
      <div class = "container">
        <div class = "title">
          <h2>Recent Designs</h2>
          <p>recent interior & exterior designs on the blog</p>
        </div>

        <div class = "design-content">
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-1.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Exterior Design</span>
            </div>
            <div class = "design-title">
              <a href = "https://www.asianpaints.com/inspiration/ideas/colour-inspiration/exterior.html">make an awesome Interior Designs</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-2.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Interior Design</span>
            </div>
            <div class = "design-title">
              <a href = "https://www.asianpaints.com/inspiration/ideas/colour-inspiration/living-room.html">make an awesome Interior Designs for your home</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-3.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Water proof Design</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome Interior Designs for you home</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-4.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Wood Proof Design</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome Exterior Design for your home</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-5.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Wall Design</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome Exterior Design for your home</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "design-item">
            <div class = "design-img">
              <img src = "images/art-design-6.jpg" alt = "">
              <span><i class = "far fa-heart"></i> 22</span>
              <span>Outdoor Design</span>
            </div>
            <div class = "design-title">
              <a href = "#">make an awesome Exterior Design for your home</a>
            </div>
          </div>
          <!-- end of item -->
        </div>
      </div>
    </section>
    <!-- end of design -->


    <!-- blog -->
    <section class = "blog" id = "blog">
      <div class = "container">
        <div class = "title">
          <h2>Latest Blog</h2>
          <p>recent blogs about art & design</p>
        </div>
        <div class = "blog-content">
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-1.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>House Beautiful</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "https://www.housebeautiful.com/">Read More</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-2.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>The Spruce</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "https://www.thespruce.com/">Read More</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-3.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>Ideal Home</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "https://www.idealhome.co.uk/">Read More</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-4.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>Elle Decor</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "https://www.elledecor.com/">Read More</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-5.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>houzz pro</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "https://www.houzz.com/">Read More</a>
            </div>
          </div>
          <!-- end of item -->
          <!-- item -->
          <div class = "blog-item">
            <div class = "blog-img">
              <img src = "images/blog-p-6.jpg" alt = "">
              <span><i class = "far fa-heart"></i></span>
            </div>
            <div class = "blog-text">
              <span>20 January, 2020</span>
              <h2>Apartment Therapy</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis libero quas ipsum laudantium nihil! Quaerat.</p>
              <a href = "apartmenttherapy.com">Read More</a>
            </div>
          </div>
          <!-- end of item -->
        </div>
      </div>
    </section>
    <!-- end of blog -->

   











<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>