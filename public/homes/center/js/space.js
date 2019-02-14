//统计url收藏的次数
function getUrlFavoriteCount(){
    var urlObj = $(".tab_con_list .jsFavoriteUrl");
    var urlArr = new Array();
    var urlId = new Array();
    var urlString ='';
    urlObj.each(function(i){
        if($(this).children("a").attr("href")){
            urlArr.push($(this).children("a").attr("href"));
            urlId.push($(this).next("ul").children("li").children("a").attr("num"));
        }
    })
    $.ajax({
        url:'/space/url-favorite-count',
        type:'post',
        dataType:'json',
        data:{_csrf: yii.getCsrfToken(),'favorite':urlArr},
        success:function(data){
            if(typeof data == 'object'){
                for(var c in data){
                    var i=c;
                    $("#jsFavCount"+urlId[i] +" span").html(data[c]['fc']+"人收藏");
                }
            }
        }
    });
}
//猜你喜欢
function getUserGuess(){
    var html= '';
    $.ajax({
        type:'post',
        data:{'_csrf':yii.getCsrfToken()},
        dataType:'json',
        url:'/space/get-user-guess',
        success:function(data){
            if(typeof data == 'object' ){
                for(var c in  data){
                    html += '<div class="yourslove mt20 clearfix">';
                    html += ' <div class="yourslove_l left mr5">';
                    html += ' <a class="future_img tips" rel="/user/user-info?uid='+c+'"  href="/space?uid='+c+'"><img src="'+data[c].face+'" class="ajax_layimg"  alt="'+data[c].userName+'" /></a>';
                    html += '</div>';
                    html += ' <div class="yourslove_c left mr10">';
                    html += ' <div class="name pb5"><a href="/space?uid='+c+'">'+data[c].userName+'</a></div>';
                    html += ' <p>关注技术：'+data[c].attention+'</p>';
                    html += '</div>';
                    html += ' <div class="yourslove_r right mt10">';
                    if(data[c].relation == 1 || data[c].relation == 3){
                    html += '   <div class="Focuscombox">';
                        if(data[c].relation == 3 ){
                            html += '<span class="Focus_xh_btn"><b class="icon_sxaro mr5 left"></b><em class="fs_n left mr5">相互关注</em><b class="icon_arro_down left"></b></span>';
                        }else{
                            html += '<span class="Focus_comp_btn"><b class="icon_hdui_btn mr5 left"></b><em class="fs_n mr5 left">已关注</em><b class="icon_arro_down left"></b></span>';
                        }
                    html += '<div class="focushidebtns">';
                    html += '    <span class="Focus_qx_btn mb5"><em class="fs_n" onclick="return cancelUserFollow('+c+')">取消关注</em></span>';
                    html += '<span class="Focus_qx_btn mb5"><em class="fs_n" onclick ="return editUserFollowGroupRemark('+c+')">编辑关注</em></span>';
                    html += ' </div>';
                    html += '</div>';
                    }else{
                    html += '<span class="Focus_add_btn right ml10 jsUserRelationFollow_'+c+'"  onclick="return addUserFollow('+c+')"><b class="icon_hjia_btn mr5 left"></b><em class="fs_n">关注</em></span>';
                    }
                    html += '</div>';
                    html += '</div>';
                }
                $("#jsYourslovebox").html(html);
                Focuscombox_h();
                showTips();
            }
        }

    });
}
//删除动态
    function deleteFeed(type,feedId){
        $.message.show({
            text:"确定要删除动态吗？",
            showCancelButton:true,
            showShadow:true,
            onConfirm:function(){
                if(type  && feedId){
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '/space/delete-feed',
                        data: {_csrf: yii.getCsrfToken(), feedId: feedId,dType:type},
                        success: function (res) {
                            $("#jsFeedInfo_"+feedId).remove();
                            $.message.close();
                        }
                    });
                }
            }
        })
    }
$(function(){
    $("#jsLoadMore").click(function(){
        var page = parseInt($("#jsCurrentPage").val());
        page = page + 1;
        var appType = $("#jsAppType").val();
        var feedType = $("#jsFeedType").val();
        var uid = parseInt($("#jsUserId").val());
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/space/ajax-feed-list',
            data: {_csrf: yii.getCsrfToken(), page: page,type:appType,feedType:feedType,uid:uid},
            success: function (res) {
               if(typeof res ==  "object" && !(res instanceof Array)){
                   var feedStr = "";
                    for(var key in res){
                        feedStr += '<div class="tab_con_list jsFeedList"  id="jsFeedInfo_'+res[key].id+'">';
                        feedStr += '<div class="con_detail"><dl class="mytablist clearfix">';
                        feedStr +='<dt class="left"> <a href="/space?uid='+res[key].uid+'"><img src="'+res[key].face+'" class="ajax_layimg"  alt="'+res[key].username+'" /></a></dt>';
                        feedStr += '<dd class="right"> <div class="database_new"><div class="left">'+res[key].title+ "<p>"+res[key].body+"</p>";
                        feedStr +='</div><div><span class="exit_delete right" onclick="deleteFeed(\'user\','+res[key].id+')">x</span><span class="exit_date right">'+res[key].cTime+'</span></div>';
                        feedStr +='</div></dd></dl> </div></div>';
                    }
                    $(".jsFeedList:last").after(feedStr);
                    $("#jsCurrentPage").val(page);
               }else{
                   $("#jsLoadMore").parent('div').replaceWith("<div class='pt30 pb30 tc'><span class='t18'>没有更多的动态加载了！</span></div>");
               }
            }

        });
    });
    getUserHonor();
});

function getUserHonor(){
    var uid = parseInt($("#jsUserId").val());
    if(uid){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/space/ajax-get-honor',
            data: {_csrf: yii.getCsrfToken(),uid:uid},
            success: function (res) {
                var honor = "";
                if(res){
                    for(var k in res){
                        if($.inArray('spcialist',res[k])>-1){
                            honor += '<a href="javascript:void(0)"><b class="titon_bke"></b>专家博客</a>';
                        }
                        if($.inArray('star',res[k])>-1){
                            var opra = honor ? '<span>|</span> ':'';
                            honor += opra + '<a href="javascript:void(0)"><b class="titon_xing"></b>博客之星</a></a>';
                        }
                        if($.inArray('recommend',res[k])>-1){
                            var opra = honor ? '<span>|</span> ':'';
                            honor += opra + '<a href="javascript:void(0)"><b class="titon_tjian"></b>推荐博客</a></a>';
                        }
                        if($.inArray('moderator',res[k])>-1){
                            var opra = honor ? '<span>|</span> ':'';
                            honor += opra + '<a href="javascript:void(0)"><b class="titon_bzhu"></b>版主</a></a>';
                        }
                        if($.inArray('lecturer',res[k])>-1){
                            var opra = honor ? '<span>|</span> ':'';
                            honor += opra + '<a href="javascript:void(0)"><b class="titon_jshi"></b>讲师</a></a>';
                        }
                    }
                }
                $("#jsUserHonor").append(honor);
            }
        });
    }

}
