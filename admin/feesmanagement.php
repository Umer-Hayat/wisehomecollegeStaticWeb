
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
$batch_id = $_GET['batch'];
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
                          <th>Fee Status</th>
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Fees</th>
                          <th>Fee Status</th>
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                                $student=$st->getAllRecordsByStatus($batch_id,'1');
                            
                            if($student)
                            {
                              $i=1;
                              while ($getAll=$student->fetch_assoc())
                              {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td><?php echo $getAll['name']; ?></td>
                          <td><?php echo $getAll['fname']; ?></td>
                          <td><?php echo $getAll['fee']; ?></td>
                          <td>
                            <?php
                              if($getAll['fee_status'] == 'paid'){ ?>
                                <div class="label label-table label-success">
                                  <?php echo $getAll['fee_status']; ?>
                                </div>
                            <?php }else{ ?>
                                <div class="label label-table label-warning">
                                  <?php echo $getAll['fee_status']; ?>
                                </div>
                            <?php } ?>
                          </td>
                          <td>
                            <a target="blank"
                                    href="https://api.whatsapp.com/send?phone=<?php echo $getAll['contact']; ?>&text=Message From Wise Home College!! Dear Student, Today is your Due Date Please Pay your fee as soon as possible!"><?php echo $getAll['contact']; ?>
                                  </a>
                          </td>
                          <td class="text-nowrap">
                            <?php
                              if($getAll['fee_status'] == 'paid'){ ?>
                                
                            <?php }else{ ?>
                                <a style="font-size: 14px;" class="label label-table label-success" href='payfee.php?batch=<?php echo $batch_id; ?>&id=<?php echo $getAll['id']; ?>'
                                  >
                                  <!-- <i class='fa fa-print'></i> -->
                                  Add Payment
                                </a>
                            <?php } ?>

                          
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