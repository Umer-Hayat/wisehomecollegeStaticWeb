<?php include("includes/header.php"); 

 include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
?>
<div class="page-wrapper">
          <br />
          <br />
          <div class="container-fluid">
            <div class="row">
            <!-- column -->

            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Today Due Date Fee Students</b></h4>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                              <tr>
                                <th>No#</th>
                                <th>Student Name</th>
                                <th>Batch</th>
                                <th>Totall Fee</th>
                                <th>Contact No</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $student=$st->getAllRecordofFees();
                                if($student)
                                {
                                  $i=1;
                                  while ($getAll=$student->fetch_assoc())
                                  {

$date1 = strtotime($getAll['start_date']);  
$date2 = strtotime(date("y-m-d"));  
$diff = abs($date2 - $date1);  
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                $S_id = $getAll['id'];
                                $re = $st->getAllRecordFeeById($S_id,'fee');
                                if ($re) {
                                    $get=$re->fetch_assoc();
                                  if ($get['installment'] <= $months) {
                                    # code...
                                  
                                    $st->updateFeeStatus($S_id);
                              ?>
                              <tr>
                                <td><?php echo $i; $i++; ?></td>
                                
                                <td>
                                  <a                              
                                    href="students.php?view=<?php echo $getAll['id']; ?>">
                                    
                                    <?php echo $getAll['name']; ?>
                                  </a>
                                </td>
                                <td>
                                    <?php
                                        $id = $getAll['batch_id'];
                                        $stu=$st->getAllRecord($id,'batch');
                                        $get=$stu->fetch_assoc();
                                    ?>
                                    <?php echo $get['batch_name']; ?>
                                    
                                  </td>
                                <td><?php echo $getAll['fee']; ?></td>
                                <td><?php echo $getAll['contact']; ?></td>
                                <td>
                                  
                                  <a target="blank"
                                    href="https://api.whatsapp.com/send?phone=<?php echo $getAll['contact']; ?>&text=Message From Wise Home College!! Dear Student, Today is your Due Date Please Pay your fee as soon as possible!">
                                    <div class="label label-table label-success">Send Whatsapp Msg</div>
                                  </a>
                                </td>
                              </tr>
                                <?php }}else{
                                  $st->updateFeeStatus($S_id);
                              ?>
                              <tr>
                                <td><?php echo $i; $i++; ?></td>
                                
                                <td>
                                  <a                              
                                    href="students.php?view=<?php echo $getAll['id']; ?>">
                                    
                                    <?php echo $getAll['name']; ?>
                                  </a>
                                </td>
                                <td>
                                    <?php
                                        $id = $getAll['batch_id'];
                                        $stu=$st->getAllRecord($id,'batch');
                                        $get=$stu->fetch_assoc();
                                    ?>
                                    <?php echo $get['batch_name']; ?>
                                    
                                  </td>
                                <td><?php echo $getAll['fee']; ?></td>
                                <td><?php echo $getAll['contact']; ?></td>
                                <td>
                                  
                                  <a target="blank"
                                    href="https://api.whatsapp.com/send?phone=<?php echo $getAll['contact']; ?>&text=Message From Wise Home College!! Dear Student, Today is your Due Date Please Pay your fee as soon as possible!">
                                    <div class="label label-table label-success">Send Whatsapp Msg</div>
                                  </a>
                                </td>
                              </tr>
                                <?php }}} ?>
                            </tbody>
                    </table>


                    



                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <footer class="footer">
            © 2020 Alrights Reserved
          </footer>
          <!-- ============================================================== -->
          <!-- End footer -->
          <!-- ============================================================== -->
        </div>

<!-- Footer -->
<?php include("includes/footer.php"); ?>