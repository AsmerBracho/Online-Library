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
	// include the header 
	include("../resources/header.php");
	// conect to the database
	include("../resources/db_conect.php");

	if($_POST){
    $book = $_POST['search'];
    
    $title = "%".$book."%";

	// prepare query
	$stmt = $DBH->prepare("SELECT * FROM book WHERE title like ?");
	$stmt->bindParam(1, $title);
	$stmt->execute();

	//manage any error
	// ERROR GOES HERE

	// catch the values 
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<title>Search</title>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/tableStyle.css">
</head>

<body>
  <h1>Search</h1>
<table class="responstable">
  
  <?php
	if((!empty($rows))) {
		echo "<tr>
		<th>Title</th>
		<th>Author</th>
		<th>ISBN</th>
		<th>Availability</th>
		<th>Available For</th>
		<th></th>
		</tr>";

		foreach($rows as $row){
		echo "<tr>";
			echo "<td style= \"width: 30%\">";
			echo $row['title'];
			echo "</td>";
			echo "<td>";
			echo $row['author'];
			echo "</td>";
			echo "<td style= \"width: 10%\">";
			echo $row['isbn'];
			echo "</td>";
			echo "<td style= \"display: table-cell; text-align: center; width: 10%\">";
			$q = $DBH->prepare("SELECT * FROM checkedout WHERE b_id = :b_id LIMIT 1");
			$q->bindValue(':b_id', $row['id']);
			$q->execute();

			$result = $q->fetch(PDO::FETCH_ASSOC);

			if (!empty($result)) {
				echo "<i style= \"color: red; \" class=\"fa fa-times\"></i>";
			} else {
				echo "<i style= \"color: green; \" class=\"fa fa-check\"></i>";
			}
			echo "</td>";

			echo "<td style= \"display: table-cell; color: red; text-align: center; width: 10%\">";
			if (!empty($result)) {
				$aWeek = $result['date_issue'] + 604800;
				echo date('d-m-y', $aWeek);
			} else {
				echo "<p style = \"color: green;\">Available<p>";
			} 
			echo "</td>";

			//botones
			echo "<td>";
			echo "<a style= \"background: #0AC986; padding: 10px; color: #fff; text-decoration:none; 
			-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; margin: 0 auto;
			\" href= viewBook.php?id=".$row['id'].">View</a>";
			echo "</td>";
			// end botones

		echo "</tr>";
		} // end foreach
	}else {
		echo "<div class=\"result\">";
		echo "<p>Sorry the is not result that match your search</p";
	}
}
?>
  
</table>
<script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
</body>
</html>

<style type="text/css">
	.result {
		width: 100%;
		text-align: center;
		float: left;
		margin: 0 auto;
		margin-top: 20px;
	}

	.result p {
		color: red;
		font-size: 25px;
	}


<?php 
include ('../resources/footer.php');
?>

