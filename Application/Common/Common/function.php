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
