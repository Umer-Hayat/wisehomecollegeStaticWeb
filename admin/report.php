
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();

?>
      <div class="page-wrapper">
            <br />
            <br />
            <div class="container-fluid">

              <?php
              if(isset($_POST['batchNext'])){
                $batch = $_POST['batch'];
                $from = $_POST['from'];
                $to = $_POST['to'];
                echo '<script>window.location.replace("batchreport.php?batch='.$batch.'&from='.$from.'&to='.$to.'")</script>';
              }

              if(isset($_POST['expenseNext'])){
                $from = $_POST['fromex'];
                $to = $_POST['toex'];
                echo '<script>window.location.replace("expensereport.php?from='.$from.'&to='.$to.'")</script>';
              }
              ?>
                <div class="row">
                <!-- column -->
                <div class="col-md-4">
                  <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center"><b>Batch Fee Report</b></h3>
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
                                        <div class="form-group col-md-12">
                                          <label><b>From:</b></label>
                                            <input type="date" name="from" class="form-control form-control-line"> 
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label><b>To:</b></label>
                                            <input type="date" name="to" class="form-control form-control-line"> 
                                        </div>
                                        <div class="col-md-12 m-t-10 text-center">
                                            <input type="submit" name="batchNext" value="Next" class="btn btn-primary" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center"><b>Expense Report</b></h3>
                                    <form class="form-material m-t-20 row" method="post">
                                        <div class="form-group col-md-12">
                                          <label><b>From:</b></label>
                                            <input type="date" name="fromex" class="form-control form-control-line"> 
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label><b>To:</b></label>
                                            <input type="date" name="toex" class="form-control form-control-line"> 
                                        </div>
                                        <div class="col-md-12 m-t-10 text-center">
                                            <input type="submit" name="expenseNext" value="Next" class="btn btn-primary" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>
              </div>
            </div>
      </div>
    
<!-- Footer -->
<?php include("includes/footer.php"); ?>