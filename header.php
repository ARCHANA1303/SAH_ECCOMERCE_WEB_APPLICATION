<header class="header">

    <div class="header-1">

        <div class="flex">
            <div class="share">
                <a href="https://www.facebook.com/asianpaintsarabia/" class="fab fa-facebook-f"></a>
                <a href="https://www.instagram.com/asianpaintsarabia/" class="fab fa-twitter"></a>
                <a href="https://www.instagram.com/asianpaintsarabia/" class="fab fa-instagram"></a>
                <a href="https://www.youtube.com/c/asianpaints" class="fab fa-youtube"></a>
            </div>
            <!-- <form class="d-flex" action="">
                <input type="search" name="" id="">

            </form> -->

            <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>

        </div>

        <div class="header-2">
            
            <div class="flex">
                <a href="home.php" class="logo">SRI AMMAN HARDWARES</a>
                <nav class="navbar">
                    <a href="home.php">Home</a>
                    <a href="about.php">Why Us</a>
                    <a href="product.php">Products</a>
                    <a href="accesories.php">Accessories</a>
                    <a href="shades.php">Shade Cards</a>
                    <a href="blog.php">Blog</a>
                    <a href="contact.php">Contact</a>
                    <a href="faq1.php">FAQ</a>
                </nav>

                <div class="icons">
                    <div id="menu-btn" class="fas fa-bars"></div>
                    <a href="search.php" class="fas fa-search"></a>
                    <div id="user-btn" class="fas fa-user"></div>
                    <?php
                        $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                        $cart_rows_number = mysqli_num_rows($select_cart_number);
                    ?>
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo  $cart_rows_number; ?>)</span></a>
                </div>
                <div class="user-box">
                    <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                    <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                    <a href="logout.php" class="delete-btn">logout</a>

                </div>
            </div>

        </div>

    </div>

</header>