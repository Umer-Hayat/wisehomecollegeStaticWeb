
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
if(isset($_GET['del']))
{
    $result=$st->deleteItem($_GET['del'],'booking');
    if($result){
      // echo " <script>alert('Student Deleted Successfully');</script>";
      echo '<script>window.location.replace("booking.php")</script>';
    }
}
?>
      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">


          <?php
          if (isset($_GET['view'])) {
            $stud_id = $_GET['view'];

          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                    <h3 class="card-title text-center"><b>Booking Detail</b></h3>
                                    <div class="row">

                                      <?php
                                          $letter=$st->getAllRecord($stud_id,'booking');
                                          $getAll=$letter->fetch_assoc();
                                      ?>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['name']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>CNIC</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['cnic']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>CNIC Expire</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['exp_date']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Date of Birth:*</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['dob']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Mobile No</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['contact']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Test Date</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['testdate']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Test Type</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['testtype']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Organization</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['org']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>payment</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['payment']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Registration Date</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['regdate']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Reference No</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['ref']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['email']; ?></p>
                                            </div>

                                            
                                        </div>
                            </div>
                        </div>
            </div>
          </div>
          <?php }
           ?>

           <?php
          if (isset($_GET['select'])) {

            if(isset($_POST['submit'])){
              $cnic = $_POST['cnic'];
              echo '<script>window.location.replace("booking.php?add&cnic='.$cnic.'")</script>';
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

            ?>
           <?php } ?>



          <?php
          if (isset($_GET['add'])) {

            $cnic = $_GET['cnic'];

            $query = "select * from students where cnic='$cnic'";
            $cn=$st->getAllRecordByQuery($query);
            if ($cn) {
              $getAll=$cn->fetch_assoc();
            }
            


          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $cnic = $_POST['cnic'];
            $exp_date = $_POST['expdate'];
            $dob = $_POST['dob'];
            $contact = $_POST['contact'];
            $testdate = $_POST['testdate'];
            $testtype = $_POST['testtype'];
            $org = $_POST['org'];
            $payment = $_POST['payment'];
            if($_POST['regdate'] != ''){
                $regdate = $_POST['regdate'];
            }else{
                $regdate = '00/00/0000';
            }
            
            $ref = $_POST['ref'];
            $email = $_POST['email'];

            $check = $st->addBooking($name,$cnic,$exp_date,$dob,$contact,$testdate,$testtype,$org,$payment,$regdate,$ref,$email);
            if ($check == "Data Inserted") {
                echo '<script>window.location.replace("booking.php")</script>';
            }
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Add Test Booking</b></h3>
                                <form class="form-material m-t-20 row" method="post"  enctype="multipart/form-data">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Student Name:*</b></label>
                                        <input type="text" required name="name" class="form-control form-control-line" placeholder="Enter Name" value="<?php
                                        if(isset($getAll['name'])){ 
                                         echo $getAll['name']; } ?>"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>CNIC Number:*</b></label>
                                        <input type="number" required name="cnic" class="form-control" placeholder="Enter Number" value="<?php
                                        if(isset($getAll['cnic'])){ 
                                         echo $getAll['cnic']; } ?>">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                        <label><b>CNIC Expire Date:</b></label>
                                        <input type="date" name="expdate" class="form-control" value="<?php
                                        if(isset($getAll['exp_date'])){ 
                                         echo date('Y-m-d',strtotime($getAll['exp_date'])); } ?>">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Date of Birth:*</b></label>
                                        <input type="date" required name="dob" class="form-control"  value="<?php
                                        if(isset($getAll['dob'])){ 
                                         echo date('Y-m-d',strtotime($getAll['dob'])); } ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Contact No:*</b></label>
                                        <div class="input-group">
                                            <input type="number" required name="contact" class="form-control pl-2" placeholder="Enter Contact Number" value="<?php
                                        if(isset($getAll['contact'])){ 
                                         echo $getAll['contact']; } ?>">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Test Date:</b></label>
                                        <input type="date" required name="testdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Test Type:*</b></label>
                                        <select name="testtype" required class="form-control">
                                          <option value="">Select Type</option>
                                          <option value="IELTS">IELTS</option>
                                          <option value="IELTSUKVI">IELTS UKVI</option>
                                          <option value="lifeskills">Life Skills</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Organization:*</b></label>
                                        <select name="org" required class="form-control">
                                          <option value="">Select Organization</option>
                                          <option value="AEO">AEO</option>
                                          <option value="british">British Council</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Payment:*</b></label>
                                        <select name="payment" required class="form-control">
                                          <option value="">Select payment</option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Registration Date:</b></label>
                                        <input type="date" name="regdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Reference No:</b></label>
                                        <input type="text" name="ref" class="form-control" placeholder="Enter Reference No">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Email:</b></label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
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
          <?php }
           ?>

           <?php
          if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

            $std=$st->getAllRecord($id,'booking');
            $getAll=$std->fetch_assoc();

            if(isset($_POST['update'])){
            $name = $_POST['name'];
            $cnic = $_POST['cnic'];
            $exp_date = $_POST['expdate'];
            $dob = $_POST['dob'];
            $contact = $_POST['contact'];
            $testdate = $_POST['testdate'];
            $testtype = $_POST['testtype'];
            $org = $_POST['org'];
            $payment = $_POST['payment'];
            if($_POST['regdate'] != ''){
                $regdate = $_POST['regdate'];
            }else{
                $regdate = '00/00/0000';
            }
            $ref = $_POST['ref'];
            $email = $_POST['email'];

            $check = $st->updateBooking($name,$cnic,$exp_date,$dob,$contact,$testdate,$testtype,$org,$payment,$regdate,$ref,$email,$id);
            if ($check == "Data Updated") {
                echo '<script>window.location.replace("booking.php")</script>';
            }
          }
           ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Update Student Record</b></h3>
                               
                                <form class="form-material m-t-20 row" method="post">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-3">
                                      <label><b>Student Name:</b></label>
                                        <input type="text" required name="name" class="form-control form-control-line" value="<?php echo $getAll['name']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC No:</b></label>
                                        <input type="number" required name="cnic" class="form-control" value="<?php echo $getAll['cnic']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC Expire Date:</b></label>
                                        <input type="date" required name="expdate" class="form-control" value="<?php echo date('Y-m-d',strtotime($getAll['exp_date'])) ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>Date of Birth:</b></label>
                                        <input name="dob" required class="form-control"  type="date" value="<?php echo date('Y-m-d',strtotime($getAll['dob'])) ?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Contact No:</b></label>
                                        <div class="input-group">
                                            <input type="number" required name="contact" class="form-control" value="<?php echo $getAll['contact']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Test Date:</b></label>
                                        <input type="date" name="testdate" class="form-control" value="<?php echo date('Y-m-d',strtotime($getAll['testdate'])) ?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Test Type:</b></label>
                                        <select name="testtype" required class="form-control">
                                          <option value="<?php echo $getAll['testtype']; ?>"><?php echo $getAll['testtype']; ?></option>
                                          <?php if($getAll['testtype'] == "IELTS"){ ?>
                                            <option value="IELTSUKVI">IELTS UKVI</option>
                                          <option value="lifeskills">Life Skills</option>
                                          <?php  }elseif($getAll['testtype'] == "IELTSUKVI"){ ?>
                                          <option value="IELTS">IELTS</option>
                                          <option value="lifeskills">Life Skills</option>
                                          <?php }elseif($getAll['testtype'] == "lifeskills"){ ?>
                                          <option value="IELTS">IELTS</option>
                                          <option value="IELTSUKVI">IELTS UKVI</option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Organization:</b></label>
                                        <select name="org" required class="form-control">
                                          <option value="<?php echo $getAll['org']; ?>"><?php if ($getAll['org'] == "british") {
                                            echo $getAll['org'].' Council';
                                          }else{
                                            echo $getAll['org'];
                                          }  ?></option>
                                          <?php if($getAll['org'] == "AEO"){
                                            echo '<option value="british">British Council</option>';
                                          }else{ ?>
                                          <option value="AEO">AEO</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Payment:</b></label>
                                        <select name="payment" required class="form-control">
                                          <option value="<?php echo $getAll['payment']; ?>">
                                            <?php echo $getAll['payment']; ?>
                                          </option>
                                          
                                          <?php if($getAll['payment'] == "yes"){
                                            echo '<option value="no">No</option>';
                                            }else{ ?>
                                          <option value="yes">Yes</option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Registration Date:</b></label>
                                        <input type="date" name="regdate" class="form-control" value="<?php echo date('Y-m-d',strtotime($getAll['regdate'])) ?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Reference No:</b></label>
                                        <input type="type" required name="ref" class="form-control" value="<?php echo $getAll['ref']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><b>Email</b></label>
                                        <textarea class="form-control" name="email" rows="2"><?php echo $getAll['email']; ?></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <!-- <input type="reset" class="btn btn-secondary" > -->
                                        <input type="submit" name="update" value="Update" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
          </div>
          <?php }
           ?>


          <div class="row">
            <!-- column -->

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><b>Test Booking</b></h3>
                  <?php
                  if (!isset($_GET['add'])) { ?>
                  <a href="booking.php?select" class="btn btn-primary">Add New Booking</a>
                    <br>
                  <?php } ?>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>

                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>CNIC</th>
                          <th>Test Date</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>CNIC</th>
                          <th>Contact No</th>
                          <th>Test Date</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                            $letter=$st->getAllRecords('booking');
                            if($letter)
                            {
                              $i=1;
                                while ($getAll=$letter->fetch_assoc())
                                {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td>
                            <a                              
                              href="booking.php?view=<?php echo $getAll['id']; ?>">
                              <?php echo $getAll['name']; ?>
                            </a>
                          </td>
                          <td><?php echo $getAll['cnic']; ?></td>
                          <td><?php echo $getAll['contact']; ?></td>
                          <td><?php echo $getAll['testdate']; ?></td>
                          <td class="text-nowrap">
                            <a
                              href="booking.php?edit=<?php echo $getAll['id']; ?>"
                              data-original-title="Edit"
                              data-toggle="tooltip"
                              data-target="#editOrder"
                            >
                              <i class="fa fa-pencil text-inverse m-r-10"></i>
                            </a>
                            <a
                              onclick="return confirm('Are you sure to delete!')" href="booking.php?del=<?php echo $getAll['id'];?>"
                              data-toggle="tooltip"
                              data-original-title="Delete Student"
                            >
                              <i class="fa fa-close text-danger"></i>
                            </a>
                          </td>
                        </tr>
                        <?php }} ?>
                      </tbody>
                    </table>


                    



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    
<!-- Footer -->
<?php include("includes/footer.php"); ?>