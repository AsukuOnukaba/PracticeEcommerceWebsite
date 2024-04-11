<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menProducts</title>
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
        <h3 class="ShopGet">Get your Men Products at affordable Prices!!</h3>
        <div class="pro-container">
    
    
            <div class="pro-container">
                <div data-id="1" class="pro">
                    <img src="Images/Avon%20EDT.jpg" alt="Perfume">
                    <div class="description">
                        <h5>AVON Attraction for Him EDT</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦9,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '2'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(2, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
    
                <div data-id="2" class="pro">
                    <img src="Images/AvonMaxine1.jpg" alt="Perfume">
                    <div class="description">
                        <h5>AVON Maxime for Him EDT</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦17,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '3'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(3, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="3" class="pro">
                    <img src="Images/Avon%20Suede.jpg" alt="Cream">
                    <div class="description">
                        <h5>AVON Black Suede Darl EDT</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦6,500.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '4'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(4, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
    
                <div data-id="4" class="pro">
                    <img src="Images/Avon%20Perceive.jpg" alt="">
                    <div class="description">
                        <h5>AVON Perceive Eau De Parfum</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦7,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '5'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(5, $Cart->getCartId($product->getData('cart')) ?? [])){
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
    
                <div data-id="24" class="pro">
                    <img src="Images/fullSpeed.jpg" alt="">
                    <div class="description">
                        <h5>Full Speed Supersonic Eau de Toilette 75mls</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦6,500.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '37'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(37, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/Avon%20HandSpray.jpg" alt="">
                    <div class="description">
                        <h5>AVON Moisturising Hand Spray</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦1,800.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '25'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(25, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/Avon%20Clearskin.jpg" alt="">
                    <div class="description">
                        <h5>Avon Clearskin Blackhead Clearing</h5>
                        <h6>Deep Clarifying Mask with Chamomile Extract 75ml #3200 (10 + 2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦3,200.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '41'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(41, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/Exfoliating.jpg" alt="">
                    <div class="description">
                        <h5>Avon Clearskin Blackhead Clearing</h5>
                        <h6>Soothing Exfoliating Cleanser with Aloe Vera and Chamomile Extract 125ml #3200 (10 + 2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦3,200.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '42'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(42, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/BodyShop%20Olive.jpg" alt="">
                    <div class="description">
                        <h5>The BodyShop Olive Nourishing Dry Body Oil</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦12,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '43'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(43, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/AloeButter.jpg" alt="">
                    <div class="description">
                        <h5>The Body Shop Aloe Body Butter</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦8,500.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '44'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(44, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/Footworks.jpg" alt="">
                    <div class="description">
                        <h5>AVON Footworks Lavender</h5>
                        <h6>Deodorising Foot and Shoe Spray with Lavender 100ml #2700 (2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦2,700.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '45'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(45, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>

                <div data-id="26" class="pro">
                    <img src="Images/huile.jpg" alt="">
                    <div class="description">
                        <h5>AVON Footworks Lavender</h5>
                        <h6>3 in 1 oil with lavender 50ml #4000 (2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦4,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '46'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(46, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
                <div data-id="26" class="pro">
                    <img src="Images/Overnight.jpg" alt="">
                    <div class="description">
                        <h5>AVON Footworks Lavender</h5>
                        <h6>Overnight Foot Treatment Cream with Lavender #2700 (2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦2,700.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '47'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(47, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/footprint.jpg" alt="">
                    <div class="description">
                        <h5>AVON Footworks Lavender</h5>
                        <h6>Clay Mask with Lavender 75ml #2700 (2)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦2,700.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '48'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(48, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="26" class="pro">
                    <img src="Images/cooling.jpg" alt="">
                    <div class="description">
                        <h5>Avon After Sun Cooling Lotion with Aloe 400ml</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦5,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '49'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(49, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>

                <div data-id="4" class="pro">
                    <img src="Images/Avon%20Roll-on%201.jpg" alt="">
                    <div class="description">
                        <h5>AVON For Him Roll On Anti-Perspirant Deodorant 50ml</h5>
                        <h6>Mesmerize for Him (10)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦1,600.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '15'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(15, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>
    
                <div data-id="4" class="pro">
                    <img src="Images/Avon%20Roll-on%202.jpg" alt="">
                    <div class="description">
                        <h5>AVON For Him Roll On Anti-Perspirant Deodorant 50ml</h5>
                        <h6>Full Speed (5)</h6>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>1,600.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '16'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(16, $Cart->getCartId($product->getData('cart')) ?? [])){
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