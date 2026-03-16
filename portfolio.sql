-- ============================================================
--  portfolio.sql
--  Import file ini di phpMyAdmin Laragon
-- ============================================================

CREATE DATABASE IF NOT EXISTS portfolio
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio;

-- ==================== TABEL SKILLS ====================
CREATE TABLE IF NOT EXISTS skills (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  name  VARCHAR(100) NOT NULL,
  level INT          NOT NULL
);

INSERT INTO skills (name, level) VALUES
  ('Communication',   85),
  ('Leadership',      90),
  ('Problem Solving', 85);

-- ==================== TABEL EXPERIENCES ====================
CREATE TABLE IF NOT EXISTS experiences (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  role        VARCHAR(255) NOT NULL,
  company     VARCHAR(255) NOT NULL,
  period      VARCHAR(100) NOT NULL,
  description TEXT         NOT NULL
);

INSERT INTO experiences (role, company, period, description) VALUES
  ('Laboratory Assistant – Introduction to IT',
   'Universitas Mulawarman', '2025',
   'Taught the use of Word, Excel, Canva, and AI tools for students academic needs.'),

  ('Laboratory Assistant Coordinator – Database Concepts',
   'Universitas Mulawarman', '2026 – Present',
   'Teaching and coordinating database lab sessions focused on ERD design and SQL development.'),

  ('Awardee – Sobat Bumi Pertamina Scholarship',
   'Pertamina Foundation', '2025 – Present',
   'Merit-based scholarship awarded for academic achievement and social contribution.'),

  ('Coordinator – Desa Energi Berdikari Sobat Bumi Samarinda',
   'Pertamina Foundation', '2026 – Present',
   'Leading a community empowerment program focused on sustainable energy.'),

  ('Staff – Professional Skill and Development',
   'Information System Association (INFORSA)', '2024 – 2025',
   'Contributed to developing soft skills and professional competencies through organizational programs.'),

  ('Event Coordinator & Committee Head – 6 Campus Events',
   'Information System Association (INFORSA)', '2024 – 2025',
   'Managed seminars, national webinars, guest lectures, and IT workshops.');

-- ==================== TABEL CERTIFICATES ====================
CREATE TABLE IF NOT EXISTS certificates (
  id       INT AUTO_INCREMENT PRIMARY KEY,
  title    VARCHAR(255) NOT NULL,
  issuer   VARCHAR(255) NOT NULL,
  date     VARCHAR(100) NOT NULL,
  category VARCHAR(100) NOT NULL,
  img      VARCHAR(255) NOT NULL
);

INSERT INTO certificates (title, issuer, date, category, img) VALUES
  ('Data Science Tools Training',
   'Dicoding Indonesia', 'February 2026', 'Data Science', 'aset/dicoding.png'),

  ('Public Lecture Committee Chair',
   'Universitas Mulawarman', 'December 2025', 'Organizational Experience', 'aset/KC.png'),

  ('Staff – PSD Department',
   'INFORSA', '2025', 'Organizational Experience', 'aset/staff.png');
