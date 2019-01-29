@extends('layout.admins')
@section('title',$title)    

@section('content')
<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
            <strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;公告添加</font></font></strong>
        </div>
        <form action="/admin/tip" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="text-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告名称</font></font></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="请输入公告名称" class="form-control"></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="text-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告内容</font></font></label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="content" placeholder="请输入公告内容" class="form-control"></div>
                </div>
               
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="status" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label></div>
                    <div class="col-12 col-md-9">
                        <select name="status" id="select" class="form-control">
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">开启</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用</font></font></option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                
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