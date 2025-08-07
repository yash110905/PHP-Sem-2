<?php
session_start();
include 'config.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);

    // Handle image upload
    $img = $_FILES['image']['name'];
    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
    $target = $uploadDir . basename($img);

    // Create uploads directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move uploaded file to uploads directory
    if (!empty($img) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Assign user id safely for bind_param
        $created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        // Prepare and execute the insert query
        $stmt = $conn->prepare("INSERT INTO items (name, description, image, created_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $desc, $img, $created_by);
        $stmt->execute();

        // Redirect after success
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='text-danger'>Error uploading file. Please ensure the 'uploads' folder exists and is writable.</p>";
    }
}
?>

<h2>Add New Item</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" class="form-control mb-2" placeholder="Item Name" required>
  <textarea name="description" class="form-control mb-2" placeholder="Description" required></textarea>
  <input type="file" name="image" class="form-control mb-2" required>
  <button class="btn btn-success">Save</button>
</form>

<?php include 'footer.php'; ?>
