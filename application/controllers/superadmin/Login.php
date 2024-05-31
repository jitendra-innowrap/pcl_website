<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('superadmin/SuperAdminModel', 'Administrator_Model');
    }

    public function index()
    {
		if($this->session->userdata('admin')) {
			redirect('superadmin/Administrator');
		}
        $data['page_title'] = "Superadmin Login";
        if (isset($_POST['btn_signin'])) 
        {
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				redirect(base_url('superadmin/login'));
			}else{
				// get email and Encrypt Password
				$email = $this->input->post('email');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->Administrator_Model->adminLogin($email, $encrypt_password);
				$sitelogo = $this->Administrator_Model->update_siteconfiguration(1);

				if ($user_id && $user_id->role_id == 1) {
					//Create Session
					$user_data = array(
						'user_id' => $user_id->id,
						'username' => $user_id->username,
						'email' => $user_id->email,
						'login' => true,
						'role' => $user_id->role_id,
						'image' => $user_id->image,
						'site_logo' => $sitelogo['logo_img']
					);

					$this->session->set_userdata('admin', $user_data);
					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('superadmin/Administrator');
				}else{
					$this->session->set_flashdata('danger', 'Login Credentials is invalid!');
					redirect('superadmin/login');
				}

			}
        }
        $this->load->view('superadmin/login',$data);
    }
    public function logout() {
        $this->session->unset_userdata('admin');
        redirect(base_url('superadmin/login'));
    }
}
