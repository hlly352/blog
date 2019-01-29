document.writeln('<div class="footer">');
//document.writeln('<a href="http://www.51cto.com/about/aboutus.html" target=_blank>关于我们</a>|<a href="http://www.51cto.com/about/zhaopin.html" target=_blank>诚聘英才  </a>|<a href="http://www.51cto.com/about/contactus.html" target=_blank>联系我们  </a>|<a href="http://www.51cto.com/about/history.html" target=_blank>网站大事  </a>|<a href="http://www.51cto.com/about/links.html" target=_blank>友情链接  </a>|<a href="http://51ctohome.blog.51cto.com/1805422/1717145" target=_blank>意见反馈  </a>|<a href="http://www.51cto.com/about/map.htm" target=_blank>网站地图</a>');
document.writeln('<a href="http://www.51cto.com/about/aboutus.html" target=_blank>关于我们</a>|<a href="http://www.51cto.com/about/zhaopin.html" target=_blank>诚聘英才  </a>|<a href="http://www.51cto.com/about/contactus.html" target=_blank>联系我们  </a>|<a href="http://www.51cto.com/about/history.html" target=_blank>网站大事  </a>|<a href="http://www.51cto.com/about/links.html" target=_blank>友情链接  </a>|<a class="jsFeedCallBack" href="javascript:void(0);" >意见反馈  </a>|<a href="http://www.51cto.com/about/map.htm" target=_blank>网站地图</a>');
document.writeln('<span>Copyright ? 2005-2015 51CTO.COM 京ICP证060544</span>');
document.writeln('</div></body></html>');

    function alertBox(action) {
        var objs = document.getElementsByTagName("OBJECT");
        if(action == 'open') {
            document.domain = '51cto.com';
            //   if(!favorId('feedlayer')) {
            div = document.createElement('div');
            div.id = 'feedlayer';
            document.body.appendChild(div);
            var w_width=$(window).width();
            var w_height=$(window).height();
            favorId( div.id).innerHTML = '<div><iframe id="feedframe" name="feedframe" style="position: fixed;left: 0;top: 0; z-index: 9999999;" allowTransparency="true" frameborder="0"></iframe></div>';
            $("#feedframe").css({
                "width":w_width+'px',
                "height":w_height+'px'
            });
            // }
            var feedurl = "//home.51cto.com/favorite/feed-back?type=uc"
            feedframe.location = feedurl;
        }
    }
function favorId(id) {
    return document.getElementById(id);
}

$(".jsFeedCallBack").click(function(){
    if (typeof(Countly.add_event) != "undefined") {
        Countly.add_event({'key': 'Feedback'})
    }
    alertBox('open');
    $("#feedframe").css({
        "width":'100%',
        "height":'100%'
    });
});
function deleteShaow(){
    $('#feedlayer').remove();
}
