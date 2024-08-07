<?php


class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Banner_Model','banner');
		$this->load->model('superadmin/BlogsCategory_Model','BlogsCategory');
	}

	function banner(){
		$list = $this->banner->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $banners) {
			if ($banners->status == 1){
				$status = "<button data-id=".$banners->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
			}else{
					$status = "<button data-id=".$banners->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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

	function blogs_category(){
		$list = $this->BlogsCategory->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $BlogsCategory) {
			if ($BlogsCategory->status == 1){
				$status = "<button data-id=".$BlogsCategory->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
			}else{
					$status = "<button data-id=".$BlogsCategory->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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
				$status = "<button data-id=".$Blogs->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
			}else{
					$status = "<button data-id=".$Blogs->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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
						$status = "<button data-id=".$Blogs->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
					}else{
							$status = "<button data-id=".$Blogs->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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
					$status = "<button data-id=".$BlogsCategory->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
				}else{
						$status = "<button data-id=".$BlogsCategory->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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
				$status = "<button data-id=".$Blogs->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
			}else{
					$status = "<button data-id=".$Blogs->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
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
	

    function gst_notification_list(){
        $this->load->model('superadmin/GSTNotification_Model','GSTNotification');
        $list = $this->GSTNotification->get_datatables();
        $data = array();
        $no = $_POST['start'];				
        foreach ($list as $Blogs) {
            if ($Blogs->status == 1){
                $status = "<button data-id=".$Blogs->id." class='btn btn-success btn-square waves-effect waves-button waves-light enabled-disabled'>Enabled</button>";
            }else{
                $status = "<button data-id=".$Blogs->id." class='btn btn-danger btn-square waves-effect waves-button waves-light enabled-disabled'>Disabled</button>";
            }
            $edit = "<a class='btn btn-dark btn-square waves-effect waves-button waves-light' href='".base_url('superadmin/administrator/add_edit_report_policies?id='.$Blogs->id)."'>Edit</a>";
						$video_btn = '';
						if($Blogs->pdf){
							$pdf = "<a class='btn btn-sm btn-danger' target='_blank' href='".base_url(''.$Blogs->pdf)."' >pdf</a>";
						}else{
							$pdf = "";
						}
						if ($Blogs->type == 1){
							$type = "Company Internal Policy";
						}else if ($Blogs->type == 2){
							$type = "Investor Relation";
						}else{
							$type = "";
						}
				
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $type;
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
		
		function Contact_list(){
			$this->load->model('superadmin/Contact_Model','Contact');
			$list = $this->Contact->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $Blogs) {				
					$contact = $Blogs->country_code ."-" . $Blogs->u_mobile;
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $Blogs->u_name;
					$row[] = $contact;
					$row[] = $Blogs->u_email;
					$row[] = $Blogs->companyname;
					$row[] = $Blogs->designation;
					$row[] = $Blogs->enquiry_for;
					$row[] = $Blogs->location;
					$row[] = $Blogs->date;
					$row[] = $Blogs->number;
					$row[] = $Blogs->event;
					$row[] = $Blogs->subEvent;
					$row[] = $Blogs->venue;
					$row[] = $Blogs->eventType;
					$row[] = $Blogs->artistRequirement;
					$row[] = $Blogs->occupation;
					$row[] = $Blogs->franchiseType;
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