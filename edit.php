<?php
include_once 'db.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $info = $_POST['info'];

// checking empty fields
    if (!empty($name) && !empty($phone) && !empty($info)) {
        $sql = "UPDATE `dbname` SET name=:name, phone=:phone, info=:info WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':phone', $phone);
        $query->bindparam(':info', $info);
        $query->execute();
        header('Location:/forum');


    } else {
        if (empty($name)) {
            echo "<p style='color: red' >Name field is empty.</p><br/>";
        }

        if (empty($phone)) {
            echo "<p style='color: red' >Age field is empty.</p><br/>";
        }

        if (empty($info)) {
            echo "<p style='color: red' >Info field is empty.</p><br/>";
        }

    }
}
?>
<?php
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM dbname WHERE `id` = :id ");
$stmt->execute(['id'=>$id]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $name = $row['name'];
    $phone = $row['phone'];
    $info = $row['info'];
}
    ?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Mobile</title>
</head>
<body>
<h2>My contact list</h2>

<form action="edit.php?id=<?=$id?>" method="post">
    <div>
        <b>Name:</b><br>
        <input name="name" value="<?= $name ?>">
    </div>
    <div>
        <b>Phone number:</b><br>
        <input name="phone" value="<?= $phone ?>">
    </div>
    <div>
        <b>Additional info:</b><br>
        <textarea name="info" rows="6" cols="22" ><?= $info ?></textarea>
    </div>
    <div>
        <input type="hidden" name="id" value=<?= $_GET['id'];?>>
        <input type="submit" name="update" value="update">
    </div>
</form>
<hr>
</body>
</html>
