<?php
session_start();

include "../inc/functions.php";
include "../inc/connection.php";

if ( isset($_SESSION['admin']) )
{
    header('Location: events.php?status=alreadyLoggedIn');
}

if ( isset( $_POST['login'] ) )
{
    $formUser = validateFormData( $_POST['username'] );
    $formPass = validateFormData( $_POST['password'] );

    if ( empty( $formUser ) || empty( $formPass ) )
    {
        echo "<script> alert('Please fill in all the fields.');</script>";
    } else
    {
        $query = $pdo->prepare( "SELECT * FROM admin WHERE username = ? AND password = ?" );
        $query->bindValue( 1, $formUser );
        $query->bindValue( 2, $formPass );
        $query->execute();
        $num = $query->rowCount();
        if ( $num == 1 )
        {
            $_SESSION['admin'] = true;
            header("Location: events.php");
        }
        if ( ! isset( $_SESSION['admin'] ) )
        {
            $logInError = "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>Invalid Credentials! Try again.</div>";            }
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
    <title>CETA | Computer Engineer's Technical Association</title>
</head>
<body style="padding-top: 60px;">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container">

    <div class="col-sm-offset-4 col-sm-4">
        <?= ( isset( $alertMessage ) ) ? $alertMessage : ""; ?>
        <div class="page-header" align="center">
            <h1 style="color: #727272"><span style="color:#18bc9c;font-size: 36px" class="lead">CETA</span> Admin</h1>
        </div>
        <div>
            <?= ( isset( $logInError ) ) ? $logInError : ""; ?>
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                <div class="form-group <?= ( isset( $logInError ) ) ? "has-error" : ""; ?>">
                    <label for="username">Username</label>
                    <input class="form-control" placeholder="Username" name="username" id="username"
                           type="text"
                           required autofocus><br>
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password" name="password" id="password"
                           type="password"
                           required>
                </div>
                <div align="center">
                    <button type="submit" name="login" class="btn btn-primary">Login</button></div>
            </form>

            <br>
            <br>
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

