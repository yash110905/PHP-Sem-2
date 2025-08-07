<?php include 'config.php'; include 'header.php'; ?>

<h2>All Items</h2>
<a href="add.php" class="btn btn-primary mb-3">Add New Item</a>

<table class="table table-bordered">
  <tr><th>ID</th><th>Name</th><th>Description</th><th>Image</th><th>Action</th></tr>
  <?php
  $result = $conn->query("SELECT * FROM items");
  while($row = $result->fetch_assoc()):
  ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
    <td>
      <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this?')">Delete</a>
      <?php else: ?>
        <small>Login as admin to edit/delete</small>
      <?php endif; ?>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>
