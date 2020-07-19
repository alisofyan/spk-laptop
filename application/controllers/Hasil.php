<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
//  Controller for Hasil
*/

class Hasil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();       
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('home/hasil');
        $this->load->view('templates/footer');
    }
}