@extends('layouts.app2')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Upload</div>

					<div class="panel-body">
						<form action = "{{URL::to('upload')}}" method="post" enctype="multipart/form-data">
						
						
						
						<div class="form-group">
						<label class="col-md-4 control-label">Select image to upload</label>
							<div class="col-md-6">
								<input type="file" name="file" id="file"></br>
								<button class="btn" type="submit" value="upload" name="submit">Upload</button>
						<!--		<input type="submit' value="upload" name="submit">	-->
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
