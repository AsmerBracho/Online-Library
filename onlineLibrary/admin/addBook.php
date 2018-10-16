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
	include("../resources/headeradmin.php");
	// conect to the database
	include("../resources/db_conect.php");

	//variables for errors
	$title="";
	$author="";
	$description="";
	$isbnError="";
	$titleError="";
	$authorError="";
	$descriptionError="";

	if ($_POST) {
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$description = $_POST['description'];

		// clean empty spaces
		$isbn = trim($isbn);
		$title= trim($title);
		$author= trim($author);
		$description= trim($description);
	
		// Validate data 
		if (empty($title)) {
			$titleError = "Please enter a Title";
		}

		if (preg_match('/^\d{10}$/', $isbn)) {
	    $isbnError = "";
	  } else {
	    $isbnError = "ISBN must be a 10 digit number";
	  }

	  if (empty($author)) {
	  	$authorError = "Please enter an Author";
	  }

	  if (empty($description)) {
	  	$descriptionError = "Please enter a Description";
	  }

		if (empty($isbnError) && empty($titleError) && empty($authorError) && empty($descriptionError)) {
			// prepare query
			$sql = "INSERT INTO book (isbn, title, author, description) VALUES (?, ?, ?, ?);";
			$stmt = $DBH->prepare($sql);
			$stmt->bindParam(1, $isbn);
			$stmt->bindParam(2, $title);
			$stmt->bindParam(3, $author);
			$stmt->bindParam(4, $description);
			$stmt->execute();

			echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert('Book Succesfully Added to the Library')
	        window.location.href='index.php';
	        </SCRIPT>");
		}
	}	
?>


<!DOCTYPE html>
<html>
<title>Add New Book</title>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/tableStyle.css">
</head>


<body>
  <div style="margin-top: 100px;"></div>

  <form action="addBook.php" method="post">
    <div class="add-book">

      
      <div id="signup">
        <h1>Add New Book</h1>
        <div class="form-group ">

          <input type="text" class="form-control" name="isbn" placeholder="ISBN">
          <i class="fa fa-credit-card"></i>
          <span class="error"><?php echo $isbnError;?></span>
        </div>
        <div class="form-group log-status">
          <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title; ?>">
          <i class="fa fa-book"></i>
          <span class="error"><?php echo $titleError;?></span>
        </div>
        <div class="form-group log-status">
          <input type="text" class="form-control" name="author" placeholder="Author" value="<?php echo $author; ?>">
          <i class="fa fa-lock"></i>
          <span class="error"><?php echo $authorError;?></span>
        </div>
        <div class="form-group ">
          <textarea id="texta" name="description" class="form-control" cols="60" rows="40">
          	<?php echo $description; ?>
          </textarea>
          
          <i class="fa fa-lock"></i>
          <span class="error"><?php echo $descriptionError;?></span>
        </div>
   
        <button type="submit" name="submit" class="log-btn"  value="Register">Add Book</button>
    
      </div>
    </div><!-- End of login-form -->
  </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>


</html>

<?php 
include ('../resources/footer.php');
?>




