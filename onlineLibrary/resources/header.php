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
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["student_id"]))  {
	$log_name = $_SESSION["username"];
	$studentId = $_SESSION["student_id"];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../tableStyle.css">
</head>
<body>
	
	<div id="header">
		<img style="width: 300px; float: left;" src="../images/logo.png" alt="">
		<ul>
			<li><a href="../resources/logout.php">Logout</a></li>
			<span class="headName"><i style="color: #000;" class="fa fa-user"></i> Login as  
			<span style="color: #000; font-weight: bold;"><?php echo $log_name ?></span></span>
		</ul>
	</div>

	<div class="menu">
		<div class="menu-container">
			<ul>
				<li><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li><i class="fa fa-book"></i><a id="algo" href="../student/allBooks.php">All Books(A-Z)</a></li>
				<li><i class="fa fa-shopping-cart"></i><a id="algo" href="myBooks.php">My Books</a></li>
			</ul>
		</div>
	</div>
<br>

<div style="padding: 10px;">
<form action="searchBook.php" method="post" style="float: right; margin: 20px 20px">
	<input type="text" name="search" placeholder="Search for Books">
	<input type="submit" value="Search" >
</form>
</div>

</body>
</html>
<?php  
	
}
else {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Permission Denied, Please Login as Student')
        window.location.href='../resources/logout.php';
        </SCRIPT>");
	 
}
?>