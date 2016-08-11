<?php 

	$connection = new mysqli("localhost", "root", "", "smc");

	if( $connection->connect_error ){
		die("Connection error!");
	}

 ?>