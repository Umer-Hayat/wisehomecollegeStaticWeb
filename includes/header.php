<?php 
include_once './admin/classes/StudentManagement.php';
$slide=new StudentManagement();

  $query = "select * from homepagedata";
  $data=$slide->getAllRecordByQuery($query);
  $getdata=$data->fetch_assoc();


 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="dist/css/cards-gallery.css">
    <link rel="stylesheet" href="dist/css/style.css" />
    <link rel="icon" href="img/logo111.jpg" type="image/gif" sizes="16x16">
    <meta name="description" content="Wise Home College - Wise Home College is a educational network that is a welfare organization and aims to promote learning. ">
    <meta name="keywords" content="Wise Home College, kharian, kharian campus">
      <title>Wise Home College Kharian</title>
  </head>
  <body>
    <!-- Header Area -->
    <header>
      <div class="top-header">
        <div class="container">
          <!-- Start Top Menu -->
          <div class="row">
            <div class="col-md-8">
              <small>
                <!-- <span class="hide">Admissions Open</span> -->
                <span
                  ><a href="tel: <?php echo $getdata['phone1']; ?>"><i class="fa fa-phone"></i> <?php echo $getdata['phone1']; ?></a>
                  |<a href="https://api.whatsapp.com/send?phone=<?php echo $getdata['phone2']; ?>"><i class="fa fa-whatsapp"></i> <?php echo $getdata['phone2']; ?></a>
                  </span>
                <span class="hide"
                  ><a href="mailto:<?php echo $getdata['email']; ?>"><i class="fa fa-envelope"></i><?php echo $getdata['email']; ?></a></span
                >
              </small>
            </div>
            <div class="col-md-4 text-lg-right hide">
              <a target="blank" href="https://www.facebook.com/wisehomecollege/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
          </div>
          <!-- End Top Menu -->
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <a href="#"><img src="img/logo111.jpg" class="img-fluid logo" alt="" /></a> 
          </div>
          <div class="col-md-9">
            <!-- Start NavBar -->
            <nav class="navbar navbar-expand-lg navbar-light">
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="navbarDropdownMenuLink"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      About Us
                    </a>
                    <div
                      class="dropdown-menu"
                      aria-labelledby="navbarDropdownMenuLink"
                    >
                      <a class="dropdown-item" href="about-us.php">About Us</a>
                      <a class="dropdown-item" href="director-message.php">Director Message</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#certificate">Certificates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#feedback">Feedbacks</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#elegantModalForm">Login</a>
                  </li> -->
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>

   <!--  <button type="button" class="btn btn-primary" >
    Open modal
  </button>
 -->
  <!-- The Modal -->
 <!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="Form-email1">Your Email</label>
          <input type="email" id="Form-email1" class="form-control validate">
          
        </div>

        <div class="md-form pb-3">
          <label data-error="wrong" data-success="right" for="Form-pass1">Your Password</label>
          <input type="password" id="Form-pass1" class="form-control validate">
          
        </div>

        <div class="text-center mb-3">
          <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="register.php" class="blue-text ml-1">
            Sign Up</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->
