
<?php include("includes/header.php"); ?>

<?php 
include_once 'classes/StudentManagement.php';
  $st=new StudentManagement();

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $exp_date = $_POST['expdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $qualif = $_POST['qualif'];
    $q_from = $_POST['from'];

    $check = $st->register($name,$fname,$cnic,$exp_date,$email,$password,$contact,$address,$qualif,$q_from);
    }
?>
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <br />
        <br />
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center">Student Details</h3>
                               
                                <form class="form-material m-t-40 row" method="post">
                                  <div class="row text-center">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="name" class="form-control form-control-line" placeholder="Enter Student Name"> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="text" name="fname" class="form-control form-control-line" placeholder="Enter Student Father Name"> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="number" name="cnic" class="form-control" placeholder="Enter CNIC Number">
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="date" name="expdate" class="form-control" placeholder="Enter CNIC Number">
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Student Email">
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="number" name="contact" class="form-control" placeholder="Enter Contact No">
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="text" name="qualif" class="form-control" placeholder="Enter Qualification">
                                    </div>

                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="text" name="from" class="form-control" placeholder="From">
                                    </div>
                                    <div class="form-group col-md-12 m-t-20">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="2"></textarea>
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
        </div>
        <!-- <footer class="footer">
          © 2020 Alrights Reserved
        </footer> -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include("includes/footer.php"); ?>