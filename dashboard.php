<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
   
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title><?php echo _system_DASHBOARD;?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/index/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/index/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/index/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/index/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/index/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/index/owl.carousel.min.css">
      <link rel="stylesheet" href="css/index/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
.container1 {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
</style>
   </head>
   <body>
    <!--header section start -->
    <?php include_once('includes/header.php');?>
      <!--header section end -->
      <!--dashboard section start -->
 <!-- <iframe  title="Sat_Alumni" width="1024" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiZTBhMTYzYzctN2NhYy00N2NhLTkzNDctOWNmMmIxYzdmMmFhIiwidCI6IjJjMGEzODE5LThjNjYtNGFlMS05YTk5LTM4MzJkOWZhY2JkOSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe> -->


<div class="container1"> 
  <!--iframe class="responsive-iframe" src="https://app.powerbi.com/view?r=eyJrIjoiMTkzYTEyOWUtZjA1Ny00Y2ExLWEzNTEtNmRjOWQwMDZhMzhjIiwidCI6IjJjMGEzODE5LThjNjYtNGFlMS05YTk5LTM4MzJkOWZhY2JkOSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe-->
<iframe title="<?php echo _DASHBOARD_taital;?>"  class="responsive-iframe" src="https://app.powerbi.com/view?r=eyJrIjoiMzA3MjdmMWEtMGYwZi00MzNkLWJlMTgtYzM5NWYyNjRhNzRjIiwidCI6IjJjMGEzODE5LThjNjYtNGFlMS05YTk5LTM4MzJkOWZhY2JkOSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
</div>
      <!--about section end -->
       <!-- footer section end -->
      <!-- copyright section start -->
      <?php include_once('includes/footer.php');?>
      <!-- copyright section end -->
   </body>
</html>