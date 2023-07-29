<html>
<head>
<title>Hour wise Records</title>
<link rel="stylesheet" type="text/css" href="back.css">
<style>
    .button{
    background-color:#01579b ;
    border-radius: 20px;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
            font-size: 30px;
        }
        td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
            font-size: 20px;
        }
        tr:nth-child(even) {
            background-color: #FFFFFF;
        }
        tr:nth-child(odd) {
            background-color: #D4D4D4;
        }
    </style>
</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">

	<div class="header" align="center">
        <div class="img">
        <img src="C:\Users\DELL\Desktop\logo.jpg" width="115" height="122" align="left">
        </div>
        <div class="text">
        <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">ST.JOSEPH COLLEGE</font>
        <br>
        <font style="font-size: 15pt;  font-family: monospace;">BHARATHIDASAN UNIVERSITY</font>
        <br>
        <font style="font-size: 15pt; font-family: monospace;">TRICHIRAPALLI</font>
        <br>
       </div>
       <div class="logout" align="right">
        <img src="logout.png" width="33" height="32" align="left">
        </div>
        <div class="topnav">
        <a href="logout.php">Logout</a>

        </div>
        <br>
  </div>

  <br>
<div class="title" align="center">
<font style="font-size: 24pt; font-weight: bold; font-family: monospace;" >SJC LAB ATTENDANCE - Hour Wise Report </font>
</div>

<br>

  <hr size="1px" color="white" ></hr>
  <br>
  From: <input type="date" name="from_date" />
  To:<input type="date" name="to_date">
  In Time: <input type="time" name="in_time" />
  Out Time: <input type="time" name="out_time" />
  
  <input class="button" type="Submit" name="submit" value="Filter Records" />
</form>
<?php
	if (isset($_POST['submit'])) {

     $from_date = $_POST['from_date'];
     $to_date = $_POST['to_date'];

	$in_time = $_POST['in_time'];
	$out_time = $_POST['out_time'];

	include_once 'db.php';
	
	$sql = "SELECT * FROM attendance WHERE date BETWEEN '$from_date' AND '$to_date' AND in_time BETWEEN '$in_time' AND '$out_time'";

	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
	echo "<table border='1' align='center'>
			<tr>
				<th>Student ID</th>
				<th>Date</th>
				<th>In Time</th>
				<th>Out Time</th>
			</tr>";
	
while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['student_id'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row['in_time'] . "</td>";
		echo "<td>" . $row['out_time'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}else {
            echo "<h1 style='text-align:center; font-family: monospace;'>No records found...!</h1>";
        }
	
	mysqli_close($conn);
}
?>
<br>
    <div align="center">
        <button class="button" onclick="window.print()">Print</button>
    </div>
</body>
</html>
