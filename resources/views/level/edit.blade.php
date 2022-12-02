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

        <h5 class="card-title fw-bolder mb-3">Ubah Data level {{ $data->id_level }}</h5>

		<form method="post" action="{{ route('level.update', $data->id_level) }}">
			@csrf
            <div class="mb-3">
                <label for="id_level" class="form-label">ID level</label>
                <input type="text" class="form-control" id="id_level" name="id_level" value="{{ $data->id_level }}">
            </div>
			<div class="mb-3">
                <label for="level_grade" class="form-label">level_grade</label>
                <input type="text" class="form-control" id="level_grade" name="level_grade" value="{{ $data->level_grade }}">
            </div>
            <div class="mb-3">
                <label for="mission_level" class="form-label">mission_level</label>
                <input type="text" class="form-control" id="mission_level" name="mission_level" value="{{ $data->mission_level }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop