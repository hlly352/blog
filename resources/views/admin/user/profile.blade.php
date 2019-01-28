@extends('layout.admins')
@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
        	<strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;{{$title}}</font></font></strong>
    	</div>
<!-- 
    	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
    	@endif
 -->	
        <form id="art_form" action="/admin/doprofile" method="post" enctype="multipart/form-data" class="form-horizontal">
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
@endsection

@section('js')
<script>
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
                url: "/admin/doprofile",
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
@endsection