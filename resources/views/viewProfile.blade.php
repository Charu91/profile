@extends('layouts.app2')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
					<div class="panel-body">
						
						@foreach( $profiles as $profile )
							<div class="table table-bordered bg-success">
								<div class="row">
									<div class="col-md-6"><h3>
										{{$profile->first_name}}
										{{$profile->last_name}}</h3>
										{{$profile->gender}}<br>
									<h4><p>{{$profile->bio}}</p></h4>
									</div>
									<div class="col-md-6">
										<img class="roundrect" src="{{ url('/Uploads/'.$profile->photo) }}" style="width:350px;height:300px;"></span>
									</div>								
								</div>
							</div>
						@endforeach
					</div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
.roundrect {
border-radius: 15px;
}
</style>
