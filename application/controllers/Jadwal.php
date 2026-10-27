<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        $hari = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat'
        ];

        $warna_mapel = [
            'biru' => '#edf4ff',
            'merah' => '#fff0f4',
            'ungu' => '#f5efff',
            'abu' => '#f1f4f8',
            'hijau' => '#edf9f5',
            'jingga' => '#fff6e9'
        ];

        $data['jadwal'] = [
            [
                'hari' => 'Senin',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Senin',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Bahasa Indonesia',
                'ruang' => 'Ruang 10',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Senin',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Pemrograman Web',
                'ruang' => 'Ruang 11',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Senin',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Senin',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '07:00 - 07:45',
                'mapel' => 'PKN',
                'ruang' => 'Ruang 10',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Selasa',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Pemrograman Web',
                'ruang' => 'Ruang 11',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '07:45 - 08:30',
                'mapel' => 'PKN',
                'ruang' => 'Ruang 10',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Rabu',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Bahasa Indonesia',
                'ruang' => 'Ruang 10',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Pemrograman Web',
                'ruang' => 'Ruang 11',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '08:30 - 09:15',
                'mapel' => 'PKN',
                'ruang' => 'Ruang 10',
                'warna' => 'jingga',
                'ikon' => '♙'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Kamis',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '07:00 - 07:45',
                'mapel' => 'Bahasa Indonesia',
                'ruang' => 'Ruang 10',
                'warna' => 'merah',
                'ikon' => '文'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '07:45 - 08:30',
                'mapel' => 'Pemrograman Web',
                'ruang' => 'Ruang 11',
                'warna' => 'ungu',
                'ikon' => '</>'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '08:30 - 09:15',
                'mapel' => 'Matematika',
                'ruang' => 'Ruang 10',
                'warna' => 'biru',
                'ikon' => '∑'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '09:15 - 10:00',
                'mapel' => 'Istirahat',
                'ruang' => '-',
                'warna' => 'istirahat',
                'ikon' => '☕'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '10:15 - 11:00',
                'mapel' => 'Basis Data',
                'ruang' => 'Ruang 11',
                'warna' => 'hijau',
                'ikon' => '▤'
            ],
            [
                'hari' => 'Jumat',
                'jam' => '11:00 - 11:45',
                'mapel' => 'PKN',
                'ruang' => 'Ruang 10',
                'warna' => 'jingga',
                'ikon' => '♙'
            ]
        ];

        $data['hari_list'] = $hari;
        $data['warna_mapel'] = $warna_mapel;

        $this->load->view('jadwal', $data);
    }
}
