<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
//  Controller for About us
*/

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();       
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}