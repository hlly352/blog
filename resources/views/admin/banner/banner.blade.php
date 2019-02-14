@extends('layout.admins')
@section('title',$title)

@section('content')

@if(session('error'))
	<div class="alert alert-danger" role="alert">
		{{session('error')}}
	</div>
@endif
@if(session('success'))
	<div class="alert alert-success" role="alert">
		{{session('success')}}
	</div>
@endif
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$title}}</font></font></strong>
                </div>
                <div class="card-body">
                    <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
			                        <thead>
			                            <tr role="row">
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px; ">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >编号</font></font>
			                            	</th>
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 500px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片</font></font>
			                            	
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">状态</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">操作</font></font>
			                            	</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        @foreach($banner as $k=>$v)
			                        <tr role="row" class="odd">
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$id++}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->title}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><img src="{{$v->pic}}" width="600px"></font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->link}}</font></font></td>
			                            <td>
			                            	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			                            		<input type="hidden" name="" value="{{$v->id}}">
			                            		@if($v->status==0)
			                            		<button class="btn btn-outline-info button">显示</button>
												@else
												<button class="btn btn-outline-danger button">隐藏</button>
												@endif										
			                            	</font></font>
			                            </td>
			                            <td style="width:200px">
			                            	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			                            		<a href="/admin/banner/{{$v->id}}/edit" class="btn btn-outline-info" style="display:inline">修改</a>
												
												<form action="/admin/banner/{{$v->id}}" method="post" style="display:inline">
													{{csrf_field()}}
													{{method_field('DELETE')}}
			                            			<button class="btn btn-outline-danger" onclick="confirm('是否确认删除')">删除</button>	
			                            		</form>
			                            	</font>
			                            </font></td>
			                        </tr>
									@endforeach
			                        </tbody>
                    			</table>
                    		</div>
                    	</div>
	                    <div class="row">
	                    	<style>
								.pagination{
									font-family: "Open Sans", sans-serif;
   									font-size: 16px;
   									font-weight: 400;
								    line-height: 1.5;
								    color: #212529;
								    text-align: left;
								    margin-left:500px;
								}								
								.pagination li {
									font-family: "Open Sans", sans-serif;
								    font-size: 16px;
								    font-weight: 400;
								    line-height: 1.5;
								    color: #212529;
									cursor: pointer;
								}
								.pagination .active{
									background: #292b35;
								    border-color: #292b35;
								    color: #fff;
								   	position: relative;
								    display: block;
								    padding: .5rem .75rem;
								    margin-left: -1px;
								    line-height: 1.25;
								    border: 1px solid #292b35;
								    text-decoration: none;
								}
								.pagination .disabled {
									position: relative;
								    display: block;
								    padding: .5rem .75rem;
								    margin-left: -1px;
								    line-height: 1.25;
								    background-color: #fff;
								    border: 1px solid #dee2e6;
								}
								.pagination a{
									position: relative;
								    display: block;
								    padding: .5rem .75rem;
								    margin-left: -1px;
								    line-height: 1.25;
								    background-color: #fff;
								    border: 1px solid #dee2e6;
								}
	                    	</style>
	                    	<div class="col-sm-12 col-md-7">
	                    		<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
	                    		{{$banner->links()}}
	                    		</div>
	                    	</div>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
	$('.alert').delay(2000).fadeOut(1500);

	$('.button').click(function(){

		var status = $(this).text();
		var id = $(this).prev().val();
		// console.log(id);
		// console.log(status);
		$.get('/admin/bannerajax',{'id':id,'status':status},function(data){
			location.reload();
		});
	});
</script>
@stop