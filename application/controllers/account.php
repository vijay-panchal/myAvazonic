<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			//$this->load->model('news_model');
			$this->load->library('session');
	}

	public function index()
	{
		//$res_session=$this->session->all_userdata();
		//print_r($res_session);
		 
		$this->checkuserloggedin();
		
		
	}
	
	
	public function login()
	{
		$data['base_url']=base_url();
        $data['title'] = 'My Avazonic :: ';
		
		$username = $this->input->post('username');
		//echo $username;
		//exit;
		if($username!='')
		{
			$password = $this->input->post('password');
			//Call Api
			$callurl= $data['base_url'].'api/users';
			$this->curl->create($callurl);
			
			
			$params=array(
				'access_token' 	=> ACCESS_TOKEN,
				'cmd'			=> 'user_login',
				'username' 		=> $username,
				'password' 		=> $password,
			);
			
			$this->curl->post(json_encode($params));
			
			$result = json_decode($this->curl->execute());
			
			//print_r($result);exit;
			$this->session->set_userdata($result->apidata);
			$res_session=$this->session->all_userdata();
			
			redirect('/home', 'location');
		}
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/login_navigation', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer',$data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/home', 'location');
	}
	
	public function ci_curl($new_name, $new_email)
	{
		$base_url=base_url();
		$username = 'admin';
		$password = '1234';
		 
		
		$callurl= $base_url.'api/wines';
		$this->curl->create($callurl);
		 
		// Optional, delete this line if your API is open
		//$this->curl->http_login($username, $password);
	 
		/*$this->curl->post(array(
			'name' => $new_name,
			'email' => $new_email
		));*/
		 
		$result = json_decode($this->curl->execute());
		
		//print_r($result);
	 
		if(isset($result->status) && $result->status == 'success')
		{
			echo 'User has been updated.';
		}
		 
		else
		{
			echo 'Something has gone wrong';
		}
	}
	
	
	
	public function checkuserloggedin()
	{
		$username = $this->session->userdata('username');
		if(isset($username) && $username != '')
		{
			redirect('/home', 'location');
		}
		else
		{
			
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */