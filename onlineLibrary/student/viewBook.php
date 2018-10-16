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
	$id = $_GET['id'];
	// include the header 
	include("../resources/header.php");
	// conect to the database
	include("../resources/db_conect.php");

	$q = $DBH->prepare("SELECT * FROM book WHERE id= :id");
	$q->bindValue(':id', $id);
	$q->execute();
	// ERRORS FILE GOOO HEREEEE
	$row = $q->fetch(PDO::FETCH_ASSOC);

	$title = $row['title'];
	$author = $row['author'];
	$isbn = $row['isbn'];
	$id = $row['id'];
	$description = $row['description'];

	$_SESSION["title"] = $title;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">
		<div class="picture"><img src="../images/notFound.png"></div>
		<div class="book-title"><?php echo $title ?> </div>
		<div class="book-author">by <?php echo $author ?> (Author) </div>
		<div class="book-description"><?php echo $description ?></div>
		
		<div class="botton">
			<?php 
			$q = $DBH->prepare("SELECT * FROM checkedout WHERE b_id = :b_id LIMIT 1");
		    $q->bindValue(':b_id', $row['id']);
		    $q->execute();
		      
		    $result = $q->fetch(PDO::FETCH_ASSOC);

			if (!empty($result)) {
				echo "<p style=\"color: red; font-size: 20px;\">Sorry this Book in not Available</p>";
				$aWeek = $result['date_issue'] + 604800;
				echo "Available again: "." ". date('d-m-y', $aWeek);

			} else {
				echo "<a style= \"background: #0AC986; padding: 10px; color: #fff; text-decoration:none; 
				-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; margin: 0 auto;\" 
				href= checkOut.php>CheckOut</a>";
			}

			$_SESSION['b_id'] = $id;

			?>
		</div>
	</div>





<style type="text/css">
	
	.container {
		float: left;
	}

	.picture {
		float: left;
	}
	.picture img {
		margin-left: -30px;
  		float: left;	
	}

	.book-title {
		width: 50%;
		float: left;
		color: #15323e;
		font-size: 50px;
		margin-top: 110px;
	}

	.book-author {
		width: 50%;
		float: left;
		color: #3891bd;
		margin-left: 5px;
		padding-bottom: 80px;
		border-bottom: 1px solid #b7bec1;
	}

	.book-description {
		width: 50%;
		float: left;
		margin-top: 15px;
		color: gray;
		line-height: 25px;
	}

	.botton {
		width: 50%;
		float: left;
		margin-top: 50px;
		border-bottom: 1px solid #b7bec1;
		border-top: 1px solid #b7bec1;
		padding: 30px 0 30px 0;
	}

</style>
</body>
</html>

<?php 
include ('../resources/footer.php');
?>
