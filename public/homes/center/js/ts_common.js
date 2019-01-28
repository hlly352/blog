/**
 * Created by pc on 2015/12/22.
 */
$(function(){
    showTips();
    //position_a
    setInterval("sns_modify_title()",2000);
});

var  sns_title = document.title;
var stats=1;
function  sns_modify_title(){
    if ($(".Fnav .position_a").is(":visible") || $(".mesdot_first").is(":visible")){
        if (stats==1)
        {
            document.title = '【新消息】'+sns_title;
            stats=0;
        }else{
            document.title ='【     】'+sns_title;
            stats=1;
        }
    }
}

var TPIS = '1';
function showTips() {
    if(TPIS =='1' && $(".tips").length > 0){
        $('a.tips').cluetip({
            width: 350,
            cluetipClass: 'jtip',
            showTitle: false,
            clickThrough:true,
            arrows: true,
            dropShadow: false,
            hoverIntent: false,
            tracking: false,
            sticky: true,
            mouseOutClose: true,
            leftOffset:-306,
            topOffset:5,
            cluezIndex:90,
            closePosition: 'title',
            ajaxCache:false,
           // positionBy:'fixed' ,
           // topOffset:52,
            successCallBack:function(){
                Focuscombox_h();
            }
        });

    }
}

//按照类来选择
function selectAll(class_name) {
    //var checked = $("#selectall").attr("checked");

    $("."+class_name).each(function() {
        var subchecked = $(this).attr("checked");
        if (!subchecked)
            $(this).attr("checked",true);
    });
}

function unSelectAll(class_name) {
    $("."+class_name).each(function() {
        var subchecked = $(this).attr("checked");
        if (subchecked){
            $(this).attr("checked",false);
        }

    });
}

function getSelectValues(className) {

    id = [];
    if(className){
        $("input[type='checkbox']:checked").not("."+className).each(function(){
            id.push($(this).val());
        });
    }else{
        $("input[type='checkbox']:checked").each(function(){
            id.push($(this).val());
        });
    }
    return id.join(',');
}




//取消关注
function spaceCancelUserFollow(fuid){
    if (fuid) {
        ajaxCancelFollow(fuid,function(){
            var str =  '<span onclick="return addUserFollow('+fuid+')" class="Focus_add_btn right jsUserRelationFollow_'+fuid+'"><b class="icon_hjia_btn mr5 left"></b><em class="fs_n">关注</em></span>';
            $('.jsUserRelationFriend_'+fuid).replaceWith(str);
            $.message.close();
        })
    }
}

function strlenlight(str){ 
    var stra   =  str.replace(/(^\s+)|(\s+$)/g,"");	
    var len = 0;
    for (var i=0; i<str.length; i++) { 
     var c = str.charCodeAt(i); 
    //单字节加1 
     if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) { 
       len++; 
     } 
     else { 
      len+=2; 
     } 
    } 
    return len;
}

/*
* 图片等比缩放
* */
function proDownImage(ImgD,proMaxWidth,proMaxHeight){
    var image=new Image();
    image.src=ImgD.src;
    if(image.width>0 && image.height>0){
        var rate = (proMaxWidth/image.width < proMaxHeight/image.height)?proMaxWidth/image.width:proMaxHeight/image.height;
        if(rate <= 1){
            ImgD.width = image.width*rate;
            ImgD.height =image.height*rate;
        }
        else {
            ImgD.width = image.width;
            ImgD.height =image.height;
        }
    }
}