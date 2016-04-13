@extends('layouts.app')

@section('content')
<div class="container" id="admin">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 
			<div class="row">
			<h1 class="panel-heading">Admin Dashboard</h1>
            </div>
            <div class="panel panel-default">
               

                <div class="panel-body">
					
					<div class="btn-group float_right">
                     <a class="btn btn-xs btn-default btn_property" type="button" data-toggle="tooltip" title="" href="<?php echo Request::root();?>/property-add"><i class="fa fa-plus-circle"></i> New Property</a>
                    </div>
					
					
                    
                    <table class="table table-striped table-bordered table-header-bg">
                        <thead>
                            <tr>
                                <th>Property Name</th>
                                <th>Enrolled Rate</th>
                                <th>Project Dates</th>
                                <th class="text-center">Action</th>
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
