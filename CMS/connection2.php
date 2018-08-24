<?php
$connection =	mysqli_connect('localhost' , 'hydra' ,'hydra' ,'cucdb');





	
	
	$lastName = $_POST['lastName'];
	$classc = $_POST['classc'];

	
	$id = $_POST['id'];

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE events SET event_title='$lastName',event_content='$classc' WHERE event_id='$id'");
	if($result){
        header("Location:http://localhost/cuc/");
		echo 'data updated';
	}
    else
    {
        echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
    }


?>