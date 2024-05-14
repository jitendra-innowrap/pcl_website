<?php

class CI_MasterModel extends CI_Model {

    function __construct() {
        parent::__construct();
        /* Setting max excetion time to infinite. */
        ini_set('max_execution_time', 0);
        /* Setting max memory to infinite. */
        ini_set('memory_limit', '-1');
        /* Setting max memory to 2048 MB. */
        ini_set('memory_limit', '2048M');
        /* Loading custom crypto Library from Library folder. */
        define( 'API_ACCESS_KEY', 'AIzaSyAmP08O72V_LYM-uQYjFxAUSW3omDOx0Mc');
        $this->load->library('CryptoHelper');
    }

    /* ECHO LAST QUERY */

    public function last_query() {
        echo $this->db->last_query();
        exit;
    }

    public function getRecordCount($tbl_name, $condition = FALSE, $select = FALSE) {
        if ($select != "") {
            $this->db->select($select);
        }
        if (is_array($condition) && $condition != "" && count($condition) > 0) {
            foreach ($condition as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        $num = $this->db->count_all_results($tbl_name);
        return $num;
    }

    /*
      # function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$limit=FALSE,$start=FALSE)
      # * indicates paramenter is must
      # Use :
      1) return array of records from table
      # Parameters :
      1) $tbl_name* =name of table
      2) $condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
      3) $select=('col1,col2,col3');
      4) $order_by=array('colname1'=>order,'colname2'=>order); Order='ASC OR DESC'
      5) $limit= limit for paging
      6) $start=start for paging

      # How to call:
      $this->master_model->getRecords('tbl_name',$condition_array,$select,...);

      # In case where we need joins, you can pass joins in controller also.
      Ex:
      $this->db->join('tbl_nameB','tbl_nameA.col=tbl_nameB.col','left');
      $this->master_model->getRecords('tbl_name',$condition_array,$select,...);

      # Instruction
      1) check number of counts in controller or where you are displying records

     */

    public function getRecords($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE) {
        if ($select != "") {
            $this->db->select($select);
        }
        if (is_array($condition) && count($condition) > 0 && $condition != "") {
            $condition = $condition;
        } else {
            $condition = array();
        }
        if (is_array($order_by) && count($order_by) > 0 && $order_by != "") {
            foreach ($order_by as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }
        if ($limit != "" || $start != "") {
            $this->db->limit($limit, $start);
        }

        $rst = $this->db->get_where($tbl_name, $condition);
        return $rst->result_array();
    }

    public function insertRecord($tbl_name, $data_array, $insert_id = FALSE) {
        if ($this->db->insert($tbl_name, $data_array)) {
            if ($insert_id == true) {
                return $this->db->insert_id();
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /*
      # function updateRecord($tbl_name,$data_array,$pri_col,$id)
      # * indicates paramenter is must
      # Use :
      1) updates record, on successful updates return true.
      # Parameters :
      1) $tbl_name* = name of table
      2) $data_array* = array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
      3) $pri_col* = primary key or column name depending on which update query need to fire.
      4) $id* = primary column or condition column value.

      # How to call:
      $this->master_model->updateRecord('tbl_name',$data_array,$pri_col,$id)
     */

    public function updateRecord($tbl_name, $data_array, $where_arr) {
        $this->db->where($where_arr, NULL);
        if ($this->db->update($tbl_name, $data_array)) {
            return true;
        } else {
            return false;
        }
    }

    /*
      # function deleteRecord($tbl_name,$pri_col,$id)
      # * indicates paramenter is must
      # Use :
      1) delete record from table, on successful deletion returns true.
      # Parameters :
      1) $tbl_name* = name of table
      2) $pri_col* = primary key or column name depending on which update query need to fire.
      3) $id* = primary column or condition column value.

      # How to call:
      $this->master_model->deleteRecord('tbl_name','pri_col',$id)
      # It will useful while deleting record from  single table. delete join will not work here.
     */

    public function deleteRecord($tbl_name, $pri_col, $id) {
        $this->db->where($pri_col, $id);
        if ($this->db->delete($tbl_name)) {
            return true;
        } else {
            return false;
        }
    }

    /*
      # function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
      # * indicates paramenter is must
      # Use :
      1) create thumb of uploaded image.
      # Parameters :
      1) $file_name* = name of uploaded file
      2) $path* = path of directory
      3) $width* = width of thumb
      4) $height* = height of thumb
      5) $maintain_ratio = if need to maintain ration of original image then pass true, in this case thumb may vary in
      height and width provided. default it is FALSE.

      # How to call:
      $this->master_model->createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)

      # !!Important : thumb foler  name must be 'thumb'
     */

    public function createThumb($file_name, $path, $width, $height, $maintain_ratio = FALSE) {
        $config_1['image_library'] = 'gd2';
        $config_1['source_image'] = $path . $file_name;
        $config_1['create_thumb'] = TRUE;
        $config_1['maintain_ratio'] = $maintain_ratio;
        $config_1['thumb_marker'] = '';
        $config_1['new_image'] = $path . "thumb/" . $file_name;
        $config_1['width'] = $width;
        $config_1['height'] = $height;
        $this->load->library('image_lib', $config_1);
        $this->image_lib->initialize($config_1);
        $this->image_lib->resize();

        if (!$this->image_lib->resize())
            echo $this->image_lib->display_errors();
    }

    public function upload($imagePost, $path = FALSE) {
        //print_r($imagePost);exit;
        $config['upload_path'] = './uploads/' . $path . '/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data['code'] = 0;
        if (!$this->upload->do_upload($imagePost)) {
            $error = array('error' => $this->upload->display_errors());
            $data['msg'] = 'file not uploaded';
            return $data;
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $image_path = base_url() . "uploads/" . $path . '/' . $this->upload->data()["file_name"];

            $data['code'] = 1;
            $data['img_url'] = $image_path;
            return $data;
        }
    }

    public function video_upload($imagePost, $path = FALSE) {
        //print_r($imagePost);exit;
        $config['upload_path'] = './uploads/' . $path . '/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data['code'] = 0;
        if (!$this->upload->do_upload($imagePost)) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);exit;
            $data['msg'] = 'file not uploaded';
            return $data;
        } else {
            $data1 = array('upload_data' => $this->upload->data());
            $image_path = base_url() . "uploads/" . $path . '/' . $this->upload->data()["file_name"];

            $data['code'] = 1;
            $data['img_url'] = $image_path;
            return $data;
        }
    }

    public function multiImageUpload($userfile,$path) {
        //echo "<pre>";print_r($_FILES);exit;
        $name_array = array();
        if(!empty($_FILES['userfile']['name'])){
            $count = count($_FILES['userfile']['size']);
            $ext = $this->LoginModel->validate_image($_FILES['userfile']);
            if ($ext == true) {
            foreach($_FILES as $key=>$value){
              if($key !== 'videos' && $key !== 'user_photo'){
                for($s=0; $s<=$count-1; $s++) {
                    /*$_FILES['userfile']['name']= $value['name'][$s];
                    $_FILES['userfile']['type']    = $value['type'][$s];
                    $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['userfile']['error']       = $value['error'][$s];
                    $_FILES['userfile']['size']    = $value['size'][$s];   
                    $config['upload_path'] = './uploads/' . $path . '/';

                    $config['allowed_types'] = 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    $this->upload->do_upload();
                    $data = $this->upload->data();
                    $name_array[] = base_url() . "uploads/" . $path . '/' . $data['file_name'];*/

                    $this->load->library('aws3');
                    $name_array[] = $this->aws3->sendFileWithPath('kaampe', $_FILES['userfile']['name'][$s], $_FILES['userfile']['tmp_name'][$s], $path);
                    }
              }
            }
            $data['code'] = 1;
            $data['msg'] = 'success';
            //echo "<pre>";print_r($name_array);
            $data['img_url'] = $name_array;
        }
        else {
            $data['code'] = 0;
            $data['msg'] = 'check file type';
        }
    }
    else {
            $data['code'] = 0;
            $data['msg'] = 'file not found';
        }
        return $data;
}

public function multiImageUploadForBio($userfile,$path) {
        //echo "<pre>";print_r($_FILES);exit;
        $name_array = array();
        if(!empty($_FILES['userfile']['name'])){
            $count = count($_FILES['userfile']['size']);
            $ext = $this->LoginModel->validate_image($_FILES['userfile']);
            if ($ext == true) {
            foreach($_FILES as $key=>$value){
              if($key == 'userfile'){
                for($s=0; $s<=$count-1; $s++) {
                    /*$_FILES['userfile']['name']= $value['name'][$s];
                    $_FILES['userfile']['type']    = $value['type'][$s];
                    $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                    $_FILES['userfile']['error']       = $value['error'][$s];
                    $_FILES['userfile']['size']    = $value['size'][$s];   
                    $config['upload_path'] = './uploads/' . $path . '/';

                    $config['allowed_types'] = 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    $this->upload->do_upload();
                    $data = $this->upload->data();
                    $name_array[] = base_url() . "uploads/" . $path . '/' . $data['file_name'];*/

                    $this->load->library('aws3');
                    $name_array[] = $this->aws3->sendFileWithPath('kaampe', $_FILES['userfile']['name'][$s], $_FILES['userfile']['tmp_name'][$s], $path);
                    }
              }
            }
            $data['code'] = 1;
            $data['msg'] = 'success';
            //echo "<pre>";print_r($name_array);
            $data['img_url'] = $name_array;
        }
        else {
            $data['code'] = 0;
            $data['msg'] = 'check file type';
        }
    }
    else {
            $data['code'] = 0;
            $data['msg'] = 'file not found';
        }
        return $data;
}

public function multiVideoUpload($videos,$path) {
    $errors = array();
    $name_array = array();
    $media_thumbnail = array();
    if(!empty($_FILES['videos']['name'])){
        $ext = $this->LoginModel->validate_video($_FILES['videos']);
        if ($ext == true) {
                for($i=0; $i<count($_FILES['videos']['name']); $i++) {
                    $media_thumbnail_name = $_SERVER['DOCUMENT_ROOT']."/kaampe/uploads/sampleFile/".time()."thumbnail.jpg";
                    $allowed =  array('mp4','MP4');
                    $ext = pathinfo($_FILES['videos']['name'][$i], PATHINFO_EXTENSION);
                    /*if(!in_array($ext,$allowed)) 
                    {
                        $errors[] = "Invalid fiel extension.";
                    }*/
                    if(empty($errors))
                    {
                        /*$path_parts = pathinfo($_FILES["videos"]["name"][$i]);
                        $image_path = $path_parts['filename'].'.'.$path_parts['extension'];
                        $newFilePath = $_SERVER['DOCUMENT_ROOT'] .'/kaampe_dev/uploads/' . $path . '/'.$image_path;*/

                        $this->load->library('aws3');
                        $name_array[] = $this->aws3->sendFileWithPath('kaampe', $_FILES['videos']['name'][$i], $_FILES['videos']['tmp_name'][$i], $path);

                        $media_thumbnail[] = $this->getUrlToImage($_FILES["videos"]["tmp_name"][$i],$path,$media_thumbnail_name);
                        if(is_array($media_thumbnail) && count($media_thumbnail)>0){
                            unlink($media_thumbnail_name);
                        }
                        /*$name_array[] = base_url() . "uploads/" . $path . '/' . $image_path;
                        if(move_uploaded_file($_FILES["videos"]["tmp_name"][$i], $newFilePath)){
                            //Handle other code here
                        }*/
                    }
                    else
                    {
                        print_r($errors);
                    }
                }
                if(empty($errors)){
                    $data['code'] = 1;
                    $data['msg'] = 'success';
                    $data['video_url'] = $name_array;
                    $data['media_thumbnail_url'] = $media_thumbnail;
                }
            }else {
            $data['code'] = 0;
            $data['msg'] = 'check file type';
        }
    }else{
        $data['code'] = 0;
        $data['msg'] = 'file not found';
    }
    return $data;
}

    public function create_slug($phrase, $tbl_name, $title_col, $pri_col = '', $id = '', $maxLength = 100000000000000) {
        $result = strtolower($phrase);
        $result = preg_replace("/[^A-Za-z0-9\s-._\/]/", "", $result);
        $result = trim(preg_replace("/[\s-]+/", " ", $result));
        $result = trim(substr($result, 0, $maxLength));
        $result = preg_replace("/\s/", "-", $result);
        $slug = $result;
        if ($id != "") {
            $this->db->where($pri_col . ' !=', $id);
        }
        $rst = $this->db->get_where($tbl_name, array($title_col => $slug));

        if ($rst->num_rows() > 0) {
            $count = $rst->num_rows() + 1;
            return $slug = $slug . $count;
        } else {
            return $slug;
        }
    }

    /* get youtube video image */

    public function video_image($url) {
        $image_url = parse_url($url);
        if ($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com') {
            $array = explode("&", $image_url['query']);
            return "http://img.youtube.com/vi/" . substr($array[0], 2) . "/0.jpg";
        } else if ($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com') {
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . substr($image_url['path'], 1) . ".php"));
            return $hash[0]["thumbnail_large"];
        }
    }

    /* checkDuplicate function is used for checking of record exists in table or not */

    public function checkDuplicate($tableName, $columnName, $condition) {
        $this->db->select($columnName);
        $this->db->where($condition);
        $rst = $this->db->get($tableName);
        if (count($rst->result_array())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sendverification($tableName, $row, $colValue) {
        $sql = 'SELECT ' . $columnName . ' FROM ' . $tableName . ' WHERE ' . $condition . ' ';
        $resSet = $this->db->query($sql);
        $_nor = $resSet->result_array();
        if (count($_nor)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getRandom($strlength) {
        $stringarray = array(0, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'g', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $str = "";
        for ($i = 1; $i <= $strlength; $i++) {
            $str = $str . $stringarray[mt_rand(0, 60)];
        }
        return $str;
    }

    public function isUserExist($tbl_name, $condition = FALSE, $limit = 1) {

        if (is_array($condition) && count($condition) > 0 && $condition != "") {
            $condition = $condition;
        } else {
            $condition = array();
        }
        if ($limit != "" || $start != "") {
            $this->db->limit($limit);
        }
        $rst = $this->db->get_where($tbl_name, $condition);
        $result = $rst->result_array();
        if (is_array($result) && count($result) > 0) 
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getUserRoles($email,$roles=array()){

        if($email)
        {
            $this->db->where('u.email',$email);
        }

        if (is_array($roles) && count($roles)>0) {
            $this->db->where_in('ur.role_id',$roles);
        }

        $this->db->where('u.status',1);
        $this->db->where('ur.status',1);
        $this->db->join('user_roles ur','ur.user_id=u.id','left');
        $result= $this->getRecords('users u');
        if(is_array($result) && count($result)>0){
            return $result;
        }
        return $result;
    }

    public function getPermission($email,$roles=array()){

        if($email)
        {
            $this->db->where('u.email',$email);
        }

        if (is_array($roles) && count($roles)>0) {
            $this->db->where_in('ur.role_id',$roles);
        }

        $this->db->where('u.status',1);
        $this->db->where('ur.status',1);
        $this->db->where('urp.status',1);
        $this->db->where('pg.status',1);
        $this->db->where('pmg.status',1);
        $this->db->where_not_in('pmg.permission_code', array('0'));
        $this->db->join('user_roles ur','ur.user_id=u.id','left');
        $this->db->join('roles r','r.id=ur.role_id','left');
        $this->db->join('user_role_permissions urp','urp.user_role_id=ur.id','left');
        $this->db->join('permission_groups pg','pg.id=urp.permission_group_id','left');
        $this->db->join('permission_module_groups pmg','pmg.permission_group_id=pg.id','left');
        $result = $this->getRecords('users u');
        // $this->last_query();
        if(is_array($result) && count($result)>0){
            return $result;
        }
        return $result;
    }


    public function updatepublishrecord($id, $tablename) {

        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("Y-m-d H:i:s");

        $data['response'] = "failed";
        $where_own = array('id' => $id);
        $result = $this->LoginModel->getRecords($tablename, $where_own);
        if ($result[0]['status'] == "1") {
            $where_own = array('id' => $id);
            $update = array(
                'status' => 2,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "2";
            }
        } else {
            $where_own = array('id' => $id);
            $update = array(
                'status' => 1,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "1";
            }
        }
        return $data;
    }

    public function employerApprovedStatus($id, $tablename) {

        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("Y-m-d H:i:s");

        $data['response'] = "failed";
        $where_own = array('user_id' => $id);
        $result = $this->LoginModel->getRecords($tablename, $where_own);
        //echo $this->db->last_query();exit;
        if ($result[0]['is_approved'] == "1") {
            $where_own = array('id' => $id);
            $update = array(
                'is_approved' => 2,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "2";
            }
        } else {
            $where_own = array('user_id' => $id);
            $update = array(
                'is_approved' => 1,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "1";
            }
        }
        return $data;
    }

    public function benefitsApprovedStatus($id, $tablename) {

        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("Y-m-d H:i:s");

        $data['response'] = "failed";
        $where_own = array('id' => $id);
        $result = $this->LoginModel->getRecords($tablename, $where_own);
        //echo $this->db->last_query();exit;
        if ($result[0]['is_approved'] == "1") {
            $where_own = array('id' => $id);
            $update = array(
                'is_approved' => 2,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "2";
            }
        } else {
            $where_own = array('id' => $id);
            $update = array(
                'is_approved' => 1,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "1";
            }
        }
        return $data;
    }
    public function updatejobstatus($id, $tablename) {

        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("Y-m-d H:i:s");

        $data['response'] = "failed";
        $where_own = array('id' => $id);
        $result = $this->LoginModel->getRecords($tablename, $where_own);
        if ($result[0]['status'] == "2") {
            $where_own = array('id' => $id);
            $update = array(
                'status' => 3,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "3";
            }
        } else {
            $where_own = array('id' => $id);
            $update = array(
                'status' => 2,
            );
            if ($this->LoginModel->updateRecord($tablename, $update, $where_own)) {
                $data['response'] = "success";
                $data['publish'] = "2";
            }
        }
        return $data;
    }

    /* Where $page = page title
      $data = data array */

    public function logCreate($page, $data) {

        if(isset($_SESSION['admin_session']))
        {
            $login_user_name = $_SESSION['admin_session']['username'];
            $admin_id = $_SESSION['admin_session']['admin_id'];
            $this->db->where('id',$admin_id);
            $result = $this->getRecords('users');

            $user_name = $result[0]['name'];
            $user_email = $result[0]['email'];
        }

        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $ip = $_SERVER['REMOTE_ADDR'];
        $message = ' [IP=' . $ipaddress . '] [URI=' . $actual_link . '] [page=' . $page . ']    ';

        if( !empty($login_user_name) )
        {
           $message .= 'login_user_name: '.$login_user_name.'     ';
        }
        if( !empty($company_name) )
        {
           $message .= 'company_name: '.$user_name .'     ';
        }
        if( !empty($user_email) )
        {
           $message .= 'user_email: '.$user_email .'     ';
        }

        if (!empty($data)) {
            $message .= 'POST: ' . json_encode($data);
        }
        log_message('custom', $message, TRUE);
    }

    /*
    	$lastid=00001;
        $startwith="INNO";
        return INNO00002
    */
   public function autoicrementid($startwith,$lastid)
   {
           $sid=str_replace($startwith, '', $lastid);
           return $id = $startwith . str_pad($sid + 1, 5, 0, STR_PAD_LEFT);
   }

    public function sendEMail($to, $msg, $sub) {
        $from_email = "varsha@innowrap.com";
        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1',
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'varsha@innowrap.com', // change it to yours
            'smtp_pass' => '7600245984', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => "\r\n"
        );
        $message = $msg;
        $this->email->initialize($config);
        $this->email->from($from_email);
        $this->email->to("$to");
        $this->email->subject($sub);
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }

    public function sendSMS($mobile, $msg) {
        //$url = "http://sms6.routesms.com:8080/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination=$mobile&source=KAAMPE&message=" . urlencode($msg);

        $url = "https://sms6.rmlconnect.net/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination=$mobile&source=KAAMPE&message=" . urlencode($msg);
        echo $url;exit;
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
    }

    public function validate_image($image) 
    {
        //echo "<pre>";print_r($image);exit;
        //$mimetype = mime_content_type($image['tmp_name']);
        //echo "<pre>";print_r($mimetype);exit;
        $check = TRUE;
        if(!isset($image)){
            echo "file checked";
            return false;
        }
        if (is_array($image['size'])) {
            foreach ($image['size'] as $key => $value) {
                if ($value ==0) {
                    return false;
                }
            }
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            foreach ($image['tmp_name'] as $key => $value) {
                if (!in_array(exif_imagetype($value), $allowedTypes)) {
                    return false;
                }
            }
            foreach ($image['tmp_name'] as $key => $value) {
                if (filesize($value) > 2000000) {
                    return false;
                }
            }
            foreach ($image['name'] as $key => $value) {
                if (!in_array(pathinfo($value, PATHINFO_EXTENSION), $allowedExts)) {
                    return false;
                }
            }
        }else if ((!isset($image)) || $image['size'] == 0) 
        {
            $check = FALSE;
        }
        else if (isset($image) && $image['size'] != 0) 
        {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($image['tmp_name']);
            $type = $image['type'];
            if (!in_array($detectedType, $allowedTypes)) 
            {
                $check = FALSE;
            }
            if(filesize($image['tmp_name']) > 2000000) 
            {
                $check = FALSE;
            }
            if(!in_array($extension, $allowedExts)) {
                $check = FALSE;
            }

        }
        return $check;
    }

    public function validate_video($image) 
    {
        //echo "<pre>";print_r($_FILES);exit;
        $check = TRUE;
        if(!isset($image)){
            echo "file checked";
            return false;
        }
        if (is_array($image['size'])) {
            foreach ($image['size'] as $key => $value) {
                if ($value ==0) {
                    return false;
                }
            }
            $allowedExts = array("mp4", "MP4");
            $allowedTypes = array("video/mp4");
            foreach ($image['type'] as $key => $value) {
                if (!in_array($value, $allowedTypes)) {
                    return false;
                }
            }
            foreach ($image['tmp_name'] as $key => $value) {
                if (filesize($value) > 5000000000000) {
                    return false;
                }
            }
            foreach ($image['name'] as $key => $value) {
                if (!in_array(pathinfo($value, PATHINFO_EXTENSION), $allowedExts)) {
                    return false;
                }
            }
        }else if ((!isset($image)) || $image['size'] == 0) 
        {
            $check = FALSE;
        }
        else if (isset($image) && $image['size'] != 0) 
        {
            $allowedExts = array("mp4", "MP4"); 
            $allowedTypes = array("video/mp4");
            $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
            $detectedType = $image['type'];
            $type = $image['type'];
            if (!in_array($detectedType, $allowedTypes)) 
            { 
                $check = FALSE;
            }
            if(filesize($image['tmp_name']) > 5000000000000) 
            {   
                $check = FALSE;
            }
            if(!in_array($extension, $allowedExts)) 
            {   
                $check = FALSE;
            }
        }
        return $check;
    }
    public function generateStrongPassword($length = 8, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }
    public function shortifyCurrencyXtream($var){
      $var=doubleval($var);
      $print_str="";
      if($var>=1000){
        if($print_str!="") $print_str.=" ";
        $print_str.=($var/1000)."k";
      }
      else
      {
          if($print_str!="") $print_str.=" ";
          $print_str.=$var;
      }
      return $print_str;
    }
    public function get_time_ago($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }
    public function getExperience($is_fresher,$user_id){
        $result = array();
         if($is_fresher == 1){
          $this->db->where('ue.user_id',$user_id);
          $this->db->group_by('ue.id');
          $this->db->order_by('ue.id','DESC');
          $this->db->where('ue.status',1);
          $this->db->join('job_type_master jtm','jtm.id=ue.job_type_id','left');
          $result = $this->LoginModel->getRecords('user_experiences ue',FALSE,"jtm.name as job_type,ue.designation,ue.company_name as company_name,ue.is_current_company,ue.job_end_date,IFNULL(IF(ue.in_hand_salary>=1000, CONCAT(((ue.in_hand_salary)/1000),' k'),ue.in_hand_salary), '') as in_hand_salary,ROUND(IFNULL((SUM(TIMESTAMPDIFF(MONTH, `ue`.`job_start_date`, IF(ue.is_current_company = 1,NOW(),ue.job_end_date))/12)), '')) as experience,'' as certification_count");
          //echo $this->db->last_query();exit;

        }
       // echo "<pre>";print_r($result);exit;
        $new_result = array();
        if(sizeof($result)>0){
            $is_currentCompany = $this->searchexp($result, 'is_current_company', '1');
            foreach ($result as $key => $part) {
                $sort[$key] = strtotime($part['job_end_date']);
            }

            $total_experience = 0;
            foreach ($result as $key => $part) {
                $total_experience +=$part['experience'];
            }
            //echo $total_experience;exit;

           array_multisort($sort, SORT_DESC, $result);
           //echo "<pre>";print_r($result);
            if(sizeof($is_currentCompany)>0){
                $new_result = $is_currentCompany[0];
            }else{
                $new_result = $result[0];
            }

            $new_result['total_experience'] = $total_experience;
           if(is_array($new_result) && count($new_result)>0){
                return $new_result;
            }
        }
            return $new_result;
    }
    public function userEligible($job_id,$education_weight,$skills_master_id,$min_exps,$user_id){
       $this->db->group_by('u.id');
       $this->db->where('u.id',$user_id);
       $this->db->where('u.status',1);
       $this->db->having('user_exp >='. $min_exps, NULL, FALSE);
       $this->db->having('weight >=' . $education_weight, NULL, FALSE);
       //$this->db->where_in('u.education_master_id',$education_master_id);
       $this->db->having('skills_master_id IN( "' . $skills_master_id.'")', NULL, FALSE);
       $this->db->join('user_experiences ue','(ue.user_id=u.id and ue.status=1)','left');
       $this->db->join('users_skills us', '(us.user_id=u.id and us.status=1)', 'left');
       $this->db->join('education_master em', '(em.id=u.education_master_id and em.status=1)', 'left');
       $result= $this->LoginModel->getRecordCount('users u',FALSE,"IFNULL((SUM(TIMESTAMPDIFF(MONTH, `ue`.`job_start_date`, IF(ue.is_current_company = 1,NOW(),ue.job_end_date))/12)), '') as user_exp,IFNULL(GROUP_CONCAT(DISTINCT us.skills_master_id),'') as skills_master_id,IFNULL(em.weight,'') as weight");
       //echo $this->db->last_query();exit;
       $arr = array();
       if($result==0){
         $arr['is_eligible'] = 0;
       }
       else{
        $arr['is_eligible'] = 1;
       }
       return $arr;
    }
    public function userProfileMatchPercentage($job_id,$education_weight,$skills_master_id,$min_exps,$user_id){
       $this->db->group_by('u.id');
       $this->db->where('u.id',$user_id);
       $this->db->where('u.status',1);
       $this->db->having('user_exp >='. $min_exps, NULL, FALSE);
       $this->db->join('user_experiences ue','(ue.user_id=u.id and ue.status=1)','left');
       $experience_match= $this->LoginModel->getRecordCount('users u',FALSE,"IFNULL((SUM(TIMESTAMPDIFF(MONTH, `ue`.`job_start_date`, IF(ue.is_current_company = 1,NOW(),ue.job_end_date))/12)), '') as user_exp");
       //echo $this->db->last_query();exit;
       $this->db->group_by('u.id');
       $this->db->where('u.id',$user_id);
       $this->db->where('u.status',1);
       $this->db->having('weight >=' . $education_weight, NULL, FALSE);
       //$this->db->where_in('u.education_master_id',$education_master_id);
       $this->db->join('user_experiences ue','(ue.user_id=u.id and ue.status=1)','left');
       $this->db->join('education_master em', '(em.id=u.education_master_id and em.status=1)', 'left');
       $education_match= $this->LoginModel->getRecordCount('users u',FALSE,'u.*,IFNULL(em.weight,"") as weight');
       //echo $this->db->last_query();exit;
       $this->db->group_by('u.id');
       $this->db->where('u.id',$user_id);
       $this->db->where('u.status',1);
       $this->db->having('skills_master_id IN( "' . $skills_master_id.'")', NULL, FALSE);
       $this->db->join('user_experiences ue','(ue.user_id=u.id and ue.status=1)','left');
       $this->db->join('users_skills us', '(us.user_id=u.id and us.status=1)', 'left');
       $skill_match= $this->LoginModel->getRecordCount('users u',FALSE,'u.*,IFNULL(GROUP_CONCAT(DISTINCT us.skills_master_id),"") as skills_master_id');

       $arr = array();
       $user_profile = array();

        if ($experience_match == 0) {
            $user_profile['experience_match'] = $experience_match;
        }
        if ($education_match == 0) {
            $user_profile['education_match'] = $education_match;
        }
        if ($skill_match == 0) {
            $user_profile['skill_match'] = $skill_match;
        }
        //echo "<pre>";print_r($user_profile);exit();
        if (is_array($user_profile) && count($user_profile) > 0) {
            $user_profile_count = (3 - count($user_profile));
            $user_profile_percentage = round(($user_profile_count / 3 * 100));
        } else {
            $user_profile_percentage = 100;
        }

        $arr['profile_matched_percentage'] = $user_profile_percentage;
       return $arr;
    }
    function searchexp($array, $key, $value)
    {
        $results = array();

        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }

            foreach ($array as $subarray) {
                $results = array_merge($results, $this->searchexp($subarray, $key, $value));
            }
        }

        return $results;
    }
    public function unique_multi_array($array, $key) { 
      $temp_array = array(); 
      $i = 0; 
      $key_array = array(); 
      
      foreach($array as $val) { 
          if (!in_array($val[$key], $key_array)) { 
              $key_array[$i] = $val[$key]; 
              $temp_array[] = $val; 
          } 
          $i++; 
      } 
      return $temp_array; 
    }
    public function unique_multi_array_count($array, $key) { 
        $hash = array();
        $array_out = array();

        foreach($array as $item) {
            $hash_key = $item[$key];
            if(!array_key_exists($hash_key, $hash)) {
                $hash[$hash_key] = sizeof($array_out);
                array_push($array_out, array(
                    'count' => 0,
                ));
            }
            $array_out[$hash[$hash_key]]['count'] += 1;
        }
        return $array_out; 
    }
public function chatAttachmentupload($imagePost,$path=FALSE){
       $config['upload_path']          = './uploads/'.$path.'/';
       $config['allowed_types']        = 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG|MP3|mp3|WAV|wav|WMA|wma|ogg|OGG|MP4|mp4|pdf|PDF';
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $data['code'] = 0;
       if ( ! $this->upload->do_upload($imagePost))
       {
               $error = array('error' => $this->upload->display_errors());
               $data['msg'] = 'file not uploaded';
               return $data;
       }
       else
       {
               $data1 = array('upload_data' => $this->upload->data());
               $image_path = base_url()."uploads/".$path.'/'.$this->upload->data()["file_name"];

               $data['code'] =1;
               $data['img_url'] = $image_path;
               return $data;
       }
   }
   public function chatNotification($from_id,$to_id,$text,$attachment,$attachment_type,$insert_id,$channel,$user_type=FALSE){
     //define( 'API_ACCESS_KEY', 'AIzaSyAmP08O72V_LYM-uQYjFxAUSW3omDOx0Mc');
        $registrationIds = array();
        $query1 = $this->db->query("SELECT token,user_id from token WHERE user_id IN (".$to_id.") ");
        $row1= $query1->result() ;
        foreach ($row1 as $key => $value){
            $registrationIds[] =$value->token;
        }
                
        $query2 = $this->db->query("SELECT name,photo_url from users WHERE id IN (".$from_id.") ");
        $row2= $query2->result() ;
        foreach ($row2 as $key => $value) {
            $name=$value->name;
            $photo_url=$value->photo_url;
        }
            $fields = array(
                'registration_ids'  => $registrationIds,
                //"notification" => array("body" => $name." has sent you a message.", "title" => "Kaampe", "sound" => "default"),
                "data" => array(
                            "title"=>$name." has sent you a message.",
                            "text"=>$text,
                            "attachment"=>$attachment,
                            "from_id"=>$from_id,
                            "to_id"=>$to_id,
                            "insert_id"=>$insert_id,
                            "channel"=>$channel,
                            "from_user_name"=>$name,
                            "from_photo_url"=>$photo_url,
                            "created_date"=> date("H:i a"),
                            "type"=>(string)2,
                            "user_type"=>$user_type,
                            "attachment_type"=>$attachment_type
                         ),
            );
            //print_r($fields);exit;
            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
             
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
   }

   public function videoCallNotification($from_id,$to_id,$room_id){
     //define( 'API_ACCESS_KEY', 'AIzaSyAmP08O72V_LYM-uQYjFxAUSW3omDOx0Mc');
        $registrationIds = array();
        $query1 = $this->db->query("SELECT token,user_id from token WHERE user_id IN (".$to_id.") ");
        $row1= $query1->result() ;
        foreach ($row1 as $key => $value){
            $registrationIds[] =$value->token;
        }
                
        $query2 = $this->db->query("SELECT name,photo_url,mobile from users WHERE id IN (".$from_id.") ");
        $row2= $query2->result() ;
        foreach ($row2 as $key => $value) {
            $name=$value->name;
            $photo_url=$value->photo_url;
            $mobile=$value->mobile;
        }
            $fields = array(
                'registration_ids'  => $registrationIds,
                //"notification" => array("body" => $name." has sent you a video call request.", "title" => "Kaampe", "sound" => "default"),
                "data" => array(
                            "title"=>$name." has sent you a video call request.",
                            "from_id"=>$from_id,
                            "to_id"=>$to_id,
                            "room_id"=>$room_id,
                            "from_mobile"=>$mobile,
                            "from_user_name"=>$name,
                            "from_photo_url"=>$photo_url,
                            "type"=>(string)5
                         ),
            );
            //print_r($fields);exit;
            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
             
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
   }

   public function rejectVideoCallNotification($from_id,$to_id,$user_type){
     //define( 'API_ACCESS_KEY', 'AIzaSyAmP08O72V_LYM-uQYjFxAUSW3omDOx0Mc');
        $registrationIds = array();
        $query1 = $this->db->query("SELECT token,user_id from token WHERE user_id IN (".$to_id.") ");
        $row1= $query1->result() ;
        foreach ($row1 as $key => $value){
            $registrationIds[] =$value->token;
        }
                
        $query2 = $this->db->query("SELECT name,photo_url,mobile from users WHERE id IN (".$from_id.") ");
        $row2= $query2->result() ;
        foreach ($row2 as $key => $value) {
            $name=$value->name;
            $photo_url=$value->photo_url;
            $mobile=$value->mobile;
        }
            $fields = array(
                'registration_ids'  => $registrationIds,
                //"notification" => array("body" => $name." has reject you a video call request.", "title" => "Kaampe", "sound" => "default"),
                "data" => array(
                            "title"=>$name." has reject you a video call request.",
                            "from_id"=>$from_id,
                            "to_id"=>$to_id,
                            "user_type"=>$user_type,
                            "from_mobile"=>$mobile,
                            "from_user_name"=>$name,
                            "from_photo_url"=>$photo_url,
                            "type"=>(string)6
                         ),
            );
            //print_r($fields);exit;
            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
             
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
   }

   public function commonNotification($employer_id,$noti_title,$type,$job_id){
    //echo "<pre>";print_r($employer_id);exit;
        $registrationIds = array();

        $this->db->where_in('user_id',$employer_id);
        $row1 = $this->LoginModel->getRecords('token',FALSE,"token,user_id");
        foreach ($row1 as $key => $value){
            $registrationIds[] =$value['token'];
        }

            $fields = array(
                'registration_ids'  => $registrationIds,
                "notification" => array("body" => $noti_title, "title" => "Kaampe", "sound" => "default"),
                "data" => array(
                            "title"=>$noti_title,
                            "type"=>$type,
                            "job_id"=>$job_id
                         ),
            );

            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
             
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
   }

   public function getUrlToImage($video,$path,$media_thumbnail_name){
        $this->load->library('aws3');
        $second = 1;
        $saveimage  = $media_thumbnail_name;
        //$cmd = "/home/ubuntu/ffmpeg/ffmpeg/ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $saveimage 2>&1";
        $cmd = "/home/intel/ffmpeg/ffmpeg/ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $saveimage 2>&1";
        exec($cmd);
        $do = `$cmd`; 

        $src = $media_thumbnail_name;
        $name = time();
        $ext = pathinfo($src, PATHINFO_EXTENSION);
        $file_content = file_get_contents($src);
        $filename = "{$name}.{$ext}";
        $media_thumbnail = $this->aws3->sendFileUrl('kaampe', $filename, $path,$file_content);
        return $media_thumbnail;
    }

}
