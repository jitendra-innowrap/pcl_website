<?php


class Offers_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'offers o';
	var $column_order = array(null, 'o.offer_title','oc.category_name','o.offer_desc','o.img_thumb','o.show_on_home','o.route_url','o.order_no', 'o.create_date','o.update_date','o.is_active'); //set column field database for datatable orderable
	var $column_search = array('o.offer_title','oc.category_name','o.offer_desc','o.img_thumb','o.show_on_home','o.route_url','o.order_no','o.create_date','o.update_date','o.is_active'); //set column field database for datatable searchable
	var $order = array('o.id' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select("o.id,o.offer_title,o.offer_desc,o.img_thumb,o.order_no,o.create_date,o.update_date,o.is_active,o.offer_image_alt,oc.category_name,IF(o.show_on_home=1,'YES','NO') as show_on_home,o.route_url");
		$this->db->join('offers_categories oc','oc.id=o.offers_categories_id','left');
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
