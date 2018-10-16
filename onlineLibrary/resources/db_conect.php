<?php 
/*
* Web Development
*
* CCT
*
* Author: Asmer Bracho
* Student Number: 2016328
*
*/
 ?>

<?php
	try {
	  $host = '127.0.0.1';
	  $dbname = 'web_assignment';
	  $user = 'root';
	  $pass = '';
	  
	  # MySQL with PDO_MYSQL  
	  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}

	catch (PDOException $e) {
		echo $e->getMessage();
	}
?>