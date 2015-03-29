<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            require 'facebook-php-sdk-v4-4.0-dev/autoload.php';

            use Facebook\FacebookSession;
            use Facebook\FacebookJavaScriptLoginHelper;
            use Facebook\FacebookRequest;
            use Facebook\GraphNodes\GraphUser;
            use Facebook\FacebookRequestException;
            use Facebook\FacebookRedirectLoginHelper;

            FacebookSession::setDefaultApplication('1584420661806452', 'f8bb41e7e88a1bb300a2a6a1b47144af');

$helper = new FacebookRedirectLoginHelper('http://localhost/PruebaFacebook/index.php');
$loginUrl = $helper->getLoginUrl();
// Use the login url on a link or button to redirect to Facebook for authentication





?>

        <a href="<?php echo $loginUrl;?>">Login with Facebook</a>
    </body>
</html>
