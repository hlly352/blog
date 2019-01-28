
$(function(){
	
var autoScaling=function(img,t,_width,_height){//boyka的图片自适应缩放,这个是静态缩放;
	if(img.width>0&&img.height>0){
		if(img.width/img.height>=_width/_height){
			if(img.width>_width){
				t.width(_width);
				t.height((img.height*_width)/img.width);          
			}else{
				t.width(img.width);
				t.height(img.height);
			}	
		}else{
			if(img.height>_height) {
				t.height(_height);
				t.width((img.width*_height)/img.height);
			}else{
				t.width(img.width);
				t.height(img.height);
			}
		}
	}
};
var Box=function(){
	this.init.apply(this,arguments);
};
Box.prototype={
	init:function(options){
		var _this=this;
		this.ele=options.ele;
		$(window).bind("load",function(){
			_this.ele.each(function(i){
				var img=new Image();
				img.src=$(this).attr("src");
				var _width=$(this).parent().width();
				var _height=$(this).parent().height();
				autoScaling(img,$(this),_width,_height);
				$(this).css({
					marginLeft:($(this).parent().width()-$(this).width())/2,
					marginTop:($(this).parent().height()-$(this).height())/2,
					visibility:"visible"
				})
			})
		});
		/* modify start 20151217 */
		if(options.loaded){
			_this.ele.each(function(i){
				var _width=$(this).parent().width();
				var _height=$(this).parent().height();
				autoScaling(this,$(this),_width,_height);
				$(this).css({
					marginLeft:($(this).parent().width()-$(this).width())/2,
					marginTop:($(this).parent().height()-$(this).height())/2,
					visibility:"visible"
				});
			})
		}
		/* modify end 20151217 */
	}
};
new Box({
		ele:$(".box")
	})	
	
})