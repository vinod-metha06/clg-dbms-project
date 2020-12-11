<?php
    
$con=mysqli_connect("localhost","root","","myshop");

if(mysqli_connect_errno())
{
    echo"Failed to connect to MySQL server:" .mysqli_connect_error();
}


?>