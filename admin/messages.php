
<?php include("includes/header.php"); ?>
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <br />
        <br />
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Students</h4>
                  <hr />
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Serial. No.</th>
                          <th>Namet</th>
                          <th>Father Name</th>
                          <th>CNIC</th>
                          <th>CNIC Expire.</th>
                          <th>Contact No</th>
                          <th>Address</th>
                          <th>Qualification</th>
                          <th>From</th>
                          <th>Status</th>
                          <th class="text-nowrap">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>$10.00</td>
                          <td>1</td>
                          <td>1</td>
                          <td>$10.00</td>
                          <td>1</td>
                          <td>1</td>
                          <td>$10.00</td>
                          <td>1</td>
                          <td>
                            <div class="label label-table label-success">
                              Completed
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <a
                              href="#"
                              data-original-title="Edit"
                              data-toggle="modal"
                              data-target="#editOrder"
                            >
                              <i class="fa fa-pencil text-inverse m-r-10"></i>
                            </a>
                            <a
                              href="#"
                              data-toggle="tooltip"
                              data-original-title="Close"
                            >
                              <i class="fa fa-close text-danger"></i>
                            </a>
                          </td>
                        </tr>
                        <!-- Edit Order Starts -->
                        <div class="modal" id="editOrder">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title ml-auto">Edit Order</h4>
                                <button
                                  type="button"
                                  class="close"
                                  data-dismiss="modal"
                                >
                                  &times;
                                </button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <form action="dashboard.html">
                                  <div class="form-group">
                                    <input type="date" class="form-control" />
                                  </div>
                                  <div class="form-group">
                                    <input
                                      type="number"
                                      placeholder="Amount"
                                      class="form-control"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <input
                                      type="number"
                                      placeholder="Quantity"
                                      class="form-control"
                                    />
                                  </div>
                                  <div class="form-group">
                                    <select class="form-control" name="" id="">
                                      <option value=""
                                        >Change Order Status</option
                                      >
                                      <option value="">Completed</option>
                                      <option value="">Processing</option>
                                    </select>
                                  </div>
                                  <div class="form-group offset-md-4">
                                    <input
                                      type="submit"
                                      class="btn btn-success mx-auto"
                                      value="Update Order"
                                    />
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
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

    