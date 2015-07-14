<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			//$this->load->model('news_model');
			$this->load->library('session');
	}

	public function index()
	{
		$res_session=$this->session->all_userdata();
		//print_r($res_session);exit;
		//$this->session->sess_destroy();
		 
		$this->checkuserloggedin();
		
		//Loading url helper
		$this->load->helper('url');
		$data['base_url']=base_url();
        $data['title'] = 'My Avazonic :: ';

        $this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer',$data);
	}
	
	public function checkuserloggedin()
	{
		$username = $this->session->userdata('username');
		if(isset($username) && $username != '')
		{
			
		}
		else
		{
			redirect('/account/login', 'refresh');
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */