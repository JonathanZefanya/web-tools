# 📜 Riwayat Perubahan (Changelog) Web Tools

Semua perubahan penting pada proyek **Web Tools** akan didokumentasikan di file ini. Proyek ini telah menerima **6 pembaruan** sejak rilis perdananya pada 10 Februari 2025.

## [4.0.0] - 2025-07-23

### ✨ Ditambahkan (Added)
- Menambahkan kemampuan untuk menyalin URL hasil secara otomatis setelah tautan dibuat.
- Menambahkan kemampuan untuk mengunduh file yang diunggah melalui Blok Tautan Statis.
- Menambahkan opsi untuk mengizinkan atau melarang penggunaan alias email oleh pengguna.
- Menambahkan kemampuan untuk mengatur ukuran unggahan maksimum avatar profil melalui panel admin.
- Menambahkan kemampuan untuk menunggu respons saat mengirim notifikasi webhook (berguna dalam kasus tertentu).
- Menambahkan kemampuan untuk mengubah karakter pemisah judul (`title separator`) langsung dari panel admin.
- Menambahkan tautan akses cepat ke halaman statistik dari beberapa fitur di panel admin.

### 🚀 Ditingkatkan (Improved)
- Meningkatkan widget dasbor dengan spasi otomatis berdasarkan fitur yang aktif.
- Meningkatkan performa fitur pembersihan otomatis untuk log statistik Tautan.
- Meningkatkan integrasi unduhan massal ke file ZIP (untuk Kode QR) agar lebih efektif dan cepat.
- Meningkatkan bagian domain di panel admin dengan detail yang lebih lengkap.
- Meningkatkan notifikasi email admin saat ada pembayaran baru (menambahkan lebih banyak detail).
- Meningkatkan notifikasi email admin saat ada pengguna baru mendaftar (menambahkan lebih banyak detail).
- Meningkatkan notifikasi email admin saat pengguna menghapus akunnya (menambahkan lebih banyak detail).
- Meningkatkan tombol ekspor agar dapat diklik dan mengarahkan ke halaman peningkatan paket jika fitur tidak tersedia.
- Meningkatkan filter pencarian dengan menambahkan pintasan keyboard untuk memicunya.
- Meningkatkan performa fitur pembersihan otomatis untuk log pengguna.
- Meningkatkan performa beberapa tabel database dalam beberapa kasus penggunaan.
- Meningkatkan editor kode mentah (`raw code editor `) untuk sistem halaman & blog di panel admin.
- Memperbarui pustaka sistem 2FA (Two-Factor Authentication) dengan kode terbaru.
- Meningkatkan tampilan halaman Pembayaran, Pajak, dan Bahasa di panel admin.

### 🐞 Diperbaiki (Fixed)
- Memperbaiki masalah pada pratinjau halaman bio link saat memilih tema baru.
- Memperbaiki masalah pada alat pengecekan Whois.
- Memperbaiki masalah pada pengujian penangan notifikasi untuk provider Discord.
- Memperbaiki masalah langka pada generator Kode QR dengan penggunaan warna tertentu.
- Memperbaiki masalah pengalihan tak terbatas (`unlimited redirects`) dalam kasus tertentu di beranda.
- Memperbaiki masalah dengan langganan berulang yang dibuat menggunakan Mollie.
- Memperbaiki masalah duplikasi paket di panel admin.
- Memperbaiki beberapa masalah pada editor WYSIWYG QuillJS.
- Memperbaiki masalah pada deteksi jenis perangkat.
- Memperbaiki beberapa masalah kecil pada terjemahan.
- Memperbaiki masalah duplikasi kode JavaScript pada tabel manajemen data di panel admin.
- Memperbaiki masalah saat membuat bahasa baru melalui panel admin yang tidak tersimpan dengan benar.

---

## [3.1.0] - 2025-06-26

### 🐞 Diperbaiki (Fixed)
- Memperbaiki lebar kontainer yang terlalu kecil pada halaman dan post blog di perangkat kecil.
- Memperbaiki masalah pada editor WYSIWYG untuk blok paragraf.
- Memperbaiki masalah tombol CTA di beranda yang tidak beranimasi.
- Memperbaiki masalah berulang di mana beberapa perangkat Android masih terdeteksi sebagai tablet, bukan ponsel.
- Memperbaiki masalah ukuran, arah, dan perataan teks pada postingan blog dan halaman yang menggunakan editor WYSIWYG.

---

## [3.0.0] - 2025-05-11

### ⚠️ Perubahan Penting
- Persyaratan PHP minimum sekarang adalah **PHP 8.1** (sebelumnya PHP 8.0).

### ✨ Ditambahkan (Added)
- Menerapkan sistem **Penangan Notifikasi (Notification Handlers)** baru yang kaya fitur (mendukung 13 cara notifikasi).
- Mengintegrasikan penangan notifikasi ke Blok Kolektor Bio Link untuk memberi tahu saat data baru terkumpul.
- Mengintegrasikan penangan notifikasi ke Blok Pembayaran Bio Link untuk memberi tahu saat ada pembayaran baru.
- Menerapkan sistem API dan manajemen penuh untuk penangan notifikasi di panel admin.
- Menerapkan blok **Modal Teks** baru untuk halaman bio link.
- Menerapkan halaman statistik baru untuk tautan (verifikasi tampilan terbanyak per jam, termasuk di API).
- Menerapkan kemampuan untuk mengatur dua blok dalam satu baris untuk beberapa blok bio link.
- Menerapkan blok **Pemesanan (Booking)** baru yang kaya fitur untuk Halaman Bio Link.
- Menerapkan blok **Jam Buka (Business Hours)** baru untuk Halaman Bio Link.
- Menerapkan kemampuan untuk menandai Blok Tautan tertentu sebagai konten sensitif.
- Menerapkan **Laporan Analitik Email** (mingguan/bulanan) untuk Tautan.
- Menerapkan Tema Bio Link prasetel baru.
- Menerapkan kemampuan untuk mengedit dan menambahkan Font Bio Link dari panel admin.
- Menerapkan dukungan transparansi warna untuk berbagai elemen Kode QR.
- Menerapkan kemampuan untuk mengatur gambar kustom untuk beranda dari panel admin.
- Menerapkan kemampuan untuk mengatur gambar profil akun kustom.
- Menerapkan kemampuan untuk mengirim email kustom saat paket pengguna akan berakhir.
- Menerapkan tooltip yang dapat diklik untuk mengarahkan ke halaman upgrade paket jika fitur tidak tersedia.
- Menerapkan set font pradefinisi untuk tema situs web melalui panel admin.
- Menerapkan opsi untuk mengaktifkan/menonaktifkan tombol berbagi sosial tertentu.
- Menerapkan opsi desain satu atau dua kolom untuk sistem Blog.
- Menambahkan blok sosial baru **Pesan Langsung Instagram (Instagram Direct Message)**.
- Menambahkan tombol berbagi baru: **Bagikan ke Snapchat** dan **Bagikan ke Microsoft Teams**.

### 🚀 Ditingkatkan (Improved)
- Merombak total blok paragraf bio link untuk mendukung pengeditan melalui editor WYSIWYG.
- Merombak total pemilih tema bio link menjadi lebih indah dan ramah pengguna.
- Meningkatkan blok kolektor email & telepon untuk menghindari data duplikat.
- Ukuran avatar blok header sekarang mendukung 125x125.
- Merombak widget statistik dasbor admin; halaman kini memuat lebih cepat.
- Meningkatkan *syntax highlighting* pada mode gelap untuk kolom JS kustom.
- Meningkatkan file `.htaccess` default dengan aturan untuk mencegah masalah API dan *service worker*.
- Menghapus batas laju API untuk pengguna admin.
- Halaman API akun kini menampilkan tautan cepat ke semua endpoint API.
- Detail siaran (broadcast) di panel admin kini dapat dilihat bahkan saat sedang dalam proses pengiriman.
- Meningkatkan algoritma deteksi perangkat (ponsel, tablet, desktop).
- Meningkatkan tampilan blok kutipan & kode pada halaman & blog.
- Meningkatkan responsivitas menu di halaman statistik panel admin.
- Meningkatkan editor halaman & blog di panel admin untuk pemilihan warna dan penambahan tombol yang lebih mudah.
- Meningkatkan tampilan tombol berbagi dan item menu dropdown.

### 🐞 Diperbaiki (Fixed)
- Memperbaiki potensi masalah instalasi pada versi MySQL yang lebih baru.
- Memperbaiki masalah pada alat Pengunduh Thumbnail Youtube, Pengunduh Gravatar, dan Pengoptimal Gambar.
- Memperbaiki masalah pada fitur pembuatan URL pendek massal.
- Memperbaiki masalah tampilan tombol berbagi sosial di perangkat kecil.
- Memperbaiki masalah spasi berlebih antar paragraf pada editor WYSIWYG.
- Memperbaiki masalah pemrosesan pembayaran triwulanan dan semesteran.
- Memperbaiki masalah responsivitas di beberapa halaman.
- Memperbaiki masalah dengan prosesor pembayaran Mollie dan Mercado Pago.
- Memperbaiki masalah tampilan pembayaran bulan ini di dasbor admin.
- Memperbaiki masalah grafik yang tidak muncul dalam kasus tertentu.

---

## [2.0.0] - 2025-03-06

### ✨ Ditambahkan (Added)
- Menambahkan **+18 gaya Kode QR** baru.
- Menambahkan **+14 gaya mata bagian dalam (inner eye)** Kode QR baru.
- Menambahkan **+3 gaya mata bagian luar (outer eye)** Kode QR baru.
- Menambahkan **+11 desain bingkai (frame)** Kode QR baru.
- Menambahkan kemampuan untuk mengecualikan IP dari pelacakan statistik untuk seluruh akun.
- Menambahkan kemampuan untuk memotong gambar sebelum mengunggahnya.
- Menambahkan kemampuan untuk mereset penuh statistik dari sebuah tautan dengan satu klik.
- Menambahkan dukungan *deep linking* aplikasi untuk Aliexpress.
- Menambahkan kemampuan untuk menonaktifkan sepenuhnya sistem Proyek.
- Menambahkan kemampuan untuk mengatur deskripsi meta kustom untuk sistem Penyamaran URL (URL Cloaking).
- Menambahkan kemampuan untuk membuat URL pendek secara massal.

### 🚀 Ditingkatkan (Improved)
- Meningkatkan tampilan formulir pembuatan Kode QR.
- Meningkatkan blok bio link Twitch dengan dukungan untuk embed Klip dan Video.
- Meningkatkan pembuatan PWA bio link; sekarang dapat mengatur ikon PWA kustom.
- Meningkatkan akurasi pengacakan penargetan A/B pada URL pendek.
- Meningkatkan sistem pembaruan bahasa, kini perubahan disimpan hampir instan.
- Mengoptimalkan penggunaan memori dan performa cron job serta fungsi internal (deteksi IP, perangkat, dll).
- Meningkatkan sistem notifikasi internal dan siaran email agar lebih efisien dan cepat.
- Mengoptimalkan pemuatan sumber daya JavaScript.
- Merombak dan meningkatkan penggunaan pustaka Font Awesome (diperbarui ke v6.7.2) untuk performa lebih baik.

### 🐞 Diperbaiki (Fixed)
- Memperbaiki masalah tema bio link yang masih bisa digunakan meskipun dinonaktifkan di paket.
- Memperbaiki masalah PWA bio link yang menimpa cakupan PWA utama.
- Memperbaiki masalah pembaruan Kode QR pada beberapa server.
- Memperbaiki masalah pada duplikasi blok template.
- Memperbaiki masalah terjemahan yang hilang saat beberapa fitur dinonaktifkan.
- Memperbaiki masalah file CSS yang berisi komentar tidak perlu.
- Memperbaiki masalah pada pembayaran seumur hidup dengan Razorpay.
- Memperbaiki masalah *layout shift* di panel admin.

---

## [1.1.0] - 2025-02-20

### 🚀 Ditingkatkan (Improved)
- Meningkatkan tampilan tabel entri pada halaman statistik.
- Tanggal aktivitas terakhir pengguna tidak akan lagi diperbarui jika diimpersonasi oleh admin.
- Tombol pada halaman paket kini disembunyikan jika pendaftaran dinonaktifkan.

### 🐞 Diperbaiki (Fixed)
- Memperbaiki beberapa masalah terjemahan.
- Memperbaiki masalah sorotan pratinjau bio link yang tidak menggulir dengan benar.
- Memperbaiki masalah login sosial yang tidak memicu modal "Klaim URL".
- Memperbaiki masalah *app linking* Twitch dan Apple Music pada URL Pendek.
- Memperbaiki filter siaran yang tidak berfungsi dengan filter bahasa & perangkat.
- Memperbaiki bilah bantuan instalasi PWA yang tidak tersembunyi setelah instalasi.
- Memperbaiki potensi masalah pengiriman webhook.

---

## [1.0.0] - 2025-02-10

### 🎉 Rilis Awal (Initial Release)
- Rilis pertama **Web Tools**.
