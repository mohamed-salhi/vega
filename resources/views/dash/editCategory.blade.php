@extends('dash.master')
@section('title' , 'Edit Category | Vega')
@section('content')
     @include('inc.errors')
    <form method="post" action="{{route('category.update' , $category->id)}}" class="mx-5 col-8">
      @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Name</label>
            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>

    </form>



@stop
