# Portfolio

Portfolio website pribadi. Menampilkan informasi profil, skill, pengalaman, dan sertifikat.
> Jen Agresia Misti | 2409116007 | A'24 | MINPRO 1

---

## Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| **HTML5** | Struktur dan markup halaman |
| **CSS3** | Custom styling, animasi, dan variabel warna |
| **Bootstrap 5.3** | Layout grid, navbar, komponen responsif |
| **Bootstrap Icons 1.10.5** | Icon sosial media dan UI |
| **Vue.js 3** | Reaktivitas data, rendering dinamis |
| **Google Fonts** | Font `Playfair Display` dan `DM Sans` |

---

## Struktur File

```
portfolio/
├── index.html
├── style.css
└── aset/
    ├── profil.jpeg
    ├── dicoding.png
    ├── KC.png
    └── staff.png
```

---

## Tampilan & Fitur

### 1. Navbar

Navigasi tetap (fixed-top) yang transparan dengan efek shadow, berisi nama dan link ke setiap section. Navbar selalu terlihat di bagian atas halaman meski pengunjung scroll ke bawah. Di layar besar, link navigasi tampil berjajar. Di HP atau tablet, menu disembunyikan dan bisa dibuka lewat tombol ikon garis tiga (hamburger).

<img width="1871" height="128" alt="image" src="https://github.com/user-attachments/assets/899f77a5-1ad8-41e7-b3de-6cdc9a54148c" />

#### Fitur Utama
- Selalu terlihat di atas saat halaman di-scroll
- Menu otomatis menyesuaikan tampilan di HP maupun desktop
- Link navigasi muncul otomatis sesuai data yang didefinisikan
- Efek warna saat link di-hover

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**HTML:**
```html

  <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#home">{{ name }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false"
              aria-label="Open navigation menu" title="Open navigation menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav gap-2">
          <li class="nav-item" v-for="link in navLinks" :key="link.href">
            <a class="nav-link nav-link-custom" :href="link.href">{{ link.label }}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

```
- `fixed-top` → navbar selalu menempel di atas layar saat halaman di-scroll.
- `navbar-expand-lg` → navbar tampil horizontal di layar besar; di mobile menjadi collapsed (hamburger).
- `data-bs-toggle="collapse"` + `data-bs-target="#navbarNav"` → Bootstrap JS yang mengatur tombol hamburger membuka/menutup menu.
- `{{ name }}` → menampilkan nama dari variabel `name` di Vue `data()`.
- `v-for="link in navLinks"` → Vue merender `<li>` secara otomatis untuk setiap item dalam array `navLinks`.
- `:href="link.href"` dan `{{ link.label }}` → href dan teks link diambil dinamis dari tiap objek di array.

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
|<img src="https://github.com/user-attachments/assets/9486e199-966e-45c3-b312-51fda6cd2bba" width="500"/> |<img src= "https://github.com/user-attachments/assets/c21a8dd6-25d3-4ef0-8721-d0839ac68aaa" width="150" /> |

#### Fitur Utama
- Foto profil dengan hiasan dua lingkaran berputar di sekelilingnya
- Nama, title (teks warna hijau), dan deskripsi ditampilkan dari data yang sudah diisi
- Dua tombol navigasi cepat ke section lain
- Di HP, foto tampil di atas dan teks di bawah

<details>
<summary>📄 Penjelasan Kode — HTML & CSS</summary>

**HTML:**

```html
<section id="home" class="hero-section d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 order-2 order-lg-1">
          <p class="text-muted mb-1 small text-uppercase letter-spacing">Hi! I'm</p>
          <h1 class="hero-title mb-3">{{ name }}</h1>
          <h4 class="hero-subtitle mb-4">{{ title }}</h4>
          <p class="hero-desc text-muted mb-5">{{ heroDesc }}</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="#about" class="btn btn-primary-custom">About Me</a>
            <a href="#certificates" class="btn btn-outline-custom">View Certificates</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
          <div class="hero-img-wrapper">
            <img src="aset/profil.jpeg"
                 alt="Profile Photo of Jen Agresia"
                 title="Profile Photo of Jen Agresia"
                 class="hero-img" />
          </div>
        </div>
      </div>
    </div>
  </section>

```

- `order-2 order-lg-1` / `order-1 order-lg-2` → di mobile foto tampil di atas teks; di desktop teks di kiri dan foto di kanan.
- `{{ name }}`, `{{ title }}`, `{{ heroDesc }}` → semua konten teks diambil dari `data()` Vue.js.
- `flex-wrap` → jika layar terlalu sempit, tombol CTA otomatis turun ke baris baru.
- `btn-primary-custom` → tombol solid; `btn-outline-custom` → tombol transparan dengan border.

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

Section ini memperkenalkan diri lebih dalam. Berisi teks deskripsi, bar kemampuan (skill), dan daftar pengalaman organisasi maupun akademik. Daftar pengalaman bisa di-scroll jika jumlahnya banyak tanpa membuat halaman jadi terlalu panjang.

| Desktop View | Mobile View |
|--------------|------------|
|<img src="https://github.com/user-attachments/assets/5f846964-d690-4192-a8ee-6241e175ebea" width="500"/> |<img src="https://github.com/user-attachments/assets/6376a2be-4444-4acf-b64b-6ead05016aed" width="150" /> |

#### Fitur Utama
- Bar skill dengan persentase yang bisa diubah langsung dari data
- Daftar pengalaman bisa di-scroll di dalam kotak tersendiri
- Setiap kartu pengalaman menampilkan jabatan, tempat, periode, dan deskripsi singkat
- Semua data skill dan pengalaman cukup diisi sekali di bagian data Vue

<details>
<summary>Penjelasan Kode HTML & CSS</summary>

**HTML — Skill Bars:**

```html
<div v-for="skill in skills" :key="skill.name" class="mb-3">
    <div class="d-flex justify-content-between mb-1">
        <span class="small fw-medium">{{ skill.name }}</span>
        <span class="small text-muted">{{ skill.level }}%</span>
    </div>
    <div class="progress progress-custom"
        role="progressbar":aria-valuenow="skill.level"
        aria-valuemin="0"
        aria-valuemax="100":aria-label="skill.name + ' skill level: ' + skill.level + ' percent'"
        :title="skill.name + ': ' + skill.level + '%'">
        <div class="progress-bar progress-bar-custom"
            :style="{ width: skill.level + '%' }"
            aria-hidden="true">
        </div>
    </div>
</div>

```

- `v-for="skill in skills"` → merender satu blok progress bar untuk setiap item di array `skills`.
- `:style="{ width: skill.level + '%' }"` → lebar bar ditentukan langsung dari nilai `level` di data Vue.
- `role="progressbar"` + `:aria-valuenow` → untuk aksesibilitas screen reader.

**HTML — Experience Scrollable:**

```html
<div class="col-lg-6">
    <h5 class="fw-semibold mb-4">Experience</h5>
    <div class="experience-scroll">
        <div v-for="exp in experiences" :key="exp.role" class="experience-card mb-3 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                  <p class="mb-0 fw-semibold">{{ exp.role }}</p>
                  <p class="mb-0 small text-muted">{{ exp.company }}</p>
                </div>
                <span class="badge-period">{{ exp.period }}</span>
            </div>
              <p class="mt-2 mb-0 small text-muted">{{ exp.desc }}</p>
        </div>
    </div>
</div>
```

- `v-for="exp in experiences"` → merender kartu untuk setiap objek di array `experiences`.
- `.experience-scroll` → wrapper dengan `max-height` dan `overflow-y: auto` agar kartu bisa di-scroll.
- `badge-period` → tag kecil berbentuk pill untuk menampilkan periode waktu.

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
