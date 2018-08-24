
<?php

	$con = mysqli_connect("localhost","root","","cucdb");
	
		$fname = $_POST['first_name']; 
		$lname = $_POST['last_name'];
		$class = $_POST['classf'];
		$email = $_POST["email"];
	    $contact = $_POST['contact_no'];
		$sql = "insert into students values('$fname','$lname','$class','$email','$contact')";//,'unpaid')";
		if(mysqli_query($con,$sql)){
			echo "<script> alert('Registration Successful.\nContact to cub for conformation.');
	        window.location = 'http://localhost/live_project/cuc';</script>";
			//header('Location: http://localhost/phpmyadmin/sql.php?db=cucdb&table=students&token=2eaed0e3e86ff9ee55549d3c33dc0523&pos=0');
		}
		else
		    echo "<script> alert('This email is already registered.');
		          window.location = 'http://localhost/live_project/cuc/register.html';</script>";
	
?>

