<?php
require_once 'koneksi.php';

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

$certResult = mysqli_query($conn, "SELECT * FROM certificates ORDER BY id ASC");
$certificates = [];
while ($row = mysqli_fetch_assoc($certResult)) {
    $certificates[] = $row;
}

$name      = 'Jen Agresia Misti';
$title     = 'Laboratory Assistant & Tech Enthusiast';
$heroDesc  = 'An Information Systems student passionate about technology and data. I believe that the learning process is the key to growth.';
$aboutDesc = 'I am someone with a deep interest in technology and data development. I enjoy the learning process, exploring new tools, and developing both technical and leadership skills through various academic and organizational activities.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Jen Agresia</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<div id="app">

  <!-- ===== NAVBAR ===== -->
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

  <!-- ===== HOME / HERO ===== -->
  <section id="home" class="hero-section d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 order-2 order-lg-1">
          <p class="text-muted mb-1 small text-uppercase letter-spacing">Hi! I'm</p>
          <h1 class="hero-title mb-3"><?= htmlspecialchars($name) ?></h1>
          <h4 class="hero-subtitle mb-4"><?= htmlspecialchars($title) ?></h4>
          <p class="hero-desc text-muted mb-5"><?= htmlspecialchars($heroDesc) ?></p>
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

  <!-- ===== ABOUT ME ===== -->
  <section id="about" class="section-padding bg-light-custom">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2 class="section-title">About Me</h2>
        <div class="title-underline mx-auto"></div>
      </div>

      <div class="row g-5 align-items-start">

        <!-- Left: Description + Skills -->
        <div class="col-lg-6">
          <h5 class="fw-semibold mb-3">Who Am I?</h5>
          <p class="text-muted lh-lg mb-5"><?= htmlspecialchars($aboutDesc) ?></p>

          <h5 class="fw-semibold mb-4">My Skills</h5>
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
        </div>

        <!-- Right: Experience Scrollable -->
        <div class="col-lg-6">
          <h5 class="fw-semibold mb-4">Experience</h5>
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
        </div>

      </div>
    </div>
  </section>

  <!-- ===== CERTIFICATES ===== -->
  <section id="certificates" class="section-padding">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2 class="section-title">Certificates</h2>
        <div class="title-underline mx-auto"></div>
      </div>

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
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
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

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
