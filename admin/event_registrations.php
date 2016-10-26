<?php
session_start();
include "../inc/connection.php";
include "../inc/functions.php";

if ( ! isset( $_SESSION['admin'] ) )
{
    header('Location: index.php');
}
if ( isset( $_SESSION['loggedInUser'] ) )
{
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#2c3e50">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.css">
    <title>Event Registrations | CETA</title>
</head>
<body style="padding-top: 60px;">
<?php include "nav.php"; ?>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Event Registrations</h1>
    </div>

    <table class="table table-striped table-hover">
<tr>
    <th>Event Name</th><th>Roll No.</th>
</tr>
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <?php
    $event = new Functions;
    $events = $event->fetch_event_registrations();
    foreach ( $events as $event )
    {
        ?>
        <tr><td><?php echo $event['event']; ?></td>
        <td><?php echo $event['roll']; ?></td></tr>
        <?php
    }
    ?>
        </table>
</div>
<?php include "../inc/footer.php"; ?>
