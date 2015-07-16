<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
###+------------------------------------------------------------------------------------------------------
###| BCOD WEB SOLUTIONS PVT. LTD., MUMBAI [ www.bcod.co.in ] 
###+------------------------------------------------------------------------------------------------------
###| Code By - CHIRAG PATEL ( chirag@bcod.co.in , om.chirag@gmail.com )
###+------------------------------------------------------------------------------------------------------
###| Date - January 2012
###+------------------------------------------------------------------------------------------------------
*/


class Pagination_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/*----------------------ADmin user start----------------------------------*/

	function get_adminuser($num,$offset)
	{
		$this->db->select('users.*');
		$this->db->limit($num, $offset);
		return $this->db->get_where('users',array('role_id' => '1'))->result();
	}

	function count_adminuser()
	{   
	return $this->db->get_where('users',array('role_id'=>'1'))->num_rows();
    }

	/*---------------------Front user start----------------------------------*/

	function get_frontuser($num,$offset)
	{
		$this->db->select('users.*');
		$this->db->limit($num, $offset);
		return $this->db->get_where('users',array('role_id' => '2'))->result();
	}

	function count_frontuser()
	{
		return $this->db->get_where('users',array('role_id'=>'2'))->num_rows();
	}

    /*---------------------SP user start----------------------------------*/

   function get_spuser($num,$offset)
	{
		$this->db->select('users.*');
		$this->db->limit($num, $offset);
		return $this->db->get_where('users',array('role_id' => '3'))->result();
	}

	function count_spuser()
	{
		return $this->db->get_where('users',array('role_id'=>'3'))->num_rows();
	}

	/*---------------------Comments start----------------------------------*/

	function get_comments($num,$offset)
	{
		$this->db->select('comments.*');
		$this->db->order_by('id','desc');
		$this->db->limit($num, $offset);
		return $this->db->get('comments')->result();
	}

	function count_comments()
	{
		$this->db->order_by('id','desc');
		return $this->db->get('comments')->num_rows();
	}


	/*----------------------Comments End----------------------------------*/

	/*---------------------Guest start----------------------------------*/

	function get_guestbook($num,$offset)
	{
		$this->db->select('guest.*');
		$this->db->order_by('id','desc');
		$this->db->limit($num, $offset);
		return $this->db->get('guest')->result();
	}

	function count_guestbook()
	{
		$this->db->order_by('id','desc');
		return $this->db->get('guest')->num_rows();
	}


	/*----------------------Guest End----------------------------------*/


	/*----------------------category Start----------------------------------*/

	function get_categoryDetail($num,$offset)
	{
		$filter_array	=	array();
		$filterparent_array	=	array();
		$this->db->select('category.*');

		if($this->session->userdata('ByFilteredPCName'))
		{
			$query = $this->db->query("SELECT id FROM category where category_name Like '%".$this->session->userdata('ByFilteredPCName')."%'");
			$num_pid	=	$query->num_rows();
			if($num_pid>0)
			{
				$query	=	"SELECT * FROM category where category_name Like '%".$this->session->userdata('ByFilteredPCName')."%'";
				$get_pid	=	$this->db->query($query)->result();
				foreach($get_pid as $pid)
				{
					
						$filterparent	=	$pid->id;
						array_push($filterparent_array,$filterparent);
				}
			}
		}

		if($this->session->userdata('ByFilteredCatName'))
		{
			$filter_array	=	array('category_name'=>$this->session->userdata('ByFilteredCatName'));
			$this->db->like($filter_array);
		}
		if($filterparent_array)
		{
			$this->db->where_in('category_parent', $filterparent_array);
		}

		$this->db->limit($num,$offset);
		return $this->db->get('category')->result();
	}
	
	function get_allParentCategory()
	{
		$this->db->select('category.*');
		$this->db->where('category_parent',false);
		return $this->db->get('category')->result();
	}
	function count_categories()
	{
		$filter_array	=	array();
		$filterparent_array	=	array();

		
		if($this->session->userdata('ByFilteredPCName'))
		{
			$query = $this->db->query("SELECT id FROM category where category_name Like '%".$this->session->userdata('ByFilteredPCName')."%'");
			$num_pid	=	$query->num_rows();
			if($num_pid>0)
			{
				$query	=	"SELECT * FROM category where category_name Like '%".$this->session->userdata('ByFilteredPCName')."%'";
				$get_pid	=	$this->db->query($query)->result();
				foreach($get_pid as $pid)
				{
					
						$filterparent	=	$pid->id;
						array_push($filterparent_array,$filterparent);
				}
			}
		}

		if($this->session->userdata('ByFilteredCatName'))
		{
			$filter_array	=	array('category_name'=>$this->session->userdata('ByFilteredCatName'));
			$this->db->like($filter_array);
		}
		if($filterparent_array)
		{
			$this->db->where_in('category_parent', $filterparent_array);
		}


		if($filter_array)
		{
			return $this->db->get('category')->num_rows();
		}
		else
		{
			return $this->db->get('category')->num_rows();
		}
	}
	/*----------------------category End----------------------------------*/
	

	function get_page($num,$offset)
	{
		$this->db->select('page.*');
		$this->db->limit($num, $offset);
		return $this->db->get('page')->result();
	}
	function count_page()
	{
		return $this->db->get('page')->num_rows();
	}


	/*----------------------Events start----------------------------------*/

	
	function count_event()
	{	
		$filter_array	=	array();
		if($this->session->userdata('ByFilteredName'))
		{
			$this->db->like('event_name',$this->session->userdata('ByFilteredName'));
			
		}
		
		if($this->session->userdata('filter_category'))
		{
		
			$this->db->where("event_category",$this->session->userdata('filter_category'));
		}
		
	
		if($filter_array)
		{
			return $this->db->get_where('events')->num_rows();
		}
		else
		{
			return $this->db->get('events')->num_rows();
		}

	}


	function get_Event($num,$offset)
	{
		$this->db->select('events.*');
		if($this->session->userdata('ByFilteredName'))
		{
			$this->db->like('event_name',$this->session->userdata('ByFilteredName'));
		}
		if($this->session->userdata('filter_category'))
		{	
			$this->db->where("event_category",$this->session->userdata('filter_category'));
		}
		if($this->session->userdata('sorting'))
		{
			$this->db->order_by("preference",$this->session->userdata('sorting'));
		}
	
        $this->db->order_by('preference','asc');
		$this->db->limit($num, $offset);
		return $this->db->get('events')->result();

	}
	

	/*------------------ RSVP Start-----------------------------------*/

	function get_rsvp($num,$offset)
	{
		$this->db->select('rsvp.*');
		$this->db->limit($num, $offset);
		return $this->db->get('rsvp')->result();
	}

	function count_rsvp()
	{
		return $this->db->get('rsvp')->num_rows();
	}

   function count_admin_roles()
	{
		return $this->db->get('role')->num_rows();
	}
	function get_role($num,$offset)
	{
		$this->db->select('role.*');
		$this->db->limit($num, $offset);
		return $this->db->get('role')->result();
	}


}

	