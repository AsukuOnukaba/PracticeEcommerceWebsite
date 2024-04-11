<?php
$db = new DBController();
$Cart = new Cart($db);
$product = new Product($db);

  //request method post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);

}
?>

<style>
    .popup-card .info .price{
        font-size: 20px;
        font-weight: 300;
        margin-top: 5px;
    }

    .popup-card .info p{
        font-size: x-small;
        margin: 5px;
        color: black;
        line-height: 20px;
    }
    .popup-card .close-btn{
        margin: 30px;
    }


    .popup-card .info ul, ol{
        margin-left: 5px;
        font-size: x-small;
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
</style>

<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>New collections</p>
    <div class="pro-container">
        <div class="pro">
            <img src="./Images/Avon%20EDT.jpg" alt="Perfume">
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
                <input type="hidden" name="user_id" value= "<?php echo $item['user_id'] ?? '1'; ?>">
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

        <div class="pro">
            <img src="./Images/AvonMaxine1.jpg" alt="Perfume">
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

        <div class="pro">
            <img src="./Images/Avon%20Suede.jpg" alt="Cream">
            <div class="description">
                <h5>AVON Black Suede Darul EDT</h5>
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


        <div class="pro">
            <img src="./Images/Avon%20Perceive.jpg" alt="">
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

        <div class="pro">
            <img src="./Images/BS1.jpg" alt="">
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

        <div class="pro">
            <img src="./Images/Avon%20BodyShop.jpg" alt="HB pencils">
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

        <div class="pro">
            <img src="./Images/BS2.jpg" alt="">
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

        <div class="pro">
            <img src="./Images/BS3.jpg" alt="">
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
    </div>

    
</section>


