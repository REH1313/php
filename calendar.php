<?php
// calendar.php
include 'template.php';

// Default to current date/time unless form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDate = $_POST['date'] ?? date('Y-m-d');
    $selectedTime = $_POST['time'] ?? date('H:i');
    $timestamp = strtotime("$selectedDate $selectedTime");
} else 