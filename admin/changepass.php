
<?php include("includes/header.php"); ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php
    include_once 'classes/adminLogin.php';
    if (isset($_POST['changePassword']))
    {
        $user=new adminlogin();
        $oldPassword=$_POST['Cpassword'];
        $newPassword=$_POST['Npassword'];
        $newPassword1=$_POST['NCpassword'];
        if($newPassword==$newPassword1) {
            $userCheck = $user->changePassword($_SESSION['loginId'], $oldPassword, $newPassword);
        }
        else echo "<script>alert('Password Not Match');</script>";
    }

    ?>

   <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">


    <div class="row">
            <!-- column -->
            <div class="col-md-2"></div>
            <div class="col-md-6">
              <div class="card">
                            <div class="card-body">
                                    <h3 class="card-title text-center"><b>Change PassWord</b></h3>
                                    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form role="form" class="form-material m-t-20 row" method="post" action="changepass.php">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['changePassword'])) {
                                         if($userCheck!=false)
                                         {
                                             echo "<script>alert('$userCheck');</script>";
                                             session::destroy();
                                         }else
                                         {
                                             echo "<script>alert('Current Password Not Valid..');</script>";
                                         }
                                     }
                                     ?>
                                  </span>
                                <div class="form-group col-md-12 m-t-10">
                                      <label><b>Current Password:</b></label>
                                        <input class="form-control form-control-line" required type="password" name="Cpassword"  minlength="5" placeholder="Enter Password" > 
                                </div>
                            <div class="form-group col-md-12 m-t-10">
                                      <label><b>New Password:</b></label>
                                        <input class="form-control form-control-line" required type="password" id="password" name="Npassword" minlength="5" placeholder="Enter Password" > 
                                </div>
                                <div class="form-group col-md-12 m-t-10">
                                      <label><b>Confirm Password:</b></label>
                                        <input class="form-control form-control-line" required type="password" minlength="5" name="NCpassword" id="confirm_password" placeholder="Enter Password" > 
                                </div>
                                <div class="col-md-12 m-t-10 text-center">
                            <button type="submit" name="changePassword" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Change Password</button>
                            <button type="reset" class="btn btn-secondary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                        </div>
                        </form>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

        </div>
                            </div>
                        </div>
            </div>
          </div>


<!-- /#wrapper -->
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<!-- Footer -->
<?php include("includes/footer.php"); ?>