<?php
session_start();
include "../inc/connection.php";
include "../inc/functions.php";

if ( ! isset( $_SESSION['admin'] ) )
{
    header( 'Location: index.php' );
}

if ( isset( $_SESSION['loggedInUser'] ) )
{
    header( "Location: ../index.php" );
}

$id = $_GET['id'];

$query = mysql_query( "SELECT * FROM events WHERE id='$id'" ) or die( mysql_error() );

if ( mysql_num_rows( $query ) > 0 )
{
    while ( $row = mysql_fetch_assoc( $query ) )
    {
        $name = $row['name'];
        $description = $row['description'];
        $location = $row['location'];
        $time = $row['time'];
    }
} else
{
    $alertMessage = "<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Oh snap! </strong>Nothing to see here, <a href='index.php' class='alert-link'>Go Back.</a></div>";
}

if ( isset( $_POST['update'] ) )
{
    $name = validateFormData( $_POST['name'] );
    $description = validateFormData( $_POST['description'] );
    $location = validateFormData( $_POST['location'] );
    $time = validateFormData( $_POST['time'] );

    $query = mysql_query( "UPDATE events SET name='$name', description='$description', location='$location', time='$time' WHERE id='$id'" ) or die( mysql_error() );
    header( "Location: events.php?status=updated" );
}

if ( isset( $_POST['delete'] ) )
{
    $alertMessage = "<div class='alert alert-danger'><p>Are you sure you want to permanently delete this event?</p><br><form action='" . htmlspecialchars( $_SERVER['PHP_SELF'] ) . "?id=$id' method='post'><a class='btn btn-sm btn-default' date-dismiss='alert'>Cancel</a>&nbsp;<input type='submit' class='btn btn-sm btn-danger' name='confirm-delete' value='Delete'></form></div>";
}

if ( isset( $_POST['confirm-delete'] ) )
{
    $query = mysql_query( "DELETE FROM events WHERE id='$id'" ) or die( mysql_error() );
    header( "Location: events.php?status=deleted" );
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#2c3e50">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles.css">
        <title>Edit Event | CETA</title>
    </head>
<body style="padding-top: 60px;">
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="events.php">CETA<strong> Admin</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="bs">
                <?php if ( isset( $_SESSION['admin'] ) )
                { ?>
                    <ul class="nav navbar-nav">
                        <li><a href="events.php">Back</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                <?php } else
                { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="events.php">Login</a></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<div class="container">
    <div class="page-header" align="center">
        <h1 style="color: #727272">Edit Event Details</h1>
    </div>
    <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>?id=<?= $id ?>" method="post"
          class="row">
        <div class="form-group col-sm-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?= ( isset( $name ) ) ? $name : ""; ?>" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location"
                   value="<?= ( isset( $location ) ) ? $location : ""; ?>" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="time"></label>
            <input type="text" class="form-control" id="time" name="time"
                   value="<?= ( isset( $time ) ) ? $time : ""; ?>" required>
        </div>
        <div class="form-group col-sm-12">
            <label for="amount">Description</label>
                <textarea class="form-control" id="description" placeholder="" name="description"
                       required><?= ( isset( $description ) ) ? $description : ""; ?></textarea>
            </div>
        <div class="col-sm-12" align="center">
            <div>
                <button name="delete" class="btn btn-danger">Delete</button>
                <a href="events.php" class="btn btn-default">Cancel</a>&nbsp;&nbsp;
                <button type="submit" name="update" class="btn btn-primary">Update Event</button>
            </div>
        </div>
    </form>
    <br>
    <hr>
<?php include "../inc/footer.php"; ?>