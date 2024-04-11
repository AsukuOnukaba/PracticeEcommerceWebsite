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

        <div data-id="20" class="pro">
            <img src="Images/Avon%20Scrub.jpg" alt="">
            <div class="description">
                <h5>AVON Clearskin Pore & Shine Control</h5>
                <h6>Smooth Exfoliating Scrub with Witch Hazel & Eucalyptus Extract 75ml #3200 (11-3)</h6>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦3,200.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '83'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(83, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="24" class="pro">
            <img src="Images/mesmerize.jpg" alt="">
            <div class="description">
                <h5>AVON Mesmerize Black for Him EDT</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦8,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '84'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(84, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="15" class="pro">
            <img src="Images/BodyShop.jpg" alt="">
            <div class="description">
                <h5>The Body Shop Camomile Sumptuous Cleansing Butter</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦8,500.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '85'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(85, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/Avon%20Mark.jpg" alt="">
            <div class="description">
                <h5>AVON Mark 3D Plumping Lipstick</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦4,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '86'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(86, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/Avon%20Eyeliner.jpg" alt="">
            <div class="description">
                <h5>AVON Power Stay Glimmerstick Eyeliner</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦5,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '87'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(87, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/Clayskin.jpg" alt="">
            <div class="description">
                <h5>The Body Shop Matte Clay Skin Clarifying Foundation</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦8,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '88'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(88, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>

        </div>

        <div data-id="16" class="pro">
            <img src="Images/Avon%20LipElixir.jpg" alt="">
            <div class="description">
                <h5>AVON CS Lip Elixir</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦6,900.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '89'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(89, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/Avon%20Glimmerstick.jpg" alt="">
            <div class="description">
                <h5>AVON True Colour Glimmerstick Eyeliner</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦3,000.00</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a> <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '90'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(90, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/Avon%20Lipstick.jpg" alt="">
            <div class="description">
                <h5>Avon Youth Awakening Lipstick</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦6,500.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '91'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(91, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="16" class="pro">
            <img src="Images/TBS%20Eyeliner.jpg" alt="">
            <div class="description">
                <h5>TBS Eyeliner Liquid</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦8,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '92'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(92, $Cart->getCartId($product->getData('cart')) ?? [])){
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
    <a href= "shop3.php"> 3</a>
    <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
</section>

<?php
include("footer.php");
?>