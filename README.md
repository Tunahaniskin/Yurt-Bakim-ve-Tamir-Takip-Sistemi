# 🛠️ Yurt Bakım ve Tamir Takip Sistemi

Yurtlarda bakım ve tamir süreçlerini dijitalleştirmek için geliştirilen bu web tabanlı sistem; kullanıcıların talepler oluşturmasını, yöneticilerin talepleri yönetmesini kolaylaştırır. PHP & MySQL altyapısı ile geliştirilen sistem, **Bulma CSS** kütüphanesiyle modern bir arayüz sunar.

---

## 🎯 Proje Amacı

Bu proje, yurt sakinlerinin bakım ve tamir ihtiyaçlarını kolayca bildirebileceği, yöneticilerin ise bu talepleri takip edebileceği bir sistem sunar. Temel hedefler:

- Kayıt ve giriş sistemi ile kullanıcı güvenliği sağlamak  
- Bakım taleplerini oluşturma, düzenleme ve silme  
- Her kullanıcının yalnızca kendi taleplerini yönetebilmesi  
- Temiz, hızlı bir kullanıcı arayüzü

---

## 🔐 Kullanıcı İşlemleri

### 👤 Kayıt Olma

- `register.php` üzerinden kullanıcı adı ve şifre ile kayıt olunur.  
- Kayıt başarılıysa otomatik giriş ekranına yönlendirilirsiniz.  
- Aynı kullanıcı adı varsa uyarı verilir.

### 🔑 Giriş Yapma

- `login.php` üzerinden giriş yapılır.  
- Başarılı girişte `index.php` sayfasına yönlendirilirsiniz.

### 📩 Talep Oluşturma

- `index.php`'de "Yeni Talep Oluştur" → `create_request.php`  
- Oda numarası ve açıklama girilerek talep oluşturulur.

### 📄 Talepleri Görüntüleme

- `index.php` üzerinden tüm talepler tablo şeklinde görüntülenir.

### ✏️ Talep Düzenleme

- `edit_request.php` üzerinden talep bilgileri güncellenebilir.

### 🗑️ Talep Silme

- `delete_request.php` ile silme işlemi yapılır.

### 🚪 Oturum Kapatma

- `logout.php` ile güvenli çıkış yapılır.

---

## 🗂️ Dosya Açıklamaları

| Dosya Adı             | Açıklama                                      |
|-----------------------|-----------------------------------------------|
| config.php            | Veritabanı bağlantı ayarları                  |
| create_request.php    | Yeni talep oluşturma                          |
| delete_request.php    | Talep silme işlemi                            |
| edit_request.php      | Talep düzenleme                               |
| login.php             | Kullanıcı girişi                              |
| logout.php            | Oturum kapatma                                |
| register.php          | Kullanıcı kaydı                               |
| index.php             | Talep listesi ve genel kontrol paneli         |

---

## 🔒 Güvenlik Özellikleri

- **Şifre Hashleme:** `password_hash()` ve `password_verify()` ile şifre güvenliği  
- **Session Yönetimi:** PHP `session_start()` ile oturum kontrolü  
- **XSS Önlemleri:** `htmlspecialchars()` kullanılarak çıktı filtreleme  
- **Kullanıcı Yetkileri:** Kullanıcı sadece kendi taleplerini yönetebilir

---

## 📸 Ekran Görüntüleri ve Tanıtım Videosu

Giriş Sayfası:

![Giriş Sayfası](pictures/Ekran%20görüntüsü%202025-06-15%20201624.png)

Ana Sayfa:

![Ana Sayfa](pictures/Ekran%20görüntüsü%202025-06-15%20201736.png)

Talep Düzenleme Sayfası:

![Talep Düzenle](pictures/Ekran%20görüntüsü%202025-06-15%20201747.png)

🎬 Tanıtım Videosu:  
- https://www.youtube.com/watch?v=igWhPkuX3ig

---

## 📝 Ek Notlar

- Bu proje sade PHP ile yazılmıştır.
- CSS framework olarak sadece **Bulma CSS** tercih edilmiştir.
- Tüm içerikler UTF-8 karakter seti ile uyumludur.

---

## 📬 İletişim

Bu proje bir öğrenci çalışması olarak geliştirilmiştir. Geri bildirimler ve katkılar için `issues` kısmını kullanabilirsiniz.

---
