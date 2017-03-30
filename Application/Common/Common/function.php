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

function getAdminMenuUrl($nav){


    $url = '/i0rjph/admin.php?c='.$nav['c'].$nav['a'];

    if($nav['f'] == 'index'){

        $url = '/i0rjph/admin.php?c='.$nav['c'];
    }
    return $url;
}

function getActive($navc){

    $c =  strtolower(CONTROLLER_NAME);

    if(strtolower($navc) == $c ){

        return 'class="active"';
    }

    return '';
}


function showKind($status,$data){

    header('Content-type:application/json;charset=utf-8');

    if($status == 0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>$data)));


}


function getLoginUsername(){
    return $_SESSION['adminUser']['username'] ? $_SESSION['adminUser']['username']:'';
}