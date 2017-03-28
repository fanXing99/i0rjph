/**
 * Created by fanxing on 17/3/28.
 */


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