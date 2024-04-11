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
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
}

if (isset($_POST['news'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    mysqli_query($conn, "INSERT INTO `newsletter`(email) VALUE ('$email')") or die('query failed');;
    header('location:index.php');

}

?>
<style>
    .popup-card .close-btn{
        margin: 20px;
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
        <h3 class="ShopGet">Get your face and Body Products at affordable Prices!!</h3>
    
        <div class="pro-container">
    
            <div data-id="17" class="pro">
                <img src="Images/AvonAnew1.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Ultimate Night Cream</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦13,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '34'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(34, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="18" class="pro">
                <img src="Images/Avon%20Firming.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Extra Firming & Nourishing Dual Elixir Serum & Oil</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦15,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '35'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(35, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
            <div data-id="19" class="pro">
                <img src="Images/Avon%20Clinical.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Clinical Even Texture & Tone Dark Spot Targeted Treatment Serum</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦11,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '33'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(33, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="20" class="pro">
                <img src="Images/Avon%20Nutra.jpg" alt="">
                <div class="description">
                    <h5>AVON Nutra Effects Nourish Oil to Milk Cleanser</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '26'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(26, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="20" class="pro">
                <img src="Images/Avon%20pack.jpg" alt="">
                <div class="description">
                    <h5>AVON Anew Ultimate Power Pack</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦29,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '27'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(27, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

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

            <div data-id="20" class="pro">
                <img src="Images/Avon%20Control.jpg" alt="">
                <div class="description">
                    <h5>Avon Clearskin Pore & Shine Control</h5>
                    <h6>Purifying Charcoal Mask 75ml #3200 (10-5+ 2)</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,200.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '29'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(29, $Cart->getCartId($product->getData('cart')) ?? [])){
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

            <div data-id="20" class="pro">
                <img src="Images/Avon%20Radiance.jpg" alt="">
                <div class="description">
                    <h5>Avon Nutra Effects Radiance</h5>
                    <h6>Illuminating Day Cream</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '28'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(28, $Cart->getCartId($product->getData('cart')) ?? [])){
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
    
            <div data-id="5" class="pro">
                <img src="Images/BS1.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Tea Tree Anti-Imperfection Night Mask</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦12,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '6'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(6, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="6" class="pro">
                <img src="Images/Avon%20BodyShop.jpg" alt="HB pencils">
                <div class="description">
                    <h5>The Body Shop Skin Defence Multi-Protection Face Mist SPF30 PA+</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦13,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '7'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(7, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="7" class="pro">
                <img src="Images/BS2.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop File a Foot</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦3,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '8'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(8, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/BS3.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Shea Hand Cream</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦9,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '9'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(9, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/TBS%20vitamin%20C.jpg" alt="">
                <div class="description">
                    <h5>TBS Vitamin C Glow Boosting Moisturiser</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦15,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '17'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(17, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/Ginseng.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Chinese Ginseng & Rice Clarifying Polishing Mask</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦13,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '18'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(18, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/Arber.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Arber Hair & Body Wash</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦5,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '19'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(19, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/FacialOil.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Oils of Life™ Intensely Revitalising Facial Oil</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦27,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '20'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(20, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/Primer.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Instablur™ Primer</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦11,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '21'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(21, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/Satsuma.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Satsuma Body Butter</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦11,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '22'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(22, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="8" class="pro">
                <img src="Images/olive.jpg" alt="">
                <div class="description">
                    <h5>The Body Shop Body Butter Olive</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦11,000.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '23'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(23, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>

            <div data-id="8" class="pro">
                <img src="Images/TBS%20shea.jpg" alt="">
                <div class="description">
                    <h5>TBS Shea Refill Hand Wash</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦4,700.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '24'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(24, $Cart->getCartId($product->getData('cart')) ?? [])){
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


<?php
include("footer.php");
?>