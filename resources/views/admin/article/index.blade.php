@extends('layout.admins')



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

<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title"><font style="vertical-align:inherit;"><font style="vertical-align: inherit;">文章列表</font></font>

                    </strong>
                </div>
                <div class="card-body">
                    <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    	<form action="/admin/article" method="get">
                    	<div class="row">
                    		<div class="col-sm-12 col-md-6">
                    			<div class="dataTables_length" id="bootstrap-data-table_length">
                    				<label>
                    					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">每页显示 </font></font>
                    					<select name="nums" aria-controls="bootstrap-data-table" class="form-control-sm">
                    						<option value="10" @if($request->nums == 10) selected="selected" @endif>10</option>
                    						<option value="20" @if($request->nums == 20) selected="selected" @endif>20</option>
                    						<option value="50" @if($request->nums == 50) selected="selected" @endif>50</option>
                    					</select> 条
                    				</label>
                    			</div>
                    		</div>
                    		<div class="col-sm-12 col-md-6">
                    			<div id="bootstrap-data-table_filter" class="dataTables_filter">
                    				<label>标题:&nbsp;<input type="search" class="form-control-sm" placeholder="" aria-controls="bootstrap-data-table" name="title" value="{{isset($_GET['title']) ? $_GET['title'] : ''}}">&nbsp;<button class="btn btn-info" >搜索</button></label>
                    			</div>
                    		</div>
                    	</div>
                    	</form>
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
			                        <thead>
			                            <tr role="row">
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编号</font></font>
			                            	</th>
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 397px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">作者</font></font>
			                            	</th>
			                            	
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">阅读量</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">点赞</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">添加时间</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">操作</font></font>
			                            	</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        @foreach($res as $key => $value)
			                        @if($key % 2 == 1)
			                        <tr role="row" class="odd">
			                        @else
			                        <tr role="row" class="even">
			                        @endif
			                            <td class="sorting_1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$i}}</font></font></td>
			                            @php
			                            $i++
			                            @endphp
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->title}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->author}}</font></font></td>
			                    		
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->artinfo->read_num}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$value->artinfo->good_num}}</font></font></td>
			                            
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{date('Y-m-d H:i:s',$value->addtime)}}</font></font></td>
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="/admin/article/info?id={{$value->id}}" class="btn btn-outline-info"  style="display:inline">详情</a>&nbsp;&nbsp;<a href="/admin/article/del?id={{$value->id}}" class="btn btn-outline-danger"  style="display:inline">删除</a></font></font></td>
			                        </tr>

			                        @endforeach
			                       
			                        </tbody>
                    			</table>
                    		</div>
                    	</div>
	                    <div class="row">
	                    	<div class="col-sm-12 col-md-5">
	                    		<div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
	                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示{{$res->total()}}个用户中的{{$res->firstItem()}}到{{$res->lastItem()}}</font></font>
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
	                    		{{$res->links()}}	
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
	<script>
	
		$('.alert').delay(2000).fadeOut(1500);
	</script>
@endsection