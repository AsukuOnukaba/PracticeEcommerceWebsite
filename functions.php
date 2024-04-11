<?php
//require Mysql Connection
require ('database/DBController.php');

//require Cart Class
require ('database/carts.php');

//DBController object
$db = new DBController();

// Product object
// $User = new user($db);

// Cart Object
$Cart = new Cart($db);
