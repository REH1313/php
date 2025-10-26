<?php
// calendar.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'template.php';

// Default to current date/time unless form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDate = $_POST['date'] ?? date('Y-m-d');
    $selectedTime = $_POST['time'] ?? date('H:i');
    $timestamp = strtotime("$selectedDate $selectedTime");
} else {
    $timestamp = time();
}

$dateString = date('l, F j, Y', $timestamp);
$timeString = date('g:i A', $timestamp);

// Time of day greeting
$hour = (int)date('H', $timestamp);
if ($hour >= 5 && $hour < 12) {
    $greeting = 'Good morning!';
    $timeImage = 'morning.jpg';
} elseif ($hour >= 12 && $hour < 17) {
    $greeting = 'Good afternoon!';
    $timeImage = 'afternoon.jpg';
} elseif ($hour >= 17 && $hour < 21) {
    $greeting = 'Good evening!';
    $timeImage = 'evening.jpg';
} else {
    $greeting = 'Good night!';
    $timeImage = 'night.jpg';
}

// Semester logic (Dallas College)
$month = (int)date('n', $timestamp);
if ($month >= 1 && $month <= 4) {
    $semester = 'Spring Semester';
    $seasonImage = 'spring.jpg';
} elseif ($month >= 5 && $month <= 8) {
    $semester = 'Summer Semester';
    $seasonImage = 'summer.jpg';
} else {
    $semester = 'Fall Semester';
    $seasonImage = 'fall.jpg';
}

//Holiday countdown (example: December 25th)
$holidayName = 'Christmas';
$holidayDate = date('Y') . '-12-25';
$holidayTimestamp = strtotime($holidayDate);
$daysUntilHoliday = ceil(($holidayTimestamp - $timestamp) / 86400);
if ($daysUntilHoliday === 0) {
    $holidayMessage = "Happy $holidayName!";
} else {
    $holidayMessage = "$daysUntilHoliday day(s) until $holidayName.";
}
?>

<div class="container mt-5">
    <h1 class="mb-4">Dynamic Calendar</h1>
    <p class="lead">Today is <?= $dateString ?>. The time is <?= $timeString ?>.</p>
    <div class="mb-4">
        <h2><?= $greeting ?></h2>
        <img src="<?= $timeImage ?>" alt="Time of day image" class="img-fluid rounded">
    </div>

    <div class="mb-4">
        <h3><?= $semester ?></h3>
        <img src="<?= $seasonImage ?>" alt="Seasonal image" class="img-fluid rounded">
    </div>

    <div class="mb-4">
        <h4><?= $holidayMessage ?></h4>
    </div>

    <form method="post" class="mb-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="date" class="form-label">Select Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="time" class="form-label">Select Time:</label>
                <input type="time" id="time" name="time" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

$pageContents = ob_get_clean();
include 'template.php';