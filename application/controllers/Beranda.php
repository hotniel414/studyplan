<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $data['tanggal'] = $hari[date('l')] . ', ' .
            date('d') . ' ' . $bulan[(int) date('n')] .
            ' ' . date('Y');

        // Contoh jadwal pelajaran
        $data['jadwal'] = [
            [
                'jam' => '07:00 - 07:45',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'jam' => '07:45 - 08:30',
                'mapel' => 'Bahasa Indonesia',
                'ruang' => 'Ruang 10',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'jam' => '08:30 - 09:15',
                'mapel' => 'Pemrograman Web',
                'ruang' => 'Ruang 11',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'abu',
                'ikon' => '☕'
            ],
            [
                'jam' => '10:15 - 11:00',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'jam' => '11:00 - 11:45',
                'mapel' => 'PKN',
                'ruang' => 'Ruang 10',
                'warna' => 'jingga',
                'ikon' => '♙'
            ]
        ];

        // Contoh tugas. Tanggal tenggat otomatis hari ini.
        $hari_ini = date('Y-m-d');

        $data['tugas'] = [
            [
                'judul' => 'Membuat Website Sederhana',
                'mapel' => 'Pemrograman Web',
                'deskripsi' => 'Buat halaman web dengan HTML, CSS, dan PHP.',
                'deadline' => $hari_ini,
                'selesai' => false,
                'ikon' => '</>',
                'warna' => 'biru'
            ],
            [
                'judul' => 'Latihan Query SQL',
                'mapel' => 'Basis Data',
                'deskripsi' => 'Kerjakan latihan query SQL yang diberikan di kelas.',
                'deadline' => $hari_ini,
                'selesai' => false,
                'ikon' => '▤',
                'warna' => 'ungu'
            ],
            [
                'judul' => 'Rangkuman Materi',
                'mapel' => 'Bahasa Indonesia',
                'deskripsi' => 'Buat rangkuman materi yang sudah dipelajari.',
                'deadline' => date('Y-m-d', strtotime('+2 days')),
                'selesai' => true,
                'ikon' => '文',
                'warna' => 'merah'
            ],
            [
                'judul' => 'Latihan Matematika',
                'mapel' => 'Matematika',
                'deskripsi' => 'Selesaikan soal latihan pada buku catatan.',
                'deadline' => date('Y-m-d', strtotime('+3 days')),
                'selesai' => false,
                'ikon' => '∑',
                'warna' => 'hijau'
            ],
            [
                'judul' => 'Tugas PKN',
                'mapel' => 'PKN',
                'deskripsi' => 'Kerjakan soal dari materi yang dibahas.',
                'deadline' => date('Y-m-d', strtotime('+4 days')),
                'selesai' => true,
                'ikon' => '♙',
                'warna' => 'jingga'
            ],
            [
                'judul' => 'Desain Halaman Login',
                'mapel' => 'Pemrograman Web',
                'deskripsi' => 'Buat desain halaman login menggunakan CSS.',
                'deadline' => date('Y-m-d', strtotime('+1 day')),
                'selesai' => false,
                'ikon' => '</>',
                'warna' => 'biru'
            ],
            [
                'judul' => 'Normalisasi Database',
                'mapel' => 'Basis Data',
                'deskripsi' => 'Buat normalisasi tabel dari studi kasus.',
                'deadline' => date('Y-m-d', strtotime('+5 days')),
                'selesai' => false,
                'ikon' => '▤',
                'warna' => 'ungu'
            ],
            [
                'judul' => 'Latihan Algoritma',
                'mapel' => 'Pemrograman Dasar',
                'deskripsi' => 'Buat algoritma untuk menghitung nilai.',
                'deadline' => date('Y-m-d', strtotime('+6 days')),
                'selesai' => true,
                'ikon' => '</>',
                'warna' => 'hijau'
            ]
        ];

        // Menghitung statistik secara otomatis
        $data['total_tugas'] = count($data['tugas']);

        $data['tugas_selesai'] = count(array_filter(
            $data['tugas'],
            function ($t) {
                return $t['selesai'];
            }
        ));

        $data['tugas_belum'] = count(array_filter(
            $data['tugas'],
            function ($t) {
                return !$t['selesai'];
            }
        ));

        $data['tugas_hari_ini'] = count(array_filter(
            $data['tugas'],
            function ($t) use ($hari_ini) {
                return $t['deadline'] === $hari_ini;
            }
        ));

        // Hanya tugas yang tenggatnya hari ini
        $data['daftar_tugas_hari_ini'] = array_values(array_filter(
            $data['tugas'],
            function ($t) use ($hari_ini) {
                return $t['deadline'] === $hari_ini;
            }
        ));

        $this->load->helper('url');
        $this->load->view('beranda', $data);
    }
}