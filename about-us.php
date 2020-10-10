<?php include("includes/header.php"); ?>
<?php 
include_once 'admin/classes/StudentManagement.php';
  $slide=new StudentManagement(); 

  $query = "select * from homepagedata";
  $data=$slide->getAllRecordByQuery($query);
  $getdata=$data->fetch_assoc();
?>
    <section class="bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>About Us</h3>
          </div>
        </div>
      </div>
    </section>
    <br>

<!-- About BS--->
<section class="adler">
  <div class="container">
    <!-- <div class="row">
      <div  class="col-md-12 text-center">
        <h3 class="underline-green">ABOUT US</h3>
      </div>
    </div> -->
    <div class="row vision-row">
        <div class="col-md-4 ">
         <span class="float-right"> <a href="">Vision</a> <i class="fa fa-gavel"></i>
         </span>
         <br>
          <p class="vision-para">
            <?php echo $getdata['vision']; ?></p>
        </div>
        <div class="col-md-4 mt-5 text-center">
          <img width="90%" src="img/logo.jpg"  class="img-fluid c-logo" alt="img2">
        </div>
        <div class="col-md-4">
          <span ><i  class="fa fa-plane"></i> <a href="">Goals and Objectives</a> 
          </span>
          <br>
           <p>
            <?php echo $getdata['goals']; ?>
            </p>
         </div>
    </div>
    <div class="row mission-row mb-5">
      <div  class="col-md-4">
        <span class="float-right"> <a href=""> Mission</a> <i style="color: #bf2171" class="fa fa-thumbs-up"></i>
        </span>
        <br>
         <p>
          <?php echo $getdata['mission']; ?></p>
       </div>
       <div class="col-md-4">

       </div>
       <div  class="col-md-4">
        <span ><i style="color: #ed8d37" class="fa fa-graduation-cap"></i> <a href="">How to achieve them</a> 
        </span>
        <br>
         <p><?php echo $getdata['achieve']; ?></div>
  </div>
    </div>
  </div>
 </section> 
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
