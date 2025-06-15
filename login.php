<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = new Database();
    $connection = $db->getConnection();

    $stmt = $connection->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = "Geçersiz şifre.";
        }
    } else {
        $error = "Kullanıcı bulunamadı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-6">
        <div class="columns is-centered">
            <div class="column is-half">
                <h1 class="title">Giriş Yap</h1>
                <?php if (isset($error)): ?>
                    <div class="notification is-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="field">
                        <label class="label" for="username">Kullanıcı Adı</label>
                        <div class="control">
                            <input class="input" type="text" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="password">Şifre</label>
                        <div class="control">
                            <input class="input" type="password" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="button is-primary">Giriş Yap</button>
                    <a href="register.php">Kayıt Ol</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>