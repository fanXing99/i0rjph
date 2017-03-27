<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){

    	return $this->display();
    }
    public function check(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!trim($username)){
            echo show(0,'用户名不能为空');
        }else if(!trim($password)){
            echo show(0,'密码不能为空');
        }else{

           $ret =  D('Amdin')->getAdminByUsername($username);
            print_r($ret);




        }


    }

}