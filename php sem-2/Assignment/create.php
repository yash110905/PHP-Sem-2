<?php include 'header.php'; ?>
<h2>Add New Subscriber</h2>
<form action="insert.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Interests:</label>
    <textarea name="interests"></textarea><br>

    <button type="submit">Add Subscriber</button>
</form>
<?php include 'footer.php'; ?>
