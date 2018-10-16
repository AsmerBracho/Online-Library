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
include("../resources/header.php");

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


// second querry
$q = $DBH->prepare("SELECT * FROM checkedout  WHERE s_student_id = $studentId");
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
	<link rel="stylesheet" href="../css/myBookStyle.css">
	<title>Home</title>
</head>

<body>

	<div id="space"></div>
	<div id="over-due">
		<div class="<?php echo $over?>">
			<p class="nDays" style="float: right;"><?php echo $n ?></p>
			<img width="250px" src="../images/overdue.png" alt="">

		</div>
		<br>
		<div class="blue">
			<p class="nDays" style="float: right;"><?php echo $myBooks; ?></p>
			<img width="250px" src="../images/my.png" alt="">
		</div>
	</div>

  	<div class="title">
  		<h1>My Books</h1>
  		<a href="myBooks.php">Manage my Books</a>
  	</div>
	<table class="responstable">
  
	  	<?php
					
		echo "<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Issue Date</th>
		<th>Due Date</th>
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
