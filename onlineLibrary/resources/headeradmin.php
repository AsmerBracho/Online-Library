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

if (isset($_SESSION["username"]) && !isset($_SESSION["student_id"]))  {
	$log_name = $_SESSION["username"];
	
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../tableStyle.css">
</head>
<body>
	
	<div id="top">
		<h2>Admin Dashboard</h2>
	</div>
	<div id="header">
		<img style="width: 300px; float: left;" src="../images/logo.png" alt="">
		<ul>
			<li><a href="../resources/logout.php">Logout</a></li>
			<span class="headName"><i style="color: #000;" class="fa fa-user"></i> Login as  
			<span style="color: #000; font-weight: bold;"><?php echo $log_name ?></span></span>
		</ul>
	</div>

	<div class="menuAdmin">
		<div class="menu-container">
			<ul>
				<li><i class="fa fa-shopping-cart"></i><a href="index.php">Checkout Books</a></li>
				<li><i class="fa fa-book"></i><a id="algo" href="../admin/allBooks.php">All Books(A-Z)</a></li>
				<li><i class="fa fa-clock-o"></i><a id="algo" href="overDue.php">Overdue Books</a></li>
				<li style="float: right;"><i class="fa fa-plus"></i><a id="algo" href="addBook.php">Add New Book</a></li>
			</ul>
		</div>
	</div>
<br>

</body>
</html>
<?php  
	
}
else {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Permission Denied, Please Login as Admin')
        window.location.href='../resources/logout.php';
        </SCRIPT>");
	 
}
?>