css kütüphanelerine nerden ulaşabilirim ve nasıl kullanırım

CSS kütüphaneleri, web sitelerini hızlı ve tutarlı bir şekilde tasarlamanı kolaylaştıran hazır stil dosyalarıdır. Aşağıda **nereden ulaşabileceğini**, **popüler kütüphaneleri** ve **nasıl kullanacağını** detaylı şekilde anlattım:

---

### 📚 1. CSS Kütüphanelerine Nereden Ulaşabilirim?

#### ✅ Yaygın CSS kütüphanelerini şu sitelerden bulabilirsin:

| Kütüphane Adı      | Site Adresi                                              | Özellikler                     |
| ------------------ | -------------------------------------------------------- | ------------------------------ |
| Bootstrap          | [https://getbootstrap.com](https://getbootstrap.com)     | En yaygın UI framework'ü       |
| Tailwind CSS       | [https://tailwindcss.com](https://tailwindcss.com)       | Utility-first yapısıyla modern |
| Bulma              | [https://bulma.io](https://bulma.io)                     | Hafif, modern ve sade          |
| Foundation by Zurb | [https://get.foundation](https://get.foundation)         | Responsive grid yapısı güçlü   |
| Materialize CSS    | [https://materializecss.com](https://materializecss.com) | Google Material Design uyumlu  |
| UIkit              | [https://getuikit.com](https://getuikit.com)             | Hafif ve modüler               |

Ayrıca GitHub’da “[CSS library](https://github.com/search?q=css+library)” araması yaparak da birçok açık kaynak kütüphaneye ulaşabilirsin.

---

### ⚙️ 2. CSS Kütüphanesi Nasıl Kullanılır?

#### ✨ Yöntem 1: CDN (Hızlı Entegrasyon)

HTML dosyana `<link>` etiketiyle ekleyebilirsin:

**Örnek: Bootstrap**

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
```

**Örnek: Tailwind (CDN için deneysel kullanılır)**

```html
<script src="https://cdn.tailwindcss.com"></script>
```

#### ✨ Yöntem 2: Dosyayı İndirip Projeye Dahil Etme

1. Web sitesinden CSS dosyasını indir.
2. Proje klasörüne koy.
3. HTML dosyanda çağır:

```html
<link rel="stylesheet" href="css/bootstrap.min.css">
```

#### ✨ Yöntem 3: Paket Yöneticileri ile Kurulum (İleri Seviye)

Frontend projelerinde `npm` veya `yarn` ile kurabilirsin:

```bash
npm install bootstrap
```

Sonra CSS veya SCSS dosyasına import edebilirsin:

```scss
@import "node_modules/bootstrap/scss/bootstrap";
```

---

### 🧪 3. Örnek Kullanım

#### Bootstrap ile Buton

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<button class="btn btn-primary">Tıkla</button>
```

#### Tailwind CSS ile Buton

```html
<script src="https://cdn.tailwindcss.com"></script>

<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Tıkla
</button>
```

---

### 🎯 Tavsiyeler

* **Basit projelerde:** Bootstrap veya Bulma gibi hazır UI bileşenleri olanları tercih et.
* **Modern projelerde:** Tailwind CSS daha esnek ve kişiselleştirilebilir.
* **Responsive (mobil uyumlu) siteler için:** Bu kütüphaneler zaten mobile-first yapıdadır, ekstra iş yapmana gerek kalmaz.

---

İstersen spesifik bir kütüphane için örnek proje veya rehber de hazırlayabilirim. Hangisini denemek istersin?

<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $db = new Database();
    $connection = $db->getConnection();

    $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Kayıt başarısız. Kullanıcı adı zaten alınmış olabilir."; // hatalı düzelt
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
bu benim register.php dosyam ve burada küçük bir hatam var kayıt olurken eğer daha önce alınmış bir kullanıcı ismini almaya çalışırsak şu şekilde hata veriyor:
Fatal error: Uncaught mysqli_sql_exception: Duplicate entry 'Eames' for key 'username' in C:\xampp\htdocs\Yurt Bakım ve Tamir Takip Sistemi\register.php:13 Stack trace: #0 C:\xampp\htdocs\Yurt Bakım ve Tamir Takip Sistemi\register.php(13): mysqli_stmt->execute() #1 {main} thrown in C:\xampp\htdocs\Yurt Bakım ve Tamir Takip Sistemi\register.php on line 13
bu hatayı nasıl çözeriz


MySQL’in “duplicate entry” hatasını PHP’de yakalamak ve kullanıcıya şık bir hata mesajı göstermek için iki ana yol var:

---

## 1️⃣ `try–catch` ile `mysqli_sql_exception`’ı yakalamak

```php
<?php
require_once 'config.php';

// Mysqli’nin exception fırlatmasını sağlıyoruz (ya da zaten açıksa bırakabilirsiniz)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
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
        // 1062 = Duplicate entry error code
        if ($e->getCode() === 1062) {
            $error = "Bu kullanıcı adı zaten alınmış, lütfen başka bir isim deneyin.";
        } else {
            // Beklenmeyen bir hata ise tekrar fırlatabilir ya da loglayabilirsiniz
            throw $e;
        }
    }
}
?>
```

---

## 2️⃣ Kayıt işleminden önce “var mı yok mu” diye kontrol etmek

**Avantajı:** Exception yönetimiyle uğraşmazsınız, kod akışı daha okunur olabilir.

```php
<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $db = new Database();
    $connection = $db->getConnection();

    // 1) Aynı kullanıcı adını arıyoruz
    $check = $connection->prepare("SELECT 1 FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Bu kullanıcı adı zaten alınmış, lütfen başka bir isim deneyin.";
    } else {
        // 2) Yoksa ekliyoruz
        $stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Kayıt sırasında bir hata oluştu. Lütfen tekrar deneyin.";
        }
    }
}
?>
```

---

### Özet

* **Hızlı çözüm**: `try–catch` bloğunda `mysqli_sql_exception` yakalayarak hata kodu 1062’yi kontrol et.
* **Alternatif**: `INSERT`’tan önce `SELECT` ile başvuruyu kontrol et.

Bu iki yaklaşımdan biriyle “Duplicate entry” kaynaklı fatal error’dan kurtulup kullanıcıya istediğiniz tarzda mesaj gösterebilirsiniz.



1062 nedir


`1062`, **MySQL hata kodlarından biridir** ve şu anlama gelir:

> 🔴 **Error Code: 1062 – Duplicate entry '...' for key '...'**
> Yani: **Aynı değere sahip bir kayıt zaten var. Bu yüzden yeni kayıt eklenemiyor.**

---

### 🧠 Bu hatanın nedeni nedir?

Bu hata, **veritabanındaki bir alanın UNIQUE (benzersiz) olarak tanımlanmış olması** durumunda, aynı değere sahip başka bir kayıt eklemeye çalışıldığında oluşur.

Örneğin:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);
```

Bu tabloda `username` alanı `UNIQUE` olarak tanımlandığı için, aynı kullanıcı adını ikinci kez eklemeye çalışırsan MySQL hata verir:

```sql
INSERT INTO users (username, password) VALUES ('admin', '123');
-- Eğer 'admin' zaten varsa:
-- ERROR 1062 (23000): Duplicate entry 'admin' for key 'username'
```

---

### 💡 PHP’de nasıl yakalanır?

Eğer bu hatayı kodda kontrol etmek istiyorsan, `try-catch` bloğunda `mysqli_sql_exception` sınıfından gelen `$e->getCode()` değerini kontrol edersin:

```php
try {
    $stmt->execute();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        echo "Aynı kullanıcı adı zaten var!";
    }
}
```

---

### 🛠️ Ne yapmalı?

Bu hatayla karşılaşıldığında genellikle:

1. Kullanıcıya "Bu kullanıcı adı zaten alınmış" gibi bir mesaj gösterilir.
2. Alternatif bir kullanıcı adı seçmesi istenir.
3. Gerekirse önceden kontrol (SELECT sorgusu) yapılır.

---

İstersen bu hatayı çözmek için **veritabanında kullanıcı adı unique mi değil mi**, onu da birlikte kontrol edebiliriz. Yardım edeyim mi?

