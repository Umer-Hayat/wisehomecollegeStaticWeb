
<?php include("includes/header.php"); ?>

<?php include_once 'classes/SlideManagement.php';
$sl=new SlideManagement();
if(isset($_GET['del']))
{
    $result=$sl->deleteSlide($_GET['del']);
    if($result)
       echo " <script>alert('Image Deleted Successfully');</script>";
    echo '<script>window.location.replace("slides.php")</script>';
}

if (isset($_POST['upload'])) {
  // $image = $_FILES['image']['name'];

  // $temp_image = $_FILES['image']['tmp_name'];
  // move_uploaded_file($temp_image,"../slides_images/$image");


  $target_dir = "../slides_images/";
  $name1 = $_FILES['image']['name'];
  $image = $target_dir . basename($_FILES["image"]["name"]);

  move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name1);

  $check = $sl->uploadSlideImage($image);
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
                  <h4 class="card-title">Slides Image</h4>

                    <form method="post" enctype="multipart/form-data">
                      <div class="row text-center">
                         <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                             if (isset($_POST['upload'])) {
                                 echo "$check";
                             }
                             ?>
                      </div>
                     </div>
                      <input type="file" name="image" > 
                      <input type="submit" name="upload" value="Upload" class="btn btn-primary"> 
                    </form>
                    <br>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Slide Image</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            $letter=$sl->getAllRecords('slider');
                            if($letter)
                            {
                                while ($getAll=$letter->fetch_assoc())
                                {
                        ?>
                        <tr>
                          <td>
                              <img height="100" width="150" src="../slides_images/<?php echo $getAll['slide_image'] ?>">
                            
                          </td>
                          <td class="text-nowrap">
                            
                            <a
                              onclick="return confirm('Are you sure to delete!')" href="slides.php?del=<?php echo $getAll['id'];?>"
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
            
        ]
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
