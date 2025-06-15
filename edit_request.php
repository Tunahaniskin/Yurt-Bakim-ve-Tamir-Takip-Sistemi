<?php
session_start();
require_once 'config.php';

$db = new Database();
$connection = $db->getConnection();

$id = $_GET['id']; // id'yi urlden çek
$stmt = $connection->prepare("SELECT * FROM maintenance_requests WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $connection->prepare("UPDATE maintenance_requests SET room_number = ?, description = ?, status = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sssii", $room_number, $description, $status, $id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Talep güncellenemedi.";
    }
}

if ($result->num_rows == 0) {
    header('Location: index.php');
    exit;
}
$request = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talep Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="navbar-item title is-2 ">Talep Düzenle</h1>
        <?php if (isset($error)): ?>
            <div class="notification is-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
            <div class="field">
                <label class="label" for="room_number">Oda Numarası</label>
                <div class="control">
                    <input class="input" type="text" id="room_number" name="room_number" value="<?php echo htmlspecialchars($request['room_number']); ?>" required>
                </div>
            </div>
            <div class="field">
                <label class="label" for="description">Açıklama</label>
                <div class="control">
                    <textarea class="textarea" id="description" name="description" rows="4" required><?php echo htmlspecialchars($request['description']); ?></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="status">Durum</label>
                <div class="control">
                    <div class="select">
                        <select id="status" name="status">
                            <option value="Bekliyor" <?php if ($request['status'] == 'Bekliyor') echo 'selected'; ?>>Bekliyor</option>
                            <option value="Devam Ediyor" <?php if ($request['status'] == 'Devam Ediyor') echo 'selected'; ?>>Devam Ediyor</option>
                            <option value="Tamamlandı" <?php if ($request['status'] == 'Tamamlandı') echo 'selected'; ?>>Tamamlandı</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="button is-primary">Güncelle ⚙️</button>
            <a href="index.php" class="button is-light">İptal</a>
        </form>
    </div>
</body>
</html>