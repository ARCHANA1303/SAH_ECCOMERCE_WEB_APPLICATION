<?php 
include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];
    $address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $contact = mysqli_real_escape_string($conn, $_POST['user_contact']);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE user_email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_user) > 0){
        $message[] = 'user already exist!';
    }else{
        if($pass != $cpass){
            $message[] = 'password not matched!';
        }else{
            mysqli_query($conn, 
            "INSERT INTO `users` (user_name,user_email,password,user_type,user_address,user_contact) 
            VALUES ('$name','$email','$cpass','$user_type','$address','$contact')") 
            or die('query failed');
            $message[] = 'registered successfully!';
            header('location:login.php');
        }
        
    }

}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAH Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css\style.css">
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
    <div class="form-container">

        <form action="" method="post">
            <h3>Register Now</h3>
            <input type="text" name="user_name" placeholder="Enter your name" required class="box">
            <input type="text" name="user_email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="Confrim your password" required class="box">
            <select name="user_type" class="box">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="text" name="user_address" placeholder="Enter your address" required class="box">
            <input type="text" name="user_contact" placeholder="Enter your contact" required class="box">
            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account ? <a href="login.php">Login</a> </p>
        </form>

    </div>
    
</body>
</html>