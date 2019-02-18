@extends('layout.admins')
@section('title',$title)

@section('content')
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
                <!--     			<div class="dataTables_length" id="bootstrap-data-table_length">
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
 -->                    		</div>
                    		<div class="col-sm-12 col-md-6">
                    			<!-- <div id="bootstrap-data-table_filter" class="dataTables_filter">
                    				<label>
                    					<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">搜索：</font></font>
                    					<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table">
                    				</label>
                    			</div> -->
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-12">
                    			<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
			                        <thead>
			                            <tr role="row">
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告名</font></font>
			                            	</th>
			                            	<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告图片</font></font>
			                            	</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 248px;">
                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告图片</font></font>
                                            </th>
			                            <!-- 	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 181px;">
			                            		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font>
			                            	</th> -->
			                            	<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;"><font style="vertical-align: inherit;">
			                            		<font style="vertical-align: inherit;">操作</font></font>
			                            	</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        <tr role="row" class="odd">
                                    @foreach($res as $k => $v)
			                            <td class="sorting_1"><font style="vertical-align: inherit;">{{$v->name}}<font style="vertical-align: inherit;"></td>

                                        <td><font style="vertical-align: inherit;"><img src="{{$v->profile}}" alt=""></td>

			                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->url}}</font></font></td>

			                            <!-- <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->status==0?'开启':'禁用'}}</font></font></td> -->

			                            <td>
                                          <a href="/admin/advert/{{$v->id}}/edit"><button class="btn btn-outline-info">编辑</button></a>
                                        <form style='display:inline' action="/admin/link/{{$v->id}}" method='post'>
                                        {{csrf_field()}}

                                        {{method_field('DELETE')}}
                                        <button class="btn btn-outline-danger">删除</button></td>
                                        </form>
			                        </tr>
			                     @endforeach

                            <!--    <a href="" class="btn btn-outline-danger"  style="display:inline">删除</a> 
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            -->
			                        </tbody>
                    			</table>
                    		</div>
                    	</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection