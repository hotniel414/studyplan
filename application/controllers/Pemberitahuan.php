<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemberitahuan extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');

        $data['pemberitahuan'] = [
            [
                'judul' => 'Tugas Baru: Membuat Website Sederhana',
                'pesan' => 'Mata pelajaran Pemrograman Web telah memberikan tugas baru. Deadline hari ini.',
                'tipe' => 'tugas',
                'waktu' => 'Baru saja',
                'ikon' => '📝',
                'warna' => 'biru'
            ],
            [
                'judul' => 'Jadwal Baru: Pemrograman Web Rabu',
                'pesan' => 'Jadwal pelajaran Pemrograman Web pada hari Rabu telah diperbarui.',
                'tipe' => 'jadwal',
                'waktu' => '2 jam lalu',
                'ikon' => '📅',
                'warna' => 'ungu'
            ],
            [
                'judul' => 'Tugas Baru: Latihan Query SQL',
                'pesan' => 'Mata pelajaran Basis Data telah memberikan tugas baru. Deadline hari ini.',
                'tipe' => 'tugas',
                'waktu' => '5 jam lalu',
                'ikon' => '📝',
                'warna' => 'biru'
            ],
            [
                'judul' => 'Jadwal Baru: Basis Data Kamis',
                'pesan' => 'Jadwal pelajaran Basis Data pada hari Kamis telah diperbarui.',
                'tipe' => 'jadwal',
                'waktu' => '1 hari lalu',
                'ikon' => '📅',
                'warna' => 'ungu'
            ],
            [
                'judul' => 'Tugas Baru: Rangkuman Materi Bahasa Indonesia',
                'pesan' => 'Mata pelajaran Bahasa Indonesia telah memberikan tugas baru. Deadline 2 hari lagi.',
                'tipe' => 'tugas',
                'waktu' => '1 hari lalu',
                'ikon' => '📝',
                'warna' => 'biru'
            ],
            [
                'judul' => 'Jadwal Baru: PKN Jumat',
                'pesan' => 'Jadwal pelajaran PKN pada hari Jumat telah diperbarui.',
                'tipe' => 'jadwal',
                'waktu' => '2 hari lalu',
                'ikon' => '📅',
                'warna' => 'ungu'
            ]
        ];

        $this->load->view('pemberitahuan', $data);
    }
}
