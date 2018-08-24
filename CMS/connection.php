<?php
$connection =	mysqli_connect('localhost' , 'hydra' ,'hydra' ,'cucdb');




if(isset($_POST['email'])){
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$classc = $_POST['classc'];

	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$fee_status = $_POST['fee_status'];
	$id = $_POST['id'];

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE students SET fname='$firstName' , lname='$lastName',class='$classc' , email = '$email',email = '$contact',fee_status = '$fee_status' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>