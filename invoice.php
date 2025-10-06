<?php
$pageTitle = "Create Invoice";

include 'functions.php';

ob_start();
?>

<h2>Invoice Form</h2>
<form action="handle-invoice.php" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="album" class="form-label">Select Album</label>
        <select name="album" id="album" class="form-select" required>
            <option value="">Choose an album</option>
            <?php
            $albums = getAlbumList();
            foreach ($albums as $album) {
                echo "<option value=\"$album\">$album</option>";
            }
            ?>
        </select>
    <div class="invalid-feedback">Please choose an album.</div>
    </div>

    <div class="mb-3">
        <label for="format" class="form-label">Select Format</label>
        <select name="format" id="format" class="form-select" required>
            <option value="">Choose a format</option>
            <option value="CD">CD</option>
            <option value="Vinyl">Vinyl</option>
            <option value="Digital">Digital</option>
        </select>
        <div class="invalid-feedback">Please choose a format.</div>
    </div>
    
    <button type="submit" class="btn btn-success">Generate Invoice</button>
</form>

<script>
// Bootstrap validation
(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>

<?php
  // Capture content and include layout
  $pageContents = ob_get_clean();
  include 'template.php';
?>
