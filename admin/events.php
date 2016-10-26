<?php
session_start();
include "../inc/connection.php";
include "../inc/functions.php";

if ( ! isset( $_SESSION['admin'] ) )
{
    header( "Location: index.php" );
}
if ( isset( $_GET['update'] ) )
{
    $id = $_GET['update'];

    $query = $pdo->prepare( "UPDATE events SET status= ? WHERE id= ? " );
    $query->bindValue( 1, "done" );
    $query->bindValue( 2, $id );
    $query->execute();

}

if ( isset( $_GET['status'] ) )
{
    if ( $_GET['status'] == 'success' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Event Details Added!</div>";
    } elseif ( $_GET['status'] == 'loggedout' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Logged out successfully.</div>";
    } elseif ( $_GET['status'] == 'loggedin' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Signed in successfully.</div>";
    } elseif ( $_GET['status'] == 'updated' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Event Details Updated.</div>";
    } elseif ( $_GET['status'] == 'deleted' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Event Deleted.</div>";
    } elseif ( $_GET['status'] == 'notLoggedIn' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must be logged in to perform this action!</div>";

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
    <link rel="stylesheet" href="../styles.css">
    <title>Events | CETA</title>
</head>
<body style="padding-top: 60px;">
<?php include "nav.php"; ?>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Upcoming Events</h1>
    </div>
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <?php
    $event = new Functions;
    $events = $event->fetch_events();
    foreach ( $events as $event )
    {
        ?>
        <h3><strong><?php echo $event['name']; ?>  </strong><a href="events.php?update=<?php echo $event['id']; ?>"
                                                               class="btn btn-success btn-xs">Done</a></h3>
        <input type="hidden" value="<?php echo $event['name']; ?>" name="event_name">
        <p>
            <?php echo $event['description']; ?></p>
        <h4><strong>Location: </strong><?php echo $event['location']; ?>
            &nbsp;&nbsp;<strong>Time: </strong><?php echo $event['time']; ?>

            <a href="edit.php?id=<?php echo $event['id'] ?>" class="btn btn-sm btn-primary pull-right">Edit &#9998;</a>
        </h4>
        <hr style="border-top-width: 5px;">
        <?php
    }
    ?>
    <?php include "../inc/footer.php"; ?>
