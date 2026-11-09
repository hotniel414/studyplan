<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekretaris extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');

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
                'selesai' => false,
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
                'selesai' => false,
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
                'selesai' => false,
                'ikon' => '</>',
                'warna' => 'hijau'
            ]
        ];

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
        $data['daftar_tugas_hari_ini'] = array_values(array_filter(
            $data['tugas'],
            function ($t) use ($hari_ini) {
                return $t['deadline'] === $hari_ini;
            }
        ));

        $this->load->view('sekretaris_beranda', $data);
    }

    public function jadwal()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');

        // Handle form submission
        if ($this->input->post('save_jadwal')) {
            $mapel = $this->input->post('mapel');
            $ikon = ($mapel === 'Istirahat') ? '☕' : $this->input->post('ikon');
            $warna = ($mapel === 'Istirahat') ? 'istirahat' : $this->input->post('warna');

            $new_jadwal = [
                'hari' => $this->input->post('hari'),
                'jam' => $this->input->post('jam'),
                'mapel' => $mapel,
                'guru' => $this->input->post('guru'),
                'warna' => $warna,
                'ikon' => $ikon
            ];

            $data['jadwal'][] = $new_jadwal;
        } else {
            $data['jadwal'] = [
            [
                'hari' => 'Senin',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Matematika',
                'guru' => 'Budi Santoso',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Senin',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Bahasa Indonesia',
                'guru' => 'Siti Rahayu',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Senin',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Pemrograman Web',
                'guru' => 'Ahmad Fauzi',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Senin',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'guru' => '-',
                
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Senin',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Basis Data',
                'guru' => 'Dewi Lestari',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '07:00 - 07:45',
                'mapel' => 'PKN',
                'guru' => 'Joko Prasetyo',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Matematika',
                'guru' => 'Budi Santoso',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Basis Data',
                'guru' => 'Dewi Lestari',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'guru' => '-',
                
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Pemrograman Web',
                'guru' => 'Ahmad Fauzi',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Basis Data',
                'guru' => 'Dewi Lestari',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '07:45 - 08:30',
                'mapel' => 'PKN',
                'guru' => 'Joko Prasetyo',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Matematika',
                'guru' => 'Budi Santoso',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'guru' => '-',
                
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Bahasa Indonesia',
                'guru' => 'Siti Rahayu',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Pemrograman Web',
                'guru' => 'Ahmad Fauzi',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Basis Data',
                'guru' => 'Dewi Lestari',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '08:30 - 09:15',
                'mapel' => 'PKN',
                'guru' => 'Joko Prasetyo',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'guru' => '-',
                
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Matematika',
                'guru' => 'Budi Santoso',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Bahasa Indonesia',
                'guru' => 'Siti Rahayu',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Pemrograman Web',
                'guru' => 'Ahmad Fauzi',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Matematika',
                'guru' => 'Budi Santoso',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'guru' => '-',
                
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Basis Data',
                'guru' => 'Dewi Lestari',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '11:00 - 11:45',
                'mapel' => 'PKN',
                'guru' => 'Joko Prasetyo',
                'warna' => 'jingga',
                'ikon' => '♙'
            ]
        ];
        }

        $this->load->view('sekretaris_jadwal', $data);
    }

    public function tugas()
    {
        $this->load->helper('url');

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
                'selesai' => false,
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
                'selesai' => false,
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
                'selesai' => false,
                'ikon' => '</>',
                'warna' => 'hijau'
            ]
        ];

        $data['hari_ini'] = $hari_ini;

        $this->load->view('sekretaris_tugas', $data);
    }
}
