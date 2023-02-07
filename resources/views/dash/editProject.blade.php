@extends('dash.master')
@section('title' , 'Edit Project | Vega')

@section('content')
     @include('inc.errors')
    <form method="post" enctype="multipart/form-data" action="{{route('project.update' , $pro->id)}}" class="mx-5 col-8">
      @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1"  class="form-label">Edit Category Name</label>
            <input type="text" name="name" value="{{$pro->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Descrption</label>
            <input type="text" name="desc" value="{{$pro->desc}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Descrption</label>
            <select type="text" name="category"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <option value="{{ $pro->category_id }}" selected>
                    {{$pro->category->name}}
                  </option>
                @foreach($category as $i)
                <option value="{{ $i->id }}">{{ $i->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Image</label>
            <input type="file" name="image"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Album</label>
            <input type="file" name="alpum[]" multiple class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edit Category Video</label>
            <input type="text" name="video" value="{{$pro->video}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('project.index') }}" class="btn btn-danger">Cancel</a>

    </form>
      <h4 class="ml-5 mt-4">Project Image</h4>
     <img width="400" class="ml-5 mt-3" src="{{ asset('upload/images/' . $pro->image) }}">

     <h4 class="ml-5 mt-4">Project Album</h4>
     @php
         $images = explode(',' , $pro->alpum)

     @endphp
     <div class="card-group mx-3 mt-3">
         @foreach($images as $img)
             <div class="al card mx-3 ">
                 <img class="card-img-top "  src="{{ asset('upload/images/' . $img ) }}" alt="Card image cap">
             </div>
         @endforeach
     </div>
@stop
