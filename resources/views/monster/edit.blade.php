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

        <h5 class="card-title fw-bolder mb-3">Change Area Data {{ $data->id_monster }}</h5>

		<form method="post" action="{{ route('monster.update', $data->id_monster) }}">
			@csrf
            <div class="mb-3">
                <label for="id_area" class="form-label">ID Area</label>
                <input type="text" class="form-control" id="id_area" name="id_area" value="{{ $data->id_area }}">
            </div>
            <div class="mb-3">
                <label for="id_level" class="form-label">ID Level</label>
                <input type="text" class="form-control" id="id_level" name="id_level" value="{{ $data->id_level }}">
            </div>
			<div class="mb-3">
                <label for="id_monster" class="form-label">ID Monster</label>
                <input type="text" class="form-control" id="id_monster" name="id_monster" value="{{ $data->id_monster }}">
            </div>
            <div class="mb-3">
                <label for="monster_attribute" class="form-label">Monster Attribute</label>
                <input type="text" class="form-control" id="monster_attribute" name="monster_attribute" value="{{ $data->monster_attribute }}">
            </div>
            <div class="mb-3">
                <label for="monster_name" class="form-label">Monster Name</label>
                <input type="text" class="form-control" id="monster_name" name="monster_name" value="{{ $data->monster_name }}">
            </div>
            <div class="mb-3">
                <label for="monster_weakness" class="form-label">Monster Weakness</label>
                <input type="text" class="form-control" id="monster_weakness" name="monster_weakness" value="{{ $data->monster_weakness }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>
		</form>
	</div>
</div>

@stop