@extends('layout.admins')
@section('title','用户权限提醒的页面')

@section('content')
<div class="col-lg-10">
    <div class="card">
        <div class="card-header">

            <strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;用户权限提醒的页面</font></font></strong>
        </div>

        <div class="alert alert-danger" role="alert">
            <h3 style="margin-top: 100px;margin-bottom: 100px;text-align: center">你没有该权限,请联系管理员</h3>
        </div>
    </div>
</div>
@endsection
