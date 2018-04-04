<?php
 //session_start();
 $con=mysqli_connect("localhost","root","","e-sangam");
 if(!$con)
 {
	 
	 die("Error:".mysqli_error($con));
 }
 
 if(session_status()==PHP_SESSION_NONE)
 {
 
 session_start();
 }
 
 
 
 
 ?>