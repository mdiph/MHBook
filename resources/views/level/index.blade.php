@extends('level.layout')

@section('content')

<p>Search E-Handbook:</p>
<div class="pb-3">
    <form class="d-flex" action="{{ url('level') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Enter The Keyword" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Search</button>
    </form>
</div>

<h4 class="mt-5">Level Data</h4>

<a href="{{ route('level.create') }}" type="button" class="btn btn-success rounded-3">Add Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID level</th>
        <th>Grade Level</th>
        <th>Mission Level</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_level }}</td>
                <td>{{ $data->level_grade }}</td>
                <td>{{ $data->mission_level }}</td>
                <td>
                    <a href="{{ route('level.edit', $data->id_level) }}" type="button" class="btn btn-warning rounded-3">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_level }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_level }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('level.delete', $data->id_level) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Delete {{ $data->level_grade}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Area Data</h4>

<a href="{{ route('area.create') }}" type="button" class="btn btn-success rounded-3">Add Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Area</th>
        <th>Area Grade</th>
        <th>Area Location</th>
        <th>Area Name</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($areas as $area)
            <tr>
                <td>{{ $area->id_area }}</td>
                <td>{{ $area->area_grade }}</td>
                <td>{{ $area->area_location }}</td>
                <td>{{ $area->area_name }}</td>
                <td>
                    <a href="{{ route('area.edit', $area->id_area) }}" type="button" class="btn btn-warning rounded-3">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $area->id_area }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $area->id_area }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('area.delete', $area->id_area) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Delete {{ $area->area_grade}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Monster Data</h4>

<a href="{{ route('monster.create') }}" type="button" class="btn btn-success rounded-3">Add Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Area</th>
        <th>ID Level</th>
        <th>ID Monster</th>
        <th>Monster Attribute</th>
        <th>Monster Name</th>
        <th>Monster Weakness</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($monsters as $monster)
            <tr>
                <td>{{ $monster->id_area }}</td>
                <td>{{ $monster->id_level }}</td>
                <td>{{ $monster->id_monster }}</td>
                <td>{{ $monster->monster_attribute }}</td>
                <td>{{ $monster->monster_name }}</td>
                <td>{{ $monster->monster_weakness }}</td>
                <td>
                    <a href="{{ route('monster.edit', $monster->id_monster) }}" type="button" class="btn btn-warning rounded-3">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $monster->id_monster }}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $monster->id_monster }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('monster.delete', $monster->id_monster) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Delete {{ $monster->monster_name}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop