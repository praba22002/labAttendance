<html>
<head>
    <title>Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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
           <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">ST.JOSEPH COLLEGE (AUTONOMOUS)</font>
           <br>
           <font style="font-size: 15pt; font-family: monospace;">(AFFLIATED TO BHARATHIDASAN UNIVERSITY)</font>
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
<div class="title">
  <font style="font-size: 24pt; font-weight: bold; font-family: monospace;">SJC LAB ATTENDANCE - Student Wise Report</font>
</div>
</div>
<br>
<hr size="1px" color="white" ></hr>
    <form action="" method="post">
        <div>
            <font  style="font-size: 16pt; font-weight: bold; font-family: monospace;">  <input type="text" name="query" placeholder="Enter your search query">     
            <label for="from_date">From:</label>
            <input type="date" name="from_date">
            <label for="to_date">To:</label>
            <input type="date" name="to_date">
            <input class="button" type="submit" name="submit" value="Submit">
            </font>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $query=$_POST['query'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        // Connect to database
          include_once 'db.php';

        $sql = "SELECT student_id, in_time, out_time, date FROM attendance WHERE date BETWEEN '$from_date' AND '$to_date' AND student_id LIKE '%$query%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h1 style='text-align:center; font-family: monospace;'>REPORT ON ATTENDANCE</h1>
            <table style='font-family: monospace; width: 80%' align='center'>
            <tr>
            <th>Student ID</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Date</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>" . $row["student_id"] . "</td>
                <td>" . $row["in_time"] . "</td>
                <td>" . $row["out_time"] . "</td>
                <td>" . $row["date"] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
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
