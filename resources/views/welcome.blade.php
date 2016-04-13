@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Property Name</th>
                                <th>Enrollment Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>{{$property->name}}</td>
                                    <td>{{round(count($adopted)/count($property->residents)*100, 2)}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
