<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
$editid=$_POST['editid'];
$username=$_POST['username'];
$newpassword=md5($_POST['newpassword']);


//check username
$sql_ck_username  = "SELECT username FROM tblgrad_student where username=:username";
$query_user= $dbh -> prepare($sql_ck_username);
$query_user-> bindParam(':username', $username, PDO::PARAM_STR);
$query_user-> execute();
$results = $query_user -> fetchAll(PDO::FETCH_OBJ);
if($query_user -> rowCount() > 0)
{
    echo "<script>alert('ผู้ใช้มีอยู่แล้ว');</script>";
}else{
//die("2");
    $sql ="SELECT username,password FROM tblgrad_student WHERE student_id=:editid";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':editid', $editid, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);


    if($query -> rowCount() > 0)
    {
    $con="update tblgrad_student set username=:username, password=:newpassword where student_id=:editid";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1-> bindParam(':editid', $editid, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    session_destroy();

    echo "<script>alert('ชื่อผู้ใช้และของคุณได้รับการเปลี่ยนแปลงสำเร็จ');</script>";
    echo "<script>window.location.href ='user/login.php'</script>";
    
    }
    else {
    echo "<script>alert('ผู้ใช้ไม่ถูกต้อง');</script>"; 
    }
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset='utf-8'>
    <title><?php echo _system_REGISTER;?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="user/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="user/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="user/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="user/css/style.css">
    <!-- Use the same modern theme as login pages -->
    <link rel="stylesheet" href="admin/css/custom-login.css">
    <style>
        .error {
            color: red;
            font-size: 0.875rem;
        }
        .success {
            color: green;
            font-size: 0.875rem;
        }
        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            opacity: 0.6; /* Initially disabled */
            pointer-events: none; /* Initially disabled */
        }
        .submit-btn.enabled {
            opacity: 1; /* Enabled */
            pointer-events: auto; /* Enabled */
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <div class="w-100 text-center">
                    <span class="register-icon" aria-hidden="true"><i class="icon-user-follow"></i></span>
                    <span class="login-subtitle"><?php echo _REGISTER_logo;?></span>
                  </div>
                </div>
                <h4><?php echo _REGISTER_H4;?> </h4>
                <?php
                $student_id = $_GET['student_id'];
                $sql_get_name ="SELECT first_name,last_name FROM tblgrad_student WHERE student_id=:student_id";
                $query_get_name= $dbh -> prepare($sql_get_name);
                $query_get_name-> bindParam(':student_id', $student_id, PDO::PARAM_STR);
                $query_get_name-> execute();
                $results_get_name = $query_get_name -> fetchAll(PDO::FETCH_OBJ);
                    if($query_get_name->rowCount() > 0){
                    foreach($results_get_name as $row)
                    {
                ?>

                <h4> (<?php echo "คุณ".$row->first_name." ".$row->last_name;?>)</h4>
                <?php } }?>
                <h6 class="font-weight-light"><?php echo _REGISTER_font;?></h6>
                <form class="pt-3" id="login" method="post" name="login">
                    <input type="hidden" name="editid" id="editid" value="<?php echo $student_id;?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="<?php echo _REGISTER_username;?>" required="true" name="username">
                  </div>
                  
                  <div class="form-group">
                   
                    <input class="form-control form-control-lg" type="password" name="newpassword"  id="newpassword" placeholder="<?php echo _REGISTER_Password;?>" required="true"/>
                  </div>
                  <div class="form-group">
                    
                   <input class="form-control form-control-lg" type="password" name="confirmpassword" id="confirmpassword" placeholder="<?php echo _REGISTER_ConfirmPassword;?>" required="true" />
                   <span id="passwordError" class="error"></span>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="submit"  id="submitBtn" type="submit"><?php echo _REGISTER_submit;?></button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    
                  </div>
                  <div class="mb-2">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i><?php echo _REGISTER_backhome;?></a>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="user/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="user/js/off-canvas.js"></script>
    <script src="user/js/misc.js"></script>
    <!-- endinject -->
    
  </body>
  <script>
        document.getElementById('login').addEventListener('input', function () {
           //alert("xxxxxxxs");
            validateForm();
        });

        function validateForm() { //alert("y");
            const password = document.getElementById('newpassword').value;
            const confirmPassword = document.getElementById('confirmpassword').value;
            const submitBtn = document.getElementById('submitBtn');
            const errorElement = document.getElementById('passwordError');

            let isValid = true;

            if (!password || !confirmPassword) {
                isValid = false;
            }

            if (password !== confirmPassword) {
                errorElement.textContent = '<?php echo _REGISTER_Passwornotdmatch;?>';
                errorElement.classList.remove('success');
                errorElement.classList.add('error');
                isValid = false;
            } else {
                errorElement.textContent = '<?php echo _REGISTER_Passwordmatch;?>';
                errorElement.classList.remove('error');
                errorElement.classList.add('success');
            }

            if (isValid) {
                submitBtn.classList.add('enabled');
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.remove('enabled');
                submitBtn.disabled = true;
            }
        }
    </script>
</html>