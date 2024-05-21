<?php


class GSTNotification_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'gst_notification n';
	var $column_order = array(null, 'n.type','n.document_name','n.pdf','n.document_date','n.order_no','n.status'); //set column field database for datatable orderable
	var $column_search = array('n.type','n.document_name','n.pdf','n.document_date','n.order_no','n.status'); //set column field database for datatable searchable
	var $order = array('n.order_id' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('n.id,n.type,n.document_name,n.pdf,n.document_date,n.order_no,n.status,n.created_date');
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function get_categories_by_type($type_id) {
		
		$data = $this->db->select('policy_report_category.id as category_id,policy_report_category.name as category_name',null,false)
			->where('policy_report_category.type_id',$type_id)
			->where('policy_report_category.status',1)
			->get('policy_report_category')->result_array();
			if($data)
			{
				return $data; 
			}
			else
			{
				return [];
			}
	}
	
	public function add_category($type_id, $name) {
		$data = [
				'type_id' => $type_id,
				'name' => $name,
				'status' => 1
		];
		$this->db->insert('policy_report_category', $data);
		return $this->db->insert_id();
	}
	
	public function get_sub_categories_by_type_category($type_id, $category_id) {
		
		$data = $this->db->select('policy_report_sub_category.id as sub_category_id,policy_report_sub_category.name as sub_category_name',null,false)
			->where('policy_report_sub_category.type_id',$type_id)
			->where('policy_report_sub_category.category_id',$category_id)
			->where('policy_report_sub_category.status',1)
			->get('policy_report_sub_category')->result_array();
			if($data)
			{
				return $data; 
			}
			else
			{
				return [];
			}
	}
	
	public function add_sub_category($type_id, $category_id, $name) {
		$data = [
				'type_id' => $type_id,
				'category_id' => $category_id,
				'name' => $name,
				'status' => 1
		];
		$this->db->insert('policy_report_sub_category', $data);
		return $this->db->insert_id();
	}
	
	public function get_sub_categories_2_by_type_category($type_id, $category_id, $sub_category_id) {
		
		$data = $this->db->select('policy_report_sub_category_2.id as sub_category_2_id,policy_report_sub_category_2.name as sub_category_2_name',null,false)
			->where('policy_report_sub_category_2.type_id',$type_id)
			->where('policy_report_sub_category_2.category_id',$category_id)
			->where('policy_report_sub_category_2.sub_category_id',$sub_category_id)
			->where('policy_report_sub_category_2.status',1)
			->get('policy_report_sub_category_2')->result_array();
			if($data)
			{
				return $data; 
			}
			else
			{
				return [];
			}
	}

	public function add_sub_category_2($type_id, $category_id, $sub_category_id, $name) {
		$data = [
				'type_id' => $type_id,
				'category_id' => $category_id,
				'sub_category_id' => $sub_category_id,
				'name' => $name,
				'status' => 1
		];
		$this->db->insert('policy_report_sub_category_2', $data);
		return $this->db->insert_id();
	}
	
}
