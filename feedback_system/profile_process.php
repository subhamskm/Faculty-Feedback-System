<?php
session_start();
include("database_con.php");
$sem=$_POST["semester"];
$batch=$_POST["batch"];
$roll=$_POST["roll"];
$datee=$_POST["datee"];

$_SESSION["sem"] = $_POST["semester"];
$_SESSION["batch"] = $_POST["batch"];
$_SESSION["date"] = $_POST["datee"];
$_SESSION["sub"] = 0;

$s="select roll,datee from student_profile where roll = '" . $_POST["roll"] . "' and datee = '" . $_POST["datee"] . "';";
$result=mysqli_query($conn,$s) ;
if(mysqli_num_rows($result) > 0) {
	echo "<script>alert('Duplicate Entry! Cannnot Go');window.location='index.php';</script>";
}
else{
	$store="insert into student_profile(roll,datee,sem,batch) values ('$roll', '$datee','$sem','$batch')";
	$i=mysqli_query($conn,$store);
	header('Location: ./subjects.php');
	}
?>