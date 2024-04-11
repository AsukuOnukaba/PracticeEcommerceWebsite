<?php
require ('database/DBController.php');
require ('database/Product.php');
require ('database/carts.php');
$db = new DBController();
$Cart = new Cart($db);
$product = new Product($db);
include 'database/config.php';


if (isset($_POST['news'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUE ('$email')") or die('query failed');;
    header('location:index.php');

}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <script src="https://kit.fontawesome.com/33e495fb35.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<style>
    .valueContainer{
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
        top: 1rem;
        right: 6.15rem;
    }
    .popup-button{
    background: blue;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    padding: 10px 10px;
    border-radius: 10px;
    cursor: pointer;
    border: none;
    transition: 0.2s;
    margin-top: 0.1rem;
    margin-left: 19em;

}
    .wrapper {
        max-width: 1000px;
        margin: 0 auto 100px;
    }
    .wrapper h1 {
        padding: 20px 0;
        text-align: center;
        text-transform: uppercase;
        color: #088178;
    }
    .project {
        display: flex;
    }
    .shop {
        flex: 75%;
    }
    .box {
        display: flex;
        width: 100%;
        height: 260px;
        overflow: hidden;
        margin-bottom: 20px;
        background: #fff;
        transition: all .6s ease;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .box:hover {
        border: none;
        transform: scale(1.01);
    }
    .box img {
        width: 300px;
        height: 200px;
        object-fit: cover;
    }
    .size{
        width: 150px;
    }
    .content {
        padding: 10px;
        width: 100%;
        position: relative;
    }
    .content h3 {
        margin-bottom: 20px;
        font-size: large;
        font-weight: 600;
    }
    .content h4 {
        margin-bottom: 20px;
        font-weight: 300;
    }
    .btn-area {
        position: absolute;
        bottom: 20px;
        right: 20px;
        padding: 10px 25px;
        background-color: #3a71a9;
        color: white;
        cursor: pointer;
        border-radius: 5px;
    }
    .btn-area:hover {
        background-color: #76bfb6;
        color: #fff;
        font-weight: 600;
    }
    .unit input {
        width: 40px;
        padding: 5px;
        text-align: center;
    }
    .btn-area i {
        margin-right: 5px;
    }
    .right-bar {
        flex: 25%;
        margin-left: 20px;
        padding: 20px;
        height: 400px;
        border-radius: 5px;
        background: #fff;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .right-bar hr {
        margin-bottom: 25px;
    }
    .right-bar p {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        font-size: 20px;
    }
    .right-bar a {
        background-color: #76bfb6;
        color: #fff;
        text-decoration: none;
        display: block;
        text-align: center;
        height: 40px;
        line-height: 40px;
        font-weight: 900;
    }
    .right-bar i {
        margin-right: 15px;
    }
    .right-bar a:hover {
        background-color: #3972a7;
    }
    @media screen and (max-width: 700px) {
        .content h3 {
            margin-bottom: 15px;
        }
        .content h4 {
            margin-bottom: 20px;
        }
        .btn2 {
            display: none;
        }
        .box {
            height: 150px;
        }
        .box img {
            height: 150px;
            width: 200px;
        }
    }
    @media screen and (max-width: 900px) {
        .project {
            flex-direction: column;
        }
        .right-bar {
            margin-left: 0;
            margin-bottom: 20px;
        }
    }
    @media screen and (max-width: 1250px) {
        .wrapper {
            max-width: 95%;
        }
    }
    </style>

<body>
<section id="header">
    <a href="#"><img src="Images/LOGO.jpg" class="logo" alt=""></a>

    <div>
        <ul id ="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Sign in</a></li>
            <li id="lg-bag"><a  class="active" href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
            <div class="valueContainer">
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
    <h2>#let's talk</h2>
    <p>LEAVE A MESSAGE, We love to hear from you!</p>
</section>

<div class="wrapper">
    <h3 style="color: #3972a7; padding:1rem;">Complete Your Purchase</h3>
    <div class="project">
        
            <?php
            foreach ($product->getData('cart') as $item):
                $carts = $product->getProduct($item['item_id']);
                $subTotal[] = array_map(function ($item){
            ?>

                    <?php
                    return $item['item_price'];
                }, $carts); //closing array_map
            endforeach;
                ?>
        
        <div class="right-bar">
        <p><span>Number of Items</span> <span><?php echo count($product->getData('cart'));?></span></p>
            <hr>
            <p><span>Subtotal</span> <span>₦<?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0?></span>
            </p>
            <hr>
            <p><span>Shippment </span> <span>₦0</span></p>
            <hr>
            <p><span>Total</span> <span>₦<?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0?></span></p>

           
</div>
<form id="paymentForm" class="right-bar" style="padding: 1rem;">

<div class="form-group">

<label for="email" style="padding: 2rem 1em 0 0; ">Email Address</label>

<input type="email" id="email-address" required />

</div>
<hr style="margin-top: 2em; margin-bottom: 0.5rem;">

<div class="form-group">

<label for="amount"  style="padding: 2rem 4em 0 0; ">Amount</label>

₦<?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0?>
</div>
<hr style="margin-top: 2em; margin-bottom: 0.5rem;">

<div class="form-group">

<label for="first-name"  style="padding: 2rem 2.7em 0 0;">First Name</label>

<input type="text" id="first-name" />

</div>
<hr style="margin-top: 2em; margin-bottom: 0.5rem;">


<div class="form-group">

<label for="last-name"  style="padding: 2rem 2.7em 0 0; ">Last Name</label>

<input type="text"id="last-name" />

</div>
<hr style="margin-top: 2em; margin-bottom: 0.5rem;">

<div class="form-submit">

<button type="submit" class="popup-button" onclick="payWithPaystack()">Pay with Paystack</button>
</div>
</form>

    </div>
</div>



<script src="https://js.paystack.co/v1/inline.js"></script> 
    </body>

    <script>
        const paymentForm = document.getElementById('paymentForm');

        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {

        e.preventDefault();


        let handler = PaystackPop.setup({

            key: 'pk_test_da8c018183ed5b95414d66cf2a87f4a9f4324b7a', // Replace with your public key

            email: document.getElementById("email-address").value,
    
            amount: <?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0?> * 100,

            ref: 'KC'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

            // label: "Optional string that replaces customer email"

            onClose: function(){

            alert('Payment failed.');

            },

            callback: function(response){

            let message = 'Payment complete! Reference: ' + response.reference;

            alert(message);
            window.location = "http://localhost/Practice%20E-commerce/callback.php?reference=" + response.reference;

            }

        });

        handler.openIframe();

        }
    </script>

<?php
include("footer.php");
?>
