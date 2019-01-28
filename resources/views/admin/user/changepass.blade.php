@extends('layout.admins')
@section('title',$title)

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

    	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
    	@endif
	
        <form action="/admin/dochangepass/{{$id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">旧密码</font></font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                    	<input type="password" id="text-input" name="oldpass" placeholder="请输入用户名" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="password" id="text-input" name="password" placeholder="请输入新密码" class="form-control">
                    </div>
                    <div class="col-12 col-md-3" style="line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">请输入6-12位密码</font></font>
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="password" id="text-input" name="repassword" placeholder="请确认密码" class="form-control">
                    </div>
                </div>
        	</div>
	        <div class="card-footer">
	        	{{csrf_field()}}
	        	<input class="btn btn-outline-info" type="submit" value="修改" style="margin-left: 172px">
	        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    setTimeout(function(){
        $('.alert').slideUp(1000);
    },2000)
</script>
@endsection