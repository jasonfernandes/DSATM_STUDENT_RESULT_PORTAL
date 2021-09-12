<?php

$conn = mysqli_connect('localhost', 'jason', '12345', 'student_data_base');
if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}

?>
