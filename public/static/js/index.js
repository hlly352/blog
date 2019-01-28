var IndexBanner = function(){
  this.init()
}
IndexBanner.prototype = {
  init:function(){
    var me = this;
    this.lis=$("#bannerList li")
    this.dots=$("#bannerDots li").width(1/this.lis.length*100+'%')
    this.Prev=$("#bannerPrev").click(function(){me.showPrev()})
    this.Next=$("#bannerNext").click(function(){me.showNext()})
    this.max=this.lis.length
    this.now=0
    this.mouseHover=false

    this.dots.mouseenter(function(){
      me.show($(this).index())
    })
    $("#banners").mouseenter(function(){
      me.mouseHover=true
    }).mouseleave(function(){
      me.mouseHover=false
    })
    setInterval(function(){
      if(!me.mouseHover) me.showNext()
    },8000)
  },
  show:function(n){
    this.lis.eq(n).addClass('cur').siblings().removeClass('cur')
    this.dots.eq(n).addClass('cur').siblings().removeClass('cur')
  },
  showPrev:function(){
    this.now--;
    if(this.now<0) this.now=this.max-1;
    this.show(this.now)
  },
  showNext:function(){
    this.now++;
    if(this.now==this.max) this.now=0;
    this.show(this.now)
  }
}

new IndexBanner()
$('.zan.favour_num').click(function(ev){
  var me = $(this), 
      text = parseInt(me.text()),
      type = me.attr('data-type'),
      blog_id = me.attr('blog_id'),
      userid = me.attr('userid');
  if(me.hasClass('ed'))return false;
  if(isLogin == 1){//登录
    $.post(praise_url,{id:blog_id,type:type,userid:userid},function(e){
      if(e.status == 1){
          me.text(text+1).addClass('ed')
          var x = $('<div class="jia1">+1</div>')
          .css({'top':ev.pageY-15,'left':ev.pageX+6,'z-index':10})
          $("body").append(x)
          x.animate({top:ev.pageY-20,left:ev.pageX+10,'font-size':'16px',opacity:'show'},300,'swing',function(){
            x.fadeOut(500)
          })
      }else{
        new AutoBox({content:e.msg,img:'remind',mask:"#000",autoClose:3})
      }
    },'JSON')
  }else{//没登录
    Login()
  }
})
