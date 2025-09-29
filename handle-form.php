<?php
//Defined pricing variables
$shipping = 2.99;
$downloadPrice = 9.99;
$cdPrice = 12.99;
$heading = "Cost by Quantity";

// Validate form input
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $albumKey = $_POST["album"] ?? '';
    $quantity = $_POST["quantity"] ?? 0;
    $format = $_POST["format"] ?? '';

    //Album titles for display
    $albums = [
        "white" => "White",
        "jerky" => "Jerky Boys",
        "1984" => "1984",
        "viva" => "Viva Terlingua",
        "hit" => "Just Lookin for a Hit",
        "abbey" => "Abbey Road"
    ];

    //Basic validation
    if (!$name || !$albumKey || !$quantity || !$format) {
        $error = "Please fill out all fields.";
    } else {
        $albumTitle = $albums[$albumKey] ?? 'Unknown Album';
        $total = 0;

        if ($format === "CD"){
            for ($i = 0; $i < $quantity; $i++) {
                $total += $cdPrice;
            }
            $total += $shipping;
        } elseif ($format === "Download") {
            $i = 0;
            while ($i < $quantity) {
                $total += $downloadPrice;
                $i++;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary></title>
    <meta name="description" content="This page includes content assisted by AI tools.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4 text-center"><?= $heading ?></h2>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
      <div class="card p-4 shadow-sm">
        <h4 class="card-title">Thank you, <?= htmlspecialchars($name) ?>!</h4>
        <p class="card-text">You ordered <strong><?= $quantity ?></strong> copy(ies) of <em><?= $albumTitle ?></em> as a <strong><?= $format ?></strong>.</p>
        <p class="card-text">Total Cost: <strong>$<?= number_format($total, 2) ?></strong></p>
      </div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>