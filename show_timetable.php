<?php

session_start();

// Check if the timetable exists in the session
if (isset($_SESSION['timetable'])) {
    $timetable = $_SESSION['timetable'];
} else {
    // Redirect to the edit timetable page if the timetable doesn't exist
    header('Location: edittime.php');
    exit;
}

// Display the saved timetable
echo '<h2>Timetable</h2>';
echo '<table border="1">';
echo '<tr><th>Day</th><th>Period 1</th><th>Period 2</th><th>Period 3</th><th>Period 4</th><th>Period 5</th></tr>';

foreach ($timetable as $day => $periods) {
    echo '<tr><td>'.$day.'</td>';
    foreach ($periods as $period => $subject) {
        echo '<td>'.$subject.'</td>';
    }
    echo '</tr>';
}

echo '</table>';

?>