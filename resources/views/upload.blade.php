@extends('layouts.app2')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
				<h5>Profile Upload</h5>
				</div>

					<div class="panel-body">
						<form action = "{{URL::to('upload')}}" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
						<label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" >
							</div>
						</div></br></br></br>
						
						<div class="form-group">
						<label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" >
							</div>
						</div></br></br>
						<div class="form-group">
						<label class="col-md-4 control-label">Bio</label>
                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="bio" ></textarea>
							</div>
						</div>
						</br >
						</br ></br >
						
						<div class="form-group">
						<label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
								 <input type="radio" name="gender" value="Male" checked> Male 
								  <input type="radio" name="gender" value="Female"> Female
							</div>
						</div></br></br>
						
						<div class="form-group">
						<label class="col-md-4 control-label">Select image to upload</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="photo" id="file"></br> </br>
								
								<button class="btn primary-btn" type="submit" value="upload" name="submit">Upload</button>
						<!--		<input type="file" name="foto" value="{{csrf_token() }}">	-->
								<input type="hidden" value="{{csrf_token() }}" name="_token">	
							</div>
						</div>
						</form>				
					</div>
            </div>
        </div>
    </div>
</div>
@endsection
