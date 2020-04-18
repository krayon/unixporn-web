<?php 
include_once('inc/common.php');
include_once('inc/db.php');
include_once('inc/functions.php');
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free GNU/Linux,FreeBSD,OpenBSD and Unix-like image hosting and screenshot sharing">
    <meta name="author" content="<?php echo $site_name; ?>">
    <title><?php echo $site_name; ?> - Free GNU/Linux image hosting and screenshot sharing | <?php echo $site_url; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="//<?php echo $site_url; ?>"><span class="glyphicon glyphicon-console" aria-hidden="true"></span> <?php echo $site_name; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Explore</a></li>
            <li><a href="upload.php"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Upload</a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
