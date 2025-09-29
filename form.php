<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Your Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="description" content="This page includes content assisted by AI tools">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Order Your Album</h2>

        <?php
        $albums = [
            "white" => "White",
            "jerky" => "Jerky Boys",
            "1984" => "1984",
            "viva" => "Viva Terlingua",
            "hit" => "Just Lookin for a Hit",
            "abbey" => "Abbey Road"
        ];
        ?>

        <form action="handle-form.php" method="POST" class="p-4 border rounded bg-white shadow-sm">
            <!--Name Input-->
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Album Dropdown -->
            <div class="mb-3">
                <label for="album" class="form-label">Choose An Album</label>
                <select class="form-select" id="album" name="album" required>
                    <?php foreach ($albums as $key => $title): ?>
                        <option value="<?= $key ?>"><?= $title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Quantity Input-->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>

            <!-- Format Selection -->
            <div class="mb-3">
                <label class="form-label">Format</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="cd" value="CD" required>
                    <label class="form-check-label" for="cd">CD</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="download" value="Download" required>
                    <label class="form-check-label" for="download">Download</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Submit Order</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>