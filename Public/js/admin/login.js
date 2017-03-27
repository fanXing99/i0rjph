/**
 * Created by fanxing on 17/3/27.
 */
/**
 * 前端登录业务
 * @author fan
 */
var login = {
    check:function () {
        //获取登录页面中的用户名 和 密码
        var username = $('input[name = "username"]').val();
        var password =  $('input[name = "password"]').val();
        if(!username){
            dialog.error('用户名不能为空');
        }else if (!password){
            dialog.error('密码不能为空');
        }else {
            //执行登录
            var url = "/i0rjph/index.php?m=admin&c=login&a=check";
            var data = {
                'username':username,
                'password':password,
            };
            $.post(url,data,function (result) {
                if(result.status == 0){
                    dialog.error(result.message);
                }

            },'JSON');
        }

    }
}
