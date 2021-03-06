@extends('layout.admins')
@section('title',$title)    

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}   
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}   
    </div>
@endif
 @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-2.0.3.min.js"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/fileinput_locale_de.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
            <strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;广告添加</font></font></strong>
        </div>
        <form action="/admin/advert" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="text-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告名称</font></font></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="广告名称" class="form-control"></div>
                </div>
                <class enctype="multipart/form-data">
                <input name="profile" id="file-0" class="file" type="file" multiple data-min-file-count="1">
                <br>
                </class>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="text-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">链接地址</font></font></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="url" placeholder="请输入地址" class="form-control"></div>
                </div>
                <div class="row form-group">
                  <!--   <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="status" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label></div>
                    <div class="col-12 col-md-9">
                        <select name="status" id="select" class="form-control">
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">开启</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用</font></font></option>
                        </select>
                    </div> -->
                </div>
            </div>
            <div class="card-footer">
            {{csrf_field()}}
                <input class="btn btn-outline-info" type="submit" value="提交" style="margin-left: 172px">
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script>
        $('.alert').delay(2000).fadeOut(1500);
    </script>
@stop