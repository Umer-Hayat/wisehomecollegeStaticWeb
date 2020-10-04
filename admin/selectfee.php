
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
            $batch = $_POST['batch'];
            $Paymenttype = $_POST['Paymenttype'];
            // $check = $st->selectBatch($batch,$Paymenttype);
            // if ($check) {
                echo '<script>window.location.replace("feesmanagement.php?batch='.$batch.'")</script>';
            // }
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Batch Payment</b></h3>
                                <form class="form-material m-t-20 row" method="post">
                                  
                                    <div class="form-group col-md-12 m-t-10">
                                      <label><b>Select Batch:</b></label>
                                        <select class="form-control" required name="batch">
                                          <option value="">Select Batch</option>
                                          <?php
                                              $bat=$st->getAllRecords('batch');
                                              if($bat)
                                              {
                                                  while ($getAll=$bat->fetch_assoc())
                                                  {
                                          ?>
                                          <option value="<?php echo $getAll['id'] ?>"><?php echo $getAll['batch_name']; ?></option>
                                        <?php }} ?>
                                        </select> 
                                    </div>                                    
                                    <!-- <div class="form-group col-md-12 m-t-10">
                                      <label><b>Select Fee:</b></label>
                                        <select class="form-control" name="Paymenttype">
                                          <option value="unpaid">Unpaid</option>
                                          <option value="paid">Paid</option>
                                        </select>
                                    </div> -->
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
