@extends('layouts.app')

@section('content')
<div class="container" id="admin">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
					@foreach($files as $file)
						<div class="col-sm-6">
							@if(Auth::user()->hasRole('admin'))
							<p><strong>{{$file->property->name}}</strong></p>
							@endif
							<p>Uploaded By: {{$file->user->name}} On {{$file->created_at->format('m/d/Y')}}</p>
							<p>{{$file->description}}</p>
							<p>
							<a href="{{url('document')}}/{{$file->file}}">{{$file->file}}</a>
							<a data-toggle="tooltip" title="Delete" class="confirm" href="{{url('file')}}/{{$file->id}}/delete">
							
							<i style="color:red;margin:7px 0 0 5px;" class="fa fa-times"></i>
							</a></p>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
