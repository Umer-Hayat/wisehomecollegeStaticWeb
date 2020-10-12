
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();



if(isset($_GET['daily']))
{
  $date = date("y-m-d");
  $query = "SELECT SUM(amount) AS amount_sum FROM fee WHERE date ='$date'";
  $report=$st->getAllRecordByQuery($query); 

  $query1 = "SELECT SUM(amount) AS expense_sum FROM expense WHERE date ='$date'";
  $expense=$st->getAllRecordByQuery($query1);                  
}
if(isset($_GET['month']))
{
  $d=strtotime("-1 Month");
  $from = date("y-m-d", $d);
  $to = date("y-m-d");
  $query = "SELECT SUM(amount) AS amount_sum FROM fee WHERE date BETWEEN '$from' AND '$to'";
  $report=$st->getAllRecordByQuery($query); 

  $query1 = "SELECT SUM(amount) AS expense_sum FROM expense WHERE date BETWEEN '$from' AND '$to'";
  $expense=$st->getAllRecordByQuery($query1); 
}
if(isset($_GET['year']))
{
  $d=strtotime("-1 year");
  $from = date("y-m-d", $d);
  $to = date("y-m-d");
  $query = "SELECT SUM(amount) AS amount_sum FROM fee WHERE date BETWEEN '$from' AND '$to'";
  $report=$st->getAllRecordByQuery($query); 

  $query1 = "SELECT SUM(amount) AS expense_sum FROM expense WHERE date BETWEEN '$from' AND '$to'";
  $expense=$st->getAllRecordByQuery($query1); 
}

?>
      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">

          <div class="row">
            <!-- column -->

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Fees Management</b></h4>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped " cellspacing="0" width="100%">
                      <thead>
                        <!-- <tr class="text-center">
                          <th><b><?php if (isset($_GET['daily'])) {
                              echo "Daily";
                            }elseif (isset($_GET['month'])) {
                              echo "Monthly";
                            }else{
                              echo "Yearly";
                            } ?> Report</b>
                          </th>
                        </tr> -->
                        <tr>
                          <th>Title</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            if($report)
                            {
                              $getAll=$report->fetch_assoc();
                              $getAllExpense=$expense->fetch_assoc();
                        ?>
                        <tr>
                          <td>Fee Recieved</td>
                          <td><?php
                          if ($getAll['amount_sum'] == "") {
                            $getAll['amount_sum'] = 0;
                          }
                           echo $getAll['amount_sum']; ?></td>
                        </tr>
                        <tr>
                          <td>Expense</td>
                          <td><?php 
                          if ($getAllExpense['expense_sum'] == "") {
                            $getAllExpense['expense_sum'] = 0;
                          }
                           echo $getAllExpense['expense_sum'];
                            ?></td>
                        </tr>
                        <tr><td>__________</td><td>_____</td></tr>
                        <tr>
                          <td>Balance</td>
                          <td><?php echo $getAll['amount_sum']-$getAllExpense['expense_sum']; ?></td>
                        </tr>
                        <?php } ?>
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
        ],
        "ordering": false
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
