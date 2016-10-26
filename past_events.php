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
    <title>Past Events | CETA</title>
</head>
<body style="padding-top: 60px;">
<?php include_once 'inc/nav.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Past Events</h1>
    </div>
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <?php
    $event = new Functions;
    $events = $event->fetch_past_events();
    foreach ( $events as $event )
    {
        ?>
        <h3><strong>Event: </strong><?php echo $event['name']; ?></h3><br>
        <h4><strong>Date: </strong><?php echo $event['date']; ?></h4>
        <h4><strong>Winners: </strong><?php echo $event['winners']; ?></h4>
        <h4><strong>Runners: </strong><?php echo $event['runners']; ?>
        </h4>
        <hr style="border-top-width: 5px;">
        <?php
    }
    ?>
    <?php include "inc/footer.php"; ?>
