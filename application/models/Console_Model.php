<?php
class Console_Model extends CI_Model
{	  
  public function get_blog_list( $search, $start, $length)
  {
    if ($length != -1)
        $this->db->limit($length, ($start * $length));
    if ($search !== NULL) {
        $i = 0;
        $column_search = ["b.blog_date", "bc.name", "b.slug", "b.author", "b.content"];
        foreach ($this->column_search as $item) // loop column
        {
            if ($i === 0) // first loop
            {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $search);
            } else {
                $this->db->or_like($item, $search);
            }

            if (count($this->column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            $i++;
        }
    }
        
    $this->db->select('b.image,b.image_alt,b.image_large,b.image_medium,b.blog_date,GROUP_CONCAT(bc.name SEPARATOR ", ") as categories,b.order_no,b.slug,b.title,SUBSTRING_INDEX(b.content, " ", 65) as content,b.author');
    $this->db->where('b.status', 1);
    $this->db->order_by('b.order_no', 'asc');
    $this->db->group_by('b.id');
    $this->db->join('blogs_multi_category bmc', 'bmc.blog_id = b.id', 'left');
    $this->db->join('blog_category bc', 'bc.id = bmc.category_id', 'left');
    return $this->db->get("blogs b")->result_array();
  }
  
  public function blog_list_count_all()
  {
      $this->db->from("blogs");
      $this->db->where('status', 1);
      return $this->db->count_all_results();
  }
  
  public function get_blog_details($slug) {
    $this->db->select('blogs.id');
    $this->db->where('blogs.slug', $slug);
    $id_query = $this->db->get("blogs");

    if ($id_query->num_rows() > 0) {
        $id = $id_query->row()->id;

        $this->db->select('b.*, GROUP_CONCAT(bc.name SEPARATOR ", ") as categories');
        $this->db->from('blogs b');
        $this->db->where('b.status', 1);
        $this->db->where('b.id', $id);
        $this->db->join('blogs_multi_category bmc', 'bmc.blog_id = b.id', 'left');
        $this->db->join('blog_category bc', 'bc.id = bmc.category_id', 'left');
        $this->db->group_by('b.id'); // Ensure proper grouping when using GROUP_CONCAT

        $result = $this->db->get()->row_array();
        // Uncomment the line below for debugging purposes
        // echo $this->db->last_query(); exit();

        return $result;
    } else {
        return false;
    }
  }

}
?>