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
	// get the date today
	$id = $_GET['id'];
	// include the header 
	include("../resources/headeradmin.php");

	// conect to the database
	include("../resources/db_conect.php");

	
    //------------------------------------------------

	$sql = "DELETE FROM checkedout WHERE id = ?;";
    $sth = $DBH->prepare($sql);
    $sth->bindParam(1, $id);
    $sth->execute();
    
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="result">
		
		<p>Sucesfully Check Back In</p>
		<a href="index.php" style= "background: #0AC986; padding: 10px; color: #fff; text-decoration:none; 
		-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; margin: 0 auto;">Take me to the Home Page</a>
	</div>

<style type="text/css">
	.result {
		width: 100%;
		text-align: center;
		float: left;
		margin: 0 auto;
		margin-top: 100px;
	}

	.result h2 {
		text-align: center;
		color: #15323e;
		font-size: 50px
	}

	.result p {
		font-size: 25px;
	}


</style>
</body>
</html>

<?php 
include ('../resources/footer.php');
?>
