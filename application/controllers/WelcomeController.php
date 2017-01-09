<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends CI_Controller {


	public function index()
	{  
      
      if(!isset($_SESSION['email']))
       {
           //redirect('/HomeController/userregView')
        $this->load->view('UserRegister');
       }
       else
       {
       	  //$this->load->view('UserRegister');
       }

	}


}
