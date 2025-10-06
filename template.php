<?php
if (!isset($pageTitle)) {
    $pageTitle = "CodeStream Solutions";
}
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="This page includes content assisted by AI tools.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Header -->
 <header class="bg-dark text-white p-3 mb-4">
    <div class="container">
        <h1 class="h3">CodeStream Solutions</h1>
    </div>
 </header>   

<!-- Navigation --> 
 <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Invoice App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="invoice.php">Invoice Form</a></li>
                <li class="nav-item"><a class="nav-link" href="handle-invoice.php">Invoice Results</a></li>
            </ul>
        </div>
    </div>
 </nav>

<!-- Main Content -->
 <main class="container mb-5">
    <?php
    if (isset($pageContents)) {
        echo $pageContents;
    } else {
        echo "<p>No content available.</p>";
    }
    ?>
</main>

<!-- Footer --> 
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <small>&copy; 2025 CodeStream Solutions. All rights reserved.</small>
    </div>
</footer>

</body>
</html>
<?php
ob_end_flush();
?>
