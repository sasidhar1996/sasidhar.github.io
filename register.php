<?php
session_start();

include "inc/functions.php";
include "inc/connection.php";

if ( isset($_SESSION['loggedInUser']) )
{
    header('Location: index.php?status=alreadyLoggedIn');
}

if ( isset( $_POST['register'] ) )
{
    $roll = validateFormData( $_POST['roll'] );
    $name = validateFormData( $_POST['name'] );
    $email = validateFormData( $_POST['email'] );
    $password = validateFormData( $_POST['password'] );

    $count = mysql_query( "SELECT id FROM register WHERE email = '$email'" ) or die( mysql_error() );

    if ( mysql_num_rows( $count ) < 1 )
    {
        mysql_query( "INSERT INTO register(roll,name,email,password) VALUES('$roll','$name','$email','$password');" ) or die( mysql_error() );
        header("Location: index.php");

    } else
    {
        $logInError = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>An account with the email already exists.</div>";
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
    <title>Register | Computer Engineer's Technical Association</title>
</head>
<body style="padding-top: 45px;">
<?php include_once 'inc/nav.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="page-header" style="margin-bottom: 0;" align="center">
                        <h1 style="color: #727272"><span style="color:#18bc9c;font-size: 38px;" class="lead">CETA</span> Register</h1>
                    </div>
                    <div>
                        <?= ( isset( $logInError ) ) ? $logInError : ""; ?>
                        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                            <div class="form-group <?= ( isset( $logInError ) ) ? "has-error" : ""; ?>">
                                <label for="roll">Roll No.</label>
                                <input class="form-control" placeholder="Roll No." name="roll" id="roll"
                                       type="text"
                                       required autofocus><br>
                                <label for="name">Name</label>
                                <input class="form-control" placeholder="Name" name="name" id="name"
                                       type="text"
                                       required ><br>
                                <label for="email">Email</label>
                                <input class="form-control" placeholder="Email" name="email" id="email"
                                       type="text"
                                       required ><br>
                                <label for="password">Password</label>
                                <input class="form-control" placeholder="Password" name="password" id="password" type="password" required>
                            </div>
                            <div align="center">
                            <button type="submit" name="register" class="btn btn-primary">Register</button></div>
                        </form>
                        <br>
                        <p align="center"><a href="login.php"><strong class="text-success">Already have an account? Log In</strong></a><br>
                        </p>
                    </div>
                </div>
    <div class="row" align="center">
        <div class="col-lg-12 navbar-bottom">
            <p style="color:grey"><strong>&copy; CETA 2016</strong></p>
        </div>
    </div>
</div>
</body>
</html>

