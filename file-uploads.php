<?php
//initialize variable
$firstName = $lastName = $email = "";
$errors = [];
$success = false;
$imagePath = "";
$poem = "";
$username = "";
$fullName = "";

//handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //sanitize and trim inputs 
    $firstName = htmlspecialchars(trim($_POST["firstName"] ?? ""));
    $lastName = htmlspecialchars(trim($_POST["lastName"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";

    //validate inputs
    if ($firstName === "") $errors[] = "First name is required.";
    if ($lastName === "") $errors[] = "Last name is required.";
    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!preg_match("/^[^@\s]+@[^@\s]+\.[^@\s]+$/", $email)) {
        $errors[] = "Email is invalid.";
    }
    if ($password === "") $errors[] = "Password is required.";

    //handle file upload
    if (isset($_FILES["profileImage"]) && $_FILES["profileImage"]["error"] === UPLOAD_ERR_OK) {
       $fileTmp = $_FILES["profileImage"]["tmp_name"];
       $fileName = basename($_FILES["profileImage"]["name"]);
       $fileSize = $_FILES["profileImage"]["size"];
       $fileType = mime_content_type($fileTmp);
       $uploadDir = "images/";
       $targetPath = $uploadDir . $fileName;

       if (!str_starts_with($fileType, "image/")) {
        $errors[] = "Only image files are allowed.";
       } elseif ($fileSize > 300000) {
        $errors[] = "Image must be 300KB or less.";
       } elseif (file_exists($targetPath)) {
        $errors[] = "An image with that name already exists.";
       }
    } else {
        $errors[] = "Profile image is required.";
    }

    //if no errors, process and display
    if (empty($errors)) {
        //generate username and full name
        $username = strtolower(substr($firstName, 0, 1) . $lastName);
        $fullName = ucfirst($firstName) . " " . ucfirst($lastName);

        // append to membership.txt
        $entry = "$fullName | $email | $password | $username\n";
        file_put_contents("membership.txt", $entry, FILE_APPEND);

        //move uploaded image
        if (!is_dir($uploadDir)) mkdir($uploadDir);
        move_uploaded_file($fileTmp, $targetPath);
        $imagePath = $targetPath;

        //Load poem.txt
        if (file_exists("poem.txt")) {
            $poem = nl2br(file_get_contents("poem.txt"));
        }
        $success = true;
    }
}
?>

<?php include("template.php"); ?>
<div class="container mt-5">
    <h2 class="mb-4">User Registration</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="card p-4">
            <h4 class="mb-3">Registration Successful</h4>
            <p><strong>Name:</strong> <?= $fullName ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Username:</strong> <?= $username ?></p>
            <img src="<?= $imagePath ?>" alt="Profile Image" class="img-fluid mb-3" style="max-width:300px;">
            <div class="border p-3 bg-light">
                <?= $poem ?>
            </div>
        </div>
    <?php else: ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" class="form-control" value="<?= $firstName ?>">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" class="form-control" value="<?= $lastName ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $email ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="profileImage" class="form-label">Profile Image</label>
                <input type="file" name="profileImage" class="form-control" accept="image/*">
            </div>   
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php endif; ?>
</div>