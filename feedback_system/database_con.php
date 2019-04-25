<?php
	$conn=mysqli_connect("localhost","root","","faculty_feedback_system",3306) or die("Server not found");
	mysqli_select_db($conn,"faculty_feedback_system") or die("database not found!");
?>