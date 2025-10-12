<?php
$pageTitle = "Form Validation";

//Variables
$name = $email = $instrument = $activity = "";
$animals = [];
$errors = [];
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $instrument = $_POST["instrument"] ?? "";
    $activity = $_POST["activity"] ?? "";
    $animals = $_POST["animals"] ?? [];

    //Validate name
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    } else {
        $name = ucwords(strtolower($name));
    }

    //Validate email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    //validate instrument
    if (empty($instrument)) {
        $errors['instrument'] = "Please select an instrument."; 
    }

    //validate animals
    if (count($animals) !== 2) {
        $errors['animals'] = "Please select exactly two favorite animals.";
    }
    
    //validate activity
    if (empty($activity)) {
        $errors['activity'] = "Please select a favorite activity.";
    }

    //if no errors, display result block
    if (empty($errors)) {
        $output .= '<div class="alert alert-success">';
        $output .= "<h4>Welcome {$name}!</h4>";
        $output .= "<p>Your email is {$email}.</p>";
        $output .= "<p>Your favorite musical instrument is {$instrument}.</p>";
        $output .= "<p>Your favorite animals are " . htmlspecialchars($animals[0]) . " and " . htmlspecialchars($animals[1]) . ".</p>";
        $output .= "<p>Your favorite activity is {$activity}. </p>";
        $output .= "</div>";
        $output .= "<pre>" . print_r($_POST, true) . "</pre>";
    }
}
ob_start();
?>

<h1 class="mb-4">Favorite Things Form</h1>
<?php if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($errors)): ?>
<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation">

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $name ?>">
        <?php if (isset($errors['name'])): ?>
            <div class="alert alert-danger mt-2"><?= $errors['name'] ?></div>
        <?php endif; ?>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>">
        <?php if (isset($errors['email'])): ?>
            <div class="alert alert-danger mt-2"><?= $errors['email'] ?></div>
        <?php endif; ?>
    </div>

    <!--Instrument-->
    <div class="mb-3">
        <label class="form-label">Favorite Instrument:</label><br>
        <?php
        $instrument = ["trumpet", "guitar", "harmonica", "piano", "drums"];
        foreach ($instrument as $item):
        ?>
        <div class="form-check form-check-incline">
            <input class="form-check-input" type="radio" name="instrument" value="<?= $item ?>"
            <?= ($instrument === $item) ? "checked" : "" ?>>
            <label class="form-check-label"><?= ucfirst($item) ?></label>
        </div>
        <?php endforeach; ?>
        <?php if (isset($errors['instrument'])): ?>
            <div class="alert alert-danger mt-2"><?= $errors['instrument'] ?></div>
        <?php endif; ?>
    </div>


    <!--Animals--> 
    <div class="mb-3">
        <label class="form-label">Favorite Animals (choose 2):</label><br>
        <?php
        $animalOptions = ["horses", "dogs", "cats", "chickens", "hamsters"];
        foreach ($animalOptions as $animal):
        ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="animals[]" value="<?= $animal ?>"
            <?= in_array($animal, $animals) ? "checked" : "" ?>>
            <label class="form-check-label"><?= ucfirst($animal) ?></label>
        </div>
        <?php endforeach; ?>
        <?php if (isset($errors['animals'])): ?>
            <div class="alert alert-danger mt-2"><?= $errors['animals'] ?></div>
        <?php endif; ?>
    </div>

    <!--Activity-->
    <div class="mb-3">
        <label for="activity" class="form-label">Favorite Activity:</label>
        <select name="activity" id="activity" class="form-select">
            <option value="">-- Select an activity --</option>
            <?php
            $activities = ["drawing", "soccer", "cards", "baseball", "skating"];
            foreach ($activities as $act):
            ?>
            <option value="<?= $act ?>" <?= ($activity === $act) ? "selected" : "" ?>>
                <?= ucfirst($act) ?>
            </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errors['activity'])): ?>
             <div class="alert alert-danger mt-2"><?= $errors['activity'] ?></div>
        <?php endif; ?>    
    </div>
    
    <!--Submit-->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php endif; ?>

<?= $output ?>

<?php
$pageContents = ob_get_clean();
include 'template.php';
?>    