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
      <title><?php echo _system_CONTACT;?></title>
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
      <!-- contact section start -->
      <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
      <div class="contact_section layout_padding margin_top90">
         <div class="container">
            <h1 class="contact_taital"><?php echo _CONTACT_taital;?></h1>
            <p class="contact_text"><?php echo _CONTACT_text;?></p>
            <div class="contact_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="contact_main">
                     <h3 class="contact_text"><?php echo _CONTACT_Address;?> :</h3>
                        <input type="text" class="mail_text" placeholder="Full Name" name="Full Name" value="<?php  echo htmlentities($row->PageDescription);?>">
                        <h3 class="contact_text"><?php echo _CONTACT_PhoneNumber;?> :</h3>
                        <input value="<?php  echo htmlentities($row->MobileNumber);?>" type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                        <h3 class="contact_text"><?php echo _CONTACT_Email;?> :</h3>
                        <input value="<?php  echo htmlentities($row->Email);?>" type="text" class="mail_text" placeholder="Email" name="Email">
                        <!-- <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                        <div class="send_bt"><a href="#">SEND</a></div> -->
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="map_main">
                        <div class="map-responsive">
                           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php $cnt=$cnt+1;}} ?>     
      <!-- contact section end -->
      <!-- footer section end -->
      <!-- copyright section start -->
      <?php include_once('includes/footer.php');?>
      <!-- copyright section end -->
   </body>
</html>