<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        $hari_ini = date('Y-m-d');

        $data['tugas'] = [
            [
                'judul' => 'Membuat Website Sederhana',
                'mapel' => 'Pemrograman Web',
                'deadline' => $hari_ini,
                'deskripsi' => 'Buat halaman web dengan HTML, CSS, dan PHP.',
                'foto' => 'tugas_web.jpg',
                'warna' => 'biru',
                'ikon' => '</>'
            ],
            [
                'judul' => 'Latihan Query SQL',
                'mapel' => 'Basis Data',
                'deadline' => $hari_ini,
                'deskripsi' => 'Kerjakan latihan query SQL yang diberikan di kelas.',
                'foto' => 'tugas_sql.jpg',
                'warna' => 'ungu',
                'ikon' => '▤'
            ],
            [
                'judul' => 'Rangkuman Materi',
                'mapel' => 'Bahasa Indonesia',
                'deadline' => date('Y-m-d', strtotime('+2 days')),
                'deskripsi' => 'Buat rangkuman materi yang sudah dipelajari.',
                'foto' => 'tugas_rangkuman.jpg',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'judul' => 'Latihan Matematika',
                'mapel' => 'Matematika',
                'deadline' => date('Y-m-d', strtotime('+3 days')),
                'deskripsi' => 'Selesaikan soal latihan pada buku catatan.',
                'foto' => 'tugas_matematika.jpg',
                'warna' => 'hijau',
                'ikon' => '∑'
            ],
            [
                'judul' => 'Tugas PKN',
                'mapel' => 'PKN',
                'deadline' => date('Y-m-d', strtotime('+4 days')),
                'deskripsi' => 'Kerjakan soal dari materi yang dibahas.',
                'foto' => 'tugas_pkn.jpg',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'judul' => 'Desain Halaman Login',
                'mapel' => 'Pemrograman Web',
                'deadline' => date('Y-m-d', strtotime('+1 day')),
                'deskripsi' => 'Buat desain halaman login menggunakan CSS.',
                'foto' => 'tugas_login.jpg',
                'warna' => 'biru',
                'ikon' => '</>'
            ],
            [
                'judul' => 'Normalisasi Database',
                'mapel' => 'Basis Data',
                'deadline' => date('Y-m-d', strtotime('+5 days')),
                'deskripsi' => 'Buat normalisasi tabel dari studi kasus.',
                'foto' => 'tugas_normalisasi.jpg',
                'warna' => 'ungu',
                'ikon' => '▤'
            ],
            [
                'judul' => 'Latihan Algoritma',
                'mapel' => 'Pemrograman Dasar',
                'deadline' => date('Y-m-d', strtotime('+6 days')),
                'deskripsi' => 'Buat algoritma untuk menghitung nilai.',
                'foto' => 'tugas_algoritma.jpg',
                'warna' => 'hijau',
                'ikon' => '</>'
            ]
        ];

        $data['hari_ini'] = $hari_ini;

        $this->load->view('tugas', $data);
    }
}
