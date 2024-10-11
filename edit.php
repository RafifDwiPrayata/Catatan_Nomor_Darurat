<?php require 'db.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM personal_contacts WHERE id = ?");
$stmt->execute([$id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $stmt = $db->prepare("UPDATE personal_contacts SET name = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $id]);
    header("Location: personal.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Kontak Darurat Pribadi</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <input type="text" name="name" value="<?php echo $contact['name']; ?>" required>
            <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" required>
            <button type="submit" name="submit">Update</button>
        </form>
        <a href="personal.php">Kembali ke Kontak Darurat Pribadi</a>
    </div>
</body>
</html>
