<?php


class Vows_vachan_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'submit_house_of_vivah shov';
	var $column_order = array(null, 'shov.u_name','shov.u_email','shov.u_mobile','shov.location','shov.date','shov.venue','shov.event'); //set column field database for datatable orderable
	var $column_search = array( 'shov.u_name','shov.u_email','shov.u_mobile','shov.location','shov.date','shov.venue','shov.event'); 

	private function _get_datatables_query()
	{	
    
    $this->db->select('shov.*');
		$this->db->from($this->table);
		$this->db->group_by('shov.id');
		$this->db->where('shov.enquiry_for', 'Vows Vachan');
    $this->db->order_by('shov.id', 'DESC');

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
    $this->db->where('shov.enquiry_for', 'Vows Vachan');
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
