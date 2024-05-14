<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
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
		$this->load->library('encryption');
		$this->load->library('user_agent');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function read_content(){
		if(isset($_POST['target_url'])){
			$firstname = $this->input->post('first_name');
			$lastname = $this->input->post('last_name');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$target_url = $this->input->post('target_url');
			$page = $this->input->post('page');
			$content_title = $this->input->post('content_title');
			$user_data = "$firstname|$lastname|$mobile|$email";
			$userdetail = $this->encrypt->encode($user_data);
			$add = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'mobile' => $mobile,
				'url' => $target_url,
				'content_title' => $content_title,
				'page' => $page,
			);
//            $this->db->insert('user_active',$add);
			$cookie_array = array(
				'name'   => 'WDID',
				'value'  => $userdetail,
				'expire' => '3600',
//                'domain' => base_url(),
//                'secure' => TRUE,
//                'path' => '/',
//                'httponly' => TRUE
			);
			$this->input->set_cookie($cookie_array);

			$file_headers = @get_headers($target_url);
			if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
				redirect($this->agent->referrer());
			}
			else {
				redirect($target_url);
			}

		}
	}

	function submitForm(){
		if (isset($_POST['request-type'])){
			if (empty($_POST['url'])){
				$to_mail = 'info@wepdigital.com';
				$requesttype = $this->input->post('request-type');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$user_email = $this->input->post('user_email');
				$phone = $this->input->post('phone');
				$product = $this->input->post('product');
				$city = $this->input->post('city');
				$CompanyName = $this->input->post('CompanyName');
				// validate ---------------
				$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
				$this->form_validation->set_rules('phone', 'Phone', 'required');
				$this->form_validation->set_rules('product', 'Product', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('CompanyName', 'Company Name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('form-msg', validation_errors('<div class="error">', '</div>'));
					redirect(base_url());
				} else {
					$message = "First Name : $first_name <br> Last Name : $last_name <br> Email : $user_email <br> Phone : $phone <br> Product : $product <br> City : $city <br>Company Name : $CompanyName <br>";
					if ($this->sendMail($to_mail, $to_mail, $requesttype, $message)) {
						$message = "Hi $first_name,<br><br> Thank you for contacting WeP solutions.<br><br> We have received your details, and we will get back to you soon.<br><br>Regards,<br>WeP solutions Ltd<br>9019915746";
						$this->sendMail($user_email, 'info@wepdigital.com', 'Thank you for contacting WeP Solutions', $message);
						$form_msg = "$first_name,<br> Thank you for contacting WeP solutions.";
						$this->session->set_flashdata('form-msg', $form_msg);
						redirect(base_url());
					} else {
						$this->session->set_flashdata('form-msg', 'Something went wrong, try again some time!');
						redirect(base_url());
					}
				}
			}
		}
	}

	function submitcontactForm(){
		if (isset($_POST['request-type'])){
			if (empty($_POST['url'])){
				$to_mail = 'info@wepdigital.com';
				$requesttype = $this->input->post('request-type');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$user_email = $this->input->post('user_email');
				$phone = $this->input->post('phone');
				$help = $this->input->post('help');
				$city = $this->input->post('city');
				$CompanyName = $this->input->post('CompanyName');
				// validate ---------------
				$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
				$this->form_validation->set_rules('phone', 'Phone', 'required');
				$this->form_validation->set_rules('help', 'Help', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('CompanyName', 'Company Name', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('form-msg', validation_errors('<div class="error">', '</div>'));
					redirect(base_url());
				} else {
					$message = "Full Name : $first_name <br> Email : $user_email <br> Phone : $phone <br> How can we help you ? : $help <br> City : $city <br>Company Name : $CompanyName <br>";
					if ($this->sendMail($to_mail, $to_mail, $requesttype, $message)) {
						$message = "Hi $first_name,<br><br> Thank you for contacting WeP solutions.<br><br> We have received your details, and we will get back to you soon.<br><br>Regards,<br>WeP solutions Ltd<br>9019915746";
						$this->sendMail($user_email, 'info@wepdigital.com', 'Thank you for contacting WeP Solutions', $message);
						$form_msg = "$first_name,<br> Thank you for contacting WeP solutions.";
						$this->session->set_flashdata('form-msg', $form_msg);
						redirect(base_url());
					} else {
						$this->session->set_flashdata('form-msg', 'Something went wrong, try again some time!');
						redirect(base_url());
					}
				}
			}
		}
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
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'newline' => "\r\n"
		);
		$this->email->initialize($config);
//		$this->load->library('email', $config);
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()){
			return true;
		}else{
			return false;
		}
	}


	function offer_form(){
		if ($this->input->post('cust_email') && $this->input->post('first_name')){
			if (empty($_POST['email'])){
				$to_mail = 'info@wepdigital.com';
				$first_name = $this->input->post('first_name');
				$user_email = $this->input->post('cust_email');
				$phone = $this->input->post('phone');
				$offer = $this->input->post('offer');
				$ask_us = $this->input->post('ask_us');
				// validate ---------------
				$this->form_validation->set_rules('cust_email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
				$this->form_validation->set_rules('phone', 'Phone', 'required');
				$this->form_validation->set_rules('offer', 'Offer', 'required');
				$this->form_validation->set_rules('ask_us', 'Ask Us', 'required');
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('form-msg', validation_errors('<div class="error">', '</div>'));
					redirect(base_url('offers'));
				} else {
					$order = base64_decode(urldecode($offer));
					$message = "Full Name : $first_name <br> Email : $user_email <br> Phone : $phone<br> Offer : $order <br>Ask Us : $ask_us";
					if ($this->sendMail($to_mail, $to_mail, 'Offers Form Inquiry', $message)) {
						$message = "Hi $first_name,<br><br> Thank you for contacting WeP solutions.<br><br> We have received your details, and we will get back to you soon.<br><br>Regards,<br>WeP solutions Ltd<br>9019915746";
						$this->sendMail($user_email, 'info@wepdigital.com', 'Thank you for contacting WeP Solutions', $message);
						$form_msg = "$first_name,<br> Thank you for contacting WeP solutions.";
						$this->session->set_flashdata('form-msg', $form_msg);
						redirect(base_url('offers'));
					} else {
						$this->session->set_flashdata('form-msg', 'Something went wrong, try again some time!');
						redirect(base_url('offers'));
					}
				}
			}
		}
	}
}
