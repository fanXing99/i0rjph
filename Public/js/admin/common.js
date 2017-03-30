/**
 * Created by fanxing on 17/3/28.
 */

/**
 *  HOST
 */
const HOST = 'http://localhost';
/**
 *  添加操作
 */
$("#button-add").click(function () {

    var url = SCOPE.add_url;
    window.location.href = url;
})
/**
 *
 *提交form表单操作
 *
 */
$("#singcms-button-submit").click(function () {
    var  data = $("#singcms-form").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    //提交数据


    var url = SCOPE.save_url;

    jump_url = SCOPE.jump_url;
     $.post(url,postData,function (result) {
         if (result.status == 1) {
             //成功
             return dialog.success(result.message,jump_url);

         } else(result.status == 0)
         {
             return dialog.error(result.message);
         }
     },'JSON');
})

/**
 *
 * 编辑模式
 */
$('.singcms-table #singcms-edit').click(function () {

    var id= $(this).attr('attr-id');
    var url = SCOPE.edit_url+'&id='+id;
    window.location.href = url;

})


/**
 * 删除
 */

$('.singcms-table #singcms-delete').click(function () {

    var id= $(this).attr('attr-id');

    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');

    var url = SCOPE.set_status_url;

    data = {};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type:0,
        title:'是否要删除',
        btn:['yes','no'],
        icon : 3,
        closeBtn:2,
        content:'是否确定'+message,
        scrollbar:true,

        yes:function () {

            todelete(url ,data);
        }

    })



})

/**
 * 删除
 * @param url
 * @param data
 */
function todelete (url,data) {


    $.post(url,data,function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message,'');
        } else(result.status == 0)
        {
            return dialog.error(result.message);
        }
    },'JSON');

}


/**
 * 更新排序
 */
$("#button-listorder").click(function () {

    var  data = $("#singcms-listorder").serializeArray();
    postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    //提交数据
    var url = SCOPE.listorder_url;
    $.post(url,postData,function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message,result['data']['jump_url']);

        } else(result.status == 0)
        {
            return dialog.error(result.message);
        }
    },'JSON');

})






