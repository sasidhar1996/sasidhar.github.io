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
    } elseif ( $_GET['status'] == 'notLoggedIn' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You must be logged in to perform this action!</div>";
    } elseif ( $_GET['status'] == 'alreadyLoggedIn' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>You Are Already Logged In!</div>";
    }
    elseif ( $_GET['status'] == 'registered' )
    {
        $alertMessage = "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Thank you for registering!</div>";
    }
}

if ( isset( $_POST['event_register'] ) )
{
    if ( ! isset($_SESSION['loggedInUser']) )
    {
        header("Location: events.php?status=notLoggedIn");
    }
    else{

        $roll = validateFormData( $_SESSION['loggedInUser'] );
        $event_name = validateFormData( $_POST['event_name'] );

        $count = mysql_query( "SELECT id FROM event_register WHERE roll = '$roll' and event = '$event_name'" ) or die( mysql_error() );

        if ( mysql_num_rows( $count ) < 1 )
        {
            mysql_query( "INSERT INTO event_register(roll,event) VALUES('$roll','$event_name');" ) or die( mysql_error() );
            header("Location: events.php?status=registered");

        } else
        {
            $alertMessage = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have been already registered for this event.</div>";
        }
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
    <title>Events | CETA</title>
</head>
<body style="padding-top: 60px;">
<?php include_once 'inc/nav.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
            <h3><strong><?php echo $event['name']; ?></strong></h3>
            <input type="hidden" value="<?php echo $event['name']; ?>" name="event_name">
            <p>
                <?php echo $event['description']; ?></p>
            <h4><strong>Location: </strong><?php echo $event['location']; ?>
                &nbsp;&nbsp;<strong>Time: </strong><?php echo $event['time']; ?></h4>
            <div align="center">
                <button type="submit" name="event_register" class="btn btn-primary">Register</button></div>
        </form>
        <hr style="border-top-width: 5px;">
        <?php
    }
    ?>
    <?php include "inc/footer.php"; ?>
