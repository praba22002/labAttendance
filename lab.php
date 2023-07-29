<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AAC LAB ATTENDANCE</title>
    <link rel="stylesheet" type="text/css" href="back.css">
</head>
<body>
<div align="center">
<form method="post" action="">
    <div class="header" align="center">
        <div class="img">
            <img src="aac-logo.png" width="115" height="122" align="left">
        </div>
        <div class="text">
             <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">ST.JOSEPH COLLEGE(AUTONOMOUS)</font>
             <br>
             <font style="font-size: 15pt;  font-family: monospace;">(AFFILIATED TO BHARATHIDASAN UNIVERSITY)</font>
             <br>
             <font style="font-size: 15pt; font-family: monospace;">TRICHIRAPALLI</font>
             <br>
            <div class="logo" align="right">
               <img src="admin-logo.png" width="47" height="47" align="left">
            </div>
            <div class="topnav">
               <a href="admin.php">ADMIN</a>
            </div>
            <br>
       </div>
    </div>
<br>
<div class="title">
   <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">SJC LAB ATTENDANCE </font>
</div>
<br>
   <hr size="1px" color="white" ></hr>
<br>
<br>
        <div class="student_id">
            <br><br>
            <input class="input" type="text" name="student_id" placeholder="Student ID" required autofocus="true" autocomplete="off">
            <br><br>
            <input class="button" type="submit" name="submit" value="Submit">     
        </div>
        <div class="font">
    <?php

    date_default_timezone_set("Asia/Kolkata");

    if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $current_time = date("H:i:s");
    $current_date = date("Y-m-d");

   
    // Connect to database
    include_once 'db.php';


    $sql = "SELECT * FROM attendance WHERE student_id='$student_id' AND date='$current_date' AND out_time IS NULL";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $sql = "UPDATE attendance SET out_time='$current_time' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<br>$student_id " ,"<br> Check-Out time recorded successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO attendance (student_id, date, in_time)
        VALUES ('$student_id', '$current_date', '$current_time')";

        if (mysqli_query($conn, $sql)) {

            echo "<br>$student_id " ,"<br> Check-In time recorded successfully";
        } else {
            echo "Error adding record: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
</div>
</div>
</form>
</body>
</html>