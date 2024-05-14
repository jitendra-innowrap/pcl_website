<?php if (!defined('BASEPATH')) exit('No direct script access alloed');

class Master_model extends CI_Model
{
	/*
		# function getRecordCount($tbl_name,$condition=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return number of rows
		# Parameters : 
			$tbl_name* =name of table 
			$condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
		
		# How to call:
			$this->master_model->getRecordCount('tbl_name',$condition_array);
	*/
	public function getRecordCount($tbl_name, $condition = FALSE, $select = FALSE)
	{
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

	public function getRecords($tbl_name, $condition = FALSE, $select = FALSE, $order_by = FALSE, $start = FALSE, $limit = FALSE)
	{
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


	public function insertRecord($tbl_name, $data_array, $insert_id = FALSE)
	{
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
	public function updateRecord($tbl_name, $data_array, $where_arr)
	{
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
	public function deleteRecord($tbl_name, $pri_col, $id)
	{
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


	/* checkDuplicate function is used for checking of record exists in table or not */
	public function accountno()
	{

		$notgenerated = true;
		$random = "";

		while ($notgenerated) {
			$random = $this->getRandom(10);
			//Checks if ID isn't already in database
			$result = $this->Master_model->getRecords('register', array('accountno' => $random), "register.id");
			if (!$result) {
				if (!is_numeric($random))
					$notgenerated = false;
			}

		}
		return $random;
	}


	public function certificate()
	{

		$notgenerated = true;
		$random = "";

		while ($notgenerated) {
			$random = $this->getRandom(10);
			//Checks if ID isn't already in database
			$result = $this->Master_model->getRecords('results', array('certificate' => $random), "results.id");
			if (!$result) {
				if (!is_numeric($random))
					$notgenerated = false;
			}

		}
		return $random;
	}


	public function getRandom($strlength)
	{
		$stringarray = array(0, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'g', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		$str = "";
		for ($i = 1; $i <= $strlength; $i++) {
			$str = $str . $stringarray[mt_rand(0, 60)];
		}
		return $str;
	}

	public function hash()
	{
		$hash = sha1(chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)));
		return $hash;
	}

	public function passwordhash($password)
	{
		$hash = sha1(chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)));
		return crypt($password, $hash);
	}


	public function switch_quotes($str)
	{
		$str = str_replace(array("‘", "’", "'"), "&#x27;", $str);
		$str = str_replace(array("“", "”", '"'), "&quot;", $str);
		$str = str_replace('–', '-', $str);
		return $str;
	}


	public function upload_videoimage($imagePost, $path = FALSE)
	{

		$config['upload_path'] = './uploads/' . $path . '/';
		$config['allowed_types'] = 'jpg|png|gif|jpeg|mov|mp4|qt|M4P|M4V|OGG|MPG|MP2|MPEG|MPE|MPV|AVI|WMV|MOV|WEBM|FLV';
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

	public function upload($imagePost, $path = FALSE)
	{
		if (!is_dir('uploads/'.$path))
		{
			mkdir('./uploads/' . $path, 0777, TRUE);
		}
		$config['upload_path'] = './uploads/' . $path . '/';
		$config['allowed_types'] = 'jpg|png|gif|jpeg|xls|xlsx|doc|docx|rtf|ppt|pptx|pptm|pdf|jfif|JFIF';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$data['code'] = 0;
		if (!$this->upload->do_upload($imagePost)) {
			$error = array('error' => $this->upload->display_errors());
			$data['msg'] = 'file not uploaded';
			return $data;
		} else {
			$data1 = array('upload_data' => $this->upload->data());
			$image_path = "uploads/" . $path . '/' . $this->upload->data()["file_name"];

			$data['code'] = 1;
			$data['img_url'] = $image_path;
			$data['file_name'] = $this->upload->data()["file_name"];
			return $data;
		}
	}

    public function insertDocumentImages($table, $data = null)
	{
		//print_r($data);exit;
		$insert = $this->db->insert_batch($table, $data);
		return $insert ? true : false;
	}

	public function validate_image($image)
	{
		//echo "<pre>";print_r($image);exit;
		//$mimetype = mime_content_type($image['tmp_name']);
		//echo "<pre>";print_r($mimetype);exit;
		$check = TRUE;
		if (!isset($image)) {
			echo "file checked";
			return false;
		}
		if (is_array($image['size'])) {
			foreach ($image['size'] as $key => $value) {
				if ($value == 0) {
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
		} else if ((!isset($image)) || $image['size'] == 0) {
			$check = FALSE;
		} else if (isset($image) && $image['size'] != 0) {
			$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
			$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
			$extension = pathinfo($image["name"], PATHINFO_EXTENSION);
			$detectedType = exif_imagetype($image['tmp_name']);
			$type = $image['type'];
			if (!in_array($detectedType, $allowedTypes)) {
				$check = FALSE;
			}
			if (filesize($image['tmp_name']) > 2000000) {
				$check = FALSE;
			}
			if (!in_array($extension, $allowedExts)) {
				$check = FALSE;
			}

		}
		return $check;
	}


	public function webinarid()
	{

		$notgenerated = true;
		$random = "";

		while ($notgenerated) {
			$random = $this->getRandom(10);
			//Checks if ID isn't already in database
			$result = $this->Master_model->getRecords('webinar', array('webinarid' => $random), "webinar.id");
			if (!$result) {
				if (!is_numeric($random))
					$notgenerated = false;
			}

		}
		return $random;
	}

	public function ticket_id()
	{

		$notgenerated = true;
		$random = "";

		while ($notgenerated) {
			$random = $this->getRandom(10);
			//Checks if ID isn't already in database
			$result = $this->Master_model->getRecords('support', array('ticket_id' => $random), "support.id");
			if (!$result) {
				if (!is_numeric($random))
					$notgenerated = false;
			}

		}
		return $random;
	}

	public function couponcodes()
	{

		$notgenerated = true;
		$random = "";

		while ($notgenerated) {
			$random = $this->getRandom(10);
			//Checks if ID isn't already in database
			$result = $this->Master_model->getRecords('couponcodes', array('code' => $random), "couponcodes.id");
			if (!$result) {
				if (!is_numeric($random))
					$notgenerated = false;
			}

		}
		return $random;
	}


	public function sendSMS($mobile, $msg)
	{
		$url = "http://sms6.routesms.com:8080/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination=$mobile&source=CLARNT&message=" . urlencode($msg);

		//$url= "";

		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);
	}


	public function updatepublishrecord($id, $tablename)
	{
		$data['response'] = "failed";
		$where_own = array('id' => $id);
		$result = $this->Master_model->getRecords($tablename, $where_own);
		if ($result[0]['is_active'] == "1") {
			$where_own = array('id' => $id);
			$update = array('is_active' => 0);
			if ($this->Master_model->updateRecord($tablename, $update, $where_own)) {
				$data['response'] = "success";
				$data['publish'] = "2";
			}
		} else {
			$where_own = array('id' => $id);
			$update = array('is_active' => 1);
			if ($this->Master_model->updateRecord($tablename, $update, $where_own)) {
				$data['response'] = "success";
				$data['publish'] = "1";

			}
		}
		return $data;
	}


	public function sendEmail($email_id, $subject, $message, $filename = false)
	{

		$from_email = "testing@innowrap.com";
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.innowrap.com',
			'smtp_port' => 587,
			'smtp_user' => 'testing@innowrap.com', // change it to yours
			'smtp_pass' => '9uMb{^GNjZpL', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$message = $message;
		$this->email->initialize($config);
		if ($filename) {
			$this->email->attach($filename);
		}
		$this->email->from($from_email);
		$this->email->to($email_id);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

	}

	public function notification($id = false, $title = false, $body = false, $type = false, $image = false, $message = false)
	{
		date_default_timezone_set('Asia/Calcutta');
		//echo "<pre>";print_r($table);exit;
		define('API_ACCESS_KEY', 'AAAAQsX1W_M:APA91bGRngh0eqb2be19rAIJiPiiplVrFFn_ht965oRl1foSW-3QKDRKCzLOpuNDtcX6eg_ue4Hl7a19gwzjqwr6IIQ9TC8MvjF1hAaABY2cB-3rv2agXR9yBd6ILFLbKmDkscrUKiPT');


		$sel = "register.fcm";
		$this->db->where('register.fcm!=', '');
		$this->db->group_by('register.fcm');
		$result = $this->Master_model->getRecords('register', false, $sel);


		// echo $this->db->last_query();exit();

		$registrationIds = array();
		foreach ($result as $key => $value) {
			$registrationIds[] = $value['fcm'];
		}

		$fields = array
		(
			'registration_ids' => $registrationIds,
			"notification" => array("id" => $id, "body" => $body, "title" => $title, "sound" => "default", "type" => $type, "image" => $image, "message" => $message, "datetime" => date('Y-m-d H:i:s')),
			"data" => array(
				"id" => $id,
				"body" => $body,
				"title" => $title,
				"sound" => 'default',
				"type" => $type,
				"image" => $image,
				"message" => $message,
				"datetime" => date('Y-m-d H:i:s'),
			),
		);

		//print_r($fields);
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		//print_r($result );exit();

		curl_close($ch);
	}


}

?>
