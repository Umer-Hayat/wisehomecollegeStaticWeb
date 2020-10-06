
<?php include("includes/header.php"); ?>

<?php include_once 'classes/StudentManagement.php';
$st=new StudentManagement();
$from = $_GET['from'];
$to = $_GET['to'];

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
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No#</th>
                          <th>Title</th>
                          <th>Amount</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No#</th>
                          <th>Title</th>
                          <th>Amount</th>
                          <th>Date</th>
                        </tr>
                      </tfoot>
                      <tbody>
                         <?php
                         $query = "SELECT * FROM expense WHERE date BETWEEN '$from' AND '$to'";
                                $expen=$st->getAllRecordByQuery($query);
                            
                            if($expen)
                            {
                              $i=1;
                              while ($getAll=$expen->fetch_assoc())
                              {
                        ?>
                        <tr>
                          <td style="text-align: center;"><?php echo $i; $i++?></td>
                          <td><?php echo $getAll['title']; ?></td>
                          <td><?php echo $getAll['amount']; ?></td>
                          <td><?php echo $getAll['date']; ?></td>
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