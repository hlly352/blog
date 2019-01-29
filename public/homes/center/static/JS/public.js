
// JavaScript Document
$(function(){

	$(".Fheader ul li").hover(function(){
		if($(this).find(".hidchannel").length>0){
			$(this).prev().find("b").hide();
			$(this).find("b").hide();
			$(this).addClass("hovercur");
			$(this).find("em").addClass("showdown");
			$(this).find(".hidchannel").show();
			
			}
	},function(){
			$(this).prev().find("b").show();
			$(this).find("b").show();
			$(this).removeClass("hovercur");
			$(this).find("em").removeClass("showdown");
			$(this).find(".hidchannel").hide();
		
	});

	/*$(window).load(function(){ 
		var pheight = $(".banner .bannerimg").height();
		var pwidth = $(".banner .bannerimg").width();
		var p_ml =pwidth/2
		$(".banner").css("height",pheight)
		$(".banner .bannerimg").css("margin-left",-p_ml+"px")
	 });*/
	$(".Fnav_l dl dd").hover(function(){
		$(this).addClass("navhover");
	},function(){
		$(this).removeClass("navhover");
		
	});
	$(".exit_set").hover(function(){
		$(this).find("a .arro_down").addClass("arro_up");
		$(this).find(".arro").show();
		$(this).find(".hideset").show();
	},function(){
		$(this).find("a .arro_down").removeClass("arro_up");
		$(this).find(".arro").hide();
		$(this).find(".hideset").hide();
		
	});
	
	// $(".Signbox .Sign").hover(function(){
	// 	$(".Signhide").show();
	// },function(){
	// 	$(".Signhide").hide();
	// });
/* 	$(".Signbox").mouseenter(function(){
		$(".Signhide").show();
	}).mouseleave(function(){
		$(".Signhide").hide();
	}) */
	$("#wsjlmy").hover(function(){
		$(".hide_jltext").show();
	},function(){
		$(".hide_jltext").hide();
		
	});
	/*$(".index_tabbox .tab_sub ul li").click(function(){
		var index = $(this).index();
		$(this).addClass("cur_tab").siblings("li").removeClass("cur_tab")
		$(".tab_conbox .tab_con").eq(index).show().siblings(".tab_con").hide();
		
		
	});*/
	$(".tab_conbox .tab_con .tab_con_list").hover(function(){
		$(this).addClass("tab_con_list_hover")
		$(this).find(".icon_share").addClass("icon_share_hover")
		$(this).find(".icon_collect").addClass("icon_collect_hover")
		$(this).find(".notice_del").addClass("notice_del_yel")
		

	},function(){
		$(this).removeClass("tab_con_list_hover")
		$(this).find(".icon_share").removeClass("icon_share_hover")
		$(this).find(".icon_collect").removeClass("icon_collect_hover")
		$(this).find(".notice_del").removeClass("notice_del_yel")
		
		
	});

	$(".tab_con,.tab_con .ctcside_tab").each(function(index, element) {
        $(this).find(".con_detail:last").css("border-bottom","none");
    });
	
	$(".noticein").each(function(index, element) {
        $(this).find(".con_detail:last").css("border-bottom","none");
    });
	$("#contacts_dzbox").each(function(index, element) {
        $(this).find(".contacts:last").css("border-bottom","none");
    });

	/*棣栭〉娣诲姞鍏虫敞寮€濮�*/
	var MyFoucs = function(){
			$(".My_Foucsbox .foucs_in .foucs_detail b").hide();
			$(".foucs_in .custom").click(function(){
				$(this).hide();
				$(".Foucs_promo").hide();
				//$(".Foucsdetail").addClass("mb20")
				$(".Foucs_hide").show();
				var $container = $('#container');
					$container.imagesLoaded(function(){
					$container.masonry({
					itemSelector: '.kclist',
					columnWidth:12 //姣忎袱鍒椾箣闂寸殑闂撮殭涓�5鍍忕礌
					});
				
				});
				$(".My_Foucsbox .btnas").show();
				$(".My_Foucsbox .foucs_in .foucs_detail").addClass("foucs_detail_editor");
				$(".My_Foucsbox .foucs_in .foucs_detail b").show();
				
			})
			$(".Foucs_hide ul li span").click(function(){
				
				if(!$(this).hasClass("active") && $(".Foucs_hide ul li span.active").length >= 8){
					$('.overpro').show();
					return;
				}
				
				var index = $(this).parents("li").index();
				var course=$(this).text();
				$(this).toggleClass("active")
				var flag = false;
				$(".My_Foucsbox .foucs_in li:not('.custom')").each(function(){
					var txt = $(this).find("a").text();
					if(course == txt && index == $(this).attr("pos")){
						$(this).remove();
						flag = true;
					}
				});
				if(flag == false){
					$(".My_Foucsbox .foucs_in .custom").before("<li class='foucs_detail_editor' pos='" + index + "'><a>"+course+"</a><b>脳</b></li>")	
				}
				
			})
			$(".foucs_in").on("click",".foucs_detail_editor b",function(){
				
				
				var pos_name=$(this).parents("li").attr("pos");
				var txt = $(this).parents("li").find("a").text();
				$(this).parents("li").remove();
				
				$(".Foucs_hide ul li span").each(function(){
					var span_pos =$(this).parents("li").index();
					var span_txt =$(this).text();
					if(pos_name==span_pos&&txt==span_txt){
						$(this).removeClass("active");
					}
				})
				
				
			})
			
			$(".Foucs_hide ul li span").hover(function(){
				$(this).addClass("s_h");
			},function(){
				$(this).removeClass("s_h")
			});
			$(".My_Foucsbox .btnas .btnas_bc").click(function(){
				$(".My_Foucsbox .btnas").hide();
				$(".Foucs_hide").hide();
				$(".Foucsdetail").removeClass("mb20")
				$(".My_Foucsbox .foucs_in .foucs_detail_editor").removeClass("foucs_detail_editor").addClass("foucs_detail")
				$(".My_Foucsbox .foucs_in .foucs_detail b").hide();
				$(".foucs_in .custom").show();
			})
			$(".My_Foucsbox .btnas .btnas_sq").click(function(){
				$(".My_Foucsbox .btnas").hide();
				$(".Foucs_hide").hide();
				$(".Foucsdetail").removeClass("mb20")
				$(".My_Foucsbox .foucs_in .foucs_detail_editor").removeClass("foucs_detail_editor").addClass("foucs_detail")
				$(".My_Foucsbox .foucs_in .foucs_detail b").hide();
				$(".foucs_in .custom").show();
			})
		
		
		}
	//MyFoucs();
	/*棣栭〉娣诲姞鍏虫敞缁撴潫*/
	/*$(".Focus_add_btn").click(function(){
			if($(this).hasClass("Focus_comp_btn")==false){
				$(this).addClass("Focus_comp_btn");
				$(this).find("em").text("宸插叧娉�")
			}
			
	});*/
	$("#my_blank ul li:odd").css("border-right","none");
	$("#my_blank ul li:last").css("border-bottom","none");
	/*缂栬緫涓汉璧勬枡寮€濮�*/
	var MyEditor =function(){
		$("#Editor_num").hover(function(){
				$(this).find("#ON_editor").show();
				$(this).find(".Toview").show();
				
			},function(){
				$(this).find("#ON_editor").hide();
				$(this).find(".Toview").hide();
		});
		/*$("#ON_editor").click(function(){
			$(this).parents(".memdatabox").hide();
			$("#Editor_box").show();
		})*/
		$("#Editor_box .Editor_box_off").click(function(){
			$(this).parents("#Editor_box").hide();
			$("#Editor_num").show();
		})
		$(".my_save").hover(function(){
				$(this).addClass("my_save_hover");
			},function(){
				$(this).removeClass("my_save_hover");
		});
		
		
	    };
	MyEditor();
	/*缂栬緫涓汉璧勬枡缁撴潫*/
	/*鍒犻櫎涓汉鍙戣〃鍐呭寮€濮�*/
	var Delete_mycont = function(){
			
			$(".exit_delete").hover(function(){
				$(this).addClass("exit_delete_yel")
				var s_top = $(document).scrollTop();
				var left=$(this).offset().left;
				var top=$(this).offset().top;
				$('.prompt_delete').css({
							"left" : left-210 + "px",
							"top" : top+30 - s_top +"px",
							"display":"block"
				})
				},function(){
					$(".prompt_delete").hide();
					$(this).removeClass("exit_delete_yel")		
			});
			$(".exit_delete_follow").hover(function(){
				$(this).addClass("exit_delete_yel_follow")
				var s_top = $(document).scrollTop();
				var left=$(this).offset().left;
				var top=$(this).offset().top;
				$('.prompt_delete').css({
							"left" : left-210 + "px",
							"top" : top+30 - s_top +"px",
							"display":"block"
				})
				$('.prompt_delete').text("鍙垹闄ゅ姩鎬佷笉褰卞搷鍐呭锛屽垹闄ゅ姩鎬佷笉鍙仮澶�")
				},function(){
					$(".prompt_delete").hide();
					$(this).removeClass("exit_delete_yel")		
			});
			
			
			
		}
	Delete_mycont();
	/*鍒犻櫎涓汉鍙戣〃鍐呭缁撴潫*/
	$(".exit_delete_ds").hover(function(){
				$(this).addClass("exit_delete_ds_yel");
			},function(){
				$(this).removeClass("exit_delete_ds_yel");
		});
	$(".pop_foucs").click(function(){
			if($(this).hasClass("pop_foucs_cop")==false){
				$(this).addClass("pop_foucs_cop");
				$(this).find("em").text("宸插叧娉�")
			}
			
	});
	$(".tabin_screen ul li").click(function(){
		var index = $(this).index();
		$(this).addClass("scr_cur").siblings("li").removeClass("scr_cur")
		$(".tomailtabbox .tomailtab").eq(index).show().siblings().hide();
	});
	/*浜鸿剦鏌ユ壘寮€濮�*/
	var person_find = function(){
			$("body").click(function(){
				$(".stylehide").hide();
				$(".group_styleval").removeClass("group_styleval_c").addClass("group_styleval")
			});
			
			$(".group_styleval").click(function(e){
				e.preventDefault();
				e.stopPropagation();
				$(this).next(".stylehide").toggle();
				$(this).toggleClass("group_styleval_c");
				
			})
			$(".stylehide a").click(function(e){
				e.preventDefault();
				e.stopPropagation();
				var txt = $(this).text()
				$(".stylehide").hide();
				$(".group_styleval").val(txt)
				$(".group_styleval").removeClass("group_styleval_c").addClass("group_styleval")
			})
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
	person_find();	
	
	/*鐐瑰嚮鏀瑰彉input榛樿鍊煎紑濮�*/
	var Inputtext_del = function(){
			$('.inputtext_del').focus(function(){
				if($(this).val() == this.defaultValue){
					$(this).val('');
					
				}
			}).blur(function(){
				if($(this).val().replace(/ /g,'') == ''){
					$(this).val(this.defaultValue);
					
				}
				/*var forbiddenText = ["浣�", "鎴�", "浠�", "瀹�"];
				if($.inArray($(this).val(), forbiddenText) != -1){
					$(this).parents(".validation_or").find(".cl_red").show()
					$(this).parents(".validation_or").find(".set_jy").show()
				}else{
					$(this).parents(".validation_or").find(".cl_red").hide();
					$(this).parents(".validation_or").find(".set_jy").hide();
				}*/
			});
		}
	Inputtext_del();
	/*鐐瑰嚮鏀瑰彉input榛樿鍊肩粨鏉�*/
	$(".Hottext_tabtit .Ftitle_all").click(function(){
		var index = $(this).index();
		$(this).addClass("Ftitle_all_cur").siblings().removeClass("Ftitle_all_cur")
		$(".Hottext_tabbox .Hottextbox").eq(index).show().siblings(".Hottextbox").hide();
		
	});
	
	$(".mestab_sub .tab_sub ul li").click(function(){
		var index = $(this).index();
		$(this).addClass("cur_tab").siblings().removeClass("cur_tab")
		$(this).parents(".mestabtitbox").next(".Hottext_tabbox").find(".Hottextbox").eq(index).show().siblings(".Hottextbox").hide();
		$(".wyb_box").find(".wyb_tab").eq(index).show().siblings(".wyb_tab").hide();
	});
	
	/*椤甸潰鍙充笅瑙掕繑鍥為《閮ㄥ紑濮�*/

	var Fixexit = function(){
			var wind = function(){
					if($(window).width()<1420){
						$(".fixexit").hide();
						$(".fixexit_small").show();
					}else{
						$(".fixexit").show();
						$(".fixexit_small").hide();
						}

					}
			wind();

			$(window).resize(function(){
				wind();

			});

			$(window).scroll(function(){
				if($(document).scrollTop()>0){
					$(".fixexit,.fixexit_small").find(".exit_list_back").show();
				}else{
					$(".fixexit,.fixexit_small").find(".exit_list_back").hide();
				}

			});
			$(".exit_list_back").click(function(){
				$(document).scrollTop(0)
			})


		}

	Fixexit();
	/*椤甸潰鍙充笅瑙掕繑鍥為《閮ㄧ粨鏉�*/
	/* 澶村儚寮€濮� */
	var lay_pop = function (){
			var timer;
			function delayShow(obj){
				clearTimeout(timer);
/* 				$.ajax({
					
				}) */
				$(".lay_pop").show();
			}
			function delayHide(obj,self){
				timer = setTimeout(function(){
					$(".lay_pop, .lay_pop_arrow span").hide();
				}, 1000);
			}
			$(".lay_pop").hover(function(){
				delayShow($(this));
			},function(){
				delayHide($(this));
			});
			$(".mainindex_l .ajax_layimg").hover(function(){
				var img = $(this);
				delayShow(img);
				var left = img.offset().left;
				var top = img.offset().top;
				var documentTop = $(document).scrollTop();
				var winHeight = $(window).height();
				var layboxLeft, layboxTop;

					if(top - documentTop < winHeight/2 && winHeight/2 > $(".lay_pop").height()){//灞呬笅
						layboxTop = top + img.height() + 10;
						layboxLeft = left;
						$(".lay_pop_arrow .arro_top").css({
							"display" : "block",
							"left" : left + (img.width())/2 - 8 + 'px',
							"top" : top + img.height() + 2 + 'px'
						}).siblings().hide();
					}else if(top - documentTop > winHeight/2 && winHeight/2 > $(".lay_pop").height()){//灞呬笂
						layboxTop = top - $(".lay_pop").height() -10;
						layboxLeft = left;
						$(".lay_pop_arrow .arro_bot").css({
							"display" : "block",
							"left" : left + (img.width())/2 - 8 + 'px',
							"top" : top - 12 + 'px'
						}).siblings().hide();
					}else if(winHeight/2 < $(".lay_pop").height() && left > $(".lay_pop").width()){//灞呭乏
						layboxLeft = left - $(".lay_pop").width() - 10;
						if(winHeight/2 > top - documentTop){
							layboxTop = documentTop + 10;
						}else{
							layboxTop = documentTop + winHeight - $(".lay_pop").height() - 10;
						}
						$(".lay_pop_arrow .arro_left").css({
							"display" : "block",
							"left" : left - 12 + 'px',
							"top" : top + (img.height())/2 - 8 + 'px'
						}).siblings().hide();
					}else if(winHeight/2 < $(".lay_pop").height() && left < $(".lay_pop").width()){//灞呭彸
						layboxLeft = left + img.width() + 10;
						if(winHeight/2 > top - documentTop){
							layboxTop = documentTop + 10;
						}else{
							layboxTop = documentTop + winHeight - $(".lay_pop").height() - 10;
						}
						$(".lay_pop_arrow .arro_right").css({
							"display" : "block",
							"left" : left + img.width() + 2 + 'px',
							"top" : top + (img.height())/2 - 8 + 'px'
						}).siblings().hide();
					}
				$(".lay_pop").css({
					'left' : layboxLeft + 'px',
					'top' : layboxTop + 'px'
				});
			},function(){
				var img = $(this);
				delayHide(img);
			});
			
			$(".mainindex_r .ajax_layimg").hover(function(){
				var img = $(this);
				delayShow(img);
				var left = img.offset().left;
				var top = img.offset().top;
				var documentTop = $(document).scrollTop();
				var winHeight = $(window).height();
				var layboxLeft, layboxTop;
					
					if(top - documentTop < winHeight/2 && winHeight/2 > $(".lay_pop").height()){//灞呬笅
						layboxTop = top + img.height() + 10;
						layboxLeft = left - $(".lay_pop").width()+ img.width();
						$(".lay_pop_arrow .arro_top").css({
							"display" : "block",
							"left" : left + (img.width())/2 - 8 + 'px',
							"top" : top + img.height() + 2 + 'px'
						}).siblings().hide();
					}else if(top - documentTop > winHeight/2 && winHeight/2 > $(".lay_pop").height()){//灞呬笂
						layboxTop = top - $(".lay_pop").height() -10;
						layboxLeft = left - $(".lay_pop").width()+ img.width();
						$(".lay_pop_arrow .arro_bot").css({
							"display" : "block",
							"left" : left + (img.width())/2 - 8 + 'px',
							"top" : top - 12 + 'px'
						}).siblings().hide();
					}else if(winHeight/2 < $(".lay_pop").height() && left > $(".lay_pop").width()){//灞呭乏
						layboxLeft = left - $(".lay_pop").width() - 10;
						if(winHeight/2 > top - documentTop){
							layboxTop = documentTop + 10;
						}else{
							layboxTop = documentTop + winHeight - $(".lay_pop").height() - 10;
						}
						$(".lay_pop_arrow .arro_left").css({
							"display" : "block",
							"left" : left - 12 + 'px',
							"top" : top + (img.height())/2 - 8 + 'px'
						}).siblings().hide();
					}else if(winHeight/2 < $(".lay_pop").height() && left < $(".lay_pop").width()){//灞呭彸
						layboxLeft = left + img.width() + 10;
						if(winHeight/2 > top - documentTop){
							layboxTop = documentTop + 10;
						}else{
							layboxTop = documentTop + winHeight - $(".lay_pop").height() - 10;
						}
						$(".lay_pop_arrow .arro_right").css({
							"display" : "block",
							"left" : left + img.width() + 2 + 'px',
							"top" : top + (img.height())/2 - 8 + 'px'
						}).siblings().hide();
					}
				$(".lay_pop").css({
					'left' : layboxLeft + 'px',
					'top' : layboxTop + 'px'
				});
			},function(){
				var img = $(this);
				delayHide(img);
			});
	}
	//lay_pop();
	/* 澶村儚缁撴潫 */
	/* 鍘绘帀鏈€鍚庝竴琛屽垪琛ㄧ殑涓嬭竟妗嗗紑濮� */
	var deleteBorder = function(){
		$(".ctcdatabox").each(function(){
			$(this).find(".contacts").eq(-1).css("border-bottom" , 0);
			if($(this).is(".ctcdatabox_hy") == false){
				var len = $(this).find(".contacts").length;
				if(len % 2 == 0){
					$(this).find(".contacts").eq(-2).css("border-bottom" , 0);
				}
			}
		});
	}
	deleteBorder();
	/* 鍘绘帀鏈€鍚庝竴琛屽垪琛ㄧ殑涓嬭竟妗嗙粨鏉� */
	$(".poptab_bj_sub ul li").click(function(){
		var index = $(this).index();
		$(this).addClass("cur").siblings("li").removeClass("cur")
		$(".poptab_bjbox .poptab_bj").eq(index).show().siblings(".poptab_bj").hide();
		
	
	});
	/*鑿滃崟鎮诞鍦ㄩ〉闈㈤《閮ㄥ紑濮�*/
	var fixnavscroll =function(){
		//鍙瘮杈冪涓€娆¤幏鍙栫殑鍊�
		if($(".index_tabbox").length != 1 && $(".mrfixboxall").length != 1){
			return;
		}
		if($('.index_tabbox').length){
			var ml_top=$('.index_tabbox').offset().top
			}
		if($('.mrfixboxall').length){
			var mr_top=$('.mrfixboxall').offset().top
			}

		//澧炲姞涓€涓崰浣嶇殑div锛屼笉鐒堕〉闈㈠氨閲嶆柊缁樺埗浜嗭紝杩欏湪ie娴忚鍣ㄩ噷浼氬嚭鐜版€紓鐨勯棶棰�
		if(!$(".index_tabbox .blank_div").length){
			$(".index_tabbox .tab_sub").after('<div class="blank_div" style="display:none;"></div>');
			$(".index_tabbox .blank_div").height($(".index_tabbox .tab_sub").height());
		}
		if(!$(".mrfixboxall").length){
			$(".mrfixboxall").after('<div class="blank_div_right" style="display:none;"></div>');
			$(".blank_div_right").height($(".mrfixboxall").height());
		}
		$(window).scroll(function(){
			//鍙樺寲鐨勫€�
			var ml_left=$(".index_tabbox").offset().left;
			var mr_left=$(".mainindex_r").offset().left;
			if($(document).scrollTop()>=ml_top){
					$(".index_tabbox .tab_sub").css({
					"position":"fixed",
					"width":828,
					"z-index":"80",
					"left":ml_left+'px',
					"top":0
					})
					$(".index_tabbox .blank_div").show();
				}else{
					$(".index_tabbox .tab_sub").css({
					"position":"relative",
					"width":"auto",
					"left":0,
					"top":0
					})
					$(".index_tabbox .blank_div").hide();
				}
			 
			if($(document).scrollTop()>=mr_top){
					$(".mrfixboxall").css({
					"position":"fixed",
					"width":340,
					"z-index":"80",
					"left":mr_left+'px',
					"top":0
					})
					// $(".blank_div_right").show();
				}else{
					$(".mrfixboxall").css({
					"position":"relative",
					//"width":"auto", //璁剧疆鑷姩瀹藉害鍦╥e7閲岄潰鏈塨ug锛屾晠鍒犻櫎
					"left":0,
					"top":0
					})
					$(".blank_div_right").hide();
				}
			
		});
		$(window).resize(function(){
			//鍙樺寲鐨勫€�
			var ml_left=$(".index_tabbox").offset().left;
			var mr_left=$(".mainindex_r").offset().left;
			if($(document).scrollTop()>=ml_top){
					$(".index_tabbox .tab_sub").css({
					"left":ml_left+'px'
					})
				}else{
					$(".index_tabbox .tab_sub").css({
					"left":0
					})
				}
			 
			if($(document).scrollTop()>=mr_top){
					$(".mrfixboxall").css({
					"left":mr_left+'px'
					})
				}else{
					$(".mrfixboxall").css({
					"left":0
					})
				}
			
		});
		
	}
	
	fixnavscroll();
	
	/*鑿滃崟鎮诞鍦ㄩ〉闈㈤《閮ㄧ粨鏉�*/
    /**
     * 宸︿晶鍒嗙被鍒囨崲
     */
    $(".side_sub").click(function(){
        var index = $(this).parent(".side_sub_box").index()
        $(this).addClass("side_sub_cur").parent(".side_sub_box").siblings().find(".side_sub").removeClass("side_sub_cur");
        $(this).parents(".groupside ").next(".ctcside").find(".ctcside_tab").eq(index).show().siblings(".ctcside_tab").hide();

    });
    $(".side_sub_sec a").click(function(){
        var sion =$(this).parent(".side_sub_sec").next(".side_sub_threbox");
        sion.toggle();
        if(sion.is(':visible')==false){
            $(this).find(".subicon").removeClass("icon_kjian").addClass("icon_kjia");
            $(this).parent(".side_sub_sec").find(".side_edit").text("缂栬緫")
        }else{
            $(this).find(".subicon").removeClass("icon_kjia").addClass("icon_kjian");
        }
        $(this).parent(".side_sub_sec").next(".side_sub_threbox").find(".side_editconbox").hide();
    });
    $(".side_edit").hover(function(){
        $(this).addClass("side_edit_h");
    },function(){
        $(this).removeClass("side_edit_h");
    });
    $(".side_edit").click(function(){
        $(this).text($(this).text() == "缂栬緫" ? "鍙栨秷" : "缂栬緫");
        var sion =$(this).parent(".side_sub_sec").next(".side_sub_threbox");
        $(this).parents(".side_sub_box").find(".side_editconbox").toggle();
        //sion.toggle();
        if(sion.is(':visible')==false){
            $(this).parent(".side_sub_sec").next(".side_sub_threbox").show();
            $(this).parent(".side_sub_sec").next(".side_sub_threbox").find(".side_editconbox").show();
            $(this).parent(".side_sub_sec").find(".subicon").removeClass("icon_kjia").addClass("icon_kjian");
        }
    })

    /*娑堟伅椤靛嬀閫夋寜閽紑濮�*/
	var mailbtn_fun = function(){
			$("body").click(function(){
				$(".hidechancebox").hide();
				$(".btn_gx").find("span").removeClass("up")
			});
			$(".btn_gx").click(function(e){
				e.stopPropagation();
				$(this).find("span").toggleClass("up")
				$(this).find(".hidechancebox").toggle();
				$(this).siblings().find(".hidechancebox").hide();
				$(this).siblings().find("span").removeClass("up");
			});
			$(".hidechancebox a").click(function(e){
				e.stopPropagation();
				var text=$(this).text();
				$(this).parents(".btn_gx").find(" em").text(text)
				$(this).parent(".hidechancebox").hide();
				$(this).parents(".btn_gx").find("span").removeClass("up")	
			})
	}
	mailbtn_fun();
	/*娑堟伅椤靛嬀閫夋寜閽粨鏉�*/



	/*璁剧疆淇敼鍏虫敞寮€濮�*/
	var set_MyFoucs = function(){
			if($("#container").length){
				var $container = $('#container');
					$container.imagesLoaded(function(){
					$container.masonry({
					itemSelector: '.kclist',
					columnWidth:12 //姣忎袱鍒椾箣闂寸殑闂撮殭涓�5鍍忕礌
					});

				});
			}

			$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail b").hide();

			$("#gzjs_box_st .set_Foucs_hide ul li span").click(function(){
					var course=$(this).text();
					var tech_id = $(this).attr("id");
					var flag = false;
					$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in li:not('.modify_gz')").each(function(){
						var txt = $(this).find("a").text();
						if(course == txt && tech_id == $(this).attr("id")){
							$(this).remove();
							flag = true;
						}
					});
                    if (flag == true) {
                        $(this).toggleClass("active");
                    }
					if ($("#gzjs_box_st .set_My_Foucsbox .set_foucs_in li:not('.modify_gz')").length >= 8) {
						flag = true;
						alert("鏈€澶氬彲浠ラ€夋嫨8涓�");
					}
					if(flag == false){
						$(this).toggleClass("active");
						$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .modify_gz").before("<li class='foucs_detail foucs_detail_editor' id='"+ tech_id +"'><a>"+course+"</a><b>脳</b></li>")
					}

					$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail").addClass("foucs_detail_editor");
					$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail b").show();
					$("#gzjs_box_st .set_foucs_in .modify_gz").show();
					$("#gzjs_box_st .set_foucs_in").addClass("btn_on")
					//$("#gzjs_box_st .auto_ru").show();

			})



			$("#gzjs_box_st .set_foucs_in").on("click",".foucs_detail_editor b",function(){
				var pos_name=$(this).parents("li").attr("pos");
				var txt = $(this).parents("li").find("a").text();
				$(this).parents("li").remove();
				var tech_Id = $(this).parent().attr("id");
				$("#gzjs_box_st .set_Foucs_hide #"+tech_Id).removeClass("active");
				$("#gzjs_box_st .set_foucs_in").addClass("btn_on");
				return ;
				/*$("#gzjs_box_st .set_Foucs_hide ul li span").each(function(){
					var span_pos =$(this).parents("li").index();
					var span_txt =$(this).text();
					if(pos_name==span_pos&&txt==span_txt){
						$(this).removeClass("active");
					}
				})*/


			})
			$("#gzjs_box_st .set_Foucs_hide ul li span").hover(function(){
				$(this).addClass("s_h");
			},function(){
				$(this).removeClass("s_h")
			});

			$("#gzjs_box_st .set_foucs_in .modify_gz").click(function(){
				//$("#gzjs_box_st .auto_ru").hide();
				$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail_editor").removeClass("foucs_detail_editor").addClass("foucs_detail")
				$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail b").hide();
				$(this).hide();
				$("#gzjs_box_st .set_foucs_in .modify_gz").show();
				$("#gzjs_box_st .set_foucs_in").addClass("btn_on")
			})

			/*榧犳爣缁忚繃鍏ㄩ儴鍙紪杈�
			$("#gzjs_box_st .set_foucs_in").hover(function(){
				$(this).find(".foucs_detail").addClass("foucs_detail_editor");
				$(this).find(".foucs_detail b").show();
				$("#gzjs_box_st .set_foucs_in .modify_gz").show();
			},function(){
				if($(this).hasClass("btn_on")==false){
					$(this).find(".foucs_detail").removeClass("foucs_detail_editor");
					$(this).find(".foucs_detail b").hide();
					$("#gzjs_box_st .set_foucs_in .modify_gz").hide();
				}

			});*/
			$("#gzjs_box_st .set_foucs_in").on("mouseover",".foucs_detail",function(){
				if($(this).parent().hasClass("btn_on")==false){
					$(this).addClass("foucs_detail_editor").siblings().removeClass("foucs_detail_editor");
					$(this).find("b").show();
					$("#gzjs_box_st .set_foucs_in .modify_gz").show();
				}else{
					$(this).addClass("foucs_detail_editor")
					$(this).find("b").show();
					$("#gzjs_box_st .set_foucs_in .modify_gz").show();
				}
			})
			$("#gzjs_box_st .set_foucs_in").on("mouseout",".foucs_detail",function(){
				if($(this).parent().hasClass("btn_on")==false){
					$("#gzjs_box_st .set_foucs_in .modify_gz").hide();
					$(this).removeClass("foucs_detail_editor");
					$(this).find("b").hide();
				}else{
						$(this).find("b").show();
						//$(this).removeClass("foucs_detail_editor");
						//$("#gzjs_box_st .set_foucs_in .modify_gz").show();
					}


			})

			$("#gzjs_box_st .set_foucs_in .modify_gz").click(function(){
				$(this).hide();
				$("#gzjs_box_st .set_Foucs_promo").hide();
				$("#gzjs_box_st .auto_ru").show();
				$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail").removeClass("foucs_detail_editor");
				$("#gzjs_box_st .set_My_Foucsbox .set_foucs_in .foucs_detail b").hide();
			})


		}
	set_MyFoucs();
	/*璁剧疆淇敼鍏虫敞缁撴潫*/
	
	/*璁剧疆鎵嬫満鍙戦€侀獙璇佺爜寮€濮�*/
	var to_mess = function(){
		var wait=60; 
		var timer;//璁剧疆瀹氭椂鍣ㄥ弬鏁�		
		function time(o) { 
			if (wait == 0) { 
				o.removeAttribute("disabled"); 
				o.value="鍙戦€侀獙璇佺爜"; 
				wait = 60; 
				//鍙戦€佹垚鍔熷悗鍒犻櫎绫诲悕tomessbtn_dis
				$(o).removeClass('tomessbtn_dis');
				clearTimeout(timer);
			} else { 
			o.setAttribute("disabled", true); 
			o.value="閲嶆柊鍙戦€�" + wait + "s"; 
			wait--; 
			setTimeout(function() { 
			time(o) 
			}, 1000) 
			} 
		} 
		$(".tomessbtn").click(function(){
			$(".tomessbtn").addClass("tomessbtn_dis");
			time(this);
		})
		
	}
	//to_mess();
	
	/*璁剧疆鎵嬫満鍙戦€侀獙璇佺爜缁撴潫*/

	/*瀹氬埗鎺ㄨ崘鍏虫敞寮€濮�*/
	var dz_MyFoucs = function(){
		if($("#container").length){
			var $container = $('#container');
			$container.imagesLoaded(function(){
				$container.masonry({
					itemSelector: '.kclist',
					columnWidth:12 //姣忎袱鍒椾箣闂寸殑闂撮殭涓�5鍍忕礌
				});

			});
		}
		$("#gzjs_box_dz .set_My_Foucsbox .set_foucs_in .foucs_detail b").show();
		$("#gzjs_box_dz .set_Foucs_hide ul li span").click(function(){
			var index = $(".Foucsdetail .set_foucs_in .foucs_detail").length;
			if(index > 8){
				return ;
			}
			index += 1
			var course=$(this).text();
			var flag = false;
			var classAttr = $(this).attr("class").split(" ")[0];
			var classFlag = $(".set_foucs_in ."+classAttr).attr("class");

			$(this).toggleClass("active");
			if(classFlag != undefined && classFlag.indexOf("active") != -1){
				flag = true;
				$(this).removeClass("active");
			}

			var id=classAttr.split("_")[1];
			if(flag == false){
				$("#gzjs_box_dz .set_My_Foucsbox .set_foucs_in .modify_gz").after("<li attr-id='"+id+"' class='foucs_detail "+classAttr+"' pos='" + index + "'><a>"+course+"</a><b>脳</b></li>")
				$(".rq_tq ul").append("<li onclick='getUserByCustom("+id+");' id='jsAttention_"+id+"'  pos='" + index + "'><a>"+course+"</a></li>")

			}else{
				var pos_name=$(this).parents("li").index();
				$("#jsGetUserInfo li#jsAttention_"+id).remove();
				$("ul.set_foucs_in li.tech_"+id).remove();
			}
		})

		$("#gzjs_box_dz .set_foucs_in").on("click",".foucs_detail b",function(){
			var pos_name=$(this).parents("li").attr("pos");
			var txt = $(this).parents("li").find("a").text();
			var id = $(this).parents("li").attr("attr-id");
			$(this).parents("li").remove();
			var classAttr = $(this).parents("li").attr("class").split(" ")[1];

			var classFlag = $(".set_Foucs_hide ."+classAttr).attr("class");
			//if(classFlag != undefined && classFlag.indexOf("active") != -1){
			$(".set_Foucs_hide ."+classAttr).removeClass("active");
			$(".set_Foucs_hide ."+classAttr).removeClass("s_h");
			$("#jsGetUserInfo li#jsAttention_"+id).remove();
			//}

		})

		$(".rq_tq ul").on("click","li",function(){
			$(this).addClass("li_active").siblings().removeClass("li_active")
		})
		$("#gzjs_box_dz .set_Foucs_hide ul li span").hover(function(){
			$(this).addClass("s_h");
		},function(){
			$(this).removeClass("s_h")
		});

		$("#gzjs_box_dz .set_My_Foucsbox .btnas .btnas_bc_set").click(function(){
			$("#gzjs_box_dz .set_Foucs_hide").removeClass("set_Foucs_hide_bj");
			$("#gzjs_box_dz .set_My_Foucsbox .set_foucs_in .foucs_detail_editor").removeClass("foucs_detail_editor").addClass("foucs_detail")
			//$("#gzjs_box_dz .set_My_Foucsbox .set_foucs_in .foucs_detail b").hide();
		})

	}
	dz_MyFoucs();






	/* 宸︿晶鑿滃崟娣诲姞鍒嗙被  鏀惰棌锛屼汉鑴夛紝璇讳功 */
	$(".cre_group").click(function(){
		$(this).hide();
		$(this).next(".cre_group_inp").show();
	})
	$(".btn_cancel").click(function(){
		$(this).parent(".cre_group_inp").hide();
		$(this).parent(".cre_group_inp").prev(".cre_group").show();
	});


})
$(function(){
    //鍒ゆ柇娴忚鍣ㄦ槸鍚︽敮鎸乸laceholder灞炴€�
    supportPlaceholder='placeholder'in document.createElement('input'),
        placeholder=function(input){
            var text = input.attr('placeholder'),
                defaultValue = input.defaultValue;
            if(!defaultValue){
                input.val(text).addClass("phcolor");
            }
            input.focus(function(){
                if(input.val() == text){
                    $(this).val("");
                }
            });
            input.blur(function(){
                if(input.val() == ""){
                    $(this).val(text).addClass("phcolor");
                }
            });
            //杈撳叆鐨勫瓧绗︿笉涓虹伆鑹�
            input.keydown(function(){
                $(this).removeClass("phcolor");
            });
        };
    //褰撴祻瑙堝櫒涓嶆敮鎸乸laceholder灞炴€ф椂锛岃皟鐢╬laceholder鍑芥暟
    if(!supportPlaceholder){
        $('input').each(function(){
			valjien = $(this).attr("value");
            text = $(this).attr("placeholder");
				if(valjien==''){
				   if($(this).attr("type") == "text"){
					placeholder($(this));
				}	
			}           
        });
    }
	$(".ON_change").click(function(){
                $('#nickname').attr('require','true');
                $("#userInfoForm").checkForm();
		$(this).parents(".formlist").find(".ON_change_show").show();
		$(this).parents(".formlist").find(".ON_change_hide").hide();
	});

});




