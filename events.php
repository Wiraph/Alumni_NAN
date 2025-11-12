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
      <title><?php echo _System_EVENTS;?></title>
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
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><?php echo _EVENTS_taital;?></h1>
            <p class="about_text"><?php echo _EVENTS_about_text;?></p>
            <div class="services_section_2">

 
            <div class="row">
    <?php

            $sql="SELECT tblpublicnotice.ID,NoticeTitle,NoticeMessage,NoticeUrl,image,date(CreationDate) as CreationDate, AdminName  from tblpublicnotice left join tbladmin on tblpublicnotice.UserUpdate = tbladmin.ID order by tblpublicnotice.ID desc limit 6";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $row)
            {          
               $len_msg = strlen($row->NoticeMessage);
              $len_msg_cut = "";
              if($len_msg>=50){
                $len_msg_cut = substr($row->NoticeMessage,0,500)."...";

              }else{
                $len_msg_cut = $row->NoticeMessage;
              }

             
              
              ?>
    <div class="col-sm-4 mb-4 d-flex">
      <div class="card w-100 h-100">
             <!-- <div class="icon_box" >
                  <div class="icon_1" ><img src="images/index/icon-1.png"></div>
             </div> -->
             <img class="card-img-top event-card-img" src="admin/noticepic/<?php  echo htmlentities($row->image);?>" alt="Event image">
        <div class="card-body d-flex flex-column">
          <h4 class="card-title">
          <?php  echo htmlentities($row->NoticeTitle);?>
          </h4>
          <p class="card-text" style="font-size: 18px;">
          <?php  echo htmlentities($len_msg_cut);?> 
          </p>
          <hr>
          <div class="mt-auto">
            <div class="d-flex align-items-center mb-2" style="gap:8px;">
              <i class="fa fa-map-marker" style="font-size: 18px;"></i>
              <span class="text-muted">
                <?php echo _EVENTS_card_title1;?> (<?php  echo htmlentities($row->CreationDate);?>) 
                <?php echo _EVENTS_card_title2;?> <?php  echo htmlentities($row->AdminName);?>
              </span>
            </div>
            <div class="read_bt"><a target="_blank" href="<?php  echo htmlentities($row->NoticeUrl);?>"><?php echo _EVENTS_card_title3;?> </a></div>
          </div>
          
          <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
        </div>
      </div>
    </div> 
    <?php
}
?>
    <?php
} else { 
?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1> <?php echo _EVENTS_Col;?>
          </h1>
        </div>
      </div>
    </div>
    <?php
}
?>
  </div>            









              
         </div>
      </div>
      <!-- services section end -->

      <!-- footer section end -->
      <!-- copyright section start -->
      <?php include_once('includes/footer.php');?>
      <!-- copyright section end -->
   </body>
</html>