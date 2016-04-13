@extends('layouts.app')

@section('content')
<!-- <form enctype="multipart/form-data" class="dropzone" action="" method="post">

    {!! csrf_field() !!}
    <div class="fallback">
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material form-material-primary">
                    <input class="form-control" type="file" id="dropzone-uploader" name="document" >
                    <label for="dropzone-uploader">Please upload documents</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <button class="btn btn-block btn-success" type="submit"><i class="fa fa-arrow-right pull-right"></i>Upload</button>
            </div>
        </div>
    </div>
</form> -->
<div class="container">
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	<form enctype="multipart/form-data" action="" method="post">

		{!! csrf_field() !!}

		<fieldset class="form-group">
		    <label for="description">Description</label>
		    <input name="description" type="text" class="form-control" id="description" placeholder="Description">
		    <small class="text-muted">Give a brief description of the file.</small>
		</fieldset>
		<fieldset class="form-group">
		    <label for="file">Click to Upload File</label>
		    <input type="file" class="form-control-file" id="file" name="file">
	    </fieldset>
	    <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection
