
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
                  <h4 class="card-title">Fees Management</h4>
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
                                $student=$st->getAllRecordsByStatus($batch_id,'active');
                            
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
                          <td><?php echo $getAll['contact']; ?></td>
                          <td class="text-nowrap">
                          <a style="font-size: 14px;" class="label label-table label-success" href='#'
                          data-original-title="Pay Fee"
                              data-toggle="tooltip"
                          >
                          <!-- <i class='fa fa-print'></i> -->
                          Pay Fee
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
    </div>

</div>
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print','excel'
        ]
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
