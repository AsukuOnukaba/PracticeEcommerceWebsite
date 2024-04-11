<?php
//require functions
require ('functions.php');
require ('database/Product.php');
$db = new DBController();
$product = new Product($db);
$Cart = new Cart($db);
include 'database/config.php';


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
    <title>women</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="styles.css">

</head>
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
            <li><a href="blog.php">Blog</a></li>
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
    <h3 class="ShopGet">Get your Women Products at affordable Prices!!</h3>

    <div class="pro-container">

        <div data-id="1" class="pro">
            <img src="Images/Avon%20Eve.jpg" alt="Perfume">
            <div class="description">
                <h5>AVON Eve 2 piece Set (50mL EDP)</h5>
                <h6>Eve Alluring</h6>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>16,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '10'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(10, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>
        <div data-id="1" class="pro">
            <img src="Images/Avon%20Eve%202.jpg" alt="Perfume">
            <div class="description">
                <h5>AVON Eve piece Set (50mL EDP)</h5>
                <h6>Eve Embrace Set *2 (-1)</h6>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦16,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '11'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(11, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="4" class="pro">
            <img src="Images/Avon%20EDP.jpg" alt="">
            <div class="description">
                <h5>AVON Artistique EDP</h5>
                <h6>Iris Fétiche</h6>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦18,000.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '12'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(12, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="4" class="pro">
            <img src="Images/Avon%20Herstory1.jpg" alt="">
            <div class="description">
                <h5>AVON Herstory Love Inspires For Her Perfume Set</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦13,700.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '13'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(13, $Cart->getCartId($product->getData('cart')) ?? [])){
                    echo '<button type="submit" disabled class="inCart-button">In the Cart</button>';
                }
                else{
                    echo '<button type="submit" name="product_submit" class="popup-button">Add To Cart</button>';
                }
                ?>
            </form>
        </div>

        <div data-id="4" class="pro">
            <img src="Images/Avon%20Spritz.jpg" alt="">
            <div class="description">
                <h5>AVON Naturals Scented Spritz</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>₦1,500.00</h4>
            </div>
            <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '14'; ?>">
                <input type="hidden" name="user_id" value= "<?php echo 1; ?>">
                <?php
                if(in_array(14, $Cart->getCartId($product->getData('cart')) ?? [])){
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
            <form method="post">
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

<?php
include("footer.php");
?>