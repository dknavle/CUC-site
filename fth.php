<?php
$conn = new mysqli("localhost","hydra","hydra","cucdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql="SELECT * from events";
$result=mysqli_query($conn,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$row=mysqli_fetch_array($result);

?>