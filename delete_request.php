<?php
session_start();
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("DELETE FROM maintenance_requests WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    }
}

?>