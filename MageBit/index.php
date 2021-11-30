<?php
include 'includes/autoloader.inc.php';

if(count($_POST) > 0){
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $emailObj = new emailcontr();
        $emailObj->createEmail($email);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" media="screen and (min-width: 1024px)" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1023px)" href="phonestyle.css">
    <script defer src="javascript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MageBit</title>
</head>
<body>
    <div id="top-bar">
        <div id="pin-logo">
            <img src="images/pin-logo.png">
        </div>
        <div id="about">
            <a href="#" style="text-decoration: none;">About</a>
        </div>
        <div id="how-it-works">
            <a href="#" style="text-decoration: none;">How it works</a>
        </div>
        <div id="contact">
            <a href="#" style="text-decoration: none;">Contact</a>
        </div>
    </div>
    <?php if(!isset($_POST["email"])){?>
    <div id="main-page">
        <div id="top-text">
            Subscribe to newsletter
        </div>
        <div id="lower-text">
            Subscribe to our newsletter and get 10% discount on pinapple glasses.
        </div>
        <div id="email-line"></div>
        <form  action="" method="post" class="form" id="form">
            <div class="inputForm">
                <input type="email" class="email-input" name="email" id="email-input" placeholder="Type your email address here...">
                <span id="email"></span>
                <button type="submit" name="submit" style="cursor:pointer;" id="input-arrow"></button>
                <br>
                <small id="small-text">You must accept the terms and conditions</small>
            </div>
            <input type="checkbox" name="checkbox" id="TOS-checkbox"><span class="checkmark"></span>
        </form>
        <div id="TOS-text">
            I agree to <a href="#">terms of service</a>
        </div>
        <div id="line">
        </div>
        <div id="icons">
            <div id="facebook"><img src="images/f-white.png"></div>
            <div id="instagram"><img src="images/i-white.png"></div>
            <div id="twitter"><img src="images/t-white.png"></div>
            <div id="youtube"><img src="images/y-white.png"></div>
        </div>
        <div id="main-img">
            <img src="images/image_summer.png">
        </div>
    </div>
    <?}else{?>
    <div id="success-page">
        <div id="s-icon"><img src="images/ic_success.png"></div>
        <div id="top-texts">
            Thanks for subscribing!
        </div>
        <div id="lower-texts">
            You have successfully subscribed to our email listing. Check your email for the discount code.
        </div>
        <div id="line-s"></div>
        <div id="icons">
            <div id="facebook"><img src="images/f-white.png"></div>
            <div id="instagram"><img src="images/i-white.png"></div>
            <div id="twitter"><img src="images/t-white.png"></div>
            <div id="youtube"><img src="images/y-white.png"></div>
        </div>
        <div id="main-img">
            <img src="images/image_summer.png">
        </div>
    </div>
    <?php
    }?>
</body>
</html>