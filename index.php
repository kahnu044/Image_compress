<?php
// header('refresh:1');
error_reporting(0);
// $Msg = false;
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    //get compress quality
    $compressQuality = $_POST['quality'];

    //Upload file original name with extension
    $file_name = $_FILES["image_file"]["name"];

    //Upload file original name without extension
    $OriginalFileName = pathinfo($file_name,PATHINFO_FILENAME);

    //Upload file extension
    $FileExt =  strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

    //New File Name After Adding Upload Time And Site Name
    $siteName = '(LunaCreativity.Com)';
    $NewFileName = $OriginalFileName.time().$siteName.'.'.$FileExt;


    // $file_type = $_FILES["image_file"]["type"];
    $TempName = $_FILES["image_file"]["tmp_name"];
    $FileSize = $_FILES["image_file"]["size"];
    
    //convert file size bytes to kb
    $oldFileSize = number_format($FileSize/1024,2).'KB<br>';


  
    function compress_image($source_url, $destination_url, $quality)
    {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source_url);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source_url);

        return imagejpeg($image, $destination_url, $quality);
    }



       
    if (!$TempName)
        {
            $Msg =  "You Have To Must Upload A Photo To Compress";     
        }

    else if (($FileExt == "jpg") || ($FileExt == "jpeg") || ($FileExt == "png") || ($FileExt == "gif"))
        {
            $CompressDone = compress_image($TempName, "uploads/" .$NewFileName, $compressQuality);
            if ($CompressDone) {
                $Msg = "Compression Done successfully";

                // echo "<br><br> <a href='uploads/".$NewFileName."' target='_blank'>View Photo</a>
                // <br>
                // <a href='uploads/".$NewFileName."' Download=''>Download Photo</a><br>
                // ";
                $newPath = 'uploads/'.$NewFileName;
                $newFileSize = number_format(filesize($newPath)/1024,2).'KB<br>';
            }   
        }
    else
        {
            $Msg =  "Uploaded image should be jpg or gif or png.";
        }

        
} 


// $name = 
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
  
    <title>Basic - SaaS Landing Page</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
        
  
      
    <style type="text/css">	
		.single-services{
			border: 2px solid red;
		}
		.subscribe-area{
			border: 2px solid red;
		}
		.file {
		  visibility: hidden;
		  position: absolute;
		}
		.browse {
			background: white;
		}

    </style>
</head>

<body>
    
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar head navbar-expand-lg">
                            <a  href="./ff">
                            
                                <img src="assets/images/logo.png" class="image2" alt="Logo" >
                            </a>
                            
                     

                            <div class="collapse navbar-collapse sub-menu-bar" >
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                              <!--       <li class="nav-item">
                                        <a class="page-scroll" href="#facts">Why</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#blog">Blog</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="#features">Start</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Start Compressing Your Photos</h2>
                            
                            <!-- <a href="#" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Start Compressing</a> -->
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            

    <section id="features" class="services-area pt-10">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-10 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                    	<div class="row">  

	                        <div class="col-lg-6">
		                        <div class="subscribe-form mt-10">
		                        <form  action='' method='POST' id="image-form" enctype='multipart/form-data' >
		                       
		                            	<input name="image_file" type="file"  class="file" accept="image/*">
									
									    	<div class="input-group my-3">
									      		<input type="text" class="form-control"  placeholder="Upload File" id="file" disabled="" >
									      		<div class="input-group-append">
									        		<button type="button" onclick="showPic()" class="browse btn btn-primary">Browse...</button>
									      		</div>

												<input type="range" name="quality"  min="0" max="100" onchange="updateTextInput(this.value);">
												<input type="text" id="textInput" value="" placeholder="Compression Quality">

												<script type="text/javascript">function updateTextInput(val) {
												          document.getElementById('textInput').value=val; 
												        }
												</script>
									    	</div>
									    <input type="submit" class=" btn btn-primary" value="Compress">
		  							</form>

								    
		                        </div>
	                    	</div>

							<div class="col-lg-2 " style="padding: 13px">
							<?php
						
								if (isset($Msg)) {
									echo '<img src= "uploads/'.$NewFileName.' " width="180" height="270" class="uploaded-image">';
								}
								else
								{
									echo '<img src="assets/images/upload-logo.png" id="preview" width="180" height="270"  class="img-thumbnail">';
								}
							?>
							</div>
								                    	

	                    	<div class="col-lg-2 text-center" style="padding: 13px">
		                    <?php
								if (isset($Msg)) {
								echo 'Before : '.$oldFileSize.'<br>';
								echo 'Quality : ' .$compressQuality.'<br><br>';
								echo 'After : '.$newFileSize.'<br>';
								}

	                        
	               	  echo '</div>

	                    	<div class="col-lg-2" style="padding: 13px">';
	                    if (isset($Msg)){
						echo $Msg.'<br>' ;
						echo "<a href='uploads/".$NewFileName."' Download='' onclick='refresh()' class='main-btn wow fadeInUp' data-wow-duration='1.3s' data-wow-delay='1.1s' target='_blank'>Download</a>";
					}
						?>
	
	                    	</div>

                    	</div>

                    </div> <!-- single services -->
                </div>
               
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
 



    
    <!--====== ABOUT PART ENDS ======-->
    


    
<script type="text/javascript">
function refresh(){
	window.location.href='./';
}



	function showPic(){
	$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
}
</script>

    
    
<!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area pt-40">
        <div class="container ">
        	
            <div class="subscribe-area wow fadeIn col-lg-12" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row ">
                   <div class="brand-logo d-flex align-items-center justify-content-center justify-content-md-between text-center">
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeIn;">
                            <img src="assets/images/jpeg.png" alt="brand">
                        </div> <!-- single logo -->
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeIn;">
                            <img src="assets/images/png.png" alt="brand">
                        </div> <!-- single logo -->
                         <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.2s; animation-name: fadeIn;">
                            <img src="assets/images/jpg.png" alt="brand">
                        </div> <!-- single logo -->
                        
                        
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.5s; animation-name: fadeIn;">
                            <img src="assets/images/gif.png" alt="brand">
                        </div> <!-- single logo -->
                    </div>
                 </div> <!-- row -->
            </div> <!-- subscribe area -->





            <div class="footer-widget pb-20">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Link</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                </ul>
                            </div> 
                        </div> 
                    </div>


                    <div class="col-lg-4 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Contact Us</h4>
                            </div>
                            <ul class="contact">
                                <li>+91-6370223969</li>
                                <li>lunacreativity.in@gmail.com</li>
                                <!-- <li>www.yourweb.com</li> -->
                                <li>Ravenshaw University <br>Cuttack,  Odisha , 753001</li>
                            </ul>
                        </div> 
                    </div>


                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                           <div class="footer-title">
                                <h4 class="title about" >About Us</h4>
                            </div>
                            <p class="text">I am Kanhu Charan Swain , MCA 3rd Year Student Of Ravenshaw University, This Site Help The Stundents To Compress Their Photos.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni-instagram-filled"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> 
        <!-- footer widget -->






            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">Designed and Developed by <a href="https://uideck.com" rel="nofollow">Mr. Kanha</a></p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="copyright">
                            <div class="copyright-content right">
                                <p class="text">2021 @Copyrights || All Rights Reserved</p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   


    
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  
    <script src="assets/js/slick.min.js"></script>

    <script src="assets/js/jquery.counterup.min.js"></script>

    <script src="assets/js/jquery.magnific-popup.min.js"></script>
 
    <script src="assets/js/wow.min.js"></script>
    
    <!--====== Particles js ======-->
    <script src="assets/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
    
</body>

</html>