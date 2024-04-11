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

    .popup-card .close-btn{
        margin: 20px;
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

        .popup-card .infol .popup-button, .Wish-btn {
            margin: 5px auto;
            padding: 5px 40px;
            font-size: 14px;
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
                        <h4>₦16,000.00</h4>
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

                <div data-id="16" class="pro">
                    <img src="Images/image1.jpg" alt="">
                    <div class="description">
                        <h5>AVON 2 in One Cushion Cloud Creamy Lip & Cheek Colour</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦6,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '30'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(30, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>

                <div data-id="16" class="pro">
                    <img src="Images/Avon%20Cream.jpg" alt="">
                    <div class="description">
                        <h5>AVON True Colour Cream to Powder Foundation Compact</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦7,500.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '31'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(31, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
                </div>

                <div data-id="16" class="pro">
                    <img src="Images/Avon%20Buff.jpg" alt="">
                    <div class="description">
                        <h5>AVON Buffing Foundation Brush</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₦2,000.00</h4>
                    </div>
                    <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '32'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(32, $Cart->getCartId($product->getData('cart')) ?? [])){
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
                if(in_array(35, $Cart->getCartId($product->getData('cart') )?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
            </div>
    
            <div data-id="26" class="pro">
                <img src="Images/handgel.jpg" alt="">
                <div class="description">
                    <h5>AVON Moisturising Hand Gel</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₦1,500.00</h4>
                </div>
                <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '36'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(36, $Cart->getCartId($product->getData('cart')) ?? [])){
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
                    <h4>₦2,000.00</h4>
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
        </div>
    </section>


<section id="pagination" class="section-p1">
    <a href="shop.php">1</a>
    <a href="shop2.php"><u>2</u></a>
    <a href="shop3.php">3</a>
    <a href="shop4.php"><i class="fal fa-long-arrow-alt-right"></i></a>
</section>

<?php
include("footer.php");
?>