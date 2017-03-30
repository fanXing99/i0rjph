<?php
namespace Admin\Controller;
use Think\Controller;

class ImageController extends Controller {
    private $_uploadObj;
    public function __construct() {
        parent::__construct();
    }
    public function ajaxuploadimage(){

        $upload = D('UploadImage');
        $res =  $upload->imageUpload();

    }
}

