<?php 
 $conn = mysqli_connect('localhost', 'root', '', 'attendance');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>