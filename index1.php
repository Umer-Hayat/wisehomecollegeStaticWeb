<?php include("includes/header.php"); ?>

<?php 
include_once 'admin/classes/StudentManagement.php';
$slide=new StudentManagement();
  // $slide=new SlideManagement(); 

  $query = "select * from homepagedata";
  $data=$slide->getAllRecordByQuery($query);
  $getdata=$data->fetch_assoc();
?>
    <!-- Slider area -->

    <section class="slider-section">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <?php
            $query = "select * from slider";
            $slides=$slide->getAllRecordByQuery($query);
            $count = mysqli_num_rows($slides);
            for ($i=1; $i < $count; $i++) {
           ?>
          <li data-target="#demo" data-slide-to="<?php echo $i; ?>"></li>
          <?php
          }
           ?>
          <!-- <li data-target="#demo" data-slide-to="2"></li> -->
        </ul>
        <div class="carousel-inner">
          
          <?php

            $query = "select * from slider LIMIT 0,1";
            $slides=$slide->getAllRecordByQuery($query);
            if($slides)
            {
              while ($getAll=$slides->fetch_assoc())
              {
                $slide_image = $getAll['slide_image'];

                echo "<div class='carousel-item active'>
                <img src='slides_images/$slide_image'>
                </div>";
              }
            }

            $query = "select * from slider";
            $slides=$slide->getAllRecordByQuery($query);
            if($slides)
            {
              while ($getAll=$slides->fetch_assoc())
              {
                $slide_image = $getAll['slide_image'];
                
                echo "<div class='carousel-item'>
                <img src='slides_images/$slide_image'>
                </div>";
              }
            }
          ?>

        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </section>
    <!-- slider end -->

 <!-- messages area -->
 <section class="messege">
  <div class="container pgc">
  <div class="row">
    <div class="col-md-12">
      <div class="row ">
        <div class="col-md-3  pp">
          <img src="img/pp.jpg" class="img-fluid rounded-circle" alt="Capture2.png">
        </div>
        <div class="col-md-8 Chairman">
          <h3>Managing Director</h3>
      <p class="quotation"><?php echo $getdata['dir_msg']; ?></p>
      <a class="Read" href="director-message.php">Read More...</a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- Courses -->
   <section class="course">
     <div class="container">
      <div class="row">
        <div  class="col-md-12 text-center">
          <h3 class="underline-green">Language Courses</h3>
        </div>
      </div>
       <div class="row">
         <div class="col-md-3">
          <div class="box">
            <img src="img/german.jpg" class="img-fluid" alt="">
            <a href="#">GERMAN</a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="box">
            <img src="img/ielts.png" class="img-fluid" alt="">
            <a href="#">IELTS</a>
          </div>
        </div>
         <div class="col-md-3">
          <div class="box">
            <img src="img/spanish.jpg" class="img-fluid" alt="">
            <a href="#">SPANISH</a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="box">
            <img src="img/norwegian.jpg" class="img-fluid" alt="">
            <a href="#">NORWEIGEN</a>
          </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-3">
         <div class="box">
           <img src="img/italian.jpg" class="img-fluid" alt="">
           <a href="#">Italian</a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
           <img src="img/danish.jpg" class="img-fluid" alt="">
           <a href="#">Danish</a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
           <img src="img/swedish.png" class="img-fluid" alt="">
           <a href="#">SWEDISH</a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
           <img src="img/spoken.webp" class="img-fluid" alt="">
           <a href="#">Spoken English</a>
         </div>
       </div>
      </div>
     </div>
   </section>

   <!-- Certificates -->

   <section class="certificate">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Certificates</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="img-box">
              <img src="img/scan0001.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="img-box">
              <img src="img/scan0001.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="img-box">
              <img src="img/scan0001.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="img-box">
              <img src="img/scan0001.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <button class="btn btn-primary view-btn"><a href="certificates.php">View More Certificates >></a></button>
          </div>
        </div>
      </div>
   </section>

    <!-- Gallary -->

    <section class="gallary">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Gallary</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="img-box">
              <a href="img/gallary/pic1.jpg">
            <img src="img/gallary/pic1.jpg" class="img-fluid" alt="">
            </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="img-box">
            <a href="img/gallary/pic2.jpg">
            <img src="img/gallary/pic2.jpg" class="img-fluid" alt="">
            </a>
          </div>
          </div>
          <div class="col-md-4">
            <div class="img-box">
            <a href="img/gallary/pic3.jpg">
            <img src="img/gallary/pic3.jpg" class="img-fluid" alt="">
            </a>
          </div>
          </div>
        </div>
      </div>
   </section>

<!-- Gallary -->

<section class="feedback">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Student Feedback</h3>
          </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <div class="frame-box">
              <iframe src="https://www.youtube.com/embed/-LK_yWPzFSM"  frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="frame-box">
              <iframe src="https://www.youtube.com/embed/-LK_yWPzFSM"  frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="frame-box">
              <iframe src="https://www.youtube.com/embed/-LK_yWPzFSM"  frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
</section>

  <!-- <section class="fi-logo">
    <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <a href="https://www.facebook.com/BSEducationalNetwork/?modal=admin_todo_tour"><i class="fa fa-facebook circle"></i></a>
        <a href="#"><i class="fa fa-instagram circle"></i></a>
      </div>
    </div>
    </div>
  </section> -->
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
