<?php
//require functions
require ('functions.php');
require ('database/Product.php');
$db = new DBController();
$product = new Product($db);
$Cart = new Cart($db);
include 'database/config.php';
session_start();


if (isset($_POST['news'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUE ('$email')") or die('query failed');;
    header('location:index.php');

}


if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="styles.css">

</head>
<style>
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
        <h3 class="ShopGet">All Products!!</h3>
        <div class="pro-container">

            <div data-id="20" class="pro">
                <img src="Images/Avon%20Pore.jpg" alt="">
                <div class="description">
                    <h5>AVON Clearskin Pore & Shine Control</h5>
                    <h6>Black Exfoliating Mineral Cleanser 125ml #3200 (12-3+2)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '50'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(50, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
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

            <div data-id="20" class="pro">
                <img src="Images/Avon%20Balm.jpg" alt="">
                <div class="description">
                    <h5>AVON CS Restore & Calm Hand and Body Balm</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '54'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(54, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="14" class="pro">
                <img src="Images/Avon%20Mascara1.jpg" alt="">
                <div class="description">
                    <h5>AVON Distillery Lashed up Mascara</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦7,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(1, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="28" class="pro">
                <img src="Images/Avon%20LED%201.jpg" alt="">
                <div class="description">
                    <h5>AVON LED Moon Mood Lamp</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '55'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(55, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
    
            <div data-id="29" class="pro">
                <img src="Images/Avon%20Bear1.jpg" alt="">
                <div class="description">
                    <h5>AVON Bear LED Light</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '56'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(56, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
    
            <div data-id="30" class="pro">
                <img src="Images/Avon%20Wrap.jpg" alt="">
                <div class="description">
                    <h5>AVON Reusable Sandwich Wrap</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '57'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(57, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/watches.jpg" alt="">
                <div class="description">
                    <h5>AVON Laveena Fiorelli Watch</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦16,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '58'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(58, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/cutlery.jpg" alt="">
                <div class="description">
                    <h5>Avon 3-Piece Bamboo Cutlery Set</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '59'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(59, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/waxMelts.jpg" alt="">
                <div class="description">
                    <h5>AVON Vanilla Bean</h5>
                    <h6>Wax Melts #3500 (2)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '60'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(60, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/candle.jpg" alt="">
                <div class="description">
                    <h5>AVON Vanilla Bean</h5>
                    <h6>Candle #4000 (3)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '61'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(61, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/Vanilla.jpg" alt="">
                <div class="description">
                    <h5>AVON Vanilla Bean</h5>
                    <h6>Diffuser #4900 (3)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,900.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '62'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(62, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/Avon%20lunch.jpg" alt="">
                <div class="description">
                    <h5>AVON Lunch Bag</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦7,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '63'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(63, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/Earphones.jpg" alt="">
                <div class="description">
                    <h5>Avon Sparkling Earphones Embellished with crystals by Swarovski®</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦6,900.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '64'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(64, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/bracelet.jpg" alt="">
                <div class="description">
                    <h5>Avon Luciano Bracelet Gift Set</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,400.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '65'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(65, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="30" class="pro">
                <img src="Images/Aroma.jpg" alt="">
                <div class="description">
                    <h5>AVON Aroma Diffuser</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦13,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '66'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(66, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="20" class="pro">
                <img src="Images/Avon%20Tonic.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Radiance Maximising Tonic</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦8,800.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '67'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(67, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="20" class="pro">
                <img src="Images/Avon%20Dual.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Lifting Dual Eye System</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦10,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '72'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(72, $Cart->getCartId($product->getData('cart')) ?? [])){
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
    
        </div>
    </section>

<section id="pagination" class="section-p1">
    <a href="shop.php">1</a>
    <a href="shop2.php">2</a>
    <a href= "shop3.php"> <u>3</u></a>
    <a href="shop4.php"><i class="fal fa-long-arrow-alt-right"></i></a>
</section>

<?php
include("footer.php");
?>