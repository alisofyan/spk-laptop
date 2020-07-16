<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
//  Controller for Main
*/

class Index extends CI_Controller {

    public function __construct()
    {
        parent::__construct();       
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}