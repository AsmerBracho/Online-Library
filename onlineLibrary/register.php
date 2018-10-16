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
//------------------------------------ ----------- 
// create variable to print the errors if any
$studentIdError = "";
$usernameError = "";
$passwordError = "";
$confirmPassError = "";

//create variables to help the usser keeping values
$student_id = "";
$username = "";


if($_POST){
  $student_id = $_POST['studentId'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confPassword = $_POST['confPassword'];

  // clean blank spaces (start and end)
  $username = trim($username);
  $student_id = trim($student_id);
  $password = trim($password);
  $confPassword = trim($confPassword);
  
  //-------------------- Validate data ---------------------------------
  if (empty($username) || strlen($username) < 4 ) { 
    $usernameError = "Username must contain at least 4 characters";
  }

  // only allow numbers and exactly 7 digits
  if (preg_match('/^\d{7}$/', $student_id)) {
    $studentIdError = "";
  } else {
    $studentIdError = "Student ID must be a 7 digit number";
  }

  if (strlen($password) < 6 || strlen($password) > 10) {
    $passwordError = "Password must contain between 6 and 10 characters";
  }

  if ($password!= $confPassword) {
    $confirmPassError = "Password does not match";  
  }
  //------------------- End of Validation ------------------------------

  if (empty($usernameError) and empty($studentIdError) and empty($passwordError) and empty($confirmPassError)) {
  
  // conect to database
    try {
      $host = '127.0.0.1';
      $dbname = 'web_assignment';
      $user = 'root';
      $pass = '';
      $port=3306;

      // MySQL with PDO_MYSQL
      $DBH = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
      $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //check if the usser already exist
      $q = $DBH->prepare("SELECT * FROM student WHERE username = :username LIMIT 1");
      $q->bindValue(':username', $username);
      $q->execute();
      
      $row = $q->fetch(PDO::FETCH_ASSOC);
            
      if (!empty($row)){ //if the array is not empty
        $usernameError = "Username taken, choose another username";
      }

      //check if the Student Id already exist
      $q2 = $DBH->prepare("SELECT * FROM student WHERE student_id = :student_id LIMIT 1");
      $q2->bindValue(':student_id', $student_id);
      $q2->execute();
      
      $row = $q2->fetch(PDO::FETCH_ASSOC);
            
      if (!empty($row)){ //if the array is not empty
        $studentIdError = "this Student ID is already registered";
      }

      // Everything OK?
      if (empty($usernameError) and empty($studentIdError) and empty($passwordError) and empty($confirmPassError)) {
      
        // encript the password
        // first i will at a salt
        $pSalt = "P4RaNGu4r!" . $password . "cUt!r!mI"; 

        // Hash the password before send it to the database
        $pHash = md5($pSalt);

        //-------------------Register in the data base--------------------------------

        $sql = "INSERT INTO student (student_id, username, password) VALUES (?, ?, ?);";
        $sth = $DBH->prepare($sql);
        $sth->bindParam(1, $student_id);
        $sth->bindParam(2, $username);
        $sth->bindParam(3, $pHash);
        $sth->execute();

        $_SESSION["username"] = $username;
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='index.php';
        </SCRIPT>");

        exit();
      }  
    } catch(PDOException $e) {echo $e->getMessage();}
  }   
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Library</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div style="margin-top: 100px;"></div>
  <form action="register.php" method="post">
    <div class="login-form">

      <ul class="tab-group">
        <li class="tab"><a href="index.php">Log In</a></li>
        <li class="tab active"><a href="#">Register</a></li>
      </ul>

      <div id="signup">
        <h1>Register</h1>
        <div class="form-group ">
          <input type="text" class="form-control" name="studentId" placeholder="Student Number" value="<?php echo $student_id; ?>">
          <i class="fa fa-credit-card"></i>
          <span class="error"><?php echo $studentIdError;?></span>
        </div>
        <div class="form-group log-status">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
          <i class="fa fa-user"></i>
          <span class="error"><?php echo $usernameError;?></span>
        </div>
        <div class="form-group log-status">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <i class="fa fa-lock"></i>
          <span class="error"><?php echo $passwordError;?></span>
        </div>
        <div class="form-group log-status">
          <input type="password" class="form-control" name="confPassword" placeholder="Confirm Password">
          <i class="fa fa-lock"></i>
          <span class="error"><?php echo $confirmPassError;?></span>
        </div>
        <div class="g-recaptcha" data-sitekey="6LdXBzgUAAAAAB6pkj3WlnOG0kAdaqOZk3a6x_IM" data-callback="recaptchaCallback"
        style="transform:scale(0.96);-webkit-transform:scale(0.96);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
        
        <!-- captcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script><br>
        <script type="text/javascript">
          function callValidation(){
            if(grecaptcha.getResponse().length == 0){
              alert('Please click the reCAPTCHA checkbox');
              return false;
            }
          return true;
          }
        </script>
        
        <button type="submit" name="submit" class="log-btn"  value="login" onclick="return callValidation();" >Register</button>
    
      </div>
    </div><!-- End of login-form -->
  </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>