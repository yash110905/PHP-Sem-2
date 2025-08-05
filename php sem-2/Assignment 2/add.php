<?php
include 'config.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);

    // Handle image upload safely
    $img = $_FILES['image']['name'];
    $target = "uploads/" . basename($img);

    if (!empty($img) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // If user is not logged in, set created_by to 0
        $created_by = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $stmt = $conn->prepare("INSERT INTO items (name, description, image, created_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $desc, $img, $created_by);
        $stmt->execute();

        header("Location: index.php");
        exit();
    } else {
        echo "<p class='text-danger'>Error uploading file. Make sure uploads/ is writable.</p>";
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
