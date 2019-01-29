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
	
        <form action="/admin/banner/{{$res->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                    	<input type="text" id="text-input" name="title" placeholder="请输入标题" class="form-control" value="{{$res->title}}">
                    </div>
                    <div class="col-12 col-md-3" style="line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30字以内</font></font>
                    	</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                    	<input type="text" id="text-input" name="link" placeholder="请输入地址" class="form-control" value="{{$res->link}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片</font></font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <img src="{{$res->pic}}">
                    	<input type="file" id="file_upload" name="pic" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="select" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label></div>
                    <div class="col-12 col-md-7">
                        <select name="status" id="select" class="form-control">
                            <option value="0" @if($res->status ==0 ) selected="selected" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示</font></font></option>
                            <option value="1" @if($res->status ==1 ) selected="selected" @endif><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">隐藏</font></font></option>
                        </select>
                    </div>
                </div>
        	</div>
	        <div class="card-footer">
	        	{{csrf_field()}}
                {{method_field('PUT')}}
	        	<input class="btn btn-outline-info" type="submit" value="提交" style="margin-left: 172px">
	        </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('.alert').delay(2000).fadeOut(1500);
</script>
@stop