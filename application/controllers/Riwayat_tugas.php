<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_tugas extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        $hari_ini = date('Y-m-d');

        $data['tugas'] = [
            [
                'judul' => 'Membuat Website Sederhana',
                'mapel' => 'Pemrograman Web',
                'deadline' => date('Y-m-d', strtotime('-10 days')),
                'deskripsi' => 'Buat halaman web dengan HTML, CSS, dan PHP.',
                'foto' => 'tugas_web.jpg',
                'warna' => 'biru',
                'ikon' => '</>',
                'selesai' => true
            ],
            [
                'judul' => 'Latihan Query SQL',
                'mapel' => 'Basis Data',
                'deadline' => date('Y-m-d', strtotime('-8 days')),
                'deskripsi' => 'Kerjakan latihan query SQL yang diberikan di kelas.',
                'foto' => 'tugas_sql.jpg',
                'warna' => 'ungu',
                'ikon' => '▤',
                'selesai' => true
            ],
            [
                'judul' => 'Rangkuman Materi',
                'mapel' => 'Bahasa Indonesia',
                'deadline' => date('Y-m-d', strtotime('-5 days')),
                'deskripsi' => 'Buat rangkuman materi yang sudah dipelajari.',
                'foto' => 'tugas_rangkuman.jpg',
                'warna' => 'merah',
                'ikon' => '文',
                'selesai' => false
            ],
            [
                'judul' => 'Latihan Matematika',
                'mapel' => 'Matematika',
                'deadline' => date('Y-m-d', strtotime('-3 days')),
                'deskripsi' => 'Selesaikan soal latihan pada buku catatan.',
                'foto' => 'tugas_matematika.jpg',
                'warna' => 'hijau',
                'ikon' => '∑',
                'selesai' => false
            ],
            [
                'judul' => 'Tugas PKN',
                'mapel' => 'PKN',
                'deadline' => date('Y-m-d', strtotime('-1 day')),
                'deskripsi' => 'Kerjakan soal dari materi yang dibahas.',
                'foto' => 'tugas_pkn.jpg',
                'warna' => 'jingga',
                'ikon' => '♙',
                'selesai' => true
            ]
        ];

        $data['hari_ini'] = $hari_ini;

        $this->load->view('riwayat_tugas', $data);
    }
}