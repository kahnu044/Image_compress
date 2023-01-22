<?php
$Canonical = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A Small Tool That Can Compress Your Large Size Image Into Uptmize Version" />
    <meta name="keyword" Content="Online Image Compressor,JPG Compressor,GIF Compressor,PNG Compressor,JPEG Compressor,"/>
    <meta name="author" content="Luna Creativity">
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#361ec2" />
    <meta property="og:site_name" content="Compress Image">
    <meta property="og:title" content="Online Compress Images">
    <meta property="og:description" content="A Small Tool That Can Compress Your Large Size Image Into Uptmize Version">
    <meta property="og:image" content="assets/images/icon.png">
    <link rel="canonical" href="<?php echo $Canonical; ?>"/>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar head navbar-expand-lg">
                            <a href="./">
                                <img src="assets/images/logo.png" class="image2" alt="Logo" >
                            </a>
                            <div class="collapse navbar-collapse sub-menu-bar" >
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="./">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="contact-us.php">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="about-us.php">About</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="./#features">Start</a>
                            </div>
                        </nav> 
                    </div>
                </div> 
            </div> 
        </div>
        <div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s"><?php echo $headTitle; ?></h2>
                        </div>
                    </div>
                </div>