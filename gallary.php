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
            <h3 class="heading">Gallary</h3>
          </div>
        </div>
      </div>
    </section>
    <section class="gallary" id="gallary">
      <div class="container">
        <div class="row">

          <?php

                $query = "select * from gallary ORDER BY id DESC";
                $data=$slide->getAllRecordByQuery($query);
                if($data)
                {
                    while ($getAll=$data->fetch_assoc())
                    {
                 ?>

            <div class="col-md-4">
              <div class="img-box">
                  <!-- <a href="images/gallaryImages/<?php echo $getAll['image'] ?>"> -->
                <img src="images/gallaryImages/<?php echo $getAll['image'] ?>" class="img-fluid d-block" alt="">
                <!-- </a> -->
              </div>
            </div>
          <?php }} ?>
        </div>
      </div>
   </section>
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
