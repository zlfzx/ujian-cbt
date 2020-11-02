# Ujian Berbasis Web

> ## [Project baru menggunakan Laravel](https://github.com/zulfizz/cbt)

UjianCBT adalah sebuah aplikasi ujian berbasis komputer yang dibangun dengan menggunakan framework Codeigniter 3. Aplikasi ini memiliki tiga halaman utama yang bisa diakses yaitu halaman untuk siswa, guru, dan halaman untuk admin. Halaman siswa bisa diakses oleh siswa untuk melaksanakan ujian. Sedangkan halaman guru bisa digunakan guru untuk login dan mengelola soal maupun nilai. Lalu ada halaman admin yang digunakan untuk mengelola aplikasi ini. Codeigniter sendiri adalah sebuah kerangka kerja aplikasi yang digunakan untuk membangun sebuah website menggunakan PHP.

## Fitur
Beberapa fitur pada aplikasi ini antara lain,
1. Halaman admin untuk mengelola data siswa, guru, mata pelajaran, soal, nilai, dll,
2. Guru bisa login ke aplikasi untuk mengelola soal dan melihat nilai sesuai mata pelajaran yang diampunya,
3. Lupa password untuk siswa,
4. Riwayat ujian siswa,
5. Hasil/nilai ujian siswa,
6. Dll.

## Persyaratan Server
Untuk menggunakan aplikasi ini maka dibutuhkan spesifikasi server dengan aplikasi sebagai berikut:
1. PHP versi 5.6 atau yang terbaru.
2. MySQL

## Instalasi
Instalasi aplikasi mencakup pengaturan web server dan database untuk aplikasi. Langkah-langkahnya sebaga berikut.
1. Letakan aplikasi pada direktori `htdocs` atau pada direktori `/var/www/` di web server.
2. Import database bernama `cbt.sql` yang ada di direktori aplikasi.
3. Buka browser dan akses halaman admin `http://localhost/ujian/admin`. Login menggunakan username dan password admin yang ada pada database.
4. Aplikasi sudah bisa digunakan.
