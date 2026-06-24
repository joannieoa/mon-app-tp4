<?php
require "../app/db.php";

if (!isset($_GET["id"])) {
    die("ID manquant");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
