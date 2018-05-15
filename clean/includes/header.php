<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <?php 
    $page =  $_SERVER['REQUEST_URI'];
    $page = preg_replace('/\/?(?:(?:[a-z]|[A-Z]|[0-9])+\/)*((?:[a-z]|[A-Z]|[0-9])+)\.php/', '$1', $page);
    if ($page == "assignment"){?>
    <meta http-equiv="refresh" content="5"; url="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php }?>
    <title>Gamification Testing Platform</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/style.css" />

     <link rel="stylesheet" href="css/newstyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    
    <script src="js/modernizr.js"></script>
    <script src="js/idangerous.swiper-2.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDktEavPJhrxbghkc0vCtFzd-SoTcp1Ioo"></script>
    <script src="js/jquery.gomap-1.3.2.js"></script>    
    <script src="https://use.fontawesome.com/d97a867d03.js"></script>
  </head>
  <body <?php global $bodyclass; echo 'class="'.$bodyclass.'"';?>>
