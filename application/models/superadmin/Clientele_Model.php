<?php


class Clientele_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'clientele c';
	var $column_order = array(null, 'c.name','c.logo','c.logo_alt','c.home_page','c.h_order_no','c.created_date','c.status'); //set column field database for datatable orderable
	var $column_search = array('c.name','c.logo','c.logo_alt','c.home_page','c.h_order_no','c.created_date','c.status'); //set column field database for datatable searchable
	var $order = array('c.id' => 'asc'); // default order

	private function _get_datatables_query()
	{
//		$this->db->join('product_clientele pc','pc.clientele_id = c.id','left outer');
		$this->db->select("c.id,c.name,c.logo,c.logo_alt,c.home_page,c.product_page as is_product_page,c.h_order_no,c.status,c.created_date,(SELECT GROUP_CONCAT( product_page SEPARATOR ', ') as 'product_page' FROM product_clientele WHERE clientele_id = c.id) as product_page,(SELECT order_no FROM product_clientele WHERE clientele_id = c.id LIMIT 1) as p_order_no");
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
}
