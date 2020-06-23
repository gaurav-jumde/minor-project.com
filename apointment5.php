<?php  
	$conn = mysqli_connect("localhost:3307","root","","doctor");
	
	$pname = $_POST['pname'];
	$date = $_POST['date'];
	$time = $_POST['time'];

	$query = " insert into apointment5 values('$pname','$date','$time')";
	$result = mysqli_query($conn,$query);
	
	header("location:index.php");


?>