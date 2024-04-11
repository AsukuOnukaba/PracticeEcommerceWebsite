<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kids</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php
//require functions
require ('functions.php');
require ('database/Product.php');
$db = new DBController();
$product = new Product($db);
$Cart = new Cart($db);
include 'database/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_SESSION["cart"])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);

}
}

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
    .popup-card .close-btn{
        margin: 20px;
    }
    @media (max-width: 840px) {
        .popup-card .infol {
            width: 100%;
            height: auto;
            padding: 20px;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }

        .popup-card .infol h4 {
            margin: 5px 5px 5px 5px;
            font-size: 25px;
        }

        .popup-card .infol p {
            font-size: x-small;
            margin: 5px;
            color: black;
            line-height: 20px;
        }

        .popup-card .infol ul, ol {
            margin-left: 5px;
            font-size: x-small;
        }

        .popup-card .infol .price {
            font-size: 20px;
            font-weight: 300;
            margin-top: 5px;
        }
    }
    .inCart-button{
        background: gold;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 15px;
        border-radius: 45px;
        cursor: pointer;
        border: none;
        transition: 0.2s;
        margin-top: 0.5em;
    }
    .popup-card .infol{
        z-index: 2;
        background: #fff;
        display: flex;
        flex-direction: column;
        width: 65%;
        height: 100%;
        box-sizing: border-box;
        padding: 25px;
        border-radius: 10px;
    }

    .popup-card .info p{
        font-size: x-small;
        margin: 5px;
        color: black;
        line-height: 20px;
    }
    .popup-card .infol p{
        font-size: x-small;
        margin: 5px;
        color: black;
        line-height: 15px;
    }
    .popup-card .info ul, ol{
        margin-left: 5px;
        font-size: x-small;
    }
    .popup-card .infol ul, ol{
        margin-left: 5px;
        font-size: x-small;
    }

    .popup-card .info .price{
        font-size: 20px;
        font-weight: 300;
        margin-top: 5px;
    }
    .popup-card .infol .price{
        font-size: 20px;
        font-weight: 300;
        margin-top: 5px;
    }

</style>
<section id="header">
    <a href="#"><img src="Images/LOGO.jpg" class="logo" alt=""></a>

    <div>
        <ul id ="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
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
    <h2>#Let's Get Shopping</h2>
</section>

<section id="product1" class="section-p1">
        <h3 class="ShopGet">Get your Books and MakeUp Products at affordable Prices!!</h3>
        <div class="pro-container">
    
            <div data-id="9" class="pro">
                <img src="Images/bookie1.jpg" alt="">
                <div class="description">
                    <h5>Big Ideas: 8 Book Collection</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>14,700.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '51'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(51, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="10" class="pro">
                <img src="Images/bookie2.jpg" alt="">
                <div class="description">
                    <h5>Wipe Clean Activity Book</h5>
                    <h6>Let's Learn Times Tables</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,400.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '52'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(52, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="11" class="pro">
                <img src="Images/Book3.jpg" alt="">
                <div class="description">
                    <h5>Usborne Time Tables Flashcards</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '53'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(53, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="12" class="pro">
                <img src="Images/book4.jpg" alt="">
                <div class="description">
                    <h5>Usborne 50 Football Skills</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦8,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '73'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(73, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="13" class="pro">
                <img src="Images/Usborne.jpg" alt="">
                <div class="description">
                    <h5>Usborne Managing Your Money</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '74'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(74, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="13" class="pro">
                <img src="Images/Adding.jpg" alt="">
                <div class="description">
                    <h5>Usborne Wipe Clean 4+</h5>
                    <h6>Adding</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '75'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(75, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="13" class="pro">
                <img src="Images/BillyGruff.jpg" alt="">
                <div class="description">
                    <h5>Usborne The Billy Gruff +CD</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '76'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(76, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="13" class="pro">
                <img src="Images/PracticePad.jpg" alt="">
                <div class="description">
                    <h5>USBORNE Wipe Clean 5+</h5>
                    <h6>Subtracting Practice Pad</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '77'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(77, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="13" class="pro">
                <img src="Images/Writingpad.jpg" alt="">
                <div class="description">
                    <h5>USBORNE Wipe Clean Edition</h5>
                    <h6>Writing Skills 5-6 Key Skills</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '78'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(78, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="13" class="pro">
                <img src="Images/SubtractPad.jpg" alt="">
                <div class="description">
                    <h5>USBORNE Wipe Clean Edition</h5>
                    <h6>Subtracting 5-6 Key Skills</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '79'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(79, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
                
            
            <div data-id="13" class="pro">
                <img src="Images/MeasuringPad.jpg" alt="">
                <div class="description">
                    <h5>USBORNE Wipe Clean Edition</h5>
                    <h6>Measuring 5-6 Key Skills</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '80'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(80, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="13" class="pro">
                <img src="Images/Comprehension.jpg" alt="">
                <div class="description">
                    <h5>USBORNE Wipe Clean Edition</h5>
                    <h6>Comprehension 5-6 Key Skills</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '81'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(81, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="21" class="pro">
                <img src="Images/Avon%20Frozen.jpg" alt="">
                <div class="description">
                    <h5>AVON Frozen 2 in 1 Shampoo and Conditioner</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦2,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '69'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(69, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="22" class="pro">
                <img src="Images/Avon%20Minions.jpg" alt="">
                <div class="description">
                    <h5>AVON Purple Minions Kids Sun Cream SPF50 120ml</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '70'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(70, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="22" class="pro">
                <img src="Images/Avon%20Disney.jpg" alt="">
                <div class="description">
                    <h5>AVON Disney Frozen II</h5>
                    <h6>Eau de Cologne 50ml</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '71'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(71, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="23" class="pro">
                <img src="Images/Avon%20Lavender.jpg" alt="">
                <div class="description">
                    <h5>AVON Naturals Kids Good Night Lavender</h5>
                    <h6>Body Wash & Bubble Bath 250ml (3)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦2,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '68'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(68, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="23" class="pro">
                <img src="Images/Avon%20apple.jpg" alt="">
                <div class="description">
                    <h5>AVON Naturals kids</h5>
                    <h6>Magnificent Mango Crazy Hair Tamer</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦1,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '38'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(38, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="23" class="pro">
                <img src="Images/Avon%20Shampoo.jpg" alt="">
                <div class="description">
                    <h5>AVON Naturals kids</h5>
                    <h6>Shampoo & Conditioner</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦1,800.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '39'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(39, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="23" class="pro">
                <img src="Images/Avon%20sun.jpg" alt="">
                <div class="description">
                    <h5>AVON AVON Sun+ Kids' Turquoise Sun Spray SPF30-150ml</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '40'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(40, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="23" class="pro">
                <img src="Images/Avon%20frozen2.jpg" alt="">
                <div class="description">
                    <h5>AVON Frozen Body Wash</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦2,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '82'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(82, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
        </div>
    </section>


<section id="pagination" class="section-p1">
    <a href="#"><u>1</u></a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
</section>

<?php
include("footer.php");
?>