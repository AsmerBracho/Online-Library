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
	$today = time();
	// include the header 
	include("../resources/header.php");
	$username = $_SESSION["username"];
	$id = $_SESSION["b_id"];
	$studentId = $_SESSION["student_id"];
	$title = $_SESSION["title"];
	// conect to the database
	include("../resources/db_conect.php");

	
	$sql = "INSERT INTO checkedout (b_id, s_student_id, date_issue) VALUES (?, ?, ?);";
    $sth = $DBH->prepare($sql);
    $sth->bindParam(1, $id);
    $sth->bindParam(2, $studentId);
    $sth->bindParam(3, $today);
    $sth->execute();
    	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="result">
		<h2><?php echo $title ?></h2>
		<p>Sucesfully added to your books</p>
		<a href="index.php" style= "background: #0AC986; padding: 10px; color: #fff; text-decoration:none; 
		-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; margin: 0 auto;">Take me to my Books</a>
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
