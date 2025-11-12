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
      <title><?php echo _System_ABOUT;?></title>
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
   </head>
   <body>
                  <!--header section start -->
                  <?php include_once('includes/header.php');?>
      <!--header section end -->
      <!--about section start -->
      <?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
      <div class="about_section layout_padding">
         <div class="container">
            <h1 class="about_taital"><?php echo _About;?></h1>
            <p class="about_text"><?php  echo ($row->	PageTitle);?></p>
            <div class="about_section_2">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="about_image"><img src="images/index/about-img.png"></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="about_taital_main">
                        <p class="lorem_text"></p>
                        <p class="lorem_text"><?php  echo ($row->PageDescription);?></p><?php $cnt=$cnt+1;}} ?> </p> 
                        <!-- <div class="read_bt"><a href="#">Read More</a></div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--about section end -->
       <!-- footer section end -->
      <!-- copyright section start -->
      <?php include_once('includes/footer.php');?>
      <!-- copyright section end -->
   </body>
</html>