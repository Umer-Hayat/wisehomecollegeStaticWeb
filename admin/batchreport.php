
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
$batch_id = $_GET['batch'];
$from = $_GET['from'];
$to = $_GET['to'];
if(isset($_GET['del']))
{
    $result=$st->deleteStudent($_GET['del']);
    if($result){
      // echo " <script>alert('Student Deleted Successfully');</script>";
      echo '<script>window.location.replace("students.php")</script>';
    }
}

?>


      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">
          <?php
          if(isset($_GET['edit']))
          {
            if(isset($_POST['submit'])){
              echo '<script>window.location.replace("feesmanagement.php")</script>';
            }

           ?>

          <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center">Update Fees of Student</h3>
                               
                                <form class="form-material m-t-30 row" method="post">
                                  <div class="row text-center">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label>Student Name:</label>
                                <!-- <select class="form-control" required name="RoomNo"> -->
                                    <!-- <option value="">Select Student</option> -->
                                <?php
                                $id = $_GET['edit'];
                                $student=$st->getAllRecordByQuery("select * from students where status='active' and id='$id'");
                                if($student)
                                {
                                while ($getAll=$student->fetch_assoc()) {
                                    ?>
                                    <!-- <option value="<?php echo $getAll['id']; ?>"><?php echo $getAll['name']; ?></option> -->
                                    <input type="text" name="fname" readonly class="form-control form-control-line" value="<?php echo $getAll['name']; ?>"> 
                                    <?php
                                }}
                                ?>
                                <!-- </select> -->
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label>Payment Type:</label>
                                      <select class="form-control" required name="Paymenttype">
                                    <option value="">Select Payment type</option>
                                    <option value="">Installment</option>
                                    <option value="">Full</option>
                                  </select>
                                        <!-- <input type="text" name="fname" class="form-control form-control-line" placeholder="Enter Student Father Name">  -->
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                        <input type="number" name="cnic" class="form-control" placeholder="Enter CNIC Number">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Class Starting Date:</label>
                                        <input type="date" name="expdate" class="form-control" placeholder="Enter CNIC Number">
                                    </div>
                                    <div class="col-md-12 m-t-10 text-center">
                                        <input type="reset" class="btn btn-secondary" >
                                        <input type="submit" name="submit" value="Update" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
          </div>
        <?php } ?>

          <div class="row">
            <!-- column -->

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Fees Management</b></h4>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Fees</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Fees</th>
                          <th>Date</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                         $query1 = "SELECT * FROM fee WHERE batch_id='$batch_id' and 'date' BETWEEN '$from' AND '$to'";
                         $query = "SELECT * FROM fee WHERE batch_id='$batch_id' and date BETWEEN '$from' AND '$to'";
                                $student=$st->getAllRecordByQuery($query);
                            
                            if($student)
                            {
                              $i=1;
                              while ($getAll=$student->fetch_assoc())
                              {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td>
                            <?php
                                $id = $getAll['student_id'];
                                $stu=$st->getAllRecord($id,'students');
                                $get=$stu->fetch_assoc();
                            ?>
                            <?php echo $get['name']; ?>
                            
                          </td>
                          <td><?php echo $get['fname']; ?></td>
                          <td><?php echo $getAll['amount']; ?></td>
                          <td><?php echo $getAll['date']; ?></td>
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