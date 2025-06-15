<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $db = new Database();
    $connection = $db->getConnection();

    $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    try {
        $stmt->execute();
        header('Location: login.php');
        exit;
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $error = "Bu kullanıcı adı zaten alınmış.";
        } else {
            $error = "Kayıt işlemi sırasında bir hata oluştu.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-6">
        <div class="columns is-centered">
            <div class="column is-half">
                <h1 class="title">Kayıt Ol</h1>
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
                    <button type="submit" class="button is-primary">Kayıt Ol</button>
                    <a href="login.php">Giriş Yap</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>