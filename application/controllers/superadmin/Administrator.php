<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
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
		$this->load->model('Master_model','Master');
		if (!$this->session->userdata('admin')) {
			redirect('superadmin/login');
		}
	}

	public function index()
	{
		$data['page_title'] = "Dashboard";
		$data['active'] = 1;
		$data['act'] = 1.1;
		$data['middle_content'] = 'dashboard';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function homebanner()
	{
		$data['page_title'] = "Home Banner";
		$data['active'] = 2;
		$data['act'] = 2.2;
		$data['middle_content'] = 'banner/homebanner';
		$this->load->view('superadmin/layout/template', $data);
	}

	function add_edit_homebanner()
	{
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Home Banner';
			$this->db->where('id',$id);
			$query = $this->db->get('home_banner');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/homebanner');
			}
		} else {
			$title = 'Add Home Banner';
		}
		$data['page_title'] = $title;
		$data['active'] = 2;
		$data['act'] = 2.2;
		$data['middle_content'] = 'banner/add_update_home';
		if (isset($_POST['submit'])) {
//		    echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$title = $this->input->post('title');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$routing_url = $this->input->post('routing_url');
			$image_alt = $this->input->post('image_alt');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'slider';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
			$update = array();
			if ($title) {
				$update['title'] = $title;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			if ($routing_url) {
				$update['routing_url'] = $routing_url;
			}
			if ($img_url) {
				$update['image'] = $img_url;
			}
			if ($image_alt) {
				$update['image_alt'] = $image_alt;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('home_banner', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$update['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('home_banner', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/homebanner');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_homebanner');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	public function banner()
	{
		$data['page_title'] = "Banner";
		$data['active'] = 2;
		$data['act'] = 2.1;
		$data['middle_content'] = 'banner/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	function add_edit_Banner()
	{
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Banner';
			$this->db->where('id',$id);
			$query = $this->db->get('banner');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/banner');
			}
		} else {
			$title = 'Add Banner';
		}
		$data['page_title'] = $title;
		$data['active'] = 2;
		$data['act'] = 2.1;
		$data['middle_content'] = 'banner/add_update';
		if (isset($_POST['submit'])) {
//		    echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$title = $this->input->post('title');
			$order_no = $this->input->post('order_no');
			$description = $this->input->post('description');
			$is_button = $this->input->post('is_button');
			$status = $this->input->post('status');
			$routing_url = $this->input->post('routing_url');
			$is_video = $this->input->post('is_video');
			$video_url = $this->input->post('video_url');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'slider';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
            $update = array();
            if ($title) {
                $update['title'] = $title;
            }
            if ($order_no) {
                $update['order_no'] = $order_no;
            }
            if ($description) {
                $update['description'] = $description;
            }
            if ($is_button) {
                $update['is_button'] = $is_button;
            }else{
                $update['is_button'] = 0;
            }
            if ($status) {
                $update['status'] = $status;
            }else{
                $update['status'] = 0;
            }
            if ($routing_url) {
                $update['routing_url'] = $routing_url;
            }
            if ($img_url) {
                $update['image'] = $img_url;
            }
            if ($is_video) {
                $update['is_video'] = $is_video;
            }
            if ($video_url) {
                $update['video_url'] = $video_url;
            }
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('banner', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
                $update['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('banner', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Banner has been Updated Successfully.');
				redirect('superadmin/administrator/banner');
			} else {
				$this->session->set_flashdata('danger', 'Banner has been Update fail');
				redirect('superadmin/administrator/add_edit_Banner');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Clients ------------------------------------------------------

	public function clientele()
	{
		$data['page_title'] = "Clientele";
		$data['active'] = 3;
		$data['act'] = 3.1;
		$data['middle_content'] = 'clientele/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_Client(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Clientele';
			$this->db->where('id',$id);
			$query = $this->db->get('clientele');
			$result = $query->row_array();

			$this->db->where('clientele_id',$id);
			$data['product_clientele'] = $this->db->get('product_clientele')->result();
			$this->db->where('clientele_id',$id);
			$this->db->select('id');
			$data['is_product'] = $this->db->get('product_clientele')->num_rows();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/clientele');
			}
		} else {
			$title = 'Add Clientele';
		}
		$data['page_title'] = $title;
		$data['active'] = 3;
		$data['act'] = 3.2;
		$data['middle_content'] = 'clientele/add_update';
		if (isset($_POST['submit'])) {
//			echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$name = $this->input->post('name');
			$home_page = $this->input->post('home_page');
			$h_order_no = $this->input->post('h_order_no');
			$logo_alt = $this->input->post('logo_alt');
			$product_page = $this->input->post('product_page');
			$product_page_list = $this->input->post('product_page_list');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'clientele';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
			$update = array();
			if ($name) {
				$update['name'] = $name;
			}
			if ($home_page == 1){
				$update['home_page'] = 1;
			}else{
				$update['home_page'] = 0;
			}
			if ($h_order_no) {
				$update['h_order_no'] = $h_order_no;
			}
			if ($logo_alt) {
				$update['logo_alt'] = $logo_alt;
			}
			if ($product_page) {
				$update['product_page'] = $product_page;
			}else{
				$update['product_page'] = 0;
			}
			$update['status'] = 1;
			if ($img_url) {
				$update['logo'] = $img_url;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('clientele', $update)) {
					if (!empty($product_page_list)) {
						$this->db->where(array('clientele_id' => $id));
						$this->db->delete('product_clientele');
						foreach ($product_page_list as $product) {
							$add = array(
								'clientele_id' => $id,
								'product_page' => $product,
								'created_date' => date("Y-m-d H:i:s"),
								'order_no' => $order_no,
								'status' => $product_page,
							);
							$this->db->insert('product_clientele', $add);
						}
					}
					if (empty($product_page_list)){
						$order_update = array(
							'order_no' => $order_no,
						);
						$this->db->where('clientele_id', $id);
						$this->db->update('product_clientele', $order_update);
					}
					$is_submit = true;
				}
			} else {
                $update['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('clientele', $update)) {
					$insert_id = $this->db->insert_id();
					foreach ($product_page_list as $product){
						$add = array(
							'clientele_id' => $insert_id,
							'product_page' => $product,
							'created_date' => date("Y-m-d H:i:s"),
							'order_no' => $order_no,
							'status' => $product_page,
						);
						$this->db->insert('product_clientele', $add);
					}
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/clientele');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_Client');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Counter ---------------------------------------------------------

	public function counter(){
		$data['page_title'] = "Counter";
		$data['active'] = 4;
		$data['act'] = 4.1;
		$data['middle_content'] = 'counter/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_Counter(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Counter';
			$this->db->where('id',$id);
			$query = $this->db->get('counter');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/counter');
			}
		} else {
			$title = 'Add Counter';
		}
		$data['page_title'] = $title;
		$data['active'] = 4;
		$data['act'] = 4.2;
		$data['middle_content'] = 'counter/add_update';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$label = $this->input->post('label');
			$order_no = $this->input->post('order_no');
			$value = $this->input->post('value');
			$status = $this->input->post('status');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'counter';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
			$update = array();
			if ($label) {
				$update['label'] = $label;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($value) {
				$update['value'] = $value;
			}
			if ($img_url) {
				$update['icon'] = $img_url;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('counter', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				if ($this->db->insert('counter', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Counter has been Updated Successfull.');
				redirect('superadmin/administrator/counter');
			} else {
				$this->session->set_flashdata('danger', 'Counter has been Update fail');
				redirect('superadmin/administrator/add_edit_Counter');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Employee Testimonial -----------------------------------------

	public function EmployeeTestimonial(){
		$data['page_title'] = "Employee testimonial";
		$data['active'] = 5;
		$data['act'] = 5.1;
		$data['middle_content'] = 'EmployeeTestimonial/index';
		$this->load->view('superadmin/layout/template', $data);
	}

//	Blogs Category ------------------------------------------------

	public function BlogsCategory(){
		$data['page_title'] = "Blogs Category";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'blogs/blogs_category';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_blogsCategory(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Blogs Category';
			$this->db->where('id',$id);
			$query = $this->db->get('blog_category');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/BlogsCategory');
			}
		} else {
			$title = 'Add Blogs Category';
		}
		$data['page_title'] = $title;
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'blogs/add_edit_blogsCategory';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category = $this->input->post('name');
			$status = $this->input->post('status');

			if ($id) {
				$update = array();
				if ($category) {
					$update['name'] = $category;
				}
				if ($status) {
					$update['status'] = $status;
				}else{
					$update['status'] = 0;
				}
				$this->db->where('id', $id);
				if ($this->db->update('blog_category', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$add = array();
				if ($category) {
					$add['name'] = $category;
				}
				if ($status) {
					$add['status'] = $status;
				}else{
					$add['status'] = 0;
				}
                $add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('blog_category', $add)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Blogs Category has been Updated Successfull.');
				redirect('superadmin/administrator/BlogsCategory');
			} else {
				$this->session->set_flashdata('danger', 'Blogs Category has been Update fail');
				redirect('superadmin/administrator/add_edit_blogsCategory');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Blogs -------------------------------------------------------

	public function Blogs(){
		$data['page_title'] = "Blogs";
		$data['active'] = 6;
		$data['act'] = 6.2;
		$data['middle_content'] = 'blogs/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_blogs(){
		$this->db->where('status',1);
		$data['blogs_category'] = $this->db->get('blog_category')->result();
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Blogs';
			$this->db->where('id',$id);
			$query = $this->db->get('blogs');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/Blogs');
			}
		} else {
			$title = 'Add Blogs';
		}
		$data['page_title'] = $title;
		$data['active'] = 6;
		$data['act'] = 6.2;
		$data['middle_content'] = 'blogs/add_edit_blogs';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$blog_cat_id = $this->input->post('blog_cat_id');
			$meta_title = $this->input->post('meta_title');
			$meta_desc = $this->input->post('meta_desc');
			$meta_keyword = $this->input->post('meta_keyword');
			$title = $this->input->post('title');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'blogs';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
					$this->_create_thumbs($image['file_name'],$img_url);
				}
			}
			$image_alt = $this->input->post('image_alt');
			$content = $this->input->post('content');
			$author = $this->input->post('author');
			$blog_date = $this->input->post('blog_date');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');

			$add = array();
			if ($blog_cat_id) {
				$add['blog_cat_id'] = $blog_cat_id;
			}
			if ($meta_title){
				$add['meta_title'] = $meta_title;
			}
			if ($meta_desc){
				$add['meta_desc'] = $meta_desc;
			}
			if ($meta_keyword){
				$add['meta_keyword'] = $meta_keyword;
			}
			if ($title){
				$add['title'] = $title;
			}
			if ($img_url){
				$add['image'] = $img_url;
				$add['image_large'] = 'assets/images/large/'.$image['file_name'];
				$add['image_medium'] = 'assets/images/medium/'.$image['file_name'];
				$add['image_small'] = 'assets/images/small/'.$image['file_name'];
			}
			if ($image_alt){
				$add['image_alt'] = $image_alt;
			}
			if ($content){
				$add['content'] = $content;
			}
			if ($author){
				$add['author'] = $author;
			}
			if ($blog_date){
				$add['blog_date'] = $blog_date;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			$add['slug'] = url_title($title, '-', TRUE);
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('blogs', $add)) {
					$is_submit = true;
				}
			} else {
                $add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('blogs', $add)) {
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Blogs Category has been Updated Successfull.');
				redirect('superadmin/administrator/blogs');
			} else {
				$this->session->set_flashdata('danger', 'Blogs Category has been Update fail');
				redirect('superadmin/administrator/add_edit_blogs');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Case Studies Category -------------------------------------------------------------------

    public function CasestudiesCategory(){
        $data['page_title'] = "Case Studies Category";
        $data['active'] = 7;
        $data['act'] = 7.1;
        $data['middle_content'] = 'CaseStudies/casestudies_category';
        $this->load->view('superadmin/layout/template', $data);
    }

    public function add_edit_Casestudies_Category(){
        $id = $this->input->get('id');
        if ($id) {
            $title = 'Edit Case Studies Category';
            $this->db->where('id',$id);
            $query = $this->db->get('casestudies_category');
            $result = $query->row_array();
            if ($result){
                $data['edit'] = $result;
            }else{
                $this->session->set_flashdata('danger', 'Edit data not found!');
                redirect('superadmin/administrator/CasestudiesCategory');
            }
        } else {
            $title = 'Add Case Studies Category';
        }
        $data['page_title'] = $title;
        $data['active'] = 7;
        $data['act'] = 7.1;
        $data['middle_content'] = 'CaseStudies/add_edit_Casestudies_Category';
        if (isset($_POST['submit'])) {
            $is_submit = false;
            $category = $this->input->post('name');
            $status = $this->input->post('status');

            if ($id) {
                $update = array();
                if ($category) {
                    $update['name'] = $category;
                }
                if ($status) {
                    $update['status'] = $status;
                }else{
                    $update['status'] = 0;
                }
                $this->db->where('id', $id);
                if ($this->db->update('casestudies_category', $update)) {
                    $is_submit = true;
                } else {
                    $is_submit = false;
                }
            } else {
                $add = array();
                if ($category) {
                    $add['name'] = $category;
                }
                if ($status) {
                    $add['status'] = $status;
                }else{
                    $add['status'] = 0;
                }
                $add['created_date'] = date("Y-m-d H:i:s");
                if ($this->db->insert('casestudies_category', $add)) {
                    $is_submit = true;
                } else {
                    $is_submit = false;
                }
            }
            if ($is_submit = true) {
                $this->session->set_flashdata('success', 'Data has been Updated Successfully.');
                redirect('superadmin/administrator/CasestudiesCategory');
            } else {
                $this->session->set_flashdata('danger', 'Data has been Update fail');
                redirect('superadmin/administrator/add_edit_Casestudies_Category');
            }
        }
        $this->load->view('superadmin/layout/template', $data);
    }

//    Case Studies -------------------------------------------

    public function Case_studies(){
        $data['page_title'] = "Case Studies";
        $data['active'] = 7;
        $data['act'] = 7.2;
        $data['middle_content'] = 'CaseStudies/index';
        $this->load->view('superadmin/layout/template', $data);
    }

    public function add_edit_Case_studies(){
        $this->db->where('status',1);
        $data['casestudies_category'] = $this->db->get('casestudies_category')->result();
        $id = $this->input->get('id');
        if ($id) {
            $title = 'Edit Case Studies';
            $this->db->where('id',$id);
            $query = $this->db->get('case_studies');
            $result = $query->row_array();
            if ($result){
                $data['edit'] = $result;
            }else{
                $this->session->set_flashdata('danger', 'Edit data not found!');
                redirect('superadmin/administrator/Case_studies');
            }
        } else {
            $title = 'Add Case Studies';
        }
        $data['page_title'] = $title;
        $data['active'] = 7;
        $data['act'] = 7.2;
        $data['middle_content'] = 'CaseStudies/add_edit_Case_studies';
        if (isset($_POST['submit'])) {
            $is_submit = false;
            $case_s_id = $this->input->post('case_s_id');
            $meta_title = $this->input->post('meta_title');
            $meta_desc = $this->input->post('meta_desc');
            $meta_keyword = $this->input->post('meta_keyword');
            $title = $this->input->post('title');
            $img_url = '';
            if (isset($_FILES['file'])) {
                $path = 'casestudies';
                $image = $this->Master->upload('file', $path);
                if ($image['code'] == 1) {
                    $img_url = $image['img_url'];
                    $this->_create_thumbs($image['file_name'],$img_url);
                }
            }
            $image_alt = $this->input->post('image_alt');
            $content = $this->input->post('content');
            $author = $this->input->post('author');
            $blog_date = $this->input->post('blog_date');
            $order_no = $this->input->post('order_no');
            $status = $this->input->post('status');

            $add = array();
            if ($case_s_id) {
                $add['case_s_id'] = $case_s_id;
            }
            if ($meta_title){
                $add['meta_title'] = $meta_title;
            }
            if ($meta_desc){
                $add['meta_desc'] = $meta_desc;
            }
            if ($meta_keyword){
                $add['meta_keyword'] = $meta_keyword;
            }
            if ($title){
                $add['title'] = $title;
            }
            if ($img_url){
                $add['image'] = $img_url;
                $add['image_large'] = 'assets/images/large/'.$image['file_name'];
                $add['image_medium'] = 'assets/images/medium/'.$image['file_name'];
                $add['image_small'] = 'assets/images/small/'.$image['file_name'];
            }
            if ($image_alt){
                $add['image_alt'] = $image_alt;
            }
            if ($content){
                $add['content'] = $content;
            }
            if ($author){
                $add['author'] = $author;
            }
            if ($blog_date){
                $add['case_date'] = $blog_date;
            }
            if ($order_no){
                $add['order_no'] = $order_no;
            }
            if ($status) {
                $add['status'] = $status;
            }else{
                $add['status'] = 0;
            }
            $add['slug'] = url_title($title, '-', TRUE);
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('case_studies', $add)) {
                    $is_submit = true;
                }
            } else {
                $add['created_date'] = date("Y-m-d H:i:s");
                if ($this->db->insert('case_studies', $add)) {
                    $is_submit = true;
                }
            }
            if ($is_submit = true) {
                $this->session->set_flashdata('success', 'Data upload successfully.');
                redirect('superadmin/administrator/Case_studies');
            } else {
                $this->session->set_flashdata('danger', 'Data upload failed.');
                redirect('superadmin/administrator/add_edit_Case_studies');
            }
        }
        $this->load->view('superadmin/layout/template', $data);
    }

//    Newsroom --------------------------------------------------

    public function newsroom(){
        $data['page_title'] = "Newsroom";
        $data['active'] = 8;
        $data['act'] = 8.1;
        $data['middle_content'] = 'newsroom/index';
        $this->load->view('superadmin/layout/template', $data);
    }

    public function add_edit_newsroom(){
        $id = $this->input->get('id');
        if ($id) {
            $title = 'Edit Newsroom';
            $this->db->where('id',$id);
            $query = $this->db->get('newsroom');
            $result = $query->row_array();
            if ($result){
                $data['edit'] = $result;
            }else{
                $this->session->set_flashdata('danger', 'Edit data not found!');
                redirect('superadmin/administrator/newsroom');
            }
        } else {
            $title = 'Add Newsroom';
        }
        $data['page_title'] = $title;
        $data['active'] = 8;
        $data['act'] = 8.1;
        $data['middle_content'] = 'newsroom/add_edit_newsroom';
        if (isset($_POST['submit'])) {
            $is_submit = false;
            $meta_title = $this->input->post('meta_title');
            $meta_desc = $this->input->post('meta_desc');
            $meta_keyword = $this->input->post('meta_keyword');
            $title = $this->input->post('title');
            $img_url = '';
            if (isset($_FILES['file'])) {
                $path = 'newsroom';
                $image = $this->Master->upload('file', $path);
                if ($image['code'] == 1) {
                    $img_url = $image['img_url'];
                    $this->_create_thumbs($image['file_name'],$img_url);
                }
            }
            $image_alt = $this->input->post('image_alt');
            $sort_description = $this->input->post('sort_description');
            $content = $this->input->post('content');
            $author = $this->input->post('author');
            $blog_date = $this->input->post('news_date');
            $route_url = $this->input->post('route_url');
            $is_url_route = $this->input->post('is_url_route');
            $order_no = $this->input->post('order_no');
            $status = $this->input->post('status');

            $add = array();
            if ($meta_title){
                $add['meta_title'] = $meta_title;
            }
            if ($meta_desc){
                $add['meta_desc'] = $meta_desc;
            }
            if ($meta_keyword){
                $add['meta_keyword'] = $meta_keyword;
            }
            if ($title){
                $add['title'] = $title;
            }
            if ($sort_description){
                $add['sort_description'] = $sort_description;
            }
            if ($img_url){
                $add['image'] = $img_url;
                $add['image_large'] = 'assets/images/large/'.$image['file_name'];
                $add['image_medium'] = 'assets/images/medium/'.$image['file_name'];
                $add['image_small'] = 'assets/images/small/'.$image['file_name'];
            }
            if ($image_alt){
                $add['image_alt'] = $image_alt;
            }
            if ($is_url_route){
                $add['is_url_route'] = $is_url_route;
            }
            if ($route_url){
                $add['route_url'] = $route_url;
            }
            if ($content){
                $add['content'] = $content;
            }
            if ($author){
                $add['author'] = $author;
            }
            if ($blog_date){
                $add['news_date'] = $blog_date;
            }
            if ($order_no){
                $add['order_no'] = $order_no;
            }
            if ($status) {
                $add['status'] = $status;
            }else{
                $add['status'] = 0;
            }
            $add['slug'] = url_title($title, '-', TRUE);
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('newsroom', $add)) {
                    $is_submit = true;
                }
            } else {
                $add['created_date'] = date("Y-m-d H:i:s");
                if ($this->db->insert('newsroom', $add)) {
                    $is_submit = true;
                }
            }
            if ($is_submit = true) {
                $this->session->set_flashdata('success', 'Data upload successfully.');
                redirect('superadmin/administrator/newsroom');
            } else {
                $this->session->set_flashdata('danger', 'Data upload failed.');
                redirect('superadmin/administrator/add_edit_newsroom');
            }
        }
        $this->load->view('superadmin/layout/template', $data);
    }

//    GST Notification ----------------------------------

	public function gst_notification(){
		$data['page_title'] = "GST Notification";
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'gst-notification/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_gst_notification(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit GST Notification';
			$this->db->where('id',$id);
			$query = $this->db->get('gst_notification');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/gst_notification');
			}
		} else {
			$title = 'Add GST Notification';
		}
		$data['page_title'] = $title;
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'gst-notification/add_edit_gst_notification';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$meta_title = $this->input->post('meta_title');
			$meta_desc = $this->input->post('meta_desc');
			$meta_keyword = $this->input->post('meta_keyword');
			$title = $this->input->post('title');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'gst-notification';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
					$this->_create_thumbs($image['file_name'],$img_url);
				}
			}
			$image_alt = $this->input->post('image_alt');
			$sort_desc = $this->input->post('sort_desc');
			$content = $this->input->post('content');
			$author = $this->input->post('author');
			$blog_date = $this->input->post('notification_date');
			$route_url = $this->input->post('route_url');
			$is_url_route = $this->input->post('is_url_route');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');

			$add = array();
			if ($meta_title){
				$add['meta_title'] = $meta_title;
			}
			if ($meta_desc){
				$add['meta_desc'] = $meta_desc;
			}
			if ($meta_keyword){
				$add['meta_keyword'] = $meta_keyword;
			}
			if ($title){
				$add['title'] = $title;
			}

			if ($img_url){
				$add['image'] = $img_url;
				$add['image_large'] = 'assets/images/large/'.$image['file_name'];
				$add['image_medium'] = 'assets/images/medium/'.$image['file_name'];
				$add['image_small'] = 'assets/images/small/'.$image['file_name'];
			}
			if ($image_alt){
				$add['image_alt'] = $image_alt;
			}
			if ($is_url_route){
				$add['is_url_route'] = $is_url_route;
			}else{
				$add['is_url_route'] = 0;
			}
			if ($route_url){
				$add['route_url'] = $route_url;
			}
			if ($sort_desc){
				$add['sort_desc'] = $sort_desc;
			}
			if ($content){
				$add['content'] = $content;
			}
			if ($author){
				$add['author'] = $author;
			}
			if ($blog_date){
				$add['notification_date'] = $blog_date;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			$add['slug'] = url_title($title, '-', TRUE);
//			echo '<pre>';print_r($add);exit();
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('gst_notification', $add)) {
					$is_submit = true;
				}
			} else {
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('gst_notification', $add)) {
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data upload successfully.');
				redirect('superadmin/administrator/gst_notification');
			} else {
				$this->session->set_flashdata('danger', 'Data upload failed.');
				redirect('superadmin/administrator/add_edit_gst_notification');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//    Speakers ------------------------------------------

	public function speakers(){
		$data['page_title'] = "Speakers";
		$data['active'] = 9;
		$data['act'] = 9.1;
		$data['middle_content'] = 'webinars/speakers';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_speaker(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Speaker';
			$this->db->where('id',$id);
			$query = $this->db->get('speakers');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/speakers');
			}
		} else {
			$title = 'Add Speaker';
		}
		$data['page_title'] = $title;
		$data['active'] = 9;
		$data['act'] = 9.1;
		$data['middle_content'] = 'webinars/add_edit_speakers';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$name = $this->input->post('name');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'speakers';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
			$company = $this->input->post('company');
			$designation = $this->input->post('designation');
			$status = $this->input->post('status');

			$add = array();
			if ($name){
				$add['name'] = $name;
			}
			if ($designation){
				$add['designation'] = $designation;
			}
			if ($img_url){
				$add['photo'] = $img_url;
			}
			if ($company){
				$add['company'] = $company;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
//			$add['slug'] = url_title($title, '-', TRUE);
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('speakers', $add)) {
					$is_submit = true;
				}
			} else {
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('speakers', $add)) {
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data upload successfully.');
				redirect('superadmin/administrator/speakers');
			} else {
				$this->session->set_flashdata('danger', 'Data upload failed.');
				redirect('superadmin/administrator/add_edit_speaker');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Webinars ----------------------------------------------------

	public function webinars(){
		$data['page_title'] = "Webinars";
		$data['active'] = 9;
		$data['act'] = 9.2;
		$data['middle_content'] = 'webinars/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_webinar(){
		$this->db->where('status',1);
		$data['speakers'] = $this->db->get('speakers')->result();
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Webinar';
			$this->db->where('id',$id);
			$query = $this->db->get('webinar');
			$result = $query->row_array();

			$this->db->where('webinar_id',$id);
			$data['webinar_speaker'] = $this->db->get('webinar_speaker')->result();
//			echo '<pre>';print_r($data['webinar_speaker'][0]);exit();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/webinars');
			}
		} else {
			$title = 'Add Webinar';
		}
		$data['page_title'] = $title;
		$data['active'] = 9;
		$data['act'] = 9.2;
		$data['middle_content'] = 'webinars/add_edit_webinar';
		if (isset($_POST['submit'])) {
//			print_r($_POST);exit();
			$is_submit = false;
			$title = $this->input->post('title');
			$webinar_date = $this->input->post('webinar_date');
			$from_time = $this->input->post('from_time');
			$to_time = $this->input->post('to_time');
			$speakers = $this->input->post('speakers');
			$content = $this->input->post('content');
			$video_url = $this->input->post('video_url');
			$status = $this->input->post('status');
			$order_no = $this->input->post('order_no');
			$meta_title = $this->input->post('meta_title');
			$meta_keyword = $this->input->post('meta_keyword');
			$meta_desc = $this->input->post('meta_desc');

			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'webinars';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
					$this->_create_thumbs($image['file_name'],$img_url);
				}
			}

			$add = array();
			if ($title){
				$add['title'] = $title;
			}
			if ($webinar_date){
				$add['date'] = $webinar_date;
			}
			if ($from_time){
				$add['from_time'] = $from_time;
			}
			if ($to_time){
				$add['to_time'] = $to_time;
			}
			if ($content){
				$add['description'] = $content;
			}
			if ($video_url){
				$add['video_url'] = $video_url;
			}
			if ($img_url){
				$add['image'] = $img_url;
				$add['image_large'] = 'assets/images/large/'.$image['file_name'];
				$add['image_medium'] = 'assets/images/medium/'.$image['file_name'];
				$add['image_small'] = 'assets/images/small/'.$image['file_name'];
			}

			if ($meta_title){
				$add['meta_title'] = $meta_title;
			}
			if ($meta_keyword){
				$add['meta_keyword'] = $meta_keyword;
			}
			if ($meta_desc){
				$add['meta_description'] = $meta_desc;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			$add['slug'] = url_title($title, '-', TRUE);
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('webinar', $add)) {
					$is_submit = true;
					$this->db->where(array('webinar_id'=> $id));
					$this->db->delete('webinar_speaker');
					foreach ($speakers as $speaker){
						$add = array(
							'webinar_id' => $id,
							'speaker_id' => $speaker,
							'status' => 1,
							'created_date' => date("Y-m-d H:i:s")
						);
						$this->db->insert('webinar_speaker', $add);
					}
				}
			} else {
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('webinar', $add)) {
					$is_submit = true;
					$insert_id = $this->db->insert_id();
					foreach ($speakers as $speaker){
						$add = array(
							'webinar_id' => $insert_id,
							'speaker_id' => $speaker,
							'status' => 1,
							'created_date' => date("Y-m-d H:i:s")
						);
						$this->db->insert('webinar_speaker', $add);
					}
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data upload successfully.');
				redirect('superadmin/administrator/webinars');
			} else {
				$this->session->set_flashdata('danger', 'Data upload failed.');
				redirect('superadmin/administrator/add_edit_webinar');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}


	//	Investors Category ------------------------------------------------

	public function investors_category(){
		$data['page_title'] = "Investors Category";
		$data['active'] = 11;
		$data['act'] = 11.1;
		$data['middle_content'] = 'investors/investors_category';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_investors_category(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Investor Category';
			$this->db->where('id',$id);
			$query = $this->db->get('investors_category');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/investors_category');
			}
		} else {
			$title = 'Add Investor Category';
		}
		$data['page_title'] = $title;
		$data['active'] = 11;
		$data['act'] = 11.1;
		$data['middle_content'] = 'investors/add_edit_investors_category';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category = $this->input->post('name');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$update = array();
			if ($category) {
				$update['name'] = $category;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('investors_category', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$add = array();
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('investors_category', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/investors_category');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_investors_category');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Investors -------------------------------------------------------

	public function investors(){
		$data['page_title'] = "Investors";
		$data['active'] = 11;
		$data['act'] = 11.2;
		$data['middle_content'] = 'investors/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_investors(){
		$this->db->where('status',1);
		$data['investors_category'] = $this->db->get('investors_category')->result();
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Investors';
			$this->db->where('id',$id);
			$query = $this->db->get('investors');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/investors');
			}
		} else {
			$title = 'Add Investors';
		}
		$data['page_title'] = $title;
		$data['active'] = 11;
		$data['act'] = 11.2;
		$data['middle_content'] = 'investors/add_edit_investors';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category_id = $this->input->post('category_id');
			$title = $this->input->post('title');
            $created_date = $this->input->post('created_date');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');

            if(!empty($_FILES['file']['name'])){
                $config['upload_path'] = 'uploads/investors/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['file']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $file = 'uploads/investors/'.$uploadData['file_name'];
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    $file = '';
                }
            }else{
                $file = '';
            }

			$add = array();
			if ($category_id) {
				$add['category_id'] = $category_id;
			}
			if ($title){
				$add['title'] = $title;
			}
			if ($file){
				$add['link'] = $file;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
            if ($created_date){
                $add['created_date'] = $created_date;
            }
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('investors', $add)) {
					$is_submit = true;
				}
			} else {
				if ($this->db->insert('investors', $add)) {
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/investors');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_investors');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	//	Careers Department ------------------------------------------------

	public function careers_department(){
		$data['page_title'] = "Careers Department";
		$data['active'] = 12;
		$data['act'] = 12.1;
		$data['middle_content'] = 'careers/careers_department';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_careers_department(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Careers Department';
			$this->db->where('id',$id);
			$query = $this->db->get('careers_department');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/careers_department');
			}
		} else {
			$title = 'Add Careers Department';
		}
		$data['page_title'] = $title;
		$data['active'] = 12;
		$data['act'] = 12.1;
		$data['middle_content'] = 'careers/add_edit_careers_department';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category = $this->input->post('name');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$update = array();
			if ($category) {
				$update['name'] = $category;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('careers_department', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$add = array();
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('careers_department', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/careers_department');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_careers_department');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

//	Investors -------------------------------------------------------

	public function careers(){
		$data['page_title'] = "Careers";
		$data['active'] = 12;
		$data['act'] = 12.2;
		$data['middle_content'] = 'careers/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_careers(){
		$this->db->where('status',1);
		$data['careers_department'] = $this->db->get('careers_department')->result();
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Careers';
			$this->db->where('id',$id);
			$query = $this->db->get('careers');
			$result = $query->row_array();
			$this->db->select('city_name');
			$this->db->where('careers_id',$id);
			$query = $this->db->get('careers_job_location');
			$careers_job_location = $query->result();
			if ($result){
				$data['edit'] = $result;
				$data['job_location'] = json_encode($careers_job_location,true);
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/careers');
			}
		} else {
			$title = 'Add Careers';
		}
		$data['page_title'] = $title;
		$data['active'] = 12;
		$data['act'] = 12.2;
		$data['middle_content'] = 'careers/add_edit_careers';
		if (isset($_POST['submit'])) {
//			print_r($_POST);exit();
			$is_submit = false;
			$department_id = $this->input->post('department_id');
			$job_name = $this->input->post('job_name');
			$experience = $this->input->post('experience');
			$no_of_vacancy = $this->input->post('no_of_vacancy');
			$location = $this->input->post('location');
			$job_description = $this->input->post('job_description');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');

			$add = array();
			if ($department_id) {
				$add['department_id'] = $department_id;
			}
			if ($job_name){
				$add['job_name'] = $job_name;
			}
			if ($experience){
				$add['experience'] = $experience;
			}
			if ($no_of_vacancy){
				$add['no_of_vacancy'] = $no_of_vacancy;
			}
			if ($job_description){
				$add['job_description'] = $job_description;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			$add['slug'] = url_title($job_name, '-', TRUE);
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('careers', $add)) {
					$is_submit = true;
					$this->db->where(array('careers_id'=> $id));
					$this->db->delete('careers_job_location');
					foreach ($location as $value){
						$add_city = array(
							'careers_id' => $id,
							'city_name' => $value,
							'created_date' => date("Y-m-d H:i:s")
						);
						$this->db->insert('careers_job_location',$add_city);
					}
				}
			} else {
				$add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('careers', $add)) {
					$insert_id = $this->db->insert_id();
					foreach ($location as $value){
						$add_city = array(
							'careers_id' => $insert_id,
							'city_name' => $value,
							'created_date' => date("Y-m-d H:i:s")
						);
						$this->db->insert('careers_job_location',$add_city);
					}
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/careers');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_careers');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	//	FAQ Category ------------------------------------------------

	public function faqs_category(){
		$data['page_title'] = "FAQ Category";
		$data['active'] = 13;
		$data['act'] = 13.1;
		$data['middle_content'] = 'faq/faq_category';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_faq_category(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit FAQ Category';
			$this->db->where('id',$id);
			$query = $this->db->get('faq_category');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/faqs_category');
			}
		} else {
			$title = 'Add FAQ Category';
		}
		$data['page_title'] = $title;
		$data['active'] = 13;
		$data['act'] = 13.1;
		$data['middle_content'] = 'faq/add_edit_faq_category';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category = $this->input->post('name');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$update = array();
			if ($category) {
				$update['name'] = $category;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			$update['created_date'] = date("Y-m-d H:i:s");
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('faq_category', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				if ($this->db->insert('faq_category', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/faqs_category');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_faq_category');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	//	FAQ Last ------------------------------------------------

	public function faqs(){
		$data['page_title'] = "FAQ List";
		$data['active'] = 13;
		$data['act'] = 13.2;
		$data['middle_content'] = 'faq/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_faq(){
		$this->db->order_by('order_no','asc');
		$this->db->where('status',1);
		$data['faq_category'] = $this->db->get('faq_category')->result();
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit FAQ';
			$this->db->where('id',$id);
			$query = $this->db->get('faqs');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/careers_department');
			}
		} else {
			$title = 'Add FAQ';
		}
		$data['page_title'] = $title;
		$data['active'] = 13;
		$data['act'] = 13.2;
		$data['middle_content'] = 'faq/add_edit_faq';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$faq_id = $this->input->post('faq_id');
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$update = array();
			if ($faq_id) {
				$update['faq_id'] = $faq_id;
			}
			if ($question) {
				$update['question'] = $question;
			}
			if ($answer) {
				$update['answer'] = $answer;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			$update['created_date'] = date("Y-m-d H:i:s");
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('faqs', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				foreach ($question as $k => $qust){
					$add = array(
						'faq_id' => $faq_id,
						'question' => $qust,
						'answer' => $answer[$k],
						'order_no' => $order_no[$k],
						'status' => $status,
						'created_date' => date("Y-m-d H:i:s")
					);
					if ($this->db->insert('faqs', $add)) {
						$is_submit = true;
					} else {
						$is_submit = false;
					}
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/faqs');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/add_edit_faq');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

// Ricoh Master =================================================

	public function ricoh_master(){
		$data['page_title'] = "Form Master";
		$data['active'] = 14;
		$data['act'] = 14.1;
		$data['middle_content'] = 'ricoh/form_dropdown';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function ricoh_slider(){
		$data['page_title'] = "Ricoh Slider";
		$data['active'] = 14;
		$data['act'] = 14.2;
		$data['middle_content'] = 'ricoh/slider';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function edit_ricoh_slider(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Ricoh Slider';
			$this->db->where('id',$id);
			$query = $this->db->get('ricoh_slider');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/ricoh_slider');
			}
		} else {
			$title = 'Add Ricoh Slider';
		}
		$this->db->where('status',1);
		$data['form_dropdown'] = $this->db->get('ricoh_form_dropdown')->result_array();
//		print_r($data['form_dropdown']);exit();
		$data['page_title'] = $title;
		$data['active'] = 14;
		$data['act'] = 14.2;
		$data['middle_content'] = 'ricoh/edit_slider';
		if (isset($_POST['submit'])) {
//		    echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$title = $this->input->post('title');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$routing_url = $this->input->post('routing_url');
			$image_alt = $this->input->post('image_alt');
			$form_dropdown = $this->input->post('form_dropdown');
			$img_url = '';
			if (isset($_FILES['file'])) {
				$path = 'slider';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
				}
			}
			$update = array();
			if ($title) {
				$update['title'] = $title;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['status'] = $status;
			}else{
				$update['status'] = 0;
			}
			$update['routing_url'] = $routing_url;

			if ($img_url) {
				$update['image'] = $img_url;
			}
			if ($image_alt) {
				$update['image_alt'] = $image_alt;
			}
			if ($form_dropdown) {
				$update['form_dropdown'] = $form_dropdown;
			}
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update('ricoh_slider', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$update['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('ricoh_slider', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/ricoh_slider');
			} else {
				$redr = $id == '' ? '?id='.$id : '';
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/edit_ricoh_slider'.$redr);
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	public function manageformdropdown(){
		if (isset($_POST['action'])){
			$action = $this->input->post('action');
			$id = $this->input->post('id');
			if ($action == 'getRecord'){
				$this->db->where('id',$id);
				$data = $this->db->get('ricoh_form_dropdown')->row_array();
				if ($data){
					echo json_encode($data);
				}else{
					return false;
				}
				exit();
			}
			$name = $this->input->post('name');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('status');
			$data = array();

			$data['title'] = $name;
			$data['order_no'] = $order_no;
			if ($status){
				$data['status'] = 1;
			}else{
				$data['status'] = 0;
			}

			if ($action == 'addRecord'){
				$data['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('ricoh_form_dropdown',$data)){
					return true;
				}
			}
			if ($action == 'updateRecord'){
				$this->db->where('id',$id);
				if ($this->db->update('ricoh_form_dropdown',$data)){
					return true;
				}
			}
		}
	}

//	Create thumb img ============================================

	function _create_thumbs($file_name,$source_image){
		// Image resizing config
		$config = array(
			// Large Image
			array(
				'image_library' => 'GD2',
				'source_image'  => $source_image,
				'maintain_ratio'=> true,
				'width'         => 700,
				'height'        => 467,
				'new_image'     => './assets/images/large/'.$file_name
			),
			// Medium Image
			array(
				'image_library' => 'GD2',
				'source_image'  => $source_image,
				'maintain_ratio'=> true,
				'width'         => 600,
				'height'        => 400,
				'new_image'     => './assets/images/medium/'.$file_name
			),
			// Small Image
			array(
				'image_library' => 'GD2',
				'source_image'  => $source_image,
				'maintain_ratio'=> true,
				'width'         => 100,
				'height'        => 67,
				'new_image'     => './assets/images/small/'.$file_name
			));

		$this->load->library('image_lib', $config[0]);
		foreach ($config as $item){
//			print_r($item);
			$this->image_lib->initialize($item);
			if(!$this->image_lib->resize()){
				return false;
			}
			$this->image_lib->clear();
		}
	}

	public function offers_categories(){
		$data['page_title'] = "Offers Categories";
		$data['active'] = 15;
		$data['act'] = 15.1;
		$data['middle_content'] = 'offers/offers_categories';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function manage_offers_categories(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Offers Categories';
			$this->db->where('id',$id);
			$query = $this->db->get('offers_categories');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/manage_offers_categories');
			}
		} else {
			$title = 'Add Offers Categories';
		}
		$data['page_title'] = $title;
		$data['active'] = 15;
		$data['act'] = 15.1;
		$data['middle_content'] = 'offers/manage_offers_categories';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$category = $this->input->post('category_name');
			$order_no = $this->input->post('order_no');
			$status = $this->input->post('is_active');
			$update = array();
			if ($category) {
				$update['category_name'] = $category;
				$update['category_slug'] = url_title($category, '-', TRUE);
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($status) {
				$update['is_active'] = $status;
			}else{
				$update['is_active'] = 0;
			}
			$update['update_date'] = date("Y-m-d H:i:s");
			if ($id) {
				$this->db->where('id', $id);
				$update['update_date'] = date("Y-m-d H:i:s");
				if ($this->db->update('offers_categories', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			} else {
				$update['create_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('offers_categories', $update)) {
					$is_submit = true;
				} else {
					$is_submit = false;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/offers_categories');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/manage_offers_categories');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}

	public function offers(){
		$data['page_title'] = "Offers";
		$data['active'] = 15;
		$data['act'] = 15.2;
		$data['middle_content'] = 'offers/index';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function manage_offer(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Offer';
			$this->db->where('id',$id);
			$query = $this->db->get('offers');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/manage_offers_categories');
			}
		} else {
			$title = 'Add Offer';
		}
		$this->db->where('is_active',1);
		$query = $this->db->get('offers_categories');
		$data['categories'] = $query->result_array();
		$data['page_title'] = $title;
		$data['active'] = 15;
		$data['act'] = 15.2;
		$data['middle_content'] = 'offers/manage_offer';
		if (isset($_POST['submit'])) {
			$is_submit = false;
			$offers_categories_id = $this->input->post('offers_categories_id');
			$offer_title = $this->input->post('offer_title');
			$offer_desc = $this->input->post('offer_desc');
			$offer_image_alt = $this->input->post('offer_image_alt');
			$order_no = $this->input->post('order_no');
			$show_on_home = $this->input->post('show_on_home');
			$route_url = $this->input->post('route_url');
			$status = $this->input->post('is_active');
			$img_url = '';
			$img_thumb = '';
			if (isset($_FILES['file'])) {
				$path = 'offers';
				$image = $this->Master->upload('file', $path);
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
					$thumb = array(
						'image_library' => 'GD2',
						'source_image'  => $img_url,
						'maintain_ratio'=> true,
						'width'         => 626,
						'height'        => 626,
						'new_image'     => './uploads/offers/thumbs/'.$image['file_name']
					);
					$this->load->library('image_lib',$thumb);
					$this->image_lib->initialize($thumb);
					if ($this->image_lib->resize()){
						$this->image_lib->clear();
						$img_thumb = 'uploads/offers/thumbs/'.$image['file_name'];
					}
				}
			}

			$update = array();
			if ($offers_categories_id) {
				$update['offers_categories_id'] = $offers_categories_id;
			}
			if ($offer_title) {
				$update['offer_title'] = $offer_title;
			}
			if ($offer_desc) {
				$update['offer_desc'] = $offer_desc;
			}
			if ($img_url) {
				$update['offer_image'] = $img_url;
				$update['img_thumb'] = $img_thumb;
			}
			if ($offer_image_alt) {
				$update['offer_image_alt'] = $offer_image_alt;
			}
			if ($order_no) {
				$update['order_no'] = $order_no;
			}
			if ($show_on_home) {
				$update['show_on_home'] = $show_on_home;
			}else{
				$update['show_on_home'] = 0;
			}
			if ($route_url) {
				$update['route_url'] = $route_url;
			}else{
				$update['route_url'] = '';
			}
			if ($status) {
				$update['is_active'] = $status;
			}else{
				$update['is_active'] = 0;
			}
			$update['update_date'] = date("Y-m-d H:i:s");
			if ($id) {
				$this->db->where('id', $id);
				$update['update_date'] = date("Y-m-d H:i:s");
				if ($this->db->update('offers', $update)) {
					$is_submit = true;
				}
			} else {
				$update['create_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('offers', $update)) {
					$is_submit = true;
				}
			}
			if ($is_submit = true) {
				$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
				redirect('superadmin/administrator/offers');
			} else {
				$this->session->set_flashdata('danger', 'Data has been Update fail');
				redirect('superadmin/administrator/manage_offer');
			}
		}
		$this->load->view('superadmin/layout/template', $data);
	}
}
