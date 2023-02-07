@extends('dash.master')
@section('title' , 'Add Project | Vega')

@section('content')
     @include('inc.errors')
    <form method="post" enctype="multipart/form-data" action="{{route('project.store')}}" class="mx-5 col-8">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project desc</label>
            <input type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project Category</label>
            <select type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <option value="" selected disabled>Select Category</option>
               @foreach($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project alpum</label>
            <input type="file" name="alpum[]" multiple class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project video </label>
            <input type="text" name="video" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>

    </form>



@stop
