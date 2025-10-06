<?php
$pageTitle = "Invoice Summary";
include 'functions.php';

ob_start();

$album = isset($_POST['album']) ? htmlspecialchars($_POST['album']) : '';
$format = isset($_POST['format']) ? htmlspecialchars($_POST['format']) : '';
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

if ($album && $format && $quantity > 0) {
    $total = priceCalc($format, $quantity);

    echo "<h2>Invoice Summary</h2>";
    echo "<ul class='list-group mb-4'>";
    echo "<li class='list-group-item'><strong>Album:</strong> $album</li>";
    echo "<li class='list-group-item'><strong>Format:</strong> $format</li>";
    echo "<li class='list-group-item'><strong>Quantity:</strong> $quantity</li>";
    echo "<li class='list-group-item'><strong>Total Price:</strong> $" . number_format($total, 2) . "</li>";
    echo "</ul>";
    echo "<a href='invoice.php' class='btn btn-primary'>Create Another Invoice</a>";
    } else {
        echo "<div class='alert alert-danger'>Please fill out all fields correctly.</div>";
        echo "<a href='invoice.php' class='btn btn-warning'>Go Back</a>";
    }

$pageContents = ob_get_clean();
include 'template.php';
?>

