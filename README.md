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

## 🌐 Tampilan & Fitur

### 1. Navbar

<img width="1884" height="110" alt="image" src="https://github.com/user-attachments/assets/bc45f873-e574-494d-89d1-e2f2ea044aa4" />


Navigasi tetap (fixed-top) yang transparan dengan efek shadow, berisi nama dan link ke setiap section.

<details>
<summary>📄 Penjelasan Kode — HTML & CSS</summary>

**HTML:**
```html

  
    {{ name }}
    
      
        {{ link.label }}
      
    
  

```
- `fixed-top` → navbar selalu menempel di atas layar saat scroll.
- `v-for="link in navLinks"` → Vue.js merender link navigasi secara dinamis dari array `navLinks` di dalam `data()`.
- `{{ name }}` → menampilkan nama dari data Vue secara reaktif.

**CSS:**
```css
.navbar {
  padding: 14px 0;
  border-bottom: 1px solid var(--border);
  transition: box-shadow .3s;
}

.nav-link-custom:hover {
  color: var(--accent) !important;
  background: var(--accent-light);
}
```
- `border-bottom` menggunakan variabel `--border` dari `:root` untuk konsistensi warna.
- Efek hover mengubah warna teks menjadi accent (sage green) dan memberi background soft.

</details>

---
