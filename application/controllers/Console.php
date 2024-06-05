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
		$this->load->model('Console_Model','Console_Model');
		$this->load->helper('cookie');
	}

	public function index()
	{
		$data['page_title'] = "Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 1;
		$data['act'] = 1.1;
		$data['middle_content'] = 'index';
		
		$this->db->where('status', 1);
		$this->db->order_by('order_no', 'asc');
		$this->db->limit(5);
		$query = $this->db->get("banner");
		$data['banner_list'] = $query->result();
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->where('home', 1);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->where('home', 1);
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('b.image,b.image_alt,b.image_large,b.image_medium,b.blog_date,GROUP_CONCAT(bc.name SEPARATOR ", ") as categories,b.order_no,b.slug,b.title,SUBSTRING_INDEX(b.content, " ", 50) as content,b.author');
    $this->db->where('b.status', 1);
    $this->db->order_by('b.order_no', 'asc');
    $this->db->group_by('b.id');
		$this->db->limit(3);
    $this->db->join('blogs_multi_category bmc', 'bmc.blog_id = b.id', 'left');
    $this->db->join('blog_category bc', 'bc.id = bmc.category_id', 'left');
    $data['blog'] = $this->db->get("blogs b")->result_array();
		
		// echo '<pre>';
		// print_r($data['blog']);
		// echo '</pre>';
		
		$this->db->select('DISTINCT(case_studies.brand)', false);
		$this->db->where('case_studies.status', 1);
		$this->db->where('case_studies.home', 1);
		$this->db->limit(3);
		$this->db->order_by('case_studies.order_no', 'asc');
		$query = $this->db->get("case_studies");
		$brands = $query->result();
		
		$success_stories = [];
		
		if ($brands) {
				foreach ($brands as $brand) {
						// Step 2: For each brand, get associated photos
						$this->db->select('success_story_multi_photos.photo, case_studies.brand');
						$this->db->where('case_studies.brand', $brand->brand);
						$this->db->where('case_studies.status', 1);
						$this->db->where('case_studies.home', 1);
						$this->db->order_by('case_studies.order_no', 'asc');
						$this->db->join('success_story_multi_photos', 'success_story_multi_photos.success_story_id = case_studies.id', 'left');
						$query = $this->db->get("case_studies");
		
						foreach ($query->result() as $row) {
								if (!isset($success_stories[$row->brand])) {
										$success_stories[$row->brand] = (object) [
												'photos' => [],
												'brand' => $row->brand,
										];
								}
								$success_stories[$row->brand]->photos[] = $row->photo;
						}
				}
		}
		
		$data['success_story'] = array_values($success_stories);
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function blog()
	{
		$data['page_title'] = "Blog - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 2;
		$data['act'] = 2.1;
		$data['middle_content'] = 'blog';	
		
		$this->db->select('b.image_alt,b.image_small,b.image_medium,b.blog_date,b.order_no,b.slug,SUBSTRING_INDEX(b.title, " ", 10) as title');
    $this->db->where('b.status', 1);
    $this->db->order_by('b.order_no', 'asc');
    $this->db->group_by('b.id');
		$this->db->limit(3);
    $data['blog'] = $this->db->get("blogs b")->result_array();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function get_blog_list()
	{
			$search = $this->input->get('keyword');
			$length = $this->input->get('length');
			$start = !$this->input->get('start') ? 0 : ($this->input->get('start') - 1);

			$total = $this->Console_Model->blog_list_count_all();
			$data = $this->Console_Model->get_blog_list($search, $start, $length);

			if (!empty($data)) {
					$response = [
							'data' => $data,
							'status' => true,
							'total' => $total
					];
			} else {
					$response = [
							'message' => 'Data could not be found',
							'status' => false,
							'total' => 0
					];
			}

			echo json_encode($response);
	}
	
	public function blog_details()
	{
		$slug = $this->input->get('slug');
		
		if ($slug) {
			
			$data['data'] = $this->Console_Model->get_blog_details($slug);
			if(!$data['data']){
				redirect('blog');
			}
			
			// echo'<pre>';print_r($data);exit();
			
			$data['page_title'] = $data['data']['title']." - Party Cruisers";
			$data['meta_desc'] = "";
			$data['meta_keyword'] = "";
			$data['meta_image'] = '';
			$data['active'] = 2;
			$data['act'] = 2.2;
			$data['middle_content'] = 'blog_details';	
			
			$this->db->select('b.image,b.image_alt,b.image_large,b.image_medium,b.blog_date,GROUP_CONCAT(bc.name SEPARATOR ", ") as categories,b.order_no,b.slug,b.title,SUBSTRING_INDEX(b.content, " ", 50) as content,b.author');
			$this->db->where('b.status', 1);
			$this->db->order_by('b.order_no', 'asc');
			$this->db->group_by('b.id');
			$this->db->limit(3);
			$this->db->join('blogs_multi_category bmc', 'bmc.blog_id = b.id', 'left');
			$this->db->join('blog_category bc', 'bc.id = bmc.category_id', 'left');
			$data['blog'] = $this->db->get("blogs b")->result_array();
			
			$this->load->view('frontend/layout/template', $data);
		} else {
			redirect('blog');
		}
	}
	
	public function contact()
	{
		$data['page_title'] = "Contact - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 3;
		$data['act'] = 3.1;
		$data['middle_content'] = 'contact';		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function house_of_vivah(){
		$data['page_title'] = "House Of Vivah - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 4;
		$data['act'] = 4.1;
		$data['middle_content'] = 'house_of_vivah';		
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->where('brand', 'House_of_Vivaah');
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$video_results = $query->result_array();
		if($video_results){
			// Divide the result set into subarrays of 6 elements each
			$video_chunks = array_chunk($video_results, 6);
			// Assign the chunks to the data array
			$data['testimonial']['video_chunks'] = $video_chunks;
		}

		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->where('brand', 'House_of_Vivaah');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$testimonial_results = $query->result();
		if($testimonial_results){
			// Divide the result set into two halves
			$chunks = array_chunk($testimonial_results, ceil(count($testimonial_results) / 2));
			// Assign the chunks to the data array
			$data['testimonial']['first_half'] = $chunks[0];
			$data['testimonial']['second_half'] = isset($chunks[1]) ? $chunks[1] : [];
		}
		
		$this->db->select('cs.*,GROUP_CONCAT(tc.name SEPARATOR ", ") as categories,t.video_url,t.video_thumbnail');
    $this->db->where('cs.status', 1);
    $this->db->where('cs.brand', 'House_of_Vivaah');
    $this->db->order_by('cs.order_no', 'asc');
    $this->db->group_by('cs.id');
		$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id  = cs.id', 'left');
    $this->db->join('testimonial_category tc', 'tc.id = ssmc.category_id', 'left');
    $this->db->join('testimonial t', 't.id = cs.testimonial', 'left');
    $data['success_stories'] = $this->db->get("case_studies cs")->result_array();
		if($data['success_stories']){
			foreach ($data['success_stories'] as $key => $item) {
				$this->db->select('ssmp.photo');
				$this->db->where('ssmp.success_story_id ', $item['id']);
				$photo_results = $this->db->get("success_story_multi_photos ssmp")->result_array();
				if($photo_results){
					$photo_chunks = array_chunk($photo_results, 6);
					$data['success_stories'][$key]['photos'] = $photo_chunks;
				}
				
				$this->db->select('ssmv.video_url,ssmv.video_thumbnail_url');
				$this->db->where('ssmv.success_story_id ', $item['id']);
				$video_results = $this->db->get("success_story_multi_videos ssmv")->result_array();
				if($video_results){
					$video_chunks = array_chunk($video_results, 6);
					$data['success_stories'][$key]['videos'] = $video_chunks;
				}
			}
		}		
		// echo '<pre>'; print_r($data['success_stories']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function sendMail($to,$from,$subject,$message) {
		$config = array(
			'priority' => '1',
			'protocol' => 'smtp',
			'smtp_crypto' => 'tls',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => 'priya@innowrap.com', // change it to yours
			'smtp_pass' => '', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
			'newline' => "\r\n"
		);
		$this->email->initialize($config);
		$this->email->from($from);
		$this->email->to("$to");
		$this->email->subject($subject);
		$this->email->message($message);
		// echo $this->email->print_debugger();
		if ($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
	
	public function add_contact(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['date'] = $this->input->post('date');
		$add['number'] = $this->input->post('number');
		$add['event'] = $this->input->post('event');
		
		if($add['event'] === 'other'){
			$add['subEvent'] = $this->input->post('otherEvent');
		}else{
			$add['subEvent'] = $this->input->post('subEvent');
		}
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI". $add['u_name'] ."</br>Thank you for contact with us. <br>We will get back to you shortly.<br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "priya@innowrap.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Inquiry for: " . $add['event'] . " - " . $add['subEvent'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . "<br>No. of Guest: " . $add['number'] . ".";
				$from_email = "priya@innowrap.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
				$this->sendMail($from_email,$from_email,$msg_subject,$html);
					if($this->Master_model->contact_us($name,$email,$msg_subject,$phone_number,$message,$ip_address)){
						echo json_encode(['code' => 1]);
					}else{
						echo json_encode(['code' => 0]);
					}
			}else {
				echo json_encode(['code' => 0]);
			}
		}else{
			echo json_encode(['code' => 0]);
		}
	}
		
}

