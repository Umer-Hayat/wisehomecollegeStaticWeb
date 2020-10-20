<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
if(isset($_GET['del']))
{
    $result=$st->deleteBatch($_GET['del']);
    if($result){
      // echo " <script>alert('Student Deleted Successfully');</script>";
      echo '<script>window.location.replace("batch.php")</script>';
    }
}

if(isset($_GET['end']))
{
    $result=$st->endBatch($_GET['end']);
    if($result){
      // echo " <script>alert('Student Deleted Successfully');</script>";
      echo '<script>window.location.replace("batch.php")</script>';
    }
}
?>
      <div class="page-wrapper">
        <br />
        <br />
        <div class="container-fluid">

          <?php
          if (isset($_GET['add'])) {

          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $strdate = $_POST['strdate'];
            $check = $st->addBatch($name,$strdate);
            if ($check == "Data Inserted") {
                echo '<script>window.location.replace("batch.php")</script>';
            }
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Add New Batch</b></h3>
                                <form class="form-material m-t-20 row" method="post">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-6 m-t-10">
                                      <label><b>Batch Name:</b></label>
                                        <input type="text" name="name" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>                                    
                                    <div class="form-group col-md-6 m-t-10">
                                      <label><b>Batch Start Date:</b></label>
                                        <input type="date" name="strdate" class="form-control">
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

            if(isset($_POST['update'])){
              $name = $_POST['name'];
              $strdate = $_POST['strdate'];
              $check = $st->updatebatch($name,$strdate,$id);
              if ($check == "Data Updated") {
                  echo '<script>window.location.replace("batch.php")</script>';
              }
            }
            

            $std=$st->getAllRecord($id,'batch');
            $getAll=$std->fetch_assoc();

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
                                    <div class="form-group col-md-6">
                                      <label><b>Batch Name:</b></label>
                                        <input type="text" name="name" class="form-control form-control-line" value="<?php echo $getAll['batch_name']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label><b>Batch Start Date:</b></label>
                                        <input type="text" name="strdate" class="form-control" value="<?php echo $getAll['batch_start']; ?>">
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
                  <h3 class="card-title"><b>Batches</b></h3>
                  <?php
                  if (!isset($_GET['add'])) { ?>
                  <a href="batch.php?add" class="btn btn-primary">Add New Batch</a>
                    <br>
                  <?php } ?>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Batch Starting Date</th>
                          <th>Batch End Date</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            $letter=$st->getAllRecords('batch');
                            if($letter)
                            {
                              $i=1;
                                while ($getAll=$letter->fetch_assoc())
                                {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td><?php echo $getAll['batch_name']; ?></td>
                          <td><?php echo $getAll['batch_start']; ?></td>
                          <td><?php if (isset($getAll['batch_end'])) {
                            echo $getAll['batch_end'];
                          }else{
                            echo "--";
                          }  ?></td>
                          <td class="text-nowrap">
                            <a
                              href="batch.php?edit=<?php echo $getAll['id']; ?>"
                              data-original-title="Edit"
                              data-toggle="tooltip"
                              data-target="#editOrder"
                            >
                              <i class="fa fa-pencil text-inverse m-r-10"></i>
                            </a>
                            <a
                              onclick="return confirm('Are you sure to delete!')" href="batch.php?del=<?php echo $getAll['id'];?>"
                              data-toggle="tooltip"
                              data-original-title="Delete Batch"
                            >
                              <i class="fa fa-close text-danger"></i>
                            </a>
                            <?php if (!isset($getAll['batch_end'])) { ?>
                          
                            <a style="font-size: 14px; margin-left: 5px;" 
                                onclick="return confirm('Are you sure to End Batch!')"
                                class="label label-table label-danger" 
                                data-toggle="tooltip"
                                data-original-title="End Batch"
                                href='batch.php?end=<?php echo $getAll['id']; ?>'
                                  >
                                  End Batch 
                                </a>
                                <?php }  ?>
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
