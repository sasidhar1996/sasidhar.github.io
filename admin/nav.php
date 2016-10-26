<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="events.php">CETA <strong>Admin</strong></a>
        </div>
        <div class="collapse navbar-collapse" id="bs">
            <?php if ( isset( $_SESSION['admin'] ) )
            { ?>
                <ul class="nav navbar-nav">
                    <li><a href="add.php">Add Event Details</a></li>
                    <li><a href="past_events.php">Past Events</a></li>
                    <li><a href="event_registrations.php">Event Registrations</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php">Log Out</a></li>
                </ul>
            <?php } else
            { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Login</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
