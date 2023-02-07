@extends('dash.master')
@section('title' , 'Add Category | Vega')
@section('content')
    @include('inc.errors')
    <form method="post" action="{{route('category.store')}}" class="mx-5 col-8">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>

    </form>

@stop
