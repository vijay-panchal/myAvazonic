<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			//$this->load->model('news_model');
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
        $data['title'] = 'My Avazonic :: Login';
		
		$username = $this->input->post('username');
		//echo $username;
		//exit;
		if($username!='')
		{
			$password = $this->input->post('password');
			//Call Api
			$callurl= $data['base_url'].'api/users';
			
			$params=array(
				'URL'			=>	$callurl,
				'access_token' 	=> ACCESS_TOKEN,
				'cmd'			=> 'user_login',
				'username' 		=> $username,
				'password' 		=> $password,
			);

			$response=json_decode($this->customcurl->call($params));
			//print_r($response);exit;
			if($response->error=='')
			{
				//Session data set;
				$this->session->set_userdata($response->apidata);
				$res_session=$this->session->all_userdata();
				$this->session->set_flashdata('custom_msg', "Login successfully");
				
				//login successfully redirect page define
				redirect('/home', 'location');
			}
			else{
				$this->session->set_flashdata('custom_error', $response->error);
				
			}
		}
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/login_navigation', $data);
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer',$data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		//$this->session->set_flashdata('custom_msg', "Logout successfully");
		//print_r($this->session);exit;
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