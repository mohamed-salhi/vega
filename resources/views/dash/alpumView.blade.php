@extends('dash.master')
@section('title' , 'Album | Vega')
@section('content')

@if($pro->alpum)
    @php
        $images = explode(',' , $pro->alpum)

    @endphp
    <div class="card-group">
        @foreach($images as $img)
            <div class="card mx-3 ">
                <img class="card-img-top "  src="{{ asset('upload/images/' . $img ) }}" alt="Card image cap">
            </div>
        @endforeach
    </div>
@endif
<div class=" d-flex justify-content-center mx-5 mt-5">
    <a href="{{ route('project.index') }}" type="submit" class="btn btn-outline-dark ml-5 w-25 mb-3">Go Back</a>
</div>
@stop
