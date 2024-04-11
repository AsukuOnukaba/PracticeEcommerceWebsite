<?php
include ("header.php");

include("./template/hero.php");

include("template/product.php");

include("./template/banner.php");
?>
    <section class="section category" >
        <div class="category">
            <h2>Categories</h2>
        </div>
        <div class="cat-center">

            <div class="cat">
                <img src="./images/Avon Bear1.jpg" alt="" />
                <a href="homeProducts.php">
                    <p>HOME AND OTHERS</p>
                </a>
            </div>

            <div class="cat">
            <img src="Images/Avon%20Eve%202.jpg" alt="Perfume">
                <a href="women.php">
                    <p>Women</p>
                </a>
            </div>

            <div class="cat">
            <img src="Images/Ginseng.jpg" alt="">
                <a href="faceBodyProducts.php">
                    <p>FACE AND BODY</p>
                </a>
            </div>

            <div class="cat">
            <img src="Images/AvonMaxine1.jpg"  alt="Perfume">
                <a href="menProducts.php">
                    <p>MEN</p>
                </a>

            </div>

            <div class="cat">
            <img src="Images/Adding.jpg" alt="">
                <a href="kids.php">
                    <p>KID</p>
                </a>

            </div>
        </div>
    </section>

<?php
include("footer.php");
?>