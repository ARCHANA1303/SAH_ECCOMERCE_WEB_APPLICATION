<?php 

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['update_cart'])){

    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    $color = $_POST['color'];
    $product_quantity = $_POST['product_quantity'];

    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' ,color = '$color' ,product_quantity = '$product_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';


}

if(isset($_GET['remove'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
    header('location:cart1.php');
}

if(isset($_GET['delete_all'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart1.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAH cart</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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
    <h3>Cart</h3>
    <p> <a href="cart.php" style="color: orange;">cart</a> > <a href="checkout.php">checkout</a> > <a href="orders.php">payment</a>  </p>
</div>


<div class="container1">

<section class="shopping-cart1">

   
   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>litres</th>
         <th>color</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>Rs. <?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="cart_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  
               </form>   
            </td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="product_quantity" min="1"  value="<?php echo $fetch_cart['product_quantity']; ?>" >
               </form>   
            </td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="color" id="favcolor" name="color" value="<?php echo $fetch_cart['color']; ?>">
               </form>   
            </td>
            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <input type="submit" value="update" name="update_cart" class="option-btn">
            <td><a href="cart1.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   






<?php include 'footer.php' ?>





<script src="js/script.js"></script>
    
</body>
</html>