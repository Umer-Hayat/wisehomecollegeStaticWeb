
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();

$stu_id = $_GET['id'];
$batch_id = $_GET['batch'];
?>
      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">

          <?php
          if(isset($_POST['submit'])){
            // $type = $_POST['type'];
            $amount = $_POST['amount'];
            $rno = $_POST['rno'];

            // $installments = $_POST['installment'];
            $check = $st->checkReciept($rno);
            if (!$check) {
                foreach ($_POST['installment'] as $installment){
                // echo $installment."\n";
                $checkR = $st->payFee($stu_id,$batch_id,$installment,$amount,$rno);
                }
                if ($checkR) {
                    echo '<script>window.location.replace("feesmanagement.php?batch='.$batch_id.'")</script>';
                }
            }
                $check = "Reciept Already Exit";
            
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Fee Payment</b></h3>
                                <form class="form-material m-t-20 row" method="post">
                                    
                                   <div class="form-group col-md-12 m-t-10">
                                          <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                          <?php
                                              $student=$st->getAllRecord($stu_id,'students');
                                              $getAll=$student->fetch_assoc();
                                          ?>
                                          <label><b>Student Name:</b></label>
                                        <input type="text" readonly class="form-control" value="<?php echo $getAll['name'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                      <label><b>Payment Type:</b></label>
                                        <select class="form-control" required name="installment[]" multiple="multiple">
                                            <!-- <option value="">Select Installment</option> -->
                                            <!-- <option value="full">Full</option> -->
                                            <?php
                                              $std=$st->getAllRecordFeeById($stu_id,'fee');
                                              if ($std) {
                                              $get=$std->fetch_assoc();
                                              
                                                  // if ($get['installment']) {
                                                  for ($i=1; $i < 7; $i++) { 
                                                      if (($get['installment']+1) == $i) {
                                                        echo "<option selected value='".$i."'>Installment ".$i."</option>";
                                                      }else{
                                                        echo "<option value='".$i."'>Installment ".$i."</option>";
                                                      }
                                                  }
                                                // }
                                              }else{   
                                          ?>
                                            <option selected value="1">Installment 1</option>
                                            <option value="2">Installment 2</option>
                                            <option value="3">Installment 3</option>
                                            <option value="4">Installment 4</option>
                                            <option value="5">Installment 5</option>
                                            <option value="6">Installment 6</option>
                                        <?php } ?>
                                        </select>
                                    </div>    
                                    <div class="form-group col-md-6 m-t-10">
                                      <label><b>Receipt Number:</b></label>
                                        <input type="text" placeholder="Enter receipt Number" name="rno" class="form-control">
                                    </div>                                
                                    <div class="form-group col-md-6 m-t-10">
                                      <label><b>Amount:</b></label>
                                        <input type="number" value="<?php echo $getAll['fee'] ?>" name="amount" class="form-control">
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
