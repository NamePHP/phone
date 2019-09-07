<?php
include_once 'db.php';
$name = $_POST['name'];
$phone =  $_POST['phone'];
$info = $_POST['info'];
if(!empty($name) && !empty($phone) && !empty($info)){
    $sql =" INSERT INTO dbname(name, phone, info) VALUES (:name,:phone,:info)";
    $query = $pdo->prepare($sql);
    $query->execute(['name' => $name,'phone' => $phone,'info' => $info]);
    header('Location:/forum');
}
else{
    echo "Ведите все значения";
    header('Location:/forum');
}
