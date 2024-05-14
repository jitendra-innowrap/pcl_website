<?php

class SuperAdminModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '-1');
		ini_set('memory_limit', '2048M');
	}

	public function adminLogin($email, $encrypt_password){
		//Validate
		$this->db->where('email', $email);
		$this->db->where('password', $encrypt_password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		}else{
			return false;
		}
	}

	public function delete($id,$table)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
		return true;
	}

	public function add_user($post_image,$password)
	{
		$data = array('name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $password,
			'username' => $this->input->post('username'),
			'zipcode' => $this->input->post('zipcode'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'role_id' => '2',
			'status' => $this->input->post('status'),
			'dob' => $this->input->post('dob'),
			'image' => $post_image,
			'password' => $password,
			'register_date' => date("Y-m-d H:i:s")

		);
		return $this->db->insert('users', $data);
	}

	public function get_users($username = FALSE, $limit = FALSE, $offset = FALSE)
	{
		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		if($username === FALSE){
			$this->db->order_by('users.id', 'DESC');
			//$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('username' => $username));
		return $query->row_array();
	}

	public function get_user($id = FALSE)
	{
		if($id === FALSE){
			$query = $this->db->get('users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function update_user_data($post_image)
	{
		$data = array('name' => $this->input->post('name'),
			'zipcode' => $this->input->post('zipcode'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'status' => $this->input->post('status'),
			'dob' => $this->input->post('dob'),
			'image' => $post_image,
			'register_date' => date("Y-m-d H:i:s")
		);

		$this->db->where('id', $this->input->post('id'));
		$d = $this->db->update('users', $data);
	}

	//social links
	public function get_sociallinks($id = FALSE)
	{
		if($id === FALSE){
			$query = $this->db->get('sociallinks');
			return $query->result_array();
		}

		$query = $this->db->get_where('sociallinks', array('id' => $id));
		return $query->row_array();
	}

	public function update_sociallinks($id = FALSE)
	{
		if($id === FALSE){
			$query = $this->db->get('sociallinks');
			return $query->result_array();
		}

		$query = $this->db->get_where('sociallinks', array('id' => $id));
		return $query->row_array();
	}

	public function update_sociallinks_data($id = FALSE)
	{
		$data = array('link' => $this->input->post('link'));
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('sociallinks', $data);
	}

	//slider
	public function create_slider($post_image)
	{
		$data = array('title' => $this->input->post('title'),
			'image' => $post_image,
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		return $this->db->insert('sliders_img', $data);
	}

	public function get_sliders($id = false)
	{
		if($id === FALSE){
			$query = $this->db->get('sliders_img');
			return $query->result_array();
		}

		$query = $this->db->get_where('sliders_img', array('id' => $id));
		return $query->row_array();
	}

	public function get_slider_data($id = FALSE)
	{
		if($id === FALSE){
			$query = $this->db->get('sliders_img');
			return $query->result_array();
		}

		$query = $this->db->get_where('sliders_img', array('id' => $id));
		return $query->row_array();
	}

	public function update_slider_data($post_image)
	{
		$data = array('title' => $this->input->post('title'),
			'image' => $post_image,
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('sliders_img', $data);
	}

	// blogs models functions starts
	public function create_blog($post_image)
	{
		$slug = url_title($this->input->post('title'), "dash", TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'category_id' => $this->input->post('category_id'),
			'post_image' => $post_image,
			'user_id' => $this->session->userdata('user_id')
		);
		return $this->db->insert('posts', $data);
	}
	public function get_admin_data()
	{
		$id = $this->session -> userdata('user_id');
		if($id === FALSE){
			$query = $this->db->get('users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function change_password($new_password){

		$data = array(
			'password' => md5($new_password)
		);
		$this->db->where('id', $this->session->userdata('user_id'));
		return $this->db->update('users', $data);
	}

	public function match_old_password($password)
	{
		$id = $this->session -> userdata('user_id');
		if($id === FALSE){
			$query = $this->db->get('users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('password' => $password));
		return $query->row_array();

	}

	// function start fron forget password

	public function email_exists(){
		$email = $this->input->post('email');
		$query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");
		if($row = $query->row()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function temp_reset_password($temp_pass){
		$data =array(
			'email' =>$this->input->post('email'),
			'reset_pass'=>$temp_pass);
		$email = $data['email'];

		if($data){
			$this->db->where('email', $email);
			$this->db->update('users', $data);
			return TRUE;
		}else{
			return FALSE;
		}

	}
	public function is_temp_pass_valid($temp_pass){
		$this->db->where('reset_pass', $temp_pass);
		$query = $this->db->get('users');
		if($query->num_rows() == 1){
			return TRUE;
		}
		else return FALSE;
	}

	public function update_siteconfiguration($id = FALSE)
	{
		if($id === FALSE){
			$query = $this->db->get('site_config');
			return $query->result_array();
		}

		$query = $this->db->get_where('site_config', array('id' => $id));
		return $query->row_array();
	}

	public function update_siteconfiguration_data($post_image)
	{
		$data = array('site_title' => $this->input->post('site_title'),
			'site_name' => $this->input->post('site_name'),
			'logo_img' => $post_image
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('site_config', $data);
	}
}
