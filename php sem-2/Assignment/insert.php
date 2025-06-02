<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $interests = htmlspecialchars($_POST['interests']);

    $sql = "INSERT INTO subscribers (name, email, interests) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $interests);

    if ($stmt->execute()) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
