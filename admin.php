<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADMIN</title>
  <link rel="stylesheet" type="text/css" href="back.css">
</head>
<body>

<form method="post">

  <div class="header" align="center">
        <div class="img">
         <img src="C:\Users\DELL\Desktop\logo.jpg" width="115" height="122" align="left">
        </div>
        <div class="text">
          <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">ST. JOSEPH COLLEGE (AUTONOMOUS)</font>
          <br>
          <font style="font-size: 15pt;  font-family: monospace;">(AFFILIATED TO BHARATHIDASAN  UNIVERSITY)</font>
          <br>
          <font style="font-size: 15pt; font-family: monospace;">TRICHIRAPALLI-60002</font>
          <br>
       </div>
  </div>
  <br>
  <div class="title" align="center">
    <font style="font-size: 24pt; font-weight: bold; font-family: monospace;" >ADMIN LOGIN</font>
   </div>
  <br>
  <hr size="1px" color="white" ></hr>
  <br>
  <div align="center">
    <div class="student_id" align="center">
    <br>
    <table cellpadding="3px"> 
      <tr>
        <td><label style="font-size: 14pt; font-weight: bold; font-family: monospace;">Admin</label></td>
        <td><input class="box" type="text" name="username"><br></td>
      </tr>
      <tr>
        <td><label style="font-size: 14pt; font-weight: bold; font-family: monospace;">Password</label></td>
        <td><input class="box" type="password" name="password"><br></td>
      </tr>
    </table>
    <input class="button" type="submit" name="submit" value="Submit">
    </div>
  </div>
</form> 
<br>
<div class="font" align="center" >
      <?php
        if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connect to database

        include_once 'db.php';

        // Check if username and password are correct
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
        // Login success
        header("Location: adminreport.php");
        } else {
        // Login failed
        echo "<br><br>Username or password is incorrect.";
        }
      }
     ?>
</div>
</body>
</html>
