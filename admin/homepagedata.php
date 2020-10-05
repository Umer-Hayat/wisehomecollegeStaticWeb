
<?php include("includes/header.php"); ?>

<?php 
include_once 'classes/StudentManagement.php';
  $st=new StudentManagement();

  if(isset($_GET['del']))
{
    $result=$st->deleteSlide($_GET['del']);
    if($result){
      echo '<script>window.location.replace("homepagedata.php")</script>';
    }
}

  if (isset($_POST['upload'])) {
    
    $target_dir = "../slides_images/";
    $name1 = $_FILES['image']['name'];
    $image = $target_dir . basename($_FILES["image"]["name"]);

    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name1);

    $check = $st->uploadSlideImage($image);
  }



  if(isset($_POST['submit'])){
    $dir_msg = $_POST['dir_msg'];
    $vision = $_POST['vision'];
    $goals = $_POST['goals'];
    $mission = $_POST['mission'];
    $achieve = $_POST['achieve'];
    $about = $_POST['about'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];

    $check = $st->updatehomedata($dir_msg,$vision,$goals,$mission,$achieve,$about,$phone1,$phone2,$email);
    }

    $msg=$st->getAllRecords('homepagedata');
    $getAll=$msg->fetch_assoc();
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
                                <h3 class="card-title text-center"><b>Home Page Detail</b></h3>
                               
                                <form class="form-material m-t-40 row" method="post">
                                  <div class="row text-center">
                                       <div style="color:red; margin-left: 20px; font-size:16px;"><?php
                                           if (isset($_POST['submit'])) {
                                               echo "$check";
                                           }
                                           ?>
                                    </div>
                                   </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>Director Message:</b></label>
                                        <textarea class="form-control" name="dir_msg" rows="3"><?php echo $getAll['dir_msg']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>Vision:</b></label>
                                        <textarea class="form-control" name="vision" rows="3"><?php echo $getAll['vision']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>Goals:</b></label>
                                        <textarea class="form-control" name="goals" rows="3"><?php echo $getAll['goals']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>Mission:</b></label>
                                        <textarea class="form-control" name="mission" rows="3"><?php echo $getAll['mission']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>Achieve:</b></label>
                                        <textarea class="form-control" name="achieve" rows="3"><?php echo $getAll['achieve']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-6 m-t-20">
                                      <label><b>About:</b></label>
                                        <textarea class="form-control" name="about" rows="3"><?php echo $getAll['about']; ?></textarea> 
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                      <label><b>Phone No 1:</b></label>
                                        <input type="text" name="phone1" class="form-control form-control-line" value="<?php echo $getAll['phone1']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                      <label><b>Phone no 2:</b></label>
                                        <input type="text" name="phone2" class="form-control" value="<?php echo $getAll['phone2']; ?>">
                                    </div>
                                    <div class="form-group col-md-4 m-t-20">
                                      <label><b>Email:</b></label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $getAll['email']; ?>">
                                    </div>
                                    <div class="col-md-12 m-t-10 text-center">
                                        <input type="submit" value="Update" name="submit" class="btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
          </div>

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
                            $letter=$st->getAllRecords('slider');
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
                              onclick="return confirm('Are you sure to delete!')" href="homepagedata.php?del=<?php echo $getAll['id'];?>"
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
        <!-- <footer class="footer">
          © 2020 Alrights Reserved
        </footer> -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
<?php include("includes/footer.php"); ?>