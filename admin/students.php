
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

if(isset($_GET['ter']))
{
    $result=$st->terminateStudent($_GET['ter']);
    if($result){
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
                                            <div class="col-md-4 col-xs-6 m-t-10 b-r"> <strong>Date of Birth:*</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $getAll['dob']; ?></p>
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
            $dob = $_POST['dob'];
            $fee = $_POST['fee'];
            $course = $_POST['course'];
            $start_date = $_POST['strdate'];
            $contact = '0092'.$_POST['contact'];
            $address = $_POST['address'];
            $qualif = $_POST['qualif'];
            $id_pic = $_POST['id_pic'];

            $target_dir = "../cnic_pics/";
            $name1 = $_FILES['id_pic']['name'];
            $id_pic = $target_dir . basename($_FILES["id_pic"]["name"]);

            move_uploaded_file($_FILES['id_pic']['tmp_name'],$target_dir.$name1);


            $check = $st->register($name,$fname,$cnic,$batch_id,$exp_date,$dob,$fee,$course,$start_date,$contact,$address,$qualif,$id_pic);
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
                                <form class="form-material m-t-20 row" method="post"  enctype="multipart/form-data">
                                  <div class="row text-center" style="margin-right: -5px;">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Student Name:*</b></label>
                                        <input type="text" required name="name" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Father/Husband Name:*</b></label>
                                        <input type="text" required name="fname" class="form-control form-control-line" placeholder="Enter Name"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>CNIC Number:*</b></label>
                                        <input type="number" required name="cnic" class="form-control" placeholder="Enter Number">
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                        <label><b>CNIC Expire Date:</b></label>
                                        <input type="date" name="expdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Select Batch:*</b></label>
                                        <select class="form-control" required name="batch">
                                          <option value="">Select Batch</option>
                                          <?php
                                              $bat=$st->getBatchByStatus('1');
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
                                      <label><b>Date of Birth:*</b></label>
                                        <input type="date" required name="dob" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Contact No:*</b></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">0092</span>
                                            </div>
                                            <input type="number" required name="contact" class="form-control pl-2" placeholder="Enter Whatsapp Number" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Qualification:</b></label>
                                        <input type="text" name="qualif" class="form-control" placeholder="Enter Qualification">
                                    </div>
                                    
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Course Fee:*</b></label>
                                        <input type="number" required name="fee" class="form-control" placeholder="Enter Fee">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Course:*</b></label>
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
                                      <label><b>Course Start Date:*</b></label>
                                        <input type="date" required name="strdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 m-t-10">
                                      <label><b>Upload Cnic:</b></label>
                                        <input type="file" name="id_pic" class="form-control">
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

            $std=$st->getAllRecord($id,'students');
            $getAll=$std->fetch_assoc();

          if(isset($_POST['update'])){
            $name = $_POST['name'];
            $fname = $_POST['fname'];
            $cnic = $_POST['cnic'];
            $exp_date = $_POST['expdate'];
            $batch = $_POST['batch'];
            $dob = $_POST['dob'];
            $fee = $_POST['fee'];
            $course = $_POST['course'];
            $start_date = $_POST['strdate'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $qualif = $_POST['qualif'];
            
            $id_pic = $_POST['id_pic'];
            if($id_pic == ""){
              $id_pic = $getAll['id_pic'];
            }

            $check = $st->updatestudent($name,$fname,$cnic,$exp_date,$batch,$dob,$fee,$course,$start_date,$contact,$address,$qualif,$id_pic,$id);
            if ($check == "Data Updated") {
                echo '<script>window.location.replace("students.php")</script>';
            }
            }
            

            

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
                                        <input type="text" required name="name" class="form-control form-control-line" value="<?php echo $getAll['name']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>Student Father Name:</b></label>
                                        <input type="text" required name="fname" class="form-control form-control-line" value="<?php echo $getAll['fname']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC No:</b></label>
                                        <input type="number" required name="cnic" class="form-control" value="<?php echo $getAll['cnic']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>CNIC Expire Date:</b></label>
                                        <input type="date" required name="expdate" class="form-control" value="<?php echo date('Y-m-d',strtotime($getAll['exp_date'])) ?>">
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
                                              $bat=$st->getBatchByStatus('1');
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
                                      <label><b>Date of Birth:</b></label>
                                        <input name="dob" required class="form-control"  type="date" value="<?php echo date('Y-m-d',strtotime($getAll['dob'])) ?>" />
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Contact No:</b></label>
                                        <div class="input-group">
                                            <input type="number" required name="contact" class="form-control" value="<?php echo $getAll['contact']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Qualification:</b></label>
                                        <input type="text" name="qualif" class="form-control" value="<?php echo $getAll['qualif']; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label><b>Upload Cnic:</b></label>
                                        <input type="file" name="id_pic" class="form-control" value="<?php echo $getAll['id_pic']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label><b>Course Fee:</b></label>
                                        <input type="text" required name="fee" class="form-control" value="<?php echo $getAll['fee']; ?>">
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
                                        <input type="date" required name="strdate" class="form-control" value="<?php echo date('Y-m-d',strtotime($getAll['start_date'])) ?>">
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
                          
                          <th>Batch</th>
                           <th>CNIC</th> 
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Name</th>
                          <!-- <th>Father Name</th> -->
                          <th>Batch</th>
                          <th>CNIC</th> 
                          <th>Contact No</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                            $letter=$st->getAllStudentsByStatus('students','1');
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
                          <!-- <td><?php echo $getAll['fname']; ?></td> -->
                          <td style="width: 20px !important;"><?php 
                          $b_id = $getAll['batch_id'];
                          $batch=$st->getAllRecord($b_id,'batch');
                          $data=$batch->fetch_assoc();


                          echo $data['batch_name']; ?></td>
                          <td><?php echo $getAll['cnic']; ?></td>
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
                            <a style="font-size: 14px; margin-left: 5px;" 
                                onclick="return confirm('Are you sure to Terminate Student!')"
                                class="label label-table label-danger" 
                                data-toggle="tooltip"
                                data-original-title="Terminate Student"
                                href='students.php?ter=<?php echo $getAll['id']; ?>'
                                  >
                                  Terminate 
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
      
    
<!-- Footer -->
<?php include("includes/footer.php"); ?>