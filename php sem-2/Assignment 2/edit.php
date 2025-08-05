<?php include 'config.php'; 
if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){ header("Location: login.php"); exit; }
include 'header.php';

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM items WHERE id=$id");
$item = $res->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $img = $item['image'];
    if(!empty($_FILES['image']['name'])){
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$img);
    }
    $stmt = $conn->prepare("UPDATE items SET name=?, description=?, image=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $desc, $img, $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<h2>Edit Item</h2>
<form method="POST" enctype="multipart/form-data">
  <input type="text" name="name" value="<?= $item['name'] ?>" class="form-control mb-2" required>
  <textarea name="description" class="form-control mb-2" required><?= $item['description'] ?></textarea>
  <input type="file" name="image" class="form-control mb-2">
  <button class="btn btn-primary">Update</button>
</form>

<?php include 'footer.php'; ?>
