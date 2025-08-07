<?php include 'config.php'; include 'header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    if($res && password_verify($password, $res['password'])){
        $_SESSION['user_id'] = $res['id'];
        $_SESSION['is_admin'] = $res['is_admin'];
        header("Location: index.php");
    } else {
        echo "<p class='text-danger'>Invalid login</p>";
    }
}
?>

<h2>Login</h2>
<form method="POST">
  <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
  <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
  <button class="btn btn-success">Login</button>
</form>

<?php include 'footer.php'; ?>
    