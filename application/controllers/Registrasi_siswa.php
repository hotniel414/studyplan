<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_siswa extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('registrasi_siswa');
    }
}
