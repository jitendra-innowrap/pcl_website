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
		$data['page_title'] = "Best Enterprise solutions company | Digital solutions services | Wep digital";
		$data['meta_desc'] = "Wep Digital is an enterprise solutions company that offers a wide range of digital services. We are India's best document management system provider & gst suvidha provider.";
		$data['meta_keyword'] = "Enterprise solutions services,Enterprise solutions company,Best GST Suvidha Provider.,document management system providers,Digital solutions company,Digital solutions services";
		$data['meta_image'] = base_url('assets/images/wep-logo-footer.png');
		$data['active'] = 1;
		$data['act'] = 1.1;
		$data['middle_content'] = 'index';
		$this->db->where('status', 1);
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("banner");
		$data['banner_list'] = $query->result();
		$this->db->where('status', 1);
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("home_banner");
		$data['home_banners'] = $query->result();
		$this->db->where('home_page', 1);
		$this->db->order_by('h_order_no', 'asc');
		$query = $this->db->get("clientele");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function contact()
	{
		$data['page_title'] = "Contact us - WeP Digital";
		$data['meta_desc'] = "Connect with Wep Digital today to learn more about our services and how we can help you with your Business";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'contact';
		$this->db->select('w.*,TIMESTAMPDIFF(MINUTE,w.from_time,w.to_time) as duration');
		$this->db->where(array('w.status' => 1));
		$this->db->limit(1);
        $this->db->order_by('w.date', 'desc');
		$query = $this->db->get("webinar w");
		$webinars = $query->result_array();
		foreach ($webinars as $key => $webinar) {
			$this->db->select('s.*');
			$this->db->limit(2);
			$this->db->where(array('s.status' => 1, 'webinar_id' => $webinar['id']));
			$this->db->join('speakers s', 's.id = ws.speaker_id', 'left');
			$speaker = $this->db->get("webinar_speaker ws");
			$webinars[$key]['speakers'] = $speaker->result_array();
		}
		$data['webinars'] = $webinars;
		if (isset($_POST['user_email'])){
			$requesttype = $this->input->post('user_request');
			$full_name = $this->input->post('full_name');
			$user_email = $this->input->post('user_email');
			$phone = $this->input->post('user_phone');
			$designation = $this->input->post('designation');
			$companyname = $this->input->post('companyname');
			$product = $this->input->post('product');
			$know_about = $this->input->post('know_about');
			$msg = $this->input->post('message');
			$city = $this->input->post('user_city');
			// validate ---------------
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
			$this->form_validation->set_rules('user_phone', 'Phone', 'required');
			$this->form_validation->set_rules('product', 'Product', 'trim|required');
			$this->form_validation->set_rules('user_city', 'City', 'trim|required');
			$this->form_validation->set_rules('companyname', 'Company Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('contact', validation_errors('<div class="error">', '</div>'));
				redirect(base_url('contact-us'));
			} else {
				$message = "First Name : $full_name  <br> Email : $user_email <br> Phone : $phone <br> Company Name : $companyname<br> Designation : $designation <br> Request type : $requesttype <br> Product : $product <br> About me : $know_about <br> City : $city <br> Message : $msg";
				if ($this->sendMail('info@wepdigital.com', 'info@wepdigital.com', 'Contact Us', $message)) {
					$message = "Hi $full_name,<br><br> Thank you for contacting WeP solutions.<br><br> We have received your details, and we will get back to you soon.<br><br>Regards,<br>WeP solutions Ltd<br>9019915746";
					$this->sendMail($user_email, 'info@wepdigital.com', 'Thank you for contacting WeP Solutions', $message);
					$form_msg = "$full_name, Thank you for contacting WeP solutions.";
					$this->session->set_flashdata('contact', $form_msg);
					redirect(base_url('contact-us'));
				} else {
					$this->session->set_flashdata('contact', 'Something went wrong, try again some time!');
					redirect(base_url('contact-us'));
				}
			}
		}
		$this->load->view('frontend/layout/template', $data);
	}

	public function leadership()
	{
		$data['page_title'] = "Leadership - WeP Digital";
		$data['meta_desc'] = "Leadership is about how you can solve a problem for a customer. It is not about what you say, it is what you do click here to see the leadership of WeP Digital.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'leadership';
		$this->load->view('frontend/layout/template', $data);
	}

	public function webinars()
	{
		$data['page_title'] = "Webinars on e-Invoice| GST filing | Management of change | low code platform";
		$data['meta_desc'] = "Wep digital delivers free online webinars that provide in-depth information on the GST filing, e-invoice, management of change and workflow automation software";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'webinars';
		$this->db->select('w.*,TIMESTAMPDIFF(MINUTE,w.from_time,w.to_time) as duration');
		$this->db->where(array('w.status' => 1));
		$this->db->order_by('w.date', 'desc');
		$query = $this->db->get("webinar w");
		$webinars = $query->result_array();
		foreach ($webinars as $key => $webinar) {
			$this->db->select('s.*');
			$this->db->limit(2);
			$this->db->where(array('s.status' => 1, 'webinar_id' => $webinar['id']));
			$this->db->join('speakers s', 's.id = ws.speaker_id', 'left');
			$speaker = $this->db->get("webinar_speaker ws");
			$webinars[$key]['speakers'] = $speaker->result_array();
		}
		$data['webinars'] = $webinars;
		$this->load->view('frontend/layout/template', $data);
	}

	public function webinars_detail()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$this->db->select('*,TIMESTAMPDIFF(MINUTE,from_time,to_time) as duration');
		$query = $this->db->get('webinar');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('webinars');
		}

		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_description'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'webinars_detail';

		$this->db->select('s.*');
		$this->db->where(array('s.status' => 1, 'webinar_id' => $result['id']));
		$this->db->join('speakers s', 's.id = ws.speaker_id', 'left');
		$speaker = $this->db->get("webinar_speaker ws");
		$data['speakers'] = $speaker->result_array();

		$this->db->select('w.slug,w.title');
		$this->db->limit(3);
		$this->db->where(array('w.status' => 1));
		$this->db->order_by('w.order_no', 'asc');
		$query = $this->db->get("webinar w");
		$data['recent_webinar'] = $query->result_array();

		$this->load->view('frontend/layout/template', $data);
	}

	public function Everything_eInvoicing()
	{
		$data['page_title'] = "Everything e-Invoicing! | Wep";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'webinar/e_invoicing';
		$this->db->where(array('c.product_page' => 1, 'product_page' => 'eWay Bill/eInvoice'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function Customer_Talks_eInvoicing()
	{
		$data['page_title'] = "Customer Talks e-Invoicing! | Wep";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'webinar/customer-talks-e-invoicing';
		$this->load->view('frontend/layout/template', $data);
	}

	public function webinars_video()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$this->db->select('*');
		$query = $this->db->get('webinar');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('webinars/' . $result['slug']);
		}
		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_description'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'webinars_video';
		if (isset($_POST['webinar'])){
			if (empty($_POST['url'])){
				$webinar = $this->input->post('webinar');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$user_email = $this->input->post('user_email');
				$Wep_platform = $this->input->post('Wep_platform');
				$message = "First Name : $first_name <br> Last Name : $last_name <br> Email : $user_email <br> Webinar : $webinar <br> Wep Platform : $Wep_platform";
				$this->sendMail('info@wepdigital.com','info@wepdigital.com','Webinars',$message);
			}
		}
		$this->load->view('frontend/layout/template', $data);
	}

	public function ebook()
	{
		$data['page_title'] = "Ebook & Guides | Wep";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'ebook';
		$this->load->view('frontend/layout/template', $data);
	}

	public function ebook_detail()
	{
		$data['page_title'] = "Ebook & Guides | Wep";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'ebook_detail';
		$this->load->view('frontend/layout/template', $data);
	}

	public function about()
	{
		$data['page_title'] = "Our Story - WeP Digital";
		$data['meta_desc'] = "WeP is a leading provider of printing and digital solutions for businesses, government agencies, and the education sector. We help our clients grow through our affordable, innovative printing and digital solutions.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'about';
		$this->load->view('frontend/layout/template', $data);
	}

	public function blogs()
	{
		$data['page_title'] = "Blogs| Managed print services, e invoice, gst filing, gst e-way bill system";
		$data['meta_desc'] = "Would you like to know more about gst filing, e-Invoice, gst e-way bill system and managed print services? Read more on these important topics and more on WeP blogs";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'blogs';
//		----------------
		$this->db->where('status', 1);
//        $this->db->order_by('order_no','asc');
		$query = $this->db->get("blog_category");
		$data['blogs_category'] = $query->result();
//        ---------------
		$this->db->select('bc.name as category,b.*');
		$this->db->where(array('bc.status' => 1, 'b.status' => 1));
		$this->db->order_by('b.blog_date', 'desc');
		$this->db->join('blog_category bc', 'bc.id = b.blog_cat_id', 'left');
		$query = $this->db->get("blogs b");
		$data['blogs'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function blogs_detail()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$query = $this->db->get('blogs');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('blogs');
		}
		$this->db->limit(4);
		$this->db->select('bc.name as category,b.slug,b.title,b.image_medium,b.blog_date,b.author,b.image_alt,b.meta_title,b.meta_desc,b.meta_keyword,b.image_medium');
		$this->db->where(array('bc.status' => 1, 'b.status' => 1, 'b.slug !=' => $id));
		$this->db->order_by('b.order_no', 'asc');
		$this->db->join('blog_category bc', 'bc.id = b.blog_cat_id', 'left');
		$query = $this->db->get("blogs b");
		$data['blogs'] = $query->result();
//        print_r($res);exit;
//        -------------------------------
		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_desc'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = base_url() . $result['image_medium'];
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'blogs_detail';
		$this->load->view('frontend/layout/template', $data);
	}

	public function case_studies()
	{
		$data['page_title'] = "Case studies on gst filing | e-invoice | document management services";
		$data['meta_desc'] = "Business benefits & customer satisfaction case-studies of our Employee Records Management system, Document management services, gst filing & managed print services";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'case_studies';
		//		----------------
		$this->db->where('status', 1);
//        $this->db->order_by('order_no','asc');
		$query = $this->db->get("casestudies_category");
		$data['casestudies_category'] = $query->result();
//        ---------------
		$this->db->select('cc.name as category,c.*');
		$this->db->where(array('cc.status' => 1, 'c.status' => 1));
		$this->db->order_by('c.case_date', 'desc');
		$this->db->join('casestudies_category cc', 'cc.id = c.case_s_id', 'left');
		$query = $this->db->get("case_studies c");
		$data['casestudies'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function case_studies_detail()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$query = $this->db->get('case_studies');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('case-studies');
		}
		$this->db->limit(4);
		$this->db->select('cc.name as category,c.slug,c.title,c.image_medium,c.case_date,c.author,c.image_alt,c.meta_title,c.meta_desc,c.meta_keyword,c.image_medium');
		$this->db->where(array('cc.status' => 1, 'c.status' => 1, 'c.slug !=' => $id));
		$this->db->order_by('c.order_no', 'asc');
		$this->db->join('casestudies_category cc', 'cc.id = c.case_s_id', 'left');
		$query = $this->db->get("case_studies c");
		$data['casestudies'] = $query->result();
//        ------------------------------------------
		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_desc'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = base_url() . $result['image_medium'];
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'case_studies_detail';
		$this->load->view('frontend/layout/template', $data);
	}

	public function whitepaper()
	{
		$data['page_title'] = "Checkout the latest GST Notification | WeP Digital";
		$data['meta_desc'] = "Checkout the latest GST Notifications. Wep digital is one of the most trusted GST software company in India. Get all the details about the GST here.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'whitepaper';
		$this->db->select('g.*');
		$this->db->where(array('g.status' => 1));
		$this->db->order_by('g.notification_date', 'desc');
		$query = $this->db->get("gst_notification g");
		$data['gst_notification'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function whitepaper_detail()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$query = $this->db->get('gst_notification');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('gst-notification');
		}
		$this->db->limit(4);
		$this->db->select('n.*');
		$this->db->where(array('n.status' => 1, 'n.slug !=' => $id));
		$this->db->order_by('n.order_no', 'asc');
		$query = $this->db->get("gst_notification n");
		$data['gst_notification'] = $query->result();
		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_desc'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = base_url() . $result['image_medium'];
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'whitepaper_detail';
		$this->load->view('frontend/layout/template', $data);
	}

	public function faq()
	{
		$data['page_title'] = "Frequently Asked Questions - e invoice | Gst filing | e-Way Bill software";
		$data['meta_desc'] = "E-invoicing is compulsory for companies with an annual turnover of more than 500 crores. Here are some FAQs about e-Invoice, GST filing, and e-way bill software";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'faq';
		$this->db->select('f.*');
		$this->db->where(array('f.status' => 1));
		$this->db->order_by('f.order_no', 'asc');
		$query = $this->db->get("faq_category f");
		$faqlists = $query->result_array();
		foreach ($faqlists as $key => $faqlist) {
			$this->db->select('fs.*');
			$this->db->order_by('fs.order_no', 'asc');
			$this->db->where(array('fs.status' => 1, 'fs.faq_id' => $faqlist['id']));
			$faqs = $this->db->get("faqs fs");
			$faqlists[$key]['faqs'] = $faqs->result_array();
		}
		$data['faq_list'] = $faqlists;
		$this->load->view('frontend/layout/template', $data);
	}

	public function privacy_policy()
	{
		$data['page_title'] = "Privacy Policy - WeP Digital";
		$data['meta_desc'] = "WeP Digital respects the privacy of its users and we want you to be familiar with how we collect and use your information. Please review this Privacy Policy so you can understand how we use and protect your information.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'privacy_policy';
		$this->load->view('frontend/layout/template', $data);
	}

	public function terms_of_use()
	{
		$data['page_title'] = "Terms of use | WeP Digital";
		$data['meta_desc'] = "WeP Digital has created this website to provide useful information about different services offered. Please read through this page carefully before using the services. We reserve the right to make changes to this page at any time.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'terms_of_use';
		$this->load->view('frontend/layout/template', $data);
	}

	public function green_initiatives()
	{
		$data['page_title'] = "Green Initiatives - WeP Digital";
		$data['meta_desc'] = "WeP Digital is not only committed to the highest standards in e-waste recycling, but also to using green technology that is environmentally friendly.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'green_initiatives';
		$this->load->view('frontend/layout/template', $data);
	}

	public function ricoh()
	{
		$data['page_title'] = "Exclusive Ricoh distributors in India| ricoh authorized dealers";
		$data['meta_desc'] = "Ricoh digital printing solutions empowering office automation, industrial and commercial printing products, through their extensive Ricoh Authorized Dealers network";
		$data['meta_keyword'] = "ricoh authorized dealers, ricoh distributors in india, ricoh printer dealers, ricoh dealers";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'ricoh_v2';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Ricoh'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
//		form dropdown ==========================
		$this->db->where('status',1);
		$this->db->order_by('order_no','asc');
		$data['formdropdown'] = $this->db->get('ricoh_form_dropdown')->result_array();
//		Slider =================================
		$this->db->where('status',1);
		$this->db->select("*,IF(form_dropdown!=0,(SELECT title FROM ricoh_form_dropdown WHERE id=ricoh_slider.form_dropdown),'') as formdropdown");
		$this->db->order_by('order_no','asc');
		$data['ricoh_sliders'] = $this->db->get('ricoh_slider')->result_array();
//		print_r($data['ricoh_sliders']);exit();
		$this->load->view('frontend/layout/template', $data);
	}

	public function moc()
	{
		$data['page_title'] = "Best Management of change software | document management software";
		$data['meta_desc'] = "Manage change request with WeP Document management software. Maintain compliance with best Management of change software. Maintain audit trial with workflow automation software.";
		$data['meta_keyword'] = "change management process, management of change, organizational change management";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'moc';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Management of Change'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function mps()
	{
		$data['page_title'] = "Best Managed Print Service Providers in India | Ricoh Managed Print Services";
		$data['meta_desc'] = "Ricoh managed Print Services make printing secure and cost-effective. With Managed Print Service Solutions, customers can print from anywhere, at any time. Wep management system provides a low cost per page";
		$data['meta_keyword'] = "Print Management companies in India, Managed print services in india, Ricoh Managed Print Services, managed print services solutions, managed print service providers";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'mps';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Managed Print Services'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function dms()
	{
		$data['page_title'] = "Best document management System Software  | document management solutions in India";
		$data['meta_desc'] = "Document Repository Software helps you store, manage and track all documents at one place. WeP digital's document mangement system software makes your job easy and efficient.";
		$data['meta_keyword'] = "document management solutions,document management system software,document management companies in india,document repository software,business document management system";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'dms';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Document Management'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function workflow_automation()
	{
		$data['page_title'] = "Best Enterprise workflow Management Software|business process management System";
		$data['meta_desc'] = "Best workflow automation software & document workflow automation that saves time. WeP provides a business process management software to streamline your business processes ";
		$data['meta_keyword'] = "enterprise workflow management software,document workflow automation Software,business process automation software,software for business process management, business process workflow solutions,workflow management system";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'workflow_automation';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Workflow Automation'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function erm()
	{
		$data['page_title'] = "Top Employee Record Management system| HR Document Management Software";
		$data['meta_desc'] = "Employee record management software helps you to collect,  track,  & connect with your employees. Wep's HR Document Management Software ensures security and compliance.";
		$data['meta_keyword'] = "employee database management system,employee record management system,hr file management software,hr document management software,employee record management software";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'erm';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Employee records management'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function low_code_dev()
	{
		$data['page_title'] = "Best low code application development  in India | No code Developement Platform";
		$data['meta_desc'] = "Best Low code application development platforms from Wep Digital helps build custom applications.  WeP's best No Code development platforms based apps are highly scalable ";
		$data['meta_keyword'] = "no code development platforms,best low code development platform,low code application development,no code application builder";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'low_code_dev';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Low code development'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function investor()
	{
		$data['page_title'] = "Investor";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'investor';
		$this->db->where(array('status' => 1));
		$this->db->order_by('order_no', 'asc');
		$query = $this->db->get("investors_category");
		$investors = $query->result_array();
		foreach ($investors as $key => $investor) {
            $this->db->order_by('created_date', 'desc');
			$this->db->where(array('status' => 1, 'category_id' => $investor['id']));
			$speaker = $this->db->get("investors");
			$investors[$key]['investors'] = $speaker->result_array();
		}
		$data['investors'] = $investors;
		$this->load->view('frontend/layout/template', $data);
	}

	public function newsroom()
	{
		$data['page_title'] = "Newsroom - WeP Digital";
		$data['meta_desc'] = "To View the latest news, announcements and services from Wep Digital Click Here";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'newsroom';
		$this->db->select('n.*');
		$this->db->where(array('n.status' => 1));
		$this->db->order_by('n.news_date', 'desc');
		$query = $this->db->get("newsroom n");
		$data['newsrooms'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function newsroom_detail()
	{
		$id = $this->uri->segment(2);
		$this->db->where('slug', $id);
		$query = $this->db->get('newsroom');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('newsroom');
		}
		$this->db->limit(4);
		$this->db->select('n.*');
		$this->db->where(array('n.status' => 1, 'n.slug !=' => $id));
		$this->db->order_by('n.news_date', 'desc');
		$query = $this->db->get("newsroom n");
		$data['newsrooms'] = $query->result();
//        ------------------------------------------
		$data['page_title'] = $result['meta_title'];
		$data['meta_desc'] = $result['meta_desc'];
		$data['meta_keyword'] = $result['meta_keyword'];
		$data['meta_image'] = base_url() . $result['image_medium'];
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'newsroom_detail';
		$this->load->view('frontend/layout/template', $data);
	}

	public function careers()
	{
		$data['page_title'] = "Careers - WeP Digital";
		$data['meta_desc'] = "Wep Digital is a fast growing company that is growing every day. We are recruiting for multiple positions, from junior to senior. You can find out more about our jobs here.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'careers/index';
//		$this->db->where('status',1);
		$this->db->select('DISTINCT(city_name) as city_name');
		$data['careers_job_location'] = $this->db->get('careers_job_location')->result();
		$data['careers_role'] = $this->db->where('status',1)->order_by('order_no','asc')->get('careers')->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function careers_detail()
	{
		$data['page_title'] = "Careers detail | Wep Digital";
		$data['meta_desc'] = "";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'careers/careers_detail';
		$id = $this->uri->segment(2);
		$this->db->where('c.slug', $id);
		$this->db->select("c.*,cj.city_name,cd.name,(SELECT GROUP_CONCAT(city_name SEPARATOR ' | ') as location FROM careers_job_location WHERE careers_id = c.id) as 'location'");
		$this->db->group_by('c.id');
		$this->db->order_by('c.order_no', 'DESC');
		$this->db->join('careers_job_location cj', 'cj.careers_id = c.id', 'left');
		$this->db->join('careers_department cd', 'cd.id = c.department_id', 'left');
		$query = $this->db->get('careers c');
		$result = $query->row_array();
		if ($result) {
			$data['result'] = $result;
		} else {
			redirect('careers');
		}
		$data['page_title'] = $result['job_name']." | Careers | Wep digital";
		$data['meta_desc'] = "Wep Digital is an enterprise solutions company that offers a wide range of digital services. We are India's best document management system provider & gst suvidha provider.";
		$data['meta_keyword'] = "Enterprise solutions services,Enterprise solutions company,Best GST Suvidha Provider.,document management system providers,Digital solutions company,Digital solutions services";
		$data['meta_image'] = base_url('assets/images/wep-logo-footer.png');
		$data['careers_role'] = $this->db->where('status',1)->order_by('order_no','asc')->get('careers')->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function einvoice()
	{
		$data['page_title'] = "Best GST eInvoicing & eWay Bill Software In India | Invoice management Software";
		$data['meta_desc'] = "Use WeP's best online invoicing software to combine your bills and streamline your process. The invoice management software from WeP digital allows you to download an infinite number of e-Invoices.";
		$data['meta_keyword'] = "invoice management software, electronic invoicing software, best online invoicing software, gst e invoicing Software,
gst e way bill software";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'einvoice';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'eWay Bill/eInvoice'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function p2p()
	{
		$data['page_title'] = "Best Procurement Management Software| Procure to pay software Solutions in India";
		$data['meta_desc'] = "Wep Digital offers the Best procurement management software in india. To get visibility into agreements, decrease cycle times, and manage compliance, you may use Wep's digital procurement software.";
		$data['meta_keyword'] = "E procurement software,digital procurement software,procurement management software,purchase to pay software,procure to pay software solutions";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'p2p';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Procure to pay'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function gst()
	{
        $data['page_title'] = "Best GST Platform for GST Return Filing|GST Reconciliations|MIS reports";
        $data['meta_desc'] = "Best GST platform for GST return filing, GST reconciliations and MIS reports generation. WeP's GST return filing software offers customized packages, Audit trial and best support.";
        $data['meta_keyword'] = "gst reconciliations, MIS reports, GST return filing";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'gst';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'WeP GST Solution'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

	public function gst_filling()
	{
		$data['page_title'] = "Best GST Return Filing Software in India | GSTR 2a Reconciliation Software";
		$data['meta_desc'] = "Filing your GST returns is now easy with WeP GST return filing software. WeP provides an easy-to-use GST filing software with all the forms and features you need";
		$data['meta_keyword'] = "managed gst filing services in india, gst return filing service provider, Best monthly GST Returns";
		$data['meta_image'] = "";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'services/Managed-GST-Filling';
		$this->db->where(array('c.product_page' => 1, 'pc.product_page' => 'Managed GST Filing Services'));
		$this->db->join('product_clientele pc', 'pc.clientele_id=c.id', 'left');
		$this->db->order_by('pc.order_no', 'asc');
		$query = $this->db->get("clientele c");
		$data['clientele'] = $query->result();
		$this->load->view('frontend/layout/template', $data);
	}

//    Job Search ---------------------------

	function fetch()
	{
		$output = '';
		$query = '';
		$job_location = '';
		$this->load->model('Job_Model');
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		if ($this->input->post('job_location')) {
			$job_location = $this->input->post('job_location');
		}
		$data = $this->Job_Model->fetch_data($query, $job_location);

		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$output .= '
      <div class="job-block show">
			<div class="d-flex">
				<div class="job-t"><h4><a href="' . base_url('careers/' . $row->slug) . '" target="_blank">' . $row->job_name . '</a></h4>
				<p>' . $row->location . '</p><p class="Pt(10px)"><strong>Experience</strong> ' . $row->experience . '</p></div>
				<div class="job-al align-self-center"><a href="' . base_url('careers/' . $row->slug) . '" class="apply-btn" target="_blank">Apply</a></div>
			</div>
		</div>
    ';
			}
		} else {
			$output .= '<h4 class="text-center">
       <span>No result found</span>
      </h4>';
		}
		echo $output;
	}

	function faq_data()
	{
		$output = '';
		$query = '';
		$this->load->model('Job_Model');
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Job_Model->faq_data($query);
		if ($data) {
			foreach ($data as $k => $faqlist) {
				$faq_category = $faqlist['name'];
				$output .= '<h3 class="faq-heading Fw(700)" id="accordion-list-' . $k . '">' . $faq_category . '</h3><div class="accordion faq-accordion mb-5" id="accordion-.$k.">
						<div class="accordion-item">';
				foreach ($faqlist['faqs'] as $j => $faq) {
					$num = $k . $j;
					$questCount = $j + 1;
					$question = $this->highlightWords($faq['question'],$query);
					$answer = $this->highlightWords($faq['answer'],$query);
					$output .= '<h2 class="accordion-header Fz($font-size-18)" id="heading' . $num . '">
								<button class="accordion-button collapsed  text-start search-faq" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $num . '" aria-expanded="true" aria-controls="collapse' . $num . '"><div>' . $questCount.'.  ' . $question . '</div></button>
							</h2>
							<div id="collapse' . $num . '" class="accordion-collapse collapse show in" aria-labelledby="heading' . $num . '" data-bs-parent="#accordion-' . $num . '">
								<div class="accordion-body in">' . $answer . '</div>
							</div>';
				}
				$output .= '</div></div>';
			}

		} else {
			$output .= '<div class="Pt(40px) Pb(120px)"><h4 class="text-center">
					  	 <span>No result found</span>	
					  </h4></div>';
		}
		echo $output;
	}

	function highlightWords($text, $word){
		if (!empty($word) && $word != '') {
			$result = preg_replace('#' . preg_quote($word) . '#i', '<span style="background-color: #F9F902;">\\0</span>', $text);
		}else{
			$result = $text;
		}
		return $result;
	}

	function sendMail($to,$from,$subject,$message) {
		$config = array(
			'priority' => '1',
			'protocol' => 'smtp', //mail, sendmail, or smtp
			'smtp_crypto' => 'tls',
			'smtp_host' => 'smtp.office365.com',
			'smtp_port' => 587,
			'smtp_user' => 'info@wepdigital.com', // change it to yours
			'smtp_pass' => 'wepdigital.12345', // change it to yours
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
		if ($this->email->send()){
			return true;
		}else{
			return false;
		}
	}

    public function gstsuvidhaprovider(){
        redirect(base_url('best-gst-platform-for-return-filing'));
    }

	public function offers()
	{
		$data['page_title'] = "Offers | Wep Digital";
		$data['meta_desc'] = "Wep Digital is an enterprise solutions company that offers a wide range of digital services. We are India's best document management system provider & gst suvidha provider.";
		$data['meta_keyword'] = "e invoice, gst invoice, gst filing, E way bill , electronic invoicing systems & document management solutions";
		$data['meta_image'] = base_url('uploads/offers/offers-1.jpg');
		$data['active'] = 7;
		$data['act'] = 7.1;
		$data['middle_content'] = 'offers';
		$data['offers_categories'] = $this->db->where('is_active',1)->order_by('order_no', 'asc')->get('offers_categories')->result_array();
		$this->db->select('o.*,oc.category_name,oc.category_slug')->where(array('o.is_active' => 1,'oc.is_active' => 1))->order_by('o.order_no', 'asc');
		$offers = $this->db->join('offers_categories oc','oc.id=o.offers_categories_id','left')->get("offers o")->result_array();
		foreach ($offers as $k => $offer){
			$this->db->select("o.offer_title as offer_title,o.offer_desc as offer_desc,o.route_url,o.offer_image_alt");
			$offer_data = $this->db->where('id',$offer['id'])->get("offers o")->row_array();
			$offers[$k]['offer_data'] = json_encode($offer_data);
		}
		$data['offers'] = $offers;
		$this->load->view('frontend/layout/template', $data);
	}

	function career_apply(){
		if ($this->input->post('fullname') && $this->input->post('uemail')){
			if (isset($_POST['email']) && $_POST['email'] != ''){
				$this->session->set_flashdata('career', 'Not Allowed');
				redirect(base_url('careers'));
			}
			$this->load->model('Master_model','Master');
			$fullName = $this->input->post('fullname');
			$mobile = $this->input->post('mobile');
			$uemail = $this->input->post('uemail');
			$city = $this->input->post('city');
			$job_role = $this->input->post('job_role');
			$resume = '';
			if (isset($_FILES['file'])) {
				$path = 'resumes';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$resume = $image['img_url'];
				}
			}
			$config = array(
				'priority' => '1',
				'protocol' => 'smtp', //mail, sendmail, or smtp
				'smtp_crypto' => 'tls',
				'smtp_host' => 'smtp.office365.com',
				'smtp_port' => 587,
				'smtp_user' => 'info@wepdigital.com', // change it to yours
				'smtp_pass' => 'wepdigital.12345', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE,
				'newline' => "\r\n"
			);
			$message  = "Full Name : $fullName<br>";
			$message .= "Mobile Number : $mobile<br>";
			$message .= "Email  : $uemail<br>";
			$message .= "City : $city<br>";
			$message .= "Job Role : $job_role<br>";
			$this->email->initialize($config);
			$this->email->from('careers@wepdigital.com');
			$this->email->to("info@wepdigital.com");
			$this->email->attach(FCPATH.'/'.$resume);
			$this->email->subject('Careers | Wep Digital');
			$this->email->message($message);
			if ($this->email->send()){
				$this->session->set_flashdata('career', 'Thank you for filling out your information!');
				redirect(base_url('careers'));
			}else{
				$this->session->set_flashdata('career', 'Something went wrong!');
				redirect(base_url('careers'));
			}
		}
	}
}

