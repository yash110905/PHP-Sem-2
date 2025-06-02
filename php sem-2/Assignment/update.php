<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM subscribers WHERE id = $id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $interests = htmlspecialchars($_POST['interests']);

    $sql = "UPDATE subscribers SET name=?, email=?, interests=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $interests, $id);
    $stmt->execute();

    header("Location: view.php");
    exit();
}
?>

<h2>Edit Subscriber</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?= $data['name'] ?>" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
    <label>Interests:</label>
    <textarea name="interests"><?= $data['interests'] ?></textarea><br>
    <button type="submit">Update</button>
</form>

<?php include 'footer.php'; ?>
