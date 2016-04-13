@extends('layouts.app')

@section('content')
<div class="container">
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
                        <input type="hidden" name="property" value="{{$property->id}}">
                        <div class="form-group">
                            <label class="control-label" for="csv">Please Select the Rent Roll</label>
                            <input name="csv" type="file">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
