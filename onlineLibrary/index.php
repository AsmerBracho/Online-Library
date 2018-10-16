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
//-------------------Start Session PHP-----------------
session_start();

if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $mess="";

    //hash the password to been able to mach it in the database
    //first the SALT
    $pSalt = "P4RaNGu4r!" . $password . "cUt!r!mI"; 

    // and then the hash
    $password = md5($pSalt);

  try {
    $host = '127.0.0.1';
    $dbname = 'web_assignment';
    $user = 'root';
    $pass = '';
    $port=3306;

    // MySQL with PDO_MYSQL
    $DBH = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($type == "student") {
      $q = $DBH->prepare("SELECT * FROM student WHERE username = :username and password = :password LIMIT 1");
      $q->bindValue(':username', $username);
      $q->bindValue(':password', $password);
      $q->execute();
      
      $row = $q->fetch(PDO::FETCH_ASSOC);
      
      // create a message to be display
      $message = '';
      if (!empty($row)){ //if the array is not empty
        $username = $row['username'];
        $studentId = $row['student_id'];
        $_SESSION["username"] = $username;
        $_SESSION["student_id"] = $studentId;
        header('Location:  student/index.php');
        exit();
      } else {
        $message = 'Sorry your log in details are incorrect';
      }
    } else if ($type == "admin") {
      $q = $DBH->prepare("SELECT * FROM admin WHERE username = :username and password = :password LIMIT 1");
      $q->bindValue(':username', $username);
      $q->bindValue(':password', $password);
      $q->execute();
      
      $row = $q->fetch(PDO::FETCH_ASSOC);
      
      // create a message to be display
      $message = '';
      if (!empty($row)){ //if the array is empty
        $username = $row['username'];
        $_SESSION["username"] = $username;
        
        header('Location:  admin/index.php');
      exit();
      } else {
        $message = 'Sorry your log in details are not correct';
      }
    }
  } catch(PDOException $e) {echo $e->getMessage();}
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

  <form action="index.php" method="post">
    <div class="login-form">

      <ul class="tab-group">
        <li class="tab active"><a href="#">Log In</a></li>
        <li class="tab"><a href="register.php">Register</a></li>
      </ul>

      <div id="login">
        <h1>Login</h1>
        <div class="form-group ">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <i class="fa fa-user"></i>
        </div>
        <div class="form-group log-status">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <i class="fa fa-lock"></i>
        </div>
        <span class = "error">
          <?php
          if(!empty($message)){
          echo $message;
          }
        ?>
        </span>
        <div class="radioB">
          <label class="radio inline"> 
            <input type="radio" name="type" value="student" checked>
            <span> Student </span> 
          </label>
          <label class="radio inline"> 
            <input type="radio" name="type" value="admin">
            <span> Admin </span> 
          </label>
        </div>
        <a class="link" href="#">Lost your Password?</a>
        <button type="submit" class="log-btn" >Log in</button>
      </div><!-- End of login -->
    </div><!-- End of login-form -->
  </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
</body>
</html>
