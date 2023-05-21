<?php 

include 'config.php';

// session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
};



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body style="background-color: var(--purple);">
<header class="header">

    <div class="flex">
        <nav class="navbar">
            <a href="admin_type.php">type</a>
            <a href="admin_categories.php">categories</a>
            <a href="admin_supply.php">supply</a>
            <a href="admin_supplier.php">supplier</a>
        </nav>
    </div>
</header>





<!-- admin js file -->
<script src="js\admin_script.js"></script>
    
</body>
</html> 