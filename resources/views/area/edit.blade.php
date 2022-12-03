@extends('level.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Change Area Data {{ $data->id_area }}</h5>

		<form method="post" action="{{ route('area.update', $data->id_area) }}">
			@csrf
            <div class="mb-3">
                <label for="id_area" class="form-label">ID area</label>
                <input type="text" class="form-control" id="id_area" name="id_area" value="{{ $data->id_area }}">
            </div>
            <div class="mb-3">
                <label for="area_name" class="form-label">Area Name</label>
                <input type="text" class="form-control" id="area_name" name="area_name" value="{{ $data->area_name }}">
            </div>
			<div class="mb-3">
                <label for="area_grade" class="form-label">Area Grade</label>
                <input type="text" class="form-control" id="area_grade" name="area_grade" value="{{ $data->area_grade }}">
            </div>
            <div class="mb-3">
                <label for="area_location" class="form-label">Area Location</label>
                <input type="text" class="form-control" id="area_location" name="area_location" value="{{ $data->area_location }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>

@stop