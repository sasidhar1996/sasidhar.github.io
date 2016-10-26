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

if ( isset( $_POST['add'] ) )
{
    $name = $description = $location = $time = "";
    $name = validateFormData( $_POST['name'] );
    $description = validateFormData( $_POST['description'] );
    $location = validateFormData( $_POST['location'] );
    $time = validateFormData( $_POST['time'] );

    if ( $name && $description && $location && $time  )
    {
        $query = mysql_query( "INSERT INTO events ( name,description, location,time) VALUES ('$name','$description','$location','$time')") or die(mysql_error());

            header( "Location: events.php?status=success" );
    }
}

if ( isset( $_POST['summary'] ) )
{
    $name = $date = $winners = $runners = "";
    $name = validateFormData( $_POST['name'] );
    $date = validateFormData( $_POST['date'] );
    $winners = validateFormData( $_POST['winners'] );
    $runners = validateFormData( $_POST['runners'] );

    if ( $name && $date && $winners && $runners  )
    {
        $query = mysql_query( "INSERT INTO past_events ( name,date, winners,runners) VALUES ('$name','$date','$winners','$runners')") or die(mysql_error());

        header( "Location: events.php?status=success" );
    }
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles.css">
        <title>Add New Event</title>
    </head>
 <body style="padding-top: 60px;">
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                              <a class="navbar-brand" href="events.php">CETA<strong> Admin</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="bs">
                <?php if ( isset( $_SESSION['admin'] ) ) { ?>
                    <ul class="nav navbar-nav">
                        <li><a href="events.php">Back</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                <?php } else { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Login</a></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Add New Event</h1>
    </div>
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
        <div class="form-group col-sm-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="time">Date &amp; Time</label>
            <input type="text" class="form-control" id="time" name="time" value="" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="" name="description"
                       required></textarea>
            </div>
        <div class="col-sm-12" align="center">
            <button type="submit" name="add" class="btn btn-primary">Add Event</button>
        </div>
    <br>
    </form>
    <br>
    <div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Add Event Summary</h1>
    </div>

    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="form-group col-sm-6">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" name="date" value="" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="winners">Winners</label>
            <input type="text" class="form-control" id="winners" name="winners" value="" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="runners">Runners</label>
            <input class="form-control" id="runners" placeholder="" name="runners"
                   required>
        </div>
        <div class="col-sm-12" align="center">
            <button type="submit" name="summary" class="btn btn-primary">Add Summary</button>
        </div>
        <br>
    </form>
    <hr></div>
<?php include "../inc/footer.php"; ?>
