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
		$this->load->model('superadmin/GSTNotification_Model','GSTNotification');
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
		
		$this->db->from('submit_contact');
		$data['contact_count'] = $this->db->count_all_results();
		
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
		    // echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$title = $this->input->post('title');
			$name = $this->input->post('name');
			$image_alt = $this->input->post('image_alt');
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
					$this->_create_thumbs($image['file_name'],$img_url);
				}
			}
            $update = array();
            if ($title) {
                $update['title'] = $title;
            }
						if ($name) {
								$update['name'] = $name;
						}
						if ($image_alt) {
							$update['image_alt'] = $image_alt;
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
						if ($img_url){
							$update['image'] = $img_url;
							$update['image_large'] = 'assets/images/large/'.$image['file_name'];
							$update['image_medium'] = 'assets/images/medium/'.$image['file_name'];
							$update['image_small'] = 'assets/images/small/'.$image['file_name'];
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
				
				 $this->db->select('category_id');
				 $this->db->where('blog_id', $id);
				 $query = $this->db->get('blogs_multi_category');
				 $categories = $query->result_array();
				 $selected_categories = array();
				 foreach ($categories as $category) {
						 $selected_categories[] = $category['category_id'];
				 }
				 $data['selected_categories'] = $selected_categories;
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
					$this->db->delete('blogs_multi_category', array('blog_id' => $id));
					foreach ($blog_cat_id as $category_id) {
						$cate_add['category_id'] = $category_id;
						$cate_add['blog_id'] = $id;
						$cate_add['status'] = 1;
						$cate_add['created_date'] = date("Y-m-d H:i:s");
						if ($this->db->insert('blogs_multi_category', $cate_add)) {
								$is_submit = true;
						}
					}
					$is_submit = true;
				}				
			} else {
        $add['created_date'] = date("Y-m-d H:i:s");
				if ($this->db->insert('blogs', $add)) {
					$blog_id = $this->db->insert_id();
					foreach ($blog_cat_id as $category_id) {
						$cate_add['category_id'] = $category_id;
						$cate_add['blog_id'] = $blog_id;
						$cate_add['status'] = 1;
						$cate_add['created_date'] = date("Y-m-d H:i:s");
						if ($this->db->insert('blogs_multi_category', $cate_add)) {
							$is_submit = true;
						}
					}
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

//	Success Story Category -------------------------------------------------------------------

    public function SuccessStoryCategory(){
        $data['page_title'] = "Success Story Category";
        $data['active'] = 7;
        $data['act'] = 7.1;
        $data['middle_content'] = 'CaseStudies/casestudies_category';
        $this->load->view('superadmin/layout/template', $data);
    }

    public function add_edit_Success_Story_Category(){
        $id = $this->input->get('id');
        if ($id) {
            $title = 'Edit Success Story Category';
            $this->db->where('id',$id);
            $query = $this->db->get('casestudies_category');
            $result = $query->row_array();
            if ($result){
                $data['edit'] = $result;
            }else{
                $this->session->set_flashdata('danger', 'Edit data not found!');
                redirect('superadmin/administrator/SuccessStoryCategory');
            }
        } else {
            $title = 'Add Success Story Category';
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
                redirect('superadmin/administrator/SuccessStoryCategory');
            } else {
                $this->session->set_flashdata('danger', 'Data has been Update fail');
                redirect('superadmin/administrator/add_edit_Success_Story_Category');
            }
        }
        $this->load->view('superadmin/layout/template', $data);
    }

//    Case Studies -------------------------------------------

    public function SuccessStory(){
        $data['page_title'] = "Success Story";
        $data['active'] = 7;
        $data['act'] = 7.2;
        $data['middle_content'] = 'CaseStudies/index';
        $this->load->view('superadmin/layout/template', $data);
    }
		
		public function delete_image() {
			$id = $this->input->post('imageId');
			
			if ($id) {
					$this->db->where('id', $id);
					$result = $this->db->delete('success_story_multi_photos');
					
					if ($result) {
							echo json_encode(['code' => 1]);
					} else {
							echo json_encode(['code' => 0]);
					}
			} else {
					echo json_encode(['code' => 0]);
			}
		}
		
		public function delete_video() {
			$id = $this->input->post('videoId');
			
			if ($id) {
					$this->db->where('id', $id);
					$result = $this->db->delete('success_story_multi_videos');
					
					if ($result) {
							echo json_encode(['code' => 1]);
					} else {
							echo json_encode(['code' => 0]);
					}
			} else {
					echo json_encode(['code' => 0]);
			}
		}
	

    public function add_edit_Success_Story(){
        $this->db->where('status',1);
        $data['casestudies_category'] = $this->db->get('testimonial_category')->result();
				
				$this->db->select('t.id, t.client_name, t.brand,t.video_url, GROUP_CONCAT(tc.name SEPARATOR ", ") as categories');
				$this->db->where('t.status',1);
				$this->db->from('testimonial t');
				$this->db->join('testimonial_multi_category tmc', 'tmc.testimonial_id = t.id', 'left');
				$this->db->join('testimonial_category tc', 'tc.id = tmc.category_id', 'left');
				$this->db->where('t.video_url IS NOT NULL');
				$this->db->where('t.video_url !=', '');
				$this->db->group_by('t.id');
				$query = $this->db->get();
				$data['testimonial_video'] = $query->result_array();				
				
        $id = $this->input->get('id');
        if ($id) {
            $title = 'Edit Success Story';
            $this->db->where('id',$id);
            $query = $this->db->get('case_studies');
            $result = $query->row_array();
            if ($result){
                $data['edit'] = $result;
								$this->db->select('category_id');
								$this->db->where('success_story_id ', $id);
								$query = $this->db->get('success_story_multi_category');
								$categories = $query->result_array();
								$selected_categories = array();
								foreach ($categories as $category) {
										$selected_categories[] = $category['category_id'];
								}
								$data['selected_categories'] = $selected_categories;
								
								$this->db->select('photo,id');
								$this->db->where('success_story_id ', $id);
								$query1 = $this->db->get('success_story_multi_photos');
								$photos = $query1->result_array();
								$existing_images = array();
								foreach ($photos as $index => $photo) {
										$existing_images[$index]['photo'] = $photo['photo'];
										$existing_images[$index]['id'] = $photo['id'];
								}
								$data['existing_images'] = $existing_images;
								
								$this->db->select('video_url,video_thumbnail_url,id');
								$this->db->where('success_story_id ', $id);
								$query2 = $this->db->get('success_story_multi_videos');
								$videos = $query2->result_array();
								$existing_videos = array();
								foreach ($videos as $index => $video) {
										$existing_videos[$index]['video_url'] = $video['video_url']; 
										$existing_videos[$index]['video_thumbnail_url'] = $video['video_thumbnail_url']; 
										$existing_videos[$index]['id'] = $video['id'];
								}
								$data['existing_videos'] = $existing_videos;
								
            }else{
                $this->session->set_flashdata('danger', 'Edit data not found!');
                redirect('superadmin/administrator/SuccessStory');
            }
        } else {
            $title = 'Add Success Story';
        }
        $data['page_title'] = $title;
        $data['active'] = 7;
        $data['act'] = 7.2;
        $data['middle_content'] = 'CaseStudies/add_edit_Case_studies';
        if (isset($_POST['submit'])) {
					// echo '<pre>';print_r($_POST);exit();
            $is_submit = false;
            $case_s_id = $this->input->post('case_s_id');
            $brand = $this->input->post('brand');
            $meta_title = $this->input->post('meta_title');
            $meta_desc = $this->input->post('meta_desc');
            $meta_keyword = $this->input->post('meta_keyword');
            $client_name = $this->input->post('client_name');
            $youtube_url = $this->input->post('youtube_url');
            $youtube_url_edit = $this->input->post('youtube_url_edit');
            $videos_edit_id = $this->input->post('videos_edit_id');
            $testimonial_video = $this->input->post('testimonial_video');
						
            $img_url = '';
            if (isset($_FILES['cover_photo'])) {
                $path = 'casestudies';
                $image = $this->Master->upload('cover_photo', $path);
                if ($image['code'] == 1) {
                    $img_url = $image['img_url'];
                    $this->_create_thumbs($image['file_name'],$img_url);
                }
            }
						
						// echo '<pre>';print_r($img_url);
						
						$thumb_img_urls = array();
						if (isset($_FILES['thumbnail'])) {
							$files = $_FILES['thumbnail']; // Assuming the input name is 'thumbnail'
							$file_count = count($files['name']);
							$path = 'casestudies';
		
							for ($i = 0; $i < $file_count; $i++) {
									$_FILES['userfile']['name'] = $files['name'][$i];
									$_FILES['userfile']['type'] = $files['type'][$i];
									$_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
									$_FILES['userfile']['error'] = $files['error'][$i];
									$_FILES['userfile']['size'] = $files['size'][$i];

									$upload_data = $this->Master->upload('userfile', $path);
			
									if ($upload_data['code'] == 1) {
										$thumb_img_urls[$i] = $upload_data['img_url'];
									}
							}
						}
						
						// echo '<pre>';print_r($thumb_img_urls);
						
						$thumb_img_urls_edit = array();
						if (isset($_FILES['thumbnail_edit'])) {
							$files1 = $_FILES['thumbnail_edit']; // Assuming the input name is 'thumbnail'
							$file_count1 = count($files1['name']);
							$path = 'casestudies';
		
							for ($i = 0; $i < $file_count1; $i++) {
									$_FILES['userfile1']['name'] = $files1['name'][$i];
									$_FILES['userfile1']['type'] = $files1['type'][$i];
									$_FILES['userfile1']['tmp_name'] = $files1['tmp_name'][$i];
									$_FILES['userfile1']['error'] = $files1['error'][$i];
									$_FILES['userfile1']['size'] = $files1['size'][$i];

									$upload_data1 = $this->Master->upload('userfile1', $path);
			
									if ($upload_data1['code'] == 1) {
										$thumb_img_urls_edit[$i] = $upload_data1['img_url'];
									}else{
										$thumb_img_urls_edit[$i] = '';
									}
							}
						}
						
						// echo '<pre>';print_r($thumb_img_urls_edit);
						
						$img_urls = array();
						if (isset($_FILES['images'])) {
							$files2 = $_FILES['images'];
							$file_count2 = count($files2['name']);
							$path = 'casestudies';
		
							for ($i = 0; $i < $file_count2; $i++) {
									$_FILES['userfile2']['name'] = $files2['name'][$i];
									$_FILES['userfile2']['type'] = $files2['type'][$i];
									$_FILES['userfile2']['tmp_name'] = $files2['tmp_name'][$i];
									$_FILES['userfile2']['error'] = $files2['error'][$i];
									$_FILES['userfile2']['size'] = $files2['size'][$i];

									$upload_data2 = $this->Master->upload('userfile2', $path);
			
									if ($upload_data2['code'] == 1) {
										$img_urls[$i] = $upload_data2['img_url'];
									}
							}
						}
						
						// echo '<pre>';print_r($img_urls);

            $image_alt = $this->input->post('image_alt');
            $content = $this->input->post('content');
            $order_no = $this->input->post('order_no');
            $status = $this->input->post('status');
            $home = $this->input->post('home');

            $add = array();
						if ($testimonial_video){
							$add['testimonial'] = $testimonial_video;
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
            if ($brand){
                $add['brand'] = $brand;
            }
            if ($img_url){
                $add['image'] = $img_url;
            }
            if ($image_alt){
                $add['image_alt'] = $image_alt;
            }
            if ($content){
                $add['content'] = $content;
            }
            if ($client_name){
                $add['client_name'] = $client_name;
            }
            if ($order_no){
                $add['order_no'] = $order_no;
            }
            if ($status) {
                $add['status'] = $status;
            }else{
                $add['status'] = 0;
            }
						if ($home) {
							$add['home'] = $home;
						}else{
								$add['home'] = 0;
						}
						
						// echo '<pre>';print_r($add);
						// echo '<pre>';print_r($case_s_id);
						
						
            if ($id) {
							echo 'edit';
                $this->db->where('id', $id);
                if ($this->db->update('case_studies', $add)) {
									$this->db->delete('success_story_multi_category', array('success_story_id' => $id));
									foreach ($case_s_id as $category_id) {
										$case_add['category_id'] = $category_id;
										$case_add['success_story_id '] = $id ;
										$case_add['status'] = 1;
										$case_add['created_date'] = date("Y-m-d H:i:s");
										if ($this->db->insert('success_story_multi_category', $case_add)) {
												$is_submit = true;
										}
										foreach ($img_urls as $url) {
											echo $url;
											$p_add['photo'] = $url;
											$p_add['success_story_id '] = $id ;
											$p_add['status'] = 1;
											$p_add['created_date'] = date("Y-m-d H:i:s");
											if ($this->db->insert('success_story_multi_photos', $p_add)) {
												$is_submit = true;
											}
											echo $this->db->insert_id();
										}
										// exit();
										foreach ($thumb_img_urls as $index => $url) {
											$v_add['video_thumbnail_url'] = $url;
											$v_add['video_url'] = $youtube_url[$index];
											$v_add['success_story_id '] = $id ;
											$v_add['status'] = 1;
											$v_add['created_date'] = date("Y-m-d H:i:s");
											if ($this->db->insert('success_story_multi_videos', $v_add)) {
												$is_submit = true;
											}
										}
										foreach ($thumb_img_urls_edit as $index => $url) {
											if(!empty($url)){
												$v_add1['video_thumbnail_url'] = $url;
												$v_add1['video_url'] = $youtube_url_edit[$index];
												$this->db->where('id', $videos_edit_id[$index]);
												if ($this->db->update('success_story_multi_videos', $v_add1)) {
													$is_submit = true;
												}
											}else{
												$v_add2['video_url'] = $youtube_url_edit[$index];												
												$this->db->where('id', $videos_edit_id[$index]);
												if ($this->db->update('success_story_multi_videos', $v_add2)) {
													$is_submit = true;
												}
											}
										}
									}
                    $is_submit = true;
                }
            } else {
                $add['created_date'] = date("Y-m-d H:i:s");
                if ($this->db->insert('case_studies', $add)) {
									$success_story_id  = $this->db->insert_id();
									foreach ($case_s_id as $category_id) {
										$case_add['category_id'] = $category_id;
										$case_add['success_story_id '] = $success_story_id ;
										$case_add['status'] = 1;
										$case_add['created_date'] = date("Y-m-d H:i:s");
										if ($this->db->insert('success_story_multi_category', $case_add)) {
											$is_submit = true;
										}											
									}
									foreach ($img_urls as $url) {
										$p_add['photo'] = $url;
										$p_add['success_story_id '] = $success_story_id ;
										$p_add['status'] = 1;
										$p_add['created_date'] = date("Y-m-d H:i:s");
										if ($this->db->insert('success_story_multi_photos', $p_add)) {
											$is_submit = true;
										}
									}
									foreach ($thumb_img_urls as $index => $url) {
										$v_add['video_thumbnail_url'] = $url;
										$v_add['video_url'] = $youtube_url[$index];
										$v_add['success_story_id '] = $success_story_id ;
										$v_add['status'] = 1;
										$v_add['created_date'] = date("Y-m-d H:i:s");
										if ($this->db->insert('success_story_multi_videos', $v_add)) {
											$is_submit = true;
										}
									}
                  $is_submit = true;
                }
            }
						echo 'error';
            if ($is_submit = true) {
                $this->session->set_flashdata('success', 'Data upload successfully.');
                redirect('superadmin/administrator/SuccessStory');
            } else {
                $this->session->set_flashdata('danger', 'Data upload failed.');
                redirect('superadmin/administrator/add_edit_Success_Story');
            }
        }
        $this->load->view('superadmin/layout/template', $data);
    }
		
		//	Testimonial Category -------------------------------------------------------------------

  public function Categories(){
		$data['page_title'] = "Category";
		$data['active'] = 16;
		$data['act'] = 16.1;
		$data['middle_content'] = 'Testimonial/Testimonial_category';
		$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_Category(){
			$id = $this->input->get('id');
			if ($id) {
					$title = 'Edit Category';
					$this->db->where('id',$id);
					$query = $this->db->get('testimonial_category');
					$result = $query->row_array();
					if ($result){
							$data['edit'] = $result;
					}else{
							$this->session->set_flashdata('danger', 'Edit data not found!');
							redirect('superadmin/administrator/TestimonialCategory');
					}
			} else {
					$title = 'Add Category';
			}
			$data['page_title'] = $title;
			$data['active'] = 16;
			$data['act'] = 16.1;
			$data['middle_content'] = 'Testimonial/add_edit_Testimonial_Category';
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
							if ($this->db->update('testimonial_category', $update)) {
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
							if ($this->db->insert('testimonial_category', $add)) {
									$is_submit = true;
							} else {
									$is_submit = false;
							}
					}
					if ($is_submit = true) {
							$this->session->set_flashdata('success', 'Data has been Updated Successfully.');
							redirect('superadmin/administrator/Categories');
					} else {
							$this->session->set_flashdata('danger', 'Data has been Update fail');
							redirect('superadmin/administrator/add_edit_Category');
					}
			}
			$this->load->view('superadmin/layout/template', $data);
	}

//    Testimonial -------------------------------------------

	public function Testimonial(){
			$data['page_title'] = "Testimonial";
			$data['active'] = 16;
			$data['act'] = 16.2;
			$data['middle_content'] = 'Testimonial/index';
			$this->load->view('superadmin/layout/template', $data);
	}

	public function add_edit_Testimonial(){
			$this->db->where('status',1);
			$data['Testimonial_category'] = $this->db->get('testimonial_category')->result();
			$id = $this->input->get('id');
			if ($id) {
					$title = 'Edit Testimonial';
					$this->db->where('id',$id);
					$query = $this->db->get('testimonial');
					$result = $query->row_array();
					if ($result){
							$data['edit'] = $result;
							
							$this->db->select('category_id');
							$this->db->where('testimonial_id', $id);
							$query = $this->db->get('testimonial_multi_category');
							$categories = $query->result_array();
							$selected_categories = array();
							foreach ($categories as $category) {
									$selected_categories[] = $category['category_id'];
							}
							$data['selected_categories'] = $selected_categories;
					}else{
							$this->session->set_flashdata('danger', 'Edit data not found!');
							redirect('superadmin/administrator/Testimonial');
					}
			} else {
					$title = 'Add Testimonial';
			}
			$data['page_title'] = $title;
			$data['active'] = 16;
			$data['act'] = 16.2;
			$data['middle_content'] = 'Testimonial/add_edit_Testimonial';
			if (isset($_POST['submit'])) {
					$is_submit = false;
					$testti_cat_id = $this->input->post('testti_cat_id');
					$meta_title = $this->input->post('meta_title');
					$meta_desc = $this->input->post('meta_desc');
					$meta_keyword = $this->input->post('meta_keyword');
					$client_name = $this->input->post('client_name');
					$brand = $this->input->post('brand');
					$company_name = $this->input->post('company_name');
					$video_thumbnail = '';
					if (isset($_FILES['file'])) {
							$path = 'testimonial';
							$video = $this->Master->upload('file', $path);
							if ($video['code'] == 1) {
									$video_thumbnail = $video['img_url'];
							}
					}
					$video_url = $this->input->post('video_url');
					$text = $this->input->post('text');
					$order_no = $this->input->post('order_no');
					$status = $this->input->post('status');
					$home = $this->input->post('home');

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
					if ($brand){
							$add['brand'] = $brand;
					}
					if ($client_name){
						$add['client_name'] = $client_name;
					}
					if ($company_name){
						$add['company_name'] = $company_name;
				}
					if ($video_url){
							$add['video_url'] = $video_url;
					}
					if ($video_thumbnail){
							$add['video_thumbnail'] = $video_thumbnail;
					}
					if ($text){
							$add['text'] = $text;
					}
					if ($order_no){
							$add['order_no'] = $order_no;
					}
					if ($status) {
							$add['status'] = $status;
					}else{
							$add['status'] = 0;
					}
					if ($home) {
						$add['home'] = $home;
					}else{
							$add['home'] = 0;
					}
					// echo '<pre>';print_r($add);exit();
					
					if ($id) {
							$this->db->where('id', $id);
							if ($this->db->update('testimonial', $add)) {
								$this->db->delete('testimonial_multi_category', array('testimonial_id' => $id));
								foreach ($testti_cat_id as $category_id) {
									$test_add['category_id'] = $category_id;
									$test_add['testimonial_id'] = $id;
									$test_add['status'] = 1;
									$test_add['created_date'] = date("Y-m-d H:i:s");
									if ($this->db->insert('testimonial_multi_category', $test_add)) {
											$is_submit = true;
									}
								}
									$is_submit = true;
							}
					} else {
							$add['created_date'] = date("Y-m-d H:i:s");
							if ($this->db->insert('testimonial', $add)) {
									$testimonial_id = $this->db->insert_id();
									foreach ($testti_cat_id as $category_id) {
										$test_add['category_id'] = $category_id;
										$test_add['testimonial_id'] = $testimonial_id;
										$test_add['status'] = 1;
										$test_add['created_date'] = date("Y-m-d H:i:s");
										if ($this->db->insert('testimonial_multi_category', $test_add)) {
											$is_submit = true;
										}
									}
									$is_submit = true;
							}
					}
					if ($is_submit = true) {
							$this->session->set_flashdata('success', 'Data upload successfully.');
							redirect('superadmin/administrator/Testimonial');
					} else {
							$this->session->set_flashdata('danger', 'Data upload failed.');
							redirect('superadmin/administrator/add_edit_Testimonial');
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

//    manage_report_policies ----------------------------------

	public function manage_report_policies(){
		$data['page_title'] = "Manage Report And Policies";
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'gst-notification/index';
		$this->load->view('superadmin/layout/template', $data);
	}
	
	public function get_categories() {
		$post = $_POST;
		if(isset($post['type_id']) && $post['type_id'])
		{
				$cate_list = $this->GSTNotification->get_categories_by_type($post['type_id']);
				$select = '';
				$select .= '<option value=""> Select </option>';
				if($cate_list)
				{
		foreach ($cate_list as $key => $cate) {
			$select .= '<option value="'.$cate["category_id"].'">'. $cate['category_name']. '</option>';
						}
				}
				echo $select;
		}
	}
	
	public function add_category() {
		$type_id = $this->input->post('type_id');
		$name = $this->input->post('name');
		
		if (empty($type_id) || empty($name)) {
				echo json_encode(['status' => false, 'message' => 'Type and Name are required']);
				return;
		}

		$category_id = $this->GSTNotification->add_category($type_id, $name);
		if ($category_id) {
				echo json_encode(['status' => true, 'id' => $category_id, 'name' => $name]);
		} else {
				echo json_encode(['status' => false, 'message' => 'Error adding category']);
		}
	}
	
	public function get_sub_categories() {
		$post = $_POST;
		if(isset($post['type_id']) && $post['type_id'] && isset($post['category_id']) && $post['category_id'])
		{
				$sub_cate_list = $this->GSTNotification->get_sub_categories_by_type_category($post['type_id'], $post['category_id']);
				$select = '';
				$select .= '<option value=""> Select </option>';
				if($sub_cate_list)
				{
		foreach ($sub_cate_list as $key => $sub_cate) {
			$select .= '<option value="'.$sub_cate["sub_category_id"].'">'. $sub_cate['sub_category_name']. '</option>';
						}
				}
				echo $select;
		}
	}
	
	public function add_sub_category() {
		$type_id = $this->input->post('type_id');
		$category_id = $this->input->post('category_id');
		$name = $this->input->post('name');
		
		if (empty($type_id) || empty($category_id) || empty($name)) {
				echo json_encode(['status' => false, 'message' => 'Type, Category and Name are required']);
				return;
		}

		$sub_category_id = $this->GSTNotification->add_sub_category($type_id, $category_id, $name);
		if ($sub_category_id) {
				echo json_encode(['status' => true, 'id' => $sub_category_id, 'name' => $name]);
		} else {
				echo json_encode(['status' => false, 'message' => 'Error adding category']);
		}
	}
	
	public function get_sub_categories_2() {
		$post = $_POST;
		if(isset($post['type_id']) && $post['type_id'] && isset($post['category_id']) && $post['category_id'] && isset($post['sub_category_id']) && $post['sub_category_id'])
		{
				$sub_cate_2_list = $this->GSTNotification->get_sub_categories_2_by_type_category($post['type_id'], $post['category_id'], $post['sub_category_id']);
				$select = '';
				$select .= '<option value=""> Select </option>';
				if($sub_cate_2_list)
				{
		foreach ($sub_cate_2_list as $key => $sub_cate_2) {
			$select .= '<option value="'.$sub_cate_2["sub_category_2_id"].'">'. $sub_cate_2['sub_category_2_name']. '</option>';
						}
				}
				echo $select;
		}
	}
	
	public function add_sub_category_2() {
		$type_id = $this->input->post('type_id');
		$category_id = $this->input->post('category_id');
		$sub_category_id = $this->input->post('sub_category_id');
		$name = $this->input->post('name');
		
		if (empty($type_id) || empty($category_id) || empty($sub_category_id) || empty($name)) {
				echo json_encode(['status' => false, 'message' => 'Type, Category, sub Category and Name are required']);
				return;
		}

		$sub_category_2_id = $this->GSTNotification->add_sub_category_2($type_id, $category_id, $sub_category_id, $name);
		if ($sub_category_2_id) {
				echo json_encode(['status' => true, 'id' => $sub_category_2_id, 'name' => $name]);
		} else {
				echo json_encode(['status' => false, 'message' => 'Error adding category']);
		}
	}

	public function add_edit_report_policies(){
		$id = $this->input->get('id');
		if ($id) {
			$title = 'Edit Report And Policies';
			$this->db->where('id',$id);
			$query = $this->db->get('gst_notification');
			$result = $query->row_array();
			if ($result){
				$data['edit'] = $result;
			}else{
				$this->session->set_flashdata('danger', 'Edit data not found!');
				redirect('superadmin/administrator/manage_report_policies');
			}
		} else {
			$title = 'Add Report And Policies';
		}
		$data['page_title'] = $title;
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'gst-notification/add_edit_gst_notification';
		if (isset($_POST['submit'])) {
			// echo '<pre>';print_r($_POST);exit();
			$is_submit = false;
			$meta_title = $this->input->post('meta_title');
			$meta_desc = $this->input->post('meta_desc');
			$meta_keyword = $this->input->post('meta_keyword');
			$pdf_url = '';
			if (isset($_FILES['file'])) {
				$path = 'ReportAndPolicy';
				$file = $this->Master->upload('file', $path);
				if ($file['code'] == 1) {
					$pdf_url = $file['img_url'];
				}
			}
			$type = $this->input->post('type');
			$category = $this->input->post('category');
			$sub_category = $this->input->post('sub_category');
			$sub_category_2 = $this->input->post('sub_category_2');
			$label_title = $this->input->post('label_title');
			$link_title = $this->input->post('link_title');
			$document_name = $this->input->post('document_name');
			$document_date = $this->input->post('document_date');
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
			if ($pdf_url){
				$add['pdf'] = $pdf_url;
			}
			if ($order_no){
				$add['order_no'] = $order_no;
			}
			if ($status) {
				$add['status'] = $status;
			}else{
				$add['status'] = 0;
			}
			if ($type){
				$add['type'] = $type;
			}			
			if ($category){
				$add['category'] = $category;
			}
			if ($sub_category){
				$add['sub_category'] = $sub_category;
			}
			if ($sub_category_2){
				$add['sub_category_2'] = $sub_category_2;
			}
			if ($label_title){
				$add['label_title'] = $label_title;
			}
			if ($link_title){
				$add['link_title'] = $link_title;
			}
			if ($document_name){
				$add['document_name'] = $document_name;
			}
			if ($document_date){
				$add['document_date'] = $document_date;
			}
		
			// echo '<pre>';print_r($add);exit();
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
				redirect('superadmin/administrator/manage_report_policies');
			} else {
				$this->session->set_flashdata('danger', 'Data upload failed.');
				redirect('superadmin/administrator/add_edit_report_policies');
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
				'width'         => 900,
				'height'        => 900,
				'new_image'     => './assets/images/large/'.$file_name
			),
			// Medium Image
			array(
				'image_library' => 'GD2',
				'source_image'  => $source_image,
				'maintain_ratio'=> true,
				'width'         => 600,
				'height'        => 600,
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
	
	public function contact_us(){
		$data['page_title'] = "Contact US";
		$data['active'] = 17;
		$data['act'] = 17.4;
		$data['middle_content'] = 'form/contact_us';
		$this->load->view('superadmin/layout/template', $data);
	}
}
