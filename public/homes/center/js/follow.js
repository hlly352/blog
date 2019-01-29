//点击关注
function ajaxCancelFollow(fuid,callcack){
    $.message.show({
        text: '确定要取消对用户名的关注吗？',
        showShadow: true,
        onConfirm: function () {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/user-follow-fans/cancel-follow',
                data: {_csrf: yii.getCsrfToken(), followId: fuid},
                success: function (res) {
                    //$('.jsFollowFansDiv_'+fuid).remove();
                    callcack(res);

                }
            });
        }
    });
}
function cancelFollow(fuid) {
    if (fuid) {
        ajaxCancelFollow(fuid,function(){
            $.message.close();
            location.reload();
        })
    }
}
function cancelUserFollow(fuid) {
    if (fuid) {
        ajaxCancelFollow(fuid,function(){
            var str =  '<span class="Focus_add_btn right ml10 jsUserRelationFollow_'+fuid+'"  onclick="return addUserFollow('+fuid+')"><b class="icon_hjia_btn mr5 left"></b><em class="fs_n">关注</em></span>';
            $('.jsUserRelationFriend_'+fuid).replaceWith(str);
            $.message.close();
        })
    }
}


function editFollowRemark(fuid) {
    if(fuid){
        editRemark(fuid);
    }
}
function ajaxAddFollow(uid,callback){
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/user-follow-fans/add-follow',
        data: {_csrf: yii.getCsrfToken(), followId: uid},
        success: function (res) {
            callback(res);
        }
    });
}
function ajaxAddUserFollowGroup(groupName,callback){ 
    $.ajax({
        type:'POST',
        dataType:'json',
        url:'/user-follow-fans/add-group?t='+new Date().getTime(),
        data:{ _csrf: yii.getCsrfToken(),groupName:groupName},
        success:function(res){
            callback(res);
        }
    });
}
function ajaxSetFollowGroup(setdata,callback){
    $.ajax({
        type:'POST',
        dataType:'json',
        url:'/user-follow-fans/set-user-group?t='+new Date().getTime(),
        data:setdata,
        success:function(res){
            callback(res);
        }
    });
}
function addUserFollow(uid){
    if(uid){
        ajaxAddFollow(uid,function(res){
            if (res.error) {
                $.message.show({
                    text: res.message,
                    showCancelButton: false,
                    showShadow: true
                });
            } else {
                var str = '<div class="Focuscombox right ml10 jsUserRelationFriend_'+uid+'">';
                if(res.message.relation == 3){
                    str +='<span class="Focus_xh_btn"><b class="icon_sxaro mr5 left"></b><em class="fs_n left mr5">相互关注</em><b class="icon_arro_down left"></b></span>';
                }else if(res.message.relation == 1){
                    str +='<span class="Focus_comp_btn"><b class="icon_hdui_btn mr5 left"></b><em class="fs_n mr5 left">已关注</em><b class="icon_arro_down left"></b></span>';
                }
                str +='<div class="focushidebtns" style="display: none;">';
                str +='<span class="Focus_qx_btn mb5"><em class="fs_n" onclick="return cancelUserFollow('+uid+')">取消关注</em></span>';
                str +='<span class="Focus_qx_btn mb5"><em class="fs_n" onclick ="return editUserFollowGroupRemark('+uid+')">编辑关注</em></span>';
                str +="</div> </div>";
                $('.jsUserRelationFollow_'+uid).replaceWith(str);
                Focuscombox_h();
                $.message.close();
            }
        })
    }
}
function editRemark(fuid){	
    $.ajax({
        type:'POST',
        dataType:'json',
        url:'/user-follow-fans/get-user-remark',
        data:{ _csrf: yii.getCsrfToken(),followId:fuid},
        success: function (res) {
            var alertId = $.alert.show({
                title:'修改备注',
                obj:'.jsEditFollowRemark',
                isHasClose:true,
                showButton:true,
                buttomSize:62,
                showCancelButton:true,
                onConfirm:function(){					
                    var remark =  $("#"+alertId+" input[name='remark']").val();
                        if(fuid){
                            if(strlenlight(remark)>16){
                                showMess("#"+alertId+" span.cl_red ","备注名字不能超过8个字");
                            }else{
                                $.ajax({
                                    type:'POST',
                                    dataType:'json',
                                    url:'/user-follow-fans/set-user-remark',
                                    data:{ _csrf: yii.getCsrfToken(),followId:fuid,remarkName:remark},
                                    success: function (res) {
                                        if(res.error){
                                            showMess("#"+alertId+" span.cl_red ",res.msg);
                                        }else{											
                                            $.alert.close(-1);
                                            if($("#userFollowRemark_"+fuid).length){
                                                $("#userFollowRemark_"+fuid).text("备注："+remark);
                                            }
                                            if($("#userFriendRemark_"+fuid).length){
                                                $("#userFriendRemark_"+fuid).text("备注："+remark);
                                            }
                                        }
                                    }
                        });
                    }
                    }else{
                        $.alert.close(-1);
                    }
                }
            });
            $("#"+alertId+" input[name='remark']").val(res);
        }
    });
}

$(function(){
//点击关注
    $(".jsUserAddUserFollow").live('click',function(){
        var fuid = $(this).attr('data-fuid');
        if(fuid){
            ajaxAddFollow(fuid,function(res){
                if(res.error){
                    $.message.show({
                        text:res.message,
                        showCancelButton:false,
                        showShadow:true
                    });
                }else{
                    $("#jsAddFollowDiv_"+fuid).find("span.Focus_add_btn").remove();
                    var followedStr = '<div class="Focuscombox" id="jsEditFollowDiv_'+fuid+'"> <span class="Focus_comp_btn"><b class="icon_hdui_btn mr5 left"></b> <em class="fs_n mr5 left">已关注</em><b class="icon_arro_down left"></b>';
                    followedStr +='</span><div class="focushidebtns" style="display: none;"><span class="Focus_qx_btn mb5"><em class="fs_n jsCancelFollow" data-fuid='+fuid+'>取消关注</em> </span>';
                    followedStr +='<span class="Focus_qx_btn mb5"><em class="fs_n jsEditFollow" data-fuid='+fuid+'>编辑关注</em></span> </div> </div>';
                    $("#jsAddFollowDiv_"+fuid).append(followedStr);
                    var timer;
                    function delayShow(obj){
                        clearTimeout(timer);
                        $(obj).find(".focushidebtns").show();
                    }
                    function delayHide(obj,self){
                        timer = setTimeout(function(){
                            $(obj).find(".focushidebtns").hide();
                        }, 1000);
                    }
                    $("#jsEditFollowDiv_"+fuid).hover(function(){
                        delayShow($(this));
                    },function(){
                        delayHide($(this));
                    });
                    $("#jsEditFollowDiv_"+fuid).find(".Focus_qx_btn").hover(function(){
                        $(this).addClass("Focus_qx_btn_h")
                    },function(){
                        $(this).removeClass("Focus_qx_btn_h")
                    });
                    $("#jsEditFollowDiv_"+fuid).find(".Focus_comp_btn").hover(function(){
                        $(this).addClass("Focus_comp_btn_h")
                    },function(){
                        $(this).removeClass("Focus_comp_btn_h")
                    });
                    /*按钮划过变色结束*/
                }
            })
        }
    });
    $(".jsCancelFollow").live('click',function(){
        var fuid = $(this).attr('data-fuid');
        ajaxCancelFollow(fuid,function(res){
            $("#jsEditFollowDiv_"+fuid).remove();
            var str = '<span class="Focus_add_btn"><b class="icon_hjia_btn mr5 left"></b><em class="fs_n jsUserAddUserFollow" data-fuid="'+fuid+'">关注</em></span>';
            $("#jsAddFollowDiv_"+fuid).append(str);
            $.message.close(-1);
        });
    });

    $(".jsEditFollow").live('click',function(){
        var fuid = $(this).attr('data-fuid');
        if(fuid){
            editRemark(fuid);
        }
    });
	 $(".jsCreateUserGroup").click(function(){
            var groupName = $(".jsUserGroups input[name='userGroupName']").val();
            var msg = '';
            if(groupName ==''){
                msg = "分组名不能为空";
            }else if(groupName !="新组名最多8个字"&& groupName.length>8){
                msg = "分组名长度不能超过8个字节";
            }
            if(msg){
                showMess(".jsUserGroups span.cl_red ",msg);
            }else{
                ajaxAddUserFollowGroup(groupName,function(res){
                    if(res.error){
                        showMess(".jsUserGroups span.cl_red ",res.msg);
                    }else{
                        var addStr = '<li><input name="userGroups[]" type="checkbox" value="'+res.msg+'" /><span>'+groupName+'</span></li>';
                        $(".jsUserGroups").find("ul.clearfix").append(addStr);
                        $(".jsUserGroups").find(".cre_group_inp").hide();
                        $(".jsUserGroups").find(".cre_group_inp").prev(".cre_group").show();
                        hideMess(".jsUserGroups span.cl_red ");
                        group_create();
                    }
                });
            }
        });
    /*人脉查找开始*/
    /*创建分组开始*/
    var group_create = function(){
        var timer;
        function delayShow(obj){
            clearTimeout(timer);
            $(".contacts .op_group_set_hide").hide();
            if(obj.is(".contacts .op_group_set_hide")){
                obj.show();
            }else{
                obj.parents(".num_4").find(".op_group_set_hide").show();
            }
            $(".num_4").css({
                "z-index" : "1"
            });
            obj.parents(".num_4").css({
                "z-index" : "2"
            });
        }
        function delayHide(obj,self){
            timer = setTimeout(function(){
                if(self){
                    self.hide();
                }else{
                    obj.parents(".num_4").find(".op_group_set_hide").hide();
                }
            }, 1000);
        }
        $(".contacts .op_group_set_hide").hover(function(){
            delayShow($(this));
        },function(){
            delayHide($(this));
        });

        $("body").click(function(){
            var groupId = $(".jsUserGroups input[name='gid']").val();
            var fuid = $(".jsUserGroups input[name='fuid']").val();
            $(".jsUserGroups.ajax_foucs .op_group_val_hide").hide();
            $(".op_group_val").find(".up").removeClass("up").addClass("down");
            var fgroupIds = $("#userGroupIds_"+fuid).val();
            if(fgroupIds && groupId){
                if($.inArray(groupId,fgroupIds.split(','))==-1){
                    //$(".jsFollowFansDiv_"+fuid).remove();
                    location.reload();
                }
            }else if(fgroupIds =='' && groupId){
                 location.reload();
            }
        });
        $(".jsUserGroups.ajax_foucs .op_group_val_hide").click(function(e){
            e.stopPropagation();
            if($(this).is("input")){
                var flag = $(this).attr('checked');
                $(this).attr('checked', !flag);
            }
        });
        $(".op_group .op_group_val").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            var left=$(this).offset().left;
            var top=$(this).offset().top;
            $(".jsUserGroups .op_group_val_hide").toggle();
            var fuid = $(this).attr('data-fuid');
            $(".jsUserGroups .op_group_val_hide input[name='fuid']").val(fuid);
            $(".jsUpdateUserGroupInfo").hide();
            $(".jsUpdateUserGroupInfo").find('span').text(0);
            var fGroupId = $("#userGroupIds_"+fuid).val();
            var fGroupIdArr = fGroupId.split(',');
            if(fGroupIdArr){
                $(".jsUserGroups .op_group_val_hide input[name='userGroups[]']").each(function(){
                    if($.inArray($(this).val(),fGroupIdArr)>-1){
                        $(this).attr('checked',true);
                    }else{
                        $(this).attr('checked',false);
                    }
                });
            }
            $(this).find("em").toggleClass("up");
            $(".jsUserGroups .op_group_val_hide").css({
                "left":left+ "px",
                "top":top+30+ "px"

            });
        });
        $(".jsUserAddGroupDiv .jsCreateUserFollowGroup").live('click',function(){
                var groupName = $(".jsUserAddGroupDiv input[name='groupName']").val();
                var msg = '';
                if(groupName ==''){
                    msg = "分组名不能为空";
                }else if(groupName !="新组名最多8个字"&& groupName.length>8){
                    msg = "长度不能超过8个字";
                }
                if(msg){
                    showMess('.jsUserAddGroupDiv .cl_red',msg);return;
                }
                var _disable ='none';
                if($(".jsEditUserGroupDiv:visible").length){
                    _disable = 'inline';
                }
                ajaxAddUserFollowGroup(groupName,function(res){
                    if(res.error){
                        showMess('.jsUserAddGroupDiv .cl_red',res.msg);return;
                    }else{
                        var html ="";
                        html +='<div class="side_sub_thre t14 jsOperateUserFollowGroup_'+res.msg+'">';
                        html +='<strong class="side_editconbox" style="display: '+_disable+';">';
                        html +='<em class="icon_bjfzu" title="编辑分组" onclick="return editUserFollowGroup('+res.msg+')"></em>';
                        html +='<em  class="icon_bjfzudel" onclick="return deleteUserFollowGroup('+res.msg+')" title="删除分组" >×</em>';
                        html +='</strong>';
                        html +='<a href="follow?gid='+res.msg+'">';
                        html +='<span class="subtext jsFollowGroupName_'+res.msg+'">'+groupName+'</span>';
                        html +='<span class="subnum"> 0 </span>';
                        html +='</a>';
                        html +='</div>';
                        $(".jsFollowGroupList").append(html);
                        hideMess(".jsUserAddGroupDiv  .cl_red");
                        $(".jsUserAddGroupDiv").find(".cre_group_inp").hide();
                        $(".jsUserAddGroupDiv").find(".cre_group_inp").prev(".cre_group").show();
                        $(".jsUserAddGroupDiv input[name ='groupName']").val("");
                        location.reload();
                    }
                });
        });        
        $(".jsUserGroups .op_group_val_hide input[name='userGroups[]']").click(function(){
                var fuid = $(this).parents(".jsUserGroups").find("input[name='fuid']").val();
                var uid = $(this).parents(".jsUserGroups").find("input[name='fuid']").val();
                var groupNum = $(".jsUserGroups .op_group_val_hide input[name='userGroups[]']:checked").length;
                var groupId = $(this).val();
                if(this.checked){
                    var operate = 'add';
                }else{
                    var operate = 'del';
                }
                var groupIdArr = [];
            var groupNameArr =[];
            $(".jsUserGroups .op_group_val_hide input[name='userGroups[]']:checked").each(function(){
                groupIdArr.push($(this).val());
                groupNameArr.push($(this).parent('li').find('span').html());
            });
                if(fuid){
                    var data = { _csrf: yii.getCsrfToken(),followId:fuid,groupId:groupId,operate:operate};
                    ajaxSetFollowGroup(data,function(res){
                        if(res.error){
                            $.message.show({
                                text:res.message,
                                showCancelButton:false,
                                showShadow:true
                            });
                        }else{
                            $(".jsUpdateUserGroupInfo").show();
                            $(".jsUpdateUserGroupInfo").find('span').text(groupNum);
                            $("#userGroupIds_"+fuid).val(groupIdArr.join(','));
                            $(".jsFollowFansDiv_"+fuid+" .op_group_val em b").html(groupNameArr.join(','));
                        }
                    });
                }
        });        

        $(".op_group_set").hover(function(){
            delayShow($(this));
        },function(){
            //setTimeout("$(this).parents('.num_4').find('.op_group_set_hide').hide()",2000)
            //$(this).parents(".num_4").find(".op_group_set_hide").hide();
            delayHide($(this));

        });
        $('input.cre_group_val').focus(function(){
            if($(this).val() == this.defaultValue){
                $(this).val('');
            }
        }).blur(function(){
            if($(this).val().replace(/ /g,'') == ''){
                $(this).val(this.defaultValue);
            }
        });
    };
    group_create();
    /*创建分组结束*/
    /*取消关注开始*/
    //发送私信
    $(".jsAddUserMsg").live('click',function(){
        var uid = $(this).attr('data-uid');
        var username = $(this).attr('data-username');
        var msgAlertId = $.alert.show({
            'title':'发私信：'+username,
            'obj':'.jsFansSendMsg',
            'showButton':true,
            'showCancelButton':true,
            'confirmButtonText':'发送',
            'onConfirm':function(){
                var title = $("#"+msgAlertId+" input[name='title']").val();
                var content = $("#"+msgAlertId+" textarea[name='content']").val();
                if(title.length == 0 || title.length > 50){
                    $("#"+msgAlertId+" .jsTitleError").show().html("主题请在0—50个字符之间");
                }else{
                    $("#"+msgAlertId+" .jsTitleError").hide().html("");
                }
                if(content.length == 0 || content.length > 500){
                    $("#"+msgAlertId+" .jsContentError").show().html("内容请在0—500个字符之间");
                }else{
                    $("#"+msgAlertId+" .jsContentError").hide().html("");
                }
                if( $("#"+msgAlertId+" .jsTitleError:visible").length == 0 && $("#"+msgAlertId+" .jsContentError:visible").length == 0){
                    $.ajax({
                        type:'post',
                        data:{uid:uid,subject:title,content:content,_csrf: yii.getCsrfToken()},
                        url:'/msg/send-msg',
                        async:false,
                        success:function(data){
                            if(data.error==false){
                                $.alert.close(-1);
                                $.message.show({
                                    text:'恭喜您，发送成功！',showCancelButton:false,
                                    showShadow:true});
                                    setTimeout(function(){
                                        $.message.close(-1);
                                    },2000);
                            }else{
                                $.message.show({
                                    text:data.msg,
                                    showShadow:false});
                                //setTimeout(function(){
                                //    $.message.close(-1);
                                //},1000);
                            }
                        },
                        error:function(){
                            $.message.show({
                                text:'对不起发送失败，请重新发送。',showCancelButton:false,
                                showShadow:true});
                            setTimeout(function(){
                                $.message.close(-1);
                            },1000);
                        }
                    });
                }
            }
        });
    });
});

//粉丝编辑关注
function editUserFollowGroupRemark(uid){
    if(uid){
        $.ajax({
            type:'post',
            data:{uid:uid,_csrf: yii.getCsrfToken()},
            dataType:'html',
            url:'/user-follow-fans/edit-follow',
            success:function(html){
                var editFollowAlertId = $.alert.show({
                    'title': '编辑关注',
                    'html': html
                });
                $("#"+editFollowAlertId +" input[name='userGroups[]']").live('click',function(){
                    var fuid = $(this).parents(".jsUserGroups").find("input[name='fuid']").val();
                    var groupNum = $(this).parents(".jsUserGroups").find(" input[name='userGroups[]']:checked").length;
                    var groupId = $(this).val();
                    if(this.checked){
                        var operate = 'add';
                    }else{
                        var operate = 'del';
                    }
                    var groupIdArr = [];
                    var groupNameArr =[];
                    $(this).parents(".jsUserGroups").find(" input[name='userGroups[]']:checked").each(function(){
                        groupIdArr.push($(this).val());
                        groupNameArr.push($(this).parent('li').find('span').html());
                    });
                    if(fuid){
                        var data = { _csrf: yii.getCsrfToken(),followId:fuid,groupId:groupId,operate:operate};
                        ajaxSetFollowGroup(data,function(res){
                            if(res.error){
                                $.message.show({
                                    text:res.message,
                                    showCancelButton:false,
                                    showShadow:true
                                })
                            }else{
                                $("#"+editFollowAlertId+" .jsUpdateUserGroupInfo").show();
                                $("#"+editFollowAlertId+" .jsUpdateUserGroupInfo").find('span').text(groupNum);
                            }
                        });
                    }
                });
                $("#"+editFollowAlertId+" .jsFansCreateFollowGroup").click(function(){
                    var groupName = $("#"+editFollowAlertId+" input[name='groupName']").val();
                    var msg = '';
                    if(groupName ==''){
                        msg = "分组名不能为空";
                    }else if(groupName !="新组名最多8个字"&& groupName.length>8){
                        msg = "分组名长度不能超过8个字节";
                    }
                    if(msg){
                        $.message.show({
                            text:msg,
                            showCancelButton:false,
                            showShadow:true
                        });
                    }else{
                        ajaxAddUserFollowGroup(groupName,function(res){
                            if(res.error){
                                $.message.show({
                                    text:res.msg,
                                    showCancelButton:false,
                                    showShadow:true
                                });
                            }else{
                                var addStr = '<li><input name="userGroups[]" type="checkbox" value="'+res.msg+'" /><span>'+groupName+'</span></li>';
                                $("#"+editFollowAlertId).find("ul.clearfix").append(addStr);
                                $("#"+editFollowAlertId).find(".cre_group_inp").hide();
                                $("#"+editFollowAlertId).find(".cre_group_inp").prev(".cre_group").show();
                            }
                        });
                    }
                });
            $("#"+editFollowAlertId+" .jsCancel").click(function(){
                $(this).parent(".cre_group_inp").hide();
                $(this).parent(".cre_group_inp").prev(".cre_group").show();
             });
           $("#"+editFollowAlertId+" .jsCancelEditRemark").click(function(){
               $.alert.close();
           });
            $("#"+editFollowAlertId+" .jsConfirmEditRemark").click(function(){
                var fuid = $(this).parents(".jsUserGroups").find("input[name='fuid']").val();
                var remark =  $("#"+editFollowAlertId+" input[name='remark']").val();
                if(fuid){
                    if(remark == ''){
                        $.alert.close();
                        return ;
                    }
                    if(remark.length>8){
                        showMess("#"+editFollowAlertId+" span.cl_red ","备注名字不能超过8个字");
                    }else{
                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'/user-follow-fans/set-user-remark',
                            data:{ _csrf: yii.getCsrfToken(),followId:fuid,remarkName:remark},
                            success: function (res) {
                                if(res.error){
                                    showMess("#"+editFollowAlertId+" span.cl_red ",res.msg);
                                }else{
                                    $.alert.close(-1);
                                }
                            }
                        });
                    }
                }
            });
            }
        });
    }
}
var Focuscombox_h =function(){
    var timer;
    function delayShow(obj){
        clearTimeout(timer);
        $(obj).find(".focushidebtns").show();
    }
    function delayHide(obj,self){
        timer = setTimeout(function(){
            $(obj).find(".focushidebtns").hide();
        }, 10);
    }
    $(function(){
        $(".Focuscombox").hover(function(){
            delayShow($(this));
        },function(){
            delayHide($(this));
        });
        $(".Focuscombox .Focus_qx_btn").hover(function(){
            $(this).addClass("Focus_qx_btn_h")
        },function(){
            $(this).removeClass("Focus_qx_btn_h")
        });
        $(".Focus_comp_btn").hover(function(){
            $(this).addClass("Focus_comp_btn_h")
        },function(){
            $(this).removeClass("Focus_comp_btn_h")
        });

    });

}

Focuscombox_h();
function editUserFollowGroup(groupId){
    var groupName = $.trim($(".jsFollowGroupName_"+groupId).html());
    if(groupId && groupName){
        var editAlertId = $.alert.show({
            title:'编辑关注分组名',
            obj:'.jsFollowFansGroupDiv',
            showButton:true,
            showCancelButton:true,
            buttomSize:62,
            width:'300',
            onConfirm:function(){
                var gname = $("#"+editAlertId+" input[name='gname']").val();
                var gid = $("#"+editAlertId+" input[name ='gid']").val();
                if(gname == ''){
                    showMess('#'+editAlertId+ ' .cl_red','分组名称不能为空');
                    return ;
                }
                if(gname == groupName){
                    showMess('#'+editAlertId+ ' .cl_red','请先修改分组名称');
                    return ;
                }
                if(gname.length>8){
                    showMess('#'+editAlertId+ ' .cl_red','分组名称不能大于8个字节');
                    return ;
                }
                $.ajax({
                    type:'post',
                    url:'/user-follow-fans/update-group-name',
                    data:{ _csrf: yii.getCsrfToken(),groupName:gname,groupId:groupId},
                    success:function(data){
                        if(data.error == false){
                            $(".jsFollowGroupName_"+groupId+".subtext").html(gname);
                            $.alert.close();
                            location.reload();
                        }else{
                            showMess('#'+editAlertId+ ' .cl_red',data.msg);
                        }
                    }
                });
            }
        });
        $("#"+editAlertId+" input[name ='gname']").val(groupName);
        $("#"+editAlertId+" input[name ='gid']").val(groupId);
    }
}
function deleteUserFollowGroup(groupId){
   if(groupId){
       $.message.show({
           text:'确定要删除关注分组么？',
           showShadow:true,
           onConfirm:function(){
               $.ajax({
                   type:'POST',
                   dataType:'json',
                   url:'/user-follow-fans/delete-group',
                   data:{ _csrf: yii.getCsrfToken(),groupId:groupId},
                   success: function (res) {
                       if(!res.error){
                           $.message.close();
                           location.href ="follow";
                       }
                   }
               });
           }
       });
   }
}
//获取人脉数目
function  getFollowFansAmount(){
    var uid = parseInt($("#jsUserId").val());
    if(uid){
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'/user-follow-fans/get-follow-fans-amount',
            data:{ _csrf: yii.getCsrfToken(),uid:uid},
            success: function (res) {
                if(res.followAmount){
                    $(".jsFollowAmount").find('span.subnum').html(res.followAmount.follow);
                    $(".jsFansAmount").find('span.subnum').html(res.followAmount.fans);
                    $(".jsFriendAmount").find('span.subnum').html(res.followAmount.friend);
                    $(".jsNotGroupAmount").find('span.subnum').html(res.followAmount.notGroup);
                }
                if(res.groupAmount){
                    for(var i in res.groupAmount){
                        if($(".jsFollowAmount"+res.groupAmount[i].gid).length>0){
                            $(".jsFollowAmount"+res.groupAmount[i].gid).find('span.subnum').html(+res.groupAmount[i].count);
                        }
                    }
                }
            }
        });
    }

}
$(function(){
    getFollowFansAmount();
});
//发送私信


/*取消关注结束*/
/*按钮划过变色开始*/
$(".Focus_add_btn").hover(function(){
    $(this).addClass("Focus_add_btn_h")
},function(){
    $(this).removeClass("Focus_add_btn_h")
});
$(".Dir_mes_btn").hover(function(){
    $(this).addClass("Dir_mes_btn_h")
},function(){
    $(this).removeClass("Dir_mes_btn_h")
});

$(".Focus_xh_btn").hover(function(){
    $(this).addClass("Focus_xh_btn_h")
},function(){
    $(this).removeClass("Focus_xh_btn_h")
});
function showMess(obj,mess){
    $(obj).show();
    $(obj).html(mess);
}
function hideMess(obj){
    $(obj).hide();
    $(obj).html("");
}

