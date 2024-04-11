<?php
$conn = mysqli_connect('localhost','root','','database') or die('connection failed');
include 'database/config.php';
if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
 
    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
       $message[] = 'user already exist!';
    }else{
       mysqli_query($conn, "INSERT INTO `user`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
       $message[] = 'registered successfully!';
       header('location:login.php');
    }
 
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles.css">
   
</head>
<style>
.registerbtn,
.delete-btn,
.option-btn{
   display: inline-block;
   padding:10px 30px;
   cursor: pointer;
   font-size: 18px;
   color:white;
   border-radius: 5px;
   text-transform: capitalize;
}

.registerbtn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: black;
}

.registerbtn{
   background-color: blue;
   margin-top: 10px;
}

.delete-btn{
   background-color: red;
}

.option-btn{
   background-color: orange;
}

    .form-container{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.form-container form{
    width: 500px;
    border: 2px solid black;
    padding: 20px;
    text-align: center;
    background-color: white;
}
.form-container form h3{
   font-size: 30px;
   margin-bottom: 10px;
   text-transform: uppercase;
   color:black;
}

.form-container form .box{
   width: 100%;
   border-radius: 5px;
   border:2px solid black;
   padding:12px 14px;
   font-size: 18px;
   margin:10px 0;
}

.form-container form p{
   margin-top: 20px;
   font-size: 20px;
   color:black;
}

.form-container form p a{
   color:red;
}

.form-container form p a:hover{
   text-decoration: underline;
}

.message{
   position: sticky;
   top:0; left:0; right:0;
   padding:15px 10px;
   background-color: white;
   text-align: center;
   z-index: 1000;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   color:black;
   font-size: 20px;
   text-transform: capitalize;
   cursor: pointer;
}
</style>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

    <div class="form-container">
        <form action="" method="POST">
            <h3>register now</h3>
            <input type="text" name="name" required placeholder="enter username" class="box">
            <input type="text" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="password" name="cpassword" required placeholder="confirm password" class="box">
            <input type="submit" name="submit" class="registerbtn" value="register now">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>

    </div>
</body>
</html>