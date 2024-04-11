<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
            <li><a href="about.php">About</a></li>
            <li><a class="active" href="contact.php">Contact</a></li>
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
    <h2>#let's talk</h2>
    <p>LEAVE A MESSAGE, We love to hear from you!</p>
</section>

<section id="contact-details" class="section-p1">
    <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>

                <i class="fal fa-map"></i>
                <p>no.126 democracy crescent, Gaduwa estate, Abuja</p>

                <i class="far fa-envelope"></i>
                <p>hello@kithandcharm.com</p>

        </div>

            <i class="fas fa-phone-alt"></i>
            <p>+234 802 743 3480</p>

            <i class="far fa-clock"></i>
            <p>Monday to Sunday: 9.00am to 18.pm</p>

    </div>

    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7881.430342426511!2d7.460767716534984!3d8.998335064992224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0ce913694be1%3A0x4d879171a83cbe9f!2s126%20Democracy%20Cres%2C%20900110%2C%20Abuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1674259036045!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<center>
    <h4 onclick="this.remove();" class="sent-notification"></h4>
</center>
<section id="form-details">
<form id="myForm" action="sendEmail.php">
    <span>WE LOVE TO HEAR FROM YOU</span>
			<h2>Leave a message</h2>

			<label>Name</label>
			<input id="name" type="text" placeholder="Enter Name">

			<label>Email</label>
			<input id="email" type="text" placeholder="Enter Email">

			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject">

			<p>Message</p>
			<textarea id="body" cols="30" rows="10" placeholder="Type Message"></textarea><!--textarea tag should be closed (In this coding UI textarea close tag cannot be used)-->

			<button type="button" class="normal" onclick="sendEmail()" value="Send An Email">Submit</button>
	</form>
    <div class="people">
        <div>
            <p><span>Johnny Depp</span> Marketing Manager
                <br> Phone: +234 **** **** ***
                <br>Email: contact@example.com</p>
        </div>
        <div>
            <p><span>Johnny Depp</span> Marketing Manager
                <br> Phone: +234 **** **** ***
                <br>Email: contact@example.com</p>
        </div>
        
       
    </div>
</section>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>


<?php
include('footer.php')
?>