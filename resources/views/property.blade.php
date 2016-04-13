@extends('layouts.app')

@section('content')
<div class="container" id="dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$property->name}} Dashboard <div style="float:right;"><a href="{{ URL::to('/show-faq') }}/{{$property->id}}">View FAQ</a></div></div>

                    {!! csrf_field() !!}

                    <div class="panel-body">
                        <div class="stat-section">
                            @if($property->start_date !== '')
                            <p>{{$property->start_date}} - {{$property->end_date}}</p><br>
                            @else
                            <p>No Dates Added</p><br>
                            @endif
                            <p>Total Count Of Residents: {{count($property->residents)}}</p>
                            <p>Total Amount of Enrollment: {{count($adopted)}}</p>
                            @if(count($property->residents) !== 0)
                            <p>Percent of Enrollment: {{number_format(count($adopted)/count($property->residents)*100, 2)}}%</p>
                            @else
                            <p>No Residents Yet</p>
                            @endif
                        </div>
                        <table id="property-table" class="table">
                            <thead>
                                <tr>
                                    <th>Tenant ID</th>
                                    <th>Unit</th>
                                    <th class="table-name">Name</th>
                                    <th class="table-phone">Phone 1</th>
                                    <th class="table-phone">Phone 2</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="table-enroll">Enrolled Status</th>
                                    <th>Charge Added</th>
                                    <th>Charge Amount if Applicable</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($property->residents as $resident)
                                        <tr>
                                            <td>{{$resident->tenant_id}}</td>
                                            <td>{{$resident->unit}}</td>
                                            <td>{{$resident->name}}</td>
                                            <td>{{$resident->phone_1}}</td>
                                            <td>{{$resident->phone_2}}</td>
                                            <td>{{$resident->email}}</td>
                                            <td>{{$resident->status}}</td>
                                            <td>
												<?php												
													$enrolled = str_replace("Blank"," ",$property->enrollment_status);
													$splitedArr = @explode(",",$enrolled);
													//print_r($splitedArr);
													$totalC = count($splitedArr);
												?>
												
												<select name="enrolled" residentid="{{$resident->id}}" class="ajax">
                                                @for($i=0; $i<$totalC; $i++)
													 <option value="{{$splitedArr[$i]}}" @if($resident->enrolled==$splitedArr[$i]) {{'selected'}} @else{{''}} @endif>{{$splitedArr[$i]}}</option>
                                                @endfor
                                            </select><span style="color:#fff">{{$resident->enrolled}}</span></td>
                                            <td>
                                                <select residentid="{{$resident->id}}" name="charge-added" class="charge">
                                                    <option value=""></option>
                                                    @if($resident->charge == 'Yes')
                                                    <option selected value="Yes">Yes</option>
                                                    @else
                                                    <option value="Yes">Yes</option>
                                                    @endif
                                                    @if($resident->charge == 'No')
                                                    <option selected value="No">No</option>
                                                    @else
                                                    <option value="No">No</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <input style="border:1px solid lightgray;" type="text" residentid="{{$resident->id}}" name="amount" class="charge-amount" value="{{$resident->charge_amount}}">
                                            </td>
                                            <td>
												<?php 												
													//$results = DB::select("select * from notes where resident_id = '".$resident->id."'");
													$results = DB::table('notes')->where('resident_id', $resident->id)->count();
													//print_r($results);
												?>
												<button type="button" class="btn btn-info btn-sm" data-toggle="modal" id="{{$resident->id}}" data-target="#myModal">Notes({{$results}})</button></td>
                                            <td><a data-toggle="tooltip" title="Delete" class="confirm" href="/delete/resident/{{$resident->id}}"><i style="color:red;margin-top:7px;" class="fa fa-times"></i></a></td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="POST" action="" class="note-form">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Notes</h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button class="note-button btn btn-success">Add New Note</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection
