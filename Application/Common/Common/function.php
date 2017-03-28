<?php
/**
 * Created by PhpStorm.
 * User: fanxing
 * Date: 17/3/27
 * Time: 下午4:20
 */


function show($status,$message,$data = array()){

    $reuslt = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($reuslt));
}



function getMd5Password($password){

    return md5($password.C('MD5_PRE'));
}
function getMenuType($type){
    return $type == 1 ? '后台菜单':'前端导航';
}

function status($status){

    if($status == 0){
        $str = '关闭';
    }else if($status == 1){
        $str = '正常';

    }else if($status == -1){
        $str = '删除';
    }
    return $str;
}