<?php
session_start();
include "inc/connection.php";
include "inc/functions.php";

if ( isset( $_GET['status'] ) )
{
    if ( $_GET['status'] == 'loggedout' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Logged out successfully.</div>";
    } elseif ( $_GET['status'] == 'loggedin' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Signed in successfully.</div>";
    } elseif ( $_GET['status'] == 'alreadyLoggedIn' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You Are Already Logged In!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#2c3e50">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <title>CETA</title>
    <style>
        body {
            /*background: #000000 url("img/logo.jpg") repeat top center fixed;*/
background-color: transparent;
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
                    }
    </style>

<!--<body>  <link href="C:\wamp64\www\ceta\style.css" rel="style.css" >-->
        <!--[if IE]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</body>
</head>
<body style="padding-top: 60px;">
  <body background="img/bgg.jpg">

<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" > CETA

            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs">
            <?php if ( isset( $_SESSION['loggedInUser'] ) )
            { ?>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            <?php } else
            { ?>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container">
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <div class="row">
        <div class="col-lg-3 col-lg-offset-1">
              <img src="img/vidone.png" alt="logo" width="50%" class="img-responsive left">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
              <img src="img/logo.png" alt="logo" width="80%" class="img-responsive center-block">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="page-header" align="center">
                <h1 style="color: #727272">COMPUTER ENGINEERS TECHNICAL ASSOCIATION</h1>
            </div>
            <h4 align="justify">The department of Computer Science and Engineering is a established to provide undergraduate and graduate education in the field of Computer Science and engineering to students with diverse background in foundations of software and hardware through a broad curriculum and strongly focused on developing advanced knowledge to become future leaders.Create knowledge of advanced concepts, innovative technologies and develop research aptitude for contributing to the needs of industry and society.Develop professional and soft skills for improved knowledge and employability of students with diverse background.Encourage students to engage in life-long learning to create awareness of the contemporary developments in computer science and engineering to become outstanding professionals.Develop attitude for ethical and social responsibilities in professional practice at regional, National and International levels.
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="page-header" align="center">
                <h1 style="color: #727272">Vision</h1>
            </div>
            <h4 align="center">To become a centre of excellence in Computer Science and Engineering by imparting high quality</h4>
        </div>
    </div>

    <div class="page-header" align="center">
        <h1 style="color: #727272">PHOTO GALLERY</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
  <img src="img/img.jpg" class="img img-responsive" alt="" /><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
  <a href="past_events.php"><img src="img/imgg.jpg" class="img img-responsive" alt="" /></a><br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
  <img src="img/imggg.jpg" class="img img-responsive" alt="" /><br>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
  <img src="img/imgggg.jpg" class="img img-responsive" alt="" />
        </div>
    </div>

    <?php include "inc/footer.php"; ?>
