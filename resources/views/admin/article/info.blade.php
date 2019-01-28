@extends('layout.admins')

@section('title',$title)

@section('content')
	<div class="card-body">
        <div class="corner-ribon blue-ribon">
        	 <i class="fa fa-twitter"></i>
 		</div>
		 <a href="#">
         <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
           </a>
                      <h2>{{$rs->title}}</h2>
                     <p>{{$rs->description}}</p>
                     <p>{{$rs->content}}</p>
                     
                                       

                 
    </div>
@stop