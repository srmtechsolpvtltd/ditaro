@extends('layouts.app')

@section('content')
<div class="container" id="home">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<div class="row">
			<h1 class="panel-heading">Property Dashboard</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-header-bg">
                        <thead>
                            <tr>
                                <th>Property Name</th>
                                <th>Enrollment Rate</th>
                                <th>Project Dates</th>
                            </tr>
                        </thead>
                        <tbody>
                            {!! $html !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
