<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($db->connect_error) {
    die("Bağlantı hatası: " . $db->connect_error);
}

$result = $db->query("SELECT * FROM maintenance_requests ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yurt Bakım ve Tamir Takip Sistemi</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar has-background-danger-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item title is-4"  href="index.php">
                Yurt Bakım Sistemi  
            </a>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item has-text-primary-50">Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['username']); ?></div>
                <a class="navbar-item has-text-primary-50" href="logout.php">Çıkış Yap</a>  
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="title is-3">Bakım ve Tamir Talepleri</h1>
        <a href="create_request.php" class="button is-primary mb-4">Yeni Talep Oluştur</a>

        <?php if ($result->num_rows > 0): ?>
            <table class="table is-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Oda No</th>
                        <th>Açıklama</th>
                        <th>Durum</th>
                        <th>Oluşturma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['room_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit_request.php?id=<?php echo $row['id']; ?>" class="button is-small is-warning">Düzenle ⚙️</a>
                                <span>
                                    <a href="delete_request.php?id=<?php echo $row['id']; ?>" class="button is-small is-danger " onclick="return confirm('Silmek istediğinize emin misiniz?')">
                                      Sil &nbsp;
                                    <p class="delete is-small"></p>         
                                    </a>
                                    
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Henüz talep bulunmuyor.</p>
        <?php endif; ?>
    </div>

</body>
</html>

<?php $db->close(); ?>