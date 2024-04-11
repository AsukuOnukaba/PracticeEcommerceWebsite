<?php
//require Mysql Connection
require ('database/DBController.php');

//require Cart Class
require ('database/carts.php');

//DBController object
$db = new DBController();



// Cart Object
$Cart = new Cart($db);
