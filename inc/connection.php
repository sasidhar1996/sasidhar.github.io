<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ceta','root','');
    $con=mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('ceta') or die("cannot select DB");
}
catch(PDOException $e)
{
    exit('Database error.');
}
?>
