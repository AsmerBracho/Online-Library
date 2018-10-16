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
include("../resources/headeradmin.php");

// conect to the database
include("../resources/db_conect.php");

// prepare query
$stmt = $DBH->prepare("SELECT * FROM book A JOIN checkedout B ON A.id = B.b_id");
$stmt->execute();

//manage any error
// ERROR GOES HERE

// catch the values 
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


// second querry
$q = $DBH->prepare("SELECT * FROM checkedout");
$q->execute();

//manage any error
// ERROR GOES HERE

// catch the values 
$myBooks = $q->rowCount(PDO::FETCH_ASSOC);

//stylles overDue Books
$n = 0; 
$over = "overGood";

foreach($rows as $r){
	$aWeek = $r['date_issue'] + 604800;
				$overDue = $aWeek;
				$fechaHoy = time();
				if ($fechaHoy > $overDue) {
					$n++;
					$over = "overBad";
				} 
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../css/tableStyle.css">
	<title>Home</title>
</head>

<body>

  <div class="title">
  	<h1>Check-Out Books</h1>
  </div>
	<table class="responstable">
  
	 	<?php
					
		echo "<tr>
		<th>Title</th>
		<th>Borrowed By</th>
		<th>Issue Date</th>
		<th>Due Date</th>
		<th>Days Overdue</th>
		<th></th>
		</tr>";
		if (!empty($rows)) {
		
			foreach($rows as $row){
			echo "<tr>";
				echo "<td style= \"width: 30%\">";
				echo $row['title'];
				echo "</td>";
				echo "<td>";
				echo $row['s_student_id'];
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

				echo "<td>";
				echo "<a style= \"background: #0AC986; padding: 10px; color: #fff; text-decoration:none; 
				-moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; margin: 0 auto;
				\" href= checkIn.php?id=".$row['id'].">CheckIn</a>";
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
