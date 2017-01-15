<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends CI_Controller 
 { 
   //set the class variable.
   var $template  = array();
  // var $data      = array();
   //Load layout    
   public function layout($data) {
     // making temlate and send data to view.
     $this->template['header']   = $this->load->view('layout/header', $data, true);
     $this->template['left']   = $this->load->view('layout/left', $data, true);
     $this->template['middle'] = $this->load->view($this->middle, $data, true);
     $this->template['footer'] = $this->load->view('layout/footer', $data, true);
     $this->load->view('layout/index', $this->template);
   }


public function layout_noArg() {
     // making temlate and send data to view.
     $this->template['header']   = $this->load->view('layout/header','',true);
     $this->template['left']   = $this->load->view('layout/left','',true);
     $this->template['middle'] = $this->load->view($this->middle,'',true);
     $this->template['footer'] = $this->load->view('layout/footer','',true);
     $this->load->view('layout/index', $this->template);
   }
}

?>