<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('user_id')==NULL) {
      redirect('login');
    }
    $this->load->model('App_model', 'app');
  }

  function index()
  {
    $this->load->view('partials/header');
    $this->load->view('partials/content');
    $this->load->view('partials/footer');
  }

  public function get_data()
  {
    $all = $this->app->get_all('tbl_kredit')->result();
    output_200($all); //set output json see on the helpers
  }

}
