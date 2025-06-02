<?php
include 'db.php';
include 'header.php';

$sql = "SELECT * FROM subscribers ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>All Subscribers</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>Name:</strong> " . $row['name'] . "<br>";
        echo "<strong>Email:</strong> " . $row['email'] . "<br>";
        echo "<strong>Interests:</strong> " . $row['interests'] . "<br>";
        echo "<a href='update.php?id={$row['id']}'>Edit</a> | ";
        echo "<a href='delete.php?id={$row['id']}' onclick='return confirm(\"Delete this record?\")'>Delete</a>";
        echo "</div><hr>";
    }
} else {
    echo "No subscribers found.";
}

include 'footer.php';
?>
