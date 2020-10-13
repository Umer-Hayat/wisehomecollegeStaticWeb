<?php include("includes/header.php"); ?>
<?php 
include_once 'admin/classes/StudentManagement.php';
  $st=new StudentManagement();

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $star = $_POST['star'];
    $msg = $_POST['msg'];

    $check = $st->addFeedback($name,$gender,$star,$msg);
    if($check == "Data Inserted"){
      echo '<script>window.location.replace("feedbacks.php")</script>';
    }
  }
?>
<!-- <br> -->
    <section class="bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Give FeedBack</h3>
          </div>
        </div>
      </div>
    </section>
    <!-- <br> -->

    <section class="register">
        <div class="container">
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Write Your Feedback</b></h3>
                                <form class="form-material m-t-20 row" method="post"  enctype="multipart/form-data">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Your Name:*</b></label>
                                        <input type="text" required name="name" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Select Gender:*</b></label>
                                        <select class="form-control" required name="gender">
                                          <option value="">Select Gender</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>
                                        </select> 
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Stars:*</b></label>
                                        <select class="form-control" required name="star">
                                          <option value="5">5</option>
                                          <option value="4">4</option>
                                          <option value="3">3</option>
                                          <option value="2">2</option>
                                          <option value="1">1</option>
                                        </select> 
                                    </div>
                                    <div class="form-group col-md-12 m-t-10">
                                      <label><b>Message*:</b></label>
                                        <textarea required class="form-control" name="msg" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12 m-t-10 text-center">
                                        <input type="reset" class="btn btn-secondary" >
                                        <input type="submit" name="submit" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </section>
<br>
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
