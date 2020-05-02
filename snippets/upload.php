<?php
// uploading of data to the database
require 'connect.php';

if(isset($_POST['submit'])){
	$Username=$_POST['username'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$Gender=$_POST['gender'];

	$query = "INSERT INTO clients(Username,Email,Password,Gender) VALUES('$Username', '$Email', '$Password', '$Gender')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>alert('Registration Successful')</script>";
		header("Location: signin.html");

	}

	else{
		echo "<script>alert('Failed Registration')</script>";
	}
}
?>