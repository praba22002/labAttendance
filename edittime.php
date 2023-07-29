<?php

$daysOfWeek = ['A', 'B', 'C', 'D', 'E' ,'F'];
$subjects = ['A', 'B', 'C', 'D', 'E', 'F'];
$periods = ['1', '2', '3', '4', '5'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process and save the edited timetable
    $editedTimetable = $_POST['timetable'];

    // Save the timetable to a file or database, or perform any other desired operation
    // For demonstration purposes, we'll just store it in a session variable
    session_start();
    $_SESSION['timetable'] = $editedTimetable;

    // Redirect to the show timetable page
    header('Location: show_timetable.php');
    exit;
}

// Check if the timetable exists in the session
if (isset($_SESSION['timetable'])) {
    $timetable = $_SESSION['timetable'];
} else {
    // Generate a random timetable if the session timetable doesn't exist
    $timetable = array();

    foreach ($daysOfWeek as $day) {
        foreach ($periods as $period) {
            $subjectIndex = array_rand($subjects);
            $subject = $subjects[$subjectIndex];
            $timetable[$day][$period] = $subject;
        }
    }
}

// Display the form to edit and save the timetable
echo '<h2>Edit Timetable</h2>';
echo '<form method="POST">';
echo '<table border="1">';
echo '<tr><th>Day</th><th>Period 1</th><th>Period 2</th><th>Period 3</th><th>Period 4</th><th>Period 5</th></tr>';

foreach ($daysOfWeek as $day) {
    echo '<tr><td>'.$day.'</td>';
    foreach ($periods as $period) {
        $subject = $timetable[$day][$period];
        echo '<td><input type="text" name="timetable['.$day.']['.$period.']" value="'.$subject.'" /></td>';
    }
    echo '</tr>';
}

echo '</table>';
echo '<br>';
echo '<input type="submit" value="Save Timetable">';
echo '</form>';

?>