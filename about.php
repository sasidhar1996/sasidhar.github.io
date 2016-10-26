<?php
session_start();
include "inc/connection.php";
include "inc/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#2c3e50">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>CETA</title>
</head>
<body style="padding-top: 60px;">
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CETA</a>
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
    <div class="page-header" align="center">
        <h1 style="color: #727272;">About CETA</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <img src="img/logo.jpg" alt="logo" width="75%" class="img-responsive center-block">
        </div>
        <div class="col-lg-8">
            <p align="justify">The Department of Computer Science and Engineering (CSE) was established in the year 1996 with a modest intake of 60 in B.Tech (CSE). The intake of students was increased to 120 in the year 2000, further increased to 180 in the year 2013 and subsequently increased to 240 in the year 2014, besides an additional 20% of intake under lateral entry scheme for Diploma holders.
                The Department offers two PG programs namely M.Tech (Computer Science) with an intake of 36 and M.Tech (Computer Networks and Information Security) with an intake of 18.
                The B.Tech program in CSE was accredited by NBA for 3 years in March 2007 and got reaccredited for 2 years during October 2013.
                The Department has 48 faculty members. Four faculty members have Ph.D., Five faculty members are pursing Ph.D., and remaining is having M.Tech qualification. The Department is also supported with ten non-teaching staff.
                The first year of under graduate program follows annual system and rest of the three years follows semester system. For M.Tech programs semester system is in practice right from first year. Curriculum is designed with a provision for electives and inter-disciplinary courses.
                The Department regularly conducts Guest Lectures, Expert Lectures, Seminars, Workshops and Add-on courses for the benefit of the students. Students are also encouraged to participate in technical symposiums/conferences conducted by various organizations. About 15 students are attached to a mentor to guide, motivate and counsel them in academic and career guidance.
                The Department has student technical association namely Computer Engineers technical association (CETA). CETA organizes co-curricular and extra-curricular activities regularly.
                About 500 alumni of the Department are placed through placement and training centre of the College during last five years. The alumni of CSE who have imbibed ethics, human values and professionalism have made their mark in reputed organizations in India and Abroad.</p>
        </div>
    </div>
    <div class="page-header" align="center">
        <h1 style="color: #727272"></h1>
    </div>

    <?php include "inc/footer.php"; ?>
