<?php include 'config.php'; include 'header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password, is_admin) VALUES (?, ?, 0)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo "<p class='text-success'>User Registered! <a href='login.php'>Login here</a></p>";
}
?>

<h2>Register</h2>
<form method="POST">
  <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-primary">Register</button>
</form>

<?php include 'footer.php'; ?>
