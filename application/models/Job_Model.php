<?php


class Job_Model extends CI_Model
{
	function fetch_data($query,$job_location)
	{
		$this->db->select("c.*,cj.city_name,cd.name,(SELECT GROUP_CONCAT(city_name SEPARATOR ' | ') as location FROM careers_job_location WHERE careers_id = c.id) as 'location'");
		$this->db->from("careers c");
		if($query != '')
		{
			$this->db->like('c.job_name', $query);
			$this->db->or_like('c.experience', $query);
			$this->db->or_like('c.job_description', $query);
			$this->db->or_like('c.no_of_vacancy', $query);
			$this->db->or_like('cj.city_name ', $query);
			$this->db->or_like('cd.name', $query);
		}
		if($job_location != '')
		{
			$this->db->where('cj.city_name', $job_location);
		}
		$this->db->group_by('c.id');
		$this->db->order_by('c.order_no', 'DESC');
		$this->db->join('careers_job_location cj','cj.careers_id = c.id','left');
		$this->db->join('careers_department cd','cd.id = c.department_id','left');
		return $this->db->get();
//		echo $this->db->last_query();exit();
	}


	function faq_data($query)
	{
		if($query != '')
		{
			$this->db->like('fs.question', $query);
			$this->db->or_like('fs.answer', $query);
			$this->db->or_like('f.name', $query);
		}
		$this->db->group_by('f.id');
		$this->db->select('f.*');
		$this->db->where(array('f.status' => 1));
		$this->db->order_by('f.order_no','asc');
		$this->db->join('faqs fs','fs.faq_id = f.id','left outer');
		$query = $this->db->get("faq_category f");
		$faqlists = $query->result_array();
		foreach ($faqlists as $key => $faqlist){
			$this->db->select('fs.*');
			$this->db->order_by('fs.order_no','asc');
			$this->db->where(array('fs.status' => 1,'fs.faq_id' => $faqlist['id']));
			$faqs = $this->db->get("faqs fs");
			$faqlists[$key]['faqs'] = $faqs->result_array();
		}
		return $faqlists;
	}
}
