<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct ()
        {
            parent::__construct();
            $this->load->library('CryptoHelper');
        }

    public function getUrlToImage($video,$path,$media_thumbnail_name){
        $this->load->library('aws3');
        $second = 1;
        $saveimage  = $media_thumbnail_name;
        $cmd = "/home/ubuntu/ffmpeg/ffmpeg/ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $saveimage 2>&1";
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
    public function getToken(){
        $token = null;
        if(isset($this->input->request_headers()['Token'])){
            $token = $this->input->request_headers()['Token'];
        }
        return $token;
    }
    public function isMethod($request,$type="post"){
        if ($request != $type) {
            header('HTTP/1.0 6003 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Invalid Method';
            echo json_encode($data);
            exit;
        }
    }
    public function getUserId($token){
        if($token == NULL){
            header('HTTP/1.0 401 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Invalid Token';
            return $data;
        }
        $token = $this->cryptohelper->decrypt($token);
        $datas = explode(":", $token);
        //echo "<pre>";print_r($datas);exit;
        if(count($datas)!=3){
            header('HTTP/1.0 401 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Invalid Token';
            return $data;
        }
        $data['code'] = 1;
        $data['data'] = $datas;
        return $data;
    }
    public function check_user($token) {
        if($token == NULL){
            header('HTTP/1.0 401 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Token is empty';
            echo json_encode($data);
            exit;
        }
        $token_decrpt = $this->cryptohelper->decrypt($token);
        $datas = explode(":", $token_decrpt);
        if(count($datas)!=3){
            header('HTTP/1.0 401 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Invalid token';
            echo json_encode($data);
            exit;
        }
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d H:i:s");
        $auth_result = array();
        if($datas[1] == 0 ){
            $this->db->where('auth_expiring_date>=',$date);
            $auth_result = $this->LoginModel->getRecords('user_auth_token',array('token'=>$token),'id,token');
            //echo $this->db->last_query();exit;
        }
        
        if(count($auth_result)==0){
            header('HTTP/1.0 401 Unauthorized');
            $data['code'] = 2;
            $data['msg'] = 'Token is invalid/ expired';
            echo json_encode($data);
            exit;
        }
        if ($datas[1] == 0) {
            $result = $this->LoginModel->getRecords('users', array('id' => $datas[0], 'status' => 1));
        }
        if (count($result) == 0) {
            $data['code'] = 2;
            $data['msg'] = 'User not found';
            echo json_encode($data);
            exit;
        }
    }
    function input($name,$method='post')
    {
        if($method == 'post'){
            return trim(htmlentities(strip_tags($this->input->post($name))));
        }else{
            return trim(htmlentities(strip_tags($this->input->get($name))));
        }
    }
    public function getVideoModal($id,$url)
    {
        $modal = '<button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalLong"'.$id.'"">
                                        Additional Info
                                        </button>
                <div class="modal fade" id="exampleModalLong"'.$id.'"" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Additional Info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="text-align: justify;">
                                           <video style="width:100%;height:250px" class="w-100" controls preload="none"><source id="mp4" src="' . $url . '" type="video/mp4"></video>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        return $modal;
    }
    public function getDescriptionModal($id,$text)
    {
        $modal = '<button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalLong"'.$id.'"">
                                        Additional Info
                                        </button>
                <div class="modal fade" id="exampleModalLong"'.$id.'"" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Additional Info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="text-align: justify;">
                                           "'.$text.'"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        return $modal;
    }
    public function modalView($data){
        if(isset($data)){
        //echo "<pre>";print_r($_POST);exit;
        if(isset($data['id'])){
            if($data['id'] !== ''){
                if($data['flag'] == 'video'){
                        $html = '<video style="width:100%;height:250px" class="w-100" controls preload="none"><source id="mp4" src="'. $data['id'] . '" type="video/mp4"></video>';
                    }
                    if($data['flag'] == 'text'){
                        $html = $data['id'];
                    }
                }
            if($data['id'] == ''){
                $sele_bio = '*';
                $this->db->where('user_video_bio_id', $data['user_video_bio_id']);
                $this->db->where('media_type', 1);
                $this->db->where('status', 1);
                $bio_gallery = $this->LoginModel->getRecords('user_video_bio_gallery', false, $sele_bio);
                $html = '';
                foreach ($bio_gallery as $key => $value) {
                    $html .='<div class="col-md-3 text-center d-flex mb-4 image-box"> <a class="image-popup-gallery-item vertical-center"><img src="'. $value['media_url'] . '" class="mx-auto my-auto img-fluid" alt="..." width="100%"></a></div>';
                }
                $html = "<div class='row'>$html</div>";
            }
        }else{
            if($data['flag'] == 'video'){
                $html = '<video style="width:100%;height:250px" class="w-100" controls preload="none"><source id="mp4" src="'. $data['id'] . '" type="video/mp4"></video>';
            }
            if($data['flag'] == 'text'){
                $html = $data['id'];
            }
        }
        return $html;
    }
}
}
