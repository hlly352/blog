@php
    
    $link = \DB::table('friend_link')->where('status','0')->limit(6)->get();
    $links = array();
    $linklist = array();
    foreach($link as $k=>$v){
        $links[$k][] = $v->name;
        $links[$k][] = $v->url;
        
    }
    for($i = 0;$i<ceil(count($links)/3);$i++){
        $linklist[] = array_slice($links,$i*3,3);
    }
@endphp
<div class="Footer">
  <div class="Page ">
 
    <dl class="fl">
      <dt>友情链接</dt>
      <dd>
      <table>
     @foreach($linklist as $k => $v)
      <tr>
        
          @foreach($v as $key=>$value)
          <td><a href="{{$value[1]}}">{{$value[0]}}</a></td>           
          @endforeach
          
      </tr>
      @endforeach
      </table>
    </dl>
    <dl class="fl">
      <dt>联系我们</dt>
      <dd>
        <img src="/static/picture/chuan.jpg" width="100">
        <img src="/static/picture/jiang.jpg" width="100">
        <img src="/static/picture/zoujun.jpg" width="100">
      </dd>
    </dl>
    <div class="fr">
      <div class="links">
        <br><br>
      </div>
      <p class="copy">Copyright &copy; 2005-2019 <a href="/" target="_blank">二郎巷博客</a> 版权所有 京ICP证060544号</p>
    </div>
  </div>
  </div>
    <!-- <script src="/static/js/pvlog.js"></script> -->
<script src="/static/js/count.js"></script>
<script>
  $(".gotop").click(function(){$(window).scrollTop(0)})
</script>


    <script type="text/javascript">
    //百度统计代码
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?2283d46608159c3b39fc9f1178809c21";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();

    //自动推送链接
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bd/static.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    </script>

    <script type='text/javascript'>
      var _vds = _vds || [];
      window._vds = _vds;
      (function(){
        _vds.push(['setAccountId', '8c51975c40edfb67']);
        (function() {
          var vds = document.createElement('script');
          vds.type='text/javascript';
          vds.async = true;
          vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'assets.growingio.com/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
      //document.write(decodeURI("%3Cscript src='https://tongji.51cto.com/frontend/tj.gif' type='text/javascript'%3E%3C/script%3E"));
    </script>
    
<script>
  var uid = '';
  var BLOG_URL = 'http://blog.51cto.com/';
</script>
<script src="/static/js/jquery.cookie.js"></script>
<script src="/static/js/time-on-page.js" charset="utf-8"></script>
<script>
    var praise_url = 'http://blog.51cto.com/praise/praise';
    var blog_ids = '2342274,2341986,2343515,2343452,2343316,2343070,2342980,2342504,2342284,2342085,2341944,2341911,2341658,2341541,2341273,2340863,2340777,2340750,2340464,2340378,2340204,2340038,2340024,2340022,2340015,2339960,2339755,2339601,2339589,2339520';
    var blog_stat_url = '/index/ajax-blog-stat';
    setTimeout(function(){
            $.ajax({
                url:blog_stat_url,
                type:"get",
                data:{
                   ids:blog_ids,
                },
                dataType:'json',
                success:function(res){
                    if(res.status == '0'){
                       $.each(res.data, function(index, item){
                           var blog_id = item.blog_id;
                           var li_id_name = 'blog_' + blog_id;
                           $('#'+li_id_name).find('.read_num').html(item.pv);
                           $('#'+li_id_name).find('.collect_num').html(item.favorite_num);
                           if(item.pv == '10000+'){
                              $('#'+li_id_name).find('.read_num').append('<i></i>')
                              $('#'+li_id_name).find('.read_num').parent().addClass('hasdot')
                           }
                           $('#'+li_id_name).find('.comment_num').html(item.comments_num);
                           if(item.admire_user_num > '0'){
                               $('#'+li_id_name).find('.admire_num').html(item.admire_user_num);
                               $('#'+li_id_name).find('.admire_num_p').show();
                           }
                           $('#'+li_id_name).find('.zan').html(item.apraise_num);
                           if(item.isPraise == '1'){
                               $('#'+li_id_name).find('.zan').addClass('ed');
                           }
                       });
                    }
                }
            });
    },100);
     updatePage()
//倒计时
  function updatePage() {
    $('.timeCount').each(function(index, item) {
    	var self =this
      var me = $(self);
      var end_time = $(self).data('end');
      if (!end_time||end_time<0) {
      	me.parents(".groups-timer-right").html("")
        return;
      }
      if (me.lastTime) {
        clearInterval(me.lastTime);
        me.lastTime = null;
      } else {
      	if(end_time>0){
         me.lastTime = setInterval(function() {
         end_time--
		     if (!end_time||end_time<0) {
		     	 me.parents(".groups-timer-right").html("")
		     	 	 window.location.reload()
		        return "";
		     }else{
        var hour, minute, seconds,
        hour = Math.floor(end_time  / (60 * 60) % 60),
        minute = Math.floor(end_time  / 60 % 60),
        seconds = Math.floor(end_time  % 60);
        me.html((hour < 10 ? '0' + hour : hour) + ':' +(minute < 10 ? '0' + minute : minute) + ':' +
        (seconds < 10 ? '0' + seconds : seconds) );
            }
        }, 1000);

      	}

      }
    });
  }
	//拼团按钮
	$(".jion-group-btn").hover(function(){
		$(this).find(".group-qrcode-box").show()
	},function(){
		$(this).find(".group-qrcode-box").hide()
	})
</script>
@section('js')

@show
<script src="/static/js/index.js"></script></body>
</html>
