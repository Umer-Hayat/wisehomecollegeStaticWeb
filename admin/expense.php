
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
if(isset($_GET['del']))
{
    $result=$st->deleteExpense($_GET['del']);
    if($result){
      // echo " <script>alert('Student Deleted Successfully');</script>";
      echo '<script>window.location.replace("expense.php")</script>';
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
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $check = $st->addExpense($title,$amount);
            if ($check == "Data Inserted") {
                echo '<script>window.location.replace("expense.php")</script>';
            }
          }
          ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Add New Expense</b></h3>
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
                                      <label><b>Expense Title:</b></label>
                                        <input type="text" required name="title" class="form-control form-control-line" placeholder="Enter Title"> 
                                    </div>
                                    <div class="form-group col-md-3 m-t-10">
                                      <label><b>Expense Amount:</b></label>
                                        <input type="number" required name="amount" class="form-control form-control-line" placeholder="Enter Amount"> 
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
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $check = $st->updateExpense($title,$amount,$id);
            if ($check == "Data Updated") {
                echo '<script>window.location.replace("expense.php")</script>';
            }
            }
            

            $std=$st->getAllRecord($id,'expense');
            $getAll=$std->fetch_assoc();

           ?>
            <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center"><b>Update Expense Record</b></h3>
                               
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
                                      <label><b>Expense Title:</b></label>
                                        <input type="text" name="title" class="form-control form-control-line" value="<?php echo $getAll['title']; ?>"> 
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label><b>Student Father Name:</b></label>
                                        <input type="text" name="amount" class="form-control form-control-line" value="<?php echo $getAll['amount']; ?>"> 
                                    </div>
                                    <div class="col-md-12 text-center">
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
                  <h3 class="card-title"><b>Daily Expenses</b></h3>
                  <?php
                  if (!isset($_GET['add'])) { ?>
                  <a href="expense.php?add" class="btn btn-primary">Add Expense</a>
                    <br>
                  <?php } ?>
                  <hr />
                  <div class="table-responsive m-t-10">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>

                        <tr>
                          <th>No#</th>
                          <th>Title</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            $letter=$st->getAllRecords('expense');
                            if($letter)
                            {
                              $i=1;
                                while ($getAll=$letter->fetch_assoc())
                                {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <!-- <td>
                            <a                              
                              href="expense.php?view=<?php echo $getAll['id']; ?>">
                              <?php echo $getAll['name']; ?>
                            </a>
                          </td> -->
                          <td><?php echo $getAll['title']; ?></td>
                          <td><?php echo $getAll['amount']; ?></td>
                          <td><?php echo $getAll['date']; ?></td>
                          <td class="text-nowrap">
                            <a
                              href="expense.php?edit=<?php echo $getAll['id']; ?>"
                              data-original-title="Edit"
                              data-toggle="tooltip"
                              data-target="#editOrder"
                            >
                              <i class="fa fa-pencil text-inverse m-r-10"></i>
                            </a>
                            <a
                              onclick="return confirm('Are you sure to delete!')" href="expense.php?del=<?php echo $getAll['id'];?>"
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
<?php include("includes/footer.php"); ?>