<?php
include_once 'db.php';
$id = $_GET['id'];
$sql =' DELETE FROM `dbname` WHERE id = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);
header('Location:/forum');