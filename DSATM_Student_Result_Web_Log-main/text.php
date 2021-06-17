<?php

$conn = mysqli_connect('localhost', 'bharath', '12345', 'student_data_base');
if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}

?>
