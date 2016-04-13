@extends('layouts.app')

@section('content')
<div class="container" id="import">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="col-md-12 form-horizontal" action="{{ url('import')}}" method="POST" enctype="multipart/form-data">
                        
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label" for="property-select">Please choose a property for this import.</label><br>
                                <select class="form-control import-content" name="property" id="property-select">
                                    @foreach($properties as $property)
                                        <option value="{{$property->id}}">{{$property->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="control-label" for="csv">Please Select the Rent Roll</label>
                            <input class="import-content" name="csv" type="file"><br/>
                            <a href="{{url('document')}}/sample_resident.csv">Download Sample File</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success submit-button" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
