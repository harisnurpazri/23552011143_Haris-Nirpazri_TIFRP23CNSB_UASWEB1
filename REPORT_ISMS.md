---

## Teknik Audit Internal — Penjelasan Rinci (Bahasa Indonesia)

Bagian ini menjelaskan teknik audit internal yang dapat digunakan untuk memverifikasi penerapan kontrol keamanan dalam proyek Meubeul Harisproject, disusun agar auditor tim internal (IT / Security) dapat langsung menerapkan prosedur.

1) Tujuan dan Prinsip Audit Internal
- Tujuan: menilai efektifitas kontrol, menemukan kelemahan, memastikan kepatuhan terhadap kebijakan internal dan ISO 27001.
- Prinsip: independensi (auditor tidak menilai pekerjaan yang mereka sendiri lakukan), objektivitas, bukti yang dapat diandalkan, dan keterlacakan (traceability).

2) Tahapan Audit Internal
- Perencanaan: tentukan ruang lingkup (mis. aplikasi web, DB, CI), kriteria audit (ISO 27001 clause mapping), sumber daya, dan jadwal.
- Persiapan: kumpulkan artefak (dokumen kebijakan, config, log, PR history), buat checklist, siapkan alat (scanner, curl, phpunit, composer audit).
- Pelaksanaan (lapangan): lakukan teknik pengumpulan bukti (lihat poin 3). Catat temuan sementara dan ambil sampel bukti.
- Pelaporan: susun laporan temuan dengan kategori risiko, rekomendasi, dan pemilik tindakan korektif beserta tenggat waktu.
- Tindak Lanjut: verifikasi perbaikan sesuai jadwal, dokumentasikan bukti penutupan (closing evidence).

3) Teknik Pengumpulan Bukti (Metode Audit)
- Inspeksi / Inspection: review dokumen, source code, konfigurasi. Contoh: buka `config/session.php`, `app/Http/Middleware/SecureHeaders.php` dan catat pengaturan yang relevan.
- Observasi: lihat langsung proses (mis. demonstrasi login, alur pembuatan pesanan) untuk memastikan praktik sesuai prosedur.
- Wawancara: tanyakan kepada developer/ops/admin terkait kebijakan deployment, pengelolaan kredensial, dan backup.
- Re-performance (Pengujian Ulang): auditor melakukan ulang suatu proses untuk memastikan kontrol bekerja (mis. restore backup di environment terisolasi).
- Konfirmasi pihak ketiga: minta bukti dari penyedia layanan (hosting, monitoring) jika perlu.
- Analisis data: gunakan log, database sample, dan output audit tool untuk menilai kejadian abnormal.

4) Teknik Sampling
- Random sampling: pilih sample secara acak untuk pengujian operasi (mis. 10% PR terakhir untuk pemeriksaan review).
- Judgmental (non-random) sampling: auditor memilih sample berdasarkan risiko (mis. fitur pembayaran, endpoints admin).
- Stratified sampling: bagi data menjadi kelompok (mis. high‑privilege accounts vs normal accounts) lalu ambil sample dari tiap strata.

5) Pengujian Teknis (Checklist dan Contoh Langkah)
- Pemeriksaan konfigurasi:
   - Periksa `APP_KEY` dan bahwa `.env` tidak dikomit.
   - Periksa `SESSION_*` cookie flags di `config/session.php`.
   - Verifikasi middleware `ForceHttps`, `SecureHeaders`, dan CSRF middleware aktif.
- Code review & SAST:
   - Jalankan PHPStan/PHPCS, review temuan kritis. Periksa `phpstan-basic.neon` dan konfigurasi linting.
- Dependency & vulnerability scan:
   - `composer audit` dan `npm audit`. Catat semua temuan berisiko tinggi dan rencana mitigasi.
- Dynamic testing / Penetration test (scope terbatas):
   - Jalankan scanning otomatis (OWASP ZAP, Nikto) pada environment staging.
   - Jalankan tes manual pada titik kritis (login, upload file, payment endpoints) oleh auditor kompeten atau 3rd party.
- Log & monitoring verification:
   - Periksa `storage/logs/laravel.log` sample, pastikan log sensitive data tidak terekam.
- Backup & restore test:
   - Verifikasi backup ada, enkripsi, dan lakukan restore uji coba di lingkungan terisolasi.
- Access & privilege review:
   - Ambil daftar user admin, periksa akses GitHub (teams), database users, dan pastikan prinsip least privilege.

6) Teknik Pengumpulan Bukti Elektronik (Commands & Tools)
- Contoh perintah untuk auditor (jalankan pada environment yang tepat):
```bash
# cek secure headers
curl -I https://example.com

# dependency checks
composer audit || true
npm audit --json || true

# cek konfigurasi session
php -r "require 'vendor/autoload.php'; echo file_get_contents('config/session.php');"

# cek log terbaru (hanya contoh, jangan expose isi sensitif)
tail -n 200 storage/logs/laravel.log
---

<!-- Reformatted and structured ISMS report (ringkasan & checklist) -->

# ISMS Report — Meubeul Harisproject

**Versi:** 1.1  
**Tanggal:** 2026-01-30  
**Ruang lingkup:** Aplikasi web Laravel (kode sumber, database, asset, deployment staging/production).  
**Standar acuan:** ISO/IEC 27001:2013 (Annex A)

---

## Daftar Isi
1. Ringkasan Eksekutif
2. Ruang Lingkup & Aset
3. Metode Penilaian Risiko
4. Pemetaan Kontrol ISO 27001 (Ringkas)
5. Rekomendasi Teknis & Quick Wins
6. Teknik Audit Internal (Detail)
7. Checklist Audit Internal (Siap Pakai)
8. Roadmap Remediasi
9. Lampiran — Perintah & Bukti Teknis
10. Template Temuan

---

## 1. Ringkasan Eksekutif
Dokumen ini menyajikan pemetaan kontrol keamanan (ISO 27001) terhadap artefak proyek Meubeul Harisproject, rekomendasi mitigasi, dan panduan audit internal terperinci. Tujuan: membentuk baseline ISMS yang auditable dan dapat ditindaklanjuti.

## 2. Ruang Lingkup & Aset
- Scope: repository, runtime (PHP/Laravel), MySQL, assets publik, build pipeline.  
- Aset penting: kode (`app/`, `resources/`), konfigurasi (`.env`, `config/`), DB dump (`meubeul_db.sql`), skrip (`scripts/`), gambar publik (`public/images/`).

## 3. Metode Penilaian Risiko
1. Identifikasi aset & klasifikasi (Confidential / Internal / Public).  
2. Identifikasi ancaman & kerentanan.  
3. Analisis dampak & kemungkinan → skor risiko.  
4. Pilih perlakuan risiko: Reduce / Accept / Transfer / Avoid.  
5. Dokumentasi dan pemantauan berkala.

## 4. Pemetaan Kontrol ISO 27001 (Ringkas)
- A.5 Kebijakan: Tambahkan `POLICIES.md` di `docs/`.  
- A.6 Organisasi: dokumentasikan peran (Owner, Admin, Dev, DevOps).  
- A.8 Aset: `ASSETS.md` (inventory) → tempatkan di `docs/`.  
- A.9 Akses: middleware (`AdminMiddleware.php`), `config/auth.php`, `config/session.php`.  
- A.10 Kriptografi: pakai HTTPS, `APP_KEY` aman.  
- A.12 Operasional: dependency locks, backup, logging (`storage/logs/`).  
- A.14 SDLC: PR review, `phpstan`, unit tests (`tests/`).

## 5. Rekomendasi Teknis & Quick Wins
- Pastikan `.env` ada di `.gitignore` dan tidak berisi kredensial.  
- Terapkan `SESSION_SECURE_COOKIE=true`, `SESSION_HTTP_ONLY=true`, `SESSION_SAME_SITE=strict`.  
- Aktifkan Force HTTPS dan header keamanan (CSP, HSTS, X-Frame-Options).  
- Jadwalkan `composer audit` dan `npm audit` di CI (Dependabot/Snyk).  
- Simpan backup terenkripsi di lokasi terpisah.

## 6. Teknik Audit Internal (Detail)
Bagian ini menjelaskan metode audit internal yang dapat digunakan auditor internal (IT/Security):

**Tujuan & prinsip**
- Menilai efektivitas kontrol, menemukan celah, dan memastikan kepatuhan. Prinsip: independensi, objektivitas, bukti dapat diverifikasi.

**Tahapan audit**
1. Perencanaan: scope, kriteria ISO, timeline, auditor.  
2. Persiapan: kumpulkan artefak (config, log, PR, CI).  
3. Pelaksanaan: pemeriksaan teknis, wawancara, sampling bukti.  
4. Pelaporan: temuan, risiko, rekomendasi, owner, tenggat.  
5. Tindak lanjut: verifikasi penutupan dan bukti.

**Teknik pengumpulan bukti**
- Inspeksi dokumen & kode (`config/*.php`, middleware, routes).  
- Observasi proses (login demo, checkout demo).  
- Wawancara pihak terkait (dev/ops).  
- Re-performance: ulangi restore backup atau deployment di environment terisolasi.

**Sampling**
- Kombinasikan random dan judgmental sampling; fokus ke area berisiko tinggi.

**Pengujian teknis**
- Periksa konfigurasi: `.env` tidak dikomit, `APP_KEY` ada, cookie flags benar.  
- Jalankan SAST/linters: PHPStan, PHPCS.  
- Dependency scan: `composer audit`, `npm audit`.  
- Dynamic scan: OWASP ZAP pada staging; tes manual pada endpoint kritis.

## 7. Checklist Audit Internal (Siap Pakai)
| No | Area | Pemeriksaan | Bukti |
|---:|------|------------|-------|
| 1 | Scope & Kebijakan | ISMS scope & policy ada | `docs/POLICIES.md` |
| 2 | Akses | Middleware admin aktif, role checks | `routes/web.php`, `AdminMiddleware.php` |
| 3 | Konfigurasi | `.env` tidak dikomit, secure cookies | `.gitignore`, `config/session.php` |
| 4 | Dependency | `composer.lock` & audit | output `composer audit` |
| 5 | Logging | Log retention & sanitization | sample logs (`storage/logs/`) |
| 6 | Backup | Backup schedule & restore test | backup files & restore logs |

## 8. Roadmap Remediasi
- 0–1 bulan: tambahkan `POLICIES.md`, `ASSETS.md`, `INCIDENT_RESPONSE.md`.  
- 1–3 bulan: implementasi secure headers, secure cookies, Dependabot, CI audit.  
- 3–6 bulan: monitoring terpusat, audit penuh, perbaikan temuan prioritas.

## 9. Lampiran — Perintah & Bukti Teknis (Contoh)
```bash
# cek header keamanan
curl -I https://example.com

# audit dependency
composer audit || true
npm audit --json || true

# unit tests
./vendor/bin/phpunit --testdox

# cek log (contoh)
tail -n 200 storage/logs/laravel.log
```

## 10. Template Temuan (Singkat)
- **ID**: AUD-YYYY-NNN  
- **Area**: (mis. A.9 Access Control)  
- **Deskripsi**: ringkas temuan  
- **Bukti**: file/command/screenshot  
- **Risiko**: High/Medium/Low  
- **Rekomendasi**: tindakan korektif  
- **Owner**: nama pemilik  
- **Target close**: tanggal  
- **Verifikasi**: bukti penutupan (commit, screenshot)

---

Prepared by project security reviewer.

- 0–1 month: Add `POLICIES.md`, `INCIDENT_RESPONSE.md`, and `ASSETS.md`. Remove sensitive scripts or mark them dev-only.
- 1–3 months: Harden config (secure cookies, CSP headers), enforce HTTPS, enable Dependabot, schedule `composer audit` in CI.
- 3–6 months: Implement continuous monitoring and centralize logs, perform the first full internal audit and remediate findings.
- Ongoing: Annual risk assessment and internal audits aligned to ISO 27001 clauses.

---

## Suggested Tools & Artefacts

- Dependency scanning: `composer audit`, `npm audit`, Dependabot/Snyk
- Static analysis: PHPStan, PHPCS, ESLint
- Secrets scanning: GitHub secret scanning or `truffleHog`/`gitleaks`
- CI/CD: GitHub Actions to run tests, linting, vulnerability checks
- Logging and monitoring: ELK stack, Papertrail, or hosting provider's logging

---

## Appendix: Example Commands Auditors Can Run Locally

```bash
# Check for committed secrets (light check)
grep -R "PASSWORD\|API_KEY\|SECRET\|AWS_" -n . || true

# Verify secure headers (replace with local host)
curl -I https://example.com

# Run dependency checks
composer audit || true
npm audit --json || true

# Run unit tests
./vendor/bin/phpunit --testdox
```

---

## Conclusion

This report provides a practical mapping from ISO 27001 to the application artifacts and code locations, a risk assessment approach, concrete control recommendations, and a clear internal audit process. Use this as a living document; update it whenever the architecture or hosting changes.


*Prepared by project security reviewer.*
