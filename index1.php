<?php include("includes/header.php"); ?>

<?php 
include_once 'admin/classes/SlideManagement.php';
  $slide=new SlideManagement();  
?>
    <!-- Slider area -->

    <section class="slider-section">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
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
      <p class="quotation">WISE HOME COLLEGE was founded to welcome the individuals improve their current 
        Communication Level, either planning to study or settle abroad. We aim to provide the quality education 
        with a variety of levels, ranging from Beginner to Advanced. It is a centre dedicated to the enhancement
         of learning, recognising potential and above all to achieve excellence....</p>
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

  <section class="fi-logo">
    <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <a href="https://www.facebook.com/BSEducationalNetwork/?modal=admin_todo_tour"><i class="fa fa-facebook circle"></i></a>
        <a href="#"><i class="fa fa-instagram circle"></i></a>
      </div>
    </div>
    </div>
  </section>
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
