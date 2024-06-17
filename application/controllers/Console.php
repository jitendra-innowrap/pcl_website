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
		$query = $this->db->get("banner");
		$data['banner_list'] = $query->result();
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->where('home', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->where('home', 1);
		$this->db->limit(8);
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('b.image,b.image_alt,b.image_large,b.image_medium,b.blog_date,GROUP_CONCAT(bc.name SEPARATOR ", ") as categories,b.order_no,b.slug,b.title,SUBSTRING_INDEX(b.content, " ", 50) as content,b.author');
    $this->db->where('b.status', 1);
    $this->db->order_by('b.order_no', 'asc');
    $this->db->group_by('b.id');
		$this->db->limit(5);
    $this->db->join('blogs_multi_category bmc', 'bmc.blog_id = b.id', 'left');
    $this->db->join('blog_category bc', 'bc.id = bmc.category_id', 'left');
    $data['blog'] = $this->db->get("blogs b")->result_array();
		
		// echo '<pre>';
		// print_r($data['blog']);
		// echo '</pre>';
		
		$this->db->select('name as brand');
		$this->db->where('status', 1);
		$this->db->order_by('order_no', 'asc');
		$brands = $this->db->get("investors_category")->result_array();

		$success_stories = [];

		if ($brands) {
				foreach ($brands as $brand) {
						// Step 2: For each brand, get associated photos
						$this->db->select('case_studies.brand, case_studies.id, case_studies.image, case_studies.image_alt');
						$this->db->where('case_studies.brand', $brand['brand']);
						$this->db->where('case_studies.status', 1);
						$this->db->where('case_studies.home', 1);
						$this->db->limit(6);
						$this->db->order_by('case_studies.order_no', 'asc');
						$query = $this->db->get("case_studies");
						
						if ($query->num_rows() > 0) {
							$brand_data = [
								'brand' => $brand['brand'],
								'data' => []
							];
						
							foreach ($query->result() as $row) {
									$brand_data['data'][] = [
											'id' => $row->id,
											'image' => $row->image,
											'image_alt' => $row->image_alt
									];
							}
							
							$success_stories[] = $brand_data;
						}
			
				}
		}


		// echo '<pre>';print_r($success_stories);exit();
		
		$data['success_story'] = array_values($success_stories);
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function blogs()
	{
		$data['page_title'] = "Blogs - Party Cruisers";
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
		$this->db->limit(7);
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
				redirect('blogs');
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
			redirect('blogs');
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
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'House of Vivaah');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'House of Vivaah');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'House of Vivaah');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function vows_vachan(){
		$data['page_title'] = "Vows Vachan - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 5;
		$data['act'] = 5.1;
		$data['middle_content'] = 'vows_vachan';	
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'Vows Vachan');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'Vows Vachan');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'Vows Vachan');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function event_factory(){
		$data['page_title'] = "Event Factory - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'event_factory';	
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'Event Factory');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'Event Factory');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'Event Factory');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function sendMail($to, $from, $subject, $message) {
    $config = array(
        'priority' => '1',
        'protocol' => 'smtp',
        'smtp_crypto' => 'tls',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
				'smtp_user' => 'enquiry@partycruisersindialtd.com', // change it to yours
				'smtp_pass' => 'vnnk vmok vryr rgng', // change it to yours
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => TRUE,
        'newline' => "\r\n"
    );

    $this->email->initialize($config);
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
        return true;
    } else {
        // echo $this->email->print_debugger(); // Moved after send()
				// exit();
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
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		
		if($add['event'] === 'other'){
			$add['subEvent'] = $this->input->post('otherEvent');
		}else{
			$add['subEvent'] = $this->input->post('subEvent');
		}
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for']  . "<br>Event: " . $add['event'] . "<br>Sub Event: " . $add['subEvent'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . "<br>No. of Guest: " . $add['number'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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
	
	public function live_space(){
		$data['page_title'] = "Live Space - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 7;
		$data['act'] = 7.1;
		$data['middle_content'] = 'live_space';	
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'Live Space');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'Live Space');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'Live Space');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function venue_affairs(){
		$data['page_title'] = "Venue Affairs - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 8;
		$data['act'] = 8.1;
		$data['middle_content'] = 'venue_affairs';	
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'Venue Affairs');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'Venue Affairs');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'Venue Affairs');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function party_house(){
		$data['page_title'] = "Party House - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 9;
		$data['act'] = 9.1;
		$data['middle_content'] = 'party_house';	
		
		$this->db->select('id,video_thumbnail,video_url');
		$this->db->where('status', 1);
		$this->db->limit(6);
		$this->db->where('video_thumbnail !=', '');
		$this->db->where('brand', 'Party House');
		$this->db->where('video_url !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['video'] = $query->result();
		
		$this->db->select('id,text,client_name');
		$this->db->where('status', 1);
		$this->db->limit(8);
		$this->db->where('brand', 'Party House');
		$this->db->where('client_name !=', '');
		$this->db->where('text !=', '');
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("testimonial");
		$data['testimonial']['text'] = $query->result();
		
		$this->db->select('id, name');
		$this->db->where('status', 1);
		$categories = $this->db->get("testimonial_category")->result_array();

		$result = array();

		if ($categories) {
				foreach ($categories as $category) {
						// Fetch all case studies for each category
						$this->db->select('cs.id, cs.image, cs.image_alt');
						$this->db->where('ssmc.category_id', $category['id']);
						$this->db->where('cs.status', 1);
						$this->db->where('cs.brand', 'Party House');
						$this->db->order_by('cs.order_no', 'asc');
						$this->db->join('success_story_multi_category ssmc', 'ssmc.success_story_id = cs.id', 'left');
						$query = $this->db->get("case_studies cs");

						$case_studies = $query->result_array();

						// Add the category and its case studies to the result only if case_studies is not empty
						if (!empty($case_studies)) {
								// Chunk the case studies array into chunks of 3
								$case_studies_chunks = array_chunk($case_studies, 6);

								$result[] = array(
										'category_id' => $category['id'],
										'category_name' => $category['name'],
										'case_studies' => $case_studies_chunks
								);
						}
				}
		}

		$data['success_story'] = array_values($result);
		// echo '<pre>'; print_r($data['success_story']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function about_us(){
		$data['page_title'] = "About Us - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'about_us';	
		
		$this->load->view('frontend/layout/template', $data);
	}
		
	public function investor_relation(){
		$data['page_title'] = "Investor Relation - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 11;
		$data['act'] = 11.1;
		$data['middle_content'] = 'investor_relation';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function disclosures_under_regulation_46_of_the_lODR(){
		$data['page_title'] = "Disclosures under Regulation 46 of the LODR - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 12;
		$data['act'] = 12.1;
		$data['middle_content'] = 'disclosures_under_regulation_46_of_the_lODR';	
		
		$this->db->select('gn.*, prc.name as category_name, prsc.name as sub_category_name, prsc2.name as sub_category_2_name');
		$this->db->where('gn.status', 1);
		$this->db->where('gn.type', 2);
		$this->db->where('prc.id', 1);
		$this->db->order_by('gn.order_no', 'asc');
		$this->db->group_by('gn.id');
		$this->db->join('policy_report_category prc', 'prc.id = gn.category', 'left');
		$this->db->join('policy_report_sub_category prsc', 'prsc.id = gn.sub_category', 'left');
		$this->db->join('policy_report_sub_category_2 prsc2', 'prsc2.id = gn.sub_category_2', 'left');
		$data['policy'] = $this->db->get("gst_notification gn")->result_array();

		$grouped = [
				'blank' => [],
				'categories' => []
		];

		foreach ($data['policy'] as $item) {
				if (empty($item['sub_category_name'])) {
						$grouped['blank'][] = $item;
				} else {
						$subCategory = $item['sub_category_name'];
						$subCategory2 = $item['sub_category_2_name'];

						if (!isset($grouped['categories'][$subCategory])) {
								$grouped['categories'][$subCategory] = [];
						}

						if (!isset($grouped['categories'][$subCategory][$subCategory2])) {
								$grouped['categories'][$subCategory][$subCategory2] = [];
						}

						$grouped['categories'][$subCategory][$subCategory2][] = $item;
				}
		}

		$data['documents'] =  $grouped;
		
		// echo '<pre>'; print_r($data['grouped']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function company_internal_policy(){
		$data['page_title'] = "Company Internal Policy- Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 13;
		$data['act'] = 13.1;
		$data['middle_content'] = 'company_internal_policy';	
		
		$this->db->select('gn.*,prc.name as category_name,prsc.name as sub_category_name,prsc2.name as sub_category_2_name');
		$this->db->where('gn.status', 1);
		$this->db->where('gn.type', 1);
		$this->db->order_by('gn.order_no', 'asc');
		$this->db->group_by('gn.id');
		$this->db->join('policy_report_category prc', 'prc.id = gn.category', 'left');
		$this->db->join('policy_report_sub_category prsc', 'prsc.id = gn.sub_category', 'left');
		$this->db->join('policy_report_sub_category_2 prsc2', 'prsc2.id = gn.sub_category_2', 'left');
		$data['policy'] = $this->db->get("gst_notification gn")->result_array();
		
		// echo '<pre>'; print_r($data['policy']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function company_policies(){
		$data['page_title'] = "Company Policies - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 14;
		$data['act'] = 14.1;
		$data['middle_content'] = 'company_policies';	
		
		$this->db->select('gn.*,prc.name as category_name,prsc.name as sub_category_name,prsc2.name as sub_category_2_name');
		$this->db->where('gn.status', 1);
		$this->db->where('gn.type', 2);
		$this->db->where('prc.id', 2);
		$this->db->order_by('gn.order_no', 'asc');
		$this->db->group_by('gn.id');
		$this->db->join('policy_report_category prc', 'prc.id = gn.category', 'left');
		$this->db->join('policy_report_sub_category prsc', 'prsc.id = gn.sub_category', 'left');
		$this->db->join('policy_report_sub_category_2 prsc2', 'prsc2.id = gn.sub_category_2', 'left');
		$data['policy'] = $this->db->get("gst_notification gn")->result_array();
		
		// echo '<pre>'; print_r($data['policy']);  echo'</pre>'; exit();
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function privacy_policy(){
		$data['page_title'] = "Privacy Policy - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 15;
		$data['act'] = 15.1;
		$data['middle_content'] = 'privacy_policy';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function franchise(){
		$data['page_title'] = "Franchise - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 16;
		$data['act'] = 16.1;
		$data['middle_content'] = 'franchise';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function entrepreneur_program(){
		$data['page_title'] = "Entrepreneur Program - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 17;
		$data['act'] = 17.1;
		$data['middle_content'] = 'entrepreneur_program';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function collabration_and_association(){
		$data['page_title'] = "Collaboration & Association - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 18;
		$data['act'] = 18.1;
		$data['middle_content'] = 'collabration_and_association';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function success_story()
	{
		$id = $this->input->get('id');
		
		if ($id) {
			
			$this->db->select('cs.*,GROUP_CONCAT(tc.name SEPARATOR ", ") as categories,t.video_url,t.video_thumbnail');
			$this->db->where('cs.status', 1);
			$this->db->where('cs.id', $id);
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
			if(!$data['success_stories']){
				redirect();
			}
			
			// echo'<pre>';print_r($data);exit();
			
			$data['page_title'] = $data['success_stories']['0']['brand']." - Party Cruisers";
			$data['meta_desc'] = "";
			$data['meta_keyword'] = "";
			$data['meta_image'] = '';
			$data['active'] = 19;
			$data['act'] = 19.1;
			$data['middle_content'] = 'success_story';	
			
			$this->load->view('frontend/layout/template', $data);
		} else {
			redirect();
		}
	}
	
	public function testimonials(){
		$data['page_title'] = "Testimonials - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 20;
		$data['act'] = 20.1;
		$data['middle_content'] = 'testimonials';	
		
		$this->db->select('name as brand');
		$this->db->where('status', 1);
		$this->db->order_by('order_no', 'asc');
		$brands = $this->db->get("investors_category")->result_array();
		
		// echo '<pre>';print_r($brands);exit();

		$testimonials = [];

		if ($brands) {
				foreach ($brands as $brand) {
					
					$this->db->select('id,video_thumbnail,video_url');
					$this->db->where('status', 1);
					$this->db->where('brand', $brand['brand']);
					$this->db->where('video_thumbnail !=', '');
					$this->db->where('video_url !=', '');
					$this->db->order_by('order_no', 'asc');
					$query = $this->db->get("testimonial");
					$video = $query->result();
					
					$this->db->select('id,text,client_name');
					$this->db->where('status', 1);
					$this->db->where('brand', $brand['brand']);
					$this->db->where('client_name !=', '');
					$this->db->where('text !=', '');
					$this->db->order_by('order_no', 'asc');
					$query = $this->db->get("testimonial");
					$text = $query->result();
					
					if (!empty($video) || !empty($text)) {
            $testimonials_data = [
                'brand' => $brand['brand'],
                'data' => []
            ];

            if (!empty($video)) {
                $video_chunks = array_chunk($video, 10);
                $testimonials_data['data']['video'] = $video_chunks;
            }

            if (!empty($text)) {
                $testimonials_data['data']['text'] = $text;
            }

            $testimonials[] = $testimonials_data;
        	}
				}
		}


		// echo '<pre>';print_r($testimonials);exit();
		
		$data['testimonials'] = array_values($testimonials);
			
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function house_of_vivah_form(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['venue'] = $this->input->post('venue');
		$add['date'] = $this->input->post('date');
		$add['event'] = $this->input->post('event');
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for']  . "<br>Event: " . $add['event'] . "<br>Venue: " . $add['venue'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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
	
	public function event_factory_form(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['companyname'] = $this->input->post('companyname');
		$add['designation'] = $this->input->post('designation');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['venue'] = $this->input->post('venue');
		$add['date'] = $this->input->post('date');
		$add['event'] = $this->input->post('event');
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		if($add['event'] === 'other'){
			$add['subEvent'] = $this->input->post('otherEvent');
		}
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for'] . "<br>Company Name: " . $add['companyname'] . "<br>Designation: " . $add['designation']  . "<br>Event: " . $add['event'] . "<br>Sub Event: " . $add['subEvent'] . "<br>Venue: " . $add['venue'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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

	public function live_space_form(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['venue'] = $this->input->post('venue');
		$add['date'] = $this->input->post('date');
		$add['eventType'] = $this->input->post('eventType');
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		$add['artistRequirement'] = $this->input->post('artistRequirement');
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for'] . "<br>Event Type: " . $add['eventType'] . "<br>Artist Requirement: " . $add['artistRequirement'] . "<br>Venue: " . $add['venue'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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
	
	public function party_house_form(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['venue'] = $this->input->post('venue');
		$add['date'] = $this->input->post('date');
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		$add['event'] = $this->input->post('event');
		if($add['event'] === 'other'){
			$add['subEvent'] = $this->input->post('otherEvent');
		}
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for'] . "<br>Event: " . $add['event'] . "<br>Sub Event: " . $add['subEvent'] . "<br>Venue: " . $add['venue'] . "<br>Location: " . $add['location'] . "<br>Date: " . $add['date'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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
	
	public function franchise_form(){
		// echo '<pre>';print_r($_POST);exit();
		$add['u_name'] = $this->input->post('name');
		$add['enquiry_for'] = $this->input->post('enquiry_for');
		$add['country_code'] = $this->input->post('countryCode');
		$add['u_mobile'] = $this->input->post('contact');
		$add['u_email'] = $this->input->post('email');
		$add['location'] = $this->input->post('location');
		$add['workProfile'] = $this->input->post('workProfile');
		
		if ($this->db->insert('submit_contact', $add)){
			$msg_subject = "[PCL] Thanks for the inquiry";
			$msg = "HI ". $add['u_name'] ."<br>Thank you for contact with us. <br>We will get back to you shortly.<br><br>Thanks<br>Team PARTY CRUISERS LTD.";
			$from_email = "enquiry@partycruisersindialtd.com";
			if ($this->sendMail($add['u_email'],$from_email,$msg_subject,$msg)) {
				$phone =  $this->input->post('phone_number',true);
				$html = "Name: " . $add['u_name'] . "<br>Email: " . $add['u_email'] . "<br>Phone: " . $add['country_code'] . $add['u_mobile'] . "<br>Enquiry for: " . $add['enquiry_for'] . "<br>Work Profile: " . $add['workProfile'] . "<br>Location: " . $add['location'] . ".";
				$from_email = "enquiry@partycruisersindialtd.com";
				$msg_subject = "[PCL] Thanks for the inquiry";
					if($this->sendMail($from_email,$from_email,$msg_subject,$html)){
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
	
	public function pep(){
		$data['page_title'] = "Partnership Entrepreneurship Program - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 21;
		$data['act'] = 21.1;
		$data['middle_content'] = 'pep';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function brand_ambassador(){
		$data['page_title'] = "Brand Ambassador - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 22;
		$data['act'] = 22.1;
		$data['middle_content'] = 'brand_ambassador';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
	public function carrer(){
		$data['page_title'] = "carrer - Party Cruisers";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "";
		$data['meta_image'] = '';
		$data['active'] = 23;
		$data['act'] = 23.1;
		$data['middle_content'] = 'carrer';	
		
		$this->load->view('frontend/layout/template', $data);
	}
	
}