<?php 

	
	$conn = mysqli_connect('localhost','world','test123','project1');
	if (!$conn) {
		# code...

		echo "conn error".mysqli_connect_error($conn);
	}


?>