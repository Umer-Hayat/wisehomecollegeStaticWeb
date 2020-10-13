<?php include("includes/header.php"); ?>

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
            <h3 class="heading">Certificates</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="gallery-block cards-gallery">
      <div class="container">
          
          <div class="row">
            <?php

                $query = "select * from certificate ORDER BY id DESC";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>
              <div class="col-md-6 col-lg-4">
                  <div class="card border-0 transform-on-hover">
                    <!-- <a class="lightbox" href="images/certificateImages/<?php echo $getAll['image'] ?>"> -->
                      <img src="images/certificateImages/<?php echo $getAll['image'] ?>" alt="Card Image" class="card-img-top">
                    <!-- </a> -->
                      <!-- <div class="card-body">
                          <h6><a href="#">Certificate</a></h6>
                          <p class="text-muted card-text">Certificate discription display here..</p>
                      </div> -->
                  </div>
              </div>
            <?php }} ?>
          </div>
      </div>
    </section>
    <br>

 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
