<?php
require '../class/Database.php';
require '../class/Auth.php';

$db = new Database();
$pdo = $db->getConnect();

$id = $_GET['id'];

$product = new Auth();

if ($product->delete($pdo, $id)) {
    header("Location: QuanLyKH.php");
    exit;
}


?>