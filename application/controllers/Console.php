<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Console extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header_remove("X-Powered-By");
		header("Strict-Transport-Security:max-age=63072000");
		header("X-XSS-Protection: 1; mode=block");
		header("X-Frame-Options: DENY");
		header("X-Content-Type-Options:nosniff");
		date_default_timezone_set('Asia/Calcutta');
		$this->load->helper('cookie');
	}

	public function index()
	{
		$data['page_title'] = "Party Cruisers";
		$data['meta_desc'] = "Wep Digital is an enterprise solutions company that offers a wide range of digital services. We are India's best document management system provider & gst suvidha provider.";
		$data['meta_keyword'] = "Enterprise solutions services,Enterprise solutions company,Best GST Suvidha Provider.,document management system providers,Digital solutions company,Digital solutions services";
		$data['meta_image'] = base_url('assets/images/wep-logo-footer.png');
		$data['active'] = 1;
		$data['act'] = 1.1;
		$data['middle_content'] = 'index';
		$this->load->view('frontend/layout/template', $data);
		// $this->db->where('status', 1);
		// $this->db->order_by('order_no', 'asc');
		// $query = $this->db->get("banner");
		// $data['banner_list'] = $query->result();
		// $this->db->where('status', 1);
		// $this->db->order_by('order_no', 'asc');
		// $query = $this->db->get("home_banner");
		// $data['home_banners'] = $query->result();
		// $this->db->where('home_page', 1);
		// $this->db->order_by('h_order_no', 'asc');
		// $query = $this->db->get("clientele");
		// $data['clientele'] = $query->result();
	}
	
}

