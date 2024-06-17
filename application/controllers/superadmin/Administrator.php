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

	public function banner()
	{
		$data['page_title'] = "Banner";
		$data['active'] = 2;
		$data['act'] = 2.1;
		$data['middle_content'] = 'banner/index';
		$this->load->view('superadmin/layout/template', $data);
	}
	
	public function enabled_disabled_banner() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('banner');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('banner', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
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
				// print_r($image);exit();
				if ($image['code'] == 1) {
					$img_url = $image['img_url'];
					$this->_create_thumbs($image['file_name'],$img_url);
				}
			}
            $update = array();
						$update['title'] = $title;
						$update['image_alt'] = $image_alt;
						$update['order_no'] = $order_no;
						$update['description'] = $description;
						if ($name) {
								$update['name'] = $name;
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

//	Blogs Category ------------------------------------------------

	public function BlogsCategory(){
		$data['page_title'] = "Blogs Category";
		$data['active'] = 6;
		$data['act'] = 6.1;
		$data['middle_content'] = 'blogs/blogs_category';
		$this->load->view('superadmin/layout/template', $data);
	}
	
	public function enabled_disabled_blogs_category() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('blog_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('blog_category', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
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

	public function enabled_disabled_blogs() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('blogs');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('blogs', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
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
		
		public function enabled_disabled_success_story() {
			header('Content-Type: application/json'); // Ensure JSON response
			$id = $this->input->post('id');
			
			if ($id) {
					// Get the current status
					$this->db->select('status');
					$this->db->from('case_studies');
					$this->db->where('id', $id);
					$query = $this->db->get();
					$current_status = $query->row()->status;
	
					// Toggle the status
					$update['status'] = ($current_status == 1) ? 0 : 1;
					
					// Update the status in the database
					$this->db->where('id', $id);
					if ($this->db->update('case_studies', $update)) {
						echo json_encode(['success' => true]);
					} else {
							echo json_encode(['success' => false]);
					}
			} else {
					echo json_encode(['success' => false]);
			}
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
				
				$this->db->where('status',1);
        $data['brand'] = $this->db->get('investors_category')->result();
				
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
	
	public function enabled_disabled_categories() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('testimonial_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('testimonial_category', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
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

	public function enabled_disabled_testimonail() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('testimonial');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('testimonial', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
	}
	
	public function add_edit_Testimonial(){
			$this->db->where('status',1);
			$data['Testimonial_category'] = $this->db->get('testimonial_category')->result();
			$this->db->where('status',1);
        $data['brand'] = $this->db->get('investors_category')->result();
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

//    manage_report_policies ----------------------------------

	public function manage_report_policies(){
		$data['page_title'] = "Manage Report And Policies";
		$data['active'] = 10;
		$data['act'] = 10.1;
		$data['middle_content'] = 'gst-notification/index';
		$this->load->view('superadmin/layout/template', $data);
	}
	
	public function enabled_disabled_manage_report_policies() {
    header('Content-Type: application/json'); // Ensure JSON response
    $id = $this->input->post('id');
    
    if ($id) {
        // Get the current status
        $this->db->select('status');
        $this->db->from('gst_notification');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $current_status = $query->row()->status;

        // Toggle the status
        $update['status'] = ($current_status == 1) ? 0 : 1;
        
        // Update the status in the database
        $this->db->where('id', $id);
        if ($this->db->update('gst_notification', $update)) {
          echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
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

	public function contact_us(){
		$data['page_title'] = "Contact US";
		$data['active'] = 17;
		$data['act'] = 17.4;
		$data['middle_content'] = 'form/contact_us';
		$this->load->view('superadmin/layout/template', $data);
	}

}
