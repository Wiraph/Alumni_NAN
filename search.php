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
      <title><?php echo _System_SRARCH;?></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>About</title>
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
      <link rel="icon" href="images/fevicon.png" type="image/index/gif" />
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



<!--search section start -->
<div class="about_section layout_padding search-page">
         <div class="container">
            <h1 class="about_taital text-center"><?php echo _SRARCH_taital;?></h1>
            <div class="alumni-divider"></div>
            <p class="about_text"><?php echo _SRARCH_aboyt_text;?></p>
            <div class="about_section_2">
               <div class="row">
                  <!-- <div class="col-lg-12">dfdsfd
                     <div > -->
                        <!-- <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words </p> -->


                              <!-- contact section start -->
      <div class="contact_section layout_padding margin_top90 search-hero">
         <div class="container">
            <h1 class="contact_taital mb-2"><?php echo _SRARCH_contact_taital;?></h1>
            <p class="contact_text mb-4"><?php echo _SRARCH_contact_text;?> </p>
            <div class="contact_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="contact_main">
                     <form method="post">
                           <input class="mail_text" id="searchdata" type="text" name="searchdata" required="true" d placeholder="<?php echo _SRARCH_byname;?>">
                           <select class="mail_text"  name="department_id" class="form-control" >
                                             <option><?php echo _SRARCH_branch;?></option>
                                                
                                             <?php 

                                                   $sql2 = "SELECT * from    tbldepartment ";
                                                   $query2 = $dbh -> prepare($sql2);
                                                   $query2->execute();
                                                   $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                                                   foreach($result2 as $row1)
                                                   {
                                                         ?>
                                                   <option value="<?php echo htmlentities($row1->id);?>"><?php echo htmlentities($row1->department_name);?></option>
                                                   <?php } ?>
                           </select>
                           <select class="mail_text"  name="program_id" class="form-control" >
                                      <option><?php echo _SRARCH_course;?></option>
                                      <?php
                                            $sql2 = "SELECT * from    tblprogram ";
                                            $query2 = $dbh -> prepare($sql2);
                                            $query2->execute();
                                            $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                                            foreach($result2 as $row1)
                                            {
                                                ?>
                                            <option value="<?php echo htmlentities($row1->id);?>"><?php echo htmlentities($row1->program_name);?></option>
                                            <?php } ?>
                           </select>
                           <div class="send_bt"><button type="submit" class="btn btn-success search-btn" name="search" id="submit"><?php echo _SRARCH_submit;?></button></div>
                     </form>

                        <!-- <div class="send_bt"><a href="#">SEND</a></div> -->
                        
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="map_main">
                        <!-- <div class="map-responsive">
                           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div> -->
                        <div class="about_image"><img src="images/index/about-img.png"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->











      <div class="d-sm-flex align-items-center mb-4">


<?php
if(isset($_POST['search']) || isset($_POST['department_id']) || isset($_POST['program_id']))
{ 

$sdata_name=$_POST['searchdata'];
$sdata_department_id=$_POST['department_id'];
$sdata_program_id=$_POST['program_id'];


?>
<h4 align="center"><?php echo _SRARCH_center1;?> <?php echo $sdata;?> <?php echo _SRARCH_center2;?> </h4>
</div>
<div class="table-responsive table-card p-0">

<table class="table search-table mb-0">
 <thead>
   <tr>
     <th class="font-weight-bold"><?php echo _SRARCH_font1;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font2;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font3;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font4;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font5;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font6;?></th>
     <th class="font-weight-bold"><?php echo _SRARCH_font7;?></th>
     
   </tr>
 </thead>
 <tbody>
    <?php
    

$sql="SELECT tblgrad_student.student_id,tblgrad_student.id as sid,tblprefixname.prefix_name,tblgrad_student.first_name,tblgrad_student.last_name,tblcampus.fullname,tblfaculty.faculty_name,tblgrad_student.department_id,tbldepartment.department_name,tblprogram.program_name,tblgrad_student.program_id,tblgrad_student.grad_year,tbllevel.level_name,tblgrad_student.username from tblgrad_student inner join tblcampus on tblgrad_student.campus_id=tblcampus.id inner join tblfaculty on tblgrad_student.faculty_id=tblfaculty.id inner join tbldepartment on tblgrad_student.department_id=tbldepartment.id inner join tblprogram on tblgrad_student.program_id=tblprogram.id inner join tbllevel on tblgrad_student.level_id=tbllevel.id inner join tblprefixname on tblgrad_student.prefix_id=tblprefixname.id where tblgrad_student.first_name like '$sdata_name%' and tblgrad_student.program_id = '$sdata_program_id' and tblgrad_student.department_id = '$sdata_department_id'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{       
//$_SESSION['newregister']=$row->sid;
//$_SESSION['newfirst_last']=$row->first_name." ".$row->last_name;
?>   
   <tr>
    
     <td><?php echo htmlentities($cnt);?></td>
     <td><?php  echo htmlentities($row->student_id);?></td>
     <td><?php  echo htmlentities($row->fullname);?> </td>
     <td><?php  echo htmlentities($row->prefix_name."".$row->first_name." ".$row->last_name);?></td>
     <td><?php  echo htmlentities($row->program_name);?></td>
     <td><?php  echo htmlentities($row->grad_year);?></td>
     <td>
          

                 <?php if($row->username==""){?>
                 <div> 
                 <a class="btn btn-warning btn-sm" target="_blank" href="register.php?student_id=<?php echo $row->student_id?>"><?php echo _SRARCH_warning;?></a></div>
                 <?php }else {?>
                     <div>
                     <a class="btn btn-success btn-sm"  href="user/login.php"><?php echo _SRARCH_success;?></a> </div>
                 <?php }?>

             </div>
     </td> 
   </tr><?php 
$cnt=$cnt+1;
} } else { ?>
<tr>
<td colspan="8"> <?php echo _SRARCH_8;?></td>

</tr>
<?php } }?>
 </tbody>
</table>
</div>

               


                        <!-- <div class="read_bt"><a href="#">Read More</a></div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--search section end -->





   <!-- footer section end -->
      <!-- copyright section start -->
      <?php include_once('includes/footer.php');?>
      <!-- copyright section end -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
   </body>
</html>