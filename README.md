# 🚀 Web Tools

[](https://www.php.net/)
[](https://www.mysql.com/)
[](https://www.google.com/search?q=LICENSE)

**Web Tools** adalah platform bio link sosial yang punya banyak fitur keren, mulai dari Penyingkat URL, Kode QR, sampai 120+ alat web yang bermanfaat. Semua kebutuhan online kamu ada di sini!

-----

## ✨ Fitur Utama

  - **🔗 Bio Link**: Bikin halaman bio link yang unik dan bisa kamu atur sesuka hati.
  - **✂️ Penyingkat URL**: Ubah link panjang jadi pendek biar gampang dibagikan.
  - **📱 QR Code Generator**: Buat kode QR custom dengan cepat untuk berbagai keperluan.
  - **🛠️ 120+ Web Tools**: Kumpulan alat online buat bantu kerjaan kamu, dari konverter sampai generator.

-----

## 📋 Persyaratan

Sebelum mulai install, pastikan server kamu udah sesuai sama syarat di bawah ini.

  - **PHP**: `8.3` - `8.4`
  - **Ekstensi PHP**:
      - `cURL`
      - `OpenSSL`
      - `mbstring`
      - `MySQLi`
  - **Database**: `MySQL 5.7.3+` atau `MariaDB` setara.
  - **Server**: `Apache` atau `Nginx`.

-----

## ⚙️ Cara Install

Ikuti langkah-langkah ini buat install **Web Tools** di server kamu.

### 1. Siapkan Database

  - Bikin user database baru (opsional).
  - Bikin database baru.
  - Catat host, nama, username, dan password database buat dipakai nanti.

### 2. Upload File

  - Upload semua isi folder `web-tools-main/` ke folder tujuan di hosting kamu.
  - Bisa di domain utama, subdomain, atau subfolder, sesuai kebutuhan.

> **Catatan Penting:**
>
>   - **Apache**: Pastikan file `.htaccess` ikut terupload. File ini kadang tersembunyi di komputer.
>   - **Nginx**: Jangan lupa konfigurasi Nginx setelah install selesai.

### 3. Mulai Instalasi

1.  Buka Folder `install` lalu hapus file yang bernama `installed`
2.  Buka alamat web kamu dan akses `/install` (misal: `domainkamu.com/install`).
3.  Atur izin (CHMOD) file dan folder sesuai petunjuk instalasi. Biasanya pakai `755`, `775`, atau `777`, tergantung server.
4.  Ikuti instruksi di layar instalasi.
5.  Kalau instalasi sukses, kamu bakal dapat info login admin. Simpan baik-baik ya!

-----

## 🔧 Setelah Instalasi

Setelah install, ada beberapa hal yang perlu kamu atur biar aplikasi makin lancar.

### 1. Cron Job

Cron job penting buat tugas-tugas otomatis (kayak update, statistik, dll).

1.  Login ke **Panel Admin** -\> **Pengaturan Situs Web** -\> tab **Cron**.
2.  Lihat daftar perintah cron yang harus ditambah.
3.  Tambahkan cron job di panel hosting kamu sesuai instruksi.
    > Cara nambah cron job beda-beda tiap hosting. Cek dokumentasi hosting kamu ya.

### 2. Setting Email (SMTP)

Biar situs bisa kirim email (misal buat verifikasi, notifikasi, dll), kamu perlu setting SMTP.

1.  Login ke **Panel Admin** -\> **Pengaturan Situs Web** -\> tab **SMTP (Email)**.
2.  Isi data SMTP dari penyedia kamu (Gmail, SendGrid, Mailgun, dll).
3.  Klik **Simpan & Uji** buat cek apakah email bisa terkirim.

