@extends('layouts.app')

@section('content')
<div class="container" id="new-property">
	
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
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
                <div class="panel-heading">Create New Property</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo Request::root();?>/property-add" method="POST">
                    
                        {!! csrf_field() !!}
                        <div class="form-group col-md-12">
                            <label class="control-label" for="property-name">Name of Property</label>
                            <input class="form-control" id="property-name" type="text" name="property_name" value="{{ old('property_name') }}">
                        </div>
                        <div class="form-group col-md-12">
                        <label class="control-label" for="property-name">Select Resident Enrollment Status</label>
                        </div>
                         <div class="form-group col-md-12">							 
								<label class="checkbox-inline"><input type="checkbox" value="Blank" name="ennrollment_status[]" >None</label>
								<label class="checkbox-inline"><input type="checkbox" value="Tech Amenity" name="ennrollment_status[]">Tech Amenity</label>
								<label class="checkbox-inline"><input type="checkbox" value="Tv Only" name="ennrollment_status[]">Tv Only</label>	
								<label class="checkbox-inline"><input type="checkbox" value="Internet Only" name="ennrollment_status[]">Internet Only</label>					 						 
						</div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-success submit-button" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
