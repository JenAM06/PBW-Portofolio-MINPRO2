# Portfolio

Portfolio website pribadi yang dinamis. Menampilkan informasi profil, skill, pengalaman, dan sertifikat yang diambil dari database MySQL.

## 🔗 Live Demo
👉 https://jenam06.github.io/PBW-Portofolio/

> Jen Agresia Misti | 2409116007 | A'24 | MINPRO 2

---

## Daftar Isi 𓇼 ⋆.˚ 𓆉 𓆝 𓆡⋆.˚ 𓇼

- [Struktur File](#struktur-file)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Arsitektur](#arsitektur)
- [Alur Kerja](#alur-kerja)
- [Setup & Instalasi](#setup--instalasi)
- [Struktur Database](#struktur-database)
- [Fitur Utama](#fitur-utama)
- [Tampilan & Fitur](#tampilan--fitur)
  - [1. Navbar](#1-navbar)
  - [2. Hero / Home](#2-hero--home)
  - [3. About Me](#3-about-me)
  - [4. Certificates](#4-certificates)
  - [5. Footer](#5-footer)
- [CSS](#css)

---

## Struktur File

```
MINPRO2/
├── index.php
├── koneksi.php
├── style.css
├── portfolio.sql
└── aset/
    ├── profil.jpeg
    ├── dicoding.png
    ├── KC.png
    └── staff.png
```

---

## Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| **PHP** | Server-side rendering dan koneksi database |
| **MySQL** | Penyimpanan data skills, experiences, dan certificates |
| **HTML5** | Struktur dan markup halaman |
| **CSS3** | Custom styling, animasi, dan variabel warna |
| **Bootstrap 5.3** | Layout grid, navbar, komponen responsif |
| **Bootstrap Icons 1.10.5** | Icon sosial media dan UI |
| **Google Fonts** | Font `Playfair Display` dan `DM Sans` |
| **Laragon** | Local development environment (Apache + MySQL) |

> **Catatan:** Vue.js digunakan pada versi sebelumnya (MINPRO 1 static). Pada versi dinamis ini, rendering data dilakukan sepenuhnya oleh PHP sehingga Vue.js tidak lagi diperlukan.

---

## Arsitektur

```
index.php
├── koneksi.php          → koneksi ke database MySQL
├── PHP (server-side)    → mengambil & merender data dari database
│   ├── $skills          → SELECT * FROM skills
│   ├── $experiences     → SELECT * FROM experiences
│   └── $certificates    → SELECT * FROM certificates
├── Bootstrap 5          → layout grid, navbar, komponen UI responsif
└── style.css            → tampilan custom, animasi, dan variabel warna
```

---

## Alur Kerja

1. **Browser** membuka `http://localhost/minpro2`
2. **Apache (Laragon)** meneruskan request ke `index.php`
3. **`koneksi.php`** membuka koneksi ke database MySQL
4. **PHP** menjalankan query `SELECT` ke tabel `skills`, `experiences`, dan `certificates`
5. **PHP** merender HTML dengan data dari database menggunakan `foreach` dan `htmlspecialchars()`
6. **Browser** menerima HTML yang sudah lengkap dan menampilkan halaman

---

## Setup & Instalasi

### Prasyarat
- **Laragon Full** (sudah include Apache, MySQL, PHP)

### Langkah-langkah

**1. Letakkan file di folder Laragon:**
```
C:\laragon\www\minpro2\
├── index.php
├── koneksi.php
├── style.css
└── aset\
```

**2. Import database:**
- Pastikan Laragon sudah running
- Buka `http://localhost/phpmyadmin`
- Login dengan username `root`, password kosong
- Klik **Import** → pilih file `portfolio.sql` → klik **Execute**

**3. Buka website:**
```
http://localhost/minpro2
```

### Konfigurasi Database (`koneksi.php`)
```php
$host = 'localhost';
$user = 'root';     
$pass = '';          
$db   = 'portfolio';  
```

---

## Struktur Database

### Tabel `skills`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key |
| name | VARCHAR(100) | Nama skill |
| level | INT | Persentase kemampuan (0–100) |

### Tabel `experiences`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key |
| role | VARCHAR(255) | Nama jabatan/peran |
| company | VARCHAR(255) | Nama organisasi/instansi |
| period | VARCHAR(100) | Periode waktu |
| description | TEXT | Deskripsi singkat |

### Tabel `certificates`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key |
| title | VARCHAR(255) | Nama sertifikat |
| issuer | VARCHAR(255) | Penerbit sertifikat |
| date | VARCHAR(100) | Tanggal terbit |
| category | VARCHAR(100) | Kategori sertifikat |
| img | VARCHAR(255) | Path ke file gambar |

---

## Fitur Utama

- Responsive design (mobile & desktop)
- Data dinamis dari database MySQL
- Scrollable experience section
- Animated hero image
- Custom theme menggunakan CSS variables

---

## Tampilan & Fitur

### 1. Navbar

Navigasi tetap (fixed-top) yang transparan dengan efek shadow, berisi nama dan link ke setiap section. Navbar selalu terlihat di bagian atas halaman meski pengunjung scroll ke bawah. Di layar besar, link navigasi tampil berjajar. Di HP atau tablet, menu disembunyikan dan bisa dibuka lewat tombol ikon garis tiga (hamburger).

| Desktop Navbar | <img src="https://github.com/user-attachments/assets/899f77a5-1ad8-41e7-b3de-6cdc9a54148c" width="800" /> |
|---------------|----------------------------------------|
| Mobile Navbar | <img src="https://github.com/user-attachments/assets/66dbb430-db91-4be2-b3c2-b2de5fb2bfcc" width="450"/>|

#### Fitur Utama
- Selalu terlihat di atas saat halaman di-scroll
- Menu otomatis menyesuaikan tampilan di HP maupun desktop
- Link navigasi di-hardcode langsung di PHP (tidak lagi dari Vue data)
- Efek warna saat link di-hover

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**HTML (PHP):**
```html
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#home"><?= htmlspecialchars($name) ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Open navigation menu" title="Open navigation menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-2">
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#about">About Me</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#certificates">Certificates</a></li>
      </ul>
    </div>
  </div>
</nav>
```

- `<?= htmlspecialchars($name) ?>` → menampilkan nama dari variabel PHP, `htmlspecialchars` mencegah XSS.
- Link navigasi ditulis langsung di HTML karena bersifat statis (tidak perlu dari database).

**CSS:**
```css
.navbar {
  padding: 14px 0;
  border-bottom: 1px solid var(--border);
  transition: box-shadow .3s;
}
.navbar-brand {
  font-family: var(--font-display);
  font-size: 1.4rem;
  color: var(--text-dark) !important;
}
.nav-link-custom {
  color: var(--text-muted) !important;
  padding: 6px 14px !important;
  border-radius: 8px;
  transition: color .25s, background .25s;
}
.nav-link-custom:hover {
  color: var(--accent) !important;
  background: var(--accent-light);
}

```
- `border-bottom` menggunakan variabel `--border` dari `:root` untuk konsistensi warna.
- Efek hover mengubah warna teks menjadi accent (sage green) dan memberi background soft.
- `!important` digunakan untuk override warna default dari Bootstrap yang sudah terdefinisi.

</details>

---

### 2. Hero / Home

Halaman pertama yang dilihat saat membuka portfolio. Menampilkan foto profil, nama, title, dan kalimat perkenalan singkat. Ada dua tombol yang bisa diklik untuk langsung berpindah ke section About atau Certificates.

| Desktop View | Mobile View |
|--------------|------------|
|<img src="https://github.com/user-attachments/assets/79a65936-c06a-482e-bb18-282c33f695a8" width="500"/> |<img src= "https://github.com/user-attachments/assets/c21a8dd6-25d3-4ef0-8721-d0839ac68aaa" width="200" /> |

#### Fitur Utama
- Foto profil dengan hiasan dua lingkaran berputar di sekelilingnya
- Nama, title, dan deskripsi ditampilkan dari variabel PHP statis
- Dua tombol navigasi cepat ke section lain
- Di HP, foto tampil di atas dan teks di bawah

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**HTML (PHP):**
```html
<h1 class="hero-title mb-3"><?= htmlspecialchars($name) ?></h1>
<h4 class="hero-subtitle mb-4"><?= htmlspecialchars($title) ?></h4>
<p class="hero-desc text-muted mb-5"><?= htmlspecialchars($heroDesc) ?></p>
```

- `$name`, `$title`, `$heroDesc` → variabel PHP statis yang didefinisikan langsung di `index.php` (bukan dari database karena data pribadi jarang berubah).

**CSS:**

```css
.hero-section {
  min-height: 100vh;
  padding-top: 90px;
}
.hero-title {
  font-family: var(--font-display);
  font-size: clamp(2.4rem, 5vw, 3.6rem);
}
.hero-img-wrapper::before {
  content: '';
  position: absolute;
  inset: -12px;
  border-radius: 50%;
  border: 2px dashed #a8c5b0;
  animation: spin 18s linear infinite;
}
.hero-img-wrapper::after {
  content: '';
  position: absolute;
  inset: -24px;
  border-radius: 50%;
  border: 2px solid #edf4f0;
}
@keyframes spin { to { transform: rotate(360deg); } }
.hero-img {
  border-radius: 50%;
  object-fit: cover;
  border: 6px solid var(--bg-white);
  z-index: 1;
}
```

- `min-height: 100vh` → hero selalu mengisi satu layar penuh; `padding-top: 90px` agar tidak tertutup navbar fixed.
- `clamp(2.4rem, 5vw, 3.6rem)` → ukuran font judul responsif otomatis antara mobile dan desktop.
- `::before` dan `::after` → dua pseudo-element yang membentuk lingkaran dekoratif di sekeliling foto.
- `animation: spin 18s linear infinite` → lingkaran putus-putus (`::before`) berputar terus-menerus.
- `z-index: 1` → memastikan foto tampil di atas kedua lingkaran dekoratif.

</details>

---

### 3. About Me

Section ini memperkenalkan diri lebih dalam. Berisi teks deskripsi, bar kemampuan (skill), dan daftar pengalaman organisasi maupun akademik. Data skill dan pengalaman diambil dari database MySQL.

| Desktop View | Mobile View |
|--------------|------------|
|<img src="https://github.com/user-attachments/assets/5f846964-d690-4192-a8ee-6241e175ebea" width="500"/> |<img src="https://github.com/user-attachments/assets/6376a2be-4444-4acf-b64b-6ead05016aed" width="200" /> |

#### Fitur Utama
- Bar skill dengan persentase yang diambil dari tabel `skills` di database
- Daftar pengalaman dari tabel `experiences`, bisa di-scroll di dalam kotak tersendiri
- Setiap kartu pengalaman menampilkan jabatan, tempat, periode, dan deskripsi singkat
- Untuk menambah/mengubah data cukup edit langsung di database

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**PHP — Ambil data dari database:**
```php
$skillsResult = mysqli_query($conn, "SELECT * FROM skills ORDER BY id ASC");
$skills = [];
while ($row = mysqli_fetch_assoc($skillsResult)) {
    $skills[] = $row;
}

$expResult = mysqli_query($conn, "SELECT * FROM experiences ORDER BY id ASC");
$experiences = [];
while ($row = mysqli_fetch_assoc($expResult)) {
    $experiences[] = $row;
}
```

**HTML — Skill Bars:**
```html
<?php foreach ($skills as $skill): ?>
<div class="mb-3">
  <div class="d-flex justify-content-between mb-1">
    <span class="small fw-medium"><?= htmlspecialchars($skill['name']) ?></span>
    <span class="small text-muted"><?= (int)$skill['level'] ?>%</span>
  </div>
  <div class="progress progress-custom"
       role="progressbar"
       aria-valuenow="<?= (int)$skill['level'] ?>"
       aria-valuemin="0"
       aria-valuemax="100"
       aria-label="<?= htmlspecialchars($skill['name']) ?> skill level: <?= (int)$skill['level'] ?> percent"
       title="<?= htmlspecialchars($skill['name']) ?>: <?= (int)$skill['level'] ?>%">
    <div class="progress-bar progress-bar-custom"
         style="width: <?= (int)$skill['level'] ?>%"
         aria-hidden="true">
    </div>
  </div>
</div>
<?php endforeach; ?>
```

**HTML — Experience Scrollable:**
```html
<div class="experience-scroll">
  <?php foreach ($experiences as $exp): ?>
  <div class="experience-card mb-3 p-3">
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <p class="mb-0 fw-semibold"><?= htmlspecialchars($exp['role']) ?></p>
        <p class="mb-0 small text-muted"><?= htmlspecialchars($exp['company']) ?></p>
      </div>
      <span class="badge-period"><?= htmlspecialchars($exp['period']) ?></span>
    </div>
    <p class="mt-2 mb-0 small text-muted"><?= htmlspecialchars($exp['description']) ?></p>
  </div>
  <?php endforeach; ?>
</div>
```

- `foreach` → PHP menggantikan `v-for` dari Vue untuk merender data secara berulang.
- `htmlspecialchars()` → mencegah XSS dengan mengubah karakter spesial menjadi HTML entities.
- `(int)$skill['level']` → memastikan nilai level selalu berupa integer, bukan string.
- Kolom `description` di database sesuai dengan nama kolom tabel (berbeda dari `desc` di versi Vue sebelumnya).

**CSS:**

```css
.progress-bar-custom {
  background: var(--accent);
  transition: width 1.2s ease;
}
.experience-scroll {
  max-height: 380px;
  overflow-y: auto;
}
.experience-scroll::-webkit-scrollbar-thumb {
  background: #a8c5b0;
  border-radius: 99px;
}
.experience-card:hover { box-shadow: var(--shadow-md); }
.badge-period {
  background: var(--accent-light);
  color: var(--accent);
  border-radius: 99px;
  white-space: nowrap;
}
```

- `transition: width 1.2s ease` → animasi smooth saat progress bar "mengisi" dari kiri ke kanan.
- `max-height` + `overflow-y: auto` → daftar experience bisa di-scroll tanpa memanjangkan halaman.
- `::-webkit-scrollbar-thumb` → styling scrollbar custom agar sesuai palet warna sage green.
- `white-space: nowrap` → teks periode tidak terpotong ke baris baru.

</details>

---

### 4. Certificates

Menampilkan koleksi sertifikat dari tabel `certificates` di database dalam bentuk kartu bergambar. Setiap kartu menunjukkan foto sertifikat, kategori, nama sertifikat, penerbit, dan tanggal terbit.

| Desktop View | Mobile View |
|--------------|------------|
|<img src="https://github.com/user-attachments/assets/5fcb08ed-a116-427c-a288-bd7271033441" width="500"/> |<img src="https://github.com/user-attachments/assets/e9ba0260-8437-47d0-9145-e50e4d4af0a8" width="200" /> |

#### Fitur Utama
- Tampilan kartu berjejer rapi, otomatis menyesuaikan jumlah kolom di tiap ukuran layar
- Data diambil dari tabel `certificates` di database
- Efek hover pada kartu: terangkat dan gambar sedikit zoom
- Untuk menambah sertifikat cukup tambah baris baru di database

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**PHP — Ambil data dari database:**
```php
$certResult = mysqli_query($conn, "SELECT * FROM certificates ORDER BY id ASC");
$certificates = [];
while ($row = mysqli_fetch_assoc($certResult)) {
    $certificates[] = $row;
}
```

**HTML:**
```html
<div class="row g-4">
  <?php foreach ($certificates as $cert): ?>
  <div class="col-md-6 col-lg-4">
    <div class="cert-card h-100">
      <div class="cert-img-wrapper">
        <img src="<?= htmlspecialchars($cert['img']) ?>"
             alt="Certificate Image"
             title="Certificate: <?= htmlspecialchars($cert['title']) ?>"
             class="cert-img" />
        <span class="cert-category-overlay"><?= htmlspecialchars($cert['category']) ?></span>
      </div>
      <div class="cert-body">
        <h6 class="cert-title mb-1"><?= htmlspecialchars($cert['title']) ?></h6>
        <p class="small text-muted mb-2"><?= htmlspecialchars($cert['issuer']) ?></p>
        <p class="small text-muted mb-0">
          <i class="bi bi-calendar3 me-1" aria-hidden="true"></i><?= htmlspecialchars($cert['date']) ?>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
```

- `$cert['img']` → path gambar diambil dari kolom `img` di tabel `certificates`.
- PHP `foreach` menggantikan `v-for` dari Vue.

**CSS:**

```css
.cert-card:hover {
  box-shadow: var(--shadow-md);
  transform: translateY(-4px);
}
.cert-img {
  object-fit: cover;
  object-position: center top;
  transition: transform .4s ease;
}
.cert-card:hover .cert-img { transform: scale(1.05); }
.cert-category-overlay {
  position: absolute;
  top: 12px;
  left: 12px;
  background: rgba(255,255,255,0.92);
  backdrop-filter: blur(4px);
  border-radius: 99px;
}
.cert-body {
  display: flex;
  flex-direction: column;
  flex: 1;
}
```

- `translateY(-4px)` saat hover → efek kartu terangkat.
- `object-position: center top` → prioritaskan bagian atas gambar agar judul sertifikat tidak terpotong.
- `scale(1.05)` → gambar sedikit zoom saat kartu di-hover.
- `backdrop-filter: blur(4px)` → efek frosted glass pada badge kategori.
- `flex: 1` pada `.cert-body` → konten kartu terdistribusi rapi meski panjang teks berbeda.

</details>

---

### 5. Footer

Bagian paling bawah halaman yang menampilkan nama dan tiga ikon sosial media.

| Desktop Footer | <img src="https://github.com/user-attachments/assets/d42bcac4-7783-4f39-af2d-d4c9ed7aa03d" width="800" /> |
|---------------|----------------------------------------|
| Mobile Footer | <img src="https://github.com/user-attachments/assets/10571e8d-235f-4d8e-9b3e-b342943d6766" width="450"/>|

#### Fitur Utama
- Menampilkan nama pemilik portfolio dari variabel PHP `$name`
- Tiga ikon sosial media: GitHub, LinkedIn, dan Instagram
- Ikon berubah warna dan sedikit naik saat di-hover

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**HTML (PHP):**
```html
<footer class="footer-section text-center py-4">
  <p class="mb-1 small text-muted"><?= htmlspecialchars($name) ?></p>
  <div class="d-flex justify-content-center gap-3 mt-2">
    <a href="https://github.com/JenAM06" class="social-link" aria-label="GitHub profile" title="GitHub profile">
      <i class="bi bi-github" aria-hidden="true"></i>
      <span class="visually-hidden">GitHub</span>
    </a>
    <a href="https://www.linkedin.com/in/jen-agresia" class="social-link" aria-label="LinkedIn profile" title="LinkedIn profile">
      <i class="bi bi-linkedin" aria-hidden="true"></i>
      <span class="visually-hidden">LinkedIn</span>
    </a>
    <a href="https://www.instagram.com/agresia_jen/" class="social-link" aria-label="Instagram profile" title="Instagram profile">
      <i class="bi bi-instagram" aria-hidden="true"></i>
      <span class="visually-hidden">Instagram</span>
    </a>
  </div>
</footer>
```

**CSS:**

```css
.footer-section {
  border-top: 1px solid var(--border);
  background: var(--bg-light);
}
.social-link {
  display: inline-block;
  transition: color .2s, transform .2s;
}
.social-link:hover {
  color: var(--accent);
  transform: translateY(-2px);
}
```

- `border-top` → garis tipis pemisah footer dari section di atasnya.
- `display: inline-block` → diperlukan agar `transform` bisa bekerja pada elemen `<a>` yang secara default inline.
- `translateY(-2px)` saat hover → ikon sedikit naik untuk efek interaktif.

**Variabel `:root`:**
```css
:root {
  --accent:        #4a7c59;
  --accent-light:  #edf4f0;
  --accent-dark:   #355c42;
  --text-dark:     #1c2b22;
  --text-muted:    #6b7f72;
  --bg-white:      #ffffff;
  --bg-light:      #f5f8f6;
  --border:        #d6e4da;
  --radius:        12px;
  --shadow-sm:     0 1px 3px rgba(74,124,89,.08);
  --shadow-md:     0 4px 16px rgba(74,124,89,.12);
  --font-display:  'Playfair Display', serif;
  --font-body:     'DM Sans', sans-serif;
}
```

Semua warna, font, radius, dan shadow didefinisikan di `:root` sebagai CSS Custom Properties. Untuk mengubah tema warna cukup edit di satu tempat saja.

<details>
<summary>Penjelasan Base Style</summary>

**Base Style:**

```css
*, *::before, *::after { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
  font-family: var(--font-body);
  color: var(--text-dark);
  background-color: var(--bg-white);
  font-size: 15px;
  line-height: 1.6;
}
```

- `box-sizing: border-box` → padding dan border tidak menambah lebar elemen, layout lebih mudah diprediksi.
- `scroll-behavior: smooth` → navigasi anchor link berjalan dengan animasi scroll halus.

**Responsive:**

```css
@media (max-width: 768px) {
  .hero-img { width: 220px; height: 220px; }
}
@media (max-width: 576px) {
  .section-padding { padding: 64px 0; }
  .hero-section { padding-top: 80px; }
}
```

Breakpoint kustom untuk tampilan rapi di layar tablet dan mobile.

</details>

---
