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
           <?php

                $query = "select * from certificate ORDER BY id DESC LIMIT 4";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>
          <div class="col-md-3">
            <div class="img-box">
              <img src="images/certificateImages/<?php echo $getAll['image'] ?>" class="img-fluid" alt="">
            </div>
          </div>
        <?php }} ?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="btn btn feed-btn mt-2" href="certificates.php">View All >></a>
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

          <?php

                $query = "select * from gallary ORDER BY id DESC LIMIT 3";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>

            <div class="col-md-4">
              <div class="img-box">
                  <a href="images/gallaryImages/<?php echo $getAll['image'] ?>">
                <img src="images/gallaryImages/<?php echo $getAll['image'] ?>" class="img-fluid" alt="">
                </a>
              </div>
            </div>
          <?php }} ?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="btn btn feed-btn mt-2" style="background-color: white;" href="gallary.php">View All >></a>
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
      </div>


  <div class="main-section container">
              <div class="rating-part">

                <?php

                $query = "select * from feedback ORDER BY id DESC LIMIT 3";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>
                  <div class="comment-part">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="user-img-part">
                          <div class="user-img">
                            <?php if ($getAll['gender'] == 'male') {
                              echo '<img src="img/maleavatar.png">';
                            }elseif ($getAll['gender'] == 'female') {
                              echo '<img src="img/femaleavatar.jpg">';
                            } ?>
                            
                          </div>
                          <div class="user-text">
                            <!-- <h4>3 year ago</h4> -->
                            <p><?php echo $getAll['name']; ?></p>
                            <span>Feedback</span><br />
                            <span><?php echo $getAll['date']; ?></span>
                          </div>
                    </div>
                      </div>
                      <div class="col-md-8">
                          <div class="comment">
                            <?php if ($getAll['star'] == '5') { ?>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                            <?php }elseif ($getAll['star'] == '4') { ?>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                            <?php }elseif ($getAll['star'] == '3') { ?>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                            <?php }elseif ($getAll['star'] == '2') { ?>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                            <?php }else { ?>
                              <i aria-hidden="true" class="fa fa-star"></i>
                              <i aria-hidden="true" class="fa fa-star-0"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                              <i aria-hidden="true" class="fa fa-star-o"></i>
                            <?php } ?>
                          <p><?php echo $getAll['msg']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr />
                <?php }} ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <!-- <button class="btn btn-primary"> -->
                  <a href="feedbacks.php" class="btn feed-btn">View All >></a>
                  <a href="givefeedback.php" class="btn feed-btn">Give FeedBack</a>
                <!-- </button> -->
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
           <?php

                $query = "select * from successstory ORDER BY id DESC LIMIT 4";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>
          <div class="col-md-3">
            <div class="img-box">
              <img src="images/certificateImages/<?php echo $getAll['image'] ?>" class="img-fluid" alt="">
            </div>
          </div>
        <?php }} ?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <a href="story.php" class="btn feed-btn mt-2">View All >></a>
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
