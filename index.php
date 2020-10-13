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
          <img id="ppp" src="img/pp.jpg" class="img-fluid rounded-circle" alt="Capture2.png">
        </div>
        <div class="col-md-8 Chairman">
          <h3>Managing Director</h3>
      <p class="quotation"><?php echo $getdata['dir_msg']; ?></p>
      <!--<a class="Read" href="director-message.php">Read More...</a>-->
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
          <div class="box"><a href="german.php">
            <img src="img/german.jpg" class="img-fluid" alt="">
            <span>GERMAN</span></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="box"><a href="ielts.php">
            <img src="img/ielts.png" class="img-fluid" alt="">
            <span>IELTS</span></a>
          </div>
        </div>
         <div class="col-md-3">
          <div class="box"><a href="spanish.php">
            <img src="img/spanish.jpg" class="img-fluid" alt="">
            <span>SPANISH</span></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="box"><a href="norweigen.php">
            <img src="img/norwegian.jpg" class="img-fluid" alt="">
            <span>NORWEIGEN</span></a>
          </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-3">
         <div class="box"><a href="italian.php">
           <img src="img/italian.jpg" class="img-fluid" alt="">
           <span>Italian</span></a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
             <a href="danish.php">
           <img src="img/danish.jpg" class="img-fluid" alt="">
           <span>Danish</span></a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
             <a href="swedish.php">
           <img src="img/swedish.png" class="img-fluid" alt="">
           <span>SWEDISH</span></a>
         </div>
        </div>
        <div class="col-md-3">
         <div class="box">
            <a href="spoken.php">
           <img src="img/spoken.webp" class="img-fluid" alt="">
           <span>Spoken English</span></a>
         </div>
       </div>
      </div>
     </div>
   </section>

   <!-- Certificates -->

   <section class="certificate" id="certificate">
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

    <section class="gallary" id="gallary">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Gallery</h3>
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

<!-- Feedback -->

<section class="feedback" id="feedback">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Student Feedback</h3>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-4">
            <div class="frame-box">
              <a href="img/feedback/f1.jpeg">
            <img src="img/feedback/f1.jpeg" class="img-fluid" alt="">
            </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="frame-box">
            <a href="img/feedback/f2.jpeg">
            <img src="img/feedback/f2.jpeg" class="img-fluid" alt="">
            </a>
          </div>
          </div>
          <div class="col-md-4">
            <div class="frame-box">
            <a href="img/feedback/f3.jpeg">
            <img src="img/feedback/f3.jpeg" class="img-fluid" alt="">
            </a>
          </div>
          </div>
        </div> -->
      </div>


      <div class="main-section container">
    <!-- <div class="hedding-title"><h1>Star Rating System</h1></div>  -->
    <div class="rating-part">
      <!-- <div class="row">
        <div class="col-md-4">
            <div class="average-rating">
              <h2>2.5</h2>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <p>Average Rating</p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="loder-ratimg">
              <div class="progress"></div>
              <div class="progress-2"></div>
              <div class="progress-3"></div>
              <div class="progress-4"></div>
              <div class="progress-5"></div>
            </div>
            <div class="start-part">
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <span>80%</span><br>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <span>60%</span><br>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <span>40%</span><br>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <span>20%</span><br>
              <i aria-hidden="true" class="fa fa-star"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <i aria-hidden="true" class="fa fa-star-o"></i>
              <span>10%</span>
            </div>
        </div>
      </div> -->
      
      
      <!-- <div class="reviews"><h1>Reviews</h1></div> -->
        <div class="comment-part">
          <div class="row">
            <div class="col-md-4">
              <div class="user-img-part">
                <div class="user-img">
                  <img src="img/maleavatar.png">
                </div>
                <div class="user-text">
                  <!-- <h4>3 year ago</h4> -->
                  <p>Tom kok</p>
                  <span>Feedback</span><br />
                  <span>Date: 2/3/2020</span>
                </div>
          </div>
            </div>
            <div class="col-md-8">
                <div class="comment">
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco.</p>
              </div>
            </div>
          </div>
        </div>
        <hr />

        <div class="comment-part">
          <div class="row">
            <div class="col-md-4">
              <div class="user-img-part">
                <div class="user-img">
                  <img src="img/maleavatar.png">
                </div>
                <div class="user-text">
                  <!-- <h4>8 days ago</h4> -->
                  <p>Tom kok</p>
                  <span>Feedback</span><br />
                  <span>Date: 2/3/2020</span>
                </div>
          </div>
            </div>
            <div class="col-md-8">
                <div class="comment">
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco.</p>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="comment-part">
          <div class="row">
            <div class="col-md-4">
              <div class="user-img-part">
                <div class="user-img">
                  <img src="img/maleavatar.png">
                </div>
                <div class="user-text">
                  <!-- <h4>8 days ago</h4> -->
                  <p>Tom kok</p>
                  <span>Feedback</span><br />
                  <span>Date: 2/3/2020</span>
                </div>
          </div>
            </div>
            <div class="col-md-8">
                <div class="comment">
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco.</p>
              </div>
            </div>
          </div>
        </div>
        <hr />

    </div>
  </div>
</section>


<!-- Stories -->

   <section class="certificate" id="story">
      <div class="container">
        <div class="row mb-3">
          <div  class="col-md-12 text-center">
            <h3 class="underline-green">Success Story</h3>
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
            <button class="btn btn-primary view-btn"><a href="story.php">View More >></a></button>
          </div>
        </div>
      </div>
   </section>
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
 
 <!-- Library Area -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1874481306158961&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
