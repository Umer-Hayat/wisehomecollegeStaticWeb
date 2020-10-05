
<?php include("includes/header.php"); ?>
<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
?>
<div class="page-wrapper">
          <br />
          <br />
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div>
                          <div>
                            <h4 class="card-title"><b>Today Due Date Fee Students</b></h4>
                            <hr/>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No#</th>
                                <th>Student Name</th>
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
                                    $S_id = $getAll['id'];
                                    $st->updateFeeStatus($S_id);
                              ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                
                                <td>
                                  <a                              
                                    href="students.php?view=<?php echo $getAll['id']; ?>">
                                    
                                    <?php echo $getAll['name']; ?>
                                  </a>
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
                                <?php }} ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- <div class="col-12">
                        <div id="earning" style="height: 355px;"></div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
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