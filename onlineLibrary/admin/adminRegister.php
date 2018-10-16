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

if($_POST){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confPassword = $_POST['confPassword'];
  
  //-------------------- Validate data ---------------------------------

  if ($password!= $confPassword) {
    $confirmPassError = "Password does not match";  
  }
  //------------------- End of Validation ------------------------------

  if (empty($confirmPassError)) {
  
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

      // encript the password
      // first i will at a salt
        $pSalt = "P4RaNGu4r!" . $password . "cUt!r!mI"; 

        // Hash the password before send it to the database
        $pHash = md5($pSalt);

        //-------------------Register in the data base--------------------------------

        $sql = "INSERT INTO admin (username, password) VALUES (?, ?);";
        $sth = $DBH->prepare($sql);
        $sth->bindParam(1, $username);
        $sth->bindParam(2, $pHash);
        $sth->execute();

        $_SESSION["username"] = $username;
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='../index.php';
        </SCRIPT>");
        exit();
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
  
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <form action="adminRegister.php" method="post">
    <div class="login-form">

      <div id="signup">
        <h1>Admin Register</h1>
        
        <div class="form-group log-status">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <i class="fa fa-user"></i>
          
        </div>
        <div class="form-group log-status">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <i class="fa fa-lock"></i>
          
        </div>
        <div class="form-group log-status">
          <input type="password" class="form-control" name="confPassword" placeholder="Confirm Password">
          <i class="fa fa-lock"></i>
          
        </div>
        
        
        <button type="submit" name="submit" class="log-btn" value="login" >Register</button>
    
      </div>
    </div><!-- End of login-form -->
  </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>