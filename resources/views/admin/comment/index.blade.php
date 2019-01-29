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
                    		<div class="col-sm-12 col-md-6">
                    			<div class="dataTables_length" id="bootstrap-data-table_length">
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
                    		<div class="col-sm-12 col-md-6">
                    			<div id="bootstrap-data-table_filter" class="dataTables_filter">
                    				<label>
                    					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索：</font></font>
                    					<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table">
                    				</label>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
			                        <thead>
			                            <tr role="row">
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编号</font></font>
			                            	</th>
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章标题</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 397px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">内容</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 181px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">时间</font></font>
			                            	</th>
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">评论人</font></font>
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
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			                            {{gettitle($v->art_id)}} 
			                            </font></font></td>
			                             <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->content}}</font></font></td>
			                              <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{date('Y-m-d H:i:s',$v->name)}}</font></font></td>
			                            
			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
			                            		  {{getAuthor($v->uid)}} 

			                            </font></font></td>
			                            <td><font style="vertical-align: inherit;" ><font style="vertical-align: inherit;">
			                            	<a href="/admin/comment/del?id={{$v->id}}" >
												
												<button  class="btn btn-outline-danger" onclick="return confirm('确认删除')">删除</button>
											</a>

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
	                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">显示57个参赛作品中的1到50</font></font>
	                    		</div>
	                    	</div>
	                    	<div class="col-sm-12 col-md-7">
	                    		<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
	                    			<ul class="pagination">
	                    				<li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous">
	                    					<a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link"><font style="vertical-align: inherit;">
	                    						<font style="vertical-align: inherit;">以前</font></font>
	                    					</a>
	                    				</li>
	                    				<li class="paginate_button page-item active">
	                    					<a href="#" aria-controls="bootstrap-data-table" data-dt-idx="1" tabindex="0" class="page-link">
	                    						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font>
	                    					</a>
	                    				</li>
	                    				<li class="paginate_button page-item ">
	                    					<a href="#" aria-controls="bootstrap-data-table" data-dt-idx="2" tabindex="0" class="page-link">
	                    						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font>
	                    					</a>
	                    				</li>
	                    				<li class="paginate_button page-item next" id="bootstrap-data-table_next">
	                    					<a href="#" aria-controls="bootstrap-data-table" data-dt-idx="3" tabindex="0" class="page-link">
	                    						<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下一个</font></font>
	                    					</a>
	                    				</li>
	                    			</ul>
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
	</script>
@endsection