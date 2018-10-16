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

	// prepare query
	$stmt = $DBH->prepare("SELECT * FROM book ORDER BY title ASC");
	$stmt->execute();

	//manage any error
	// ERROR GOES HERE

	// catch the values 
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<title>Books (A-Z)</title>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/tableStyle.css">
</head>

<body>
  <h1>Books Library (A-Z)</h1>

<table class="responstable">
  
  <?php
				
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

?>
  
</table>
<script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
</body>
</html>

<?php 
include ('../resources/footer.php');
?>




