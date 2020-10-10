
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();

?>
      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">

          <?php
          if(isset($_POST['submit'])){
            $cnic = $_POST['cnic'];
            echo '<script>window.location.replace("booking.php?cnic='.$cnic.'")</script>';
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Booking Test</b></h3>
                                <form class="form-material m-t-20 row" method="post">
                                  
                                    <div class="form-group col-md-12">
                                      <label><b>Enter CNIC no:</b></label>
                                        <input type="number" required name="cnic" class="form-control" placeholder="Enter cnic number">
                                    </div>
                                    <div class="col-md-12 m-t-10 text-center">
                                        <input type="submit" name="submit" value="Next" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
          </div>
        </div>
      </div>
    <?php include("includes/footer.php"); ?>