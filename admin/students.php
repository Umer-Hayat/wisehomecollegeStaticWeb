
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
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
          if (isset($_GET['view'])) {
            $stud_id = $_GET['view'];

          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                    <h3 class="card-title text-center"><b>Student Detail</b></h3>
                                    <div class="row">

                                      <?php
                                          $letter=$st->getAllRecord($stud_id,'students');
                                          $getAll=$letter->fetch_assoc();
                                      ?>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['name']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Father Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['fname']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Mobile No</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['contact']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>CNIC</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['cnic']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>CNIC Expire</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['exp_date']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['email']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Course</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['course']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Starting Date</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['start_date']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Address</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['address']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Qualification</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['qualif']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>From</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['q_from']; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Course Fee</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['fee']; ?></p>
                                            </div>

                                            
                                        </div>
                            </div>
                        </div>
            </div>
          </div>
          <?php }
           ?>


          <?php
          if (isset($_GET['add'])) {

          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $cnic = $_POST['cnic'];
            $batch_id = $_POST['batch'];
            $exp_date = $_POST['expdate'];
            $email = $_POST['email'];
            $fee = $_POST['fee'];
            $course = $_POST['course'];
            $start_date = $_POST['strdate'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $qualif = $_POST['qualif'];
            $q_from = $_POST['from'];
            $check = $st->register($name,$fname,$cnic,$batch_id,$exp_date,$email,$fee,$course,$start_date,$contact,$address,$qualif,$q_from);
            if ($check == "Data Inserted") {
                echo '<script>window.location.replace("students.php")</script>';
            }
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Add New Student</b></h3>
                                <form class="form-material m-t-20 row" method="post">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Student Name:</b></label>
                                        <input type="text" required name="name" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Father Name:</b></label>
                                        <input type="text" required name="fname" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>CNIC Number:</b></label>
                                        <input type="number" required name="cnic" class="form-control" placeholder="Enter Number">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                        <label><b>CNIC Expire Date:</b></label>
                                        <input type="date" required name="expdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
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
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Email:</b></label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Student Email">
                                    </div>
                                    
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Contact No:</b></label>
                                        <input type="number" required name="contact" class="form-control" placeholder="Enter Whatsapp Number">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Qualification:</b></label>
                                        <input type="text" name="qualif" class="form-control" placeholder="Enter Qualification">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>From:</b></label>
                                        <input type="text" name="from" class="form-control" placeholder="From">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Course Fee:</b></label>
                                        <input type="number" required name="fee" class="form-control" placeholder="Enter Fee">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Course:</b></label>
                                        <select name="course" required class="form-control">
                                          <option value="">Select course</option>
                                          <option value="IELTS">IELTS</option>
                                          <option value="german">German</option>
                                          <option value="spanish">Spanish</option>
                                          <option value="norweigen">Norweigen</option>
                                          <option value="italian">Italian</option>
                                          <option value="danish">Danish</option>
                                          <option value="swedish">Swedish</option>
                                          <option value="spoken">Spoken English</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Course Start Date:</b></label>
                                        <input type="date" required name="strdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Address:</b></label>
                                        <textarea class="form-control" name="address" rows="2"></textarea>
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
            $fname = $_POST['fname'];
            $cnic = $_POST['cnic'];
            $exp_date = $_POST['expdate'];
            $batch = $_POST['batch'];
            $email = $_POST['email'];
            $fee = $_POST['fee'];
            $course = $_POST['course'];
            $start_date = $_POST['strdate'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $qualif = $_POST['qualif'];
            $q_from = $_POST['from'];
            $check = $st->updatestudent($name,$fname,$cnic,$exp_date,$batch,$email,$fee,$course,$start_date,$contact,$address,$qualif,$q_from,$id);
            if ($check == "Data Updated") {
                echo '<script>window.location.replace("students.php")</script>';
            }
            }
            

            $std=$st->getAllRecord($id,'students');
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
                                    <div class="form-group col-md-3">
                                      <label><b>Student Name:</b></label>
                                        <input type="text" name="name" class="form-control form-control-line" value="<?php echo $getAll['name']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>Student Father Name:</b></label>
                                        <input type="text" name="fname" class="form-control form-control-line" value="<?php echo $getAll['fname']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC No:</b></label>
                                        <input type="number" name="cnic" class="form-control" value="<?php echo $getAll['cnic']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC Expire Date:</b></label>
                                        <input type="text" name="expdate" class="form-control" value="<?php echo $getAll['exp_date']; ?>">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Select Batch:</b></label>
                                        <select class="form-control" required name="batch">
                                          <option value="<?php echo $getAll['batch_id']; ?>"><?php
                                          $ba_id = $getAll['batch_id'];
                                          $letter=$st->getAllRecord($ba_id,'batch');
                                          $data=$letter->fetch_assoc();

                                           echo $data['batch_name']; ?></option>
                                          <?php
                                              $bat=$st->getAllRecords('batch');
                                              if($bat)
                                              {
                                                  while ($data1=$bat->fetch_assoc())
                                                  {
                                                    if($data1['id'] != $ba_id){
                                          ?>
                                          <option value="<?php echo $data1['id'] ?>"><?php echo $data1['batch_name']; ?></option>
                                        <?php }}} ?>
                                        </select> 
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Email:</b></label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $getAll['email']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Contact No:</b></label>
                                        <input type="number" name="contact" class="form-control" value="<?php echo $getAll['contact']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Qualification:</b></label>
                                        <input type="text" name="qualif" class="form-control" value="<?php echo $getAll['qualif']; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label><b>From:</b></label>
                                        <input type="text" name="from" class="form-control" value="<?php echo $getAll['q_from']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Course Fee:</b></label>
                                        <input type="text" name="fee" class="form-control" value="<?php echo $getAll['fee']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Course:</b></label>
                                        <select name="course" required class="form-control">
                                          <option value="<?php echo $getAll['course']; ?>"><?php echo $getAll['course']; ?></option>
                                          <option value="IELTS">IELTS</option>
                                          <option value="german">German</option>
                                          <option value="spanish">Spanish</option>
                                          <option value="norweigen">Norweigen</option>
                                          <option value="italian">Italian</option>
                                          <option value="danish">Danish</option>
                                          <option value="swedish">Swedish</option>
                                          <option value="spoken">Spoken English</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Course Start Date:</b></label>
                                        <input type="text" name="strdate" class="form-control" value="<?php echo $getAll['start_date']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><b>Address</b></label>
                                        <textarea class="form-control" name="address" rows="2"><?php echo $getAll['address']; ?></textarea>
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
                  <h3 class="card-title"><b>Students</b></h3>
                  <?php
                  if (!isset($_GET['add'])) { ?>
                  <a href="students.php?add" class="btn btn-primary">Add New Student</a>
                    <br>
                  <?php } ?>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>

                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Email</th>
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <th>Father Name</th>
                          <th>Email</th>
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                            $letter=$st->getAllRecords('students');
                            if($letter)
                            {
                              $i=1;
                                while ($getAll=$letter->fetch_assoc())
                                {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td>
                            <a                              
                              href="students.php?view=<?php echo $getAll['id']; ?>">
                              <?php echo $getAll['name']; ?>
                            </a>
                          </td>
                          <td><?php echo $getAll['fname']; ?></td>
                          <td><?php echo $getAll['email']; ?></td>
                          <td>
                            <a target="blank"
                                    href="https://api.whatsapp.com/send?phone=<?php echo $getAll['contact']; ?>"><?php echo $getAll['contact']; ?>
                                  </a>
                          </td>
                          <td class="text-nowrap">
                            <a
                              href="students.php?edit=<?php echo $getAll['id']; ?>"
                              data-original-title="Edit"
                              data-toggle="tooltip"
                              data-target="#editOrder"
                            >
                              <i class="fa fa-pencil text-inverse m-r-10"></i>
                            </a>
                            <a
                              onclick="return confirm('Are you sure to delete!')" href="students.php?del=<?php echo $getAll['id'];?>"
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
