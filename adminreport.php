<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SEARCH REPORT</title>
  <style>
.topbar {
  background-color: #04AA6D;
  border-radius: 6px;
  width: 230px;
  height: 45px;
  top: 300px;
  right: 600px;
  font-family: monospace;
}

.topbar a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 40px;
  text-decoration: none;
  font-size: 17px;
}

.topbar a:hover {
  text-align: left;
  background-color: #ddd;
  border-radius: 6px;
  height: 30px;
  width: 155px;
  color: black;
}
  </style>
  <link rel="stylesheet" type="text/css" href="back.css">
</head>
<body>

<form method="post">

  <div class="header" align="center">
        <div class="img">
          <img src="aac-logo.png" width="115" height="122" align="left">
        </div>
        <div class="text">
          <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">ST.JOSEPHS COLLEGE</font>
          <br>
          <font style="font-size: 15pt;  font-family: monospace;">BHARATHIDASAN UNIVERSITY</font>
          <br>
          <font style="font-size: 15pt; font-family: monospace;">TRICHIRAPALLI</font>
          <br>
        </div>
  </div>

  <br>
<div class="title" align="center">
   <font style="font-size: 24pt; font-weight: bold; font-family: monospace;" >SEARCH REPORT </font>
</div>

<br>
  <hr size="1px" color="white" ></hr>
<br>
  <div align="center">
        <div class="topbar">
          <a href="student_wise_report.php">Student ID-wise</a>
        </div>
        <br>
        <div class="topbar">
          <a href="dept_wise_report.php">Department-wise</a>
        </div>
        <br>
        <div class="topbar">
          <a href="date_wise_report.php">Date-wise</a>
        </div>
        <br>
        <div class="topbar">
          <a href="hour_wise_report.php">Hour-wise</a>
       </div> 
   </div>   
</form> 
</body>
</html>
