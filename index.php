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
      <title><?php echo _System ?></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>CoBsine</title>
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
{
   //echo ">>>>>>>>>>".$len_msg_cut;
?>

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
                        <div class="read_bt"><a href="about.php"><?php echo _Card_title3;?></a></div> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      
      <!--about section end -->
     <!-- services section start -->
     <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><?php echo _Services_taital;?></h1>
            <p class="about_text"><?php echo _Services_text;?></p>
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
        <article class="news-card w-100 h-100">
          <a class="news-thumb" href="<?php echo htmlentities($row->NoticeUrl); ?>" target="_blank" aria-label="open news">
            <img src="admin/noticepic/<?php echo htmlentities($row->image);?>" alt="news image">
          </a>
          <div class="news-body d-flex flex-column">
            <h3 class="news-title">
              <a href="<?php echo htmlentities($row->NoticeUrl); ?>" target="_blank">
                <?php echo htmlentities($row->NoticeTitle); ?>
              </a>
            </h3>
            <p class="news-excerpt flex-grow-1"><?php echo htmlentities($len_msg_cut); ?></p>
            <div class="news-meta">
              <?php echo _EVENTS_card_title1; ?> (<?php echo date("d/m/Y", strtotime($row->CreationDate)); ?>)
              · <?php echo _EVENTS_card_title2; ?> <?php echo htmlentities($row->AdminName); ?>
            </div>
            <a class="news-read" target="_blank" href="<?php echo htmlentities($row->NoticeUrl); ?>">
              <?php echo _EVENTS_card_title3; ?>
            </a>
          </div>
        </article>
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
          <h1> <?php echo _Col;?>
          </h1>
        </div>
      </div>
    </div>
    <?php
}?>
  </div>
         </div>
      </div>
      <!-- services section end -->

      <!-- testimonial section start -->
      <?php
$sql = "SELECT tblnotable.id, tblnotable.recognition_year, tblnotable.notable_detail,
               tblrecognition_subject.recognition_subject,
               tblgrad_student.first_name, tblgrad_student.last_name,
               tblgrad_student.campus, tblgrad_student.department, tblgrad_student.grad_year,
               tblnotable.image
        FROM tblnotable
        INNER JOIN tblrecognition_subject ON tblnotable.recognition_subject = tblrecognition_subject.id
        INNER JOIN tblgrad_student ON tblnotable.grad_student_id = tblgrad_student.student_id
        ORDER BY tblnotable.id DESC
        LIMIT 6";

$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!-- testimonial section start -->
<div class="testimonial_section layout_padding">
  <div class="container container-1170">
    <div class="text-center mb-5">
      <h1 class="testimonial_taital"><?php echo _Testimonial_taital; ?></h1>
      <div class="testimonial-divider"></div>
    </div>

    <div id="alumniCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
      <div class="carousel-inner">
        <?php
        $total = count($results);
        foreach ($results as $index => $row) {
          if(!empty($row->image)){
            $imagePath = "admin/notablepic/" . $row->image;
          }else{
            $imagePath = "admin/notablepic/notablepic.jpg";
          }
          $link = "notable-alumni1.php?id=" . $row->id;

          // One card per carousel item (single slide)
          echo '<div class="carousel-item ' . ($index == 0 ? 'active' : '') . '">';
          echo '<div class="container"><div class="row justify-content-center">';
        ?>
          <div class="col-12 d-flex align-items-stretch justify-content-center mb-4">
            <div class="testimonial_box">
              <div class="testimonial-image-wrapper">
                <img src="<?php echo htmlentities($imagePath); ?>"
                     alt="Alumni Image"
                     class="testimonial-image">
              </div>
              <div class="testimonial-content">
                <h4 class="testimonial-name"><?php echo htmlentities($row->first_name . ' ' . $row->last_name); ?></h4>
                <div class="testimonial-info">
                  <div class="testimonial-item">
                    <span class="testimonial-label"><?php echo _ALUMNI7; ?></span>
                    <span class="testimonial-value"><?php echo htmlentities($row->recognition_year); ?></span>
                  </div>
                  <div class="testimonial-item">
                    <span class="testimonial-label"><?php echo _ALUMNI3; ?></span>
                    <span class="testimonial-value"><?php echo htmlentities($row->recognition_subject); ?></span>
                  </div>
                  <div class="testimonial-item">
                    <span class="testimonial-label"><?php echo _ALUMNI5; ?></span>
                    <span class="testimonial-value"><?php echo htmlentities($row->campus); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
          echo '</div></div></div>'; // close row, container, carousel-item
        }
        ?>
      </div>

      <!-- ปุ่มเลื่อน ซ้าย-ขวา -->
      <a class="carousel-control-prev" href="#alumniCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#alumniCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>





<!-- รวม JavaScript ที่จำเป็น -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>





      <!-- testimonial section end -->
       
        <!-- contact section start -->
      <?php

// {               ?>
     
   <?php //$cnt=$cnt+1;}} ?>     
      <!-- contact section end -->
      <?php include_once('includes/footer.php');?>
<!--/copy-rights-->

<script>
displayAbout()
function displayAbout() {
   var span_Text = document.getElementById("sp_aboutus").innerText;
   if(span_Text.length >200){ //alert("xxx");
      span_Text = span_Text.substr(0, 200) + ".....";
      document.getElementById("p_aboutus").innerText = span_Text;
   }else{
      //alert("yyyy");
      document.getElementById("p_aboutus").innerText = span_Text;
   }
   
   //alert (span_Text);
}
</script>
	</body>
</html>