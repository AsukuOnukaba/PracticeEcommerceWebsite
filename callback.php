<?php
require ('database/DBController.php');
require ('database/Product.php');
require ('database/carts.php');
include 'database/config.php';

$db = new DBController();
$Cart = new Cart($db);
$product = new Product($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $select = mysqli_query($conn, "SELECT cart_id, item_id FROM `cart`") or die('query failed');
  if (mysqli_num_rows($select) > 0) {

    for ($x = 0; $x <= 10; $x++) {
      echo "The number is: $x <br>";
      } 
        while($row = mysqli_fetch_assoc($select)) {
        $Cid = $row['cart_id'];
        $Item_id = $row['item_id']; 
 
      }
    }
  mysqli_query($conn, "INSERT INTO `order`(cart_id, item_id, item_quantity) VALUES('$Cid', '$Item_id', '$cookie')") or die('query failed');
    if (isset($_POST['ClearCartSubmission'])) {
        $deleted = $Cart->ClearCart($_POST['item_id']);
    }
  }


$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_2dedcbfab29eb37dc27f37e5a69dbb18894df0cd",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
  echo "<h2>Thank you for making a purchase. Your reciept has been sent your email.</h2>";
}
?>
<form method="post">
  <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
  <button type="submit" name="ClearCartSubmission" class="btn-area"><h2>Return to home</h2></button>
</form>



