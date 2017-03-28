<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class MenuController extends Controller {

    public function index(){
        $data = array();
        /**
         * 分页的操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] :1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize']:10;
        $menus = D("Menu")->getMenus($data,$page,$pageSize);
        $menusCount =  D("Menu")->getMenusCount($data);
       $res = new \Think\Page($menusCount,$pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes' , $pageRes);
        $this->assign('menus',$menus);
        $this->display();
    }

    public function main() {
        $this->display();
    }

    public function add(){

        if($_POST){

            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0,'菜单名不能为空');
            }

            if(!isset($_POST['m']) || !$_POST['m']){
                return  show(0,'模块名不能为空');
            }
            if(!isset($_POST['c']) || !$_POST['c']){
                return  show(0,'控制器名不能为空');
            }

            if(!isset($_POST['f']) || !$_POST['f']){
                return  show(0,'方法名不能为空');
            }

            $menuId = D('Menu')->insert($_POST);
            if($menuId){
                return show(1,'新建成功',$menuId);
            }
            return show(0,'新建失败');



        }else{
            $this->display();
        }

    }


}