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
include ("../resources/header.php");

$studentId = $_SESSION["student_id"];
// conect to the database
include("../resources/db_conect.php");

// prepare query
$stmt = $DBH->prepare("SELECT * FROM book A JOIN checkedout B ON A.id = B.b_id WHERE B.s_student_id = $studentId");
$stmt->execute();

//manage any error
// ERROR GOES HERE

// catch the values 
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<title>My Books</title>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/tableStyle.css">
</head>

<body>
  <h1>My Books</h1>
	<table class="responstable">
  
	  	<?php
					
		echo "<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Issue Date</th>
		<th>Due Date</th>
		<th>Days OverDue</th>
		</tr>";
		if (!empty($rows)) {
		
			foreach($rows as $row){
			echo "<tr>";
				echo "<td style= \"width: 30%\">";
				echo $row['title'];
				echo "</td>";
				echo "<td>";
				echo $row['author'];
				echo "</td>";

				echo "<td style= \"display: table-cell; text-align: center; width: 10%\">";
				$issue = $row['date_issue'];
				echo date('d-m-y', $issue);
				echo "</td>";

				echo "<td style= \"display: table-cell; color: red; text-align: center; width: 10%\">";
				$aWeek = $row['date_issue'] + 604800;
				echo date('d-m-y', $aWeek);
				echo "</td>";

				echo "<td style= \"display: table-cell; color: red; font-weight: bold; text-align: center; width: 10%\">";
				$aWeek = $row['date_issue'] + 604800;
				$overDue = $aWeek;
				$fechaHoy = time();
				if ($fechaHoy > $overDue) {
					echo round(($fechaHoy - $overDue)/86400);
				} else {
					
				}
				echo "</td>";

			echo "</tr>";
			} // end foreach
		}
		?>
</table>
</body>
</html>

<?php 
include ('../resources/footer.php');
?>
