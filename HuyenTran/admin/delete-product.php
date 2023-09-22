<?php
require '../class/Database.php';
require '../class/Product.php';

$db = new Database();
$pdo = $db->getConnect();

$id = $_GET['id'];

$product = new Product();

if ($product->delete($pdo, $id)) {
    header("Location: QuanLySP.php");
    exit;
}


?>