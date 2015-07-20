<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
###+------------------------------------------------------------------------------------------------------
###| BCOD WEB SOLUTIONS PVT. LTD., MUMBAI [ www.bcod.co.in ] 
###+------------------------------------------------------------------------------------------------------
###| Code By - CHITRANG PATEL ( chitrang.patel@bcod.co.in , chitrangpatel918@gmail.com )
###+------------------------------------------------------------------------------------------------------
###| Date - June 2015
###+------------------------------------------------------------------------------------------------------
*/



class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('pagination_model');
	    $this->load->library('session');
		
	}

	function manage()
	{
		$this->load->helper('url');    
        $config['base_url'] = base_url().'index.php/user/manage/';
	    $config['total_rows'] = $this->pagination_model->count_adminuser();
        $config['per_page'] = '5';
		$config['uri_segment'] = '3';
        $this->pagination->initialize($config);
        $data['user']=$this->pagination_model->get_adminuser($config['per_page'],$this->uri->segment(3));
		$this->load->vars($data);

	    $data['base_url']=base_url();
        $data['title'] = 'My Avazonic :: ';

        $this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
        $this->load->view('pages/user/user_manage', $data);
        $this->load->view('templates/footer',$data);
       
	}
		
	function cust_manage()
	{
		$this->load->helper('url');    
        $config['base_url'] = base_url().'index.php/user/cust_manage/';
	    $config['total_rows'] = $this->pagination_model->count_frontuser();
        $config['per_page'] = '5';
		$config['uri_segment'] = '3';
        $this->pagination->initialize($config);
        $data['user']=$this->pagination_model->get_frontuser($config['per_page'],$this->uri->segment(3));
		$this->load->vars($data);

	    $data['base_url']=base_url();
        $data['title'] = 'My Avazonic :: Customer List';

        $this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
        $this->load->view('pages/user/cust_manage', $data);
        $this->load->view('templates/footer',$data);
       
	}
	function sp_manage()
	{
		$this->load->helper('url');    
        $config['base_url'] = base_url().'index.php/user/sp_manage/';
	    $config['total_rows'] = $this->pagination_model->count_spuser();
        $config['per_page'] = '5';
		$config['uri_segment'] = '3';
        $this->pagination->initialize($config);
        $data['user']=$this->pagination_model->get_spuser($config['per_page'],$this->uri->segment(3));
		$this->load->vars($data);

	    $data['base_url']=base_url();
        $data['title'] = 'My Avazonic :: ';

        $this->load->view('templates/header', $data);
		$this->load->view('templates/navigation', $data);
        $this->load->view('pages/user/sp_manage', $data);
        $this->load->view('templates/footer',$data);
       
	}

	function captcha()
	{
		$this->load->view('templates/captcha');
	}
	
	function add_customer()
	{
	    if(empty($_POST))
		{   
			$data['base_url']=base_url();
            $data['title'] = 'My Avazonic :: ';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navigation', $data);
			$this->load->view('pages/user/cust_user_add', $data);
			$this->load->view('templates/footer',$data);
		}
		else
		{ 
			$data['base_url']=base_url();
			$data['title'] = 'My Avazonic :: ';
			
			$first_name = $this->input->post('first_name');
		    $last_name  = $this->input->post('last_name');
			$username   = $this->input->post('user_name');
			$password   = $this->input->post('password');
			$email      = $this->input->post('email_id');
			$status     = $this->input->post('status');
			
			//echo $first_name;
			//echo $last_name;
			//echo $username;
			//echo $password;
			//echo $email;
			//echo $status;

			//exit;
			if($first_name!='' &&  $last_name!='' && $username!='' && $password!='' && $email!='' && $status!='')
			{
				
				//Call Api
				$callurl= $data['base_url'].'api/customers';
				$this->curl->create($callurl);
			
				$params=array(
					'access_token' 	=> ACCESS_TOKEN,
					'cmd'			=>  'add_customer',
					'first_name' 	=> $first_name,
					'last_name' 	=> $last_name,
					'username' 	    => $username,
					'password' 		=> $password,
				    'email' 		=> $email,
					'status' 		=> $status
				);
				
				$this->curl->post(json_encode($params));
				
				$result = json_decode($this->curl->execute());
			    
				//print_r($result);
		        //exit;
				$this->session->set_userdata($result->apidata);
				$res_session=$this->session->all_userdata();
				//print_r($res_session);
				redirect('/user/manage', 'location');
			}
			
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/login_navigation', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footer',$data);
		}
	}
       
}