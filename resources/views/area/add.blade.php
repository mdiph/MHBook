@extends('level.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Add Area</h5>

            <form method="post" action="{{ route('area.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_area" class="form-label">ID Area</label>
                    <input type="text" class="form-control" id="id_area" name="id_area">
                </div>
                <div class="mb-3">
                    <label for="area_name" class="form-label">area_name</label>
                    <input type="text" class="form-control" id="area_name" name="area_name">
                </div>
                <div class="mb-3">
                    <label for="area_grade" class="form-label">area_grade</label>
                    <input type="text" class="form-control" id="area_grade" name="area_grade">
                </div>
                <div class="mb-3">
                    <label for="area_location" class="form-label">area_location</label>
                    <input type="text" class="form-control" id="area_location" name="area_location">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </form>
        </div>
    </div>

@stop