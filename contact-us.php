<?php
$title = 'Contact Us - Luna Creativity';
$headTitle = 'Contact To Luna Creativity';
include 'header.php';

if(isset( $_POST['SendMsg']))
{

//take user input
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//send data to my database
// $sql = "INSERT INTO contact_us (name,email,subject,phone,message) VALUES ('$name','$email','$subject','$phone','$message')";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//     $success = true;
// }
// else
//     {
//         $error = true;
//     }

$content="From: $name \n Email: $email \n Phone: $phone \n Subject: $subject \n Message: $message".'<br> From  Luna Creativity Image Site';
$recipient = "djkanha044@gmail.com"; //admin gmail
$mailheader = "From: $email \r\n";

if (mail($recipient, $subject, $content, $mailheader)) 
    {
        $msg = '<div class="alert alert-success fade show" role="alert" style="background-color:#3b4;color:white">
            <strong>Thank You For Contacting Us. </strong>We Will Contact You As Soon As Possible</div>';
    }
    else
    {
        $msg = '<div class="alert alert-warning  fade show" role="alert"style="background-color:red;color:white">
         <strong>Sorry! </strong>Your Message Is Not Sent </div>';
    }
}
?>       
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <section id="features" class="services-area">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-7 col-sm-8">
                                            <div class="single-services text-left  wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                                <?php
                                                    if (isset($msg)) {
                                                        echo $msg;
                                                    }
                                                ?>
                                                <div class="card">
                                                   <div class="card-header text-center">Contact Us</div>
                                                     <div class="card-body card-block">
                                                        <form action="" method="POST">
                                                              <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                  <input type="text" class="form-control" name="name" placeholder="Name" required="">
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                                                </div>
                                                              </div>
                                                             <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                  <input type="text" class="form-control" name="phone" maxlength="10" placeholder="Mobile Number">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <textarea class="form-control" name="message" placeholder="Enter your Message" required=""></textarea>
                                                              </div>  
                                                              <div class="text-center">                                        
                                                                <button type="submit" name="SendMsg" class="btn btn-primary ">Send Message</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> 
                                </div> 
                            </section>
                        </div> 
                    </div>
                </div>
            </div>
        <div id="particles-1" class="particles"></div>
    </div> 
</header>
<?php
include 'footer.php';
?>