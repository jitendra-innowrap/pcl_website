<?php


class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Banner_Model','banner');
		$this->load->model('superadmin/Clientele_Model','Clientele');
		$this->load->model('superadmin/Counter_Model','Counter');
		$this->load->model('superadmin/BlogsCategory_Model','BlogsCategory');
	}

	function homebanner(){
		$this->load->model('superadmin/Homebanner_Model','Homebanner');
		$list = $this->Homebanner->get_datatables();
//		echo '<pre>';print_r($list);exit();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $banners) {
			if ($banners->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_homebanner?id='.$banners->id)."'>Edit</a>";
			$img = "<img width='150px' src='".base_url($banners->image)."'/>";

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $banners->title;
			$row[] = $img;
			$row[] = $banners->image_alt;
			$row[] = '<a class="btn btn-sm btn-primary" target="_blank" href="'.$banners->routing_url.'">URL</a>';
			$row[] = $banners->order_no;
			$row[] = $banners->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Homebanner->count_all(),
			"recordsFiltered" => $this->Homebanner->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function banner(){
		$list = $this->banner->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $banners) {
			if ($banners->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Banner?id='.$banners->id)."'>Edit</a>";
            $img = '';
            if ($banners->image){
                $img = "<img width='150px' src='".base_url($banners->image)."'/>";
            }
            if ($banners->is_video == 1){
                $img = "<a class='btn btn-sm btn-danger' target='_blank' href='$banners->video_url'><i class='ti ti-youtube'></i> Youtube</a>";
            }
						$url = '';
						if($banners->is_button == 1){
							if($banners->routing_url){
								$url = '<a class="btn btn-sm btn-primary" target="_blank" href="'.$banners->routing_url.'">URL</a>';
							}
						}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $banners->name;
			$row[] = $banners->title;
			$row[] = $banners->description;
			$row[] = $url;
			$row[] = $img;
			$row[] = $banners->order_no;
			$row[] = $banners->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->banner->count_all(),
			"recordsFiltered" => $this->banner->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function clientele(){
		$list = $this->Clientele->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $clients) {
			if ($clients->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Client?id='.$clients->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $clients->name;
			$row[] = '<img width="100" src="'.base_url($clients->logo).'"/>';
			$row[] = $clients->logo_alt;
			$row[] = ($clients->home_page == 1 ? '<span class="text-green">Enabled</span>':'<span class="text-danger">Disable</span>');
			$row[] = $clients->h_order_no;
			$row[] = ($clients->is_product_page == 1 ? '<span class="text-green">Enabled</span>':'<span class="text-danger">Disable</span>');
			$row[] = $clients->product_page;
//			$row[] = $clients->page_name;
			$row[] = $clients->p_order_no;
			$row[] = $clients->created_date;
			$row[] = "<div class='btn-group'>".$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Clientele->count_all(),
			"recordsFiltered" => $this->Clientele->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function counter(){
		$list = $this->Counter->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $counter) {
			if ($counter->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Counter?id='.$counter->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $counter->label;
			$row[] = $counter->value;
			$row[] = $counter->order_no;
			$row[] = $counter->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Counter->count_all(),
			"recordsFiltered" => $this->Counter->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function blogs_category(){
		$list = $this->BlogsCategory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $BlogsCategory) {
			if ($BlogsCategory->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_blogsCategory?id='.$BlogsCategory->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $BlogsCategory->name;
			$row[] = $BlogsCategory->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->BlogsCategory->count_all(),
			"recordsFiltered" => $this->BlogsCategory->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function blogs_list(){
		$this->load->model('superadmin/Blogs_Model','Blogs');
		$list = $this->Blogs->get_datatables();
		$data = array();
		$no = $_POST['start'];
//		print_r($list);exit();
		foreach ($list as $Blogs) {
			if ($Blogs->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_blogs?id='.$Blogs->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $Blogs->title;
			$row[] = "<img width='150px' src='".base_url($Blogs->image)."'/>";
			$row[] = $Blogs->author;
			$row[] = $Blogs->blog_date;
			$row[] = $Blogs->categories;
			$row[] = $Blogs->order_no;
			$row[] = $Blogs->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Blogs->count_all(),
			"recordsFiltered" => $this->Blogs->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
//	 Case Studies ------------------------------------------------------------------------------------------------------

    function CaseStudiesCategory(){
        $this->load->model('superadmin/CaseStudiesCategory_Model','CaseStudiesCategory');
        $list = $this->CaseStudiesCategory->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $BlogsCategory) {
            if ($BlogsCategory->status == 1){
                $status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
            }else{
                $status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Success_Story_Category?id='.$BlogsCategory->id)."'>Edit</a>";
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $BlogsCategory->name;
            $row[] = $BlogsCategory->created_date;
            $row[] = "<div class='btn-group'>".$status.$edit."</div>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->CaseStudiesCategory->count_all(),
            "recordsFiltered" => $this->CaseStudiesCategory->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function casestudies_list(){
        $this->load->model('superadmin/CaseStudies_Model','CaseStudies');
        $list = $this->CaseStudies->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Blogs) {
            if ($Blogs->status == 1){
                $status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
            }else{
                $status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Success_Story?id='.$Blogs->id)."'>Edit</a>";
            $img = '';
            if ($Blogs->image){
                $img = "<img width='150px' src='".base_url($Blogs->image)."'/>";
            }
						$brand = '';
						if ($Blogs->brand){
							$brand = $Blogs->brand;
							$brand = str_replace('_', ' ', $brand);
						}
						if ($Blogs->home == 1){
							$home = 'Yes';
						}else{
								$home = "No";
						}
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $brand;
						$row[] = $Blogs->categories;
						$row[] = $Blogs->client_name;
            $row[] = $img;
            $row[] = $home;
            $row[] = $Blogs->order_no;
            $row[] = $Blogs->created_date;
            $row[] = "<div class='btn-group'>".$status.$edit."</div>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->CaseStudies->count_all(),
            "recordsFiltered" => $this->CaseStudies->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

		//	  Testimonial ------------------------------------------------------------------------------------------------------

    function testimonialCategory(){
			$this->load->model('superadmin/testimonialCategory_Model','testimonialCategory');
			$list = $this->testimonialCategory->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $BlogsCategory) {
					if ($BlogsCategory->status == 1){
							$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
					}else{
							$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
					}
					$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Category?id='.$BlogsCategory->id)."'>Edit</a>";
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $BlogsCategory->name;
					$row[] = $BlogsCategory->created_date;
					$row[] = "<div class='btn-group'>".$status.$edit."</div>";
					$data[] = $row;
			}

			$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->testimonialCategory->count_all(),
					"recordsFiltered" => $this->testimonialCategory->count_filtered(),
					"data" => $data,
			);
			//output to json format
			echo json_encode($output);
	}
	
	function Testimonial_list(){
		$this->load->model('superadmin/Testimonial_Model','Testimonial');
		$list = $this->Testimonial->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Blogs) {
				if ($Blogs->status == 1){
						$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
				}else{
						$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
				}
				if ($Blogs->home == 1){
					$home = "Yes";
				}else{
						$home = "No";
				}
				$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_Testimonial?id='.$Blogs->id)."'>Edit</a>";
				
				$video_btn = '';
				if($Blogs->video_url){
					$video_btn = "<a class='btn btn-sm btn-danger' target='_blank' href='$Blogs->video_url'><i class='ti ti-youtube'></i> Youtube</a>";
				}else{
					$video_btn = '';
				}
				
				$img = '';
				if ($Blogs->video_thumbnail){
						$img = "<img width='150px' src='".base_url($Blogs->video_thumbnail)."'/>";
				}
				
				$trimmed_text = implode(' ', array_slice(explode(' ', $Blogs->text), 0, 50));
			
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $Blogs->client_name;
				$row[] = $Blogs->company_name;
				$row[] = $img;
				$row[] = $video_btn;
				$row[] = $trimmed_text;
				$row[] = $Blogs->categories;
				$row[] = $Blogs->brand;
				$row[] = $home;
				$row[] = $Blogs->order_no;
				$row[] = $Blogs->created_date;
				$row[] = "<div class='btn-group'>".$status.$edit."</div>";
				$data[] = $row;
		}

		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Testimonial->count_all(),
				"recordsFiltered" => $this->Testimonial->count_filtered(),
				"data" => $data,
		);
		echo json_encode($output);
}
	
    function newsroom_list(){
        $this->load->model('superadmin/Newsroom_Model','Newsroom');
        $list = $this->Newsroom->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Blogs) {
            if ($Blogs->status == 1){
                $status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
            }else{
                $status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_newsroom?id='.$Blogs->id)."'>Edit</a>";
			$route_url = '';
            if ($Blogs->is_url_route == 1){
            	$route_url = '<a class="btn btn-sm btn-primary" target="_blank" href="'.$Blogs->route_url.'">URL</a>';
			}
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Blogs->title;
            $row[] = "<img width='150px' src='".base_url($Blogs->image)."'/>";
            $row[] = $Blogs->author;
            $row[] = $Blogs->news_date;
            $row[] = $route_url;
            $row[] = $Blogs->order_no;
            $row[] = $Blogs->created_date;
            $row[] = "<div class='btn-group'>".$status.$edit."</div>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Newsroom->count_all(),
            "recordsFiltered" => $this->Newsroom->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function gst_notification_list(){
        $this->load->model('superadmin/GSTNotification_Model','GSTNotification');
        $list = $this->GSTNotification->get_datatables();
        $data = array();
        $no = $_POST['start'];				
        foreach ($list as $Blogs) {
            if ($Blogs->status == 1){
                $status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
            }else{
                $status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_report_policies?id='.$Blogs->id)."'>Edit</a>";
						$video_btn = '';
						if($Blogs->pdf){
							$pdf = "<a class='btn btn-sm btn-danger' target='_blank' href='".base_url(''.$Blogs->pdf)."' >pdf</a>";
						}else{
							$pdf = "";
						}
				
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $Blogs->type;
            $row[] = $Blogs->document_name;
            $row[] = $pdf;
            $row[] = $Blogs->document_date;
            $row[] = $Blogs->order_no;
            $row[] = $Blogs->created_date;
            $row[] = "<div class='btn-group'>".$status.$edit."</div>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->GSTNotification->count_all(),
            "recordsFiltered" => $this->GSTNotification->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function speakers_list(){
        $this->load->model('superadmin/Speakers_Model','Speakers');
        $list = $this->Speakers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $speakers) {
            if ($speakers->status == 1){
                $status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
            }else{
                $status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_speaker?id='.$speakers->id)."'>Edit</a>";
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $speakers->name;
            $row[] = $speakers->company;
            $row[] = $speakers->designation;
            $row[] = "<img width='90px' src='".base_url($speakers->photo)."'/>";
            $row[] = $speakers->created_date;
            $row[] = "<div class='btn-group'>".$status.$edit."</div>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Speakers->count_all(),
            "recordsFiltered" => $this->Speakers->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

	function webinars_list(){
		$this->load->model('superadmin/Webinars_Model','Webinars');
		$list = $this->Webinars->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Webinars) {
			if ($Webinars->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_webinar?id='.$Webinars->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $Webinars->title;
			$row[] = "<img width='90px' src='".base_url($Webinars->image_small)."' alt='icon'/>";
			$row[] = $Webinars->date;
			$row[] = $Webinars->from_time;
			$row[] = $Webinars->to_time;
			$row[] = $Webinars->duration . ' minutes';
			$row[] = $Webinars->speakers;
			$row[] = $Webinars->order_no;
			$row[] = $Webinars->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Webinars->count_all(),
			"recordsFiltered" => $this->Webinars->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function investors_category(){
		$this->load->model('superadmin/Investorscategory_Model','Investorscategory');
		$list = $this->Investorscategory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Investorscategory) {
			if ($Investorscategory->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_investors_category?id='.$Investorscategory->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $Investorscategory->name;
			$row[] = $Investorscategory->order_no;
			$row[] = $Investorscategory->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Investorscategory->count_all(),
			"recordsFiltered" => $this->Investorscategory->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function investors_list(){
		$this->load->model('superadmin/Investors_Model','Investors');
		$list = $this->Investors->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Investors) {
			if ($Investors->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_investors?id='.$Investors->id)."'>Edit</a>";
			$file = '';
			if (!empty($Investors->link)){
				$file = '<a class="btn btn-sm btn-primary" target="_blank" href="'.base_url($Investors->link).'">URL</a>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $Investors->title;
			$row[] = $Investors->name;
			$row[] = $file;
			$row[] = $Investors->order_no;
			$row[] = $Investors->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Investors->count_all(),
			"recordsFiltered" => $this->Investors->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function careers_department(){
		$this->load->model('superadmin/CareersDepartment_Model','CareersDepartment');
		$list = $this->CareersDepartment->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $CareersDepartment) {
			if ($CareersDepartment->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_careers_department?id='.$CareersDepartment->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $CareersDepartment->name;
			$row[] = $CareersDepartment->order_no;
			$row[] = $CareersDepartment->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->CareersDepartment->count_all(),
			"recordsFiltered" => $this->CareersDepartment->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function careers_list(){
		$this->load->model('superadmin/Careers_Model','Careers');
		$list = $this->Careers->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Careers) {
			if ($Careers->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_careers?id='.$Careers->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $Careers->job_name;
			$row[] = $Careers->experience;
			$row[] = $Careers->no_of_vacancy;
			$row[] = $Careers->name;
			$row[] = $Careers->location;
			$row[] = $Careers->order_no;
			$row[] = $Careers->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Careers->count_all(),
			"recordsFiltered" => $this->Careers->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function faq_Category_list(){
		$this->load->model('superadmin/FaqCategory_Model','FaqCategory');
		$list = $this->FaqCategory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $FaqCategory) {
			if ($FaqCategory->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_faq_category?id='.$FaqCategory->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $FaqCategory->name;
			$row[] = $FaqCategory->order_no;
			$row[] = $FaqCategory->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->FaqCategory->count_all(),
			"recordsFiltered" => $this->FaqCategory->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function faq_list(){
		$this->load->model('superadmin/Faq_Model','faqs');
		$list = $this->faqs->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $faqs) {
			if ($faqs->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_faq?id='.$faqs->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $faqs->question;
			$row[] = $faqs->name;
			$row[] = $faqs->answer;
			$row[] = $faqs->order_no;
			$row[] = $faqs->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->faqs->count_all(),
			"recordsFiltered" => $this->faqs->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function ricoh_slider(){
		$this->load->model('superadmin/Ricoh_Slider_Model','Homebanner');
		$list = $this->Homebanner->get_datatables();
//		echo '<pre>';print_r($list);exit();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $banners) {
			if ($banners->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/edit_ricoh_slider?id='.$banners->id)."'>Edit</a>";
			$img = "<img width='150px' src='".base_url($banners->image)."'/>";

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $banners->title;
			$row[] = $img;
			$row[] = $banners->image_alt;
			$row[] = $banners->routing_url ? '<a class="btn btn-sm btn-primary" target="_blank" href="'.$banners->routing_url.'">URL</a>' : 'N/A';
			$row[] = $banners->form_dropdown ? $banners->form_dropdown : 'N/A';
			$row[] = $banners->order_no;
			$row[] = $banners->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Homebanner->count_all(),
			"recordsFiltered" => $this->Homebanner->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function form_dropdown(){
		$this->load->model('superadmin/Form_Dropdown','form');
		$list = $this->form->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $form) {
			if ($form->status == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<button class='btn btn-dark btn-square waves-effect waves-button waves-light update' name='update' id='".$form->id."'>Edit</button>";

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $form->title;
			$row[] = $form->order_no;
			$row[] = $form->created_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->form->count_all(),
			"recordsFiltered" => $this->form->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

//	Offers ------------------------------------

	function offers_category(){
		$this->load->model('superadmin/OffersCategory_Model','OffersCategory');
		$list = $this->OffersCategory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $OffersCategory) {
			if ($OffersCategory->is_active == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/manage_offers_categories?id='.$OffersCategory->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $OffersCategory->category_name;
			$row[] = $OffersCategory->order_no;
			$row[] = $OffersCategory->create_date;
			$row[] = $OffersCategory->update_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->OffersCategory->count_all(),
			"recordsFiltered" => $this->OffersCategory->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function offers_list(){
		$this->load->model('superadmin/Offers_Model','offers');
		$list = $this->offers->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $offers) {
			if ($offers->is_active == 1){
				$status = "<button class='btn btn-success btn-square waves-effect waves-button waves-light'>Enabled</button>";
			}else{
				$status = "<button class='btn btn-danger btn-square waves-effect waves-button waves-light'>Disabled</button>";
			}
			$edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/manage_offer?id='.$offers->id)."'>Edit</a>";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $offers->offer_title;
			$row[] = $offers->category_name;
			$row[] = $offers->offer_desc;
			$row[] = '<img src="'.base_url($offers->img_thumb).'" alt="'.$offers->offer_image_alt.'" class="img-thumbnail">';
			$row[] = $offers->route_url?$offers->route_url:'N/A';
//			$row[] = $offers->show_on_home;
			$row[] = $offers->order_no;
			$row[] = $offers->create_date;
			$row[] = $offers->update_date;
			$row[] = "<div class='btn-group'>".$status.$edit."</div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->offers->count_all(),
			"recordsFiltered" => $this->offers->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	
	function Contact_list(){
		$this->load->model('superadmin/Form_Model','Contact');
		$list = $this->Contact->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Blogs) {				
				$contact = $Blogs->country_code ."-" . $Blogs->u_mobile;
				$event = $Blogs->event. " - " . $Blogs->subEvent;
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $Blogs->u_name;
				$row[] = $contact;
				$row[] = $Blogs->u_email;
				$row[] = $Blogs->location;
				$row[] = $Blogs->date;
				$row[] = $Blogs->number;
				$row[] = $event;
				$row[] = $Blogs->created_date;
				$data[] = $row;
		}

		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Contact->count_all(),
				"recordsFiltered" => $this->Contact->count_filtered(),
				"data" => $data,
		);
		echo json_encode($output);
}
}
?>