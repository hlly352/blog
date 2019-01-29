@extends('layout.centers')
@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('index')
<!-- 获取账号登录的信息 -->
@php
    $user = DB::table('user')->where('id',session('userid'))->first();
    $info = DB::table('userinfo')->where('uid',session('userid'))->first();
@endphp

<div class="lev_sec">
    <div class="lev_secin face"><a href="/home/center/{{$info->id}}/edit">修改个人资料</a></div>
    @if($info)
    <div class="lev_secin index"><a href="/home/profile/{{$info->id}}">修改头像</a></div>
    @else
    <div class="lev_secin index"><a href="/home/profiles">修改头像</a></div>
    @endif
</div>
@stop

@section('content')
<div class="setbox">
	<div class="Ftitle_all mb25">
	    <span class="titxet t18">修改头像</span>       
	</div>

	<div class="col-lg-10">
    <div class="card">
        <form id="art_form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <img id="img" src="{{$profile}}" width="150px"><br><br>
                    	<input type="file" id="file_upload" name="profile" >
                    </div>
                </div>
	        <div class="card-footer">
	        	{{csrf_field()}}
	        	<!-- <input class="btn btn-outline-info" type="submit" value="修改" style="margin-left: 172px"> -->
	        </div>
        </form>
    </div>
</div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('.alert').delay(2000).fadeOut(1500);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $("#file_upload").change(function () {
            // 判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp' && strExtension != 'jpeg') {
                alert("请选择图片文件");
                return;
            }
            var formData = new FormData($('#art_form')[0]);
            $.ajax({
                type: "POST",
                url: "/home/doprofile",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    //把服务器返回结果传过来 在页面中显示
                    $('#img').attr('src',data);
                    alert('修改成功');
                    location.reload(true);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
</script>
@stop