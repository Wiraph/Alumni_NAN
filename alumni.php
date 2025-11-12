<?php  
session_start();
error_reporting(E_ALL); // แสดงข้อผิดพลาดทั้งหมด
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo _ALUMNI; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/index/bootstrap.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/index/style.css">
    <link rel="stylesheet" href="css/index/responsive.css">
    <link rel="stylesheet" href="css/index/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/index/owl.carousel.min.css">
    <link rel="stylesheet" href="css/index/owl.theme.default.min.css">
    <link rel="icon" href="images/index/fevicon.png" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    
</head>
<body>
<?php include_once('includes/header.php'); ?>

<div class="services_section layout_padding alumni-page">
  <div class="container container-1170">
    <div class="text-center mb-5">
      <h1 class="services_taital"><?php echo _ALUMNI1; ?></h1>
      <div class="alumni-divider"></div>
    </div>
    <p class="about_text text-center mb-5"><?php echo _ALUMNI2; ?></p>

    <div id="alumniCarouselPage" class="carousel slide" data-ride="carousel" data-interval="4000">
      <div class="carousel-inner">
        <?php

        $sql = "SELECT tblnotable.id, tblnotable.recognition_year, tblnotable.notable_detail,
                       tblrecognition_subject.recognition_subject,
                       tblgrad_student.first_name, tblgrad_student.last_name, tblgrad_student.campus,
                       tblgrad_student.department, tblgrad_student.grad_year, tblnotable.image
                FROM tblnotable
                INNER JOIN tblrecognition_subject ON tblnotable.recognition_subject = tblrecognition_subject.id
                INNER JOIN tblgrad_student ON tblnotable.grad_student_id = tblgrad_student.student_id
                ORDER BY tblnotable.recognition_year DESC";

        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if (count($results) > 0) {
            foreach ($results as $index => $row) {

                if(!empty($row->image)){
                    $imagePath = "admin/notablepic/" . $row->image;
                }else{
                    $imagePath = "admin/notablepic/notablepic.jpg";
                }

        ?>
        <div class="carousel-item <?php echo ($index == 0 ? 'active' : ''); ?>">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 d-flex align-items-stretch justify-content-center mb-4">
                <div class="alumni-card-modern">
                  <div class="alumni-modern-image-wrapper">
                    <img src="<?php echo htmlentities($imagePath); ?>" class="alumni-modern-img" alt="Alumni Image">
                  </div>
                  <div class="alumni-modern-content">
                    <h5 class="alumni-modern-name">
                      <?php echo htmlentities($row->first_name . ' ' . $row->last_name); ?>
                    </h5>
                    <div class="alumni-modern-info">
                      <div class="alumni-modern-item">
                        <span class="alumni-modern-label"><?php echo _ALUMNI3; ?></span>
                        <span class="alumni-modern-value"><?php echo htmlentities($row->recognition_subject); ?></span>
                      </div>
                      <div class="alumni-modern-item">
                        <span class="alumni-modern-label"><?php echo _ALUMNI4; ?></span>
                        <span class="alumni-modern-value"><?php echo htmlentities($row->grad_year); ?></span>
                      </div>
                      <div class="alumni-modern-item">
                        <span class="alumni-modern-label"><?php echo _ALUMNI5; ?></span>
                        <span class="alumni-modern-value"><?php echo htmlentities($row->campus); ?></span>
                      </div>
                      <div class="alumni-modern-item">
                        <span class="alumni-modern-label"><?php echo _ALUMNI6; ?></span>
                        <span class="alumni-modern-value"><?php echo htmlentities($row->department); ?></span>
                      </div>
                      <div class="alumni-modern-item">
                        <span class="alumni-modern-label"><?php echo _ALUMNI7; ?></span>
                        <span class="alumni-modern-value"><?php echo htmlentities($row->recognition_year); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
        } else {
            echo '<p class="text-center">No notable alumni found.</p>';
        }
        ?>
      </div>

      <!-- ปุ่มเลื่อน ซ้าย-ขวา -->
      <a class="carousel-control-prev" href="#alumniCarouselPage" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#alumniCarouselPage" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>

</body>
</html>
