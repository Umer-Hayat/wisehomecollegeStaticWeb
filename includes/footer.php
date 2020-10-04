<?php 
include_once './admin/classes/StudentManagement.php';
$slide=new StudentManagement();

  $query = "select * from homepagedata";
  $data=$slide->getAllRecordByQuery($query);
  $getdata=$data->fetch_assoc();
?>


   <section class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h6 class="pl-0">About Wise Home College</h6>
            <p><?php echo $getdata['about']; ?> 
            </p>
          </div>
          <div class="col-md-3">
            <h6>Quik Links</h6>
            <ul class="value">
              <li>
                <a href="index.php">Home</a>
              </li>
              <!-- <li>
                <a href="#">Time Table</a>
              </li> -->
                <li><a href="contact-us.php">Contact Us</a></li>
                <li>
                  <a href="about-us.php">About Us</a>
                </li>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="fb-page" data-href="https://www.facebook.com/wisehomecollege/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
          </div>
          <div class="col-md-3">
            <h6>Contact Us</h6>
            <ul class="value">
              <li><a
                    href="https://maps.google.com/?q=Wise home college of modern languages"
                    target="blank"
                  > <i class="fa fa-map-marker" aria-hidden="true"></i>
                1st Floor Shoukat Plaza
                G.T Road Kharian</a>
              </li>
              <li>
                
                <a href="tel: <?php echo $getdata['phone1']; ?>">
                  <i class="fa fa-mobile"></i></a> | 
                  <a href="https://api.whatsapp.com/send?phone=<?php echo $getdata['phone2']; ?>"><i class="fa fa-whatsapp"></i></a>
                  <?php echo $getdata['phone1']; ?>
              </li>
              <li>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <a href="mailto:<?php echo $getdata['email']; ?>"><?php echo $getdata['email']; ?></a>
              </li>
              <li>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <a href="#">Monday - Saturday 8.00 - 16.00
                    Friday 8.00 - 12.30</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <footer class="container">
      <div class="row text-center">
        <div class="col-md-6">Copyright © 2020 Wise Home College.</div>
        <div class="col-md-6">Design And Developed by <a target="blank" href="https://umer-hayat.github.io/portfolio/">Umer Hayat</a></div>
      </div>
        
    </footer>


    

    <!-- Library Area -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1874481306158961&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>