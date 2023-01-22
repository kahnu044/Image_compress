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

$title = 'Image Compressor - Luna Creativity';
$headTitle = 'Start Compressing Your Photos';
include 'header.php';
?>
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
                                                    <div class="col-lg-2" style="padding:13px">
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