<?php include("classes/sessionstart.php"); ?>

<!-- <?php session_start(); ?> -->
<?php
if (!isset($_SESSION['login'])) {
  header("Location:index.php");
}

  include_once 'classes/StudentManagement.php';
$st=new StudentManagement();


$query = "SELECT * FROM visiterCounter ORDER BY id desc";
$res=$st->getAllRecordByQuery($query);
if($res){
    $getAll=$res->fetch_assoc();
    $count = $getAll['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->

    <title>
      Wise Home College
    </title>
    <!-- Bootstrap Core CSS -->
    <link
      href="assets/plugins/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/blue.css" id="theme" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="fix-header card-no-border">
      <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle
            class="path"
            cx="50"
            cy="50"
            r="20"
            fill="none"
            stroke-width="2"
            stroke-miterlimit="10"
          />
        </svg>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
          <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">
                <!-- Logo icon --><b style="font-size: 18px;">
                  Admin
                </b>
              </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
              <!-- ============================================================== -->
              <!-- toggle and nav items -->
              <!-- ============================================================== -->
              <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                
                <li class="nav-item">
                  <a
                    class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                    href="javascript:void(0)"
                    ><i class="fa fa-bars"></i
                  ></a>
                </li>
                
                <li class="nav-item m-l-10">
                  <a
                    class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                    href="javascript:void(0)"
                    ><i class="fa fa-bars"></i
                  ></a>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
              </ul>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item" style="line-height: 60px; color: white; margin-right: 20px">
                 <b>Totall Visitor: <?php echo $count; ?></b>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                    href=""
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><img
                      src="assets/images/users/1.jpg"
                      alt="user"
                      class="profile-pic"
                  /></a>
                  <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                      <li><a href="changepass.php"><i class="fa fa-user fa-fw"></i>Change Password</a>
                      <li role="separator" class="divider"></li>
                      <li>
                        <a href="?action=logout"><i class="fa fa-power-off"></i> Logout</a>
                      </li>
                            <?php
                            if (isset($_GET['action']) && $_GET['action']=="logout") {
                                session_destroy();
                                echo "<script>window.open('index.php','_self')</script>";


                            }
                            ?>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
          <!-- Sidebar scroll-->
          <div class="scroll-sidebar">
            <nav class="sidebar-nav">
              <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="dashboard.php"
                    aria-expanded="false"
                    ><i class="fa fa-dashboard"></i
                    ><span class="hide-menu">Dashboard</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="batch.php"
                    aria-expanded="false"
                    ><i class="fa fa-tasks"></i
                    ><span class="hide-menu">Manage Batch</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="students.php"
                    aria-expanded="false"
                    ><i class="fa fa-users"></i
                    ><span class="hide-menu">Students</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="completed.php"
                    aria-expanded="false"
                    ><i class="fa fa-flag-checkered"></i
                    ><span class="hide-menu">Course Completed</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="selectfee.php"
                    aria-expanded="false"
                    ><i class="fa fa-money"></i
                    ><span class="hide-menu">Fees Management</span></a
                  >
                </li>
                
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="expense.php"
                    aria-expanded="false"
                    ><i class="fa fa-money"></i
                    ><span class="hide-menu">Daily Expense</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="booking.php"
                    aria-expanded="false"
                    ><i class="fa fa-ticket"></i
                    ><span class="hide-menu">Test Booking</span></a
                  >
                </li>
                <?php if ($_SESSION['login']=='admin') { ?>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="report.php"
                    aria-expanded="false"
                    ><i class="fa fa-bar-chart"></i
                    ><span class="hide-menu">Reports</span></a
                  >
                </li>
                <li>
                  <a
                    style="background-color: transparent;"
                    class="waves-effect waves-dark"
                    href="homepagedata.php"
                    aria-expanded="false"
                    ><i class="fa fa-database"></i
                    ><span class="hide-menu">Home Page Data</span></a
                  >
                </li>
              <?php } ?>
              </ul>
            </nav>
            <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
        </aside>
