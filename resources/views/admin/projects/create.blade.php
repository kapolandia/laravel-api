@extends('layouts.admin')

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

<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Project Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Cover Image</label>
      <input class="form-control" type="file" id="formFile" name="cover_image">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Client Name</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="client_name">
    </div>
    
    <div class="mb-3">
      <label for="type" class="form-label">Project Type</label>
      <select class="form-select" id="type" name="type_id">
        <option selected disabled>Choose a type</option>
        @foreach ($types as $type)
          <option value="{{ $type->id }}" >{{$type->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <h5>Technologies</h5>
      @foreach ($technologies as $technology)
        <div class="form-check">
          <input class="form-check-input" @checked(in_array($technology->id, old('technologies', []))) name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
          <label class="form-check-label" for="technology-{{ $technology->id }}">
            {{ $technology->name }}
          </label>
        </div>
      @endforeach
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Summary</label>
        <textarea type="text" class="form-control" id="exampleInputPassword2" name="summary"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection