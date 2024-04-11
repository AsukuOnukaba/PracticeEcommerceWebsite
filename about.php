<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="styles.css">

</head>

<?php
//require functions
require ('functions.php');
require ('database/Product.php');
$db = new DBController();
$product = new Product($db);
include 'database/config.php';


if (isset($_POST['news'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUE ('$email')") or die('query failed');;
    header('location:index.php');

}
?>

<style>
    .CartContainer{
        user-select: none;
        position: absolute;
        background: #088178;
        border-radius: 50%;
        width: 1rem;
        height: 1rem;
        font-size: .8rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 1.65rem;
        right: 6.15rem;
    }
</style>
<body>

<section id="header">
    <a href="#"><img src="Images/LOGO.jpg" class="logo" alt=""></a>

    <div>
        <ul id ="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a class="active" href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
            <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            <div class="CartContainer">
                <span class="cartValue"><?php echo count($product->getData('cart'));?></span>
            </div>
            <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section id="page-header">
    <h2>#KnowUs</h2>
    <p>Read all case studies about our products!</p>
</section>

<div class="about" style="padding: 5em; padding-top: 2em; font-size:larger;">  
<h3>Ecommerce Company
</h3>
Kith & Charm is a one stop shop for your beauty, health and wellness needs. 
<p style="color: black; font-size:large;">It is owned by licensed health professionals for total body and mind consultations and tailor made recommendations. Our prices are competitive and our services 
top-notch, keeping our customers <span style="color: gold; text-transform:uppercase;">happy and coming back for more.</span></p>
<p style="color: black; font-size:large;">We're your mother, best friend and greatest supporter all wrapped in one!</p>

</div>


<?php
include("footer.php");
?>
