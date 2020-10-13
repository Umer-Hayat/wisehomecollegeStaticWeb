<?php include("includes/header.php");

include_once 'admin/classes/StudentManagement.php';
$st=new StudentManagement();
  // $slide=new SlideManagement(); 
?>



<style type="text/css">
  @media only screen and (max-device-width: 768px) {
  .heading{
    font-size: 24px !important; 
  }
}
  
</style>
    <section class="bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="heading">Student's Feedback</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="gallery-block cards-gallery" style="padding-top: 10px; padding-bottom: 10px;">
      <div class="container">
          
          <div class="main-section container">
              <div class="rating-part">

                <?php

                $query = "select * from feedback order by id desc";
                $data=$st->getAllRecordByQuery($query);
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
                  <a href="givefeedback.php" class="btn feed-btn">Give FeedBack</a>
              </div>
            </div>
      </div>
    </section>
    <br>

 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
