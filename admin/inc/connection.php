<?php
	$conn = mysqli_connect('localhost', 'root', '', 'todaystime');
	if($conn){
		//echo 'database established';
	} else{
		echo 'connection failed !';
	}
?>