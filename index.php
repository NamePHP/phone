<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Mobile</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<h2>My contact list</h2>
<form action="app.php" method="post">
    <div>
        <b>Name:</b><br>
        <input name="name" placeholder="Name">
    </div>
    <div>
        <b>Phone number:</b><br>
        <input name="phone" placeholder="Phone number">
    </div>
    <div>
        <b>Additional info:</b><br>
        <textarea name="info" rows="6" cols="22" placeholder="Additional info"></textarea>
    </div>
    <div>
        <input type="submit" value="ok">
    </div>
</form>
<hr>
</body>
</html>

<?php
include_once 'db.php';

$stmt = $pdo->prepare("SELECT * FROM dbname ORDER BY `id` DESC ");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    ?>
    <div>
        <b>NAME :</b><?= $row['name'] . "   <b>Phone :</b> " .  $row['phone']." " ?>
    </div>
    <div>
        <a href="http://localhost/forum/edit.php?id=<?=$row['id']?>"><button style="color: forestgreen">EDIT</button></a>
        <a href="http://localhost/forum/delete.php?id=<?= $row['id']?>"><button style="color: crimson">DELETE</button></a>

    </div>
    <div><b>INFO :</b><?= $row['info'] ?></div>
    <hr>

    <?php
}
?>