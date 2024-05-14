<?php
$CI =& get_instance();
$query = $CI->db->get('site_config');
$ret = $query->row();
$page['page_title'] = $page_title.' - '.$ret->site_title;
$page['sitename'] = $ret->site_name;
$page['logo'] = $ret->logo_img;
?>
<?php
$this->load->view('superadmin/layout/head',$page);
$this->load->view('superadmin/layout/header',$page);
$this->load->view('superadmin/layout/sidebar');
$this->load->view('superadmin/'.$middle_content);
$this->load->view('superadmin/layout/footer');
?>
