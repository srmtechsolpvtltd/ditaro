@extends('layouts.app')

@section('content')

<?php 
$user = Auth::user();
//echo $user->property_id.'<pre>';print_r($user);
?>
<div class="container" id="faqs">
    <div class="row">
        <h3>FAQs</h3> 
        @if(count($faq)>0)       
        <h4 class="faq-title">Property Manager FAQ</h4>
        <div class="col-md-12 panel-group" id="accordion" role="tablist" aria-multiselctable="true">
            <div class="panel panel-default">
                <?php $i=1;?>
                @foreach($faq as $fa)
                
				<div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$fa->id}}" aria-expanded="true" aria-controls="collapse{{$fa->id}}">
                            {{ $fa->title}}
                        </a>
                    <div style="float:right;">@if($user->property_id== null)<a href="{{url('/faq-update')}}/{{$fa->id}}">Edit</a>@endif</div>
                    </h4>
                </div>
                <div id="collapse{{$fa->id}}" class="panel-collapse collapse <?php if($i==1) echo "in";?>" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>{{ $fa->description}}</p>
                    </div>
                </div>
                <?php $i++;?>
                @endforeach
                
            </div>
        </div>
        @else
			<div>No Faq found!!</div>
        @endif
        
        
    </div>
</div>
@endsection
