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

<style>
	.sorting_asc,.sorting{text-align:center;}
</style>
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
                    		<form action="/admin/article/type" method="get" style="width:1000px">
                    		<div class="col-sm-12 col-md-6">
                    			<div class="dataTables_length" id="bootstrap-data-table_length" style="display:inline-block;width:40%">
                    				<label>
                    					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">每页显示 </font></font>
                    					<select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                    						<option value="10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></option>
                    						<option value="20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></option>
                    						<option value="50"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></option>
                    						<option value="-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所有</font></font></option>
                    					</select>
                    				</label>
                    			</div>
                    		</div>
                    		<div class="col-md-6" style="float:right;position:relative;top:-42px;display:inline-block;width:40">
                    			<div id="bootstrap-data-table_filter" class="dataTables_filter" style="display:inline">
                    				<label>分类名:&nbsp;<input type="search" class="form-control-sm" placeholder="" aria-controls="bootstrap-data-table" name="name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">&nbsp;<button class="btn btn-info" >搜索</button></label>
                    			</div>
                    		</div>
                    	</form>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info" style="margin-top: -30px">
			                        <thead>
			                            <tr role="row">
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编号</font></font>
			                            	</th>
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">名称</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 397px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">父级分类</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 181px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">path</font></font>
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
			                        @foreach($rs as $k=>$v)
			                        @if($k % 2 == 1)
			                        <tr role="row" class="odd">
			                        @else
			                        <tr role="row" class="even">
			                        @endif
			                            <td class="sorting_1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$i}}</font></font></td>
			                            @php
											$i++;
			                            @endphp
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->name}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
											
			                            	  {{getParent($v->pid)}} 
											
			                            </font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->path}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			                            		<input type="hidden" value="{{$v->id}}" />
												@if($v->status == 1)
													<button class="btn btn-danger status">禁用</button>
												@else
												<button class="btn btn-success status">开启</button>
												@endif


			                            </font></font></td>
			                            <td style="width:750px"><font style="vertical-align: inherit;" ><font style="vertical-align: inherit;"><a href="/admin/type/add/son?id={{$v->id}}" class="btn btn-outline-info"  style="display:inline">添加子分类</a>&nbsp;<a href="/admin/article/type?pid={{$v->id}}" class="btn btn-outline-info"  style="display:inline">查看子分类</a>&nbsp;<a href="/admin/article/type/{{{$v->id}}}/edit" class="btn btn-outline-warning"  style="display:inline">修改</a>
			                            	<form method="post" action="/admin/article/type/{{{$v->id}}}" style="display:inline">
												{{method_field('DELETE')}}
												{{csrf_field()}}
												<button  class="btn btn-outline-danger" onclick="return confirm('确认删除')">删除</button>
											</form>

			                            </font></font></td>
			                        </tr>
			                        
			                            @endforeach
			                        </tbody>
                    			</table>
                    		</div>
                    	</div>
	                    <div class="row">
	                    	<div class="col-sm-12 col-md-5">
	                    		<div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
	                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示{{$rs->total()}}个用户中的{{$rs->firstItem()}}到{{$rs->lastItem()}}</font></font>
	                    		</div>
	                    	</div>
	                    	<style>
								.pagination{
									font-family: "Open Sans", sans-serif;
   									font-size: 16px;
   									font-weight: 400;
								    line-height: 1.5;
								    color: #212529;
								    text-align: left;
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
	                    		{{$rs->links()}}	
	                    		</div>
	                    	</div>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
	<script>
		$('.alert').delay(2000).fadeOut(1500);
		
		
		$('.status').click(function(){
			var status = $(this).text();
			var id = $(this).prev().val();
			$.get('/admin/statusajax',{'status':status,'id':id},function(data){
					if(data == 1){
						
					window.location.reload();
				}
				});
			});
	</script>
@endsection
