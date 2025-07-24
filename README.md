# 🚀 Web Tools

[](https://www.php.net/)
[](https://www.mysql.com/)
[](https://www.google.com/search?q=LICENSE)

**Web Tools** adalah platform bio link sosial lengkap yang Anda butuhkan, mencakup Penyingkat URL, sistem Kode QR, & sistem Alat Web dengan 120+ fitur berguna. Solusi all-in-one untuk kebutuhan online Anda\!

-----

## ✨ Fitur Utama

  - **🔗 Platform Bio Link**: Buat halaman bio link yang menarik dan dapat disesuaikan.
  - **✂️ Penyingkat URL**: Persingkat URL yang panjang menjadi tautan yang pendek dan mudah dibagikan.
  - **📱 Generator Kode QR**: Buat kode QR kustom dengan mudah untuk berbagai keperluan.
  - **🛠️ 120+ Alat Web**: Kumpulan alat daring yang berguna untuk berbagai tugas, mulai dari konverter hingga generator.

-----

## 📋 Persyaratan

Pastikan server Anda memenuhi persyaratan berikut sebelum memulai instalasi.

  - **PHP**: `8.3` - `8.4`
  - **Ekstensi PHP**:
      - `cURL`
      - `OpenSSL`
      - `mbstring`
      - `MySQLi`
  - **Database**: `MySQL 5.7.3+` atau `MariaDB` yang setara.
  - **Server**: `Apache` atau `Nginx`.

-----

## ⚙️ Panduan Instalasi

Ikuti langkah-langkah berikut untuk menginstal **Web Tools** di server Anda.

### 1\. Siapkan Database

  - Buat Pengguna Database baru (opsional).
  - Buat Database baru.
  - Siapkan **Host**, **Nama**, **Username**, dan **Password** Database untuk langkah selanjutnya.

### 2\. Unggah Produk

  - Unggah seluruh konten dari folder `web-tools-main/` ke direktori tujuan di hosting web Anda.
  - Produk dapat diunggah di domain utama, subdomain, atau subfolder, sesuai kebutuhan Anda.

> **Catatan Penting:**
>
>   - **Server Apache**: Pastikan file `.htaccess` juga terunggah. File ini mungkin tersembunyi secara default di komputer Anda.
>   - **Server Nginx**: Pastikan Anda melakukan konfigurasi Nginx yang sesuai setelah proses instalasi selesai.

### 3\. Mulai Proses Instalasi

1.  Akses alamat web Anda dan buka path `/install` (contoh: `domainanda.com/install`).
2.  Atur izin (CHMOD) untuk file dan folder yang disebutkan selama proses instalasi. Umumnya menggunakan `755`, `775`, atau `777`, tergantung pada konfigurasi server Anda.
3.  Ikuti petunjuk yang ditampilkan di layar instalasi.
4.  Jika instalasi berhasil, Anda akan melihat **kredensial login admin**. Simpan informasi ini dengan baik\!

-----

## 🔧 Konfigurasi Pasca-Instalasi

Setelah instalasi selesai, ada beberapa hal penting yang perlu Anda atur agar aplikasi berjalan optimal.

### 1\. Pengaturan Cron Job

Cron job sangat penting karena bertanggung jawab untuk menangani tugas-tugas di latar belakang (seperti pembaruan terjadwal, statistik, dll).

1.  Login ke **Panel Admin** -\> **Pengaturan Situs Web** -\> tab **Cron**.
2.  Anda akan melihat daftar perintah cron yang perlu ditambahkan.
3.  Buat cron job baru di panel kontrol hosting Anda untuk setiap perintah tersebut.
    > Proses penambahan cron job bervariasi tergantung penyedia hosting. Silakan merujuk ke dokumentasi hosting Anda untuk instruksi lebih lanjut.

### 2\. Pengaturan Email (SMTP)

Jika Anda ingin situs Anda dapat mengirim email (misalnya untuk verifikasi pengguna, notifikasi, dll.), Anda harus mengatur SMTP.

1.  Login ke **Panel Admin** -\> **Pengaturan Situs Web** -\> tab **SMTP (Email)**.
2.  Isi kolom yang tersedia dengan kredensial dari penyedia SMTP Anda (seperti Gmail, SendGrid, Mailgun, dll).
3.  Klik **Simpan & Uji** untuk memastikan konfigurasi Anda sudah benar dan email dapat terkirim.
