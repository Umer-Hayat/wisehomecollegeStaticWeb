<?php include("includes/header.php"); ?>
<?php 
include_once 'admin/classes/StudentManagement.php';
  $st=new StudentManagement();

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $exp_date = $_POST['expdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $qualif = $_POST['qualif'];
    $q_from = $_POST['from'];

    $check = $st->register($name,$fname,$cnic,$exp_date,$email,$password,$contact,$address,$qualif,$q_from);

if($check== 'Data Inserted'){
    $body = '
<table>
  <tr>
    <td class="label"><b>Name:</b></td>
    <td>'. $name .'</td>
  </tr>
  <tr>
    <td class="label"><b>Father Name:</b></td>
    <td>' . $fname . '</td>
  </tr>
  <tr>
    <td class="label"><b>CNIC no:</b></td>
    <td>' . $cnic . '</td>
  </tr>
  <tr>
    <td class="label"><b>Email:</b></td>
    <td>' . $email . '</td>
  </tr>
  <tr>
    <td class="label"><b>Phone No:</b></td>
    <td><a href=tel:'. $contact .'>' . $contact . '</a></td>
  </tr>
  <tr>
    <td class="label"><b>Address:</b></td>
    <td>' . $address . '</td>
  </tr>
</table>';



    // PHP Mailer

    require 'PHPMailerAutoload.php';
    require 'credential.php';

    $mail = new PHPMailer;

    // $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL, 'Wise Home Portal');
    $mail->addAddress('umerhayat520@gmail.com');
    $mail->addReplyTo(EMAIL);

    // $mail->addAttachment('/var/tmp/file.tar.gz'); 
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'New Student Register';
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        // echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        // echo 'Message has been sent';
    }
    }}
?>
<br>
    <section class="bg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Register</h3>
          </div>
        </div>
      </div>
    </section>
    <br>

    <section class="register">
        <div class="container">
            <div class="row fill-row">
                <div  class="col-md-12 text-center">
                  <h3 class="underline-green">Fill The Form</h3>
                </div>
              </div>
            <form method="post" action="register.php">
              <div class="row text-center">
                   <div style="color:red; font-size:16px;"><?php
                       if (isset($_POST['submit'])) {
                           echo "$check";
                       }
                       ?>
                </div>
               </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname" class="col-form-label">Father Name:</label>
                            <input type="text" class="form-control" name="fname" id="fname">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cnic" class="col-form-label">CNIC NO:</label>
                            <input type="number" class="form-control" name="cnic" id="cnic">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exp" class="col-form-label">CNIC Expire Date:</label>
                            <input type="date" class="form-control" name="expdate" id="exp">
                          </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="email" class="col-form-label">Email:</label>
                          <input type="email" class="form-control" name="email" id="email">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="password" class="col-form-label">Password:</label>
                          <input type="password" class="form-control" name="password" id="password">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="cont" class="col-form-label">Contact No:</label>
                          <input type="number" class="form-control" name="contact" id="cont">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="address" class="col-form-label">Address:</label>
                          <input type="text" class="form-control" name="address" id="address">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="qualif" class="col-form-label">Qualification:</label>
                          <input type="text" class="form-control" name="qualif" id="qualif">
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="from" class="col-form-label">From:</label>
                          <input type="text" name="from" class="form-control" id="from">
                        </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <div class="form-group">
                        <input type="submit" name="submit"  class="btn btn-primary" style="background-color: #074582; border-radius:10px; margin:20px 0;">
                      </div>
                </div>
              </div>
            </form>
        </div>
    </section>
<br>
 
    <!-- footer -->

 <?php include("includes/footer.php"); ?>
