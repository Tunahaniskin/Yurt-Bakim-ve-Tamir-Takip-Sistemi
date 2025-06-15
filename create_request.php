<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = $_POST['room_number'];
    $description = $_POST['description'];
    $status = 'Bekliyor';
    $db = new Database();
    $connection = $db->getConnection();

    $stmt = $connection->prepare("INSERT INTO maintenance_requests (user_id, room_number, description, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $_SESSION['user_id'], $room_number, $description, $status);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Talep oluşturulamadı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Talep Oluştur</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>
<body>
    <div class="container">
    <h1 class="navbar-item title is-2 ">Yeni Talep Oluştur</h1>

        <?php if (isset($error)): ?>
            <div class="notification is-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="field">
               <label class="label" for="room_number">Oda Numarası</label>
                <div class="control">
                    <input class="input" type="text" id="room_number" name="room_number" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="description">Açıklama</label>
                <div class="control">
                    <textarea class="textarea" id="description" name="description" rows="4" required></textarea>
                </div>
            </div>
            <button type="submit" class="button is-primary">Talep Oluştur</button>
            <a href="index.php" class="button is-light">İptal</a>
        </form>
    </div>
</body>
</html>